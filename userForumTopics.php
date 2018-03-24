<?php
//Set the view as a new stdClass
$view = new stdClass();
//Set the page title
$view->pageTitle = 'User Forum';
//Set up the page's on-screen items list as an empty array
$view->threadList = array();
//Set up the page's on-screen message as blank
$view->message = "";
//Require from the huntListing class
require_once('Models/class.threadListing.php'); 
//Require the sessions class
require_once('Models/class.sessions.php');
 
//Create a new session 
$session = new Session();

//Assign a local variable storing the session's id value
$view->sessionID = $session->getSession('id');
//Assign a local variable storing the session's username value
$view->sessionUsername = $session->getSession('username');
//Assign a local variable storing the session's user status value
$view->sessionUserStatus = $session->getSession('status');
//Assign a local variable storing the session's user avatar
$view->sessionAvatar = $session->getSession('userAvatar');
//Set up a variable for getting a possible latitude session
$view->latitude = $session->getSession('latitude');
//Set up a variable for getting a possible longitude session
$view->longitude = $session->getSession('longitude');
//Set up a variable for getting a possible accuracy session
$view->accuracy = $session->getSession('accuracy');

//Create a new huntListing instance
$database = new ThreadListing();
//Have the the page's on-screen table list show food and drink only by calling it's selectAllFoodAndDrink() method
$view->threadList = $database->fetchAllItems();

//Require the appropriate view to display the page on the internet browser
require_once('Views/userForumTopics.phtml');
