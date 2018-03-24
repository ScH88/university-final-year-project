<?php

//Set the view as a new stdClass
$view = new stdClass();
//Set the page title
$view->pageTitle = 'Login';
//Set up the page's on-screen message as blank
$view->message = '';
//Set up local variable for storing incoming longitude value posts
$view->longitude = '';
//Set up local variable for storing incoming latitude value posts
$view->latitude = '';
//Set up local variable for storing incoming accuracy value posts
$view->accuracy = '';

//Create a new session 
$session = new Session();
//Assign a local variable storing the session's id value
$view->sessionID = $session->getSession('id');
//Assign a local variable storing the session's username value
$view->sessionUsername = $session->getSession('username');

//Set up a variable for checking if this website is being viewed via a mobile device, and set a default value for true
$checkMobile = false;
//Set variable representing if this device is an iPhone
$iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
//Set variable representing if this device is a handheld Android device
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
//Set variable representing if this device is a webOS device
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'], "webOS");
//Set variable representing if this device is an iPod
$ipod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");
//Set variable representing if this device is an iPad
$ipad = strpos($_SERVER['HTTP_USER_AGENT'], "iPad");
//Set variable representing if this device is a mobile Blackberry
$blackberry = strpos($_SERVER['HTTP_USER_AGENT'], "Blackberry");
//Set variable representing if this device is a Nokia device
$nokia = strpos($_SERVER['HTTP_USER_AGENT'], "Nokia");
//Set variable representing if this device is an Opera Mini device
$operaMini = strpos($_SERVER['HTTP_USER_AGENT'], "Opera Mini");
//Set variable representing if this device is a NetFront device
$netFront = strpos($_SERVER['HTTP_USER_AGENT'], "NetFront");
//Set variable representing if this device is a PalmOS device
$palmOS = strpos($_SERVER['HTTP_USER_AGENT'], "PalmOS");
//Set variable representing if this device is a Sony Ericsson device
$sony = strpos($_SERVER['HTTP_USER_AGENT'], "SonyEricsson");
//Set variable representing if this device is a Windows CE device
$windows = strpos($_SERVER['HTTP_USER_AGENT'], "Windows CE");
//If the user agent is not a smartphone
if (!$iphone && !$android && !$palmpre && !$ipod && !$ipad && !$blackberry && !$nokia && !$operaMini && !$netFront && !$palmOS && !$sony && !$windows) {
    //Set the checkMobile to false
    $checkMobile = false;
} else {
    //Set the checkMobile to true
    $checkMobile = true;
}

//Require the sessions class
require_once('Models/class.sessions.php');
//Require the UserListing class
require_once('Models/class.userListing.php'); 

//If both the local session id and session username variables are absent
if (strlen($view->sessionID) == 0 || strlen($view->sessionUsername) == 0) {
//If the "checkPassword/submit" button has been pressed
    if (isset($_POST['checkPassword'])) { 
        //Create a new UserListing instance
        $userCheck = new UserListing();
        //Search through the UserListing by sending the posted information to the selectUser method, and declare as variable
        $searchUser = $userCheck->checkForUser($_POST);
        //Declare the username variable by extracting from the searchAdmin variable
        $username = $searchUser['username'];
        //Declare the password variable by extracting from the searchAdmin variable
        $password = $searchUser['password'];
        //If the username or password is empty
        if (strlen($_POST['username']) == 0 OR strlen($_POST['password']) == 0) {
            //Update the on-screen message with the following
            $view->message = 'Login Failed: Nothing typed in at all in either or all required fields';
            //If the username and password variables equal that of the posted user information
        } else if ($username == $_POST['username'] AND $password == $_POST['password']) {
            //If the username and password are all not empty
            if (strlen($_POST['username']) > 0 AND strlen($_POST['password']) > 0) { 
                //Retrieve a user by calling the userListing's retrieveUser method   
                $retrievedUser = $userCheck->retrieveUser($_POST);
                //Declare a new session containing the user's user ID
                $session->setSession('id', $retrievedUser->getID());
                //Declare a new session containing the user's username
                $session->setSession('username', $retrievedUser->getUsername());
                //Declare a new session containing the user's avatar
                $session->setSession('userAvatar', $retrievedUser->getUserAvatar());
                //Declare a new session containing the user's status
                $session->setSession('status', $retrievedUser->getStatus());
                //If the checkMobile variable is true (if this site is viewed through a mobile device)
                if ($checkMobile == true) {
                    //Declare a new session containing the user's current geographical latitude
                    $session->setSession('latitude', $_POST['latitude']);
                    //Declare a new session containing the user's current geographical longitude
                    $session->setSession('longitude', $_POST['longitude']);
                    //Declare a new session containing the user's current geographical accuracy
                    $session->setSession('accuracy', $_POST['accuracy']);
                }
                //Redirect to the user's main account page
                header('location: userAccountMain.php?userID='.$retrievedUser->getID());
            }
            //If the username or password variables are not equal to the posted user information
        } else if ($username != $_POST['username'] OR $password != $_POST['password']) {
            //Set the on-screen message
            $view->message = 'Login Failed: Incorrect information entered';
        }
    }
} else {
    //Redirect to the user account's main page and pass it the value of the sesion id
    header('location: userAccountMain.php?userID='.$view->sessionID);
}
//Require the appropriate view to display the page on the internet browser
require_once('Views/login.phtml');
