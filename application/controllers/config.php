<?php

session_start();

require_once "Facebook/autoload.php";

$FB = new \Facebook\Facebook([
	'app_id' => '2226857630661954',
	'app_secret' => '641a60c333df5ee6ae8a19410277171e',
	'default_graph_version' => 'v2.10',
	]);

$helper = $FB->getRedirectLoginHelper();
//echo '<pre>';print_r($helper);exit;


?>