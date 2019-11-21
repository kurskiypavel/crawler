<?php
/**
 * Created by PhpStorm.
 * User: pavelkurskiy
 * Date: 14/11/2019
 * Time: 23:07
 */


class ExceptionCrawler extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        if($code=='Wrong slug'){
            $redirect_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
            $this->redirect("$redirect_url/404.php");
        };
    }
    private function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }
}