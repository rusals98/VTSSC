<?php
  $file = 'Chapter 22 - Datagram Forwarding.pdf';
  $filename = 'Chapter 22 - Datagram Forwarding.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Content-Length: ' . filesize($file));
  header('Accept-Ranges: bytes');
  @readfile($file);
?>
