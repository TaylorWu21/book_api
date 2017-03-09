<?php

include './partials/navbar.php';
include './partials/footer.php';
require_once 'dbinfo.php';
require_once 'sanitize.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$failedSignup = '';

if(isset($_POST['email']) && isset($_POST['password'])) {
  // Getting User Input
  $email = mysql_fix_string($conn, $_POST['email']);
  $name = mysql_fix_string($conn, $_POST['name']);
  $phone = mysql_fix_string($conn, $_POST['phone']);
  $password = mysql_fix_string($conn, $_POST['password']);
  // salting password yo
  $salt1 = 'qm&h*';
  $salt2 = 'pg!@';
  $token = hash('ripemd128', "$salt1$password$salt2");
  // saving user to db
  $query = "INSERT INTO users(email, name, phone, password) VALUES('$email', '$name', '$phone', '$token')";
  $result = $conn->query($query);
  $failedSignup = $conn->error;
  if(!$result) die($conn->error);
  $conn->close();

  $conn2 = new mysqli($hn, $un, $pw, $db);
  if($conn2->connect_error) die($conn2->connect_error);
  $query2 = "SELECT * FROM users ORDER BY user_id DESC LIMIT 1";
  $result2 = $conn2->query($query2);
  if(!$result2) die($conn2->error);
  $rows = $result2->num_rows;

  for ($j = 0 ; $j < $rows ; ++$j) {
    $result2->data_seek($j);
    $row = $result2->fetch_array(MYSQLI_ASSOC);
    $user_id = $row['user_id'];
    $email = $row['email'];
    $name = $row['name'];
    $phone = $row['phone'];
    // starting session with new user
    session_start();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name;
    $_SESSION['phone'] = $phone;

  }
  $conn2->close();
  header("Location: dashboard.php");
  exit();
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
    <h1>Sign Up</h1>
  </div>
  <?php echo "<h4 class='center red-text'>$failedSignup</h4>" ?>
  <div class='row'>
    <form id='signup_form' class='container' method='post' action='signup.php'>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>email</i>
        <input id='email' type='text' class='validate' name='email' autofocus='true' required />
        <label for='email'>Email</label>
      </div>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>perm_identity</i>
        <input id='name' type='text' class='validate'  name='name' required />
        <label for='name'>Name</label>
      </div>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>phone</i>
        <input id='phone' type='text' class='validate' name='phone' required />
        <label for='phone'>Phone Number</label>
      </div>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>lock</i>
        <input id='password' type='password' class='validate' name='password' required />
        <label for='password'>Password</label>
      </div>
      <div class='center'>
        <button id='submit' class='btn center' type='submit'>Sign Up</button>
      </div>
    </form>
  </div>

  <?php echo $footer; ?>

  <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='./assets/materialize/js/materialize.js'></script>
  <script type='text/javascript' src='./assets/javascript/javascript.js'></script>
</body>
</html>
