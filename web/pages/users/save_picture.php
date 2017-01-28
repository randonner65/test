<?php
require_once "class_users.php";//подключение класса Users
require_once "../static_pages/class_static_pages.php";//подключение класса Статические страницы
$user = new  ClassUsers();//создание объекта класса ClassUsers
$staticpage = new  ClassStaticPages();//создание объекта класса ClassStaticPages
if(!$user->checkAdminCurrentUser())//проверка на админность текущего пользователя
header( 'Location: ../../index.php', true, 303 );//на главную страницу 
else


if (move_uploaded_file($_FILES['userfile']['tmp_name'], basename($_FILES['userfile']['name']))) {
    //echo "Файл корректен и был успешно загружен.\n";
rename($_FILES['userfile']['name'], "../static_pages/".$_GET['namepage']."/".$_FILES['userfile']['name']);
header( 'Location: edit_static_page.php?namepage='.$_GET['namepage'], true, 303 );//на страницу редактирования страницы	
} 
else {
   echo "Ошибка загрузки файла.";
}

 
?>