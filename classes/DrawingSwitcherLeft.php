<?php
//КЛАСС ЧЕРТЕЖА ЛЕВОЙ ПРОЕКЦИИ ДЕТАЛЕЙ ПЕРЕКЛЮЧАТЕЛЯ
//require_once $_SERVER['DOCUMENT_ROOT']."/config.php";

class DrawingSwitcherLeft extends ToolsDrawingSwitcher{
/*
public static $X0;//горизонтальная координата нулевой точки
public static $Y1;//вертикальная координата нулевой точки
public static $X;//горизонтальная координата базовой точки
public static $Y;//вертикальная координата базовой точки
public static $XMP;//горизонтальная координата  монтажной панели
*/
//Метод вычерчивания галеты
public function desc($PS, $PRPARGR){

$Desc = new Group(array(), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Desc->PRGR);
	if($PS["current"] < 30){
//на 25А и меньше
$Desc->add(new RectFilled(array("x1"=>-21.5,"y1"=>-17,"x2"=>21.5,"y2"=>17,"color"=>"white"), $Desc->PRGR));	
$Desc->add(new RectArc(array("x1"=>-21.5,"y1"=>-17,"x2"=>21.5,"y2"=>17,"rad"=>1.5), $Desc->PRGR));	
$Desc->add(new ArcFilled(array("x"=>0,"y"=>13,"d"=>70,"angle1"=>-108,"angle2"=>-71,"color"=>"white"), $Desc->PRGR));	
$Desc->add(new ArcFilled(array("x"=>0,"y"=>-13,"d"=>70,"angle1"=>71,"angle2"=>108,"color"=>"white"), $Desc->PRGR));	
$Desc->add(new RectFilled(array("x1"=>-11,"y1"=>-20,"x2"=>11,"y2"=>20,"color"=>"white"), $Desc->PRGR));	
$Desc->add(new Line(array("x1"=>11,"y1"=>17,"x2"=>11,"y2"=>20), $Desc->PRGR));	
$Desc->add(new Line(array("x1"=>-11,"y1"=>17,"x2"=>-11,"y2"=>20), $Desc->PRGR));
$Desc->add(new Line(array("x1"=>11,"y1"=>-17,"x2"=>11,"y2"=>-20), $Desc->PRGR));
$Desc->add(new Line(array("x1"=>-11,"y1"=>-17,"x2"=>-11,"y2"=>-20), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>0,"y"=>13,"d"=>70,"angle1"=>-108,"angle2"=>-71), $Desc->PRGR));	
$Desc->add(new Arc(array("x"=>0,"y"=>-13,"d"=>70,"angle1"=>71,"angle2"=>108), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>-17.5,"y"=>0,"d"=>7,"angle1"=>-180,"angle2"=>180), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>-17.5,"y"=>0,"d"=>3,"angle1"=>-180,"angle2"=>180), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>17.5,"y"=>0,"d"=>7,"angle1"=>-180,"angle2"=>180), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>17.5,"y"=>0,"d"=>3,"angle1"=>-180,"angle2"=>180), $Desc->PRGR));
if($PS["board"] == 0 && $PS["fix"] == '_' && $PS["handle"] != 'ub' && $PS["handle"] != 'ur' && $PS["ip54"] == 0){ 
	$Sizes->add(new LineSize(array("x1"=>-21.5,"y1"=>Y1_SIZE_TOP,"x2"=>21.5,"y2"=>Y1_SIZE_TOP), $Sizes->PRGR));
	$Sizes->add(new Line(array("x1"=>-21.5,"y1"=>0,"x2"=>-21.5,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
	$Sizes->add(new Line(array("x1"=>21.5,"y1"=>0,"x2"=>21.5,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
		}
	}
	else if($PS["current"] < 80){
//на 32А и 63А
$Desc->add(new RectFilled(array("x1"=>-33,"y1"=>-23,"x2"=>33,"y2"=>23,"color"=>"white"), $Desc->PRGR));	
$Desc->add(new RectArc(array("x1"=>-33,"y1"=>-23,"x2"=>33,"y2"=>23,"rad"=>3), $Desc->PRGR));
$Desc->add(new RectFilled(array("x1"=>-17,"y1"=>-33,"x2"=>17,"y2"=>33,"color"=>"white"), $Desc->PRGR));
$Desc->add(new Line(array("x1"=>-17,"y1"=>-23,"x2"=>-17,"y2"=>-30), $Desc->PRGR));
$Desc->add(new Line(array("x1"=>17,"y1"=>-23,"x2"=>17,"y2"=>-30), $Desc->PRGR));
$Desc->add(new Line(array("x1"=>-17,"y1"=>23,"x2"=>-17,"y2"=>30), $Desc->PRGR));
$Desc->add(new Line(array("x1"=>17,"y1"=>23,"x2"=>17,"y2"=>30), $Desc->PRGR));

$Desc->add(new Arc(array("x"=>0,"y"=>17,"d"=>100,"angle1"=>-110,"angle2"=>-70), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>0,"y"=>-17,"d"=>100,"angle1"=>70,"angle2"=>110), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>-27,"y"=>0,"d"=>9,"angle1"=>-180,"angle2"=>180), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>-27,"y"=>0,"d"=>4,"angle1"=>-180,"angle2"=>180), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>27,"y"=>0,"d"=>9,"angle1"=>-180,"angle2"=>180), $Desc->PRGR));
$Desc->add(new Arc(array("x"=>27,"y"=>0,"d"=>4,"angle1"=>-180,"angle2"=>180), $Desc->PRGR));
if($PS["board"] == 0 && $PS["fix"] != 'O'  && $PS["fix"] != 'B' && $PS["fix"] != 'P' && $PS["handle"] != 'ub' && $PS["handle"] != 'ur' && $PS["ip54"] == 0){ 
	$Sizes->add(new LineSize(array("x1"=>-33,"y1"=>Y1_SIZE_TOP_32,"x2"=>33,"y2"=>Y1_SIZE_TOP_32), $Sizes->PRGR));
	$Sizes->add(new Line(array("x1"=>-33,"y1"=>0,"x2"=>-33,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
	$Sizes->add(new Line(array("x1"=>33,"y1"=>0,"x2"=>33,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
		}
	}
	else {
//на 100А и 160А
$Desc->add(new RectFilled(array("x1"=>-37,"y1"=>-42,"x2"=>37,"y2"=>42,"color"=>"white"), $Desc->PRGR));	
$Desc->add(new RectArc(array("x1"=>-37,"y1"=>-42,"x2"=>37,"y2"=>42,"rad"=>2), $Desc->PRGR));
if($PS["board"] == 0 && $PS["fix"] != 'O'  && $PS["fix"] != 'B' && $PS["fix"] != 'P' && $PS["handle"] != 'ub' && $PS["handle"] != 'ur' && $PS["ip54"] == 0){
	$Sizes->add(new LineSize(array("x1"=>-37,"y1"=>Y1_SIZE_TOP_32,"x2"=>37,"y2"=>Y1_SIZE_TOP_32), $Sizes->PRGR));
	$Sizes->add(new Line(array("x1"=>-37,"y1"=>0,"x2"=>-37,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
	$Sizes->add(new Line(array("x1"=>37,"y1"=>0,"x2"=>37,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
		}
	}
$Desc->add($Sizes);	
return $Desc;	
}
//МЕТОД ВЫЧЕРЧИВАНИЯ АРЕТАЦИОННОЙ КАМЕРЫ
public function camera($PS, $PRPARGR){
$Camera = new Group(array(), $PRPARGR);
	if($PS["current"] < 30){
//на 25А и меньше
$Camera->add(new ArcFilled(array("x"=>0,"y"=>0,"d"=>43,"angle1"=>-180,"angle2"=>180,"color"=>"white"), $Camera->PRGR));
$Camera->add(new Arc(array("x"=>0,"y"=>0,"d"=>43,"angle1"=>-180,"angle2"=>180), $Camera->PRGR));
	}
	else{
//на 32А и больше
$Camera->add(new ArcFilled(array("x"=>0,"y"=>0,"d"=>66,"angle1"=>-180,"angle2"=>180,"color"=>"white"), $Camera->PRGR));
$Camera->add(new Arc(array("x"=>0,"y"=>0,"d"=>66,"angle1"=>-180,"angle2"=>180), $Camera->PRGR));
	}
return $Camera;	
}
//Метод вычерчивания обычной ручки
public function handle($PS, $PRPARGR){
$Handle = new Group(array(), $PRPARGR);
	if($PS["current"] < 30){
//на 25А и меньше
$Handle->add(new ArcFilled(array("x"=>0,"y"=>18,"d"=>10,"angle1"=>180,"angle2"=>-180,"color"=>"white"), $Handle->PRGR));
$Handle->add(new ArcFilled(array("x"=>0,"y"=>0,"d"=>28,"angle1"=>112,"angle2"=>68,"color"=>"white"), $Handle->PRGR));
$Handle->add(new RectArcFilled(array("x1"=>-5,"y1"=>-14,"x2"=>5,"y2"=>23,"rad"=>5,"color"=>"white"), $Handle->PRGR));
$Handle->add(new RectArc(array("x1"=>-5,"y1"=>-14,"x2"=>5,"y2"=>23,"rad"=>5), $Handle->PRGR));
$Handle->add(new Line(array("x1"=>-5,"y1"=>-5,"x2"=>5,"y2"=>-5), $Handle->PRGR));
$Handle->add(new Arc(array("x"=>0,"y"=>6,"d"=>6,"angle1"=>-180,"angle2"=>180), $Handle->PRGR));
$Handle->add(new Arc(array("x"=>0,"y"=>0,"d"=>28,"angle1"=>112,"angle2"=>68), $Handle->PRGR));
$Handle->add(new RectFilled(array("x1"=>-1,"y1"=>-15,"x2"=>1,"y2"=>-10,"color"=>"white"), $Handle->PRGR));
$Handle->add(new Rect(array("x1"=>-1,"y1"=>-15,"x2"=>1,"y2"=>-10), $Handle->PRGR));
$Handle->add(new Line(array("x1"=>-2,"y1"=>6,"x2"=>2,"y2"=>6), $Handle->PRGR));
$Handle->add(new Line(array("x1"=>0,"y1"=>4,"x2"=>0,"y2"=>8), $Handle->PRGR));
	}
	else {
//на 32А и больше
$Handle->add(new ArcFilled(array("x"=>0,"y"=>0,"d"=>44,"angle1"=>-180,"angle2"=>180,"color"=>"white"), $Handle->PRGR));
$Handle->add(new Arc(array("x"=>0,"y"=>0,"d"=>44,"angle1"=>108,"angle2"=>72), $Handle->PRGR));
$Handle->add(new RectArcFilled(array("x1"=>-6.5,"y1"=>-22,"x2"=>6.5,"y2"=>45,"rad"=>6.5,"color"=>"white"), $Handle->PRGR));
$Handle->add(new RectArc(array("x1"=>-6.5,"y1"=>-22,"x2"=>6.5,"y2"=>45,"rad"=>6.5), $Handle->PRGR));
$Handle->add(new RectFilled(array("x1"=>-1,"y1"=>-24,"x2"=>1,"y2"=>-14,"color"=>"white"), $Handle->PRGR));
$Handle->add(new Rect(array("x1"=>-1,"y1"=>-24,"x2"=>1,"y2"=>-14), $Handle->PRGR));
$Handle->add(new Line(array("x1"=>-6.5,"y1"=>-7,"x2"=>6.5,"y2"=>-7), $Handle->PRGR));
$Handle->add(new Arc(array("x"=>0,"y"=>8,"d"=>6,"angle1"=>180,"angle2"=>-180), $Handle->PRGR));
$Handle->add(new Line(array("x1"=>-2,"y1"=>8,"x2"=>2,"y2"=>8), $Handle->PRGR));
$Handle->add(new Line(array("x1"=>0,"y1"=>6,"x2"=>0,"y2"=>10), $Handle->PRGR));
	}
return $Handle;		
}
//МЕТОД ВЫЧЕРЧИВАНИЯ КРЕПЛЕНИЯ НА DIN-РЕЙКУ
public function din($PS, $PRPARGR){
$Din = new Group(array(), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Din->PRGR);
	if($PS["current"] < 30){
$Din->add(new Rect(array("x1"=>-24,"y1"=>-20.5,"x2"=>24,"y2"=>20.5), $Din->PRGR));	
$Din->add(new Rect(array("x1"=>-8,"y1"=>20.5,"x2"=>18,"y2"=>29), $Din->PRGR));
$Din->add(new Arc(array("x"=>-12.5,"y"=>-25,"d"=>4,"angle1"=>180,"angle2"=>-180), $Din->PRGR));
$Din->add(new Arc(array("x"=>-12.5,"y"=>-25,"d"=>10,"angle1"=>200,"angle2"=>-20), $Din->PRGR));
$Din->add(new Arc(array("x"=>12.5,"y"=>25,"d"=>4,"angle1"=>180,"angle2"=>-180), $Din->PRGR));
$Din->add(new Line(array("x1"=>-20.5,"y1"=>-20.5,"x2"=>-17,"y2"=>-27), $Din->PRGR));
$Din->add(new Line(array("x1"=>-4.5,"y1"=>-20.5,"x2"=>-8,"y2"=>-27), $Din->PRGR));
if($board == 0){
	$Sizes->add(new LineSize(array("x1"=>-24,"y1"=>Y1_SIZE_TOP,"x2"=>24,"y2"=>Y1_SIZE_TOP), $Sizes->PRGR));
	$Sizes->add(new Line(array("x1"=>-24,"y1"=>0,"x2"=>-24,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
	$Sizes->add(new Line(array("x1"=>24,"y1"=>0,"x2"=>24,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
	}
$Sizes->add(new LineSize(array("x1"=>45,"y1"=>29,"x2"=>45,"y2"=>-30), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>-12,"y1"=>-30,"x2"=>48,"y2"=>-30), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>0,"y1"=>29,"x2"=>48,"y2"=>29), $Sizes->PRGR));

$Din->add(new Rect(array("x1"=>-35,"y1"=>-17.5,"x2"=>-24,"y2"=>17.5), $Din->PRGR));
$Din->add(new Rect(array("x1"=>-35,"y1"=>-13,"x2"=>-24,"y2"=>13), $Din->PRGR));
$Din->add(new Rect(array("x1"=>35,"y1"=>-17.5,"x2"=>24,"y2"=>17.5), $Din->PRGR));
$Din->add(new Rect(array("x1"=>35,"y1"=>-13,"x2"=>24,"y2"=>13), $Din->PRGR));
	}
	else{
//на 32А и больше
$Din->add(new Rect(array("x1"=>-33,"y1"=>-20,"x2"=>33,"y2"=>20), $Din->PRGR));
$Din->add(new Arc(array("x"=>0,"y"=>-25,"d"=>5,"angle1"=>180,"angle2"=>-180), $Din->PRGR));
$Din->add(new Arc(array("x"=>0,"y"=>25,"d"=>5,"angle1"=>180,"angle2"=>-180), $Din->PRGR));
$Din->add(new Arc(array("x"=>12,"y"=>-37,"d"=>5,"angle1"=>180,"angle2"=>-180), $Din->PRGR));
$Din->add(new Arc(array("x"=>-12,"y"=>37,"d"=>5,"angle1"=>180,"angle2"=>-180), $Din->PRGR));
$Din->add(new Line(array("x1"=>-20,"y1"=>20,"x2"=>-20,"y2"=>42), $Din->PRGR));
$Din->add(new Line(array("x1"=>-20,"y1"=>42,"x2"=>-7,"y2"=>42), $Din->PRGR));
$Din->add(new Line(array("x1"=>-7,"y1"=>42,"x2"=>-7,"y2"=>32), $Din->PRGR));
$Din->add(new Line(array("x1"=>-7,"y1"=>32,"x2"=>9,"y2"=>32), $Din->PRGR));
$Din->add(new Line(array("x1"=>9,"y1"=>32,"x2"=>9,"y2"=>20), $Din->PRGR));
$Din->add(new Line(array("x1"=>-7,"y1"=>-20,"x2"=>-7,"y2"=>-28), $Din->PRGR));
$Din->add(new Line(array("x1"=>-7,"y1"=>-28,"x2"=>7,"y2"=>-42), $Din->PRGR));
$Din->add(new Line(array("x1"=>7,"y1"=>-42,"x2"=>20,"y2"=>-42), $Din->PRGR));
$Din->add(new Line(array("x1"=>20,"y1"=>-42,"x2"=>20,"y2"=>-20), $Din->PRGR));
if($PS["board"] == 0 && $PS["current"] < 80){
	$Sizes->add(new LineSize(array("x1"=>-33,"y1"=>Y1_SIZE_TOP_32,"x2"=>33,"y2"=>Y1_SIZE_TOP_32), $Sizes->PRGR));
	$Sizes->add(new Line(array("x1"=>-33,"y1"=>0,"x2"=>-33,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
	$Sizes->add(new Line(array("x1"=>33,"y1"=>0,"x2"=>33,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));

$Sizes->add(new LineSize(array("x1"=>55,"y1"=>-42,"x2"=>55,"y2"=>42), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>20,"y1"=>-42,"x2"=>60,"y2"=>-42), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>-20,"y1"=>42,"x2"=>60,"y2"=>42), $Sizes->PRGR));
	}

if($PS["board"] == 1){
$Din->add(new Rect(array("x1"=>-55,"y1"=>-17.5,"x2"=>-24,"y2"=>17.5), $Din->PRGR));
$Din->add(new Rect(array("x1"=>-55,"y1"=>-13,"x2"=>-24,"y2"=>13), $Din->PRGR));
$Din->add(new Rect(array("x1"=>55,"y1"=>-17.5,"x2"=>24,"y2"=>17.5), $Din->PRGR));
$Din->add(new Rect(array("x1"=>55,"y1"=>-13,"x2"=>24,"y2"=>13), $Din->PRGR));
		}
		else{
$Din->add(new Rect(array("x1"=>-45,"y1"=>-17.5,"x2"=>-24,"y2"=>17.5), $Din->PRGR));
$Din->add(new Rect(array("x1"=>-45,"y1"=>-13,"x2"=>-24,"y2"=>13), $Din->PRGR));
$Din->add(new Rect(array("x1"=>45,"y1"=>-17.5,"x2"=>24,"y2"=>17.5), $Din->PRGR));
$Din->add(new Rect(array("x1"=>45,"y1"=>-13,"x2"=>24,"y2"=>13), $Din->PRGR));		
		}
	}
$Din->add($Sizes);	
return $Din;		
}
//МЕТОД ВЫЧЕРЧИВАНИЯ ЖЕЛТО-КРАСНОЙ РУЧКИ
public function handleU($PS, $PRPARGR){
$HandleU = new Group(array(), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $HandleU->PRGR);
	if($PS["current"] < 30){
$HandleU->add(new RectArcFilled(array("x1"=>-33,"y1"=>-33,"x2"=>33,"y2"=>33,"rad"=>4,"color"=>"white"), $HandleU->PRGR));
$HandleU->add(new RectArc(array("x1"=>-33,"y1"=>-33,"x2"=>33,"y2"=>33,"rad"=>4), $HandleU->PRGR));
$HandleU->add(new Arc(array("x"=>0,"y"=>0,"d"=>66,"angle1"=>180,"angle2"=>-180), $HandleU->PRGR));	
$HandleU->add(new Arc(array("x"=>0,"y"=>0,"d"=>57,"angle1"=>180,"angle2"=>-180), $HandleU->PRGR));	
$HandleU->add(new RectArc(array("x1"=>-5.5,"y1"=>-22,"x2"=>5.5,"y2"=>-14,"rad"=>1), $HandleU->PRGR));	
$HandleU->add(new RectArc(array("x1"=>-5,"y1"=>-14,"x2"=>5,"y2"=>28,"rad"=>5), $HandleU->PRGR));
$HandleU->add(new Arc(array("x"=>0,"y"=>6,"d"=>6,"angle1"=>180,"angle2"=>-180), $HandleU->PRGR));
$HandleU->add(new Line(array("x1"=>-2,"y1"=>6,"x2"=>2,"y2"=>6), $HandleU->PRGR));
$HandleU->add(new Line(array("x1"=>0,"y1"=>4,"x2"=>0,"y2"=>8), $HandleU->PRGR));
$HandleU->add(new Arc(array("x"=>0,"y"=>0,"d"=>28,"angle1"=>112,"angle2"=>68), $HandleU->PRGR));

$Hole1 = new Group(array(), $HandleU->PRGR);
$Hole1->add(new Line(array("x1"=>28.5*cos(M_PI/3+M_PI/25),"y1"=>-28.5*sin(M_PI/3+M_PI/25),"x2"=>30.5*cos(M_PI/3+M_PI/25),"y2"=>-30.5*sin(M_PI/3+M_PI/25)), $Hole1->PRGR));
$Hole1->add(new Line(array("x1"=>28.5*cos(M_PI/3-M_PI/25),"y1"=>-28.5*sin(M_PI/3-M_PI/25),"x2"=>30.5*cos(M_PI/3-M_PI/25),"y2"=>-30.5*sin(M_PI/3-M_PI/25)), $Hole1->PRGR));
$Hole1->add(new Arc(array("x"=>0,"y"=>0,"d"=>61,"angle1"=>-67,"angle2"=>-53), $Hole1->PRGR));
$Hole2 = $Hole1->copyOffset($Hole1, 0, 0);$Hole2->rotate(0, 0, 120);
$Hole3 = $Hole1->copyOffset($Hole1, 0, 0);$Hole3->rotate(0, 0, 180);
$HandleU->add($Hole1);
$HandleU->add($Hole2);
$HandleU->add($Hole3);

$Sizes->add(new LineSize(array("x1"=>-33,"y1"=>Y1_SIZE_BOTTOM,"x2"=>33,"y2"=>Y1_SIZE_BOTTOM,"text"=>"□66","offset"=>-3), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>-33,"y1"=>0,"x2"=>-33,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>33,"y1"=>0,"x2"=>33,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
	}
	else{
//на 32А и больше
$HandleU->add(new RectArcFilled(array("x1"=>-53,"y1"=>-53,"x2"=>53,"y2"=>53,"rad"=>6,"color"=>"white"), $HandleU->PRGR));
$HandleU->add(new RectArc(array("x1"=>-53,"y1"=>-53,"x2"=>53,"y2"=>53,"rad"=>6), $HandleU->PRGR));
$HandleU->add(new Arc(array("x"=>0,"y"=>0,"d"=>106,"angle1"=>180,"angle2"=>-180), $HandleU->PRGR));	
$HandleU->add(new Arc(array("x"=>0,"y"=>0,"d"=>96,"angle1"=>180,"angle2"=>-180), $HandleU->PRGR));	
$HandleU->add(new RectArc(array("x1"=>-8,"y1"=>-45,"x2"=>8,"y2"=>-33,"rad"=>2), $HandleU->PRGR));	
$HandleU->add(new RectArc(array("x1"=>-7,"y1"=>-22,"x2"=>7,"y2"=>48,"rad"=>7), $HandleU->PRGR));
$HandleU->add(new Arc(array("x"=>0,"y"=>10,"d"=>7,"angle1"=>180,"angle2"=>-180), $HandleU->PRGR));
$HandleU->add(new Line(array("x1"=>-2,"y1"=>10,"x2"=>2,"y2"=>10), $HandleU->PRGR));
$HandleU->add(new Line(array("x1"=>0,"y1"=>8,"x2"=>0,"y2"=>12), $HandleU->PRGR));
$HandleU->add(new Arc(array("x"=>0,"y"=>0,"d"=>44,"angle1"=>110,"angle2"=>70), $HandleU->PRGR));

$Hole1 = new Group(array(), $HandleU->PRGR);
$Hole1->add(new Line(array("x1"=>48*cos(M_PI/3+M_PI/30),"y1"=>-48*sin(M_PI/3+M_PI/30),"x2"=>50*cos(M_PI/3+M_PI/30),"y2"=>-50*sin(M_PI/3+M_PI/30)), $Hole1->PRGR));
$Hole1->add(new Line(array("x1"=>48*cos(M_PI/3-M_PI/30),"y1"=>-48*sin(M_PI/3-M_PI/30),"x2"=>50*cos(M_PI/3-M_PI/30),"y2"=>-50*sin(M_PI/3-M_PI/30)), $Hole1->PRGR));
$Hole1->add(new Arc(array("x"=>0,"y"=>0,"d"=>100,"angle1"=>-66,"angle2"=>-54), $Hole1->PRGR));
$Hole2 = $Hole1->copyOffset($Hole1, 0, 0);$Hole2->rotate(0, 0, 120);
$Hole3 = $Hole1->copyOffset($Hole1, 0, 0);$Hole3->rotate(0, 0, 180);
$HandleU->add($Hole1);
$HandleU->add($Hole2);
$HandleU->add($Hole3);
	if($fix != 'P'){
$Sizes->add(new LineSize(array("x1"=>-53,"y1"=>Y1_SIZE_BOTTOM_32,"x2"=>53,"y2"=>Y1_SIZE_BOTTOM_32,"text"=>"□106","offset"=>-5), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>-53,"y1"=>0,"x2"=>-53,"y2"=>Y1_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>53,"y1"=>0,"x2"=>53,"y2"=>Y1_SIZE_BOTTOM_32+Y_OUT_SIZE), $Sizes->PRGR));
		}
	}
$HandleU->add($Sizes);	
return $HandleU;		
}
//МЕТОД ВЫЧЕРЧИВАНИЯ ПЛАСТИНЫ КРЕПЛЕНИЯ НА МОНТАЖНУЮ ПАНЕЛЬ ДЛЯ ИСПОЛНЕНИЯ O И B
public function back_cover($PS, $PRPARGR){
$Back_cover = new Group(array(), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Back_cover->PRGR);
	if($PS["current"] < 30){
$Back_cover->add(new RectArc(array("x1"=>-24,"y1"=>-24,"x2"=>24,"y2"=>24,"rad"=>3), $Back_cover->PRGR));
//if($board == 0){
$Sizes->add(new LineSize(array("x1"=>-24,"y1"=>Y1_SIZE_TOP,"x2"=>24,"y2"=>Y1_SIZE_TOP,"text"=>"□48","offset"=>-3), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>-24,"y1"=>0,"x2"=>-24,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>24,"y1"=>0,"x2"=>24,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
//		}
	}
	else{
//на 32А и больше
$Back_cover->add(new RectArc(array("x1"=>-47,"y1"=>-47,"x2"=>47,"y2"=>47,"rad"=>5), $Back_cover->PRGR));

$Sizes->add(new LineSize(array("x1"=>-47,"y1"=>Y1_SIZE_TOP_32,"x2"=>47,"y2"=>Y1_SIZE_TOP_32,"text"=>"□94","offset"=>-3), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>-47,"y1"=>0,"x2"=>-47,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>47,"y1"=>0,"x2"=>47,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
	}
$Back_cover->add($Sizes);	
return $Back_cover;		
}
//МЕТОД ВЫЧЕРЧИВАНИЯ УПЛОТНИТЕЛЬНОГО БЛОКА
public function ip54($PS, $PRPARGR){
$Ip54 = new Group(array(), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Ip54->PRGR);
	if($PS["current"] < 30){
$Ip54->add(new RectArcFilled(array("x1"=>-24,"y1"=>-24,"x2"=>24,"y2"=>24,"rad"=>3,"color"=>"white"), $Ip54->PRGR));	
$Ip54->add(new RectArc(array("x1"=>-24,"y1"=>-24,"x2"=>24,"y2"=>24,"rad"=>3), $Ip54->PRGR));	
$Ip54->add(new Arc(array("x"=>-18,"y"=>-18,"d"=>8,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));	
$Ip54->add(new Arc(array("x"=>-18,"y"=>18,"d"=>4,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>18,"y"=>-18,"d"=>4,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>18,"y"=>18,"d"=>8,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));
$Ip54->add(new Line(array("x1"=>-20.5,"y1"=>-20.5,"x2"=>-15.5,"y2"=>-15.5), $Ip54->PRGR));
$Ip54->add(new Line(array("x1"=>20.5,"y1"=>20.5,"x2"=>15.5,"y2"=>15.5), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>0,"y"=>-15,"d"=>4,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>0,"y"=>15,"d"=>4,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));

	if($PS["handle"] != 'ur' && $PS["handle"] != 'ub' && $PS["fix"] != 'P'){
$Sizes->add(new LineSize(array("x1"=>-24,"y1"=>Y1_SIZE_TOP,"x2"=>24,"y2"=>Y1_SIZE_TOP,"text"=>"□48","offset"=>-3), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>-24,"y1"=>0,"x2"=>-24,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>24,"y1"=>0,"x2"=>24,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
		}
	}
	else{
//на 32А и больше
$Ip54->add(new RectArcFilled(array("x1"=>-47,"y1"=>-47,"x2"=>47,"y2"=>47,"rad"=>5,"color"=>"white"), $Ip54->PRGR));	
$Ip54->add(new RectArc(array("x1"=>-47,"y1"=>-47,"x2"=>47,"y2"=>47,"rad"=>5), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>-37.5,"y"=>-37.5,"d"=>10,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>-37.5,"y"=>37.5,"d"=>5,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>37.5,"y"=>-37.5,"d"=>5,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>37.5,"y"=>37.5,"d"=>10,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));
$Ip54->add(new Line(array("x1"=>-41,"y1"=>-41,"x2"=>-34,"y2"=>-34), $Ip54->PRGR));
$Ip54->add(new Line(array("x1"=>41,"y1"=>41,"x2"=>34,"y2"=>34), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>-37.5,"y"=>-25,"d"=>5,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>-37.5,"y"=>25,"d"=>5,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>37.5,"y"=>-25,"d"=>5,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>37.5,"y"=>25,"d"=>5,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>0,"y"=>-25,"d"=>5,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>0,"y"=>25,"d"=>5,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>-25,"y"=>0,"d"=>5,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));
$Ip54->add(new Arc(array("x"=>25,"y"=>0,"d"=>5,"angle1"=>180,"angle2"=>-180), $Ip54->PRGR));

	if($PS["handle"] != 'ur' && $PS["handle"] != 'ub'  && $PS["fix"] != 'P'){
$Sizes->add(new LineSize(array("x1"=>-47,"y1"=>Y1_SIZE_TOP_32,"x2"=>47,"y2"=>Y1_SIZE_TOP_32,"text"=>"□94","offset"=>-3), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>-47,"y1"=>0,"x2"=>-47,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>47,"y1"=>0,"x2"=>47,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
		}
	}
$Ip54->add($Sizes);	
return $Ip54;		
}
//МЕТОД ВЫЧЕРЧИВАНИЯ БЛОКИРУЕМОЙ РУЧКИ
public function block_handle($PS, $PRPARGR){
$Block_handle = new Group(array(), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Block_handle->PRGR);
if($PS["current"] < 30){
$Block_handle->add(new RectArcFilled(array("x1"=>-24,"y1"=>-24,"x2"=>24,"y2"=>24,"rad"=>3,"color"=>"white"), $Block_handle->PRGR));	
$Block_handle->add(new RectArc(array("x1"=>-24,"y1"=>-24,"x2"=>24,"y2"=>24,"rad"=>3), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>-18,"y"=>-18,"d"=>3,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>18,"y"=>-18,"d"=>3,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>-18,"y"=>18,"d"=>3,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>18,"y"=>18,"d"=>3,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>-15,"y"=>0,"d"=>9,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>15,"y"=>0,"d"=>9,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Line(array("x1"=>-17,"y1"=>0,"x2"=>-13,"y2"=>0), $Block_handle->PRGR));
$Block_handle->add(new Line(array("x1"=>-15,"y1"=>-2,"x2"=>-15,"y2"=>2), $Block_handle->PRGR));
$Block_handle->add(new Line(array("x1"=>17,"y1"=>0,"x2"=>13,"y2"=>0), $Block_handle->PRGR));
$Block_handle->add(new Line(array("x1"=>15,"y1"=>-2,"x2"=>15,"y2"=>2), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>0,"y"=>-15,"d"=>9,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>0,"y"=>15,"d"=>9,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>0,"y"=>-15,"d"=>5,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>0,"y"=>15,"d"=>5,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));

$Sizes->add(new LineSize(array("x1"=>-24,"y1"=>Y1_SIZE_TOP,"x2"=>24,"y2"=>Y1_SIZE_TOP,"text"=>"□48","offset"=>-3), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>-24,"y1"=>0,"x2"=>-24,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>24,"y1"=>0,"x2"=>24,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
	}
	else{
//на 32А и больше
$Block_handle->add(new RectArcFilled(array("x1"=>-47,"y1"=>-47,"x2"=>47,"y2"=>47,"rad"=>5,"color"=>"white"), $Block_handle->PRGR));
$Block_handle->add(new RectArc(array("x1"=>-47,"y1"=>-47,"x2"=>47,"y2"=>47,"rad"=>5), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>-37.5,"y"=>-37.5,"d"=>5,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>-37.5,"y"=>37.5,"d"=>5,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>37.5,"y"=>-37.5,"d"=>5,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>37.5,"y"=>37.5,"d"=>5,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>37.5,"y"=>25,"d"=>5,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>-37.5,"y"=>25,"d"=>5,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>37.5,"y"=>-25,"d"=>5,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>-37.5,"y"=>-25,"d"=>5,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>-25,"y"=>0,"d"=>11,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>25,"y"=>0,"d"=>11,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Line(array("x1"=>-29,"y1"=>-4,"x2"=>-21,"y2"=>4), $Block_handle->PRGR));
$Block_handle->add(new Line(array("x1"=>29,"y1"=>4,"x2"=>21,"y2"=>-4), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>0,"y"=>-25,"d"=>11,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>0,"y"=>25,"d"=>11,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>0,"y"=>-25,"d"=>6,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));
$Block_handle->add(new Arc(array("x"=>0,"y"=>25,"d"=>6,"angle1"=>180,"angle2"=>-180), $Block_handle->PRGR));

$Sizes->add(new LineSize(array("x1"=>-47,"y1"=>Y1_SIZE_TOP_32,"x2"=>47,"y2"=>Y1_SIZE_TOP_32,"text"=>"□94","offset"=>-3), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>-47,"y1"=>0,"x2"=>-47,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>47,"y1"=>0,"x2"=>47,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
	}
$Block_handle->add($Sizes);	
return $Block_handle;		
}

//МЕТОД ВЫЧЕРЧИВАНИЯ РУКОЯТКИ
public function handleT($PS, $PRPARGR){
$HandleT = new Group(array(), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $HandleT->PRGR);
	if($PS["current"] < 300){
$HandleT->add(new QuadrangleFilled(array("x1"=>-6,"y1"=>0,"x2"=>6,"y2"=>0,"x3"=>4,"y3"=>47,"x4"=>-4,"y4"=>47,"color"=>"white"), $HandleT->PRGR));	
$HandleT->add(new ArcFilled(array("x"=>0,"y"=>55,"d"=>18,"angle1"=>180,"angle2"=>-180,"color"=>"white"), $HandleT->PRGR));
$HandleT->add(new ArcFilled(array("x"=>0,"y"=>0,"d"=>33,"angle1"=>180,"angle2"=>-180,"color"=>"white"), $HandleT->PRGR));
$HandleT->add(new Arc(array("x"=>0,"y"=>55,"d"=>18,"angle1"=>180,"angle2"=>-180), $HandleT->PRGR));	
$HandleT->add(new Arc(array("x"=>0,"y"=>0,"d"=>33,"angle1"=>110,"angle2"=>-95), $HandleT->PRGR));	
$HandleT->add(new Arc(array("x"=>0,"y"=>0,"d"=>33,"angle1"=>-85,"angle2"=>70), $HandleT->PRGR));	
$HandleT->add(new Arc(array("x"=>0,"y"=>0,"d"=>14,"angle1"=>-30,"angle2"=>25), $HandleT->PRGR));	
$HandleT->add(new Arc(array("x"=>0,"y"=>0,"d"=>14,"angle1"=>150,"angle2"=>-165), $HandleT->PRGR));	
$HandleT->add(new Line(array("x1"=>0,"y1"=>-19,"x2"=>-6.7,"y2"=>-1.8), $HandleT->PRGR));	
$HandleT->add(new Line(array("x1"=>0,"y1"=>-19,"x2"=>6.7,"y2"=>-1.8), $HandleT->PRGR));	
$HandleT->add(new Line(array("x1"=>-6,"y1"=>0,"x2"=>-4,"y2"=>47), $HandleT->PRGR));
$HandleT->add(new Arc(array("x"=>15.5,"y"=>3,"d"=>43,"angle1"=>-180,"angle2"=>-136), $HandleT->PRGR));
$HandleT->add(new Line(array("x1"=>6,"y1"=>0,"x2"=>4,"y2"=>47), $HandleT->PRGR));
$HandleT->add(new Arc(array("x"=>-15.5,"y"=>3,"d"=>43,"angle1"=>-44,"angle2"=>0), $HandleT->PRGR));
$HandleT->add(new Line(array("x1"=>0,"y1"=>-19,"x2"=>0,"y2"=>-12), $HandleT->PRGR));	
	}
	else{
//на 32А и больше
	}
$HandleT->add($Sizes);	
return $HandleT;		
}
//МЕТОД ВЫЧЕРЧИВАНИЯ КЛЮЧА
public function handleK($PS, $PRPARGR){
$HandleK = new Group(array(), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $HandleK->PRGR);
$HandleK->add(new RectArcFilled(array("x1"=>-19.2,"y1"=>-19.2,"x2"=>19.2,"y2"=>19.2,"rad"=>3,"color"=>"white"), $HandleK->PRGR));
$HandleK->add(new RectArc(array("x1"=>-19.2,"y1"=>-19.2,"x2"=>19.2,"y2"=>19.2,"rad"=>3), $HandleK->PRGR));
$HandleK->add(new Arc(array("x"=>0,"y"=>0,"d"=>27,"angle1"=>180,"angle2"=>-180), $HandleK->PRGR));
$HandleK->add(new Arc(array("x"=>0,"y"=>0,"d"=>17,"angle1"=>180,"angle2"=>-180), $HandleK->PRGR));
$HandleK->add(new Arc(array("x"=>0,"y"=>0,"d"=>10,"angle1"=>180,"angle2"=>-180), $HandleK->PRGR));
$HandleK->add(new RectFilled(array("x1"=>-1,"y1"=>-9,"x2"=>1,"y2"=>9,"color"=>"white"), $HandleK->PRGR));
$HandleK->add(new Rect(array("x1"=>-1,"y1"=>-9,"x2"=>1,"y2"=>9), $HandleK->PRGR));

$Sizes->add(new LineSize(array("x1"=>-19.2,"y1"=>Y1_SIZE_BOTTOM,"x2"=>19.2,"y2"=>Y1_SIZE_BOTTOM,"text"=>"□38.4","offset"=>-4), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>-19.2,"y1"=>0,"x2"=>-19.2,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>19.2,"y1"=>0,"x2"=>19.2,"y2"=>Y1_SIZE_BOTTOM+Y_OUT_SIZE), $Sizes->PRGR));
$HandleK->add($Sizes);	
return $HandleK;	
	}
//МЕТОД ВЫЧЕРЧИВАНИЯ ТАБЛИЧКИ
public function board($PS, $PRPARGR){
//$LibElement = new LibElement();
$Board = new Group(array(), $PRPARGR);
$Sizes = new Group(array("color"=>"black", "width"=>1), $Board->PRGR);	 
	
	if($PS["current"] < 30){
	
$Board->add(new RectArcFilled(array("x1"=>-24,"y1"=>-24,"x2"=>24,"y2"=>24,"rad"=>3,"color"=>"white"), $Board->PRGR));		
$Board->add(new RectArc(array("x1"=>-24,"y1"=>-24,"x2"=>24,"y2"=>24,"rad"=>3), $Board->PRGR));		

$Sizes->add(new LineSize(array("x1"=>-24,"y1"=>Y1_SIZE_TOP,"x2"=>24,"y2"=>Y1_SIZE_TOP,"text"=>"□48","offset"=>-3), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>-24,"y1"=>0,"x2"=>-24,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>24,"y1"=>0,"x2"=>24,"y2"=>Y1_SIZE_TOP-Y_OUT_SIZE), $Sizes->PRGR));

$Board->add($this->mark_pos ($PS["initpos"], $PS["angle"], $PS["qpos"], $PS["mark"], 19, 5, 8, $Board->scale, $Board->PRGR));	
//print_r($Board);exit;	
//$this->mark_pos ('A', 12, 12, '1 2 3 4 5 6 7 8 9 10 11 12 ', 20, 15);
	
	}
	else{
//на 32А и больше

$Board->add(new RectArcFilled(array("x1"=>-47,"y1"=>-47,"x2"=>47,"y2"=>47,"rad"=>5,"color"=>"white"), $Board->PRGR));
$Board->add(new RectArc(array("x1"=>-47,"y1"=>-47,"x2"=>47,"y2"=>47,"rad"=>5), $Board->PRGR));

$Sizes->add(new LineSize(array("x1"=>-47,"y1"=>Y1_SIZE_TOP_32,"x2"=>47,"y2"=>Y1_SIZE_TOP_32,"text"=>"□94","offset"=>-3), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>-47,"y1"=>0,"x2"=>-47,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));
$Sizes->add(new Line(array("x1"=>47,"y1"=>0,"x2"=>47,"y2"=>Y1_SIZE_TOP_32-Y_OUT_SIZE), $Sizes->PRGR));

$Board->add($this->mark_pos ($PS["initpos"], $PS["angle"], $PS["qpos"], $PS["mark"], 35, 10, 16, $Board->scale, $Board->PRGR));
	}
$Board->add($Sizes);
//print_r($Board);exit;	
return $Board;		
}
//Метод вывода маркировки положений ручки переключателя
	
public function  mark_pos ($initPos, $angle, $qPos, $strMark, $r, $sizeFont, $fieldSize, $scale, $PRGR){
	//if($strMark == "") return;//если маркировки нет
$arrMark = array();
if($initPos == "A") $firstPol = 1.5*M_PI;
else if($initPos == "B") $firstPol = M_PI;
else if($initPos == "C") $firstPol = 1.5*M_PI - 2*M_PI/$angle * floor($qPos/2);
else if($initPos == "D") $firstPol = 1.5*M_PI-M_PI/$angle;
else if($initPos == "M") $firstPol = 1.5*M_PI;
else if($initPos == "V") $firstPol = 1.5*M_PI - 2*M_PI/$angle;

  //$color = imageColorAllocate(self::0, 0, 0);//цвет фона линий

//Преобразование маркировки из строки в массив
$index = 0;
	for($m=0; $m<$qPos; $m++){
	if($strMark == "") $arrMark[$m] = $m+1;
	else {
		$arrMark[$m] = "";
		while ($strMark[$index] != "$" && $strMark[$index] != " ") {
			$arrMark[$m] .= $strMark[$index];
			$index++;
			}
		}
			$index++;
	}
//imageTtfText(self::10, 0, 10, 10, $color, "../../fonts/arial.ttf",  $strMark[4]);	
//imageTtfText(self::10, 0, 10, 10, $color, "../../fonts/arial.ttf",  $firstPol);
//$r = $this->center_text($text, ($x2+$x1)/2, ($y2+$y1)/2,($x2-$x1)/2, $sizeFont);	
//Вывод маркировки
$Mark = new Group(array(), $PRGR);
//print_r(self::$X);exit;
for($a = 0; $a < $qPos; $a ++){//a - номер текущего положения ручки
$CENTERTEXT = $this->center_text($arrMark[$a], 0.5+$r*cos($firstPol+$a*2*M_PI/$angle), $r*sin($firstPol+$a*2*M_PI/$angle),$fieldSize, $sizeFont);	
//$CENTERTEXT = $this->center_text($arrMark[$a], $Mark->x0+SCALE*(-0.5+$r*cos($firstPol+$a*2*M_PI/$angle)), $Mark->y0+SCALE*($r*sin($firstPol+$a*2*M_PI/$angle)),SCALE*$fieldSize, $sizeFont);	

//imageTtfText(self::$sizeFont, 0, self::$X+SCALE*(-2+$r*cos($firstPol+$a*2*M_PI/$angle)), self::$Y+SCALE*(2+$r*sin($firstPol+$a*2*M_PI/$angle)), $color, "../../fonts/arial.ttf", $arrMark[$a]);
//imageTtfText(self::$sizeFont, 0, self::$X+SCALE*(-2+$r*cos($firstPol+$a*2*M_PI/$angle)), self::$Y+SCALE*(2+$r*sin($firstPol+$a*2*M_PI/$angle)), $color, "../../fonts/arial.ttf", $arrMark[$a]);
$font = $_SERVER['DOCUMENT_ROOT']."/fonts/arial.ttf";
$Mark->add(new TextDraw(array("size"=>$CENTERTEXT["sizeFont"], "angle"=>0, "x"=>$CENTERTEXT["xLeft"],"y"=>$CENTERTEXT["yLeft"],"font"=>"arial","text"=>$arrMark[$a]), $PRGR));

//imageTtfText(self::$CENTERTEXT["sizeFont"], 0, $CENTERTEXT["xLeft"], $CENTERTEXT["yLeft"], $color, $this->font, $arrMark[$a]);
		}
			
return $Mark;		
	}
//Центровка текста
public function center_text($text, $xCenter, $yCenter, $fieldSize, $sizeFont){
$TEXTBOX = imagettfbbox ($sizeFont, 0, $this->font, $text);
$lengthText = abs($TEXTBOX[0] - $TEXTBOX[2]);//измерение длины текста
	if($lengthText > $fieldSize){//если текст не помещается в отведенном участке
		$k = $lengthText / $fieldSize;//коэффициент масштабирования (уменьшения)
		$sizeFont = $sizeFont / $k;
		$TEXTBOX = imagettfbbox ($sizeFont, 0, $this->font, $text);
		$lengthText = abs($TEXTBOX[0] - $TEXTBOX[2]);//измерение длины текста
		}
		$CENTERTEXT["xLeft"] = $xCenter - floor($lengthText / 2);
		$CENTERTEXT["yLeft"] = $yCenter + floor($sizeFont / 2);
		$CENTERTEXT["sizeFont"] = $sizeFont;
		return $CENTERTEXT;
	}	
//Метод вычерчивания коробки
public function box($PS, $PRPARGR){
$Lib = new Lib();
$nameBox = "box".$PS["box"]."L";
//print_r( $$nameBox);
//$LibBox = $Lib->$nameBox($PRPARGR, $PS["pg"]);
//print_r( $Lib->dx);exit;
$Box = new Group(array(), $PRPARGR);
//print_r($Box);exit;

//print_r( $Lib->dx);exit;


$Box->add($Lib->$nameBox($Box->PRGR, $PS["pg"]));

return $Box ;
	}
		
}
  
?>