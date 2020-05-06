<?php
require_once('./vendor/autoload.php');

$google = new Google_Client();

$google->setClientId('1095830840201-s4p5jiacrvfhp5uq9vdadvn5sb2860e9.apps.googleusercontent.com');
$google->setClientSecret('Roy__mx5laDtUZsvxeGZcSs0');

$google->setRedirectUri('http://localhost/google_api/login_with_google/profile.php');

$google->addScope('email');
$google->addScope('profile');

session_start();











?>