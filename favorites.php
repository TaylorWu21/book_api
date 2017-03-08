<?php

require_once 'checkSession.php';

include './partials/navbar.php';
include './partials/footer.php';

require_once 'dbinfo.php';

$name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];

$favorite_title = '<h4>Favorited Books</h4>';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
$query = "SELECT * FROM books, favorites WHERE books.book_id=favorites.book_id AND favorites.user_id='$user_id'";
$result = $conn->query($query);
if(!$result) die($conn->error);
$rows = $result->num_rows;
if($rows == 0) {
  $favorite_title = "
    <h4>No Book Favorited</h4>
  ";
}
$books = '';
for ($j = 0 ; $j < $rows ; ++$j) {
  $result->data_seek($j);
  $row = $result->fetch_array(MYSQLI_ASSOC);
  $favorite_id = $row['favorite_id'];
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
            <b>Category: </b> $category
          </span>
        </div>
        <p>
          <b>Author: </b>$author
          <br />
          <b>Description: </b>$description
        </p>
        <form class='right' method='post' action='comments.php' style='margin: 10px;'>
          <input type='hidden' name='book_id' value='$book_id' />
          <button type='submit' class='btn-floating btn-large waves-effect waves-light light-blue'><i class='material-icons'>comment</i></button>
        </form>
        <form class='right' method='post' action='deleteFavorite.php' style='margin: 10px;'>
          <input type='hidden' name='favorite_id' value='$favorite_id' />
          <button type='submit' class='btn-floating btn-large waves-effect waves-light pink'><i class='material-icons'>favorite_border</i></button>
        </form>
      </div>
    </li>" .$books;
}
$conn->close();

if(isset($_POST['favorite_book_id'])) {
  $favorite_book_id = $_POST['favorite_book_id'];
  $conn2 = new mysqli($hn, $un, $pw, $db);
  if($conn2->connect_error) die($conn2->connect_error);
  $query = "INSERT INTO favorites(user_id, book_id, favorite) VALUES('$user_id', '$favorite_book_id', '1')";
  $result2 = $conn2->query($query);
  if(!$result2) die($conn2->error);
  $conn2->close();
}


?>

<html>
  <head>
    <meta charset='utf-8'>
    <link href='http://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
    <link rel='stylesheet' href='FA/css/font-awesome.min.css'>
    <link rel='stylesheet' href='./assets/materialize/css/materialize.css'>
    <link rel='stylesheet' href='./assets/stylesheets/book.css'>
    <title>Book Buddy</title>
  </head>
  <body>

    <?php echo $navbar; ?>
    <h1 class='center'>Here's Your Favorited Books!</h1>
    <div class='row container'>
      <?php echo $favorite_title; ?>
      <ul class='collection'>
        <?php echo $books; ?>
      <ul>
    </div>
    <?php echo $footer; ?>

  </body>
  <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='./assets/materialize/js/materialize.js'></script>
  <script type='text/javascript' src='./assets/javascript/javascript.js'></script>
</html>
