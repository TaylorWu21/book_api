<?php

require_once 'dbinfo.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if(isset($_POST['comment_id'])) {
  $comment_id = $_POST['comment_id'];
  $query = "DELETE FROM comments WHERE comment_id='$comment_id'";
  $result = $conn->query($query);
  if(!$result) die($conn->error);

  $conn->close();
  header("Location: dashboard.php");
}

?>
