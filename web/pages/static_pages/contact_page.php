<?php
header("HTTP/1.1 301 Moved Permanently");
header("Location: /contact_page.php");
exit();
require_once "class_static_pages.php";//подключение класса Статические страницы
$staticpage = new  ClassStaticPages();//создание объекта класса ClassStaticPages

$staticpage->namepage = "contacts";
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
  <?php require_once "../../blocks/header.html";?>
 <div id = "content" >
  <?php require_once "../../blocks/left_panel.html";?>
   <div id = "main_content">
	<?php 	echo $staticpage->read("text");?>
	</br>
 <script type="text/javascript" charset="utf-8" src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=JDLBh8-thuIXro5nC2UVY1zJT1Tr060X&width=600&height=450"></script>  
	
 </div>
 </div>
 <div class="clear"></div>
 
<?php require_once "../../blocks/footer.html";?>
 
</body>
</html>