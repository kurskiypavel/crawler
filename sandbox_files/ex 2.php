<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




require_once 'simple_html_dom.php';

$asd = file_get_html('http://www.google.com/');

die();

require_once 'vendor/autoload.php';
use \Curl\Curl;

try {


    $curl = new Curl();

    $curl->get('http://www.google.com/');

    if ($curl->error) {
        echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
    } else {
        echo 'Response:' . "\n";
        var_dump($curl->response);
    }




} catch (ErrorException $e) {

}
