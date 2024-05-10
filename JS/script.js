/**
 * A function to add a book on bucket list whenever user clicks on add to bucket
 * btton.
 */
$(document).ready(function () {
  $(document).on('click', '.bucket', function () {
    // Collection book id from data attribute.
    var bookId = $(this).data('id');
    $.ajax({
      url: "ajax-bucket.php",
      method: 'POST',
      data: {
        'book-id': bookId
      },
      success: function (response) {
        alert("Book added in bucket list.")
      }
    })
  })
/**
 * A function to remove a book from bucket list.
 */
  $(document).on('click', '.remove', function () {
    // Collection book id from data attribute.
    var bookId = $(this).data('id');
    $.ajax({
      url: "ajax-remove.php",
      method: 'POST',
      data: {
        'book-id': bookId
      },
      success: function (response) {
        $(".default-show").html(response);
      }

    })
  })
  // Defining initial offset value.
  let offset = 0;
  /**
   * A function to load 1 book each time whenever user clicks on load more button.
   */
  $(document).on('click', '.load', function () {
    // Increamenting offset value whenever button is clicked.
    offset+=1;
    $.ajax({
      url: "ajax-load.php",
      method: 'POST',
      data: {
        'offset': offset
      },
      success: function (response) {
        // Appending response to a particular div.
        $(".default-show").append(response);
      }
    })
  })
/**
 * A function to sort the books according to their title whenever sort by title button is clicked.
 */
  $(document).on('click', '.sort', function () {
    $.ajax({
      url: "ajax-sort.php",
      method: 'POST',
      success: function (response) {
        $(".default-show").html(response);
      }
    })
  })
})

