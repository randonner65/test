<?php
$name = $_GET['number'];
?>
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

 </table>




