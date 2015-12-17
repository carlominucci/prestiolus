<?php
if(isset($_GET['id'])){
	$description=addslashes(strip_tags($_POST['description']));
	$name=addslashes(strip_tags($_POST['name']));
	$query="DELETE FROM prestiolus WHERE id = '" . $_GET['id'] . "';";
}
echo $query;
$db = new SQLite3('prestiolus.db');
$db->querySingle($query);
header('Location: index.php');
?>
