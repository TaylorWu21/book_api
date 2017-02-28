<?php

require_once 'checkSession.php';

include './partials/navbar.php';
include './partials/footer.php';
require_once 'dbinfo.php';

$name = $_SESSION['name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];

$rent_id = '';
$book_id = '';
$borrower_name = '';
$return_date = '';
$rent_borrower_id = '';

if(isset($_GET['rent_id'])) {
  $rent_id = $_GET['rent_id'];
  $conn2 = new mysqli($hn, $un, $pw, $db);
  if($conn2->connect_error) die($conn2->connect_error);
  $query2 = "SELECT * FROM rents, users WHERE rents.borrower_id=users.user_id AND rent_id='$rent_id'";
  $result2 = $conn2->query($query2);
  if(!$result2) die($conn2->error);
  $rows2 = $result2->num_rows;
  for ($j = 0 ; $j < $rows2 ; ++$j) {
    $result2->data_seek($j);
    $row2 = $result2->fetch_array(MYSQLI_ASSOC);
    $rent_borrower_id = $row2['borrower_id'];
    $borrower_name = $row2['name'];
    $return_date = $row2['return_date'];
  }
  $conn2->close();
}

if(isset($_POST['rent_id'])) {
  $updated_rent_id = $_POST['rent_id'];
  $updated_borrower_id = $_POST['borrower_id'];
  $updated_return_date = $_POST['return_date'];
  $conn3 = new mysqli($hn, $un, $pw, $db);
  if($conn3->connect_error) die($conn3->connect_error);
  $query3 = "UPDATE rents SET borrower_id='$updated_borrower_id', return_date='$updated_return_date' WHERE rent_id='$updated_rent_id'";
  $result3 = $conn3->query($query3);
  if(!$result3) die($conn3->error);
  $conn3->close();
  header("Location: rentedBooks.php");
}

class User {
  public $user_id, $name;

  function __construct($id, $name) {
    $this->user_id = $id;
    $this->name = $name;
  }
}

$users = array();
$user_option = '';

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
  if($id == $rent_borrower_id) {
    $user_option = "<option value=$id selected>$name</option>".$user_option;
  } else {
    $user_option = "<option value=$id>$name</option>".$user_option;
  }
}
$conn->close();


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

    <form method='post' action='editRent.php'>
      <div class="input-field col s12 m6">
        <i class='material-icons prefix'>perm_contact_calendar</i>
        <select id='rent' name='borrower_id'>
          <?php echo $user_option; ?>
        </select>
        <label for='rent'>Renter</label>
      </div>
      <div class='input-field col s12 m6'>
        <i class='material-icons prefix'>today</i>
        <input id='return_date' type="date" class="datepicker" name='return_date' required />
        <label for='return_date'>Choose the Return Date</label>
      </div>
      <input type='hidden' name='book_id' value=<?php echo $book_id; ?> />
      <input type='hidden' name='rent_id' value=<?php echo $rent_id; ?> />
      <div class='center'>
        <input class='btn' type='submit' value='Update Rental' required />
      </div>
    </form>

  </div>

  <?php echo $footer; ?>

</body>
<script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
<script src='./assets/materialize/js/materialize.js'></script>
<script type='text/javascript' src='./assets/javascript/javascript.js'></script>
<script>
  var $input = $('.datepicker').pickadate();

  // Use the picker object directly.
  var picker = $input.pickadate('picker');
  picker.set('select', '<?php echo $return_date; ?>', { format: 'yyyy-mm-dd' });
</script>
</html>
