<tr>
  <th>Bucket list</th>
</tr>
<?php
  while ($row = $listData["bucketList"]->fetch_assoc()) {
?>
  <tr>
    <td><?php echo $row["book_name"];?></td>
  </tr>
<?php
  }
  $listData["bucketList"]->free_result();
