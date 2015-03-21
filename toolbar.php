<?php
$id = session_id();
if ($id == "") {
    session_start();
}
if (isset($_SESSION['username'])) {
    echo '<div class="collapse navbar-collapse" id="myNavbar">';
    echo '<ul class="nav navbar-nav navbar-right">';
    echo '<li><a href="home.php">Dashboard    <span class="badge">6</span></a></li>';
    echo '<li><a href="#">To Rent</a></li>';
    echo '<li><a href="#">Short Term</a></li>';
    echo '<li><a href="#contactForm" data-toggle="modal">Contact Us</a></li>';
    echo '<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
    echo '</ul>';
    echo '</div>';
}
else {
    echo '<div class="collapse navbar-collapse" id="myNavbar">';
    echo '<ul class="nav navbar-nav navbar-right">';
    echo '<li><a href="index.php">Home</a></li>';
    echo '<li><a href="#">To Rent</a></li>';
    echo '<li><a href="#">Short Term</a></li>';
    echo '<li><a href="#contactForm" data-toggle="modal">Contact Us</a></li>';
    echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
    echo '<li><a href="register.php"><button type="button" class="registerNav btn btn-default">Register</button></a></li>';
    echo '</ul>';
    echo '</div>';
}