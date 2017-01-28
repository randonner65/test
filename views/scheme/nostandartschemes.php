<?php
//$mysqli = new mysqli('localhost', 'root', '', 'switchers');
require_once "/config.php";
$mysqli = new mysqli(HOST, USER, PASSWORD, DB);
$mysqli->query("SET NAMES 'UTF8'");
if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();
  }
  $result_set = $mysqli->query('SELECT name FROM _schemas WHERE att LIKE "_r%r"');
  $names_schemes = array();
   $i=0;
  while ($row = $result_set->fetch_assoc()) {

    $names_schemes[$i] = $row;
	$i++;
  }

  $result_set->close();
  $mysqli->close();//отключение от базы данных

?>
	<tr>
<?php	
	for ($i=0; $i<count($names_schemes);$i++){
 if(($i % 11 == 0) && ($i != 0)) echo("</tr><tr>");
	echo("<td><a href = '");echo($names_schemes[$i][name]);echo("' title = 'схема ");
	echo($names_schemes[$i][name]);echo("'>");echo($names_schemes[$i][name]);echo("</a></td>");
	 
	}

	if(($i % 11 == 0) && ($i != 0)) echo("</tr><tr>");

?>
	</tr>

		
