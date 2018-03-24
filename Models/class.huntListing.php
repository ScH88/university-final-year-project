<?php

//Require from the hunts class
require_once 'Models/class.hunts.php';
//Require from the tableAbstract class
require_once 'Models/class.tableAbstract.php';
//Require from the users class
require_once 'Models/class.users.php';
//Require from the userListing class
require_once 'Models/class.userListing.php';
//Require from the updateListing class
require_once 'Models/class.updateListing.php';
//Require from the messageListing class
require_once 'Models/class.messageListing.php';

class HuntListing extends TableAbstract {
    //Define table name so that this class interacts with the "hunts" table
    protected $name = 'hunts';
    //Set the primary key as the table's "id" field
    protected $primaryKey = 'id';
    
    public function fetchAllItems() {
        //Call the readtbl() method and declare the returned result as a local variable
        $results = $this->readtbl();
        //Declare a new array variable
        $huntArray = array();
        //While the current row can be fetched from the readtbl variable and declared as a local variable
        while ($row = $results->fetch()) {
            //Declare the row as a new  object and store in the array variable declared eariler
            $huntArray[] = new Hunt($row); 
        }
        //Return the item array
        return $huntArray;
    }
    
    public function inserttbl($data) {
        //Set up an SQL to insert the following column values into each table
        $sql = 'INSERT INTO '.$this->name.' (huntName, clue1, clue1Location, clue2, clue2Location, clue3, clue3Location, clue4, clue4Location, clue5, clue5Location, clue6, clue6Location, clue7, clue7Location, altClue1, altClue1Location, altClue2, altClue2Location, altClue3, altClue3Location, altClue4, altClue4Location, altClue5, altClue5Location, altClue6, altClue6Location, altClue7, altClue7Location, alt2Clue1, alt2Clue1Location, alt2Clue2, alt2Clue2Location, alt2Clue3, alt2Clue3Location, alt2Clue4, alt2Clue4Location, alt2Clue5, alt2Clue5Location, alt2Clue6, alt2Clue6Location, alt2Clue7, alt2Clue7Location, huntFinish, huntFinishLocation, huntStatus)
        VALUES (:huntName, :clue1, :clue1Location, :clue2, :clue2Location, :clue3, :clue3Location, :clue4, :clue4Location, :clue5, :clue5Location, :clue6, :clue6Location, :clue7, :clue7Location, :altClue1, :altClue1Location, :altClue2, :altClue2Location, :altClue3, :altClue3Location, :altClue4, :altClue4Location, :altClue5, :altClue5Location, :altClue6, :altClue6Location, :altClue7, :altClue7Location, :alt2Clue1, :alt2Clue1Location, :alt2Clue2, :alt2Clue2Location, :alt2Clue3, :alt2Clue3Location, :alt2Clue4, :alt2Clue4Location, :alt2Clue5, :alt2Clue5Location, :alt2Clue6, :alt2Clue6Location, :alt2Clue7, :alt2Clue7Location, :huntFinish, :huntFinishLocation, :huntStatus)';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, declaring the column values as extracts from the "$data" input 
        $result->execute(array(
            ':huntName' => $data['huntName'],
            ':clue1' => $data['clue1'],
            ':clue1Location' => $data['clue1Location'],
            ':clue2' => $data['clue2'],
            ':clue2Location' => $data['clue2Location'],
            ':clue3' => $data['clue3'],
            ':clue3Location' => $data['clue3Location'],
            ':clue4' => $data['clue4'],
            ':clue4Location' => $data['clue4Location'],
            ':clue5' => $data['clue5'],
            ':clue5Location' => $data['clue5Location'],
            ':clue6' => $data['clue6'],
            ':clue6Location' => $data['clue6Location'],
            ':clue7' => $data['clue7'],
            ':clue7Location' => $data['clue7Location'],
            ':altClue1' => $data['altClue1'],
            ':altClue1Location' => $data['altClue1Location'],
            ':altClue2' => $data['altClue2'],
            ':altClue2Location' => $data['altClue2Location'],
            ':altClue3' => $data['altClue3'],
            ':altClue3Location' => $data['altClue3Location'],
            ':altClue4' => $data['altClue4'],
            ':altClue4Location' => $data['altClue4Location'],
            ':altClue5' => $data['altClue5'],
            ':altClue5Location' => $data['altClue5Location'],
            ':altClue6' => $data['altClue6'],
            ':altClue6Location' => $data['altClue6Location'],
            ':altClue7' => $data['altClue7'],
            ':altClue7Location' => $data['altClue7Location'],
            ':alt2Clue1' => $data['alt2Clue1'],
            ':alt2Clue1Location' => $data['alt2Clue1Location'],
            ':alt2Clue2' => $data['alt2Clue2'],
            ':alt2Clue2Location' => $data['alt2Clue2Location'],
            ':alt2Clue3' => $data['alt2Clue3'],
            ':alt2Clue3Location' => $data['alt2Clue3Location'],
            ':alt2Clue4' => $data['alt2Clue4'],
            ':alt2Clue4Location' => $data['alt2Clue4Location'],
            ':alt2Clue5' => $data['alt2Clue5'],
            ':alt2Clue5Location' => $data['alt2Clue5Location'],
            ':alt2Clue6' => $data['alt2Clue6'],
            ':alt2Clue6Location' => $data['alt2Clue6Location'],
            ':alt2Clue7' => $data['alt2Clue7'],
            ':alt2Clue7Location' => $data['alt2Clue7Location'],
            ':huntFinish' => $data['huntFinish'],
            ':huntFinishLocation' => $data['huntFinishLocation'],
            ':huntStatus' => $data['huntStatus']
            ));
        //Return the result to the table
        return $this->dbh->lastInsertID();
    }
    
    public function edittbl($data) {
        //Set up the SQL, which changes the fields where the name equals the inputted name value
        $sql = 'UPDATE '.$this->name.'
        SET clue1 = :clue1,
            clue1Location = :clue1Location,
            clue2 = :clue2,
            clue2Location = :clue2Location,
            clue3 = :clue3,
            clue3Location = :clue3Location,
            clue4 = :clue4,
            clue4Location = :clue4Location,
            clue5 = :clue5,
            clue5Location = :clue5Location,
            clue6 = :clue6,
            clue6Location = :clue6Location,
            clue7 = :clue7,
            clue7Location = :clue7Location,
            altClue1 = :altClue1,
            altClue1Location = :altClue1Location,
            altClue2 = :altClue2,
            altClue2Location = :altClue2Location,
            altClue3 = :altClue3,
            altClue3Location = :altClue3Location,
            altClue4 = :altClue4,
            altClue4Location = :altClue4Location,
            altClue5 = :altClue5,
            altClue5Location = :altClue5Location,
            altClue6 = :altClue6,
            altClue6Location = :altClue6Location,
            altClue7 = :altClue7,
            altClue7Location = :altClue7Location,
            alt2Clue1 = :alt2Clue1,
            alt2Clue1Location = :alt2Clue1Location,
            alt2Clue2 = :alt2Clue2,
            alt2Clue2Location = :alt2Clue2Location,
            alt2Clue3 = :alt2Clue3,
            alt2Clue3Location = :alt2Clue3Location,
            alt2Clue4 = :alt2Clue4,
            alt2Clue4Location = :alt2Clue4Location,
            alt2Clue5 = :alt2Clue5,
            alt2Clue5Location = :alt2Clue5Location,
            alt2Clue6 = :alt2Clue6,
            alt2Clue6Location = :alt2Clue6Location,
            alt2Clue7 = :alt2Clue7,
            alt2Clue7Location = :alt2Clue7Location,
            huntFinish = :huntFinish,
            huntFinishLocation = :huntFinishLocation,
            huntStatus = :huntStatus
            WHERE huntName = :huntName';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, using the "$data" input to declare the name value used for the search and the new column values which will replace those in the row with a matching name. Then return it to the table.
        return $result->execute(array(
             ':huntName' => $data['huntName'],
            ':clue1' => $data['clue1'],
            ':clue1Location' => $data['clue1Location'],
            ':clue2' => $data['clue2'],
            ':clue2Location' => $data['clue2Location'],
            ':clue3' => $data['clue3'],
            ':clue3Location' => $data['clue3Location'],
            ':clue4' => $data['clue4'],
            ':clue4Location' => $data['clue4Location'],
            ':clue5' => $data['clue5'],
            ':clue5Location' => $data['clue5Location'],
            ':clue6' => $data['clue6'],
            ':clue6Location' => $data['clue6Location'],
            ':clue7' => $data['clue7'],
            ':clue7Location' => $data['clue7Location'],
            ':altClue1' => $data['altClue1'],
            ':altClue1Location' => $data['altClue1Location'],
            ':altClue2' => $data['altClue2'],
            ':altClue2Location' => $data['altClue2Location'],
            ':altClue3' => $data['altClue3'],
            ':altClue3Location' => $data['altClue3Location'],
            ':altClue4' => $data['altClue4'],
            ':altClue4Location' => $data['altClue4Location'],
            ':altClue5' => $data['altClue5'],
            ':altClue5Location' => $data['altClue5Location'],
            ':altClue6' => $data['altClue6'],
            ':altClue6Location' => $data['altClue6Location'],
            ':altClue7' => $data['altClue7'],
            ':altClue7Location' => $data['altClue7Location'],
            ':alt2Clue1' => $data['alt2Clue1'],
            ':alt2Clue1Location' => $data['alt2Clue1Location'],
            ':alt2Clue2' => $data['alt2Clue2'],
            ':alt2Clue2Location' => $data['alt2Clue2Location'],
            ':alt2Clue3' => $data['alt2Clue3'],
            ':alt2Clue3Location' => $data['alt2Clue3Location'],
            ':alt2Clue4' => $data['alt2Clue4'],
            ':alt2Clue4Location' => $data['alt2Clue4Location'],
            ':alt2Clue5' => $data['alt2Clue5'],
            ':alt2Clue5Location' => $data['alt2Clue5Location'],
            ':alt2Clue6' => $data['alt2Clue6'],
            ':alt2Clue6Location' => $data['alt2Clue6Location'],
            ':alt2Clue7' => $data['alt2Clue7'],
            ':alt2Clue7Location' => $data['alt2Clue7Location'],
            ':huntFinish' => $data['huntFinish'],
            ':huntFinishLocation' => $data['huntFinishLocation'],
            ':huntStatus' => $data['huntStatus']
            ));      
    }    
    
    public function deletetbl($data) {
        //Set up the SQL, which deletes a row from the table if the name equals the name inputted
        $sql = 'DELETE FROM '.$this->name.'
        WHERE huntName = :huntName';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, with the inputted name value extracted from the "$data" input parameter
        return $result->execute(array(
            ':huntName' => $data['huntName']
            ));
    }
    
    public function fetchById($data) {
         //Set up the SQL to select a row where the the user is the same as the input
        $sql = 'SELECT * FROM '.$this->name.' WHERE id = :id';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, where the name input is extracted from the "$name" parameter
        $result->execute(array(
            ':id' => $data
            ));
        //Fetch the SQL result as a row
        $row = $result->fetch();
        //Return the row
        return $row;
    }

    public function fetchByTitle($name) {
         //Set up the SQL to select a row where the the user is the same as the input
        $sql = 'SELECT * FROM '.$this->name.' WHERE huntName = :huntName';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, where the name input is extracted from the "$name" parameter
        $result->execute(array(
            ':huntName' => $name
            ));
        //Fetch the SQL result as a row
        $row = $result->fetch();
        //Return the row
        return $row;
    }
    
    public function retrieveHuntByID($data) {
       //Set up an SQL to select a row where the input is the same as the username, email and password
        $sql = 'SELECT * FROM '.$this->name.' WHERE id = :id';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, with the username, email and password extracted from the "$data" input
        $result->execute(array(
            ':id' => $data
            ));
        //Fetch the result as a row
        $row = $result->fetch();
        //Create user instance based on row
        $foundHunt = new Hunt($row);
        //Return the User instance
        return $foundHunt;
    }
    
    public function switchHuntStatus($data) {
        //Set up the SQL, which changes the fields where the name equals the inputted name value
        $sql = 'UPDATE '.$this->name.'
        SET huntStatus = :huntStatus
        WHERE huntName = :huntName';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, using the "$data" input to declare the name value used for the search and the new column values which will replace those in the row with a matching name. Then return it to the table.
        return $result->execute(array(
            ':huntName' => $data['huntName'],
            ':huntStatus' => $data['huntStatus']
            )); 
    }
    
    public function announceNewHuntToAll($data) {
        //Create a local UserListing object
        $userTable = new UserListing();
        //Create a local MessageListing object
        $messageTable = new MessageListing();
        //Create a local UpdateListing object
        $updateTable = new UpdateListing();
        //Call the UserListing's readtbl to get all entries and assign to a local variable
        $userListing = $userTable->readtbl();
        //While the UserListing's readtbl results are still being assessed, assign current row as variable "current"
        while ($row = $userListing->fetch()) {
            //Declare the row as a new User object and store in the array variable declared eariler
            $current = new User($row); 
            //Change the posted (parameter) data's userID field to that of the current row's getID method
            $data['userID'] = $current->getID();
            //If the row's user status is "Admin"
            if ($current->getStatus() == "Admin" ) {
                //Change the posted (parameter) data's updateContent field to the following
                $data['updateContent'] = "New Hunt Created - ".$data['huntName'];
                //Create a new update object by calling the UpdateListing's insertbl method
                $updateTable->inserttbl($data);
                //Change the posted (parameter) data's updateContent field to the following
                $data['updateContent'] = "Clue 1 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=1";
                //Create a new update object by calling the UpdateListing's insertbl methoc 
                $updateTable->inserttbl($data);
                //If the "clue2" value of the posted (parameter) data is empty
                if (strlen($data['clue2']) == 0) {
                  //Do Nothing
               //If it is not empty
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                   $data['updateContent'] = "Clue 2 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=2";
                   //Create a new update object by calling the UpdateListing's insertbl method
                   $updateTable->inserttbl($data);
               } 
               //If the "clue3" value of the posted (parameter) data is empty
               if (strlen($data['clue3']) == 0) {
                  //Do nothing  
               } else {
                   //Change the parameter/posted data's updateContent field
                   $data['updateContent'] = "Clue 3 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=3";
                   //Create a new update by calling the UpdateListing's inserttbl method
                   $updateTable->inserttbl($data);
               }
               //If the "clue4" value of the posted (parameter) data is empty
               if (strlen($data['clue4']) == 0) {
                 //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                   $data['updateContent'] = "Clue 4 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=4";
                   //Create a new update object by calling the UpdateListing's insertbl method
                   $updateTable->inserttbl($data);
               }
               //If the "clue5" value of the posted (parameter) data is empty
               if (strlen($data['clue5']) == 0) {
                   //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                   $data['updateContent'] = "Clue 5 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=5";
                   //Create a new update object by calling the UpdateListing's insertbl method
                   $updateTable->inserttbl($data);
               }
               //If the "clue6" value of the posted (parameter) data is empty
               if (strlen($data['clue6']) == 0) {
                   //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                   $data['updateContent'] = "Clue 6 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=6";
                   //Create a new update object by calling the UpdateListing's insertbl method
                   $updateTable->inserttbl($data);
               }
               //If the "clue7" value of the posted (parameter) data is empty
               if (strlen($data['clue7']) == 0) {
                   //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                   $data['updateContent'] = "Clue 7 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=7";
                   //Create a new update object by calling the UpdateListing's insertbl method
                   $updateTable->inserttbl($data);
               }
               //If the "altClue1" value of the posted (parameter) data is empty
               if (strlen($data['altClue1']) == 0) {
                   //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                   $data['updateContent'] = "Alternative path 1 clue 1 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=alt1";
                   //Create a new update object by calling the UpdateListing's insertbl method
                   $updateTable->inserttbl($data);
               }
               //If the "altClue2" value of the posted (parameter) data is empty
               if (strlen($data['altClue2']) == 0) {
                   //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                   $data['updateContent'] = "Alternative path 1 clue 2 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=alt2";
                   //Create a new update object by calling the UpdateListing's insertbl method
                   $updateTable->inserttbl($data);
               } 
               //If the "altClue3" value of the posted (parameter) data is empty
               if (strlen($data['altClue3']) == 0) {
                   //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                   $data['updateContent'] = "Alternative path 1 clue 3 URL for ".$data['huntName'].":  hhttp://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=alt3";
                   //Create a new update object by calling the UpdateListing's insertbl method
                   $updateTable->inserttbl($data);      
               }           
               //If the "altClue4" value of the posted (parameter) data is empty
               if (strlen($data['altClue4']) == 0) {
                   //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                   $data['updateContent'] = "Alternative path 1 clue 4 URL for ".$data['huntName'].":  http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=alt4";
                   //Create a new update object by calling the UpdateListing's insertbl method
                   $updateTable->inserttbl($data);
               }
               //If the "altClue5" value of the posted (parameter) data is empty
               if (strlen($data['altClue5']) == 0) {
                   //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                  $data['updateContent'] = "Alternative path 1 clue 5 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=alt5";
                  //Create a new update object by calling the UpdateListing's insertbl method 
                  $updateTable->inserttbl($data); 
               }
               //If the "altClue6" value of the posted (parameter) data is empty
               if (strlen($data['altClue6']) == 0) {
                   //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                   $data['updateContent'] = "Alternative path 1 clue 6 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=alt6";
                  //Create a new update object by calling the UpdateListing's insertbl method
                   $updateTable->inserttbl($data);
               }
               //If the "altClue7" value of the posted (parameter) data is empty
               if (strlen($data['altClue7']) == 0) {
                   //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                   $data['updateContent'] = "Alternative path 1 clue 7 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=alt7";
                   //Create a new update object by calling the UpdateListing's insertbl method
                   $updateTable->inserttbl($data);
               }
               //If the "atl2Clue1" value of the posted (parameter) data is empty
               if (strlen($data['alt2Clue1']) == 0) {
                   //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                   $data['updateContent'] = "Alternative path 2 clue 1 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=alt1r2";
                   //Create a new update object by calling the UpdateListing's insertbl method
                   $updateTable->inserttbl($data);
               }
               //If the "alt2Clue2" value of the posted (parameter) data is empty
               if (strlen($data['alt2Clue2']) == 0) {
                   //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                $data['updateContent'] = "Alternative path 2 clue 2 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=alt2r2";
                //Create a new update object by calling the UpdateListing's insertbl method   
                $updateTable->inserttbl($data);   
               }
               //If the "alt2Clue3" value of the posted (parameter) data is empty
               if (strlen($data['alt2Clue3']) == 0) {
                   //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                   $data['updateContent'] = "Alternative path 2 clue 3 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=alt3r2";
                   //Create a new update object by calling the UpdateListing's insertbl method
                   $updateTable->inserttbl($data);
               }
               //If the "alt2Clue4" value of the posted (parameter) data is empty
               if (strlen($data['alt2Clue4']) == 0) {
                   //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                   $data['updateContent'] = "Alternative path 2 clue 4 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=alt4r2";
                   //Create a new update object by calling the UpdateListing's insertbl method
                   $updateTable->inserttbl($data);
               }
               //If the "alt2Clue5" value of the posted (parameter) data is empty
              if (strlen($data['alt2Clue5']) == 0) {
                  //Do nothing
              } else {
                  //Change the posted (parameter) data's updateContent field to the following
                  $data['updateContent'] = "Alternative path 2 clue 5 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=alt5r2";
                  //Create a new update object by calling the UpdateListing's insertbl method 
                  $updateTable->inserttbl($data);
               } 
               //If the "alt2Clue6" value of the posted (parameter) data is empty
               if (strlen($data['alt2Clue6']) == 0) {
                   //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                   $data['updateContent'] = "Alternative path 2 clue 6 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=alt6r2";
                  //Create a new update object by calling the UpdateListing's insertbl method
                   $updateTable->inserttbl($data);
               }
               //If the "alt2Clue7" value of the posted (parameter) data is empty
               if (strlen($data['alt2Clue7']) == 0) {
                   //Do nothing
               } else {
                   //Change the posted (parameter) data's updateContent field to the following
                   $data['updateContent'] = "Alternative path 2 clue 7 URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=alt7r2";
                   //Create a new update object by calling the UpdateListing's insertbl method
                   $updateTable->inserttbl($data);
               }
               //Change the posted (parameter) data's updateContent field to the following
               $data['updateContent'] = "Finish dialog URL for ".$data['huntName'].": http://sga669.fyp12.csesalford.com/huntNode.php?huntID=".$data['newMessageID']."&clueNo=Finish";;
               //Create a new update object by calling the UpdateListing's insertbl method
               $updateTable->inserttbl($data);
         //If the row's user status is "User"
        } else if ($current->getStatus() == "User") {
            //Change posted data/parameter's 'sender' field
            $data['sender'] = "The TreasureQuest Team";
            //Change posted data/parameter's 'receiver' field
            $data['receiver'] = $current->getUsername();
            //Change posted data/parameter's 'receiverID' field
            $data['receiverID'] = $current->getId();
            //Change posted data/parameter's 'subject' field
            $data['subject'] = "New Hunt Created - ".$data['huntName'];
            //Change posted data/parameter's 'content' field
            $data['content'] = "We have created a new hunt! Check the hunt listing for ".$data['huntName']." and get hunting now!";
            //Create a new message object by calling the MessageListing's inserttbl field
            $messageTable->inserttbl($data);
            //Change posted data/parameter's 'updateContent' field
            $data['updateContent'] = "You have recieved a new message from the TreasureQuest team!";
            //Create a new update object by calling the UpdateListing's inserttble method
            $updateTable->inserttbl($data);
        }
    }
  }
  
  public function checkHuntExists($huntID) {
        //Call the readtbl() method and declare the results as a local variable
        $results = $this->readtbl();
        //Create a return variable and set a default value of "false"
        $boolean = "false";
        //While the current row can be fetched from the readtbl() variable
        while ($row = $results->fetch()) {
            //Encase the row into a hunt object
            $huntObject = new Hunt($row);
            //Check if the row's "huntID" value is the same as the parameter
            $compare = stristr($huntObject->getId(), $huntID);
                //If the compare variable is not false
                if ($compare !== false) {
                    //Change the boolean variable to true
                    $boolean = "true";
                    //Break from the loop
                    break;
                } else if ($compare == false) {
                    //Do nothing
                }
            }
        //Return the local array
         return $boolean;
  }
}
