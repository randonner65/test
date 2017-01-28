<?php
function __autoload($class_name) {
if(file_exists("../classes/".$class_name.".php"))require_once "../classes/".$class_name.".php"; 
	else require_once "classes/".$class_name.".php"; 
}//автоподключение нужного класса
$name = str_replace(" ", "+", $name);
$scheme = new  Schemas($name);//создание объекта класса Schemas
$text = new  Text();//создание объекта класса Текст
$title = $scheme->read($name, "title");
	if($title == NULL){
		if(substr($name, 0, 2) == "11") $title = "Схема выключателя ". $name;
		else $title = "Схема ".$text->genphras_epithets_scheme($name)." переключателя ".$name;
		}
$keywords = $scheme->read($name, "keywords");  
	if(substr($name, 0, 2) == "11") $keywords = "Выключатель";
	else if($keywords == NULL) $keywords = "Схема кулачкового переключателя ". $name;
$description = $scheme->read($name, "description");
if(substr($name, 0, 2) == "11" && strlen($name) == 4) $numberDirections = $name - 1100;
if((int) $name > 2200 && (int) $name < 3000 && strlen($name) == 4) {
$numberDirections = (int) substr($name, 2, 2);//количество направлений
	if($numberDirections > 30 && $numberDirections < 50) $numberDirections -= 30;
	if($numberDirections > 50 && $numberDirections < 70) $numberDirections -= 50;
	if($numberDirections > 70 && $numberDirections < 90) $numberDirections -= 70;
}
if(isset($numberDirections)) $textNumberDirections = ", ".$numberDirections.$text->napravlenie($numberDirections);
if($description == NULL)	
$description = "Схема кулачкового переключателя на ".$scheme->qpos.$text->polozhenie($scheme->qpos).", ".
$scheme->qcont.$text->contgruppy($scheme->qcont)." ".$textNumberDirections.", ".$scheme->mark.", диаграмма замыканий контактов";
if($scheme->pmark == 1) $description .= ", маркировка";
else if($scheme->qjump > 0) $description .= ", перемычки";

	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?=$title?></title>
 <meta http-equiv="Content-type" content="text/html; charset=utf8"/>
<meta name="Keywords" content="<?=$keywords?>"/>
<meta name="Description" content="<?=$description?>"/> 
<link href="/images/icon1.ico" rel="shortcut icon" type="image/x-icon" />
<link  rel="stylesheet" type="text/css" href="/styles/styles.css" />
<!--[if IE ]>
		<link rel='stylesheet' href='/styles/ie.css' type='text/css' />
	<![endif]-->
</head>
  
<body>

  <?php require_once "blocks/header.html";?>
 <div id = "content" >
  <?php require_once "blocks/left_panel.html";?>
   <div id = "main_content">
	 <table  class="schema_title" width="70%" border="0" align="center" >
	<tr>
		<td colspan = "2">
			<h1 style = "text-align: left; margin-left: 150px;">Схема <?=$name?></h1>
		</td>
		<td align = "right">
			
			<div  style = "color: #300060; " ><h4>Введите номер схемы</h4>
		
			<form name = "form_serch" action = "../pages/scheme_switch/outpagescheme.php"  method = "get">
			   <input type = "text" name = "number" size="10"/>
			   <input type = "submit" value = "Просмотр" />
			</form>
		</div>	
		</td>
	</tr>
	<tr>
		<td>	

	<div id = "scheme" style = "margin-top: 0px; ">
 <img  style = "margin-left: 5px; margin-top: 5px; " src = "../pages/blocks/outscheme.php?number=<?=$name;?>" alt = "схема переключателя" />
			</td>
	<?php require_once "blocks/header.html";?>
			<td colspan = "2">
			<script type="text/javascript">
  function openImageWindow(src) {
    var image = new Image();
    image.src = src;
    var width = image.width;
    var height = image.height;
    window.open(src,"Image","width=" + width + ",height=" + height + ", left=100, top=200, directories=no");
  }
</script>
			<?php 
			
			
			if(file_exists("images/functional/".$name.".jpg"))	{
			echo("
				<h3>Рекомендуемая схема подключения</h3>
				<img  style = 'margin-left: 5px;' src = '/images/functional/".$name.".jpg' alt = 'схема включения переключателя' 
				height = '50%' onclick = 'openImageWindow(this.src);'/>;");
			}
			?>
			</td>
		</tr>
		<tr>
			<td colspan = "2">
				<h3>Условные обозначения</h3>
			</td>
		</tr>
		<tr>
			<td colspan = "3">
				<div id = "scheme" style = "margin-top: 0px; ">
				<img  style = "margin-left: 5px; margin-top: 5px; " src = "../pages/blocks/outmaplegend.php?number=<?php echo $name;?>" alt = "Условные обозначения" />
			</div>
			</td>
		</tr>
		<tr>
			
				
			<td colspan = "3">
				<div >
				<center><form name = "pdf_file" action = "scheme1.php?number=<?=$name?> " target = "_blank" method = "get">
		<input type = "hidden" name = "number" value = "<?=$name?>" />
		<input type = "submit" value = "Открыть схему в новой вкладке" />
	</form></center>
				</div>
			</td>
			
		</tr>
 </table>
 </div>
 </div>
 <div class="clear"></div>
  <?php require_once "blocks/footer.html";?>
 </div>
</body>
</html> 
