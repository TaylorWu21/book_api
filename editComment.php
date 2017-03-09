<?php

require_once 'checkSession.php';

include './partials/navbar.php';
include './partials/footer.php';
require_once 'dbinfo.php';

require_once 'sanitize.php';

$comment = '';
$comment_id = '';


if(isset($_POST['comment'])) {
  $comment_id = sanitize($_POST['comment_id']);
  $comment = sanitize($_POST['comment']);
  $conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);
  echo 'fuck'.$comment_id;
  $query = "UPDATE comments SET comment='$comment' WHERE comment_id='$comment_id'";
  $conn->query($query);
  $conn->close();
  header("Location: dashboard.php");
}

if(isset($_POST['comment_id'])) {
  $comment_id = $_POST['comment_id'];
  $conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);
  $query = "SELECT * FROM comments WHERE comment_id=$comment_id";
  $result = $conn->query($query);
  if(!$result) die($conn->error);
  $rows = $result->num_rows;
  for ($j = 0 ; $j < $rows ; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $comment = $row['comment'];
  }
  $conn->close();
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
    <h1>Edit Comment</h1>
  </div>

  <div class='row'>
    <form id='comment_update_form' class='container' method='post' action='editComment.php'>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>comment</i>
        <textarea id='comment' type='text' class='validate materialize-textarea' name='comment' value='shit' required autofocus='true'></textarea>
        <label for='comment'>Comment</label>
      </div>
      <input type='hidden' name='comment_id' value=<?php echo $comment_id; ?> />
      <div class='center'>
        <input type='submit' class='btn' value='submit' />
        <a href='dashboard.php' class='btn red'>Cancel</a>
      </div>
    </form>
  </div>

  <?php echo $footer; ?>

  <script>
    document.getElementById('comment').value = '<?php echo $comment; ?>'
  </script>

  <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='./assets/materialize/js/materialize.js'></script>
  <script type='text/javascript' src='./assets/javascript/javascript.js'></script>
</body>
</html>
