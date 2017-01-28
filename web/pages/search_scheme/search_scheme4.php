 //<script type='text/javascript'>
;
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
  "/pages/found_scheme/get_request.php",
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
if (data == "number0=")   document.location = "../found_scheme/not_found.php";//если схемы не найдены
else
  document.location = "../found_scheme/found_scheme.php?"+data;
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