<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//��������������� ������� ������
$scheme = new  Schemas("2304");//�������� ������� ������ Schemas
print_r($scheme);
print_r("kjkjikjk");
?>