<?php
//Set the view as a new stdClass
$view = new stdClass();
//Set the hunt's title by catching the huntName
$view->userID = $_GET['userID'];
//Set the page title
$view->pageTitle = 'Welcome to your account';
//Require from the replies class
require_once('Models/class.userupdates.php');
//Require from the replyListing class
require_once('Models/class.updateListing.php');
//Make the requirement for the users class
require_once('Models/class.users.php');
//Make the requirement for the userListing class
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
//Declare a variable as a new object of class UserListing
$userBase = new UserListing();
//Retreive a user from the UserListing class by giving it the current user's id
$user = $userBase->retrieveUserByID($view->userID);
//Set up a variable for getting a possible latitude session
$view->latitude = $session->getSession('latitude');
//Set up a variable for getting a possible longitude session
$view->longitude = $session->getSession('longitude');
//Set up a variable for getting a possible accuracy session
$view->accuracy = $session->getSession('accuracy');

//If the session value is absent
if ($view->sessionID == null) {
        //Redirect to the login page
        header('location: login.php');
} else {
    //If the user's username matches the session username's value
if ($user->getUsername() == $view->sessionUsername) {
    //Change the local status value so that it holds the same value as the user object's status value
    $view->userStatus = $user->getStatus();
//Set the page's update list as an array
$view->updatesList = array();
//Create a local variable which will store the row returned by the fetchByID method
$userUpdates = new UpdateListing();
//Set the user account's update list by calling the UpdateListing instance's fetchUpdatesByID class and passing it the user's id for the parameter
$view->updatesList = $userUpdates->fetchUpdatesByID($view->userID);

//If the "delete" button is pressed
if (isset($_POST['delete'])) {
    //If the session ID values are absent
    if ($view->sessionID == null) {
        //Redirect to the sessionExpired page
        header('location: sessionExpired.php');
    } else {
        //Delete the row from the updates list
    $userUpdates->deletetbl($_POST);
    }
 }

} else {
    //Redirect to the wrongUserAccount page
    header('location: wrongUserAccount.php');
}
}

//Require the appropriate view to display the page on the internet browser
require_once('Views/userAccountMain.phtml');



