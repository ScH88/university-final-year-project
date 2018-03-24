<?php

//Require from the messages class
require_once 'Models/class.messages.php';
//Require from the tableAbstract class
require_once 'Models/class.tableAbstract.php';

class MessageListing extends TableAbstract {
    //Assign a value so that this class interacts with the 'messages' table
    protected $name = 'messages';
    //Assign a variable holding the value of the 'messages' table's 'id' field
    protected $primaryKey = 'id';
    
    public function fetchAllItems() {
        //Call the readtbl() method and declare the returned result as a local variable
        $results = $this->readtbl();
        //Declare a new array variable
        $itemArray = array();
        //While the current row can be fetched from the readtbl variable and declared as a local variable
        while ($row = $results->fetch()) {
            //Declare the row as a new Item object and store in the array variable declared eariler
            $itemArray[] = new Message($row); 
        }
        //Return the item array
        return $itemArray;
    }
    
    public function inserttbl($data) {
        //Set up an SQL to insert the following column values into each table
        $sql = 'INSERT INTO '.$this->name.' (sender, receiver, receiverID, subject, content)
        VALUES (:sender, :receiver, :receiverID, :subject, :content)';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, declaring the column values as extracts from the "$data" input 
        $result->execute(array(
            ':sender' => $data['sender'],
            ':receiver' => $data['receiver'],
            ':receiverID' => $data['receiverID'],
            ':subject' => $data['subject'],
            ':content' => $data['content']
            ));
        //Return the result to the table
        return $this->dbh->lastInsertID();
    }
    
    public function edittbl($data) {
        //Set up the SQL, which changes the fields where the name equals the inputted name value
        $sql = 'UPDATE '.$this->name.'
        SET sender = :sender,
            receiver = :receiver,
            receiverID = :receiverID,
            date = :date,
            subject = :subject,
            content = :content
            WHERE id = :id';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, using the "$data" input to declare the name value used for the search and the new column values which will replace those in the row with a matching name. Then return it to the table.
        return $result->execute(array(
            ':sender' => $data['sender'],
            ':receiver' => $data['receiver'],
            ':receiverID' => $data['receiverID'],
            ':date' => $data['date'],
            ':subject' => $data['subject'],
            ':content' => $data['content']
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

    public function selectAllMessages() {
        //Call the readtbl() method and declare the results as a local variable
        $results = $this->readtbl();
        //Create an array for storing the required items fetched
        $messageArray = array();
        //While the current row can be fetched from the readtbl() variable
        while ($row = $results->fetch()) {
            //Create an item representative of the current row
            $messageArray[] = new Item($row); 
        }
        //Return the array
        return $messageArray;
    }
    
    public function fetchMessagesByID($messageID) {
        //Call the readtbl() method and declare the results as a local variable
        $results = $this->readtbl();
        //Create an array for storing the required items fetched
        $itemArray = array();
        //While the current row can be fetched from the readtbl() variable
        while ($row = $results->fetch()) {
            //Check if the row's "threadID" value is the same as the parameter
            $compare = stristr($row['receiverID'], $messageID);
            
                //If the compare variable is not false
                if ($compare !== false) {
                    //Create the row as an item and store it in the local array
                $itemArray[] = new Message($row);
            }
            }
            //Return the local array
        return $itemArray;
    }
    
    public function sendMessageToAllAdmins($data) {
        //Create a new UserListing object
        $userTable = new UserListing();
        //Create a messageListing object
        $messageListing = new MessageListing();
        //Call the UserListing object's readtbl method and assign the results to a local variable
        $userListing = $userTable->readtbl();
        //While the results are being assessed, assign current row to variable
        while ($row = $userListing->fetch()) {
            //Declare the row as a new User object and store in the array variable declared eariler
            $current = new User($row);
            //If the user object's status says that the user is an admin
            if ($current->getStatus() == "Admin") {
                //Declare the post object's id as the same as the user's id
                $data['receiverID'] = $current->getId();
                //Create a new message for the user
                $messageListing->inserttbl($data);
            } else {
                //Do nothing
            }
        }
    }
}