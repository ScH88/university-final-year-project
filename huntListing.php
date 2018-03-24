<?php
//Set the view as a new stdClass
$view = new stdClass();
//Set the page title
$view->pageTitle = 'Treasure Hunts';
//Set up the page's on-screen items list as an empty array
$view->huntList = array();
//Set up the page's on-screen message as blank
$view->message = "";

//Require from the huntListing class
require_once('Models/class.huntListing.php');
//Require from the userListing class
require_once('Models/class.userListing.php');
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

//Declare a variable as a new object of class UserListing
$userBase = new UserListing();
//Retreive a user from the UserListing class by giving it the current user's id
$user = $userBase->retrieveUserByID($view->sessionID);
//Create a local variable showing the current user's username, called from the getUsername method
$view->userStatus = $user->getStatus();

//Create a new huntListing instance
$database = new HuntListing();
//Have the the page's on-screen table list show food and drink only by calling it's selectAllFoodAndDrink() method
$view->huntList = $database->fetchAllItems();

//If the "delete" button on the phtml page has been pressed
if (isset($_POST['delete'])) {
     if ($view->sessionID == null) {
           header('location: sessionExpired.php');
       } else {       
    //Delete the row from the replies list
    $database->deletetbl($_POST);
    //Update the hunt list to show the new change by calling the huntListing object's fetchAllItems again
    $view->huntList = $database->fetchAllItems(); 
       }
}

//Require the appropriate view to display the page on the internet browser
require_once('Views/huntListing.phtml');
