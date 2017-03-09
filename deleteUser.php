<?php

require_once 'dbinfo.php';


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['user_id'])) {
  $user_id = $_POST['user_id'];
  $query = "DELETE FROM users WHERE user_id='$user_id'";
  $result = $conn->query($query);
  if(!$result) die($conn->error);
  
  $conn->close();
}

require_once 'signout.php'

?>
