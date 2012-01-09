<?php

switch ($_GET['id']){
	case 'shop' : 
		header("location: http://www.powerhousemuseum.com/shop/");
	break;
	
	case 'design' : 
	header("Location: http://www.designawards.com.au/");
	break;
	
	case 'watt' : 
	header("Location: listLoc.php?loc=Boulton");
	break;
	
	case 'clock' : 
	header("Location: listLoc.php?loc=Strasburg");
	break;
	
	case 'kites' : 
	header("Location: listLoc.php?loc=Hargrave");
	break;
	
	case 'locomotive' : 
		header("Location: listLoc.php?loc=Locomotive");
	break;
	
	case 'harry' : 
		header("Location: http://www.powerhousemuseum.com/harrypotter/");
	break;
	
	case 'lounge' : 
		header("Location: http://www.powerhousemuseum.com/members/");	
	break;

	default:
	
	break;
}
?>