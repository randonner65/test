<?php
require_once "class_users.php";//подключение класса Users
require_once "../static_pages/class_static_pages.php";//подключение класса Статические страницы
$user = new  ClassUsers();//создание объекта класса ClassUsers
$staticpage = new  ClassStaticPages();//создание объекта класса ClassStaticPages
if(!$user->checkAdminCurrentUser())//проверка на админность текущего пользователя
header( 'Location: ../../index.php', true, 303 );//на главную страницу 
else
$staticpage->namepage = $_GET['namepage'];
$staticpage->write("title", $_POST['title']);
$staticpage->write("keywords", $_POST['keywords']);
$staticpage->write("description", $_POST['description']);
$staticpage->write("text", $_POST['text']);
header( 'Location: edit_static_page.php?namepage='.$_GET['namepage'], true, 303 );//на страницу редактирования страницы
?>