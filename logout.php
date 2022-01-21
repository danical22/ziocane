<?php
require_once 'session.php';

if( !isset($loggedIn) || (!$loggedIn) ){
    echo "<h2>You are not logged in!</h2>";
    if( isset($TimeoutExpired)&&($TimeoutExpired) )
        $result = $result."<p class='red'>Timeout expired! You have not interacted with our server for too much time!</p>";
}
else {
    destroySession();
    echo "<h2>You have been successfully <span class='darkgray'>logged out</span>.</h2>"
        ."<p class='darkgray'>Did you make a mistake? Click <a href='./index.php'>here</a> to login again!</p>";
    $goodbye = true;
}
$loggedIn = false;
?>
