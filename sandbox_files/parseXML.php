<?php
/**
 * Created by PhpStorm.
 * User: pavelkurskiy
 * Date: 10/11/2019
 * Time: 15:46
 */

$urlSource = "https://www.theverge.com/sitemaps/entries/2017/10";
$storage = file_get_contents($urlSource);
$xml=simplexml_load_string($storage) or die("Error: Cannot create object");

foreach ($xml->url as $url){
    echo $url->loc.PHP_EOL;
    $count++;
}
echo $count;