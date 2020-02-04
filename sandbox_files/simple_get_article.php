<?php
/**
 * Created by PhpStorm.
 * User: pavelkurskiy
 * Date: 10/12/2019
 * Time: 22:42
 */

//header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once '../vendor/autoload.php';
require_once '../src/generated-conf/config.php';
use orm\orm\ArticlesPropelQuery;
$slug = 'posmotrite-pervyy-treyler-filma-ubegayushchiye-ot-marvels-runaways-ot-hulu';

//$slug = "posmotrite-pervyy-treyler-filma-ubegayushchiye-ot-marvels-runaways-ot-hulu";
$article = ArticlesPropelQuery::create()
    ->where('ArticlesPropel.url = "https://www.theverge.com/2016/11/13/13597824/why-nail-biting-habit-science"')
    ->limit(1)
    ->find();

var_dump($article);