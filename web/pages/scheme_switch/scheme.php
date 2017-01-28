<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Схема <?=str_replace(" ", "+", $_GET['number'])?></title>
 <meta http-equiv="Content-type" content="text/html; charset=utf8"/>
<meta name="Keywords" content="Харьковреле, sez krompachy, переключатель, схема переключателя, диаграмма замыканий переключателя, продажа переключателей" />
<meta name="Description" content="Харьковреле, sez krompachy, переключатель, замыкающие положения переключателя, перемычки переключателя, продажа переключателей" /> 
<link href="/images/icon1.ico" rel="shortcut icon" type="image/x-icon" />
<link  rel="stylesheet" type="text/css" href="/styles/styles.css" />
</head>

<body style="background:#fff;">
	<div style="margin-left: 150px;">
<p style="font-size:200%; margin-left: 100; ">Схема <?=$_GET['number'];?></p>
	</div>
<img  style = "margin-left: 5px; margin-top: 5px; " src = "../blocks/outscheme.php?number=<?= $_GET['number'];?>" alt = "схема переключателя" />
</body>
</html> 
