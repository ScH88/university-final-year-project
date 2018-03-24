<?php
//Set the view as a new stdClass
$view = new stdClass();
//Set the hunt's title by catching the passed huntID variable
$view->huntID = $_GET['huntID'];
//Set the clue's number by catching the passed clueNo variable
$view->clueNo = $_GET['clueNo'];
//Set the title announcer
$view->dialogTitle = "";
//Set the main clue variable which will be used for finding the number's respective clue
$view->mainClue = "";
//Set an empty variable for the hunt's name
$view->huntName = "";
//Initialise empty string variable for when a request to create a form is needed
$view->formUpdateDialog = "";
//Set the page title
$view->pageTitle = 'Hunt Clue Found';
//Require from the replies class
require_once('Models/class.hunts.php');
//Require from the replyListing class
require_once('Models/class.huntListing.php');
//Require from the updateListing class
require_once('Models/class.updateListing.php');
//Require the sessions class
require_once('Models/class.sessions.php');

//Declare a variable as a new object of class HuntListing
$huntList = new HuntListing();
//Declare a variable as a new object of class UpdateListing
$updateList = new UpdateListing();
//Create a new session 
$session = new Session();

//Assign a local variable storing the session 's id value
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

//Check if the hunt exists by calling the checkHuntExistence method, then assign to variable
$view->huntExists = $huntList->checkHuntExists($view->huntID);
//If the huntExists variable holds "false" as the return value
if ($view->huntExists == "false") {
//Set the page's title to tell user that the hunt/clue does not exist
$view->dialogTitle = "Hunt Nonexistent";
//If the huntExists variable holds "true" as the return value
} else if ($view->huntExists == "true") {
//Retreive a hunt from the UserListing class by giving it the hunt's id
$hunt = $huntList->retrieveHuntByID($view->huntID);
//Initialise hunt name variable by calling hunt's getHuntName variable
$view->huntName = $hunt->getHuntName();   
//If the local clue number equals 1
if ($view->clueNo == "1") {
    //Set the local mainClue variable to "Clue Found"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getClue1 method
    $view->mainClue = $hunt->getClue1();
    //Assign the local formUpdateDialog variable "You have found clue 1 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Clue 1 of ".$view->huntName.": ".$view->mainClue;
    //}
//If the local clue number equals 2
} else if ($view->clueNo == "2") {
    //If the hunt's getClue2 method returns nothing
    if ($hunt->getClue2() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else {
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getClue2 method
    $view->mainClue = $hunt->getClue2();
        //Assign the local formUpdateDialog variable "You have found clue 2 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Clue 2 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals 3
} else if ($view->clueNo == "3") {
    //If the hunt's getClue3 method returns nothing
    if ($hunt->getClue3() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else {
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getClue3 method
    $view->mainClue = $hunt->getClue3();
        //Assign the local formUpdateDialog variable "You have found clue 3 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Clue 3 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals 4
} else if ($view->clueNo == "4") {
    //If the hunt's getClue4 method returns nothing
    if ($hunt->getClue4() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else {
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getClue4 method
    $view->mainClue = $hunt->getClue4();
        //Assign the local formUpdateDialog variable "You have found clue 4 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Clue 4 of ".$view->huntName.": ".$view->mainClue;
    }
    //If the local clue number equals 5
} else if ($view->clueNo == "5") {
    //If the hunt's getClue5 method returns nothing
    if ($hunt->getClue5() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else {
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getClue5 method
    $view->mainClue = $hunt->getClue5();
        //Assign the local formUpdateDialog variable "You have found clue 5 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Clue 5 of ".$view->huntName.": ".$view->mainClue; 
    }
//If the local clue number equals 6 
} else if ($view->clueNo == "6") {
    //If the hunt's getClue6 method returns nothing
    if ($hunt->getClue6() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else {
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getClue6 method
    $view->mainClue = $hunt->getClue6();
        //Assign the local formUpdateDialog variable "You have found clue 6 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Clue 6 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals 7
} else if ($view->clueNo == "7") {
    //If the hunt's getClue7 method returns nothing
    if ($hunt->getClue7() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else {
        //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getClue7 method
    $view->mainClue = $hunt->getClue7();
        //Assign the local formUpdateDialog variable "You have found clue 7 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Clue 7 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals alt1
} else if ($view->clueNo == "alt1") {
    //If the hunt's getAltClue1 method returns nothing
     if ($hunt->getAltClue1() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else {
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getAltClue1 method
    $view->mainClue = $hunt->getAltClue1();
    //Assign the local formUpdateDialog variable "You have found Alternative Path 1 clue 1 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Alternative Path 1 Clue 1 of ".$view->huntName.": ".$view->mainClue;
    }
 //If the local clue number equals alt2
} else if ($view->clueNo == "alt2") {
    //If the hunt's getAltClue2 method returns nothing
     if ($hunt->getAltClue2() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else {
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getAltClue2 method
    $view->mainClue = $hunt->getAltClue2();
    //Assign the local formUpdateDialog variable "You have found Alternative Path 1 clue 2 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Alternative Path 1 Clue 2 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals alt3
    } else if ($view->clueNo == "alt3") {
        //If the hunt's getAltClue3 method returns nothing
        if ($hunt->getAltClue3() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else {
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getAltClue3 method
    $view->mainClue = $hunt->getAltClue3();
            //Assign the local formUpdateDialog variable "You have found Alternative Path 1 clue 3 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Alternative Path 1 Clue 3 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals alt4
    } else if ($view->clueNo == "alt4") {
        //If the hunt's getAltClue4 method returns nothing
         if ($hunt->getAltClue4() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else {
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getAltClue4 method
    $view->mainClue = $hunt->getAltClue4();
            //Assign the local formUpdateDialog variable "You have found Alternative Path 1 clue 4 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Alternative Path 1 Clue 4 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals alt5
} else if ($view->clueNo == "alt5") {
        //If the hunt's getAltClue5 method returns nothing
         if ($hunt->getAltClue5() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else {        
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getAltClue5 method
    $view->mainClue = $hunt->getAltClue5();
            //Assign the local formUpdateDialog variable "You have found Alternative Path 1 clue 5 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Alternative Path 1 Clue 5 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals alt6
} else if ($view->clueNo == "alt6") {
    //If the hunt's getAltClue6 method returns nothing
    if ($hunt->getAltClue6() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else {  
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getAltClue6 method
    $view->mainClue = $hunt->getAltClue6();
            //Assign the local formUpdateDialog variable "You have found Alternative Path 1 clue 6 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Alternative Path 1 Clue 6 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals alt7
} else if ($view->clueNo == "alt7") {
    //If the hunt's getAltClue7 method returns nothing
     if ($hunt->getAltClue7() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else { 
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getAltClue7 method
    $view->mainClue = $hunt->getAltClue7();
            //Assign the local formUpdateDialog variable "You have found Alternative Path 1 clue 7 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Alternative Path 1 Clue 7 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals alt1r2
}  else if ($view->clueNo == "alt1r2") {   
     if ($hunt->getAlt2Clue1() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else { 
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getAlt2Clue1 method
    $view->mainClue = $hunt->getAlt2Clue1();
    //Assign the local formUpdateDialog variable "You have found Alternative Path 2 clue 1 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Alternative Path 2 Clue 1 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals alt2r2
}  else if ($view->clueNo == "alt2r2") {   
    //If the hunt's getAlt2Clue1 method returns nothing
     if ($hunt->getAlt2Clue2() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else { 
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getAlt2Clue2 method
    $view->mainClue = $hunt->getAlt2Clue2();
    //Assign the local formUpdateDialog variable "You have found Alternative Path 2 clue 2 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Alternative Path 2 Clue 2 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals alt3r2
}  else if ($view->clueNo == "alt3r2") {   
    //If the hunt's getAlt2Clue3 method returns nothing
     if ($hunt->getAlt2Clue3() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else { 
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getAlt2Clue3 method
    $view->mainClue = $hunt->getAlt2Clue3();
    //Assign the local formUpdateDialog variable "You have found Alternative Path 2 clue 3 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Alternative Path 2 Clue 3 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals alt4r2
}  else if ($view->clueNo == "alt4r2") {
    //If the hunt's getAlt2Clue4 method returns nothing
     if ($hunt->getAlt2Clue4() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else {    
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getAlt2Clue4 method
    $view->mainClue = $hunt->getAlt2Clue4();
    //Assign the local formUpdateDialog variable "You have found Alternative Path 2 clue 4 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Alternative Path 2 Clue 4 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals alt5r2
}  else if ($view->clueNo == "alt5r2") {
    //If the hunt's getAlt2Clue5 method returns nothing
     if ($hunt->getAlt2Clue5() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else {      
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getAlt2Clue5 method
    $view->mainClue = $hunt->getAlt2Clue5();
    //Assign the local formUpdateDialog variable "You have found Alternative Path 2 clue 5 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Alternative Path 2 Clue 5 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals alt6r2
}  else if ($view->clueNo == "alt6r2") {
    //If the hunt's getAlt2Clue6 method returns nothing
     if ($hunt->getAlt2Clue6() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else {      
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getAlt2Clue6 method
    $view->mainClue = $hunt->getAlt2Clue6();
    //Assign the local formUpdateDialog variable "You have found Alternative Path 2 clue 6 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Alternative Path 2 Clue 6 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals alt7r2
}  else if ($view->clueNo == "alt7r2") {
    //If the hunt's getAlt2Clue7 method returns nothing
     if ($hunt->getAlt2Clue7() == null) {
        //Change the huntExists variable back to false
        $view->huntExists = "false";
        //Set the page's title to tell user that the hunt/clue does not exist
        $view->dialogTitle = "Clue nonexistent";
    } else {      
    //Set the local mainClue variable to "Clue Found!"
    $view->dialogTitle = "Clue Found!";
    //Assign to the local mainClue variable the returned value of the hunt object's getAlt2Clue7 method
    $view->mainClue = $hunt->getAlt2Clue7();
    //Assign the local formUpdateDialog variable "You have found Alternative Path 2 clue 7 of (local hunt name variable): (local mainClue value)"
    $view->formUpdateDialog = "You have found Alternative Path 2 Clue 7 of ".$view->huntName.": ".$view->mainClue;
    }
//If the local clue number equals Finish
}  else if ($view->clueNo == "Finish") {
    //Set the local mainClue variable to "Congratulations!!! You have finished (hunt node's respective hunt name)"
    $view->dialogTitle = "Congratulations!!! You have finished ".$view->huntName."!!";
    //Assign to the local mainClue variable the returned value of the hunt object's getHuntFinish method
    $view->mainClue = $hunt->getHuntFinish();
    //Assign the local formUpdateDialog variable "(local huntName value) finished: (local mainClue value)"
    $view->formUpdateDialog = $view->huntName." finished: ".$view->mainClue;
} else {
   //Change the huntExists variable back to false
   $view->huntExists = "false";
   //Set the page's title to tell user that the hunt/clue does not exist
   $view->dialogTitle = "Clue nonexistent"; 
}
}

//If the "return" button on the phtml page has been clicked
if (isset($_POST['return'])) {
    //Insert the post object into the update list by calling the update list object's inserttbl method
    $updateList->inserttbl($_POST);
    //If the hunt's huntStatus is ongoing and the clue number is the final clue
    if ($hunt->getHuntStatus() == "Ongoing" && $view->clueNo == "Finish") {
        //Call the hunt listing object's switchHuntStatus method
        $huntList->switchHuntStatus($_POST);
        //Call the update listing object's announceHuntWinnerToAll method
        $updateList->announceHuntWinnerToAll($_POST);
    }
    //Redirect to the clue listing of this clue's respective hunt (by passing the URL the results of the hunt object's getId and getHuntName method
    header('location: huntClues.php?huntID='.$hunt->getId().'&huntName='.$hunt->getHuntName());
}
//Require the appropriate view to display the page on the internet browser
require_once('Views/huntNode.phtml');

