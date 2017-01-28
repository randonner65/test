<?php
function __autoload($class_name) {require_once "../../classes/".$class_name.".php"; }//автоподключение нужного класса
$propswitcher = new PropertiesSwitcher();//создание объекта класса PropertiesSwitcher
$errors = new Errors();//создание объекта класса Errors
$name_switcher = mb_strtoupper(str_replace(" ", "+", $_GET['name_switcher']), "UTF-8");//перевод в верхний регистр;
$propswitch = $propswitcher->getPropSwitch($name_switcher);

ob_start(); // Начинаем сохрание выходных данных в буфер
    include ("passport_print.tpl"); // Отправляем в буфер содержимое файла
    $html = ob_get_clean(); // Очищаем буфер и возвращаем содержимое
	$html = str_replace(
		array(
			"%name_switcher%",
			"%propswitch[handleText]%",
			"%propswitch[boardText]%",
			"%propswitch[ip54Text]%",
			"%propswitch[fixText]%",
			"%propswitch[qpos]%",
			"%propswitch[qcont]%",
			"%360/propswitch[angle]%",
			"%propswitch[momentText]%",
			"%propswitch[operating_voltage]%",
			"%propswitch[current]%",
			"%propswitch[motor_current_1_phase_220V][propswitch[current]]%",
			"%propswitch[motor_current_3_phase_220V][propswitch[current]]%",
			"%propswitch[motor_current_3_phase_380V][propswitch[current]]%",
			"%propswitch[motor_current_3_phase_500V][propswitch[current]]%",
			"%propswitch[DC_6V][propswitch[current]]%",
			"%propswitch[DC_24V][propswitch[current]]%",
			"%propswitch[DC_48V][propswitch[current]]%",
			"%propswitch[DC_110V][propswitch[current]]%",
			"%propswitch[DC_220V_resistive_load][propswitch[current]]%",
			"%propswitch[DC_220V_electric_motors][propswitch[current]]%",
			"%propswitch[short_time_current][propswitch[current]]%",
			"%propswitch[mechanical_wear_resistance][propswitch[current]]%",
			"%propswitch[wear_resistance_at_maximum_load][propswitch[current]]%",
			"%propswitch[wire_size][propswitch[current]]%",
			"%propswitch[number]%",
			"%propswitch[qcont]%",
			"%propswitch[qcont]%",
			"%propswitch[qcont]%"
			),
    array (
			$name_switcher,
			$propswitch[handleText],
			$propswitch[boardText],
			$propswitch[ip54Text],
			$propswitch[fixText],
			$propswitch[qpos],
			$propswitch[qcont],
			360/$propswitch[angle],
			$propswitch[momentText],
			$propswitch[operating_voltage],
			$propswitch[current],
			$propswitch[motor_current_1_phase_220V][$propswitch[current]],
			$propswitch[motor_current_3_phase_220V][$propswitch[current]],
			$propswitch[motor_current_3_phase_380V][$propswitch[current]],
			$propswitch[motor_current_3_phase_500V][$propswitch[current]],
			$propswitch[DC_6V][$propswitch[current]],
			$propswitch[DC_24V][$propswitch[current]],
			$propswitch[DC_48V][$propswitch[current]],
			$propswitch[DC_110V][$propswitch[current]],
			$propswitch[DC_220V_resistive_load][$propswitch[current]],
			$propswitch[DC_220V_electric_motors][$propswitch[current]],
			$propswitch[short_time_current][$propswitch[current]],
			$propswitch[mechanical_wear_resistance][$propswitch[current]],
			$propswitch[wear_resistance_at_maximum_load][$propswitch[current]],
			$propswitch[wire_size][$propswitch[current]],
			$propswitch[number],
			$propswitch[qcont],
			$propswitch[qcont],
			$propswitch[qcont]
			),
    $html);
	include("MPDF57/mpdf.php");

//$mpdf=new mPDF('utf-8','A4', 12,'Helvetica',32,25,27,25,16);
$mpdf=new mPDF('utf-8','A4', 12,'Helvetica',10, 10, 7, 7, 10, 10);
$mpdf->allow_charset_conversion = true;
$mpdf->charset_in = 'utf-8';
$mpdf->SetDisplayMode('fullpage');
//$stylesheet = file_get_contents('../../styles/styles.css');
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->list_indent_first_level = 0;
$mpdf->WriteHTML($html, 2);
	if(file_exists($name_switcher.'.pdf')) unlink ($name_switcher.'.pdf');//удаление старого файла
	
$mpdf->Output($name_switcher.'.pdf', 'F');//запись PDF-файла
//Скачивание PDF-файла в папку загрузок посетителя сайта
  $content = file_get_contents($name_switcher.'.pdf');
  header('Content-Type: '.$ctype.'; charset=utf-8');
  header("Content-Disposition: attachment; filename=".$name_switcher.".pdf");
		if(file_exists($name_switcher.'.pdf')) unlink ($name_switcher.'.pdf');//удаление созданного файла

  ob_end_clean();
  ob_start();
  echo $content;
  ob_end_flush();
  //exit();

//echo $html;


 ?>
