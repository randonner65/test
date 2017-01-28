<?php
require_once "class_users.php";//подключение класса Users
$user = new  ClassUsers();//создание объекта класса ClassUsers
if(!$user->checkAdminCurrentUser())//проверка на админность текущего пользователя
header( 'Location: ../../index.php', true, 303 );//на главную страницу 
else
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Харьковреле - Панель пользователей</title>
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
	<b style = 'font-size: 130%;'><?php echo $user->read("login");?></b></p></br>
	<h1>Панель пользователей</h1>
	
<center>
 <h3>Список пользователей</h3>

<table border="0" width = "auto" cellpadding="4" cellspacing="5" style = 'text-align: left;' >
	<tr>
		<th>Логин</th><th>Статус</th><th>Удалить</th>
	</tr>
<?php


$AllUsers = array();
$AllUsers = $user->readAllUsers();//получить всех пользователей из БД в массив
//print_r($AllUsers);
  
for($i=0; $i < count($AllUsers); $i++){ 	

	echo("
	<tr>
		<td>".$AllUsers[$i]["login"]."</td>
		<td>".$AllUsers[$i]["status"]."</td>");
	if($AllUsers[$i]["status"] != "superadmin")	
	echo("<td><a href='del_user.php?id=".$AllUsers[$i]["id"]."' style = 'color: red;'>Удалить</a></td>");
	echo("</tr>");
	}
?>
	</table>
	<h3>Добавить нового пользователя</h3>
<p style = 'text-align: center; color:red; '><?php echo $_GET["message"];?></p>	
<form name = 'form_add_user' action = 'add_user.php'  method = 'get'>
<table border="0" width = "auto" cellpadding="4" cellspacing="10" style = 'text-align: right;' >
	<tr>
		<td>Логин:</td>
		<td><input type = "text" name = "login"  size = "20" ></td>
	</tr>
	
		<td>Пароль:</td>
		<td><input type = "password" name = "password" size = "20"></td>
	</tr>
	<tr>
		<td>Статус:</td>
		<td><select name = "status" >
  <option value = "admin">admin</option>
  <option value = "user" >user</option>
  <option value = "superadmin">superadmin</option>
</select>
		</td>
	
	</tr>
</table>
<input type = 'submit'  value = 'Добавить нового пользователя'/>
</form>	
</br></br>	
	
<form name = 'form_admin_panel1' action = 'admin_panel1.php'  method = 'get'>
<input type = 'submit'   value = 'Веруться в Панель администратора'/>

</body>
</html>