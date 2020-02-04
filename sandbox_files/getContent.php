<?php
/**
 * Created by PhpStorm.
 * User: pavelkurskiy
 * Date: 11/11/2019
 * Time: 22:56
 */


header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once '../vendor/autoload.php';
require_once '../src/generated-conf/config.php';
use orm\orm\ArticlesPropelQuery;


if( isset($_POST['id']) ) {
    $id = $_POST['id'];
    $asd =  ArticlesPropelQuery::create()->findPK($id);

    echo $asd->exportTo('JSON');
}

