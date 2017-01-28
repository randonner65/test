<?$number = str_replace(" ", "+", $_GET['number']);
header("HTTP/1.1 301 Moved Permanently");
header("Location: /scheme/".$number);
exit();
?>
