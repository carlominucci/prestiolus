<?php
/* config */
$debug = FALSE;
?>
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
		<th>Tempo di utilizzo</th>
	</tr>
	</tr>
		<form method="post" action="add.php">
		<td><textarea name="description" rows="3" cols="30"></textarea></td>
		<td><input type=text name="name" /></td>
		<td><input type="image" src="out.png" /></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		</form>
	</tr>
<?php
$db = new SQLite3('prestiolus.db');
$query="SELECT * FROM prestiolus WHERE datereturn IS NULL ORDER BY dateout ASC;";
$results = $db->query($query);
while ($roba = $results->fetchArray()){
   	echo "<tr class=\"out\"><td>";
	if($debug == TRUE){ echo "[<a href=\"del.php?id=" . $roba['id'] . "\">x</a>]"; }
   	echo "<b>" . $roba['description'];
   	echo "</b></td><td><b>";
   	echo $roba['name'];
   	echo "</b></td><td><b>";
   	echo $roba['dateout'];
   	echo "</b></td><td>";
   	echo "<a href=\"back.php?id=" . $roba['id'] . "\"><img src=\"back.png\" alt=\"Come Back\" /></a>";
	echo "</td><td>";
   	echo "</td></tr>";
}
$query="SELECT * FROM prestiolus WHERE datereturn IS NOT NULL ORDER BY dateout DESC;";
$results = $db->query($query);
while ($roba = $results->fetchArray()){
   	echo "<tr><td>";
	if($debug == TRUE ){ echo "[<a href=\"del.php?id=" . $roba['id'] . "\">x</a>] "; }
   	echo $roba['description'];
   	echo "</td><td>";
   	echo $roba['name'];
   	echo "</td><td>";
   	echo $roba['dateout'];
   	echo "</td><td>";
   	echo $roba['datereturn'];
	echo "</td><td>";
	$secondi = strtotime($roba['datereturn'])-strtotime($roba['dateout']);
        /* (86400 = 24h*60min*60sec) */
        $giorni = abs(intval($secondi / 86400));
	if($giorni > 0){ $secondi = $secondi - 86400;}
	$ore = abs(intval($secondi / 3600));
	if($ore > 0){ $secondi = $secondi - (3600 * $ore); }
	$minuti = abs(intval($secondi / 60));
	//if($ore > 0){ $minuti = $minuti - (60*$ore); }
	if($minuti > 0){ $secondi = $secondi - ($minuti*60);}
	echo $giorni . " giorni, ". $ore . " ore, " . $minuti . " minuti, " . $secondi . " secondi.";
   	echo "</td></tr>";
}
?>
</table>
</body>
</html>
