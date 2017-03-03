<?php

require_once 'checkSession.php';

include './partials/navbar.php';
include './partials/footer.php';

require_once 'dbinfo.php';

$email = '';
$name = '';
$phone = '';
$books = '';

if(isset($_POST['user_id'])) {
  $user_id = $_POST['user_id'];
  $conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);
  $query = "SELECT * FROM users WHERE user_id='$user_id'";
  $result = $conn->query($query);
  if(!$result) die($conn->error);
  $rows = $result->num_rows;
  for($j = 0; $j < $rows; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $email = $row['email'];
    $name = $row['name'];
    $phone = $row['phone'];
  }
  $conn->close();

  $conn2 = new mysqli($hn, $un, $pw, $db);
  if($conn2->connect_error) die($conn2->connect_error);
  $query2 = "SELECT * FROM books WHERE user_id='$user_id'";
  $result2 = $conn2->query($query2);
  if(!$result2) die($conn2->error);
  $rows = $result2->num_rows;
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result2->data_seek($j);
    $row = $result2->fetch_array(MYSQLI_ASSOC);
    $book_id = $row['book_id'];
    $user_id = $row['user_id'];
    $title = $row['title'];
    $author = $row['author'];
    $description = $row['description'];
    $image_link = $row['image_link'];
    $category = $row['category'];
    $isbn = $row['isbn'];
    $books =
      "<li class='collection-item avatar row'>
        <div class='col s12 m2 center'>
          <img src=$image_link alt='' style='{height: 100px; width: auto;}' />
          <p><b>ISBN-</b>$isbn</p>
        </div>
        <div class='col s12 m9 offset-m1'>
          <div class='center'>
            <span class='title'>
              <b>Title: </b>$title
              <br>
              <b>Category: </b>$category
            </span>
          </div>
          <p>
            <b>Author: </b>$author
            <br />
            <b>Description: </b>$description
          </p>
        </div>
      </li>" .$books;
  }
  $conn2->close();
}

?>

<html>
  <head>
    <meta charset='utf-8'>
    <link href='http://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
    <link rel='stylesheet' href='FA/css/font-awesome.min.css'>
    <link rel='stylesheet' href='./assets/materialize/css/materialize.css'>
    <title>Book Buddy</title>
  </head>
  <body>

    <?php echo $navbar; ?>

    <h1 class='center'><?php echo $name."'s"; ?> Library</h1>
    <div class=''>
      <div class='row container'>
        <div class='col s12 m3'>
          <img src='./assets/images/person.png' alt='its a dude' style='height: 200px;'/>
          <h5><b>Name </b> <?php echo $name; ?></h5>
          <h5><b>Email </b> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></h5>
          <h5><b>Phone </b> <a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
        </div>
        <div class='col s12 m9'>
          <ul class='collection'>
            <?php echo $books; ?>
          <ul>
        </div>
      </div>
    </div>

    <?php echo $footer; ?>

  </body>
  <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='./assets/materialize/js/materialize.js'></script>
  <script type='text/javascript' src='./assets/javascript/javascript.js'></script>
</html>
