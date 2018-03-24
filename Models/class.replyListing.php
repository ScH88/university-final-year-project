<?php

require_once 'Models/class.replies.php';
require_once 'Models/class.tableAbstract.php';

class ReplyListing extends TableAbstract {
    //Set the name value so that this class interacts with the 'replies' table
    protected $name = 'replies';
    //Set the primary key as the 'replies' table's 'id' field
    protected $primaryKey = 'id';
    
    public function fetchAllItems() {
        //Call the readtbl() method and declare the returned result as a local variable
        $results = $this->readtbl();
        //Declare a new array variable
        $itemArray = array();
        //While the current row can be fetched from the readtbl variable and declared as a local variable
        while ($row = $results->fetch()) {
            //Declare the row as a new Reply object and store in the array variable declared eariler
            $itemArray[] = new Reply($row); 
        }
        //Return the item array
        return $itemArray;
    }
    
    public function inserttbl($data) {
        //Set up an SQL to insert the following column values into each table
        $sql = 'INSERT INTO '.$this->name.' (threadID, username, userAvatar, threadTitle, content)
        VALUES (:threadID, :username, :userAvatar, :threadTitle, :content)';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, declaring the column values as extracts from the "$data" input 
        $result->execute(array(
            ':threadID' => $data['threadID'],
            ':username' => $data['username'],
            ':userAvatar' => $data['userAvatar'],
            ':threadTitle' => $data['threadTitle'],
            ':content' => $data['content']
            ));
        //Return the result to the table
        return $this->dbh->lastInsertID();
    }
    
    public function edittbl($data) {
        //Set up the SQL, which changes the fields where the name equals the inputted name value
        $sql = 'UPDATE '.$this->name.'
        SET threadID = :threadID,
            username = :username,
            userAvatar = :userAvatar,
            threadTitle = :threadTitle,
            content = :content,
            date = :date
            WHERE id = :id';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, using the "$data" input to declare the name value used for the search and the new column values which will replace those in the row with a matching name. Then return it to the table.
        return $result->execute(array(
             ':threadID' => $data['threadID'],
            ':username' => $data['username'],
            ':userAvatar' => $data['userAvatar'],
            ':threadTitle' => $data['threadTitle'],
            ':content' => $data['content'],
            ':date' => $data['date']
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
    
    public function fetchRepliesByID($threadID) {
        //Call the readtbl() method and declare the results as a local variable
        $results = $this->readtbl();
        //Create an array for storing the required items fetched
        $itemArray = array();
        //While the current row can be fetched from the readtbl() variable
        while ($row = $results->fetch()) {
            //Check if the row's "threadID" value is the same as the parameter
            $compare = stristr($row['threadID'], $threadID);
            
                //If the compare variable is not false
                if ($compare !== false) {
                    //Create the row as an item and store it in the local array
                $itemArray[] = new Reply($row);
            }
            }
            //Return the local array
        return $itemArray;
    }
}
