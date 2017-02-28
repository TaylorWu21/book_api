<?php

session_start();
if(isset($_SESSION['user_id'])) {
  $_SESSION = array();
  setCookie(session_name(), '', time() -2592000, '/');
  session_destroy();

  header("Location: index.php");
}

?>
