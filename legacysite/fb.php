<?php

require_once __DIR__ . '/../composer/vendor/autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
  'app_id' => '163416327515025',
  'app_secret' => '72db809e1c5ebb157f874038cf266ee4',
  'default_graph_version' => 'v2.10',
  //'default_access_token' => '{access-token}', // optional
]);


$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes'];
$loginUrl = $helper->getLoginUrl('http://www.srilaprabhupadalila.org/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';


?>