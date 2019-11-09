<?php


header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('src/simple_html_dom.php');
require_once 'vendor/autoload.php';


use Crawler\Article;

$url = 'https://www.theverge.com/2019/10/22/20927277/spacex-starlink-broadband-satellite-constellation-internet-2020';

$article = new Article($url);
$article->scrape();
echo json_encode($article);


