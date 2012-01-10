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
<p>A php library for the utilization of the Powerhouse Museum API.</p> 

<code class="php">
<?php
$code = <<<'eod'
<?php
    
$f = new phpPHM("--PUT YOUR PHM API KEY HERE--");

$result = $f->multimedia('11032');

print_r($result);

?>
eod;
echo highlight_string($code);?>
</code>

</body>
</html>