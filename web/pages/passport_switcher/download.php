<?php
if (isset($_GET['file'])  and file_exists($_GET['file'])) {
  $content = file_get_contents($_GET['file']);
  header('Content-Type: '.$ctype.'; charset=utf-8');
  header("Content-Disposition: attachment; filename=".$_GET['file']);
  ob_end_clean();
  ob_start();
  echo $content;
  ob_end_flush();
  exit();
} else {
  echo "Файл не найден.";
  exit();
}


 ?>
