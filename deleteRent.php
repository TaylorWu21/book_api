<?php

require_once 'dbinfo.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['rent_id'])) {
  $rent_id = $_POST['rent_id'];
  $query = "DELETE FROM rents WHERE rent_id='$rent_id'";
  $result = $conn->query($query);
  if(!$result) die($conn->error);

  $conn->close();
  header("Location: rentedBooks.php");
}

?>
