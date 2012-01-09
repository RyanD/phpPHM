<!DOCTYPE html>
<html>
<head>
	<title>phm Location</title>
	<meta name="generator" content="BBEdit 9.6" />
</head>
<body style="font-family: helvetica; arial;"> 
<?php
require_once("phpPHM.php");
$f = new phpPHM("dbaa8bf15aceb9c");
$loc = $_GET['loc'];

$args['display_location'] = $loc;
$result = $f->items($args);

echo "<h1>" . $loc . " <small>(<a href='Map.html'>Back to Map</a>)</small></h1>";

foreach ($result as $r){
	if (isset($r->thumbnail->url)){
		$thumb = "<img src='".$r->thumbnail->url."'>";
	} else {
		$thumb = '';
	}
	
	if (!isset($r->title)){
		$title = $r->summary;
	} else {
		$title = $r->title;
	}
	$desc = $r->description;
	$attr = $r->acquisition_credit_line;
	?>
	<div style="background: #dddddd; padding: 5px; height: 190px; margin: 10px;">
	<div style="float: left; margin-right: 10px;">
	<?php echo $thumb; ?>
	</div>
	
	<h2 style="margin: 2px;"><?php echo $title; ?></h2>
	<p style="font-size: 11px;"><?php echo $desc; ?></p>
	<p><strong><?php echo $attr; ?></strong></p>
	</div>
	<div style="clear: both;"> </div>
<?php }?>
</body>
</html>