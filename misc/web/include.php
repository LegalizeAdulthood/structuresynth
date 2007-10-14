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

<script type="text/javascript" src="_inc/swfobject.js"></script>

<script type="text/javascript">

/***********************************************
* Cool DHTML tooltip script II- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var offsetfromcursorX=12 //Customize x offset of tooltip
var offsetfromcursorY=10 //Customize y offset of tooltip

var offsetdivfrompointerX=10 //Customize x offset of tooltip DIV relative to pointer image
var offsetdivfrompointerY=14 //Customize y offset of tooltip DIV relative to pointer image. Tip: Set it to (height_of_pointer_image-1).

document.write('<div id="dhtmltooltip"></div>') //write out tooltip DIV
document.write('<img id="dhtmlpointer" src="arrow2.gif">') //write out pointer image

var ie=document.all
var ns6=document.getElementById && !document.all
var enabletip=false
if (ie||ns6)
var tipobj=document.all? document.all["dhtmltooltip"] : document.getElementById? document.getElementById("dhtmltooltip") : ""

var pointerobj=document.all? document.all["dhtmlpointer"] : document.getElementById? document.getElementById("dhtmlpointer") : ""

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function ddrivetip(thetext, thewidth, thecolor){
if (ns6||ie){
if (typeof thewidth!="undefined") tipobj.style.width=thewidth+"px"
if (typeof thecolor!="undefined" && thecolor!="") tipobj.style.backgroundColor=thecolor
tipobj.innerHTML=thetext
enabletip=true
return false
}
}

function positiontip(e){
if (enabletip){
var nondefaultpos=false
var curX=(ns6)?e.pageX : event.clientX+ietruebody().scrollLeft;
var curY=(ns6)?e.pageY : event.clientY+ietruebody().scrollTop;
//Find out how close the mouse is to the corner of the window
var winwidth=ie&&!window.opera? ietruebody().clientWidth : window.innerWidth-20
var winheight=ie&&!window.opera? ietruebody().clientHeight : window.innerHeight-20

var rightedge=ie&&!window.opera? winwidth-event.clientX-offsetfromcursorX : winwidth-e.clientX-offsetfromcursorX
var bottomedge=ie&&!window.opera? winheight-event.clientY-offsetfromcursorY : winheight-e.clientY-offsetfromcursorY

var leftedge=(offsetfromcursorX<0)? offsetfromcursorX*(-1) : -1000

//if the horizontal distance isn't enough to accomodate the width of the context menu
if (rightedge<tipobj.offsetWidth){
//move the horizontal position of the menu to the left by it's width
tipobj.style.left=curX-tipobj.offsetWidth+"px"
nondefaultpos=true
}
else if (curX<leftedge)
tipobj.style.left="5px"
else{
//position the horizontal position of the menu where the mouse is positioned
tipobj.style.left=curX+offsetfromcursorX-offsetdivfrompointerX+"px"
pointerobj.style.left=curX+offsetfromcursorX+"px"
}

//same concept with the vertical position
if (bottomedge<tipobj.offsetHeight){
tipobj.style.top=curY-tipobj.offsetHeight-offsetfromcursorY+"px"
nondefaultpos=true
}
else{
tipobj.style.top=curY+offsetfromcursorY+offsetdivfrompointerY+"px"
pointerobj.style.top=curY+offsetfromcursorY+"px"
}
tipobj.style.visibility="visible"
if (!nondefaultpos)
pointerobj.style.visibility="visible"
else
pointerobj.style.visibility="hidden"
}
}

function hideddrivetip(){
if (ns6||ie){
enabletip=false
tipobj.style.visibility="hidden"
pointerobj.style.visibility="hidden"
tipobj.style.left="-1000px"
tipobj.style.backgroundColor=''
tipobj.style.width=''
}
}

document.onmousemove=positiontip

</script>

</head>
<body>

<div id="outer">

	<div id="upbg"></div>

	<div id="inner">

		
		<div id="splash"></div>
	
		<div id="menu">
			<ul>
				<li class="first"><a href="index.php">home</a></li>
				<li><a href="download.php">download</a></li>
				<li><a href="reference.php">reference</a></li>
				<li><a href="development.php">development</a></li>
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