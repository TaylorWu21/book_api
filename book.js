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
        $('#books').append("<h4 class='book_card center'>No Books Found</h4>");
      } else {
        displayBooks(books.items);
      }
    }).fail( data =>{
      console.log(data);
    })
  });

    function saveBook() {
      e.preventDefault();
      // ${book.volumeInfo.imageLinks.thumbnail}, ${book.volumeInfo.title}, ${book.volumeInfo.description}
      console.log(img);
      console.log(title);
      console.log(description);
    }

  function displayBooks(books) {
    $('.book_card').remove();
    library = books.map( book => {
      if(book.volumeInfo.imageLinks && book.volumeInfo.categories) {
        return(`
          <div class='book_card'>
            <div class='col s12 m4 offset-m4'>
              <div class='card'>
                <div class='card-image'>
                  <img class='book-img' src='${book.volumeInfo.imageLinks.thumbnail}' />
                  <span class='card-title'>${book.volumeInfo.title}</span>
                </div>
                <div class='card-content'>
                  <p>${book.volumeInfo.categories[0]}</p>
                  <br />
                  <p>${book.volumeInfo.description}</p>
                </div>
                <div class='card-action'>
                  <a href='#' class='book_link' onClick="saveBook('${book.volumeInfo.imageLinks.thumbnail}', '${book.volumeInfo.title}', '${book.volumeInfo.description}')">Save Book</a>
                </div>
              </div>
            </div>
          </div>
        `);
      } else {
        return(`
          <div class='book_card'>
            <div class='col s12 m4 offset-m4'>
              <div class='card'>
                <div class='card-image'>
                  <img class='book-img' src='http://www.formica.com/us/~/media/global-images/ui/noimageavailable.png' />
                  <span class='card-title'>${book.volumeInfo.title}</span>
                </div>
                <div class='card-content'>
                  <p>${book.volumeInfo.description}</p>
                </div>
                <div class='card-action'>
                  <a href='#' class='book_link' onClick='saveBook()'>Save Book</a>
                </div>
              </div>
            </div>
          </div>
        `);
      }
    });
    $('#books').append(library);
  }
});
