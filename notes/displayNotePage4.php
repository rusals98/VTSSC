<?php
  $file = 'Chapter 7 - Memory.pdf';
  $filename = 'Chapter 7 - Memory.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Content-Length: ' . filesize($file));
  header('Accept-Ranges: bytes');
  @readfile($file);
?>
