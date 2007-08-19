<?php
include("include.php");
$description = "";
$keywords = "";
insertHeader("","");
?>
	
<div class="post"><div class="header"><h3>Structure Synth Architecture</h3></div><div class="content">
	
<p>Structure Synth is written in C++ using Qt 4.3 and OpenGL</p>
<p>The main application consists of a GUI with a small embedded editor with syntax highlighting and an integrated 3D viewer (using the Mini OpenGL Engine in the Syntopia Core).</p>

<img src="media/g1.png" alt="diagram" />
		
	
<p>
This Eisenstein Engine takes the input script and converts it into a model: this includes <b>preprocessing</b> (stripping comments and including other files), <b>parsing</b> (a simple recursive descent parser), <b>rule name resolving</b> and rule model construction.
</p>
<p>
The <b>builder</b> executes the rules defined in the model and calls the <b>renderer</b> as needed. The rendering uses an abstract interface, which should make it easy to extend with new renderers (e.g. PovRay output)
</p>
<p>
The <b>rule model</b> is  an object-oriented representation of the rule set: i.e. classes for rules (primitive, custom, and ambiguous rules), transformations, and transformation loops.
</p>
	
</div></div>
<div class="post"><div class="header"><h3>Syntopia Core</h3></div><div class="content">

<p>
Syntopia Core set of reusable building blocks.</p><p> Qt provides a lot of nice functionality (GUI Widgets, nice strings with regular expressions, XML, HTTP, …), but a few classes is almost always needed when building new applications. </p><p>This small application framework consists of:</p>
<dl>
<dt>GLEngine</dt><dd>a small 3D engine (with mouse zoom/translation/rotation)</dd>
<dt>Logging</dt><dd>a mini framework for simple logging/timing/user feedback</dd>
<dt>Exceptions</dt><dd>a set of standard exceptions (not much here… )</dd>
<dt>Math</dt><dd>Various mathematical utilities</dd>
<dt>Vector3</dt><dd>3-component vector manipulation (dot product, cross product, …)</dd>
<dt>Matrix4</dt><dd>4×4 matrix manipulation (we use homogenous coordinates in the 3D engine) (rotations, multiplication, …)</dd>
<dt class="na">Random</dt><dd>cross-platform random numbers + normal distributed random numbers.</dd>
<dt class="na">Version</dt><dd>utils for mainting a version number and checking for updates on the net.</dd>
</dl>
<p>Possible extensions could be modules like Serialization, Persistence and a Help Browser.</p>

		
</div></div>  

<div class="post"><div class="header"><h3>Eisenscript</h3></div><div class="content">
</div></div>

<div class="post"><div class="header"><h3>Roadmap</h3></div><div class="content">
</div></div>

</div>
		
		<div id="secondarycontent">

			<!-- secondary content start -->
		
			
			<h3>Links</h3>
			<div class="content">
    <a href="http://sourceforge.net/projects/structuresynth/"><img class="center" src="http://sflogo.sourceforge.net/sflogo.php?group_id=202402&amp;type=3" width="125" height="37"  alt="SourceForge.net Logo" /></a>
			</div>

			<!-- secondary content end -->


  <?php
insertFooter("","");
?>


