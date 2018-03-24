<?php

class Session {
    
    public function __construct() {
    //Create the new session
    session_start();
}

    public function setSession ($name, $value) {
    //If the session's value is empty
    if (strlen($value) == 0) {
        //Change the return value to false
        $return = false;
    //If the session's value is not empty
    } else {
        //Change the session's name field to hold the same value as the parameter's 'value' variable
        $_SESSION[$name] = $value;
        //Change the return value to true
        $return = true;
        }
        //Return the return value
        return $return;
    }

    public function getSession ($name) {
        //If a session with a matching name value is found
        if (isset($_SESSION[$name])) {
            //Return that session
            $return = $_SESSION[$name];
        //If there is no session with a matching name value
        } else {
            //Change the return value to false
            $return = false;
        }
        //Return the return value
        return $return;
        }
    
    
    public function deleteSession($name) {
        //If a session with a matching name value has been found
        if (isset($_SESSION[$name])) {
            //Delete that session
            unset($_SESSION[$name]);
            //Change the return value to true
            $return = true;
        //If there is no session with a matching name value
        } else {
            //Change the return value to false
            $return = false;
        }
        //Return the return value
        return $return;
    }
}
