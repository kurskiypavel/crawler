<?php


header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set("error_log", "error.log");


require_once 'src/simple_html_dom.php';
require_once 'vendor/autoload.php';
require_once 'src/generated-conf/config.php';

use article\Article;
use orm\orm\VgArticleQuery;
use Stichoza\GoogleTranslate\GoogleTranslate;




/*  3. Generate slug based on russian title    */
function translit($string)
{
    $table = array(
        'А' => 'A',
        'Б' => 'B',
        'В' => 'V',
        'Г' => 'G',
        'Д' => 'D',
        'Е' => 'E',
        'Ё' => 'YO',
        'Ж' => 'ZH',
        'З' => 'Z',
        'И' => 'I',
        'Й' => 'J',
        'К' => 'K',
        'Л' => 'L',
        'М' => 'M',
        'Н' => 'N',
        'О' => 'O',
        'П' => 'P',
        'Р' => 'R',
        'С' => 'S',
        'Т' => 'T',
        'У' => 'U',
        'Ф' => 'F',
        'Х' => 'H',
        'Ц' => 'C',
        'Ч' => 'CH',
        'Ш' => 'SH',
        'Щ' => 'CSH',
        'Ь' => '',
        'Ы' => 'Y',
        'Ъ' => '',
        'Э' => 'E',
        'Ю' => 'YU',
        'Я' => 'YA',

        'а' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'yo',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'j',
        'к' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'о' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'h',
        'ц' => 'c',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'csh',
        'ь' => '',
        'ы' => 'y',
        'ъ' => '',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya',
        ' ' => '_'
    );

    $output = str_replace(
        array_keys($table),
        array_values($table), $string
    );

    return $output;
}

function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

/*  4. Translate content for each row from vg_article and save to vg_article_ru    */

function translateContent()
{
    $tr = new GoogleTranslate('ru');

    /*  3.1. Select all not translated and send to Google Translate API  */
    $articles = VgArticleQuery::create()
        ->where('VgArticle.translated IS NULL')
        ->limit(10)
        ->find();

    foreach ($articles as $article) {
        $content = $article->getContent();

        /*  clearing spec chars and decoding    */
        $content = str_replace(array("[", "]"), "", $content);
        $content = explode('","', $content);
        $contentRU = array();
        foreach ($content as $pararaph) {
            $toTranslate = str_replace('"', "", $pararaph);
            if (isset($toTranslate) && strlen($toTranslate) > 0 && strlen(trim($toTranslate)) != 0) {
                $contentRU[] = $tr->translate(htmlspecialchars_decode($toTranslate)) . PHP_EOL;

                sleep(2);

            }
        }
        /*translate*/
        $titleRU = '';
        $titleToTranslate = $article->getTitle();
        if (isset($titleToTranslate)) {
            $titleRU = $tr->translate($titleToTranslate);
            sleep(2);
        }

        $subtitleRU = '';
        $subtitleToTranslate = $article->getSubtitle();
        if (isset($subtitleToTranslate)) {
            $subtitleRU = $tr->translate($subtitleToTranslate);
        }


        var_dump($subtitleRU);

        $translated = translit($titleRU);

        $slug = slugify($translated);


        $json_translateRU = array("titleRU" => $titleRU, "subtitleRU" => $subtitleRU, "contentRU" => $contentRU);


        /*write to vg_article_ru*/
        $article->setJson_translateRU(json_encode($json_translateRU, JSON_UNESCAPED_UNICODE));
        $article->setTranslated(1);
        $article->setSlug($slug);
        $article->save();
    }

}


translateContent();










