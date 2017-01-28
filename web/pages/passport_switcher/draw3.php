<?php
	function __autoload($class_name) {require_once "../../draw/".$class_name.".php"; }//автоподключение нужного класса
$Lib = new Lib();
$Switch = new Draw($Prop= array("w"=>1500,"h"=>1100,"scale"=>5,"width"=>3,"rBG"=>240,"gBG"=>240,"bBG"=>240,"rr"=>255,"gr"=>0,"br"=>0,"x0"=>0,"y0"=>0));

$Frontal = new Group($Prop= array("x0"=>10,"y0"=>100,"scale"=>5,"width"=>2,"g"=>255,"rr"=>0), $Switch, $Switch);//фронтальная проекция
/*
$Step_sealF1 = $Lib->step_sealF($Switch, $Frontal);
$Step_sealF1->move(20,30);
$Step_sealF1->rotate(20,30,-180);
$Switch->add($Step_sealF1);

$Step_sealL1 = $Lib->step_sealL($Switch, $Frontal);
$Step_sealL1->move(140,30);
//$Step_sealL1->rotate(20,30,-180);
$Switch->add($Step_sealL1);
$Switch->out();

$Step_sealL1 = $Lib->step_sealL($Switch, $Frontal);
*/
//$Switch->add($Lib->boxEC400C4F($Switch, $Frontal));
//$Switch->add(boxEC400C4F($Switch, $Frontal));


$step_sealF = new Group($Prop1= array("x0"=>0,"y0"=>0,"scale"=>5,"width"=>2,"g"=>255), $Image, $Group);

$step1 = new RectArc($Prop= array("x1"=>-7,"y1"=>-10,"x2"=>7,"y2"=>-8,"rad"=>0.5), $Image, $Group); $step_sealF->add($step1);
$step2 = new RectArc($Prop= array("x1"=>-9,"y1"=>-8,"x2"=>9,"y2"=>-6,"rad"=>0.5), $Image, $Group); $step_sealF->add($step2);
$step3 = new RectArc($Prop= array("x1"=>-12,"y1"=>-6,"x2"=>12,"y2"=>-4,"rad"=>0.5), $Image, $Group); $step_sealF->add($step3);
$step4 = new RectArc($Prop= array("x1"=>-14,"y1"=>-4,"x2"=>14,"y2"=>-2,"rad"=>0.5), $Image, $Group); $step_sealF->add($step4);
$step5 = new RectArc($Prop= array("x1"=>-17.5,"y1"=>-2,"x2"=>17.5,"y2"=>0,"rad"=>0.5), $Image, $Group); $step_sealF->add($step5);
$line1 = new Line($Prop= array("type"=>"axis","x1"=>0,"y1"=>-12,"x2"=>0,"y2"=>4, "r"=>255,"g"=>0,"b"=>0, "width"=>1), $Image, $Group); $step_sealF->add($line1);

//СТУПЕНЧАТЫЙ УПЛОТНИТЕЛЬ левая проекция

$step_sealL = new Group($Prop= array("x0"=>0,"y0"=>0,"scale"=>5,"width"=>2,"b"=>255), $Image, $Group);//левая проекция

$arc1 = new Arc($Prop= array("x"=>0,"y"=>0, "width"=>2, "d"=>14), $Image, $Group); $step_sealL->add($arc1);
$arc2 = new Arc($Prop= array("x"=>0,"y"=>0, "width"=>2, "d"=>18), $Image, $Group); $step_sealL->add($arc2);
$arc3 = new Arc($Prop= array("x"=>0,"y"=>0, "width"=>2, "d"=>24), $Image, $Group); $step_sealL->add($arc3);
$arc4 = new Arc($Prop= array("x"=>0,"y"=>0, "width"=>2, "d"=>28), $Image, $Group); $step_sealL->add($arc4);
$arc5 = new Arc($Prop= array("x"=>0,"y"=>0, "width"=>2, "d"=>37), $Image, $Group); $step_sealL->add($arc5);
$line2 = new Line($Prop= array("type"=>"axis","x1"=>0,"y1"=>-21,"x2"=>0,"y2"=>21, "r"=>255,"g"=>0,"b"=>0, "width"=>1), $Image, $Group); $step_sealL->add($line2);
$line3 = new Line($Prop= array("type"=>"axis","x1"=>-21,"y1"=>0,"x2"=>21,"y2"=>0, "r"=>255,"g"=>0,"b"=>0, "width"=>1), $Image, $Group); $step_sealL->add($line3);

//EC 400C4	фронтальная проекция

$BoxEC400C4F = new Group($Prop= array("x0"=>70,"y0"=>300,"scale"=>5,"width"=>2,"r"=>255), $Image, $Group);//фронтальная проекция

$Line1 = new Line($Prop= array("type"=>"solid","x1"=>0,"y1"=>-50,"x2"=>0,"y2"=>50), $Image, $Group); 
$Line2 = new Line($Prop= array("type"=>"solid","x1"=>0,"y1"=>-50,"x2"=>7,"y2"=>-50), $Image, $Group); 
$Line3 = new Line($Prop= array("type"=>"solid","x1"=>0,"y1"=>50,"x2"=>7,"y2"=>50), $Image, $Group);
$Arc1 = $Line1->rounding($Line1, $Line2, 2, $Image, $Group); $BoxEC400C4F->add($Arc1); $BoxEC400C4F->add($Line1);
$Arc2 = $Line1->rounding($Line1, $Line3, 2, $Image, $Group); $BoxEC400C4F->add($Arc2); $BoxEC400C4F->add($Line2); $BoxEC400C4F->add($Line3);
$Line1 = new Line($Prop= array("type"=>"solid","x1"=>7,"y1"=>-53,"x2"=>7,"y2"=>53), $Image, $Group); 
$Line2 = new Line($Prop= array("type"=>"solid","x1"=>7,"y1"=>-53,"x2"=>14,"y2"=>-53), $Image, $Group); 
$Line3 = new Line($Prop= array("type"=>"solid","x1"=>7,"y1"=>53,"x2"=>14,"y2"=>53), $Image, $Group);
$Arc1 = $Line1->rounding($Line1, $Line2, 2, $Image, $Group); $BoxEC400C4F->add($Arc1); $BoxEC400C4F->add($Line1);
$Arc2 = $Line1->rounding($Line1, $Line3, 2, $Image, $Group); $BoxEC400C4F->add($Arc2); $BoxEC400C4F->add($Line2); $BoxEC400C4F->add($Line3);
$Line1 = new Line($Prop= array("type"=>"solid","x1"=>14,"y1"=>-53,"x2"=>14,"y2"=>53), $Image, $Group); $BoxEC400C4F->add($Line1);
$Line1 = new Line($Prop= array("type"=>"solid","x1"=>55,"y1"=>-52,"x2"=>55,"y2"=>52), $Image, $Group); 
$Line2 = new Line($Prop= array("type"=>"solid","x1"=>14,"y1"=>-52,"x2"=>55,"y2"=>-52), $Image, $Group); 
$Line3 = new Line($Prop= array("type"=>"solid","x1"=>14,"y1"=>52,"x2"=>55,"y2"=>52), $Image, $Group);
$Arc1 = $Line1->rounding($Line1, $Line2, 2, $Image, $Group); $BoxEC400C4F->add($Arc1); $BoxEC400C4F->add($Line1);
$Arc2 = $Line1->rounding($Line1, $Line3, 2, $Image, $Group); $BoxEC400C4F->add($Arc2); $BoxEC400C4F->add($Line2); $BoxEC400C4F->add($Line3);

//$Step_sealF1 = step_sealF($Image, $Group);
//$Step_sealF2 = $BoxEC400C4F->copyOffset($Step_sealF, 34, -52); $BoxEC400C4F->add($Step_sealF2);
//$Step_sealF->move(34, 52);
//$Step_sealF->mirrorX(52); $BoxEC400C4F->add($Step_sealF);

//$Step_sealL1 = step_sealL($Image, $Group);
//$Step_sealL2 = copyOffset($Step_sealL1, 34, -20); $BoxEC400C4F->add($Step_sealL2);
//$Step_sealL1->move(34, 20); $BoxEC400C4F->add($Step_sealL1);


$Switch->add($step_sealF);
$Switch->out();
 Header("Content-type: image/jpeg");
imageJpeg($Switch->i);
imageDestroy($Switch->i);//удаление холста

 ?>