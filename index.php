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
<table>
	<tr>
		<th>Descrizione</th>
		<th>Nome</th>
		<th>Data uscita</th>
		<th>Data rientro</th>
	</tr>
<?php
$db = new SQLite3('prestiolus.db');
$query="SELECT * FROM prestiolus WHERE datereturn IS NULL ORDER BY dateout ASC;";
$results = $db->query($query);
while ($roba = $results->fetchArray()){
   	echo "<tr class=\"out\"><td>";
   	echo $roba['description'];
   	echo "</td><td>";
   	echo $roba['name'];
   	echo "</td><td>";
   	echo $roba['dateout'];
   	echo "</td><td>";
   echo "<a href=\"back.php?id=" . $roba['id'] . "\"><img src=\"back.png\" alt=\"Come Back\" /></a>";
   	echo "</td></tr>";
}
$query="SELECT * FROM prestiolus WHERE datereturn IS NOT NULL ORDER BY dateout ASC;";
$results = $db->query($query);
while ($roba = $results->fetchArray()){
   	echo "<tr><td>";
   	echo $roba['description'];
   	echo "</td><td>";
   	echo $roba['name'];
   	echo "</td><td>";
   	echo $roba['dateout'];
   	echo "</td><td>";
   	echo $roba['datereturn'];
   	echo "</td></tr>";
}
?>
	</tr>
		<form method="post" action="add.php">
		<td><textarea name="description" rows="3" cols="30"></textarea></td>
		<td><input type=text name="name" /></td>
		<td><input type="image" src="out.png" /></td>
		<td>&nbsp;</td>
		</form>
	</tr>
</body>
</html>
