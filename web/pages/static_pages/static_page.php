<?php 
header("HTTP/1.1 301 Moved Permanently");
header("Location: /".$_GET["namepage"]);
exit();
require_once "pages/static_pages/class_static_pages.php";//подключение класса Статические страницы
$staticpage = new  ClassStaticPages();//создание объекта класса ClassStaticPages
$staticpage->namepage = $url[0];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?php echo $staticpage->read("title");?></title>
<meta http-equiv="Content-type" content="text/html; charset=utf8"/>
<meta name="Keywords" content="<?php echo $staticpage->read("keywords");?>" />
<meta name="Description" content="<?php echo $staticpage->read("description");?>" />
<meta name="Author" content="Дмитрий Коржов" />
<link href="/images/icon1.ico" rel="shortcut icon" type="image/x-icon" />
<link  rel="stylesheet" type="text/css" href="/styles/styles.css" />
</head>
  
<body>
  <?php require_once "blocks/header.html";?>
 <div id = "content" >
  <?php require_once "blocks/left_panel.html";?>
   <div id = "main_content">
	<?php 	echo $staticpage->read("text");?>
 </div>
 </div>
 <div class="clear"></div>
 
<?php require_once "blocks/footer.html";?>
 
</body>
</html>