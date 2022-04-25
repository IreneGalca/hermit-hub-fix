<?php
//signout.php
include 'connect.php';
include 'header.php';

session_destroy();

echo '<div class="popup">You have been logged out. <a href="signin.php"> Sign In Again</a></div>';

include 'footer.php';


?>