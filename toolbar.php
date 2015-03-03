<?php
$id = session_id();
if ($id == "") {
    session_start();
}
if (isset($_SESSION['username'])) {
    echo '<div class="toolbarBtns">';
    echo '<ul>';
    echo '<li><a href="home.php">Home</a></li>';
    echo '<li><a href="logout.php">Logout</a></li>';
    echo '</ul>';
    echo '</div>';
}
else {
    echo '<div class="toolbarBtns">';
    echo '<ul>';
    echo '<li><a href="index.php">Home</a></li>';
    echo '<li><a href="login.php">Login</a></li>';
    echo '<li><a href="register.php">Register</a></li>';
    echo '</ul>';
    echo '</div>';
}