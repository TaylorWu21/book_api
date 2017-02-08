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
    debugger;
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
                  <a
                    href='#'
                    class='book_link text-blue'
                    data-img='${book.volumeInfo.imageLinks.thumbnail}'
                    data-title='${book.volumeInfo.title}'
                    data-description='${book.volumeInfo.description}'
                    data-category='${book.volumeInfo.categories[0]}'
                  >
                    Save Book
                  </a>
                </div>
              </div>
            </div>
          </div>
        `);
      }
    });
    $('#books').append(library);
    $('.book_link').click(function(e) {
      e.preventDefault();
      var title = this.dataset.title;
      var imageLink = this.dataset.img;
      var description = this.dataset.description;
      var category = this.dataset.category;
      console.log(title);
      console.log(imageLink);
      console.log(description);
      console.log(category);
    })
  }
  // var bookLink = document.querySelectorAll('.book_link');
  // bookLink.addEventListener('click', (e) => saveBook());
});
