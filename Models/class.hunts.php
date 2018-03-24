<?php

Class Hunt{ 
    
protected $id, $huntName, $clue1, $clue1Location, $clue2, $clue2Location, $clue3, $clue3Location, $clue4, $clue4Location, $clue5, $clue5Location, $clue6, $clue6Location, $clue7, $clue7Location, $altClue1, $altClue1Location, $altClue2, $altClue2Location, $altClue3, $altClue3Location, $altClue4, $altClue4Location, $altClue5, $altClue5Location, $altClue6, $altClue6Location, $altClue7, $altClue7Location, $alt2Clue1, $alt2Clue1Location, $alt2Clue2, $alt2Clue2Location, $alt2Clue3, $alt2Clue3Location, $alt2Clue4, $alt2Clue4Location, $alt2Clue5, $alt2Clue5Location, $alt2Clue6, $alt2Clue6Location, $alt2Clue7, $alt2Clue7Location, $huntFinish, $huntFinishLocation, $huntStatus;

public function __construct($dbrow) {
    //Declare this instance's "id" field as the id value extracted from the "$dbrow" parameter
    $this->id = $dbrow['id'];
    //Declare this instance's "huntName" field as the id value extracted from the "$dbrow" parameter
    $this->huntName = $dbrow['huntName'];
    //Declare this instance's "clue1" field as the id value extracted from the "$dbrow" parameter
    $this->clue1 = $dbrow['clue1'];
    //Declare this instance's "clue1Location" field as the id value extracted from the "$dbrow" parameter
    $this->clue1Location = $dbrow['clue1Location'];
    //Declare this instance's "clue2" field as the id value extracted from the "$dbrow" parameter
    $this->clue2 = $dbrow['clue2'];
    //Declare this instance's "clue2Location" field as the id value extracted from the "$dbrow" parameter
    $this->clue2Location = $dbrow['clue2Location'];
    //Declare this instance's "clue3" field as the id value extracted from the "$dbrow" parameter
    $this->clue3 = $dbrow['clue3'];
    //Declare this instance's "clue3Location" field as the id value extracted from the "$dbrow" parameter
    $this->clue3Location = $dbrow['clue3Location'];
    //Declare this instance's "clue4" field as the id value extracted from the "$dbrow" parameter
    $this->clue4 = $dbrow['clue4'];
    //Declare this instance's "clue4Location" field as the id value extracted from the "$dbrow" parameter
    $this->clue4Location = $dbrow['clue4Location'];
    //Declare this instance's "clue5" field as the id value extracted from the "$dbrow" parameter
    $this->clue5 = $dbrow['clue5'];
    //Declare this instance's "clue5Location" field as the id value extracted from the "$dbrow" parameter
    $this->clue5Location = $dbrow['clue5Location'];
    //Declare this instance's "clue6" field as the id value extracted from the "$dbrow" parameter
    $this->clue6 = $dbrow['clue6'];
    //Declare this instance's "clue6Location" field as the id value extracted from the "$dbrow" parameter
    $this->clue6Location = $dbrow['clue6Location'];
    //Declare this instance's "clue7" field as the id value extracted from the "$dbrow" parameter
    $this->clue7 = $dbrow['clue7'];
    //Declare this instance's "clue7Location" field as the id value extracted from the "$dbrow" parameter
    $this->clue7Location = $dbrow['clue7Location'];
    //Declare this instance's "altClue1" field as the id value extracted from the "$dbrow" parameter
    $this->altClue1 = $dbrow['altClue1'];
    //Declare this instance's "altClue1Location" field as the id value extracted from the "$dbrow" parameter
    $this->altClue1Location = $dbrow['altClue1Location'];
    //Declare this instance's "altClue2" field as the id value extracted from the "$dbrow" parameter
    $this->altClue2 = $dbrow['altClue2'];
    //Declare this instance's "altClue2Location" field as the id value extracted from the "$dbrow" parameter
    $this->altClue2Location = $dbrow['altClue2Location'];
    //Declare this instance's "altClue3" field as the id value extracted from the "$dbrow" parameter
    $this->altClue3 = $dbrow['altClue3'];
    //Declare this instance's "altClue3Location" field as the id value extracted from the "$dbrow" parameter
    $this->altClue3Location = $dbrow['altClue3Location'];
    //Declare this instance's "altClue4" field as the id value extracted from the "$dbrow" parameter
    $this->altClue4 = $dbrow['altClue4'];
    //Declare this instance's "altClue4Location" field as the id value extracted from the "$dbrow" parameter
    $this->altClue4Location = $dbrow['altClue4Location'];
    //Declare this instance's "altClue5" field as the id value extracted from the "$dbrow" parameter
    $this->altClue5 = $dbrow['altClue5'];
    //Declare this instance's "altClue5Location" field as the id value extracted from the "$dbrow" parameter
    $this->altClue5Location = $dbrow['altClue5Location'];
    //Declare this instance's "altClue6" field as the id value extracted from the "$dbrow" parameter
    $this->altClue6 = $dbrow['altClue6'];
    //Declare this instance's "altClue6Location" field as the id value extracted from the "$dbrow" parameter
    $this->altClue6Location = $dbrow['altClue6Location'];
    //Declare this instance's "altClue7" field as the id value extracted from the "$dbrow" parameter
    $this->altClue7 = $dbrow['altClue7'];
    //Declare this instance's "altClue7Location" field as the id value extracted from the "$dbrow" parameter
    $this->altClue7Location = $dbrow['altClue7Location'];
    //Declare this instance's "alt2Clue1" field as the id value extracted from the "$dbrow" parameter
    $this->alt2Clue1 = $dbrow['alt2Clue1'];
    //Declare this instance's "alt2Clue1Location" field as the id value extracted from the "$dbrow" parameter
    $this->alt2Clue1Location = $dbrow['alt2Clue1Location'];
    //Declare this instance's "alt2Clue1" field as the id value extracted from the "$dbrow" parameter
    $this->alt2Clue2 = $dbrow['alt2Clue2'];
    //Declare this instance's "alt2Clue2Location" field as the id value extracted from the "$dbrow" parameter
    $this->alt2Clue2Location = $dbrow['alt2Clue2Location'];
    //Declare this instance's "alt2Clue3" field as the id value extracted from the "$dbrow" parameter
    $this->alt2Clue3 = $dbrow['alt2Clue3'];
    //Declare this instance's "alt2Clue3Location" field as the id value extracted from the "$dbrow" parameter
    $this->alt2Clue3Location = $dbrow['alt2Clue3Location'];
    //Declare this instance's "alt2Clue4" field as the id value extracted from the "$dbrow" parameter
    $this->alt2Clue4 = $dbrow['alt2Clue4'];
    //Declare this instance's "alt2Clue4Location" field as the id value extracted from the "$dbrow" parameter
    $this->alt2Clue4Location = $dbrow['alt2Clue4Location'];
    //Declare this instance's "alt2Clue5" field as the id value extracted from the "$dbrow" parameter
    $this->alt2Clue5 = $dbrow['alt2Clue5'];
    //Declare this instance's "alt2Clue5Location" field as the id value extracted from the "$dbrow" parameter
    $this->alt2Clue5Location = $dbrow['alt2Clue5Location'];
    //Declare this instance's "alt2Clue6" field as the id value extracted from the "$dbrow" parameter
    $this->alt2Clue6 = $dbrow['alt2Clue6'];
    //Declare this instance's "alt2Clue6Location" field as the id value extracted from the "$dbrow" parameter
    $this->alt2Clue6Location = $dbrow['alt2Clue6Location'];
    //Declare this instance's "alt2Clue7" field as the id value extracted from the "$dbrow" parameter
    $this->alt2Clue7 = $dbrow['alt2Clue7'];
    //Declare this instance's "alt2Clue7Location" field as the id value extracted from the "$dbrow" parameter
    $this->alt2Clue7Location = $dbrow['alt2Clue7Location'];
    //Declare this instance's "huntFinish" field as the id value extracted from the "$dbrow" parameter
    $this->huntFinish = $dbrow['huntFinish'];
    //Declare this instance's "huntFinishLocation" field as the id value extracted from the "$dbrow" parameter
    $this->huntFinishLocation = $dbrow['huntFinishLocation'];
    //Declare this instance's "huntStatus" field as the id value extracted from the "$dbrow" parameter
    $this->huntStatus = $dbrow['huntStatus'];
    }
    
public function getId() {
    //Return the "id" value from this instance
    return $this->id;
}

public function getHuntName() {
    //Return the "huntName" value from this instance
    return $this->huntName;
}

public function getClue1() {
    //Return the "clue" value from this instance
    return $this->clue1;
}

public function getClue1Location() {
    //Return the "clue1Location" value from this instance
    return $this->clue1Location;
}

    public function getClue2() {
    //Return the "clue2" value from this instance
    return $this->clue2;
}

public function getClue2Location() {
    //Return the "clue2Location" value from this instance
    return $this->clue2Location;
}

public function getClue3() {
    //Return the "clue3" value from this instance
    return $this->clue3;
}

public function getClue3Location() {
    //Return the "clue3Location" value from this instance
    return $this->clue3Location;
}

public function getClue4() {
    //Return the "clue4" value from this instance
    return $this->clue4;
}

public function getClue4Location() {
    //Return the "clue4Location" value from this instance
    return $this->clue4Location;
}

public function getClue5() {
    //Return the "clue5" value from this instance
    return $this->clue5;
}

public function getClue5Location() {
    //Return the "clue5Location" value from this instance
    return $this->clue5Location;
}

public function getClue6() {
    //Return the "clue6" value from this instance
    return $this->clue6;
}

public function getClue6Location() {
    //Return the "clue6Location" value from this instance
    return $this->clue6Location;
}

public function getClue7() {
    //Return the "clue7" value from this instance
    return $this->clue7;
}

public function getClue7Location() {
    //Return the "clue7Location" value from this instance
    return $this->clue7Location;
}

public function getAltClue1() {
    //Return the "altClue1" value from this instance
    return $this->altClue1;
}

public function getAltClue1Location() {
    //Return the "altClue1Location" value from this instance
    return $this->altClue1Location;
}

    public function getAltClue2() {
    //Return the "altClue2" value from this instance
    return $this->altClue2;
}

public function getAltClue2Location() {
    //Return the "altClue2Location" value from this instance
    return $this->altClue2Location;
}

public function getAltClue3() {
    //Return the "altClue3" value from this instance
    return $this->altClue3;
}

public function getAltClue3Location() {
    //Return the "altClue3Location" value from this instance
    return $this->altClue3Location;
}

public function getAltClue4() {
    //Return the "altClue4" value from this instance
    return $this->altClue4;
}

public function getAltClue4Location() {
    //Return the "altClue4Location" value from this instance
    return $this->altClue4Location;
}

public function getAltClue5() {
    //Return the "altClue5" value from this instance
    return $this->altClue5;
}

public function getAltClue5Location() {
    //Return the "altClue5Location" value from this instance
    return $this->altClue5Location;
}

public function getAltClue6() {
    //Return the "altClue6" value from this instance
    return $this->altClue6;
}

public function getAltClue6Location() {
    //Return the "altClue6Location" value from this instance
    return $this->altClue6Location;
}

public function getAltClue7() {
    //Return the "altClue7" value from this instance
    return $this->altClue7;
}

public function getAltClue7Location() {
    //Return the "altClue7Location" value from this instance
    return $this->altClue7Location;
}

public function getAlt2Clue1() {
    //Return the "alt2Clue1" value from this instance
    return $this->alt2Clue1;
}

public function getAlt2Clue1Location() {
    //Return the "alt2Clue1Location" value from this instance
    return $this->alt2Clue1Location;
}

public function getAlt2Clue2() {
    //Return the "alt2Clue2" value from this instance
    return $this->alt2Clue2;
}

public function getAlt2Clue2Location() {
    //Return the "alt2Clue2Location" value from this instance
    return $this->alt2Clue2Location;
}

public function getAlt2Clue3() {
    //Return the "alt2Clue3" value from this instance
    return $this->alt2Clue3;
}

public function getAlt2Clue3Location() {
    //Return the "alt2Clue3Location" value from this instance
    return $this->alt2Clue3Location;
}

public function getAlt2Clue4() {
    //Return the "alt2Clue4" value from this instance
    return $this->alt2Clue4;
}

public function getAlt2Clue4Location() {
    //Return the "alt2Clue4Location" value from this instance
    return $this->alt2Clue4Location;
}

public function getAlt2Clue5() {
    //Return the "alt2Clue5" value from this instance
    return $this->alt2Clue5;
}

public function getAlt2Clue5Location() {
    //Return the "alt2Clue5Location" value from this instance
    return $this->alt2Clue5Location;
}

public function getAlt2Clue6() {
    //Return the "alt2Clue6" value from this instance
    return $this->alt2Clue6;
}

public function getAlt2Clue6Location() {
    //Return the "alt2Clue6Location" value from this instance
    return $this->alt2Clue6Location;
}

public function getAlt2Clue7() {
    //Return the "alt2Clue7" value from this instance
    return $this->alt2Clue7;
}

public function getAlt2Clue7Location() {
    //Return the "alt2Clue7Location" value from this instance
    return $this->alt2Clue7Location;
}

public function getHuntFinish() {
    //Return the "huntFinish" value from this instance
    return $this->huntFinish;
}

public function getHuntFinishLocation() {
    //Return the "huntFinishLocation" value from this instance
    return $this->huntFinishLocation;
}

public function getHuntStatus() {
    //Return the "huntStatus" value from this instance
    return $this->huntStatus;
}

}
