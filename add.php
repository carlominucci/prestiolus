<?php
$db = new SQLite3('prestiolus.db');
if(isset($_POST['description']) && isset($_POST['name'])){
	$description=addslashes(strip_tags($_POST['description']));
	$name=addslashes(strip_tags($_POST['name']));
	$query="INSERT INTO prestiolus (description, name, dateout) VALUES(\"$description\", \"$name\", datetime())";
}
echo $query;
$db->querySingle($query);
?>

CREATE TABLE prestiti (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT, description TEXT, dateout DATETIME, datereturn DATETIME);
