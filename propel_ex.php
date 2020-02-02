<?php
/**
 * Created by PhpStorm.
 * User: pavelkurskiy
 * Date: 09/11/2019
 * Time: 15:20
 */

//https://stackoverflow.com/questions/44031516/how-to-instantiate-and-use-propel-effectively

//http://propelorm.org/documentation/03-basic-crud.html


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once "vendor/autoload.php";
require_once 'src/generated-conf/config.php';

use orm\orm\VgArticle;
use orm\orm\VgArticleQuery;

$article = new VgArticle();
//$article->setTitle('Jane33');
//$article->setSubtitle('Austen33');
//$article->save();

//echo $article->exportTo('JSON');

//$q = new VgArticleQuery();
//$firstVgArticle = $q->findPK(1);
//echo $firstVgArticle;


$articles= VgArticleQuery::create()->find();
foreach($articles as $article) {
    echo $article->getTitle().PHP_EOL;
}

