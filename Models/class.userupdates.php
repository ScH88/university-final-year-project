<?php

Class UserUpdate { 
    
protected $id, $userID, $dateCreated, $updateContent;

public function __construct($dbrow) {
    //Declare this instance's "id" field as the id value extracted from the "$dbrow" parameter
    $this->id = $dbrow['id'];
    //Declare this instance's "userID" field as the name value extracted from the "$dbrow" parameter
    $this->userID = $dbrow['userID'];
    //Declare this instance's "dateCreated" field as the type value extracted from the "$dbrow" parameter
    $this->dateCreated = $dbrow['dateCreated'];
    //Declare this instance's "updateContent" field as the description value extracted from the "$dbrow" parameter
    $this->updateContent = $dbrow['updateContent'];
    }
    
public function getId() {
    //Return the "id" value from this instance
    return $this->id;
}

public function getUserId() {
    //Return the "userID" value from this instance
    return $this->userID;
}

public function getDateCreated() {
    //Return the "dateCreated" value from this instance
    return $this->dateCreated;
}

public function getUpdateContent() {
    //Return the "updateContent" value from this instance
    return $this->updateContent;
}
}

