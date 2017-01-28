<?php
require_once "class_users.php";//подключение класса Users
$user = new  ClassUsers();//создание объекта класса ClassUsers

$iduser = $_GET['id'];

$user->delete($iduser);//удаление пользователя
header( 'Location: panel_users.php?message=', true, 303 );//на панель пользователей

 ?>
