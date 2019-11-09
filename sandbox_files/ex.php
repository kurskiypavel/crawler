<?php
/**
 * Created by PhpStorm.
 * User: pavelkurskiy
 * Date: 07/11/2019
 * Time: 23:28
 */

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
//https://simplehtmldom.sourceforge.io/manual.htm
//require_once 'SimpleDOM.php';
//require_once 'vendor/autoload.php';

//$asds = file_get_html('https://www.theverge.com/circuitbreaker/2017/10/26/16552622/nvidia-geforce-gtx-1070-ti-1080-449-graphics-card-gpu');
//
//$asd = file_get_contents('https://www.theverge.com/circuitbreaker/2017/10/26/16552622/nvidia-geforce-gtx-1070-ti-1080-449-graphics-card-gpu');
//var_dump($asds);


require('vendor/simple-html-dom/simple-html-dom/simple_html_dom.php');

$table = array();

$html = file_get_html('http://flow935.com/playlist/flowhis.HTM');
foreach($html->find('tr') as $row) {
    $time = $row->find('td',0)->plaintext;
    $artist = $row->find('td',1)->plaintext;
    $title = $row->find('td',2)->plaintext;

    $table[$artist][$title] = true;
}

echo '<pre>';
print_r($table);
echo '</pre>';