<!DOCTYPE html>
<html>
<head>
	<title>Prestiolus</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="titolo">
		Gestione Prestiti
	</div>
<table class="tabella">
	<tr>
		<th>Descrizione</th>
		<th>Nome</th>
		<th>Data uscita</th>
		<th>Data rientro</th>
	</tr>
<?php
$db = new SQLite3('prestiolus.db');
$query="select * from prestiolus;";
$results = $db->query($query);
while ($roba = $results->fetchArray()){
   	echo "<tr><td>";
   	echo $roba['description'];
   	echo "</td><td>";
   	echo $roba['name'];
   	echo "</td><td>";
   	echo $roba['dateout'];
   	echo "</td><td>";
   	if($roba['datereturn'] == ""){
   		echo "<a href=\"back.php?id=" . $roba['id'] . "\"><img src=\"back.png\" alt=\"Come Back\" /></a>";
   	}else{
   		echo $roba['datereturn'];
   	}
   	echo "</td></tr>";
}
?>
	</tr>
		<form method="post" action="add.php">
		<td><textarea name="description" rows="3" cols="30"></textarea></td>
		<td><input type=text name="name" /></td>
		<td><input type="image" src="out.png" /></td>
		<td></td>
		</form>
	</tr>
</body>
</html>
