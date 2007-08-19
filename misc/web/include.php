<?php


// Creates the header for the user pages -------------------------------------------------------------------------------------------------------------
function insertHeader($page, $title) {

$lastmod = date("m/d/Y",filemtime(basename($_SERVER['PHP_SELF'])));

$text = <<<XOT

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--

          This webdesign was based on;
	terrafirma1.0 by nodethirtythree design
	http://www.nodethirtythree.com

	(It was later modifed by me (mikael(at)hvidtfeldts.net) )
-->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head >
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<title>Structure Synth</title>
<meta name="keywords" content="Generative Art, Structure Synth, 3D art, structure synthesis, povray, CFDG, Context Free," />
<meta name="description" content="Structure Synth is a tool for creating 3D structures from a set of user specified rules." />
<link rel="stylesheet" type="text/css" href="default.css" />

<script type="text/javascript">
    var GB_ROOT_DIR = "greybox/";
</script>

<script type="text/javascript" src="greybox/AJS.js"></script>
<script type="text/javascript" src="greybox/AJS_fx.js"></script>

<script type="text/javascript" src="greybox/gb_scripts.js"></script>
<link href="greybox/gb_styles.css" rel="stylesheet" type="text/css" />



</head>
<body>

<div id="outer">

	<div id="upbg"></div>

	<div id="inner">

		
		<div id="splash"></div>
	
		<div id="menu">
			<ul>
				<li class="first"><a href="index.php">Home</a></li>
				<li><a href="download.php">Download</a></li>
				<li><a href="reference.php">Reference</a></li>
				<li><a href="development.php">Development</a></li>
			</ul>

		<div id="date">updated $lastmod</div>
		</div>
	

		<div id="primarycontent">
		
			<!-- primary content start -->

XOT;

echo $text;
};

function insertFooter() {


$text = <<<ZOT

	
			<!-- secondary content end -->

		</div>
	
		<div id="footer">
		
			Structure Synth 2007. Web pages based on a design by <a href="http://www.nodethirtythree.com/">NodeThirtyThree</a>.
		
		</div>

	</div>

</div>

</body>
</html>

ZOT;
echo $text;
};

?>