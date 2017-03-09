<?php

include './partials/navbar.php';
include './partials/footer.php';
require_once 'dbinfo.php';

require_once 'sanitize.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$failedLogin = '';

if (isset($_POST['email']) && isset($_POST['password'])) {
	// get values from server
	$tmp_email = mysql_entities_fix_string($conn, $_POST['email']);
	$tmp_password = mysql_entities_fix_string($conn, $_POST['password']);

	//get password from DB
	$query = "SELECT * FROM users WHERE email='$tmp_email'";
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	$rows = $result->num_rows;
	$email = '';
	$name = '';
	$phone = '';
	$password = '';
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$user_id = $row['user_id'];
		$email = $row['email'];
		$name = $row['name'];
		$phone = $row['phone'];
		$password = $row['password'];
	}
	$conn->close();
	
	//salt and hash tmp password
	$salt1 = 'qm&h*';
	$salt2 = 'pg!@';
	$token = hash('ripemd128', "$salt1$tmp_password$salt2");
	// compare password
	if($password == $token) {
    session_start();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name;
    $_SESSION['phone'] = $phone;
    header("Location: dashboard.php");
    exit();
	} else {
		$failedLogin = "failed to login";
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
    <h1>Sign In</h1>
  </div>
  <?php echo "<h4 class='center red-text'>$failedLogin</h4>"; ?>
  <div class='row'>
    <form id='signup_form' class='container' method='post' action='signin.php'>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>email</i>
        <input id='email' type='text' class='validate' name='email' autofocus='true'/>
        <label for='email'>Email</label>
      </div>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>lock</i>
        <input id='password' type='password' class='validate' name='password' />
        <label for='password'>Password</label>
      </div>
      <div class='center'>
        <button id='submit' class='btn center' type='submit'>Sign In</button>
      </div>
    </form>
  </div>

  <?php echo $footer; ?>


  <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='./assets/materialize/js/materialize.js'></script>
  <script type='text/javascript' src='./assets/javascript/javascript.js'></script>
</body>
</html>
