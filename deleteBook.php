<?php

require_once 'dbinfo.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['book_id'])) {
  $book_id = $_POST['book_id'];
  $query = "DELETE FROM books WHERE book_id='$book_id'";
  $result = $conn->query($query);
  if(!$result) die($conn->error);

  $conn->close();
  header("Location: dashboard.php");
}

?>
