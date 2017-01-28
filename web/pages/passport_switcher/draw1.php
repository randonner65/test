<?php
	function __autoload($class_name) {require_once "../../draw/".$class_name.".php"; }//автоподключение нужного класса

$switch = new Draw($Prop= array("w"=>1500,"h"=>1000,"scale"=>15,"rBG"=>240,"gBG"=>240,"bBG"=>240,"X0"=>180,"Y0"=>80));
$handle = new Group(0,50);
//$switch->addGroup($handle);
$line1 = new Line($Prop= array("x1"=>0,"y1"=>0,"x2"=>30,"y2"=>30, "width"=>3, "r"=>0,"g"=>255,"b"=>0,"scale"=>5), $switch, $handle);
$handle->add($line1);
$switch->add($handle);
//$line1->out();
$switch->out();

 Header("Content-type: image/jpeg");
imageJpeg($switch->i);
 ?>