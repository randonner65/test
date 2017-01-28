<?php
	function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса

$tds=new ToolsDrawingSwitcher();//создание объекта класса ToolsDrawingSwitcher
$ds=new DrawingSwitcher();//создание объекта класса DrawingSwitcher
$dsl=new DrawingSwitcherLeft();//создание объекта класса DrawingSwitcherLeft
$name = str_replace(" ", "+", $_GET['name']);//получение наименования переключателя
$ps = new PropertiesSwitcher();//создание объекта класса PropertiesSwitcher
$PropertiesSwitcher = $ps->getPropSwitch($name);//получить свойства переключателя

$scheme = new Schemas($PropertiesSwitcher[number]);//создание объекта класса Schemas

$qdesk = round($scheme->qcont / 2);//количество галет  
$current =  $PropertiesSwitcher[current];//ток
$qpos =  $PropertiesSwitcher[qpos];//количество положений
$strmark =  $PropertiesSwitcher[mark];//маркировка
$handle = $PropertiesSwitcher[handle];//ток
$board = $PropertiesSwitcher[board];//наличие таблички
$fix = $PropertiesSwitcher[fix];//способ крепления
$ip54 = $PropertiesSwitcher[ip54];//наличие уплотнения по оси
$moment = $PropertiesSwitcher[moment];//наличие самовозврата
$length = $PropertiesSwitcher[length];//расстояние от монтажной панели до двери
$initpos = $PropertiesSwitcher[initpos];//начальное положение
$angle = $PropertiesSwitcher[angle];//угол поворота ручки
$qpos = $PropertiesSwitcher[qpos];//количество положений
$mark = $PropertiesSwitcher[mark];//маркировка положений

 //Создание холста 
 if($ip54 == 1 || $fix == 'B') ToolsDrawingSwitcher::$i = imageCreate(1050, 600);
else ToolsDrawingSwitcher::$i = imageCreate(600, 600);
  ToolsDrawingSwitcher::$color = imageColorAllocate(ToolsDrawingSwitcher::$i, 255, 255, 255);
  imageFilledRectangle(ToolsDrawingSwitcher::$i, 0, 0, imageSX(ToolsDrawingSwitcher::$i), imageSY(ToolsDrawingSwitcher::$i), ToolsDrawingSwitcher::$color);

 //---------------------------------------------------------------------------------------------
 //ВЫЧЕРЧИВАНИЕ РАЗМЕТКИ КРЕПЕЖНЫХ ОТВЕРСТИЙ ПЕРЕКЛЮЧАТЕЛЯ
 ToolsDrawingSwitcher::$X0 = 300;//горизонтальная координата нулевой точки
 ToolsDrawingSwitcher::$Y0 = 300;//вертикальная координата нулевой точки
 ToolsDrawingSwitcher::$X = ToolsDrawingSwitcher::$X0;//горизонтальная координата базовой точки
 ToolsDrawingSwitcher::$Y = ToolsDrawingSwitcher::$Y0;//вертикальная координата базовой точки
 $ds->axis_line (0, -30, 0, 30);
 $ds->axis_line (-30, 0, 30, 0);
  if($handle == 'key'){
 //Если ключ
  $tds->dotted_circle (0, 0, 43);
  $tds->arc (0, 0, 22.3, -82, -98);
  $tds->arc (0, -11, 3, -180, 0);
  $tds->size_line (8, -8, -8, 8, 'ø22.3', -3);
  $tds->size_line (-30, 0, -30, -12.5, 12.5, 17);
  $tds->line(-35, -12.5, 0, -12.5, 1);
  $tds->line(-35, 0, -11.2, 0, 1);
  $tds->line(-30, 15, -30, -17.5, 1);
  }
  //Если уплотнение
  else if($ip54 == 1){
  ToolsDrawingSwitcher::$color = imageColorAllocate(ToolsDrawingSwitcher::$i, 0, 0, 0);//черный цвет
  imageTtfText(ToolsDrawingSwitcher::$i, 15, 0, 140, 550,ToolsDrawingSwitcher::$color,"../../fonts/arial.ttf", 'Крепление двумя саморезами');
  $tds->dotted_rectangle_arc(-24, -24, 24, 24, 3);
    $tds->arc (18, -18, 4, -180, 180);
    $tds->arc (-18, 18, 4, -180, 180);
  $ds->axis_line (10, -18, 26, -18);
  $ds->axis_line (-26, 18, -10, 18);
  $ds->axis_line (18, -26, 18, -10);
  $ds->axis_line (-18, 10, -18, 26);
  $tds->line(-18, 18, -18, 40, 1);
  $tds->line(18, -18, 18, 40, 1);
  $tds->line(18, -18, 42, -42, 1);
  
  if($current < 30){
  $tds->size_line (-18, 35, 18, 35, '□36', -3);
  $tds->size_line (16, -16, 20, -20, '2 отв. ø4', 10);
	}
	else {
	$tds->size_line (-18, 35, 18, 35, '□75', -3);
	$tds->size_line (16, -16, 20, -20, '2 отв. ø5', 10);
	}
	
	ToolsDrawingSwitcher::$X += 500;
	ToolsDrawingSwitcher::$color = imageColorAllocate(ToolsDrawingSwitcher::$i, 0, 0, 0);//черный цвет
  imageTtfText(ToolsDrawingSwitcher::$i, 15, 0, 680, 550,ToolsDrawingSwitcher::$color,"../../fonts/arial.ttf", 'Крепление винт - гайка');
	 $ds->axis_line (0, -30, 0, 30);
     $ds->axis_line (-30, 0, 30, 0);
  $tds->dotted_rectangle_arc(-24, -24, 24, 24, 3);
    $tds->arc (-18, -18, 4, -180, 180);
    $tds->arc (18, 18, 4, -180, 180);
  $ds->axis_line (10, 18, 26, 18);
  $ds->axis_line (-26, -18, -10, -18);
  $ds->axis_line (-18, -26, -18, -10);
  $ds->axis_line (18, 10, 18, 26);
  $tds->line(-18, -18, -18, 40, 1);
  $tds->line(18, 18, 18, 40, 1);
  $tds->line(-18, -18, -42, -42, 1);
  if($current < 30){
  $tds->size_line (-18, 35, 18, 35, '□36', -3);
  $tds->size_line (-16, -16, -20, -20, '2 отв. М4', -22);
	}
	else {
	$tds->size_line (-18, 35, 18, 35, '□75', -3);
	$tds->size_line (-16, -16, -20, -20, '2 отв. М5', -22);
	}	
	
  }
  else if($fix == 'O')fix_mounting_panel();
  
  
  else if($fix == 'B'){
  ToolsDrawingSwitcher::$color = imageColorAllocate(ToolsDrawingSwitcher::$i, 0, 0, 0);//черный цвет
  imageTtfText(ToolsDrawingSwitcher::$i, 15, 0, 180, 550,ToolsDrawingSwitcher::$color,"../../fonts/arial.ttf", 'Крепление ручки на дверь');
  fix_camera();
  ToolsDrawingSwitcher::$X += 500;
  ToolsDrawingSwitcher::$color = imageColorAllocate(ToolsDrawingSwitcher::$i, 0, 0, 0);//черный цвет
  imageTtfText(ToolsDrawingSwitcher::$i, 15, 0, 570, 550,ToolsDrawingSwitcher::$color,"../../fonts/arial.ttf", 'Крепление переключателя на монтажную панель');
   $ds->axis_line (0, -30, 0, 30);
 $ds->axis_line (-30, 0, 30, 0);
  fix_mounting_panel();
  }
  
  
  else {
  //
  fix_camera();
  
  }

//Крепление камеры
function fix_camera(){
global $tds, $current;
$tds->arc (0, 0, 9, -180, 180);
 $tds->arc (0, -15, 4.2, -180, 180);
 $tds->arc (0, 15, 4.2, -180, 180);
 $tds->dotted_circle (0, 0, 43);

 

 $tds->line(0, -15, 35, -15, 1);
 $tds->line(0, 15, 35, 15, 1);

 $tds->line(-13, 13, 0, 0, 1);
 $tds->line(0, -15, 30, -45, 1);
  if($current < 30){
 $tds->size_line (30, -15, 30, 15, 30);
 $tds->size_line (3, -3, -3, 3,'ø9', -10 );
 $tds->size_line (2, -17, -2, -13,'2 отв. ø4.2', 10 );
 }
 else{
 $tds->size_line (30, -15, 30, 15, 50);
 $tds->size_line (3, -3, -3, 3,'ø10', -10 );
 $tds->size_line (2, -17, -2, -13,'2 отв. ø5.4', 10 );
	}

} 
//Крепление на монтажную панель
function fix_mounting_panel(){
global $tds, $current ;
 $tds->dotted_rectangle_arc(-24, -24, 24, 24, 3);
    $tds->arc (18, -18, 4, -180, 180);
    $tds->arc (-18, 18, 4, -180, 180);
	$tds->arc (-18, -18, 4, -180, 180);
    $tds->arc (18, 18, 4, -180, 180);
	
  $tds->axis_line (10, -18, 26, -18);
  $tds->axis_line (-26, 18, -10, 18);
  $tds->axis_line (18, -26, 18, -10);
  $tds->axis_line (-18, 10, -18, 26);
  
   $tds->axis_line (10, 18, 26, 18);
  $tds->axis_line (-26, -18, -10, -18);
  $tds->axis_line (18, 26, 18, 10);
  $tds->axis_line (-18, -26, -18, -10);
  
  $tds->line(-18, 18, -18, 40, 1);
  $tds->line(18, -18, 18, 40, 1);
  $tds->line(18, -18, 42, -42, 1);
  
  if($current < 30){
  $tds->size_line (-18, 35, 18, 35, '□36', -3);
  $tds->size_line (16, -16, 20, -20, '4 отв. ø4', 10);
	}
	else {
	$tds->size_line (-18, 35, 18, 35, '□75', -3);
	$tds->size_line (16, -16, 20, -20, '4 отв. ø5', 10);
	}
}

	

Header("Content-type: image/jpeg");
imageJpeg(ToolsDrawingSwitcher::$i, '../../images/passport/'.$name.'_fix_holes.jpg');
  imageJpeg(ToolsDrawingSwitcher::$i);
  imageDestroy(ToolsDrawingSwitcher::$i);

 


 ?>