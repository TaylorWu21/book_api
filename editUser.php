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

if(isset($_POST['email'])) {
  //Get updated info
  $email = $_POST['email'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  // set new session Infp
  $_SESSION['email'] = $email;
  $_SESSION['name'] = $name;
  $_SESSION['phone'] = $phone;
  $query = "UPDATE users SET email='$email', name='$name', phone='$phone' WHERE user_id='$user_id'";
  $result = $conn->query($query);
  if(!$result) die($conn->error);
  $conn->close();
  header("Location: dashboard.php");
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
    <h1>Edit Personal Info</h1>
  </div>

  <div class='row'>
    <form id='user_update_form' class='container' method='post' action='editUser.php'>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>email</i>
        <input id='email' type='text' class='validate' name='email' value=<?php echo $email; ?> required />
        <label for='email'>Email</label>
      </div>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>perm_identity</i>
        <input id='name' type='text' class='validate'  name='name' value=<?php echo $name; ?> required />
        <label for='name'>Name</label>
      </div>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>phone</i>
        <input id='phone' type='text' class='validate' name='phone' value=<?php echo $phone; ?> required />
        <label for='phone'>Phone Number</label>
      </div>
      <div class='center'>
        <button id='submit' class='btn center' type='submit'>Update Profile</button>
        <a href='dashboard.php' class='btn red'>Cancel</a>
      </div>
    </form>
  </div>

  <?php echo $footer; ?>


  <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='./assets/materialize/js/materialize.js'></script>
  <script type='text/javascript' src='./assets/javascript/javascript.js'></script>
</body>
</html>
