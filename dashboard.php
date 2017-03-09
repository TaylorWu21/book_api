<?php

require_once 'checkSession.php';

include './partials/navbar.php';
include './partials/footer.php';

require_once 'dbinfo.php';

$name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];

require_once 'addFavorites.php';

$library = "<h4>Here's Your Library</h4>";

//Get all books of user
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
$query = "SELECT * FROM books WHERE user_id='$user_id'";
$result = $conn->query($query);
if(!$result) die($conn->error);
$rows = $result->num_rows;
if($rows == 0) {
  $library = "
    <h4>No Book In Your Library</h4>
    <h4><a href='bookSearch.php'>Click Here To Start Adding!</a></h4>
  ";
}
$books = '';
for ($j = 0 ; $j < $rows ; ++$j) {
  $result->data_seek($j);
  $row = $result->fetch_array(MYSQLI_ASSOC);
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
        <form class='right' method='post' action='deleteBook.php' style='margin: 10px;'>
          <input type='hidden' name='book_id' value='$book_id' />
          <button type='submit' class='btn-floating btn-large waves-effect waves-light red'><i class='material-icons'>delete</i></button>
        </form>
        <form class='right' method='post' action='rentForm.php' style='margin: 10px;'>
          <input type='hidden' name='book_id' value='$book_id' />
          <button type='submit' class='btn-floating btn-large waves-effect waves-light blue'><i class='material-icons'>supervisor_account</i></button>
        </form>
        <form class='right' method='post' action='comments.php' style='margin: 10px;'>
          <input type='hidden' name='book_id' value='$book_id' />
          <button type='submit' class='btn-floating btn-large waves-effect waves-light light-blue'><i class='material-icons'>comment</i></button>
        </form>
        <form class='right' method='post' action='dashboard.php' style='margin: 10px;'>
          <input type='hidden' name='favorite_book_id' value='$book_id' />
          <button type='submit' class='btn-floating btn-large waves-effect waves-light pink'><i class='material-icons'>favorite</i></button>
        </form>
      </div>
    </li>" .$books;
}
$conn->close();

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
    <h1 class='center'>Welcome <?php echo $name; ?>!</h1>
    <div class='row container'>
      <div class='col s12 m3'>
        <img src='./assets/images/person.png' alt='its a dude' style='height: 200px;'/>
        <h5><b>Email </b> <?php echo $email; ?></h5>
        <h5><b>Name </b> <?php echo $name; ?></h5>
        <h5><b>Phone </b> <?php echo $phone; ?></h5>
        <form method='post' action='editUser.php'>
          <button type='submit' class='btn-floating btn-large waves-effect waves-light orange'><i class='material-icons'>mode_edit</i></button>
        </form>
        <form method='post' action='viewUsers.php'>
          <input class='btn' type='submit' value="See Other's Library!" />
        </form>
        <form method='post' action='rentedBooks.php'>
          <input class='btn blue-grey' type='submit' value="books you've rented" />
        </form>
        <form method='post' action='borrowedBooks.php'>
          <input class='btn blue-grey' type='submit' value="books you've borrowed" />
        </form>
      </div>
      <div class='col s12 m9'>
        <?php echo $library; ?>
        <ul class='collection'>
          <?php echo $books; ?>
        <ul>
      </div>
    </div>
    <?php echo $footer; ?>

  </body>
  <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='./assets/materialize/js/materialize.js'></script>
  <script type='text/javascript' src='./assets/javascript/javascript.js'></script>
</html>
