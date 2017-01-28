<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$scheme = new  Schemas("2304");//создание объекта класса Schemas
print_r($scheme);
print_r("kjkjikjk");
?>