<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@400;500&family=Poppins:wght@100;200;300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="public/assets/css/style_index.css">
  <title>Admin</title>
</head>
<body>
  <div class="container">
    <h1>Add Book</h1>
    <form>
      <label for="bookId">Book-ID :</label>
      <input type="text" name="bookId" id="bookId" required>
      <label for="bookName">Book-title :</label>
      <input type="text" name="bookName" id="bookName" required>
      <label for="author">Author :</label>
      <input type="text" name="author" id="author" required>
      <label for="date">Publication date :</label>
      <input type="text" name="date" id="date" required>
      <span class="error" id="message"></span>
      <br><br>
      <input type="button" name="add" id="add" value="Add book">
    </form>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="public/assets/scripts/ajax_admin.js"></script>
</html>