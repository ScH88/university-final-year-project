<?php

Class Thread { 
    
protected $id, $author, $subect, $date, $replies, $views, $latestPost;

public function __construct($dbrow) {
    //Declare this instance's "id" field as the id value extracted from the "$dbrow" parameter
    $this->id = $dbrow['id'];
    //Declare this instance's "author" field as the name value extracted from the "$dbrow" parameter
    $this->author = $dbrow['author'];
    //Declare this instance's "subject" field as the type value extracted from the "$dbrow" parameter
    $this->subject = $dbrow['subject'];
    //Declare this instance's "date" field as the description value extracted from the "$dbrow" parameter
    $this->date = $dbrow['date'];
    //Declare this instance's "replies" field as the quantity value extracted from the "$dbrow" parameter
    $this->replies = $dbrow['replies'];
    //Declare this instance's "views" field as the cost value extracted from the "$dbrow" parameter
    $this->views = $dbrow['views'];    
    //Declare this instance's "latestPost" field as the photo value extracted from the "$dbrow" parameter
    $this->latestPost = $dbrow['latestPost'];
    }
    
public function getId() {
    //Return the "id" value from this instance
    return $this->id;
}
    
public function getAuthor() {
    //Return the "author" value from this instance
    return $this->author;
}
   
public function getSubject() {
    //Return the "subject" value from this instance
    return $this->subject;
}

    
public function getDate() {
    //Return the "date" value from this instance
    return $this->date;
}
    
public function getReplies() {
    //Return the "replies" value from this instance
    return $this->replies;
}
    
public function getViews() {
    //Return the "views" value from this instance
    return $this->views;
}
    
public function getLatestPost() {
    //Return the "latestPost" value from this instance
    return $this->latestPost;
}
}
