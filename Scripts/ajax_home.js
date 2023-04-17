$(document).ready(function() {
  $.ajax({
    url: "home_refresh.php",
    datatype: "html",
    success: function(data) {
      $('#book-names').html(data);
    }
  });
});

$(document).ready(function() {
  $('#load').on('click', function() {
    $.ajax({
      url: "home_load.php",
      datatype: "html",
      success: function(data) {
        $('#book-names').html(data);
      }
    });
  });
});

$(document).ready(function() {
  $('button').on('click', function() {
    if ($(this).attr('add')) {
      $.ajax({
        url: "addList.php",
        type: "post",
        datatype: "html",
        data: {
          bookId: $(this).attr('add');
        },
        success: function() {
          
        }
      });
    }
  });
});
