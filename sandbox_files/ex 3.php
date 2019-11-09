<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 08.11.2019
 * Time: 16:47
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

require_once 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();


/*try {
    $res = $client->request('GET', 'https://api.github.com/user', [
        'verify' => false,
        'auth' => ['paul.kurskii@gmail.com', 'hepXeb-wyrkuw-pakje9']
    ]);
    echo $res->getStatusCode();
    echo $res->getHeader('content-type')[0];
// 'application/json; charset=utf8'
    echo $res->getBody();
// {"type":"User"...'
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
    var_dump($e);
}*/


use Stichoza\GoogleTranslate\GoogleTranslate;

$tr = new GoogleTranslate('ru'); // Translates into English

try {
    echo $tr->translate('Kojima and Konami’s relationship was rocky long before the official cancelation. It was preceded by rumors that Kojima would leave the company after the September 2015 launch of Metal Gear Solid V: The Phantom Pain. Despite what would end up being credible rumors about Kojima’s impending departure, Konami continued to insist that all was well and that the developer was simply on vacation. Konami also made the baffling choice to yank P.T. from the PlayStation Store, which has, in turn, bestowed it with a sort of legendary status — the kind that allows people to sell PlayStation 4s with P.T. installed for exorbitant amounts. Kojima was not allowed to accept an award for Metal Gear Solid V. Finally, solidifying the breakup, he spun up his own studio outside of Konami and announced his new title — Death Stranding — the following year. Both del Toro and Reedus returned to work with him.');
} catch (ErrorException $e) {
    var_dump($e);
}
