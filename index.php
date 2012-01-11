<?php
require_once("phpPHM.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
	<title>phpPHM | A php library for the Powerhouse API!</title>
	<style type="text/css">
	p, h1 { font-family: Helvetica, Arial; }
        h1 {margin: 2px 0px;}
	body { background: #dddddd url('media/pineapplecut.png') repeat top left; }
	code { 
        white-space: pre; 
        margin: 10px;
        }
        div.sample {
        background: #eeeeee;
        padding: 10px;
        border: solid 1px #aaaaaa;
        }
        div#wrapper {
            position: relative;
            border: solid 1px #aaaaaa;
            background: #dddddd;
            width: 800px;
            padding: 10px;
            margin: 20px auto;
        }
        
        iframe#watchBTN {
            position: absolute;
            right: 30px;
            top: 30px;
        }
	</style>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        
</head>
<body>
    <div id="wrapper">
<h1>phpPHM</h1>

<iframe id="watchBTN" src="http://markdotto.github.com/github-buttons/github-btn.html?user=rpd9803&repo=phpPHM&type=follow&count=false"
  allowtransparency="true" frameborder="0" scrolling="0" width="120px" height="20px"></iframe>

<p>A php library for the Powerhouse Museum API.</p>
<p>To begin, register for a key by filling out a <a href="http://api.powerhousemuseum.com/register/">request form</a>.</p>
<p>To download the library, head on over to <a href="https://github.com/rpd9803/phpPHM">the github repository</a>.</p>

<div class='sample'>
<?php
$code = <<<'eod'
<?php
    
$f = new phpPHM("--PUT YOUR PHM API KEY HERE--");

$result = $f->multimedia('11032');

print_r($result);

?>
eod;
highlight_string($code);
?>
</div>
<p>phpPHM &copy; 2011 <a href="/">Ryan Donahue</a>.</p>
</div>
</body>
</html>