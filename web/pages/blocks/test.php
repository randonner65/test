<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$propswitch = new PropertiesSwitcher();
$nameswitch = "s25j2401c8";
$a = array();
$a = $propswitch->getPropSwitch($nameswitch);//
echo"<pre>";
print_r($a);
echo"</pre>";
	if($a[syntaxerror]!="")
	echo "В наименовании перключателя ".mb_strtoupper($nameswitch, "UTF-8")." ".$a["syntaxerror"];
	if($a[logicerror]!="")
	echo "Переключатель ".mb_strtoupper($a["nameswitchstyle"], "UTF-8")." ".$a["logicerror"];
	echo"</br>";
print_r($propswitch);
?>