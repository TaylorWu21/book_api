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

  function displayBooks(books) {
    $('.collection-item').remove();
    const library = books.map( book => {
      if(book.volumeInfo.imageLinks && book.volumeInfo.categories) {
        return(`
          <li class='collection-item avatar row'>
            <div class='col s12 m2 center'>
              <img src=${book.volumeInfo.imageLinks.thumbnail} alt='' style='{height: 100px; width: auto;}' />
            </div>
            <div class='col s12 m10'>
              <div class='center'>
                <span class='title'>${book.volumeInfo.title} - ${book.volumeInfo.categories[0]}</span>
              </div>
              <p>
                ${book.volumeInfo.authors[0]}
                <br />
                ${book.volumeInfo.description}
              </p>
              <a
                href='#'
                class='book_link right'
                data-img='${book.volumeInfo.imageLinks.thumbnail}'
                data-title='${book.volumeInfo.title}'
                data-description='${book.volumeInfo.description}'
                data-category='${book.volumeInfo.categories[0]}'
                data-isbn='${book.volumeInfo.industryIdentifiers[0].identifier}'
                >
                  Save Book
              </a>
            </div>
          </li>
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
      var isbn = this.dataset.isbn
      console.log(title);
      console.log(imageLink);
      console.log(description);
      console.log(category);
      console.log(isbn);
    })
  }
  // var bookLink = document.querySelectorAll('.book_link');
  // bookLink.addEventListener('click', (e) => saveBook());
});
