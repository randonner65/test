<?php
require_once "class_users.php";//����������� ������ Users
require_once "../static_pages/class_static_pages.php";//����������� ������ ����������� ��������
$user = new  ClassUsers();//�������� ������� ������ ClassUsers
$staticpage = new  ClassStaticPages();//�������� ������� ������ ClassStaticPages
if(!$user->checkAdminCurrentUser())//�������� �� ���������� �������� ������������
header( 'Location: ../../index.php', true, 303 );//�� ������� �������� 
else
$staticpage->namepage = $_GET['namepage'];
$staticpage->write("title", $_POST['title']);
$staticpage->write("keywords", $_POST['keywords']);
$staticpage->write("description", $_POST['description']);
$staticpage->write("text", $_POST['text']);
header( 'Location: edit_static_page.php?namepage='.$_GET['namepage'], true, 303 );//�� �������� �������������� ��������
?>