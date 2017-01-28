<?php
require_once "class_users.php";//подключение класса Users
require_once "../static_pages/class_static_pages.php";//подключение класса Статические страницы
$user = new  ClassUsers();//создание объекта класса ClassUsers
$staticpage = new  ClassStaticPages();//создание объекта класса ClassStaticPages
if(!$user->checkAdminCurrentUser())//проверка на админность текущего пользователя
header( 'Location: ../../index.php', true, 303 );//на главную страницу 
else
setcookie("mode_editor_static_page", "word");//режим редактора - "word"  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Харьковреле - Редактирование статических страниц сайта</title>
<meta http-equiv="Content-type" content="text/html; charset=utf8"/>
<meta name="Author" content="Дмитрий Коржов" />
<link href="/images/icon1.ico" rel="shortcut icon" type="image/x-icon" />
<link  rel="stylesheet" type="text/css" href="/styles/styles.css" />
<style>table {text-align: center;}</style>
</head>
  
<body>
  <?php require_once "../../blocks/header.html";?>
 <div id = "content" >
  <?php require_once "../../blocks/left_panel.html";?>
   <div id = "main_content">
   	<p style = 'text-align: center; '>Вы вошли в закрытый раздел сайта как 
	<b style = 'color:red;'><?php echo $user->read("status");?></b>
	<b style = 'font-size: 130%;'><?php echo $user->read("login");?></b></p>
	<h1>Редактирование статических страниц сайта</h1>
	<h2>Выберите страницу для редактирования</h2>
<?php
$AllStaticPages = array();// массив всех заказанных переключателей из текущего заказа
$AllStaticPages = $staticpage->readAll();
//print_r ($AllStaticPages);
for($i=0; $i < count($AllStaticPages); $i++){	
echo "<a href = 'edit_static_page.php?namepage=".$AllStaticPages[$i]['name']."'><p style = 'color: green; font-size: 150%;'> ".$AllStaticPages[$i]['title']." </p></a>";	
}	
?>
</br><center>
<form name = 'form_admin_panel1' action = 'admin_panel1.php'  method = 'get'>
<input type = 'submit'   value = 'Веруться в Панель администратора'/>
</center>
	
</body>
</html>