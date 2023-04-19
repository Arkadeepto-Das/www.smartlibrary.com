$(document).ready(function() {
  $.ajax({
    url: "home_refresh.php",
    datatype: "html",
    success: function(data) {
      $('#book-names').html(data);
    }
  });

  $('#load').on('click', function() {
    $.ajax({
      url: "home_load.php",
      datatype: "html",
      success: function(data) {
        $('#book-names').html(data);
      }
    });
  });

  $('.container').on('click', '.add', function() {
    var attr = $(this).attr('id');
    var curr = $(this);
    $.ajax({
      url: "addToList.php",
      type: "post",
      datatype: "html",
      data: {
        bookId: attr
      },
      success: function(data) {
        var object = JSON.parse(data);
        if (object.status == 1) {
          curr.hide();
          curr.siblings("p").html(object.message);
          console.log(curr);
        }
      }
    });
  });
});
