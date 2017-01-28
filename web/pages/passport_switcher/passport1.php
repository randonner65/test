<?php
header("HTTP/1.1 301 Moved Permanently");
header("Location: /switcher/".$_GET['name_switcher']);
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$propswitcher = new PropertiesSwitcher();//создание объекта класса PropertiesSwitcher
$errors = new Errors();//создание объекта класса Errors
$name_switcher = str_replace(" ", "+", mb_strtoupper($_GET['name_switcher'], "UTF-8"));//перевод в верхний регистр, замена пробелов на +
$propswitch = $propswitcher->getPropSwitch($name_switcher);
//print_r($propswitch); //exit();
$errors->write('syntax', $propswitch['syntaxerror']);//запись в БД синтаксической ошибки
if($propswitch['syntaxerror'] != ""){
 header( 'Location: passport.php?name='.$name_switcher.'&namestyle='.$propswitch['nameswitchstyle'], true, 303 );
 exit();
}
else 
$errors->write('logic', $propswitch['logicerror']);//запись в БД логической ошибки
if($propswitch['logicerror'] != ""){

 header( 'Location: passport.php?name='.$name_switcher.'&namestyle='.$propswitch['nameswitchstyle'], true, 303 );
}

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Переключатель <?= $name_switcher?></title>
<meta http-equiv="Content-type" content="text/html; charset=utf8"/>
<meta name="Keywords" content="<?='Переключатель '.$name_switcher ?>" />
<meta name="Description" content="<?='Паспорт переключателя '.$name_switcher ?>" />
<meta name="Author" content="Дмитрий Коржов" />
<link href="/images/icon1.ico" rel="shortcut icon" type="image/x-icon" />
<link  rel="stylesheet" type="text/css" href="/styles/styles.css" />
</head>
  
<body>
  <?php require_once "../../blocks/header.html";?>
 <div id = "content" >
  <?php require_once "../../blocks/left_panel.html";?>
   <div id = "main_content">
	<br><center><form name = "pdf_file" action = "passport_print.php?name_switcher=<?= $name_switcher?>"  method = "get">
		<input type = "hidden" name = "name_switcher" value = "<?= $name_switcher?>" />
		<input type = "submit" value = "Скачать PDF - файл" />
	</form></center>
	<h1>Переключатель <?=$name_switcher?></h1>
<h3>1 Общие сведения об изделии</h3>
<p>Переключатель <b><?=$name_switcher ?></b> (далее по тексту переключатель)  предназначен для коммутации электрических цепей постоянного и переменного тока.</p>
 <p>Переключатель соответствует: 
ТУ У 31.2-32676972-001:2005, EN 947-3, (EN 60 947-3,
IEC 60 947-3), EN 60 204-1, VDE 0660.</p><p>
Все зажимы и соединения защищены от прямого соприкосновения (IP 21).</p>
<p>Переключатель имеет <?=$propswitch[handleText].$propswitch[boardText] ?>.</p>
 <p><?=$propswitch[ip54Text]?></p>	
 <p>Переключатель <?=$propswitch[fixText]?>.</p>	
 <p>Количество положений ручки - <?=$propswitch[qpos]?>.</p>	
 <p>Количество контактных групп - <?=$propswitch[qcont]?>.</p>
 <p>Угол поворота ручки - <?=360/$propswitch[angle]?> градусов.</p>
 <p><?=$propswitch[momentText]?></p>

<h3>2 Технические характеристики переключателя</h3>
<img src="drawing_technical_characteristics.php?name_switcher=<?=$name_switcher ?>" alt="<?='Переключатель '.$name_switcher ?>" width="0%"/>

<table  class="propswitch" width="auto" border="0" align="lкеeft" cellpadding="4" cellspacing="0" style="background:  #C4DFF0; " >
<tr><td width="60%">Номинальное рабочее напряжение, В, не более</td><td><?=$propswitch[operating_voltage]?></td></tr>
<tr><td>Электрическая прочность изоляции, В, не менее</td><td>2500</td></tr>
<tr><td>Сопротивление изоляции, МОм, не менее</td><td>50</td></tr>
<tr><td>Сопротивление контактов на стадии поставки, Ом, не более</td><td>0,5</td></tr>
<tr><td>Номинальный переменный ток для активной и слабоиндуктивной нагрузки, А, не более</td><td><?=$propswitch[current]?></td></tr>
<tr><td>Номинальный переменный ток для асинхронных однофазных электродвигателей (220-240В) при запуске / отключении по ходу, А, не более</td><td><?=$propswitch[motor_current_1_phase_220V][$propswitch[current]]?></td></tr>
<tr><td>Номинальный переменный ток для асинхронных трехфазных электродвигателей (220-240В) при запуске / отключении по ходу, А, не более</td><td><?=$propswitch[motor_current_3_phase_220V][$propswitch[current]]?></td></tr>
<tr><td>Номинальный переменный ток для асинхронных трехфазных электродвигателей (380-400В) при запуске / отключении по ходу, А, не более</td><td><?=$propswitch[motor_current_3_phase_380V][$propswitch[current]]?></td></tr>
<tr><td>Номинальный переменный ток для асинхронных трехфазных электродвигателей (500В) при запуске / отключении по ходу, А, не более</td><td><?=$propswitch[motor_current_3_phase_500V][$propswitch[current]]?></td></tr>
<?php if($propswitch[current] == 10)
echo "<tr><td>Номинальный постоянный ток (6В), А, не более</td><td>".$propswitch[DC_6V][$propswitch[current]]."</td></tr>"?>
<tr><td>Номинальный постоянный ток (24В), А, не более</td><td><?=$propswitch[DC_24V][$propswitch[current]]?></td></tr>
<tr><td>Номинальный постоянный ток (48В), А, не более</td><td><?=$propswitch[DC_48V][$propswitch[current]]?></td></tr>
<tr><td>Номинальный постоянный ток (110В), А, не более</td><td><?=$propswitch[DC_110V][$propswitch[current]]?></td></tr>
<tr><td>Номинальный постоянный ток (220В) при активной нагрузке, А, не более</td><td><?=$propswitch[DC_220V_resistive_load][$propswitch[current]]?></td></tr>
<tr><td>Номинальный постоянный ток (220В) для электродвигателей, А, не более</td><td><?=$propswitch[DC_220V_electric_motors][$propswitch[current]]?></td></tr>
<tr><td>Номинальный кратковременный ток (<=1c), А, не более</td><td><?=$propswitch[short_time_current][$propswitch[current]]?></td></tr>
<tr><td>Износостойкость механическая, переключений, не менее</td><td><?=$propswitch[mechanical_wear_resistance][$propswitch[current]]?></td></tr>
<tr><td>Износостойкость при максимальной нагрузке, переключений, не менее</td><td><?=$propswitch[wear_resistance_at_maximum_load][$propswitch[current]]?></td></tr>
<tr><td>Сечение подключаемых проводников, кв. мм.</td><td><?=$propswitch[wire_size][$propswitch[current]]?></td></tr>



</table></br>	
<h3>3 Общий вид, габаритные и присоединительные размеры переключателя</h3></br>
<img src="drawing_switcher.php?name=<?=$name_switcher ?>" alt="<?='Переключатель '.$name_switcher ?>" width="100%"/></br>
<h4>Разметка крепежных отверстий</h4></br>
<img src="drawing_fix_holes.php?name=<?=$name_switcher ?>" alt="<?='Переключатель '.$name_switcher ?>" height="300"/></br>
<h3>4 Схема переключателя</h3>

<img style="margin-left: 5px; margin-top: 5px; " src="../blocks/outscheme.php?number=<?=$propswitch[number] ?>" alt="схема переключателя <?=$propswitch[number] ?>"></br>
<h4>Условные обозначения</h4>
<img style="margin-left: 5px; margin-top: 5px; " src="../blocks/outmaplegend.php?number=<?=$propswitch[number] ?>" alt="Условные обозначения">
<h3>5 Комплектность</h3></br>
<table  class="propswitch" width="auto" border="1" align="lкеeft" cellpadding="4" cellspacing="0" style="background:  #C4DFF0; " >
<tr><td>№п/п</td><td width="60%" align="center">Наименование</td><td>Количество, шт.</td></tr>
<tr><td align="center">1</td><td>Переключатель <?= $name_switcher?></td><td align="center">1</td></tr>
<tr><td align="center">2</td><td>Паспорт ЧПХР.642310.001 ПС</td><td align="center">1</td></tr>

</table></br>	
<h3>6 Гарантии изготовителя</h3></br>
<p>Изготовитель гарантирует соответствие переключателя требованиям ТУ У 31.2-32676972-001:2005 при соблюдении потребителем условий эксплуатации, транспортирования, хранения и монтажа.
</br> Гарантийный срок 3 года (исчисляется с даты отгрузки). </p><p>
ИЗГОТОВИТЕЛЬ: ЧП «Харьковреле» </p><p>
61009 Украина, г. Харьков,
 ул. Достоевского, 13
 </p>
 </div>
 </div>
 <div class="clear"></div>
 
<?php require_once "../../blocks/footer.html";?>
 
</body>
</html>