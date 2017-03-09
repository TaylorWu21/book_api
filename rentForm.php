<?php
require_once 'checkSession.php';

include './partials/navbar.php';
include './partials/footer.php';

require_once 'dbinfo.php';

require_once 'sanitize';

$name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];

// user object constructor
class User {
  public $user_id, $name;

  function __construct($id, $name) {
    $this->user_id = $id;
    $this->name = $name;
  }
}

$users = array();
$user_option = '';
$book_id = '';

// get all the users excepted the one thats logged in
if(isset($_POST['book_id'])) {
  $book_id = $_POST['book_id'];
  $conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);
  $query = "SELECT * FROM users WHERE user_id!='$user_id'";
  $result = $conn->query($query);
  if(!$result) die($conn->error);
  $rows = $result->num_rows;
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $borrower_id = $row['user_id'];
    $name = $row['name'];
    $user = new User($borrower_id, $name);
    $users[] = $user;
  }
  foreach($users as $user) {
    $id = $user->user_id;
    $name = $user->name;
    $user_option = "<option value=$id>$name</option>".$user_option;
  }
  $conn->close();
}

// save rented book
if(isset($_POST['date'])) {
  $book_id = sanitize($_POST['book_id']);
  $borrower_id = sanitize($_POST['renter_id']);
  $return_date = sanitize($_POST['date']);
  $conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);
  $query = "INSERT INTO rents(book_id, lender_id, borrower_id, return_date)
                       VALUES('$book_id', '$user_id', '$borrower_id', '$return_date')";
  $result = $conn->query($query);
  if(!$result) die($conn->error);
  $conn->close();
  header("Location: rentedBooks.php");
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

  <div class='container row'>
    <h1>Rent Form</h1>
    <form method='post' action='rentForm.php'>
      <div class="input-field col s6">
        <i class='material-icons prefix'>perm_contact_calendar</i>
        <select id='rent' name='renter_id'>
          <option disabled selected>Choose the User</option>
          <?php echo $user_option; ?>
        </select>
        <label for='rent'>Renter</label>
      </div>
      <div class='input-field col s6'>
        <i class='material-icons prefix'>today</i>
        <input id='return_date' type="date" class="datepicker" name='date' required/>
        <label for='return_date'>Choose the Return Date</label>
      </div>
      <input type='hidden' name='book_id' value=<?php echo $book_id; ?> />
      <div class='center'>
        <input class='btn' type='submit' value='Rent Out Book!' />
        <a href='dashboard.php' class='btn red'>Cancel</a>
      </div>
    </form>
  </div>


  <?php echo $footer; ?>

</body>
<script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
<script src='./assets/materialize/js/materialize.js'></script>
<script type='text/javascript' src='./assets/javascript/javascript.js'></script>
</html>
