<?php

//Require from the sessions class
require_once 'Models/class.sessions.php';
//Require from the userListing class
require_once 'Models/class.userListing.php';
//Require from the threadListing class
require_once 'Models/class.threadListing.php';
//Require from the huntListing class
require_once 'Models/class.huntListing.php';
//Require from the messageListing class
require_once 'Models/class.messageListing.php';

//Create an instance of the session class
$sessions = new Session();
//Create an instance of the userListing class
$userListing = new UserListing();
//Create an instance of the threadListing class
$threadListing = new ThreadListing();
//Create an instance of the huntListing class
$huntListing = new HuntListing();
//Create an instance of the huntListing class
$messageListing = new MessageListing();

function userLocation() {
    //Use the instance of the sessions class for this method
    global $sessions;
    //Delete the current device's latitude session
    $sessions->deleteSession('latitude');
    //Delete the current device's longitude session
    $sessions->deleteSession('longitude');
    //Delete the current device's accuracy session
    $sessions->deleteSession('accuracy');
    //Create a new latitude session, carrying the post object's latitude value
    $sessions->setSession('latitude', $_POST['latitude']);
    //Create a new longitude session, carrying the post object's longitude value
    $sessions->setSession('longitude', $_POST['longitude']);
    //Create a new accuracy session, carrying the post object's accuracy value
    $sessions->setSession('accuracy', $_POST['accuracy']);
}

function createNewUser() {
    //Use the userListing instance for this method
    global $userListing;
    //Pass the post object to the userListing's inserttbl method in order to create the new user
    $userListing->inserttbl($_POST);
}

function createNewThread() {
    //Use the threadListing instance for this method
    global $threadListing;
    //Define the default latestPost value
    $_POST['latestPost'] = "This thread is new. Be the first one to comment!";
    //Set the username variable (for the initial reply) of the post object to be the same as the thread's author
    $_POST['username'] = $_POST['author'];
    //Set the threadTitle variable (for the initial reply) of the post object to be the same as the thread's subject
    $_POST['threadTitle'] = $_POST['subject'];
    //Submit the post object by calling the threadDatabase variable's createNewThread method, passing the object as a parameter
    $threadListing->createNewThread($_POST);
}

function createNewHunt() {
    //Use the huntListing instance for this method
    global $huntListing;
    $_POST['huntStatus'] = "Ongoing";
    //Insert the new hunt by calling the hunt table' inserttbl method and passing the post object as it's parameter
    $newMessageID = $huntListing->inserttbl($_POST);
    //Have the post object's newMessageID variable to hold the value of the new message ID
    $_POST['newMessageID'] = $newMessageID;
    //Call the $huntListing's announceNewHuntToAll to create an update for all users informing them about the new hunt
    $huntListing->announceNewHuntToAll($_POST);
}

function postMessage() {
    //Use the messageListing instance for this method
    global $messageListing;
    //Use the userListing instance for this method
    global $userListing;
    //Assign the username value of the posted object the same value as the object's reciever value
    $_POST['username'] = $_POST['receiver'];
    //If the post item "receiver" has been sent to this page
    if ($_POST['receiver'] == "The TreasureQuest Team") {
        //Send the post item to the messageListing's sendMessageToAllAdmins method
        $messageListing->sendMessageToAllAdmins($_POST);
    } else {
        //Assign a local variable storing the value of the UserListing's retrieveUserByUsername method
        $retriever = $userListing->retrieveUserByUsername($_POST);
        //Assign the posted object's recieverID value the same value as the retrieved user's getId value
        $_POST['receiverID'] = $retriever->getId();
        //Insert the message by calling the MessageListing's inserttbl method
        $messageListing->inserttbl($_POST);
    }
}

echo $_GET['action']();
