<?php
$query = "UPDATE prestiolus SET datereturn = datetime() WHERE id = '" . $_GET['id'] ."';";
//update prestiolus set datereturn = datetime() where id = '4';
$db = new SQLite3('prestiolus.db');
$db->querySingle($query);
header('Location: index.php');
?>
