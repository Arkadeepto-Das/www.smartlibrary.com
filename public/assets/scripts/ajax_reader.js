$(document).ready(function() {
  $.ajax({
    url: "/reader",
    type: "post",
    datatype: "html",
    data : {
      list : 1
    },
    success: function(data) {
      $('.container').html(data);
    }
  });
});