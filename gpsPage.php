<?php
//Set the view as a new stdClass
$view = new stdClass();
//Set up the page's title
$view->pageTitle = 'GPS Page';

//Require from the huntListing class
require('Models/class.huntListing.php');
//Require from the updateListing class
require_once('Models/class.updateListing.php');
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
//Assign a value for the session's user avatar
$view->sessionAvatar = $session->getSession('userAvatar');

//Set up an empty variable for the next clue to be discovered
$view->nextClue = '';
//Create a local huntListing instance
$view->huntObject = new HuntListing();
//Create a new updateListing instance
$view->updateList = new UpdateListing();
//Create a method for displaying the rough location for the next clue
$view->nextClueLocation = '';
//Set up a variable for getting a possible latitude session
$view->latitude = $session->getSession('latitude');
//Set up a variable for getting a possible longitude session
$view->longitude = $session->getSession('longitude');
//Set up a variable for getting a possible accuracy session
$view->accuracy = $session->getSession('accuracy');
//Create an array for storing user sessions needed to pinpoint all logged on user locations on the GPS
$view->sessionList = array();
//Create a 1st array for storing default path clue related values
$view->table1 = array();
//Create a 2nd array for storing alternate path 1 clue related values
$view->table2 = array();
//Create a 3rd array for storing alternate path 2 clue related values
$view->table3 = array();

//If the "goToGPSPage/submit" button from the huntClues.phtml page has been clicked
if (isset($_POST['goToGPSPage'])) {
    
    //Set the local hunt ID as a local variable, holding the same value as the posted object's huntID field
    $localHuntID = $_POST['huntID'];
    //Call the hunt object's fetchById method by passing it the hunt ID variable's value, then assign to a "huntFound" variable
    $huntFound = $view->huntObject->fetchById($localHuntID);
    //Get the return value from the fetchById method, then convert it into a new Hunt instance
    $hunt = new Hunt($huntFound);
    
    //Require from the updateListing class
    require_once ('Models/class.updateListing.php');
    //Create an instance of the updateListing class
    $updateObject = new UpdateListing();
    //Get all updates belonging to the user by calling the userListing class' fetchUpdatesByID method and passing it the user's session ID value
    $userUpdates = $updateObject->fetchUpdatesByID($view->sessionID);
    
    //Create the page's variable for handling the default path's next clue location and give it a default value of clue 1's location 
    $view->nextClueLocation = $hunt->getClue1Location();
    
    //Create the page's variable for handling alternate path 1's next clue location and give it a default value of the path's clue 1's location
    $view->nextClueLocation2 = "";
    //If there is a return value from the hunt object's getAltClue1Location method
    if ($hunt->getAltClue1Location() != null) {
        //Assign the value of altClue1Location to the local nextClueLocation2 variable
        $view->nextClueLocation2 = $hunt->getAltClue1Location();
    //If there is a return value from the hunt object's getAltClue2Location method
    } else if ($hunt->getAltClue2Location() != null) {
        //Assign the value of altClue2Location to the local nextClueLocation2 variable
        $view->nextClueLocation2 = $hunt->getAltClue2Location();
    //If there is a return value from the hunt object's getAltClue3Location method
    } else if ($hunt->getAltClue3Location() != null) {
        //Assign the value of altClue3Location to the local nextClueLocation2 variable
        $view->nextClueLocation2 = $hunt->getAltClue3Location();
    //If there is a return value from the hunt object's getAltClue4Location method
    } else if ($hunt->getAltClue4Location() != null) {
        //Assign the value of altClue4Location to the local nextClueLocation2 variable
        $view->nextClueLocation2 = $hunt->getAltClue4Location();
    //If there is a return value from the hunt object's getAltClue5Location method
    } else if ($hunt->getAltClue5Location() != null) {
        //Assign the value of altClue5Location to the local nextClueLocation2 variable
        $view->nextClueLocation2 = $hunt->getAltClue5Location();
    //If there is a return value from the hunt object's getAltClue6Location method
    } else if ($hunt->getAltClue6Location() != null) {
        //Assign the value of altClue6Location to the local nextClueLocation2 variable
        $view->nextClueLocation2 = $hunt->getAltClue6Location();
    //If there is a return value from the hunt object's getAltClue7Location method
    } else if ($hunt->getAltClue7Location() != null) {
        //Assign the value of altClue7Location to the local nextClueLocation2 variable
        $view->nextClueLocation2 = $hunt->getAltClue7Location();
    }
    
    //Create the page's variable for handling alternate path 2's next clue location and give it a default value of the path's clue 1's location
    $view->nextClueLocation3 = "";
    //If there is a return value from the hunt object's getAlt2Clue1Location method
    if ($hunt->getAltClue1Location() != null) {
        //Assign the value of alt2Clue1Location to the local nextClueLocation3 variable
        $view->nextClueLocation3 = $hunt->getAlt2Clue1Location();
    //If there is a return value from the hunt object's getAlt2Clue2Location method
    } else if ($hunt->getAltClue2Location() != null) {
        //Assign the value of alt2Clue2Location to the local nextClueLocation3 variable
        $view->nextClueLocation3 = $hunt->getAlt2Clue2Location();
    //If there is a return value from the hunt object's getAlt2Clue3Location method
    } else if ($hunt->getAltClue3Location() != null) {
        //Assign the value of alt2Clue3Location to the local nextClueLocation3 variable
        $view->nextClueLocation3 = $hunt->getAlt2Clue3Location();
    //If there is a return value from the hunt object's getAlt2Clue4Location method
    } else if ($hunt->getAltClue4Location() != null) {
        //Assign the value of alt2Clue4Location to the local nextClueLocation3 variable
        $view->nextClueLocation3 = $hunt->getAlt2Clue4Location();
    //If there is a return value from the hunt object's getAlt2Clue5Location method
    } else if ($hunt->getAltClue5Location() != null) {
        //Assign the value of alt2Clue5Location to the local nextClueLocation3 variable
        $view->nextClueLocation3 = $hunt->getAlt2Clue5Location();
    //If there is a return value from the hunt object's getAlt2Clue6Location method
    } else if ($hunt->getAltClue6Location() != null) {
        //Assign the value of alt2Clue6Location to the local nextClueLocation3 variable
        $view->nextClueLocation3 = $hunt->getAlt2Clue6Location();
    //If there is a return value from the hunt object's getAlt2Clue7Location method
    } else if ($hunt->getAltClue7Location() != null) {
        //Assign the value of alt2Clue7Location to the local nextClueLocation3 variable
        $view->nextClueLocation3 = $hunt->getAlt2Clue7Location();
    }

    //Add the clue 1 number to the table1 table
    $view->table1[] = "Clue 1";
    //Add to the table1 array the value of the hunt's clue 1
    $view->table1[] = $hunt->getClue1();
    //Add to the table1 array the value of the hunt's clue 1 location
    $view->table1[] = $hunt->getClue1Location();
    //If the default hunt path's clue 2 location is null
    if ($hunt->getClue2Location() == null) {
        //Do Nothing
    } else {
        //Add the clue 2 number to the table1 array
        $view->table1[] = "Clue 2";
        //Add to the table1 array the value of the hunt's clue 2
        $view->table1[] = $hunt->getClue2();
        //Add to the table1 array the hunt's clue 2 location
        $view->table1[] = $hunt->getClue2Location();
    }
    //If the default hunt path's clue 3 location is null
    if ($hunt->getClue3Location() == null) {
        //Do Nothing
    } else { 
        //Add the clue 3 number to the table1 array
        $view->table1[] = "Clue 3";
        //Add to the table1 array the value of the hunt's clue 3
        $view->table1[] = $hunt->getClue3();
        //Add to the table1 array the hunt's clue 3 location
        $view->table1[] = $hunt->getClue3Location();
    }
    //If the default hunt path's clue 4 location is null
    if ($hunt->getClue4Location() == null) {
        //Do Nothing
    } else {
        //Add the clue 4 number to the table1 array
        $view->table1[] = "Clue 4";
        //Add to the table1 array the value of the hunt's clue 4
        $view->table1[] = $hunt->getClue4();
        //Add to the table1 array the hunt's clue 4 location
        $view->table1[] = $hunt->getClue4Location();
    }
    //If the default hunt path's clue 5 location is null
    if ($hunt->getClue5Location() == null) {
        //Do Nothing
    } else {
        //Add the clue 5 number to the table1 array
        $view->table1[] = "Clue 5";
        //Add to the table1 array the value of the hunt's clue 5
        $view->table1[] = $hunt->getClue5();
        //Add to the table1 array the hunt's clue 5 location
        $view->table1[] = $hunt->getClue5Location();
    }
    //If the default hunt path's clue 6 location is null
    if ($hunt->getClue6Location() == null) {
        //Do Nothing
    } else {
        //Add the clue 6 number to the table1 array
        $view->table1[] = "Clue 6";
        //Add to the table1 array the value of the hunt's clue 6
        $view->table1[] = $hunt->getClue6();
        //Add to the table1 array the hunt's clue 6 location
        $view->table1[] = $hunt->getClue6Location();
    }
    //If the default hunt path's clue 7 location is null
    if ($hunt->getClue7Location() == null) {
        //Do Nothing
    } else {
        //Add the clue 7 number to the table1 array
        $view->table1[] = "Clue 7";
        //Add to the table1 array the value of the hunt's clue 7
        $view->table1[] = $hunt->getClue7();
        //Add to the table1 array the hunt's clue 7 location
        $view->table1[] = $hunt->getClue7Location();
    }
    //Create the next entry in table1 as End Loop, which acts as a stop and leads to the hunt finish 
    $view->table1[] = "End Loop";
    //If the alternate hunt path 1's clue 1 location is null
    if ($hunt->getAltClue1Location() == null) {
        //Do Nothing
    } else {
        //Add the alt path 1 clue 1 number to the table2 array
        $view->table2[] = "Alternative Path 1 Clue 1";
        //Add to the table2 array the value of the hunt's alt 1 clue 1
        $view->table2[] = $hunt->getAltClue1();
        //Add to the table2 array the hunt's alt 1 clue 1 location
        $view->table2[] = $hunt->getAltClue1Location();
    }
    //If the alternate hunt path 1's clue 2 location is null
    if ($hunt->getAltClue2Location() == null) {
        //Do Nothing
    } else {
        //Add the alt path 1 clue 2 number to the table2 array
        $view->table2[] = "Alternative Path 1 Clue 2";
        //Add to the table2 array the value of the hunt's alt 1 clue 2
        $view->table2[] = $hunt->getAltClue2();
        //Add to the table2 array the hunt's alt 1 clue 2 location
        $view->table2[] = $hunt->getAltClue2Location();
    }
    //If the alternate hunt path 1's clue 3 location is null
    if ($hunt->getAltClue3Location() == null) {
        //Do Nothing
    } else {
        //Add the alt path 1 clue 3 number to the table2 array
        $view->table2[] = "Alternative Path 1 Clue 3";
        //Add to the table2 array the value of the hunt's alt 1 clue 3
        $view->table2[] = $hunt->getAltClue3();
        //Add to the table2 array the hunt's alt 1 clue 3 location
        $view->table2[] = $hunt->getAltClue3Location();
    }
    //If the alternate hunt path 1's clue 4 location is null
    if ($hunt->getAltClue4Location() == null) {
        //Do Nothing
    } else {
        //Add the alt path 1 clue 4 number to the table2 array
        $view->table2[] = "Alternative Path 1 Clue 4";
        //Add to the table2 array the value of the hunt's alt 1 clue 4
        $view->table2[] = $hunt->getAltClue4();
        //Add to the table2 array the hunt's alt 1 clue 4 location
        $view->table2[] = $hunt->getAltClue4Location();
    }
    //If the alternate hunt path 1's clue 5 location is null
    if ($hunt->getAltClue5Location() == null) {
        //Do Nothing
    } else {
        //Add the alt path 1 clue 5 number to the table2 array
        $view->table2[] = "Alternative Path 1 Clue 5";
        //Add to the table2 array the value of the hunt's alt 1 clue 5
        $view->table2[] = $hunt->getAltClue5();
        //Add to the table2 array the hunt's alt 1 clue 5 location
        $view->table2[] = $hunt->getAltClue5Location();
    }
    //If the alternate hunt path 1's clue 6 location is null
    if ($hunt->getAltClue6Location() == null) {
        //Do Nothing
    } else {
        //Add the alt path 1 clue 6 number to the table2 array
        $view->table2[] = "Alternative Path 1 Clue 6";
        //Add to the table2 array the value of the hunt's alt 1 clue 6
        $view->table2[] = $hunt->getAltClue6();
        //Add to the table2 array the hunt's alt 1 clue 6 location
        $view->table2[] = $hunt->getAltClue6Location();
    }
    //If the alternate hunt path 1's clue 7 location is null
    if ($hunt->getAltClue7Location() == null) {
        //Do Nothing
    } else {
        //Add the alt path 1 clue 7 number to the table2 array
        $view->table2[] = "Alternative Path 1 Clue 7";
        //Add to the table2 array the value of the hunt's alt 1 clue 7
        $view->table2[] = $hunt->getAltClue7();
        //Add to the table2 array the hunt's alt 1 clue 7 location
        $view->table2[] = $hunt->getAltClue7Location();
    }
    //Create the next entry in table2 as End Loop, which acts as a stop and leads to the hunt finish 
    $view->table2[] = "End Loop";
    //If the alternate hunt path 2's clue 3 location is null
    if ($hunt->getAlt2Clue3Location() == null) {
        //Do Nothing
    } else {
        //Add the alt path 2 clue 1 number to the table3 array
        $view->table3[] = "Alternative Path 2 Clue 1";
        //Add to the table3 array the value of the hunt's alt 2 clue 1
        $view->table3[] = $hunt->getAlt2Clue1();
        //Add to the table3 array the hunt's alt 2 clue 1 location
        $view->table3[] = $hunt->getAlt2Clue1Location();
    }
    //If the alternate hunt path 2's clue 2 location is null
    if ($hunt->getAlt2Clue2Location() == null) {
        //Do Nothing
    } else {
        //Add the alt path 2 clue 2 number to the table3 array
        $view->table3[] = "Alternative Path 2 Clue 2";
        //Add to the table3 array the value of the hunt's alt 2 clue 2
        $view->table3[] = $hunt->getAlt2Clue2();
        //Add to the table3 array the hunt's alt 2 clue 2 location
        $view->table3[] = $hunt->getAlt2Clue2Location();
    }
    //If the alternate hunt path 2's clue 3 location is null
    if ($hunt->getAlt2Clue3Location() == null) {
        //Do Nothing
    } else {
        //Add the alt path 2 clue 3 number to the table3 array
        $view->table3[] = "Alternative Path 2 Clue 3";
        //Add to the table3 array the value of the hunt's alt 2 clue 3
        $view->table3[] = $hunt->getAlt2Clue3();
        //Add to the table3 array the hunt's alt 2 clue 3 location
        $view->table3[] = $hunt->getAlt2Clue3Location();
    }
    //If the alternate hunt path 2's clue 4 location is null
    if ($hunt->getAlt2Clue4Location() == null) {
        //Do Nothing
    } else {
        //Add the alt path 2 clue 4 number to the table3 array
        $view->table3[] = "Alternative Path 2 Clue 4";
        //Add to the table3 array the value of the hunt's alt 2 clue 4
        $view->table3[] = $hunt->getAlt2Clue4();
        //Add to the table3 array the hunt's alt 2 clue 4 location
        $view->table3[] = $hunt->getAlt2Clue4Location();
    }
    //If the alternate hunt path 2's clue 5 location is null
    if ($hunt->getAlt2Clue5Location() == null) {
        //Do Nothing
    } else {
        //Add the alt path 2 clue 5 number to the table3 array
        $view->table3[] = "Alternative Path 2 Clue 5";
        //Add to the table3 array the value of the hunt's alt 2 clue 5
        $view->table3[] = $hunt->getAlt2Clue5();
        //Add to the table3 array the hunt's alt 2 clue 5 location
        $view->table3[] = $hunt->getAlt2Clue5Location();
    }
    //If the alternate hunt path 2's clue 6 location is null
    if ($hunt->getAlt2Clue6Location() == null) {
        //Do Nothing
    } else {
        //Add the alt path 2 clue 6 number to the table3 array
        $view->table3[] = "Alternative Path 2 Clue 6";
        //Add to the table3 array the value of the hunt's alt 2 clue 6
        $view->table3[] = $hunt->getAlt2Clue6();
        //Add to the table3 array the hunt's alt 2 clue 6 location
        $view->table3[] = $hunt->getAlt2Clue6Location();
    }
    //If the alternate hunt path 2's clue 7 location is null
    if ($hunt->getAlt2Clue7Location() == null) {
        //Do Nothing
    } else {
        //Add the alt path 2 clue 7 number to the table3 array
        $view->table3[] = "Alternative Path 2 Clue 7";
        //Add to the table3 array the value of the hunt's alt 2 clue 7
        $view->table3[] = $hunt->getAlt2Clue7();
        //Add to the table3 array the hunt's alt 2 clue 7 location
        $view->table3[] = $hunt->getAlt2Clue7Location();
    }
    //Create the next entry in table3 as End Loop, which acts as a stop and leads to the hunt finish 
    $view->table3[] = "End Loop";
    //Create an interval value for scrolling through the table entries (3 at a time) to determine if each entry is a clue number, clue, clue location or "End Loop" stop
    $interval = 0;
    //Create a ticket value for the 1st table to scroll through each entry in the table
    $ticket1 = 0;
    //Create a ticket value for the 2nd table to scroll through each entry in the table
    $ticket2 = 0;
    //Create a ticket value for the 3rd table to scroll through each entry in the table
    $ticket3 = 0;
    //Create variables for storing clue number values in each table
    $clueNo = "";
    $clueNo2 = "";
    $clueNo3 = "";
    //Create variables for storing clue values in each table
    $clue = "";
    $clue2 = "";
    $clue3 = "";
    //Create variables for storing clue location values in each table
    $clueLoc = "";
    $clueLoc2 = "";
    $clueLoc3 = "";
    
    //For every entry stored in the table for the default path
    foreach ($view->table1 as $tab1){
        //If the entry value does not equal "End Loop"
        if ($tab1 != "End Loop") {
            //If the interval value equals 0 (entry is a clue number)
            if ($interval == 0) {
              //Assign the clue number value with the same as the table entry
              $clueNo = $tab1;
              //Increment the ticket by one
              $ticket1 = $ticket1 + 1;
              //Set the interval value as 1, ready to count the next table entry as a clue
              $interval = 1;
            //If the interval value equals 1 (is a clue)
            } else if ($interval == 1) {
                //Assign the clue value so that it is the same as the table entry
                $clue = $tab1; 
                //Increment the ticket value by 1
                $ticket1 = $ticket1 + 1;
                //Set the interval value as 2, ready to count the next table entry as a clue location
                $interval = 2;
            //If the interval value is 2 (table entry is a clue location)
            } else if ($interval == 2) {
                //Assign the clue location so that it stores the same value as the table entry
               $clueLoc = $tab1;
               //For each entry in the userUpdates array
               foreach ($userUpdates as $update) {
                  //If the update's getUpdateContent value matches the followign String
                  if ($update->getUpdateContent() == "You have found ".$clueNo." of ".$hunt->getHuntName().": ".$clue) {
                    //If the table entry after the current one equals "End Loop"
                    if ($view->table1[($ticket1 + 1)] == "End Loop") {
                    //Set the main clue location as the hunt finish location
                        $view->nextClueLocation = $hunt->getHuntFinishLocation();
                    //If the next entry in the table is a clue number instead of "End Loop"
                    } else {
                        //Set up the next clue location as the next clue location
                        $view->nextClueLocation = $clueLoc;
                    }
                  } else {
                      //Do Nothing
                  }
              }
              //Increment the ticket value by 1
              $ticket1 = $ticket1 + 1;
              //Return the interval value back to 0
              $interval = 0;
              //Set the clue no value back to null
              $clueNo = "";
              //Set the clue value back to null
              $clue = "";
              //Set the clue location value back to null
              $clueLoc = "";
          }
      //Otherwise, if the current table entry does equal "End Loop"
      } else if ($tab1 == "End Loop") {
          //Do Nothing
      }
    }
    
    //For every entry in the table2 table
    foreach ($view->table2 as $tab2) {
        //If the entry value does not equal "End Loop"
        if ($tab2 != "End Loop") {
            //If the interval value equals 0 (entry is a clue number)
            if ($interval == 0) {
              //Assign the clue number value with the same as the table entry
              $clueNo2 = $tab2;
              //Increment the ticket by one
              $ticket2 = $ticket2 + 1;
              //Set the interval value as 1, ready to count the next table entry as a clue
              $interval = 1;
            //If the interval value equals 1 (is a clue)
            } else if ($interval == 1) {
                //Assign the clue value so that it is the same as the table entry
                $clue2 = $tab2; 
                //Increment the ticket value by 1
                $ticket2 = $ticket2 + 1;
                //Set the interval value as 2, ready to count the next table entry as a clue location
                $interval = 2;
            //If the interval value is 2 (table entry is a clue location)
            } else if ($interval == 2) {
                 //Assign the clue location so that it stores the same value as the table entry
               $clueLoc2 = $tab2;
               //For each entry in the userUpdates array
               foreach ($userUpdates as $update) {
                  //If the update's getUpdateContent value matches the followign String
                  if ($update->getUpdateContent() == "You have found ".$clueNo2." of ".$hunt->getHuntName().": ".$clue2) {
                    //If the table entry after the current one equals "End Loop"
                    if ($view->table2[($ticket2 + 1)] == "End Loop") {
                    //Set the main clue location as the hunt finish location
                        $view->nextClueLocation2 = $hunt->getHuntFinishLocation();
                    //If the next entry in the table is a clue number instead of "End Loop"
                    } else {
                        //Set up the next clue location as the next clue location
                        $view->nextClueLocation2 = $clueLoc2;
                    }
                  } else {
                      //Do Nothing
                  }
              }
              //Increment the ticket value by 1
              $ticket2 = $ticket2 + 1;
              //Return the interval value back to 0
              $interval = 0;
              //Set the clue no value back to null
              $clueNo2 = "";
              //Set the clue value back to null
              $clue2 = "";
              //Set the clue location value back to null
              $clueLoc2 = "";
            }
      //Otherwise, if the current table entry does equal "End Loop"
      } else if ($tab2 == "End Loop") {
          //Do Nothing
      }
    }
    
    //For every entry in the table3 table
    foreach ($view->table3 as $tab3) {
        //If the entry value does not equal "End Loop"
        if ($tab3 != "End Loop") {
            //If the interval value equals 0 (entry is a clue number)
            if ($interval == 0) {
              //Assign the clue number value with the same as the table entry
              $clueNo3 = $tab3;
              //Increment the ticket by one
              $ticket3 = $ticket3 + 1;
              //Set the interval value as 1, ready to count the next table entry as a clue
              $interval = 1;
            //If the interval value equals 1 (is a clue)
            } else if ($interval == 1) {
                //Assign the clue value so that it is the same as the table entry
                $clue3 = $tab3; 
                //Increment the ticket value by 1
                $ticket3 = $ticket3 + 1;
                //Set the interval value as 2, ready to count the next table entry as a clue location
                $interval = 2;
            //If the interval value is 2 (table entry is a clue location)
            } else if ($interval == 2) {
                 //Assign the clue location so that it stores the same value as the table entry
               $clueLoc3 = $tab3;
               //For each entry in the userUpdates array
               foreach ($userUpdates as $update) {
                  //If the update's getUpdateContent value matches the followign String
                  if ($update->getUpdateContent() == "You have found ".$clueNo3." of ".$hunt->getHuntName().": ".$clue3) {
                    //If the table entry after the current one equals "End Loop"
                    if ($view->table3[($ticket3 + 1)] == "End Loop") {
                    //Set the main clue location as the hunt finish location
                        $view->nextClueLocation3 = $hunt->getHuntFinishLocation();
                    //If the next entry in the table is a clue number instead of "End Loop"
                    } else {
                        //Set up the next clue location as the next clue location
                        $view->nextClueLocation3 = $clueLoc3;
                    }
                  } else {
                      //Do Nothing
                  }
              }
              //Increment the ticket value by 1
              $ticket3 = $ticket3 + 1;
              //Return the interval value back to 0
              $interval = 0;
              //Set the clue no value back to null
              $clueNo3 = "";
              //Set the clue value back to null
              $clue3 = "";
              //Set the clue location value back to null
              $clueLoc3 = "";
          }
      //Otherwise, if the current table entry does equal "End Loop"
      } else if ($tab3 == "End Loop") {
          //Do Nothing
      }
    }
    
//Declare a value for storing the next clue location in order to be sent off to a google website for location processing
$prepAddr = str_replace(' ','+',$view->nextClueLocation); 
//call the google website by passing the clue variable in it's URL
$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false'); 
//Initialise the output so that we can extract the latitude and longitude from it
$output= json_decode($geocode); 
//Extract the latitude and set as variable
$view->clueLatitude = $output->results[0]->geometry->location->lat;
//Extract the longitude and set as variable
$view->clueLongitude = $output->results[0]->geometry->location->lng; 

//Declare a value for storing the next clue location in order to be sent off to a google website for location processing
$prepAddr2 = str_replace(' ','+',$view->nextClueLocation2); 
//call the google website by passing the clue variable in it's URL
$geocode2=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr2.'&sensor=false'); 
//Initialise the output so that we can extract the latitude and longitude from it
$output2= json_decode($geocode2); 
//Extract the latitude and set as variable
$view->clueLatitude2 = $output2->results[0]->geometry->location->lat;
//Extract the longitude and set as variable
$view->clueLongitude2 = $output2->results[0]->geometry->location->lng; 

//Declare a value for storing the next clue location in order to be sent off to a google website for location processing
$prepAddr3 = str_replace(' ','+',$view->nextClueLocation3); 
//call the google website by passing the clue variable in it's URL
$geocode3=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr3.'&sensor=false'); 
//Initialise the output so that we can extract the latitude and longitude from it
$output3= json_decode($geocode3); 
//Extract the latitude and set as variable
$view->clueLatitude3 = $output3->results[0]->geometry->location->lat;
//Extract the longitude and set as variable
$view->clueLongitude3 = $output3->results[0]->geometry->location->lng; 

//Create a variable storing the path to the directory where the session files are stored
$path = session_save_path();
//If the session path exists
if (strpos($path, ";") !== FALSE) {
    //Define the path variable as such
   $path = substr($path, strpos($path, ";")+1);
}
//For each file in the directory that begins with "sess_" (session files)
foreach (glob("".$path."\sess_*") as $sessFile) {
    //Store the file's contents in a string variable
    $scanSessFile = file_get_contents($sessFile);
    //If the first two characters equal "id" (if this is an active session)
    if (substr($scanSessFile, 0, 2 ) === "id") {
        //Divide the string into an array and store in a "words" variable
        $words = explode('";', $scanSessFile);
        //Declare a variable for temporarily storing a username variable
        $tempUsername = "";
        //For each word in the words array
        foreach ($words as $word) {
            //If the first 8 characters make up "username"
            if (substr($word, 0, 8 ) === 'username' ) {
                 //Have the temp username variable store the username value
                  $tempUsername = substr($word, strrpos($word, '"') + 1, strlen($word));
            //If the first 8 characters make up "latitude"
            } else if (substr($word, 0, 8 ) === 'latitude') {
                //Add the latitude value into the sessionList array
                $view->sessionList[] = substr($word, strrpos($word, '"') + 1, strlen($word));
            //If the first 9 characters make up "longitude"
            } else if (substr($word, 0, 9 ) === 'longitude') {
                //Add the longitude calue into the sessionList array
                $view->sessionList[] = substr($word, strrpos($word, '"') + 1, strlen($word));
                //Add the temp username value in the sessionList array
                $view->sessionList[] = $tempUsername;
            }
        }
    }
}
}

require_once('Views/gpsPage.phtml');
