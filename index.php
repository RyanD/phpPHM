<?php
require_once("phpPHM.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
	<title>phpPHM</title>
	<style type="text/css">
	p, h1 { font-family: Helvetica, Arial; }
	body { background: #dddddd; }
	code { white-space: pre; }
	</style>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>
<h1>phpPHM</h1>
<p>A php library for utilisation of the Powerhouse Museum API.</p> 

<code class="php">
<?php
$f = new phpPHM("dbaa8bf15aceb9c");

$result = $f->multimedia('11032');

print_r($result);

?>
</code>

</body>
</html>