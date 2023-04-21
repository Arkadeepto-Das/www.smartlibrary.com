$(document).ready(function() {
  $.ajax({
    url: "/home",
    type: "post",
    datatype: "html",
    data: {
      refresh : 1
    },
    success: function(data) {
      $('#book-names').html(data);
    }
  });

  $('#load').on('click', function() {
    $.ajax({
      url: "/home",
      type: "post",
      datatype: "html",
      data: {
        load : 1
      },
      success: function(data) {
        $('#book-names').html(data);
      }
    });
  });

  $('.container').on('click', '.add', function() {
    var attr = $(this).attr('id');
    var curr = $(this);
    $.ajax({
      url: "/home",
      type: "post",
      datatype: "html",
      data: {
        add : 1,
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
