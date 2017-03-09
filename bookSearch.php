<?php

require_once 'checkSession.php';

include './partials/navbar.php';
include './partials/footer.php';

require_once 'dbinfo.php';

require_once 'sanitize.php';

$bookAdded = '';
if(isset($_POST['isbn'])) {
  // Save Book to DB
  $conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);
  $user_id = sanitize($_SESSION['user_id']);
  $title = sanitize($_POST['title']);
  $author = sanitize($_POST['author']);
  $description = sanitize($_POST['description']);
  $category = sanitize($_POST['category']);
  $image_link = sanitize($_POST['image_link']);
  $isbn = sanitize($_POST['isbn']);
  $query = "INSERT INTO books(user_id, title, author, description, image_link, category, isbn)
            VALUES('$user_id', '$title', '$author', '$description', '$image_link', '$category', '$isbn')";
  $result = $conn->query($query);
  $conn->close();
  $bookAdded = "Added '$title' to Library!";
}

?>
<html>

<head>
  <meta charset='utf-8'>
  <link href='http://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
  <link rel='stylesheet' href='FA/css/font-awesome.min.css'>
  <link rel='stylesheet' href='./assets/materialize/css/materialize.css'>
  <title>Book Buddy</title>
</head>
<body>

<?php echo $navbar; ?>

  <div class='container'>
    <h1>Books</h1>
  </div>

  <h4 class='center green-text'><?php echo $bookAdded; ?></h4>

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
        <a href='dashboard.php' class='btn red'>Cancel</a>
      </div>
    </form>
  </div>
  <ul id='books' class='collection container'></ul>

  <?php echo $footer; ?>

  <script type='text/javascript' src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='./assets/materialize/js/materialize.js'></script>
  <script>
  $(document).ready(function() {

    $('#submit').click(function(e) {
      e.preventDefault();
      var title = $('#title')[0].value;
      var author = $('#author')[0].value;
      $.ajax({
        url: 'https://www.googleapis.com/books/v1/volumes?q=' + title + '+inauthor:' + author,
        type: 'GET',
        dataType: 'JSON'
      }).done( books => {
        if(books.totalItems == 0) {
          $('.book_card').remove();
          $('#books').append("<li class='collection-item center'><h2>No Books Found</h2></li>");
        } else {
          displayBooks(books.items);
        }
      }).fail( data =>{
        console.log(data);
      })
    });

    function displayBooks(books) {
      $('.collection-item').remove();
      const library = books.map( book => {
        if(
          book.volumeInfo.imageLinks &&
          book.volumeInfo.categories &&
          book.volumeInfo.title &&
          book.volumeInfo.authors &&
          book.volumeInfo.industryIdentifiers)
        {
          return(`
            <li class='collection-item avatar row'>
              <div class='col s12 m2 center'>
                <img src=${book.volumeInfo.imageLinks.thumbnail} alt='' style='{height: 100px; width: auto;}' />
                <p><b>ISBN-</b>${book.volumeInfo.industryIdentifiers[0].identifier}</p>
              </div>
              <div class='col s12 m10'>
                <div class='center'>
                  <span class='title'>
                    <b>Title:</b> ${book.volumeInfo.title}
                    <br>
                    <b>Category:</b> ${book.volumeInfo.categories[0]}
                  </span>
                </div>
                <p>
                  <b>Author:</b> ${book.volumeInfo.authors[0]}
                  <br />
                  <b>Description:</b> ${book.volumeInfo.description}
                </p>
                <form class='book_link right' method='post' action='bookSearch.php'>
                  <input type='hidden' name='title' value='${book.volumeInfo.title}' />
                  <input type='hidden' name='author' value='${book.volumeInfo.authors[0]}' />
                  <input type='hidden' name='description' value='${book.volumeInfo.description}' />
                  <input type='hidden' name='image_link' value='${book.volumeInfo.imageLinks.thumbnail}' />
                  <input type='hidden' name='category' value='${book.volumeInfo.categories[0]}' />
                  <input type='hidden' name='isbn' value='${book.volumeInfo.industryIdentifiers[0].identifier}' />
                  <button type='submit' class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">library_add</i></button>
                </form>
              </div>
            </li>
          `);
        }
      });
      $('#books').append(library);
    }
  });
  </script>
  <script type='text/javascript' src='./assets/javascript/javascript.js'></script>
</body>
</html>
