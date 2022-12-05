<?php

//
//
//			this script will get all possible coins and buy stickers
//
//

include 'config.php'; // connect config
include 'ktsApi.php'; // connect library

$token = ''; // your vk access_token (only possible for official vk app like VK Admin).


$kts = new ktsApi(config::API_URL, config::APP_ID); // place rosatom15 app_id and endpoint to config.php 

$bear = $kts->auth($token); // kts bearer token by VK access_token (only possible for official vk app like VK Admin). Or you can specify just bearer

$kts->request('complete', $bear); // get all possible coins

$promo = $kts->request('buy', $bear, array('type'=>'vk_sticker'))->BUY_RESPONSE->data->purchase->promocode;  //return promocode if success
echo $promo.PHP_EOL;

