$(document).ready(function() {
  $('#add').on('click', function() {
    var bookId = $('#bookId').val();
    var bookName = $('#bookName').val();
    var author = $('#author').val();
    var date = $('#date').val();
    $.ajax({
      url: "admin.php",
      type: 'post',
      data: {
        bookId : bookId,
        bookName : bookName,
        author : author,
        date : date
      },
      success: function(data) {
        var object = JSON.parse(data);
        if (object.status == 0) {
          $('#message').text(object.message);
        }
        else {
          $('#message').text(object.message);
        }    
      }
    });
  });
});