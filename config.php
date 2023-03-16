<?php
require_once __DIR__ . '/Facebook/autoload.php';

// By Ingenious Gurus:  https://ingeniousgurus.com

// Include required libraries
use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

$redirectUrl   = 'https://carsnmore.000webhostapp.com/'; //Callback URL
$permissions = array('email');  //Optional permissions

$fb = new Facebook([
  'app_id' => '1360679328012991', // Replace fb_app_id with your app id
  'app_secret' => 'dcda38e67ce84d2e09a9bebae8489f51',  // Replace fb_app_secret with your app secret key
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();
if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}

try {
	if(isset($_SESSION['facebook_access_token'])) {
		$accessToken = $_SESSION['facebook_access_token'];
	} else {
  		$accessToken = $helper->getAccessToken();
	}
}catch(\Facebook\Exceptions\FacebookResponseException  $e) {
  // When Graph returns an error
  echo 'Graph error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK error: ' . $e->getMessage();
  exit;
}
?>