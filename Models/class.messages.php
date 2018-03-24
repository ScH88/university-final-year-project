<?php

Class Message { 
    
protected $id, $sender, $receiver, $receiverID, $date, $subject, $content, $status;

public function __construct($dbrow) {
    //Declare this instance's "id" field as the id value extracted from the "$dbrow" parameter
    $this->id = $dbrow['id'];
    //Declare this instance's "sender" field as the name value extracted from the "$dbrow" parameter
    $this->sender = $dbrow['sender'];
    //Declare this instance's "receiver" field as the type value extracted from the "$dbrow" parameter
    $this->receiver = $dbrow['receiver'];
    //Declare this instance's "receiverID" field as the description value extracted from the "$dbrow" parameter
    $this->receiverID = $dbrow['receiverID'];
    //Declare this instance's "date" field as the quantity value extracted from the "$dbrow" parameter
    $this->date = $dbrow['date'];
    //Declare this instance's "subect" field as the quantity value extracted from the "$dbrow" parameter
    $this->date = $dbrow['subject'];
    //Declare this instance's "content" field as the cost value extracted from the "$dbrow" parameter
    $this->content = $dbrow['content'];    
    }
    
public function getId() {
    //Return the "id" value from this instance
    return $this->id;
}

public function getSender() {
    //Return the "sender" value from this instance
    return $this->sender;
}

public function getReceiver() {
    //Return the "receiver" value from this instance
    return $this->receiver;
}

public function getreceiverID() {
    //Return the "receiverID" value from this instance
    return $this->receiverID;
}

public function getDate() {
    //Return the "date" value from this instance
    return $this->date;
}

public function getSubject() {
    //Return the "subject" value from this instance
    return $this->subject;
}

public function getContent() {
    //Return the "content" value from this instance
    return $this->content;
}

}
