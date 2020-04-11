<?php
  $file = 'Blessed Daniel Caeser Chords.pdf';
  $filename = 'Blessed Daniel Caeser Chords.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Content-Length: ' . filesize($file));
  header('Accept-Ranges: bytes');
  @readfile($file);
?>
