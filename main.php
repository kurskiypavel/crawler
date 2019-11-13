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


//$url = 'https://www.theverge.com/2017/10/17/15737580/star-wars-han-solo-standalone-film-title-ron-howard';

/*  1. Save links from sitemap into DB */
/*  use getLinks.php    */

/*  2. Get content for each link in DB from WEB    */

function getContentFromWeb()
{
    /*  2.1. Select all new articles from DB    */
    $articlesORM = VgArticleQuery::create()
        ->where('VgArticle.title IS NULL')
        ->limit(10)
        ->find();
    foreach ($articlesORM as $row) {

        /*  2.2. Get content for each new article from WEB  */

        $url = $row->getUrl();
        $article = new Article($url);

        $domName = "meta[property='og:site_name']";
        $domTitle = "body h1";
        $domSubtitle = ".c-entry-summary.p-dek";
        $domDatetime = ".c-byline__item time";
        $domContent = "#content .c-entry-content p";

        $article->scrape($domName, $domTitle, $domSubtitle, $domDatetime, $domContent);

        /*  2.3. Update row with new content*/

        $row->setTitle($article->title);
        $row->setSubtitle($article->subtitle);
        $row->setSource($article->source);
        $row->setContent($article->content);
        $row->setDatetime($article->datetime);
        $row->setUrl($article->url);

        $row->save();
        echo $row->getId() . PHP_EOL;
    }
}

/*  3. Translate content for each row from vg_article and save to vg_article_ru    */

function translateContent()
{
    $tr = new GoogleTranslate('ru');

    /*  3.1. Select all not translated and send to Google Translate API  */
    $articles = VgArticleQuery::create()
        ->where('VgArticle.translated IS NULL')
        ->limit(1)
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
        $titleRU = $tr->translate($article->getTitle());
        sleep(2);
        $subtitleRU = $tr->translate($article->getSubtitle());
        var_dump($subtitleRU);



        $json_translateRU = array("titleRU" => $titleRU, "subtitleRU" => $subtitleRU, "contentRU" => $contentRU);


        /*write to vg_article_ru*/
        $article->setJson_translateRU(json_encode($json_translateRU,JSON_UNESCAPED_UNICODE));
        $article->setTranslated(1);
        $article->save();
    }

}


translateContent();












