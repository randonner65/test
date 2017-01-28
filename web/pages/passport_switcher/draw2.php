<?php
	function __autoload($class_name) {require_once "../../draw/".$class_name.".php"; }//автоподключение нужного класса

$switch = new Draw($Prop= array("w"=>1500,"h"=>1100,"scale"=>5,"width"=>3,"rBG"=>240,"gBG"=>240,"bBG"=>240,"r"=>0,"g"=>0,"b"=>0,"X0"=>0,"Y0"=>0));

//СТУПЕНЧАТЫЙ УПЛОТНИТЕЛЬ
$step_sealF = new Group(50,20, $Prop= array("scale"=>5,"width"=>2,"b"=>255));//фронтальная проекция

$step1 = new RectArc($Prop= array("x1"=>-7,"y1"=>-10,"x2"=>7,"y2"=>-8,"rad"=>0.5), $switch, $step_sealF); $step_sealF->add($step1);
$step2 = new RectArc($Prop= array("x1"=>-9,"y1"=>-8,"x2"=>9,"y2"=>-6,"rad"=>0.5), $switch, $step_sealF); $step_sealF->add($step2);
$step3 = new RectArc($Prop= array("x1"=>-12,"y1"=>-6,"x2"=>12,"y2"=>-4,"rad"=>0.5), $switch, $step_sealF); $step_sealF->add($step3);
$step4 = new RectArc($Prop= array("x1"=>-14,"y1"=>-4,"x2"=>14,"y2"=>-2,"rad"=>0.5), $switch, $step_sealF); $step_sealF->add($step4);
$step5 = new RectArc($Prop= array("x1"=>-17.5,"y1"=>-2,"x2"=>17.5,"y2"=>0,"rad"=>0.5), $switch, $step_sealF); $step_sealF->add($step5);
$line1 = new Line($Prop= array("type"=>"axis","x1"=>0,"y1"=>-12,"x2"=>0,"y2"=>4, "r"=>255,"g"=>0,"b"=>0, "width"=>1), $switch, $step_sealF); $step_sealF->add($line1);

$step_sealL = new Group(50,80, $Prop= array("scale"=>5,"width"=>2,"b"=>255));//левая проекция
$arc1 = new Arc($Prop= array("x"=>0,"y"=>0, "width"=>2, "d"=>14), $switch, $step_sealL); $step_sealL->add($arc1);
$arc2 = new Arc($Prop= array("x"=>0,"y"=>0, "width"=>2, "d"=>18), $switch, $step_sealL); $step_sealL->add($arc2);
$arc3 = new Arc($Prop= array("x"=>0,"y"=>0, "width"=>2, "d"=>24), $switch, $step_sealL); $step_sealL->add($arc3);
$arc4 = new Arc($Prop= array("x"=>0,"y"=>0, "width"=>2, "d"=>28), $switch, $step_sealL); $step_sealL->add($arc4);
$arc5 = new Arc($Prop= array("x"=>0,"y"=>0, "width"=>2, "d"=>37), $switch, $step_sealL); $step_sealL->add($arc5);
$line2 = new Line($Prop= array("type"=>"axis","x1"=>0,"y1"=>-21,"x2"=>0,"y2"=>21, "r"=>255,"g"=>0,"b"=>0, "width"=>1), $switch, $step_sealL); $step_sealL->add($line2);
$line3 = new Line($Prop= array("type"=>"axis","x1"=>-21,"y1"=>0,"x2"=>21,"y2"=>0, "r"=>255,"g"=>0,"b"=>0, "width"=>1), $switch, $step_sealL); $step_sealL->add($line3);

$step_sealF1 = $switch->copyOffset($step_sealF, 50, 50);


$switch->add($step_sealL);
$switch->add($step_sealF);
$switch->add($step_sealF1);
$switch->out();

 Header("Content-type: image/jpeg");
imageJpeg($switch->i);
//imageDestroy($switch->i);//удаление холста

 ?>