<!DOCTYPE html>
<html>
<head>
	<title>Prestiolus</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table>
	<tr>
		<th>Descrizione</th>
		<th>Nome</th>
		<th>Data uscita</th>
		<th>Data rientro</th>
	</tr>
<?php
$db = new SQLite3('prestiolus.db');
$query="SELECT * FROM prestiti";
$results = $db->query($query);
while ($roba = $results->fetchArray()){
   	echo $roba['description'];
}
?>
	</tr>
		<td><input type="text" name="description" /></td>
		<td><input type="text" name="name" /></td>
		<td><img src="out.png" alt="out" /></td>
		<td></td>
	</tr>
</body>
</html>
