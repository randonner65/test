<?php
require_once "class_users.php";//подключение класса Users
$user = new  ClassUsers();//создание объекта класса ClassUsers
if(!$user->checkAdminCurrentUser())//проверка на админность текущего пользователя
header( 'Location: ../../index.php', true, 303 );//на главную страницу 
else
$iduser = $user->read("id");//id пользователя
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Редактирование личных данных</title>
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
	<h1>Редактирование личных данных</h1>

<center>	
	<h3>Введите новые логин и/или пароль</h3>
	
<p style = 'text-align: center; color:red; '><?php echo $_GET["message"];?></p>	
<form name = 'form_save_changes' action = 'save_changes.php'  method = 'get'>
<table border="0" width = "auto" cellpadding="4" cellspacing="10" style = 'text-align: right;' >
	<tr>
		<td>Логин:</td>
		<td><input type = "text" name = "login"  size = "20" ></td>
	</tr>
	
		<td>Пароль:</td>
		<td><input type = "password" name = "password" size = "20"></td>
	</tr>

</table>
<input type = "hidden" name = "iduser" value = '<?php echo $iduser;?>' >
<input type = 'submit'  value = 'Сохранить изменения'/>
</form>	
</br></br>	
	
<form name = 'form_admin_panel1' action = 'admin_panel1.php'  method = 'get'>
<input type = 'submit'   value = 'Веруться в Панель администратора'/>
</center>
</body>
</html>