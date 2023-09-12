<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID | Copiar "ID DE CLIENTE"
$google_client->setClientId('998661218025-ph7stqoq9jj3skr0e5nfvspegnpdtt7i.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI | URL AUTORIZADO
$google_client->setRedirectUri('http://localhost/CDI573/login.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>