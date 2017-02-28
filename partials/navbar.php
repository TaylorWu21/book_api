<?php

  $navbar = '';

  if(isset($_SESSION['user_id'])) {
    $navbar =
    "
      <div class='home-page'>
        <nav class='blue'>
          <div class='nav-wrapper container'>
            <a href='index.php' class='brand-logo'>Logo</a>
            <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
            <ul class='right hide-on-med-and-down'>
              <li><a href='dashboard.php'>Dashboard</a></li>
              <li><a href='bookSearch.php'>Add Books</a></li>
              <li><a href='signout.php'>Sign Out</a></li>
            </ul>
            <ul class='side-nav' id='mobile-demo'>
              <li><a href='dashboard.php'>Dashboard</a></li>
              <li><a href='bookSearch.php'>Add Books</a></li>
              <li><a href='signout.php'>Sign Out</a></li>
            </ul>
          </div>
        </nav>
      </div>
    ";
  } else {
    $navbar =
    "
      <div class='home-page'>
        <nav class='blue'>
          <div class='nav-wrapper container'>
            <a href='index.php' class='brand-logo'>Logo</a>
            <a href='#' data-activates='mobile-demo' class='button-collapse'><i class='material-icons'>menu</i></a>
            <ul class='right hide-on-med-and-down'>
              <li><a href='signup.php'>Sign Up</a></li>
              <li><a href='signin.php'>Sign In</a></li>
            </ul>
            <ul class='side-nav' id='mobile-demo'>
              <li><a href='signup.php'>Sign Up</a></li>
              <li><a href='signin.php'>Sign In</a></li>
            </ul>
          </div>
        </nav>
      </div>
    ";
  }
?>
