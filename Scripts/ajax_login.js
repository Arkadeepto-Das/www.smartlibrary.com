$(document).ready(function() {
  $('#login').on('click', function() {
    var userName = $('#username').val();
    var password = $('#password').val();
    $.ajax({
      url: 'login.php',
      type: 'post',
      data: {
        userName : userName,
        password : password
      },
      success: function(data) {
        var object = JSON.parse(data);
        if (object.status == 0 && object.userName) {
          $('#userErr').text(object.userName);
        }
        else if (object.status == 0 && object.password) {
          $('#passwordErr').text(object.password);
        }
        else if (object.role == "reader") {
          window.location.href = "reader_page.php";
        }
        else {
          window.location.href = "admin_page.php";
        }
      }
    });
  });
});
