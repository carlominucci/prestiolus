<?php
if(isset($_POST['description']) && isset($_POST['name'])){
	$description=addslashes(strip_tags($_POST['description']));
	$name=addslashes(strip_tags($_POST['name']));
	$query="INSERT INTO prestiolus (description, name, dateout) VALUES(\"$description\", \"$name\", datetime());";
}
echo $query;
$db = new SQLite3('prestiolus.db');
$db->querySingle($query);
header('Location: index.php');
?>
