<?php

Class User { 
    
protected $id, $username, $userAvatar, $password, $dateFirstJoined, $status;

public function __construct($dbrow) {
    //Declare this instance's "id" field as the id value extracted from the "$dbrow" parameter
    $this->id = $dbrow['id'];
    //Declare this instance's "username" field as the name value extracted from the "$dbrow" parameter
    $this->username = $dbrow['username'];
    //Declare this instance's "userAvatar" field as the type value extracted from the "$dbrow" parameter
    $this->userAvatar = $dbrow['userAvatar'];
    //Declare this instance's "password" field as the description value extracted from the "$dbrow" parameter
    $this->password = $dbrow['password'];
    //Declare this instance's "dateFirstJoined" field as the quantity value extracted from the "$dbrow" parameter
    $this->dateFirstJoined = $dbrow['dateFirstJoined'];
    //Declare this instance's "status" field as the cost value extracted from the "$dbrow" parameter
    $this->status = $dbrow['status'];   
    }
    
public function getId() {
    //Return the "id" value from this instance
    return $this->id;
}

public function getUsername() {
    //Return the "username" value from this instance
    return $this->username;
}

public function getUserAvatar() {
    //Return the "userAvatar" value from this instance
    return $this->userAvatar;
}

public function getPassword() {
    //Return the "password" value from this instance
    return $this->password;
}

public function getDateFirstJoined() {
    //Return the "dateFirstJoined" value from this instance
    return $this->dateFirstJoined;
}
public function getStatus() {
    //Return the "status" value from this instance
    return $this->status;
}
}
