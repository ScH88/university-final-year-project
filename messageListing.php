<?php
//Set the view as a new stdClass
$view = new stdClass();
//Set the page title
$view->pageTitle = 'Your Messages';
//Require from the repliess class
require_once('Models/class.messages.php');
//Require from the replyListing class
require_once('Models/class.messageListing.php');
//Require the sessions class
require_once('Models/class.sessions.php');

//Create a new session 
$session = new Session();

//Assign a local variable storing the session's id value
$view->sessionID = $session->getSession('id');
//Set the hunt's title by catching the session ID
$view->userID = $view->sessionID;
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

if ($view->sessionID == null) {
      header('location: login.php');
} else {
    
//Declare a MessageListing object
$messages = new MessageListing();
//List all user specific messages by calling the MessageListing object's fetchMessagesByID method and passing the local userID method as the parameter
$view->messageList = $messages->fetchMessagesByID($view->userID);

//If the "submit" button is pressed
if (isset($_POST['delete'])) {
     if ($view->sessionID == null) {
           header('location: sessionExpired.php');
       } else {
            //Delete the row from the updates list
            $messages->deletetbl($_POST);
       }
}

}

//Require the appropriate view to display the page on the internet browser
require_once('Views/messageListing.phtml');
