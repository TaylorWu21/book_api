<?php

require_once 'dbinfo.php';

if(isset($_POST['favorite_book_id'])) {
  $favorite_book_id = $_POST['favorite_book_id'];
  $conn2 = new mysqli($hn, $un, $pw, $db);
  if($conn2->connect_error) die($conn2->connect_error);
  $query = "INSERT INTO favorites(user_id, book_id, favorite) VALUES('$user_id', '$favorite_book_id', '1')";
  $result2 = $conn2->query($query);
  if(!$result2) die($conn2->error);
  $conn2->close();
  header("Location: favorites.php");
  exit();
}

?>