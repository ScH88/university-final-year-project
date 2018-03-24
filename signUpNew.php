<?php
//Set the view as a new stdClass
$view = new stdClass();
//Set the page title
$view->pageTitle = 'Sign Up';

//Require the appropriate view to display the page on the internet browser
require_once('Views/signUpNew.phtml');
