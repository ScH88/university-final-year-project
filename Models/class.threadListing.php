<?php

//Require from the threads class
require_once 'Models/class.threads.php';
//Require from the tableAbstract class
require_once 'Models/class.tableAbstract.php';
//Require from the replyListing class
require_once 'Models/class.replyListing.php';

class ThreadListing extends TableAbstract {
    //Assign a value so that this class interacts with the 'threads' table
    protected $name = 'threads';
    //Assign a variable holding a value for the 'thread' table's 'id' field
    protected $primaryKey = 'id';
    
    public function fetchAllItems() {
        //Call the readtbl() method and declare the returned result as a local variable
        $results = $this->readtbl();
        //Declare a new array variable
        $itemArray = array();
        //While the current row can be fetched from the readtbl variable and declared as a local variable
        while ($row = $results->fetch()) {
            //Declare the row as a new Item object and store in the array variable declared eariler
            $itemArray[] = new Thread($row); 
        }
        //Return the item array
        return $itemArray;
    }
    
    public function inserttbl($data) {
        //Set up an SQL to insert the following column values into each table
        $sql = 'INSERT INTO '.$this->name.' (author, subject, replies, views, latestPost)
        VALUES (:author, :subject, :replies, :views, :latestPost)';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, declaring the column values as extracts from the "$data" input 
        $result->execute(array(
            ':author' => $data['author'],
            ':subject' => $data['subject'],
            ':replies' => $data['replies'],
            ':views' => $data['views'],
            ':latestPost' => $data['latestPost']
            ));
        //Return the result to the table
        return $this->dbh->lastInsertID();
    }
    
    public function edittbl($data) {
        //Set up the SQL, which changes the fields where the name equals the inputted name value
        $sql = 'UPDATE '.$this->name.'
        SET author = :author,
            subject = :subject,
            date = :date,
            replies = :replies,
            views = :views,
            latestPost = :latestPost
            WHERE id = :id';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, using the "$data" input to declare the name value used for the search and the new column values which will replace those in the row with a matching name. Then return it to the table.
        return $result->execute(array(
            ':id' => $data['id'],
            ':author' => $data['author'],
            ':subject' => $data['subject'],
            ':date' => $data['date'],
            ':replies' => $data['replies'],
            ':views' => $data['views'],
            ':latestPost' => $data['latestPost']
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

    public function selectAllThreads() {
        //Call the readtbl() method and declare the results as a local variable
        $results = $this->readtbl();
        //Create an array for storing the required items fetched
        $threadArray = array();
        //While the current row can be fetched from the readtbl() variable
        while ($row = $results->fetch()) {
            //Create an item representative of the current row
            $threadArray[] = new Item($row); 
        }
        //Return the array
        return $threadArray;
    }
    
    public function createNewThread($data) {
        //Create a ReplyListing object
        $replyListing = new ReplyListing();
        //Create a new thread object by calling this class' inserttbl method, and using the ID returned, set the posted data/parameter's 'threadID' field to hold the same value as the ID
        $data['threadID'] = $this->inserttbl($data);
        //Create a new reply object by calling the ReplyListing object's inserttbl method
        $replyListing->inserttbl($data);
    }
    
    public function checkThreadExists($threadID) {
        //Call the readtbl() method and declare the results as a local variable
        $results = $this->readtbl();
        //Create a return variable and set a default value of "false"
        $boolean = "false";
        //While the current row can be fetched from the readtbl() variable
        while ($row = $results->fetch()) {
            //Encase the row into a hunt object
            $threadObject = new Thread($row);
            //Check if the row's "threadID" value is the same as the parameter
            $compare = stristr($threadObject->getId(), $threadID);
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
  
  function returnThread($threadID) {
      //Call the readtbl() method and declare the results as a local variable
      $results = $this->readtbl();
      $return = null;
      //While the current row can be fetched from the readtbl() variable
        while ($row = $results->fetch()) {
            //Encase the row into a hunt object
            $threadObject = new Thread($row);
            //Check if the row's "threadID" value is the same as the parameter
            $compare = stristr($threadObject->getId(), $threadID);
                //If the compare variable is not false
                if ($compare !== false) {
                    $return = $threadObject;
                    //Break from the loop
                    break;
                } else if ($compare == false) {
                    //Do nothing
                }
            }
        return $return;
  }
}