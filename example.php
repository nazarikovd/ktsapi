<?php
include 'config.php'; // connect config
include 'ktsApi.php'; // connect library

$token = ''; //specify your VK token https://oauth.vk.com/authorize?client_id=6121396&scope=1073737727&redirect_uri=https://oauth.vk.com/blank.html&display=page&response_type=token&revoke=1

$kts = new ktsApi(config::API_URL, config::APP_ID); // new api class. edit config.php before use!!!

$bear = $kts->auth($token); // kts bearer token by VK access_token (only possible for official vk app like VK Admin). Or you can specify just bearer



echo json_encode($kts->request('getShop', $bear)); // takes Bearer and returns ['SHOP_RESPONSE'] with shop items list

/////////////////////////////////
//
// example for rosatom 15
//
/////////////////////////////////

$kts->request('complete', $bear); // use this to finish all games and take all possible points (cur support for rosatom and homo science. Beeline uppers only for one game at call)

// also can check something in shop

if($kts->getShopAvailibility($bear, 'vk_sticker')) // returns true if 'vk_sticker' available in shop
{
	echo('ШОК!!! new stickers!!!');
}
if($kts->getShopAvailibility($bear, 'vk_voices')) // returns true if 'vk_voices' available in shop
{
	echo('new voices or votes idk');
}
	
