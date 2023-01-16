<?php
// Start the session
session_start();

// if the user is already logged in then redirect user to welcome page
if (isset($_SESSION["id"]) && $_SESSION["id"] === true) {
    header("location: userhome.html");
    exit;
}
?>