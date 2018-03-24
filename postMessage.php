<?php

//Set the view as a new stdClass
$view = new stdClass();
//Set up local message variable
$view->messageTab = '';
//Set the page title
$view->pageTitle = 'Post Message';
//Create an array for storing user items for use in the option pane
$view->userList = array();
//Make the requirement for the messageListing class
require_once('Models/class.messageListing.php');
//Make the requirement for the userListing class
require_once('Models/class.userListing.php');
//Make the requirement for the users class
require_once('Models/class.users.php');
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

//If the current session ID returns null
if ($view->sessionID == null) {
    //Redirect to the login page
    header('location: login.php');
} else { 
    //Declare a variable as a new object of class UserListing
    $userBase = new UserListing();
    //Set the user array to gather all users
    $view->userList = $userBase->fetchAllItems();
}
//Require the appropriate view to display the page on the internet browser
require_once('Views/postMessage.phtml');
