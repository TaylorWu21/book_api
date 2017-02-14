<?php

include './partials/navbar.php';
include './partials/footer.php';

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8'>
  <link href='http://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
  <link rel='stylesheet' href='FA/css/font-awesome.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css'>
  <link rel='stylesheet' href='./assets/stylesheets/index.css'>
  <title>Book Buddy</title>
</head>
<body>

  <?php echo $navbar; ?>

  <div class='row container app-info'>
    <div class='col s12 m4 center'>
      <i class='large material-icons'>library_books</i>
      <h4>Build your library</h4>
      <p>Add any books to your library and build up a vast library Lorem Khaled Ipsum is a major key to success. Let’s see what Chef Dee got that they don’t want us to eat. Egg whites, turkey sausage, wheat toast, water. Of course they don’t want us
          to eat our breakfast, so we are going to enjoy our breakfast. Always remember in the jungle there’s a lot of they in there, after you overcome they, you will make it to paradise. We don’t see them, we will never see them. Learning is cool,
          but knowing is better, and I know the key to success.
      </p>
    </div>
    <div class='col s12 m4 center'>
      <i class='large material-icons'>people</i>
      <h4>Socialize</h4>
      <p>Connect with other users and socialize about books you love! Lorem Khaled Ipsum is a major key to success. Let’s see what Chef Dee got that they don’t want us to eat. Egg whites, turkey sausage, wheat toast, water. Of course they don’t want
          us to eat our breakfast, so we are going to enjoy our breakfast. Always remember in the jungle there’s a lot of they in there, after you overcome they, you will make it to paradise. We don’t see them, we will never see them. Learning is
          cool, but knowing is better, and I know the key to success.
      </p>
    </div>
    <div class='col s12 m4 center'>
      <i class='large material-icons'>search</i>
      <h4>Seach with the best</h4>
      <p>Use Google Books API to search for any books you want and add it to your library! Lorem Khaled Ipsum is a major key to success. Let’s see what Chef Dee got that they don’t want us to eat. Egg whites, turkey sausage, wheat toast, water. Of
          course they don’t want us to eat our breakfast, so we are going to enjoy our breakfast. Always remember in the jungle there’s a lot of they in there, after you overcome they, you will make it to paradise. We don’t see them, we will never
          see them. Learning is cool, but knowing is better, and I know the key to success.
      </p>
    </div>
  </div>

  <div class='row container app-info'>
    <div class='col s12 m6 l6 center'>
      <i class='fa falink fa-github fa-5x'></i>
    </div>
    <div class='col s12 m6 l6 center'>
      <h4>Check out the github Repo</h4>
    </div>
  </div>

  <?php echo $footer; ?>

  <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js'></script>
  <script type='text/javascript' src='./assets/javascript/javascript.php'></script>
</body>
</html>
