<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Поиск схем кулачковых переключателей</title>
<meta http-equiv="Content-type" content="text/html; charset=utf8"/>
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<meta name="Author" content="Дмитрий Коржов" />
<link href="/images/icon1.ico" rel="shortcut icon" type="image/x-icon" />
<link  rel="stylesheet" type="text/css" href="/styles/styles.css" />
<script type="text/javascript" src="../../lib/wz_jsgraphics.js"></script>
<script type="text/javascript" src="../../lib/jquery-1.5.1.js"></script>
</head>
  
<body>
  <?php require_once "../../blocks/header.html";?>
 <div id = "content" >
  <?php require_once "../../blocks/left_panel.html";?>
   <div id = "main_content">
	<h1>Поиск схем кулачковых переключателей</h1>
<center>
	<table class ='indiag' style = 'table-layout: auto;' border=0 cellspacing=10 cellpadding=0 width='auto' height=auto>
		<tr>
			<td colspan = "2">
				<p>Введите диаграмму замыканий.</p>
			</td>
		</tr>
			<td>
			</td>
			<td width='20%'>
				<form name = 'form2' action="#" method="GET">
				<input type = "button" name = "start" value = "Поиск" onClick = "search_Scheme();" >
				</form>
		</td>
		<tr>
			<td>
				
			
 
 <script type='text/javascript'>

 
 var qp = <?php echo $_GET['qpos']; ?>;
 var qc = <?php echo $_GET['qcont']; ?>;
var square_dim = 40;
var cD = new Array(24);
 for (i=0; i<qp; i++)
  cD[i]= new Array(12);
 for (j=0; j<qc; j++)
   for (i=0; i<qp; i++)
    cD[i][j] = 'o';
	
document.write("<table class ='indiag' style = 'table-layout: auto;' border=1 cellspacing=0 cellpadding=0 width=auto height=auto>");
document.write("<tr><th colspan='"+(i+3)+"'>Нумерация</th></tr>");
document.write("<tr><th colspan='3' rowspan='2'>контактов</th><th colspan="+i+">положений</th></tr><tr>");
document.write("");

 for(var i=0;i<qp;i++)
  document.write("<th>"+(i+1)+"</th>");
   document.write("</tr>");

for(var j=0;j<qc;j++) {

 document.write("<tr style='background: #fff;'><th width='30'>"+(2*j+1)+"</th><th><img src='contact.GIF'/></th><th width='30'>"+(2*j+2)+"</th>");
 for(var i=0;i<qp;i++) {
  
   document.write("<td><a href='javascript:clicked("+i+","+j+")'>");
  document.write("<img src='icprobel.GIF' width="+square_dim+" height="+square_dim +" name='space"+i+""+j+"' border=0></a></td>");
  
 }
 document.write("</tr>");
}
document.write("</table><br>");	
   
 function clicked(i,j) {
   if (cD[i][j] == 'o')
   {  
   cD[i][j] = 'x';
  document.images["space"+i+""+j].src = "ickrest.GIF";
   }
   else
   {
   cD[i][j] = 'o';
   document.images["space"+i+""+j].src = "icprobel.GIF";
   }
 }  


			
function search_Scheme(){
//Преобразование XXX в X---X
			
	for (j=0; j<qc; j++)
		for (i=0; i<qp; i++){
				if((i==0) && (cD[i][j] =="x") && (cD[i+1][j] =="x")) {cD[i][j] = "u"; continue;}
				if((i==qp-1) && (cD[i][j] =="x") && ((cD[i-1][j] =="u") || (cD[i-1][j] =="w"))) {cD[i][j] = "v";continue;}
					if((i>0) && (i<qp-1)){
				if((cD[i][j] =="x") && (cD[i+1][j] =="x")  && (cD[i-1][j] =="o")) {cD[i][j] = "u";continue;}
				if((cD[i][j] =="x") && (cD[i+1][j] =="x")  && ((cD[i-1][j] =="u")|| (cD[i-1][j] =="w"))) {cD[i][j] = "w";continue;}
				if((cD[i][j] =="x") && (cD[i+1][j] =="o")  && ((cD[i-1][j] =="u")|| (cD[i-1][j] =="w"))) cD[i][j] = "v";
				}
		}
var closDiag = "";
	for (j=0; j<qc; j++)
		for (i=0; i<qp; i++)
			closDiag += cD[i][j];

$.get(
  "/pages/search_scheme/get_request.php",
  {
    closDiag: closDiag,
    qP: qp,
	qC: qc
  },
  onAjaxSuccess
);
} 
function onAjaxSuccess(data)
{
  // Здесь мы получаем данные, отправленные сервером и выводим их на экран.
 // alert(data);

  document.location = "../search_scheme/found_scheme.php?"+data;
}
//document.cookie = "new=5";
 //alert(document.cookie);
</script>
	</td>
  </tr>
 </table>
</center> 
 
 
 </div>
 </div>
 <div class="clear"></div>
 
<?php require_once "../../blocks/footer.html";?>
 
</body>
</html>
 