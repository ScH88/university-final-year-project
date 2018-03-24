<?php

//Require from the userupdates class
require_once 'Models/class.userupdates.php';
//Require from the tableAbstract class
require_once 'Models/class.tableAbstract.php';

class UpdateListing extends TableAbstract {
    //Set the name variable so that this class interacts with the 'userupdates' table
    protected $name = 'userupdates';
    //Set the primary key to the table's 'id' field
    protected $primaryKey = 'id';
    
    public function fetchAllItems() {
        //Call the readtbl() method and declare the returned result as a local variable
        $results = $this->readtbl();
        //Declare a new array variable
        $itemArray = array();
        //While the current row can be fetched from the readtbl variable and declared as a local variable
        while ($row = $results->fetch()) {
            //Declare the row as a new UserUpdate object and store in the array variable declared eariler
            $itemArray[] = new UserUpdate($row); 
        }
        //Return the item array
        return $itemArray;
    }
    
    public function inserttbl($data) {
        //Set up an SQL to insert the following column values into each table
        $sql = 'INSERT INTO '.$this->name.' (userID, updateContent)
        VALUES (:userID, :updateContent)';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, declaring the column values as extracts from the "$data" input 
        $result->execute(array(
            ':userID' => $data['userID'],
            ':updateContent' => $data['updateContent']
            ));
        //Return the result to the table
        return $this->dbh->lastInsertID();
    }
    
    public function edittbl($data) {
        //Set up the SQL, which changes the fields where the name equals the inputted name value
        $sql = 'UPDATE '.$this->name.'
        SET userID = :userID,
            dateCreated = :dateCreated,
            updateContent = :updateContent
            WHERE id = :id';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, using the "$data" input to declare the name value used for the search and the new column values which will replace those in the row with a matching name. Then return it to the table.
        return $result->execute(array(
             ':userID' => $data['userID'],
            ':dateCreated' => $data['dateCreated'],
            ':updateContent' => $data['updateContent']
            ));      
    }    
    
    public function deletetbl($data) {
        //Set up the SQL, which deletes a row from the table if the name equals the name inputted
        $sql = 'DELETE FROM '.$this->name.'
        WHERE id = :id';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, with the inputted name value extracted from the "$data" input parameter
        return $result->execute(array(
            ':id' => $data['id']
            ));
    }
    
    public function fetchUpdatesByID($userID) {
        //Call the readtbl() method and declare the results as a local variable
        $results = $this->readtbl();
        //Create an array for storing the required items fetched
        $updateArray = array();
        //While the current row can be fetched from the readtbl() variable
        while ($row = $results->fetch()) {
            //Check if the row's "userID" value is the same as the parameter
            $compare = stristr($row['userID'], $userID);
            
                //If the compare variable is not false
                if ($compare !== false) {
                    //Create the row as a UserUpdate instance and store it in the local array
                $updateArray[] = new UserUpdate($row);
            }
            }
            //Return the local array
        return $updateArray;
    }
    

  public function searchUpdatesByUserIDAndContent($sentContent, $userID) {
        //Call the readtbl() method and declare the results as a local variable
        $results = $this->readtbl();
        //Create a boolean-based variable called "comparison"
        $comparison = "";
        //While the current row can be fetched from the readtbl() variable
        while ($row = $results->fetch()) {
            //Create a "compare" variable, which will hold the value of whatever boolean value is returned when the current row's "updateContent" value is compared to the sent contentto see if they are the same 
            $compare = stristr($row['updateContent'], $sentContent);
            
            //If the row's userID matches the sent userID parameter (if the update belongs to the user) and the compare variable does not equal false
            if ($row['userID'] == $userID && $compare !== false) {
                //Set the comparison value to true
                $comparison = "True";
                //If the row's userID matches the sent userID parameter (if the update belongs to the user) and the compare variable is false
            } else if ($row['userID'] == $userID && $compare == false) {
                //Set the comparison value to false
                $comparison = "False";
            }
        }
        //Return the comparison value
        return $comparison;
    }
    
    public function announceHuntWinnerToAll($data) {
        //Create a new UserListing object
        $userTable = new UserListing();
        //Create a new UpdateListing object
        $updateTable = new UpdateListing();
        //Call the UserListing object's readtbl method and assign the results to a local variable
        $userListing = $userTable->readtbl();
        //Change posted data/parameter's updateContent field to the following
        $data['updateContent'] = "Congratulations to ".$data['username'].", who had just completed ".$data['huntName']."! ";
        //While the results are being assessed, assign current row to variable
        while ($row = $userListing->fetch()) {
            //Declare the row as a new User object and store in the array variable declared eariler
            $current = new User($row);
            //Change posted data/parameter's userID field as the same value as the current row's getID value
            $data['userID'] = $current->getID();
            //Create a new update object by calling the UpdateListing table's inserttbl method
            $updateTable->inserttbl($data);
        }
    }
}
