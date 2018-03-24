<?php
//Set the view as a new stdClass
$view = new stdClass();
//Set the page title
$view->pageTitle = 'Homepage';

//Require the sessions class
require_once('Models/class.sessions.php');
//Create a new session 
$session = new Session();

//Set up a variable for getting a possible latitude session
$view->latitude = $session->getSession('latitude');
//Set up a variable for getting a possible longitude session
$view->longitude = $session->getSession('longitude');
//Set up a variable for getting a possible accuracy session
$view->accuracy = $session->getSession('accuracy');

//If a logout post object has been recieved from the user clicking the "log out" button from the userAccountMain page
if (isset($_POST['logout'])) {
    //Delete the id session
    $session->deleteSession('id');
    //Delete the username session
    $session->deleteSession('username');
    //Delete the status session
    $session->deleteSession('status');
    //Delete the userAvatar session
    $session->deleteSession('userAvatar'); 
    //Delete the latitude session
    $session->deleteSession('latitude');
    //Delete the longitude session
    $session->deleteSession('longitude');
    //Delete the accuracy session
    $session->deleteSession('accuracy');
    //Set the latitude variable to false
    $view->latitude = false;
    //Set the longitude variable to false
    $view->longitude = false;
    //Set the accuracy variable to false
    $view->accuracy = false;
}
    //Require the appropriate view to display the page on the internet browser
require_once('Views/index.phtml');