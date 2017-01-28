<?php
require_once "../order_switcher/class_schemas.php";//подключение класса ClassSchemas
$scheme = new  ClassSchemas();//создание объекта класса ClassSchemas
//print_r($_GET);
	if($_GET[pw] != "12345") exit("Хакерская атака");
else if($_GET[action] == "add")
$scheme->add($_GET[name],$_GET[qpos],$_GET[qcont],$_GET[closdiag],$_GET[att],$_GET[pmark],$_GET[mark],$_GET[qjump],$_GET[jump]);
else if($_GET[action] == "edit")
$scheme->update($_GET[name],$_GET[qpos],$_GET[qcont],$_GET[closdiag],$_GET[att],$_GET[pmark],$_GET[mark],$_GET[qjump],$_GET[jump]);
else if($_GET[action] == "delete")
$scheme->delete($_GET[name]);
else if($_GET[action] == "rename")
$scheme->rename($_GET[oldname], $_GET[newname]);
else exit("Хакерская атака");
?>