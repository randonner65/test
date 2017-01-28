<?php
require_once "class_users.php";//подключение класса Users
$user = new  ClassUsers();//создание объекта класса ClassUsers
if(!$user->checkAdminInputUser())//проверка на админность вошедшего пользователя
header( 'Location: ../../index.php', true, 303 );//на главную страницу 
else
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<script type='text/javascript'>
 document.location = "admin_panel1.php";//на панель администратора
</script>
</body>
</html>