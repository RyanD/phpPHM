<?php
require_once("phpPHM.php");
$f = new phpPHM("dbaa8bf15aceb9c");
$id = intval($_POST['id']);

$result = $f->multimedia($id);

header("location: $result->flickr_url");
?>