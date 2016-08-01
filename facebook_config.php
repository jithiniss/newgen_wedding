<?php

include_once("inc/facebook.php"); //include facebook SDK
######### Facebook API Configuration ##########
$appId = '523348034516781'; //Facebook App ID
$appSecret = '35f7d093b32ace9741dd78a38d88bc77'; // Facebook App Secret
$homeurl = 'http://newgenwedding.com/beta/index.php/primary-info';  //return to home
$fbPermissions = 'email';  //Required facebook permissions
//Call Facebook API
$facebook = new Facebook(array(
    'appId' => $appId,
    'secret' => $appSecret
        ));
$fbuser = $facebook->getUser();
?>