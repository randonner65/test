<?php
require_once "class_users.php";//подключение класса Users
$user = new  ClassUsers();//создание объекта класса ClassUsers
$login = trim(strip_tags(mysql_real_escape_string($_GET['login'])));
$password = trim(strip_tags(mysql_real_escape_string($_GET['password'])));
$iduser = $_GET['iduser'];
if($login == "" || $password =="") 
header( 'Location: edit_personal_data.php?message=Вы не ввели логин и/или пароль', true, 303 );//на панель редактирования личных данных пользователей
else if($user->checkLoginUser($login) && $user->read("login") != $login)
header( 'Location: edit_personal_data.php?message=Пользователь с таким логином уже существует', true, 303 );//на панель редактирования личных данных пользователей
else{
$password = md5($password);
$user->writeId($iduser, "login", $login);//запись нового логина
$user->writeId($iduser, "password", $password);//запись нового пароля
header( 'Location: edit_personal_data.php?message=Изменения сохранены', true, 303 );//на панель редактирования личных данных пользователей
}
 ?>
