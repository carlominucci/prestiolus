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
$query="select * from prestiolus;";
$results = $db->query($query);
while ($roba = $results->fetchArray()){
   	echo $roba['description'];
}
?>
	</tr>
		<form method="post" action="add.php">
		<td><input type="text" name="description" /></td>
		<td><input type="text" name="name" /></td>
		<td><input type="image" src="out.png" /></td>
		<td></td>
		</form>
	</tr>
</body>
</html>
