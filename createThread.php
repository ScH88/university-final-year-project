<?php
//Set the view as a new stdClass
$view = new stdClass();
//Catch the incoming userID variable
$view->id = $_GET['userID'];
//Set the page title
$view->pageTitle = 'Create New Thread';
//Make the requirement for the userListing class
require_once('Models/class.userListing.php');
//Make the requirement for the threadListing class
require_once('Models/class.threadListing.php');
//Require the sessions class
require_once('Models/class.sessions.php');
 
if ($view->sessionID == null) {
    header('location: login.php');
} else {
    //Create a new session 
    $session = new Session();
}

//Assign a local variable storing the session's id value
$view->sessionID = $session->getSession('id');
//Assign a local variable storing the session's username value
$view->sessionUsername = $session->getSession('username');
//Assign a local variable storing the session's user status value
$view->sessionUserStatus = $session->getSession('status');
//Assign a local variable storing the session's avatar value
$view->sessionAvatar = $session->getSession('userAvatar');
//Create a userListing class in order to retrieve the author's username
$view->userBase = new UserListing();
//Set up a variable for getting a possible latitude session
$view->latitude = $session->getSession('latitude');
//Set up a variable for getting a possible longitude session
$view->longitude = $session->getSession('longitude');
//Set up a variable for getting a possible accuracy session
$view->accuracy = $session->getSession('accuracy');

//Require the appropriate view to display the page on the internet browser
require_once('Views/createThread.phtml');
