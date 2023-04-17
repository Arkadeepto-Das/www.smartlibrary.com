<tr>
  <th>Book name</th>
  <th>Author</th>
</tr>
<?php
  while ($row = $bookList->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $row["Book_name"];?></td>
    <td><?php echo $row["Author"];?></td>
<?php
    if ($row["Added"] == "TRUE") {
?>
    <td>Added</td>
  </tr>
<?php
    }
    else {
?>
    <td><button add="<?php echo $row["Book_ID"];?>">Add</button></td>
    <td><button remove="<?php echo $row["Book_ID"];?>">Remove</button></td>
  </tr>
<?php
    }
  }
  $bookList->free_result();
  