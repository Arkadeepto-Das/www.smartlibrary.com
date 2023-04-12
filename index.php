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
    <form action="login.php">
      <label for="username">Username: </label>
      <input type="text" name="username" id="username" required>
      <br><br>
      <label for="password">Password: </label>
      <input type="text" name="password" id="password" required>
      <br><br>
      <input type="submit" name="login" id="submit">
    </form>
  </div>
</body>
</html>
