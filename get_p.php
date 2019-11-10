<?php


header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'src/simple_html_dom.php';
require_once 'vendor/autoload.php';
require_once 'src/generated-conf/config.php';

use article\Article;
use orm\orm\VgArticle;
use orm\orm\VgArticleQuery;

$url = 'http://propelorm.org/documentation/02-buildtime.html';

$article = new Article($url);
$article->scrape();
//echo json_encode($article);


$articleORM = new VgArticle();
$articleORM->setTitle($article->title);
$articleORM->setSubtitle($article->subtitle);


$articleORM->setSource($article->source);
$articleORM->setContent($article->content);
$articleORM->setDatetime($article->datetime);
$articleORM->setUrl($article->url);

$articleORM->save();


$articlesORM = VgArticleQuery::create()->find();
foreach ($articlesORM as $row) {
    echo $row->getId().PHP_EOL;
}