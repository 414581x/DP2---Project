<?php
//Start a session to overwrite current session
Session_start();
//Destroy the session
Session_destroy();
//load indec.php page
header("Location: index.php");

?>