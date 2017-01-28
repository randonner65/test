<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$order = new Orders();//создание объекта класса Orders
$orderswitcher = new OrderSwitchers();//создание объекта класса OrderSwitchers
require_once "../users/class_users.php";//подключение класса Users
$user = new  ClassUsers();//создание объекта класса ClassUsers
if(!$user->checkAdminCurrentUser())//проверка на админность текущего пользователя
header( 'Location: ../../index.php', true, 303 );//на главную страницу
else
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Харьковреле - Панель заказов</title>
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
	<h1>Панель заказов</h1>

	<form name = 'form_admin_panel1' action = '../users/admin_panel1.php'  method = 'get'>

<center>
<form name = 'form_admin_panel1' action = '../users/admin_panel1.php'  method = 'get'>
<input type = 'submit'   value = 'Веруться в Панель администратора'/></br>
<table border="0" width = "auto" cellpadding="4" cellspacing="5" style = 'text-align: right;' ></br>
	<tr>
		<th colspan = '2'><center>Номер</center></th><th><center>Дата</center></th><th><center>Заказчик</center></th><th>Просмотреть</th>
	</tr>
<?php


$Orders = array();
$Orders = $order->readAll();//получить все заказы из БД в массив
//print_r($Orders);
  	
//for($i=0; $i < count($Orders); $i++){ 	
for($i = count($Orders) - 1; $i >= 0; $i--){ 	

	echo("
	<tr>
		<td style = 'color: red;'>".$Orders[$i]["new"]."</td>
		<td>".$Orders[$i]["id"]."</td>
		<td>".$Orders[$i]["date"]."</td>
		<td>".$Orders[$i]["nameorg"]."</td>
		<td><a href='view_order.php?idorder=".$Orders[$i]["id"]."' style = 'color: green;'>Просмотреть</a></td>
	</tr>");
	}
?>
	</table></br>
	
<form name = 'form_admin_panel11' action = '../users/admin_panel1.php'  method = 'get'>
<input type = 'submit'   value = 'Веруться в Панель администратора'/>
</center>
</body>
</html>