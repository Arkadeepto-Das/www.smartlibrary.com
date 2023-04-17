<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@400;500&family=Poppins:wght@100;200;300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style_index.css">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <form>
      <label for="username">Username: </label>
      <input type="text" name="username" id="username" required>
      <br>
      <span class="error" id="userErr"></span>
      <br><br>
      <label for="password">Password: </label>
      <input type="password" name="password" id="password" required>
      <br>
      <span class="error" id="passwordErr"></span>
      <br><br>
      <input type="button" name="login" id="login" value="Login">
    </form>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="Scripts/ajax_user.js"></script>
</html>
