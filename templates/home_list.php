<tr>
  <th>Book name</th>
  <th>Author</th>
</tr>
<?php
  $row = $bookList->fetch_all(MYSQLI_ASSOC);
  foreach ($row as $value) {
?>
  <tr>
    <td><?php echo $value["book_name"];?></td>
    <td><?php echo $value["author"];?></td>
<?php
    if ($value["added"] == "TRUE") {
?>
    <td>Added</td>
  </tr>
<?php
    }
    else {
?>
    <td id="<?php echo $value["book_id"];?>">
      <button class="add" id="<?php echo $value["book_id"];?>">Add</button>
      <p id="<?php echo $value["book_id"];?>"></p>
    </td>
  </tr>
<?php
    }
  }
  $bookList->free_result();
  