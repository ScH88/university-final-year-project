<?php

Class Reply { 
    
protected $id, $threadID, $username, $userAvatar, $threadTitle, $content, $date;

public function __construct($dbrow) {
    //Declare this instance's "id" field as the id value extracted from the "$dbrow" parameter
    $this->id = $dbrow['id'];
    //Declare this instance's "threadID" field as the name value extracted from the "$dbrow" parameter
    $this->threadID = $dbrow['threadID'];
    //Declare this instance's "username" field as the type value extracted from the "$dbrow" parameter
    $this->username = $dbrow['username'];
    //Declare this instance's "userAvatar" field as the description value extracted from the "$dbrow" parameter
    $this->userAvatar = $dbrow['userAvatar'];
    //Declare this instance's "threadTitle" field as the quantity value extracted from the "$dbrow" parameter
    $this->threadTitle = $dbrow['threadTitle'];
    //Declare this instance's "content" field as the cost value extracted from the "$dbrow" parameter
    $this->content = $dbrow['content'];    
    //Declare this instance's "date" field as the photo value extracted from the "$dbrow" parameter
    $this->date = $dbrow['date'];
    }
    
public function getId() {
    //Return the "id" value from this instance
    return $this->id;
}
    
public function getThreadID() {
    //Return the "threadID" value from this instance
    return $this->threadID;
}
    
public function getUsername() {
    //Return the "username" value from this instance
    return $this->username;
}

public function getUserAvatar() {
    //Return the "userAvatar" value from this instance
    return $this->userAvatar;
}

    
public function getThreadTitle() {
    //Return the "threadTitle" value from this instance
    return $this->threadTitle;
}

    
public function getContent() {
    //Return the "content" value from this instance
    return $this->content;
}
    
public function getDate() {
    //Return the "date" value from this instance
    return $this->date;
}
}
