<?php
//Set the view as a new stdClass
$view = new stdClass();
//Set the hunt's title by catching the huntName
$view->threadID = $_GET['threadID'];
//Set the hunt's ID by catching the huntId value
$view->threadSubject = $_GET['threadSubject'];
//Set the page title
$view->pageTitle = 'Replies';
//Set the page's on-screen message
$view->message = "";
//Require from the replies class
require_once('Models/class.replies.php');
//Require from the threadListing class
require_once('Models/class.threadListing.php');
//Require from the replyListing class
require_once('Models/class.replyListing.php'); 
//Require the sessions class
require_once('Models/class.sessions.php');
 
//Create a new session 
$session = new Session();

//Assign a local variable storing the session's id value
$view->sessionID = $session->getSession('id');
//Assign a local variable storing the session's username value
$view->sessionUsername = $session->getSession('username');
//Assign a local variable storing the session's user status value
$view->sessionUserStatus = $session->getSession('status');
//Assign a local variable storing the session's avatar value
$view->sessionAvatar = $session->getSession('userAvatar');
//Set up a variable for getting a possible latitude session
$view->latitude = $session->getSession('latitude');
//Set up a variable for getting a possible longitude session
$view->longitude = $session->getSession('longitude');
//Set up a variable for getting a possible accuracy session
$view->accuracy = $session->getSession('accuracy');

//Instantiate a new threadListing object
$assumedThread = new ThreadListing();

//Check if the thread exists by calling the checkThreadExistence method, then assign to variable
$view->threadExists = $assumedThread->checkThreadExists($view->threadID);

//If the threadExists variable holds "false" as the return value
if ($view->threadExists == "false") {
//Set the page's title to tell user that the thread does not exist
$view->threadSubject = "Thread Nonexistent";
//If the threadExists variable holds "true" as the return value
} else if ($view->threadExists == "true") {
    if ($view->sessionUsername != null) {
            //Get the current thread by calling the threadListing's returnThread method and passing this page's local id as the parameter
            $currentThread = $assumedThread->returnThread($view->threadID);    
            //Set the soon to be posted item's "views" value as the same as the thread's, but with 1 added to it
            $incrementViews['views'] = (($currentThread->getViews()) + 1);
            //Define the soon to be posted item's "id" value as the same as this page's id value
            $incrementViews['id'] = $view->threadID;
            //Set the soon to be posted item's "author" value as the same as the thread's
            $incrementViews['author'] = $currentThread->getAuthor();
            //Set the soon to be posted item's "subject" value as the same as the thread's
            $incrementViews['subject'] = $currentThread->getSubject();
            //Set the soon to be posted item's "date" value as the same as the thread's
            $incrementViews['date'] = $currentThread->getDate();
            //Set the soon to be posted item's "replies" value as the same as the thread's
            $incrementViews['replies'] = $currentThread->getReplies();
            //Set the soon to be posted item's "latestPost" value as the same as the thread's
            $incrementViews['latestPost'] = $currentThread->getLatestPost();
            //Submit the post item by calling the threadListing object's edittbl method, thus increasing the thread's view count by 1
            $assumedThread->edittbl($incrementViews);
        }

//Instantiate a new ReplyListing object
$currentReplies = new ReplyListing();
//Get the list of replies for the current thread by calling the obect's fetchRepliesByID method
$view->repliesList = $currentReplies->fetchRepliesByID($view->threadID);

//If the "delete" button is pressed
if (isset($_POST['delete'])) {
     if ($view->sessionID == null) {
           //Redirect to the sessionExpired page
           header('location: sessionExpired.php');
       } else {       
            //Delete the row from the replies list
            $currentReplies->deletetbl($_POST);
            //Update the replies list by calling the ReplyList object's fetchRepliesByID method (by passing the thread's ID as the parameter)
            $view->repliesList = $currentReplies->fetchRepliesByID($view->threadID);
       }
} else if (isset($_POST['submit'])) {
     if (null && $view->sessionID == null) {
           //Redirect to the sessionExpired page
           header('location: sessionExpired.php');
       } else {
            if (strlen($_POST['content']) == 0) {
                $view->message = "Reply failed - Nothing entered in text box";
            } else {
            //Set the soon to be posted item's "views" value as the same as the thread's, but with 1 added to it
            $replyUpdate['views'] = ($currentThread->getViews());
            //Define the soon to be posted item's "id" value as the same as this page's id value
            $replyUpdate['id'] = $view->threadID;
            //Set the soon to be posted item's "author" value as the same as the thread's
            $replyUpdate['author'] = $currentThread->getAuthor();
            //Set the soon to be posted item's "subject" value as the same as the thread's
            $replyUpdate['subject'] = $currentThread->getSubject();
            //Set the soon to be posted item's "date" value as the same as the thread's
            $replyUpdate['date'] = $currentThread->getDate();
            //Set the soon to be posted item's "replies" value as the same as the thread's
            $replyUpdate['replies'] = (($currentThread->getReplies()) + 1);
            //Set the soon to be posted item's "latestPost" value as the same as the thread's
            $replyUpdate['latestPost'] = "By ".$_POST['username']." at ".date('l\, F jS\, Y ')." ".date('G:ia');
            //Submit the post item by calling the threadListing object's edittbl method, thus increasing the thread's view count by 1
            $assumedThread->edittbl($replyUpdate);
           
           //Insert the reply by calling the replyList object's inserttbl method
           $currentReplies->inserttbl($_POST);
           //Update the replies list by calling the ReplyList object's fetchRepliesByID method (by passing the thread's ID as the parameter)
           $view->repliesList = $currentReplies->fetchRepliesByID($view->threadID);
            }
       } 
}
}

//Require the appropriate view to display the page on the internet browser
require_once('Views/threadReplies.phtml');

