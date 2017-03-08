<?php

require_once 'dbinfo.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['favorite_id'])) {
  $favorite_id = $_POST['favorite_id'];
  $query = "DELETE FROM favorites WHERE favorite_id='$favorite_id'";
  $result = $conn->query($query);
  if(!$result) die($conn->error);

  $conn->close();
  header("Location: favorites.php");
}

?>
