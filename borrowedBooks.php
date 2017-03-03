<?php

require_once 'checkSession.php';

include './partials/navbar.php';
include './partials/footer.php';

require_once 'dbinfo.php';

$name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];

$rentedBooks = '';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
$query = "SELECT * FROM users, rents, books WHERE rents.book_id = books.book_id AND books.user_id = users.user_id AND rents.borrower_id='$user_id'";
$result = $conn->query($query);
if(!$result) die($conn->error);
$rows = $result->num_rows;
for ($j = 0 ; $j < $rows ; ++$j) {
  $result->data_seek($j);
  $row = $result->fetch_array(MYSQLI_ASSOC);
  $rent_id = $row['rent_id'];
  $return_date = $row['return_date'];
  $book_id = $row['book_id'];
  $title = $row['title'];
  $author = $row['author'];
  $description = $row['description'];
  $image_link = $row['image_link'];
  $category = $row['category'];
  $isbn = $row['isbn'];
  $lender_email = $row['email'];
  $lender_name = $row['name'];
  $lender_phone = $row['phone'];

  $rentedBooks =
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
      <a class='modal-trigger btn-floating btn-large waves-effect waves-light right blue' style='margin: 10px;' href='#$rent_id'><i class='material-icons'>perm_identity</i></a>
      <form class='right' method='post' action='comments.php' style='margin: 10px;'>
        <input type='hidden' name='book_id' value='$book_id' />
        <button type='submit' class='btn-floating btn-large waves-effect waves-light light-blue'><i class='material-icons'>comment</i></button>
      </form>
      <br>
      <div class='center'><h5><b>Return Date:</b> $return_date</h5></div>
    </div>
  </li>
  <div id='$rent_id' class='modal'>
    <div class='modal-content'>
      <div class='row'>
        <div class='col s12 m6 center'>
          <img src='./assets/images/person.png' style='height:200px;'/>
        </div>
        <div class='col s12 m6'>
          <h3>Lender's Information</h3>
          <h5><b>Email </b> <a href='mailto:$lender_email'>$lender_email</a></h5>
          <h5><b>Name </b> $lender_name</h5>
          <h5><b>Phone </b> <a href='tel:$lender_phone'>$lender_phone</a></h5>
        </div>
      </div>
    </div>
    <div class='modal-footer'>
      <a href='#!' class='modal-action modal-close waves-effect waves-red btn-flat'>Close</a>
    </div>
  </div>" .$rentedBooks;
}
$conn->close();
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
  <main>
  <div class='container row'>
    <h1>Rented Books</h1>

    <ul class='collection'>
      <?php echo $rentedBooks; ?>
    <ul>

  </div>
</main>

  <?php echo $footer; ?>

</body>
<script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
<script src='./assets/materialize/js/materialize.js'></script>
<script type='text/javascript' src='./assets/javascript/javascript.js'></script>
</html>
