<?php
/**
 * Created by PhpStorm.
 * User: pavelkurskiy
 * Date: 16/11/2019
 * Time: 23:56
 */

//header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'src/simple_html_dom.php';
require_once 'vendor/autoload.php';
require_once 'src/generated-conf/config.php';


use article\Article;
use orm\orm\VgArticleQuery;
use Propel\Runtime\ActiveQuery\Criteria;

$lastmod = date('c');
$xml = new SimpleXMLElement('<urlset/>');

$articles = VgArticleQuery::create()
    ->where('VgArticle.slug IS NOT NULL')
    ->find();
foreach ($articles as $row) {
    $slug = $row->getSlug();
    $track = $xml->addChild('url');
    $track->addChild('loc', "https://www.lipsed.ru/$slug");
    $track->addChild('lastmod', "$lastmod");
}

$xml->asXML('sitemap.xml');