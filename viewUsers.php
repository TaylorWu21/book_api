<?php

require_once 'checkSession.php';

include './partials/navbar.php';
include './partials/footer.php';

require_once 'dbinfo.php';

$name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
$query = "SELECT * FROM users WHERE user_id!='$user_id'";
$result = $conn->query($query);
if(!$result) die($conn->error);
$rows = $result->num_rows;
$users = '';
for ($j = 0 ; $j < $rows ; ++$j) {
  $result->data_seek($j);
  $row = $result->fetch_array(MYSQLI_ASSOC);
  $user_id = $row['user_id'];
  $email = $row['email'];
  $name = $row['name'];
  $phone = $row['phone'];
  $users =
    "
    <li class='collection-item avatar row'>
      <div class='col s12 m2 center'>
        <img src='./assets/images/person.png' alt='' style='height: 100px; width: auto;' />
      </div>
      <div class='col s12 m10'>
        <div>
          <span class='title'>$name</span>
        </div>
        <p>
          <b>Email: </b>$email
          <br />
          <b>Phone: </b>$phone
        </p>
        <form class='right' method='post' action='showLibrary.php'>
          <input type='hidden' name='user_id' value='$user_id' />
          <button type='submit' class='btn-floating btn-large waves-effect waves-light blue'><i class='material-icons'>library_books</i></button>
        </form>
      </div>
    </li>
    ". $users;
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

    <div class='container'>
      <h1>Libraries To View</h1>
    </div>
    <ul class='collection container'><?php echo $users; ?></ul>

    <?php echo $footer; ?>

  </body>
  <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='./assets/materialize/js/materialize.js'></script>
  <script type='text/javascript' src='./assets/javascript/javascript.js'></script>
</html>
