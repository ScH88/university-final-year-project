<?php

//Require from the users class
require_once 'Models/class.users.php';
//Require from the tableAbstract class
require_once 'Models/class.tableAbstract.php';

class UserListing extends TableAbstract {
    //Assign a value so that this class interacts with the 'users' table
    protected $name = 'users';
    //Set a value as the 'users' table's 'id' field
    protected $primaryKey = 'id';
    
    public function fetchAllItems() {
        //Call the readtbl() method and declare the returned result as a local variable
        $results = $this->readtbl();
        //Declare a new array variable
        $itemArray = array();
        //While the current row can be fetched from the readtbl variable and declared as a local variable
        while ($row = $results->fetch()) {
            //Declare the row as a new Item object and store in the array variable declared eariler
            $itemArray[] = new User($row); 
        }
        //Return the item array
        return $itemArray;
    }
    
    public function inserttbl($data) {
        //Set up an SQL to insert the following column values into each table
        $sql = 'INSERT INTO '.$this->name.' (username, userAvatar, password)
        VALUES (:username, :userAvatar, :password)';
        
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, declaring the column values as extracts from the "$data" input 
        $result->execute(array(
            ':username' => $data['username'],
            ':userAvatar' => $data['userAvatar'],
            ':password' => $data['password']
            ));
        //Return the result to the table
        return $this->dbh->lastInsertID();
    }
    
    public function edittbl($data) {
        //Set up the SQL, which changes the fields where the name equals the inputted name value
        $sql = 'UPDATE '.$this->name.'
        SET username = :username,
            userAvatar = :userAvatar,
            password = :password,
            dateFirstJoined = :dateFirstJoined,
            status = :status
            WHERE id = :id';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, using the "$data" input to declare the name value used for the search and the new column values which will replace those in the row with a matching name. Then return it to the table.
        return $result->execute(array(
            ':username' => $data['username'],
            ':userAvatar' => $data['userAvatar'],
            ':password' => $data['password'],
            ':dateFirstJoined' => $data['dateFirstJoined'],
            ':status' => $data['status']
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
     
   public function checkForUser($data) {
       //Set up an SQL to select a row where the input is the same as the username, email and password
        $sql = 'SELECT * FROM '.$this->name.' WHERE username = :username';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, with the username, email and password extracted from the "$data" input
        $result->execute(array(
            ':username' => $data['username']
            ));
        //Fetch the result as a row
        $row = $result->fetch();
        //Return the row
        return $row;
    }
    
    public function checkforUsername($username) {
       //Set up an SQL to select a row where the input is the same as the username, email and password
        $receiver = $username['receiver'];
        //Call the readtbl() method and declare the results as a local variable
        $results = $this->readtbl();
        //Create a variable for returning true or false
        $boolean = '';
        //While the current row can be fetched from the readtbl() variable
        while ($row = $results->fetch()) {
            //Check if the row's "threadID" value is the same as the parameter
            $compare = stristr($row['username'], $receiver);
            
                //If the compare variable is not false
                if ($compare !== false) {
                    //Create the row as an item and store it in the local array
                $boolean = 'true';
                } else {
                    $boolean = 'false';
                }
            }
            //Return the local array
         return $boolean;
    }
    
    public function retrieveUser($data) {
        //Set up an SQL to select a row where the input is the same as the username, email and password
        $sql = 'SELECT * FROM '.$this->name.' WHERE username = :username AND password = :password';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, with the username, email and password extracted from the "$data" input
        $result->execute(array(
            ':username' => $data['username'],
            ':password' => $data['password']
            ));
        //Fetch the result as a row
        $row = $result->fetch();
        
        //Create user instance based on row
        $foundUser = new User($row);
        //Return the User instance
        return $foundUser;
    }
    
    public function retrieveUserByUsername($data) {
       //Set up an SQL to select a row where the input is the same as the username, email and password
        $sql = 'SELECT * FROM '.$this->name.' WHERE username = :username';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, with the username, email and password extracted from the "$data" input
        $result->execute(array(
            ':username' => $data['username']
            ));
        //Fetch the result as a row
        $row = $result->fetch();
        //Create user instance based on row
        $foundUser = new User($row);
        //Return the User instance
        return $foundUser;
    }
    
    public function retrieveUserByID($data) {
       //Set up an SQL to select a row where the input is the same as the username, email and password
        $sql = 'SELECT * FROM '.$this->name.' WHERE id = :id';
        //Prepare the SQL
        $result = $this->dbh->prepare($sql);
        //Execute the SQL, with the username, email and password extracted from the "$data" input
        $result->execute(array(
            ':id' => $data['id']
            ));
        //Fetch the result as a row
        $row = $result->fetch();
        //Create user instance based on row
        $foundUser = new User($row);
        //Return the User instance
        return $foundUser;
    }
}