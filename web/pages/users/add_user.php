<?php
require_once "class_users.php";//подключение класса Users
$user = new  ClassUsers();//создание объекта класса ClassUsers
$login = trim(strip_tags(mysql_real_escape_string($_GET['login'])));
$password = trim(strip_tags(mysql_real_escape_string($_GET['password'])));
$status = $_GET['status'];
if($login == "" || $password =="") header( 'Location: panel_users.php?message=Вы не ввели логин и/или пароль', true, 303 );//на панель пользователей
else
 if($user->checkLoginUser($login)) header( 'Location: panel_users.php?message=Пользователь с таким логином уже существует', true, 303 );//на панель пользователей
else{
$user->addUser($login, $password, $status);
header( 'Location: panel_users.php?message=', true, 303 );//на панель пользователей
}
 ?>
