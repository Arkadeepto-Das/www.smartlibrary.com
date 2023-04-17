<?php
  while ($row = $listData["readingList"]->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $row["Reading"];?></td>
    <td><?php echo $row["Bucket_list"];?></td>
  </tr>
<?php
  }
  $listData["readingList"]->free_result();
