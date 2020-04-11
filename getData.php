<?php
  require_once("db.php");

  $sql = "SELECT MONTH(created) AS uploadMonth, COUNT(id) AS noteCount from notes GROUP BY uploadMonth ORDER BY uploadMonth";

  $result = $mydb->query($sql);

  $data = array();
  for($x=0; $x<mysqli_num_rows($result); $x++) {
    $data[] = mysqli_fetch_assoc($result);
  }

  echo json_encode($data);
 ?>
