$(document).ready(function() {
  $.ajax({
    url: "reader.php",
    datatype: "html",
    success: function(data) {
      $('#book_names').append(data);
    }
  });
});