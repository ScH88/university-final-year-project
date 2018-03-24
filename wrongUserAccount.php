<?php

require_once('Models/class.sessions.php');

$session = new Session();

//Set up a variable for getting a possible latitude session
$view->latitude = $session->getSession('latitude');
//Set up a variable for getting a possible longitude session
$view->longitude = $session->getSession('longitude');
//Set up a variable for getting a possible accuracy session
$view->accuracy = $session->getSession('accuracy');

require_once('Views/wrongUserAccount.phtml');