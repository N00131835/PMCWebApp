<?php
$id = session_id();
if ($id == "") {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
//this page is used to redirect to the login page if they didn't login yet.
