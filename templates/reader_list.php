<h4 class="fullname">Full name : <?php echo $fullName; ?></h4>
<table id="book-names">
  <tr>
    <th>Bucket list</th>
  </tr>
  <?php
    if ($bookList !== NULL) {
      $row = $bookList->fetch_all(MYSQLI_ASSOC);
      foreach ($row as $value) {
  ?>
    <tr>
      <td><?php echo $value["book_name"];?></td>
      <td><?php echo $value["author"];?></td>
    </tr>
  <?php
      }
      $bookList->free_result();
    }
  ?>
</table>
<a href="/home">Home</a>
