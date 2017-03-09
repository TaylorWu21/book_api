<?php

require_once 'checkSession.php';

include './partials/navbar.php';
include './partials/footer.php';
require_once 'dbinfo.php';

require_once 'sanitize.php';

$name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
$query = "SELECT password FROM users WHERE user_id='$user_id'";
$result = $conn->query($query);
if(!$result) die($conn->error);
$rows = $result->num_rows;
$old_password = '';
for ($j = 0 ; $j < $rows ; ++$j) {
  $result->data_seek($j);
  $row = $result->fetch_array(MYSQLI_ASSOC);
  $old_password = $row['password'];
}
$conn->close();

if(isset($_POST['current_password'])) {
  $salt1 = 'qm&h*';
  $salt2 = 'pg!@';
  $tmp_password = sanitize($_POST['current_password']);
  $new_password = sanitize($_POST['new_password']);
  $confirm_password = sanitize($_POST['confirm_password']);
  $new_token = hash('ripemd128', "$salt1$new_password$salt2");
  $confirm_token = hash('ripemd128', "$salt1$confirm_password$salt2");
  $token = hash('ripemd128', "$salt1$tmp_password$salt2");
  if($old_password == $token && $new_token == $confirm_token) {
    $conn2 = new mysqli($hn, $un, $pw, $db);
    if($conn2->connect_error) die($conn2->connect_error);
    $query2 = "UPDATE users SET password='$new_token' WHERE user_id='$user_id'";
    $result2 = $conn2->query($query2);
    if(!$result2) die($conn2->error);
    $conn2->close();
    header("Location: dashboard.php");
  }
}

?>

<html>
<head>
  <meta charset='utf-8'>
  <link href='http://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
  <link rel='stylesheet' href='FA/css/font-awesome.min.css'>
  <link rel='stylesheet' href='./assets/materialize/css/materialize.css'>
  <link rel='stylesheet' href='./assets/stylesheets/sign.css'>
  <title>Book Buddy</title>
</head>
<body>

  <?php echo $navbar; ?>

  <div class='container'>
    <h1>Edit Password</h1>
  </div>

  <div class='row'>
    <form id='user_update_form' class='container' method='post' action='editPassword.php'>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>lock</i>
        <input id='current_password' type='password' class='validate' name='current_password' required />
        <label for='current_password'>Current Password</label>
      </div>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>lock_outline</i>
        <input id='new_password' type='password' class='validate'  name='new_password' required />
        <label for='new_password'>New Password</label>
      </div>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>lock_outline</i>
        <input id='confirm_password' type='password' class='validate' name='confirm_password' required />
        <label for='confirm_password'>Confirm Password</label>
      </div>
      <div class='center'>
        <button id='submit' class='btn center' type='submit'>Update Password</button>
        <a href='editUser.php' class='btn orange'>Cancel</a>
      </div>
    </form>
  </div>

  <?php echo $footer; ?>

  <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='./assets/materialize/js/materialize.js'></script>
  <script type='text/javascript' src='./assets/javascript/javascript.js'></script>
</body>
</html>
