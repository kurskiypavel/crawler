<?php
/**
 * Created by PhpStorm.
 * User: pavelkurskiy
 * Date: 10/11/2019
 * Time: 17:58
 */


header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set("error_log", "error.log");


require_once 'src/simple_html_dom.php';
require_once 'vendor/autoload.php';
require_once 'src/generated-conf/config.php';

use article\Article;


$urlSource = "https://www.theverge.com/sitemaps/entries/2017/4";
$storage = file_get_contents($urlSource);
$xml=simplexml_load_string($storage) or die("Error: Cannot create object");

foreach ($xml->url as $url){
    $article = new Article($url->loc);
    $article->store();
}
