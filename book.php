<?php

include './partials/navbar.php';
include './partials/footer.php';

?>
<html>

<head>
  <meta charset='utf-8'>
  <link href='http://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
  <link rel='stylesheet' href='FA/css/font-awesome.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css'>
  <link rel='stylesheet' href='./assets/stylesheets/sign.css'>
  <title>Book Buddy</title>
</head>
<body>

<?php echo $navbar; ?>

  <div class='container'>
    <h1>Books</h1>
  </div>
  <div class='row'>
    <form id='book_form' class='container'>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>library_books</i>
        <input id='title' type='text' class='validate' />
        <label for='title'>Title</label>
      </div>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>assignment_ind</i>
        <input id='author' type='text' class='validate' />
        <label for='author'>Author</label>
      </div>
      <div class='center'>
        <button id='submit' class='btn center' type='submit'>Search</button>
      </div>
    </form>
  </div>
  <ul id='books' class='collection container'></ul>

  <?php echo $footer; ?>

  <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js'></script>
  <script type='text/javascript' src='./assets/javascript/book.php'></script>
  <script type='text/javascript' src='./assets/javascript/javascript.php'></script>
</body>
</html>
