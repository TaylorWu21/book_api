<?php echo "

<html>
<head>
  <meta charset='utf-8'>
  <link href='http://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
  <link rel='stylesheet' href='FA/css/font-awesome.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css'>
  <!-- <link rel='stylesheet' href='./assets/stylesheets/styles.css'> -->
  <title>Book Buddy</title>
</head>
<body>

  <h1 class='center'>Sign In</h1>
  <div class='row'>
    <form id='signup_form' class='container'>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>email</i>
        <input id='email' type='text' class='validate' />
        <label for='email'>Email</label>
      </div>
      <div class='col s12 input-field'>
        <i class='material-icons prefix'>lock</i>
        <input id='password' type='password' class='validate' />
        <label for='password'>Password</label>
      </div>
      <div class='center'>
        <button id='submit' class='btn center' type='submit'>Sign In</button>
      </div>
    </form>
  </div>

  <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js'></script>
  <script type='text/javascript' src='./assets/javascript/book.js'></script>

</body>
</html>

"
?>
