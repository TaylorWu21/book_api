<?php

require_once 'checkSession.php';

include './partials/navbar.php';
include './partials/footer.php';

require_once 'dbinfo.php';

$name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];

$book_id = '';

if(isset($_POST['comment'])) {
  $comment = $_POST['comment'];
  $book_id = $_POST['book_id'];
  $conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);
  $query = "INSERT INTO comments(user_id, book_id, comment) VALUES('$user_id', '$book_id', '$comment')";
  $conn->query($query);
  $conn->close();
}

$book_info = '';
$comments = '';
$book_title = '';
$book_username = '';
$book_user_id = '';

if(isset($_POST['book_id'])) {
  $book_id = $_POST['book_id'];
  $conn1 = new mysqli($hn, $un, $pw, $db);
  if($conn1->connect_error) die($conn1->connect_error);
  $query = "SELECT * FROM books, users WHERE books.user_id=users.user_id AND book_id='$book_id'";
  $result = $conn1->query($query);
  if(!$result) die($conn1->error);
  $rows = $result->num_rows;
  $books = '';
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $book_user_id = $row['user_id'];
    $book_title = $row['title'];
    $book_username = $row['name'];
    $book_id = $row['book_id'];
    $title = $row['title'];
    $author = $row['author'];
    $image_link = $row['image_link'];
    $book_info = "
      <img src='$image_link' alt='$title' style='height: 200px;' />
      <b><h5>$title</p></h5>
      <h6>$author</h6>
    ";
  }
  $conn1->close();

  $conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);
  $query = "SELECT * FROM books, comments, users WHERE books.book_id=comments.book_id AND comments.user_id=users.user_id AND books.book_id='$book_id'";
  $result = $conn->query($query);
  if(!$result) die($conn->error);
  $rows = $result->num_rows;
  $books = '';
  if($rows == 0) {
    $comments = "
      <li class='collection-item'>
        <h4 class='title'>No Comments Yet!</h4>
      </li>
    ";
  }
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $commenter_userid = $row['user_id'];
    $comment = $row['comment'];
    $time = $row['time'];
    $comment_id = $row['comment_id'];
    $commenter_name = $row['name'];
    $book_id = $row['book_id'];
    if($commenter_userid == $user_id) {
      $comments .=  "
        <li class='collection-item avatar row'>
            <div class='col s12 m2 center'>
              <img src='./assets/images/person.png' alt='' style='height: 100px; width: auto;' />
              <p>$commenter_name</p>
            </div>
            <div class='col s12 m9 offset-m1'>
            <div class='center'>
              <span class='title'>$comment</span>
            </div>
            <form class='right' method='post' action='deleteComment.php' style='margin: 10px;'>
              <input type='hidden' name='comment_id' value='$comment_id' />
              <button type='submit' class='btn-floating btn-large waves-effect waves-light red'><i class='material-icons'>delete</i></button>
            </form>
            <form class='right' method='post' action='editComment.php' style='margin: 10px;'>
              <input type='hidden' name='comment_id' value='$comment_id' />
              <button type='submit' class='btn-floating btn-large waves-effect waves-light orange'><i class='material-icons'>mode_edit</i></button>
            </form>
            <div class='center' style='padding-top: 80px;'>
              <p>$time</p>
            </div>
          </div>
        </li>
      ";
    } else {
      $comments .= "
        <li class='collection-item avatar row'>
          <div class='col s12 m2 center'>
              <img src='./assets/images/person.png' alt='' style='height: 100px; width: auto;' />
              <p>$commenter_name</p>
            </div>
            <div class='col s12 m9 offset-m1'>
            <div class='center'>
              <span class='title'>$comment</span>
            </div>
            <div class='center' style='padding-top: 80px;'>
              <p>$time</p>
            </div>
          </div>
        </li>
      ";
    }
  }
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

  <div class='container row'>
    <h2>Comments For <?php echo "$book_username's" ?> <?php echo $book_title ?></h2>

    <div class='col s12 m3'>
      <?php echo $book_info; ?>
      <form method='post' action='showLibrary.php'>
        <input type='hidden' name='user_id' value=<?php echo $book_user_id; ?> />
        <input type='submit' class='btn' value=<?php echo "Back to $book_username's Library"; ?> />
      </form>
    </div>

    <div class='col s12 m9'>
      <ul class='collection'>
        <?php echo $comments; ?>
      <ul>
    </div>
    <div id="modal1" class="modal">
      <div class="modal-content">
        <h4>Comment Form</h4>
        <form class='row' method='post' action='comments.php'>
          <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea" name='comment'></textarea>
            <label for="textarea1">Textarea</label>
          </div>
          <input type='hidden' name='book_id' value=<?php echo $book_id; ?> />
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
            <button type='submit' class="waves-effect waves-green btn-flat ">submit</button>
          </div>
        </form>
    </div>
    <a class="modal-trigger btn-large waves-effect waves-light green right" href="#modal1">Add Comment</a>
  </div>


  <?php echo $footer; ?>

</body>
<script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
<script src='./assets/materialize/js/materialize.js'></script>
<script type='text/javascript' src='./assets/javascript/javascript.js'></script>
</html>
