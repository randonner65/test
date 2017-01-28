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
<script type="text/javascript" src="wz_jsgraphics.js"></script>
</head>
  
<body>
  <?php require_once "../../blocks/header.html";?>
 <div id = "content" >
  <?php require_once "../../blocks/left_panel.html";?>
   <div id = "main_content">
	<h1>Поиск схем кулачковых переключателей</h1>
 <p>Для поиска схемы переключателя введите <b>количество положений</b> и <b>количество контактных групп</b> переключателя.</p>

 <script type='text/javascript'>

 
 var qp = 12;
 var qc = 0;
var square_dim = 21;
var circuitDiagram = new Array(24);
 for (i=0; i<qp; i++)
  circuitDiagram[i]= new Array(12);
 for (j=0; j<24; j++)
   for (i=0; i<qp; i++)
    circuitDiagram[i][j] = 'o';
	
document.write("<table border=0 cellspacing=0 cellpadding=0 width="+(square_dim*qp+35)
 +"<tr><td><img src='black.gif' width="+(square_dim*qp+35)
 +" height=4><br></td></tr>");
for(var j=0;j<24;j++) {
 document.write("<tr><td><img src='black.gif' width=4 height="+square_dim+">");
 for(var i=0;i<qp;i++) {
  
   document.write("<a href='javascript:clicked("+i+","+j+")'>");
  document.write("<img src='");
  document.write("icprobel.GIF");

  document.write("' width="+square_dim+" height="+square_dim
   +" name='space"+i+""+j+"' border=1>");
  document.write("</a>");
 }
 document.write("<img src='black.gif' width=4 height="+square_dim+"></td></tr>");
}
document.write("<tr><td><img src='black.gif' width="+(square_dim*qp+35)
 +" height=4><br></td></tr></table><br>");	
   
 function clicked(i,j) {
   if (circuitDiagram[i][j] == 'o')
   {  
   circuitDiagram[i][j] = 'x';
  document.images["space"+i+""+j].src = "ickrest.GIF";
   }
   else
   {
   circuitDiagram[i][j] = 'o';
   document.images["space"+i+""+j].src = "icprobel.GIF";
   }
 }  
 
 
</script>
 
 
 
 
 </div>
 </div>
 <div class="clear"></div>
 
<?php require_once "../../blocks/footer.html";?>
 
</body>
</html>