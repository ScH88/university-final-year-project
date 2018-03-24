<?php
//Set the view as a new stdClass
$view = new stdClass();
//Set the hunt's title by catching the huntName
$view->huntName = $_GET['huntName'];
//Set the hunt's ID by catching the huntId value
$view->huntId = $_GET['huntID'];

//Require from the sessions model class
require_once('Models/class.sessions.php');

//Create a new instance of the Session class
$session = new Session();

//Set the page title
$view->pageTitle = 'Hunt Clues';
//Set up the huntID variable
$view->huntID = '';
//Set up the clue1 variable
$view->clue1 = '';
//Set up the clue2 variable
$view->clue2 = '';
//Set up the clue3 variable
$view->clue3 = '';
//Set up the clue4 variable
$view->clue4 = '';
//Set up the clue5 variable
$view->clue5 = '';
//Set up the clue6 variable
$view->clue6 = '';
//Set up the clue7 variable
$view->clue7 = '';
//Set up the altClue1 variable
$view->altClue1 = '';
//Set up the altClue2 variable
$view->altClue2 = '';
//Set up the altClue3 variable
$view->altClue3 = '';
//Set up the altClue4 variable
$view->altClue4 = '';
//Set up the altClue5 variable
$view->altClue5 = '';
//Set up the altClue6 variable
$view->altClue6 = '';
//Set up the altClue7 variable
$view->altClue7 = '';
//Set up the alt2Clue1 variable
$view->alt2Clue1 = '';
//Set up the alt2Clue2 variable
$view->alt2Clue2 = '';
//Set up the alt2Clue3 variable
$view->alt2Clue3 = '';
//Set up the alt2Clue4 variable
$view->alt2Clue4 = '';
//Set up the alt2Clue5 variable
$view->alt2Clue5 = '';
//Set up the alt2Clue6 variable
$view->alt2Clue6 = '';
//Set up the alt2Clue7 variable
$view->alt2Clue7 = '';
//Require from the hunts class
require_once('Models/class.hunts.php');
//Require from the huntListing class
require_once('Models/class.huntListing.php');
//Require from the updateListing class
require_once('Models/class.updateListing.php');
//Require the sessions class
require_once('Models/class.sessions.php');

//Create a new huntListing instance
$huntList = new HuntListing();
//Create a new updateListing instance
$updateList = new UpdateListing();

//Assign a local variable storing the session's id value
$view->sessionID = $session->getSession('id');
//Assign a local variable storing the session's username value
$view->sessionUsername = $session->getSession('username'); 
//Assign a local variable storing the session's user status value
$view->sessionUserStatus = $session->getSession('status');
//Assign a value for the session's user avatar
$view->sessionAvatar = $session->getSession('userAvatar');
//Set up a variable for getting a possible latitude session
$view->latitude = $session->getSession('latitude');
//Set up a variable for getting a possible longitude session
$view->longitude = $session->getSession('longitude');
//Set up a variable for getting a possible accuracy session
$view->accuracy = $session->getSession('accuracy');

//Check if the hunt exists by calling the checkHuntExistence method, then assign to variable
$view->huntExists = $huntList->checkHuntExists($view->huntId);

//If the huntExists variable holds "false" as the return value
if ($view->huntExists == "false") {
//Set the page's title to tell user that the hunt/clue does not exist
    $view->huntName = "Hunt Nonexistent";
//If the huntExists variable holds "true" as the return value
} else if ($view->huntExists == "true") {
//Create a local variable which will store the row returned by the fetchByTitle method
    $pageHunt = $huntList->fetchByTitle($view->huntName);
//Use that row to create a new Hunt object
    $pageHuntGathered = new Hunt($pageHunt);
//Retrieve the new Hunt object's id field and assign to local variable
    $view->huntID = $pageHuntGathered->getId();
//Retrieve the new Hunt object's clue1 field
    $view->clue1 = $pageHuntGathered->getClue1();
    //If there is a return value from the hunt object's getAltClue1 method
    if ($pageHuntGathered->getAltClue1() != null) {
        //Have the local altClue1 variable display the return value for getAltClue1()
        $view->altClue1 = $pageHuntGathered->getAltClue1();
        //If there is a return value from the hunt object's getAltClue2 method
    } else if ($pageHuntGathered->getAltClue2() != null) {
        //Have the local altClue2 variable display the return value for getAltClue2()
        $view->altClue2 = $pageHuntGathered->getAltClue2();
        //If there is a return value from the hunt object's getAltClue3 method
    } else if ($pageHuntGathered->getAltClue3() != null) {
        //Have the local altClue3 variable display the return value for getAltClue3()
        $view->altClue3 = $pageHuntGathered->getAltClue3();
        //If there is a return value from the hunt object's getAltClue4 method
    } else if ($pageHuntGathered->getAltClue4() != null) {
        //Have the local altClue4 variable display the return value for getAltClue4()
        $view->altClue4 = $pageHuntGathered->getAltClue4();
        //If there is a return value from the hunt object's getAltClue5 method
    } else if ($pageHuntGathered->getAltClue5() != null) {
        //Have the local altClue5 variable display the return value for getAltClue5()
        $view->altClue5 = $pageHuntGathered->getAltClue5();
        //If there is a return value from the hunt object's getAltClue6 method
    } else if ($pageHuntGathered->getAltClue6() != null) {
        //Have the local altClue6 variable display the return value for getAltClue6()
        $view->altClue6 = $pageHuntGathered->getAltClue6();
        //If there is a return value from the hunt object's getAltClue7 method
    } else if ($pageHuntGathered->getAltClue2() != null) {
        //Have the local altClue7 variable display the return value for getAltClue7()
        $view->altClue7 = $pageHuntGathered->getAltClue7();
    }
//If there is a return value from the hunt object's getAlt2Clue1 method
    if ($pageHuntGathered->getAlt2Clue1() != null) {
        //Have the local alt2Clue1 variable display the return value for getAlt2Clue1()
        $view->alt2Clue1 = $pageHuntGathered->getAlt2Clue1();
        //If there is a return value from the hunt object's getAlt2Clue2 method
    } else if ($pageHuntGathered->getAlt2Clue2() != null) {
        //Have the local alt2Clue2 variable display the return value for getAlt2Clue2()
        $view->alt2Clue2 = $pageHuntGathered->getAlt2Clue2();
        //If there is a return value from the hunt object's getAlt2Clue3 method
    } else if ($pageHuntGathered->getAlt2Clue3() != null) {
        //Have the local alt2Clue3 variable display the return value for getAlt2Clue3()
        $view->alt2Clue3 = $pageHuntGathered->getAlt2Clue3();
        //If there is a return value from the hunt object's getAlt2Clue4 method
    } else if ($pageHuntGathered->getAlt2Clue4() != null) {
        //Have the local alt2Clue4 variable display the return value for getAlt2Clue4()
        $view->alt2Clue4 = $pageHuntGathered->getAlt2Clue4();
        //If there is a return value from the hunt object's getAlt2Clue5 method
    } else if ($pageHuntGathered->getAlt2Clue5() != null) {
        //Have the local alt2Clue5 variable display the return value for getAlt2Clue5()
        $view->alt2Clue5 = $pageHuntGathered->getAlt2Clue5();
        //If there is a return value from the hunt object's getAlt2Clue6 method
    } else if ($pageHuntGathered->getAlt2Clue6() != null) {
        //Have the local alt2Clue6 variable display the return value for getAlt2Clue6()
        $view->alt2Clue6 = $pageHuntGathered->getAlt2Clue6();
        //If there is a return value from the hunt object's getAlt2Clue7 method
    } else if ($pageHuntGathered->getAlt2Clue2() != null) {
        //Have the local alt2Clue7 variable display the return value for getAlt2Clue7()
        $view->alt2Clue7 = $pageHuntGathered->getAlt2Clue7();
    }

//Call the update list's fetchUpdatesById method by passing it the session's ID value, then assign the returned array value to a "userUpdateList" variable
    $userUpdateList = $updateList->fetchUpdatesByID($view->sessionID);
//For each update in the returned array
    foreach ($userUpdateList as $update) {
//If the update's content value equals the following, assign the local clue2 variable the value of the update's getClue2 method
        if ($update->getUpdateContent() == "You have found Clue 2 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getClue2()) {
            $view->clue2 = $pageHuntGathered->getClue2();
//If the update's content value equals the following, assign the local clue3 variable the value of the update's getClue3 method
        } else if ($update->getUpdateContent() == "You have found Clue 3 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getClue3()) {
            $view->clue3 = $pageHuntGathered->getClue3();
//If the update's content value equals the following, assign the local clue4 variable the value of the update's getClue4 method
        } else if ($update->getUpdateContent() == "You have found Clue 4 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getClue4()) {
            $view->clue4 = $pageHuntGathered->getClue4();
//If the update's content value equals the following, assign the local clue5 variable the value of the update's getClue5 method
        } else if ($update->getUpdateContent() == "You have found Clue 5 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getClue5()) {
            $view->clue5 = $pageHuntGathered->getClue5();
//If the update's content value equals the following, assign the local clue6 variable the value of the update's getClue6 method
        } else if ($update->getUpdateContent() == "You have found Clue 6 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getClue6()) {
            $view->clue6 = $pageHuntGathered->getClue6();
//If the update's content value equals the following, assign the local clue7 variable the value of the update's getClue7 method
        } else if ($update->getUpdateContent() == "You have found Clue 7 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getClue7()) {
            $view->clue7 = $pageHuntGathered->getClue7();
//If the update's content value equals the following, assign the local altClue1 variable the value of the update's getAltClue1 method
        } else if ($update->getUpdateContent() == "You have found Alternative Path 1 Clue 1 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getAltClue1()) {
            $view->altClue1 = $pageHuntGathered->getAltClue1();
//If the update's content value equals the following, assign the local altClue2 variable the value of the update's getAltClue2 method
        } else if ($update->getUpdateContent() == "You have found Alternative Path 1 Clue 2 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getAltClue2()) {
            $view->altClue2 = $pageHuntGathered->getAltClue2();
//If the update's content value equals the following, assign the local altClue3 variable the value of the update's getAltClue3 method
        } else if ($update->getUpdateContent() == "You have found Alternative Path 1 Clue 3 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getAltClue3()) {
            $view->altClue3 = $pageHuntGathered->getAltClue3();
//If the update's content value equals the following, assign the local altClue3 variable the value of the update's getAltClue4 method
        } else if ($update->getUpdateContent() == "You have found Alternative Path 1 Clue 4 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getAltClue4()) {
            $view->altClue4 = $pageHuntGathered->getAltClue4();
//If the update's content value equals the following, assign the local altClue5 variable the value of the update's getAltClue5 method
        } else if ($update->getUpdateContent() == "You have found Alternative Path 1 Clue 5 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getAltClue5()) {
            $view->altClue5 = $pageHuntGathered->getAltClue5();
//If the update's content value equals the following, assign the local altClue6 variable the value of the update's getAltClue6 method
        } else if ($update->getUpdateContent() == "You have found Alternative Path 1 Clue 6 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getAltClue6()) {
            $view->altClue6 = $pageHuntGathered->getAltClue6();
//If the update's content value equals the following, assign the local altClue7 variable the value of the update's getAltClue7 method
        } else if ($update->getUpdateContent() == "You have found Alternative Path 1 Clue 7 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getAltClue7()) {
            $view->altClue7 = $pageHuntGathered->getAltClue7();
//If the update's content value equals the following, assign the local alt2Clue1 variable the value of the update's getAlt2Clue1 method
        } else if ($update->getUpdateContent() == "You have found Alternative Path 2 Clue 1 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getAlt2Clue1()) {
            $view->alt2Clue1 = $pageHuntGathered->getAlt2Clue1();
//If the update's content value equals the following, assign the local alt2Clue2 variable the value of the update's getAlt2Clue2 method
        } else if ($update->getUpdateContent() == "You have found Alternative Path 2 Clue 2 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getAlt2Clue2()) {
            $view->alt2Clue2 = $pageHuntGathered->getAlt2Clue2();
//If the update's content value equals the following, assign the local alt2Clue3 variable the value of the update's getAlt2Clue3 method
        } else if ($update->getUpdateContent() == "You have found Alternative Path 2 Clue 3 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getAlt2Clue3()) {
            $view->alt2Clue3 = $pageHuntGathered->getAlt2Clue3();
//If the update's content value equals the following, assign the local alt2Clue4 variable the value of the update's getAlt2Clue4 method
        } else if ($update->getUpdateContent() == "You have found Alternative Path 2 Clue 4 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getAlt2Clue4()) {
            $view->alt2Clue4 = $pageHuntGathered->getAlt2Clue4();
//If the update's content value equals the following, assign the local alt2Clue5 variable the value of the update's getAlt2Clue5 method
        } else if ($update->getUpdateContent() == "You have found Alternative Path 2 Clue 5 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getAlt2Clue5()) {
            $view->alt2Clue5 = $pageHuntGathered->getAlt2Clue5();
//If the update's content value equals the following, assign the local alt2Clue6 variable the value of the update's getAlt2Clue6 method
        } else if ($update->getUpdateContent() == "You have found Alternative Path 2 Clue 6 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getAlt2Clue6()) {
            $view->alt2Clue6 = $pageHuntGathered->getAlt2Clue6();
//If the update's content value equals the following, assign the local alt2Clue7 variable the value of the update's getAlt2Clue7 method
        } else if ($update->getUpdateContent() == "You have found Alternative Path 2 Clue 7 of " . $pageHuntGathered->getHuntName() . ": " . $pageHuntGathered->getAlt2Clue7()) {
            $view->alt2Clue7 = $pageHuntGathered->getAlt2Clue7();
//If the update has failed to match any of the previous strings
        } else {
//Do Nothing
        }
    }
}


//Require the appropriate view to display the page on the internet browser

require_once('Views/huntClues.phtml');
