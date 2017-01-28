<?php
	function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса

$tds=new ToolsDrawingSwitcher();//создание объекта класса ToolsDrawingSwitcher
$ds=new DrawingSwitcher();//создание объекта класса DrawingSwitcher
$dsl=new DrawingSwitcherLeft();//создание объекта класса DrawingSwitcherLeft
	if(isset($_GET["name"])){//если чертеж выводит страница паспорта
$name = str_replace(" ", "+", $_GET["name"]);//получение наименования переключателя
$ps = new PropertiesSwitcher();//создание объекта класса PropertiesSwitcher
$PS = $ps->getPropSwitch($name);//получить свойства переключателя
$scheme = new Schemas($PS["number"]);//создание объекта класса Schemas
	}
	else{//если чертеж выводит конструктор
$PS["current"] = $_GET["current"];//ток	
$PS["qdesk"] = round($_GET["qcont"] / 2);//количество галет 
$PS["qpos"] = $_GET["qpos"];//количество положений	
$PS["mark"] = $_GET["mark"];//маркировка
$PS["handle"] = $_GET["handle"];//ручка
$PS["board"] = $_GET["board"];//наличие таблички
$PS["fix"] = $_GET["fix"];//способ крепления
$PS["ip54"] = $_GET["ip54"];//наличие уплотнения по оси
$PS["moment"] = $_GET["moment"];//наличие самовозврата
$PS["length"] = $_GET["length"];//расстояние от монтажной панели до двери
$PS["initpos"] = $_GET["initpos"];//начальное положение
$PS["angle"] = $_GET["angle"];//угол поворота ручки
	}

//Создание фиктивного холста
 ToolsDrawingSwitcher::$i = imageCreate(1, 1);
 ToolsDrawingSwitcher::$color = imageColorAllocate(ToolsDrawingSwitcher::$i, 255, 255, 255);
 imageFilledRectangle(ToolsDrawingSwitcher::$i, 0, 0, imageSX(ToolsDrawingSwitcher::$i), imageSY(ToolsDrawingSwitcher::$i), ToolsDrawingSwitcher::$color);
//Фиктивное прочерчивание основной проекции переключателя для определения горизонтального габарита
frontal();
  imageDestroy(ToolsDrawingSwitcher::$i);//удаление фиктивного холста
 //Создание реального холста 
if($PS["current"] < 30 && $PS["handle"] != 't' && $PS["fix"] != 'P'){$canvaHeight=500; $y1=235;} 
	else {$canvaHeight=760; $y1=340;}
ToolsDrawingSwitcher::$i = imageCreate(ToolsDrawingSwitcher::$X+140*ToolsDrawingSwitcher::$scale, $canvaHeight);

  ToolsDrawingSwitcher::$color = imageColorAllocate(ToolsDrawingSwitcher::$i, 255, 255, 255);
  imageFilledRectangle(ToolsDrawingSwitcher::$i, 0, 0, imageSX(ToolsDrawingSwitcher::$i), imageSY(ToolsDrawingSwitcher::$i), ToolsDrawingSwitcher::$color);
//Реальное вычерчивание основной проекции переключателя
frontal();
//Увеличение горизонтальной координаты базовой точки для вычерчивание левой проекции переключателя
 ToolsDrawingSwitcher::$X += 80*ToolsDrawingSwitcher::$scale;
 //---------------------------------------------------------------------------------------------
 //ВЫЧЕРЧИВАНИЕ ЛЕВОЙ ПРОЕКЦИИ ПЕРЕКЛЮЧАТЕЛЯ
 //Вычерчивание осей

 if($PS["fix"] == 'L') $dsl->din($PS);//Вычерчивание крепления на din-рейку
 

 if(($PS["fix"] == 'O' || $PS["fix"] == 'B') && $PS["handle"] != 'ur' && $PS["handle"] != 'ub' && $PS["board"] == 0) $dsl->back_cover($PS);//Вычерчивание пластины крепления на монтажную панель для исполнения O и B
 if($PS["board"] == 0) $dsl->desc($PS);//Вычерчивание галеты
 if($PS["fix"] != 'L' && $PS["fix"] != 'O')	$dsl->camera($PS);//Вычерчивание аретационной камеры
 if($PS["ip54"] == 1) $dsl->ip54($PS); //Вычерчивание уплотнительного блока
 if($PS["fix"] == 'P') $dsl->box($PS); //Вычерчивание коробки
 if($PS["fix"] == 'B' && $PS["handle"] != 'ur' && $PS["handle"] != 'ub' && $PS["board"] == 0) $dsl->block_handle($PS);//Вычерчивание блокируемой ручки
 if($PS["board"] == 1) $dsl->board($PS);//Вычерчивание таблички
 if($PS["handle"] == 'black' || $PS["handle"] == 'red') $dsl->handle($PS);//Вычерчивание обычной ручки
 if($PS["handle"] == 'key')  $dsl->handleK(PS);//Вычерчивание ключа
 if($PS["handle"] == 't')  $dsl->handleT($PS);//Вычерчивание рукоятки
 if($PS["handle"] == 'ur' || $PS["handle"] == 'ub')$dsl->handleU($PS);//желто-красная ручка

 
 //Вычерчивание осей
 //$ds->axis_line (0, -50, 0, 50);
 //$ds->axis_line (-50, 0, 50, 0); 
//imageTtfText(ToolsDrawingSwitcher::$i, 15, 0, 0, 870,ToolsDrawingSwitcher::$color,"../../fonts/arial.ttf", "X=".ToolsDrawingSwitcher::$X);   

Header("Content-type: image/jpeg");
  imageJpeg(ToolsDrawingSwitcher::$i);
  imageJpeg(ToolsDrawingSwitcher::$i, '../../images/passport/'.$name.'.jpg');
  imageDestroy(ToolsDrawingSwitcher::$i);

 

function frontal (){
global $ds, $ps, $tds, $scheme, $PS, $y1;
//global $current, $handle, $board, $fix, $ip54, $moment, $length;



  ToolsDrawingSwitcher::$X0 = 5;//горизонтальная координата нулевой точки
 ToolsDrawingSwitcher::$Y0 = $y1;//вертикальная координата нулевой точки

 ToolsDrawingSwitcher::$X = ToolsDrawingSwitcher::$X0;//горизонтальная координата базовой точки
 ToolsDrawingSwitcher::$Y = ToolsDrawingSwitcher::$Y0;//вертикальная координата базовой точки
 
  ToolsDrawingSwitcher::$color = imageColorAllocate(ToolsDrawingSwitcher::$i, 0, 0, 0); 

//imageTtfText(ToolsDrawingSwitcher::$i, 15, 0, 0, 800,ToolsDrawingSwitcher::$color,"../../fonts/arial.ttf", $handle);  
//imageTtfText(ToolsDrawingSwitcher::$i, 15, 0, 0, 880,ToolsDrawingSwitcher::$color,"../../fonts/arial.ttf", $PS["logicerror"]);  
//imageTtfText(ToolsDrawingSwitcher::$i, 15, 0, 0, 880,ToolsDrawingSwitcher::$color,"../../fonts/arial.ttf", $PS["syntaxerror"]);  
//imageTtfText(ToolsDrawingSwitcher::$i, 15, 0, 100, 800,ToolsDrawingSwitcher::$color,"../../fonts/arial.ttf", $fix);  

  //Вычерчивание ручки
  if($PS["handle"] == 'black' || $PS["handle"] == 'red')  $ds->handle($PS);//обычная ручка
  else if($PS["handle"] == 'key')  $ds->handleK(PS);//ключ
  else if($PS["handle"] == 't')  $ds->handleT($PS);//рукоятка
  else $ds->handleU($PS);//желто-красная ручка
   //Вычерчивание таблички
   if($PS["board"] == 1) $ds->board($PS);//табличка
   //Вычерчивание скобы крепления таблички для исполнений L, O
   if(($PS["fix"] == 'L' || $PS["fix"] == 'O') && $PS["board"] == 1) $ds->adapter($PS);//скоба
   ToolsDrawingSwitcher::$color = imageColorAllocate(ToolsDrawingSwitcher::$i, 0, 0, 0); 
//imageTtfText(ToolsDrawingSwitcher::$i, 15, 0, 0, 850,ToolsDrawingSwitcher::$color,"../../fonts/arial.ttf", "X=".ToolsDrawingSwitcher::$X);  
  
   //Вычерчивание коробки
	if($PS["fix"] == 'P') {$ds->box($PS); return;}//коробка
	//Вычерчивание блокируемой ручки
	if($PS["fix"] == 'B') $ds->block_handle($PS);
	//Вычерчивание уплотнительного блока
	if($PS["ip54"] == 1) $ds->ip54($PS);
	//Вычерчивание задней крышки для исполнений B, O, L
	if($PS["fix"] == 'B' || $PS["fix"] == 'O' || $PS["fix"] == 'L') $ds->back_cover($PS, 'BOL');
	else{
	//Вычерчивание механизма самовозврата для всех исполнений, кроме B, O, L
	if($PS["moment"] == 1) $ds->moment(PS);
	//Вычерчивание аретационной камеры для всех исполнений, кроме B, O, L
	$ds->camera($PS);
	}
	//Вычерчивание галет
	for($j = 0; $j < $PS["qdesk"]; $j++) 
		$ds->desc($PS);
	//Вычерчивание задней крышки для всех исполнений, кроме B, O, L
	if($PS["fix"] != 'B' && $PS["fix"] != 'O' && $PS["fix"] != 'L') 	$ds->back_cover($PS, ''); 
	else{
	//Вычерчивание аретационной камеры для исполнений B, O, L
	$ds->camera($PS);
	//Вычерчивание механизма самовозврата для  исполнений O, L
	if($PS["moment"] == 1) $ds->moment(PS);
	//Вычерчивание пластины крепления на монтажную панель для исполнения B
	if($PS["fix"] == 'B') $ds->fix_mounting_panel($PS);
	//Вычерчивание пластины крепления на монтажную панель для исполнения O
	else if($PS["fix"] == 'O') $ds->fix_mounting_panel($PS);
	//Вычерчивание механизма крепления на din-рейку для исполнения L
	else $ds->din($PS);
	}
	$x0 = (ToolsDrawingSwitcher::$X0 - ToolsDrawingSwitcher::$X) / SCALE;
	//$tds->axis_line(-5+$x0, 0, 0 ,0);//осевая линия
}	

 ?>