<?php
include("include.php");
$description = "";
$keywords = "";
insertHeader("","");
?>
	

<div class="post">
<div class="content">
<p>
This page contains an introduction to the EisenScript language.
</p>
<p>
For more information about various Structure Synth topics, the following blog posts may be useful:
<ul>
<li><a href="http://blog.hvidtfeldts.net/index.php/2010/11/scripting-in-structure-synth/">Scripting and animations</a></li>
<li><a href="http://blog.hvidtfeldts.net/index.php/2010/09/creating-a-raytracer-for-structure-synth/">The internal raytracer</a></li>
<li><a href="http://www.flickr.com/photos/syntopia/3644799200/">Depth-first EisenScript and Constructive Solid Geometry</a></li>
<li><a href="http://blog.hvidtfeldts.net/index.php/2009/07/template-export-gui/">The template export GUI</a></li>
<li><a href="http://blog.hvidtfeldts.net/index.php/2009/04/random-colors-color-pools-and-dual-mersenne-twister-goodness/">Random color pools</a>
</ul>
</p>
</div>
<div class="header"><h3>The <a name="anatomy"></a>Anatomy of EisenScript</h3></div><div class="content">
	
<p>
Below is an EisenScript sample. Hover the mouse over the various parts for more information.
</p>
<pre>
<span class="info" onMouseover="ddrivetip('A <i>multiline comment</i>.', 400)"; onMouseout="hideddrivetip()">/*
  Sample Torus.
*/</span>

<span class="info" onMouseover="ddrivetip('<i>Global actions</i> are executed when the builder is initalized.<br>This action sets a limit to the recursive depth.', 400)"; onMouseout="hideddrivetip()">set maxdepth 100</span>
<span class="info" onMouseover="ddrivetip('The is a <i>global rule call</i>.<br>This rule will be added to the initial stack of rules pending to be executed.', 300)"; onMouseout="hideddrivetip()">r1</span>
<span class="info" onMouseover="ddrivetip('This is an example of a global rule call prepended with a <i>transformation loop</i>.<br>All actions which can be executed inside a rule can also be executed at the global scope.', 400)"; onMouseout="hideddrivetip()">36  * { x -2 ry 10   } r1</span>

<span class="info" onMouseover="ddrivetip('This is a <i>rule definition</i>. The <b>maxdepth</b> part is a <i>rule modifier</i>.', 400)"; onMouseout="hideddrivetip()">rule r1 maxdepth 10 {</span>
   <span class="info" onMouseover="ddrivetip('An example of <i>nested transformation loops</i>. This construct will create 6 new rule calls.', 400)"; onMouseout="hideddrivetip()">2 * { y -1 } 3 * { rz 15 x 1 b 0.9 h -20  } r2</span>
   <span class="info" onMouseover="ddrivetip('An simple example of a number of transformations being applied before calling a rule.<br>Notice that this rule calls it self.', 400)"; onMouseout="hideddrivetip()">{ y 1 h 12 a 0.9  rx 36 }  r1</span>
}

rule r2 {
   { <span class="info" onMouseover="ddrivetip('A transformation.<br>This transformation scales the coordinate system.', 400)"; onMouseout="hideddrivetip()">s 0.9 0.1 1.1</span> hue 10 } box <span class="info" onMouseover="ddrivetip('An <i>inline comment</i>.', 400)"; onMouseout="hideddrivetip()">// a comment</span>
}

<span class="info" onMouseover="ddrivetip('Notice the rule <b>r2</b> has two definitions:<br>It is an <i>ambiguous rule</i>.<br>If called, the builder will randomly choose one of its definitions according to their weights (w).', 400)"; onMouseout="hideddrivetip()">rule r2 w 2 {</span>
   { <span class="info" onMouseover="ddrivetip('Examples of color transformations.', 400)"; onMouseout="hideddrivetip()">hue 113 sat 19 a 23</span> s 0.1 0.9 1.1 } box
}


</pre>
</div>

<div class="header"><h3><a name="actions"></a>Actions</h3></div><div class="content">
<p><b>Termination criteria</b></p>
<dl class="longer">
<dt>set maxdepth [integer]</dt><dd>Breaks after [integer] iterations (generations). This will also serve as a upper recursion limit for all rules.</dd>
<dt>set maxobjects [integer]</dt><dd>After [integer] objects have been created, the construction is terminated.</dd>
<dt>set minsize [float]</dt><dd>Allows you to specify how large or small a given object can be before terminating. The 'size' parameter refers to the length of the diagonal of a unit cube in the current local state. The initial coordinate frame goes from (0,0,0) to (1,1,1) and hence has a diagonal length of sqrt(3)~1.7). It is possible to specify both a mix and a min size. The termination criteria only stops the current branch - if other branches are still within a valid range, the will be continued. <a href="http://www.flickr.com/photos/syntopia/3291301410/">More info...</a></dd>
<dt>set maxsize [float]</dt><dd>See above.</dd>
</dl>
<p><b>Other</b></p>
<dl class="longer">
<dt>set seed [integer]</dt><dd>Allows you to set the random seed. This makes it possible to reproduce creations.</dd>
<dt>set seed initial</dt><dd>This allows you to set the seed to its initial value (the value specified in the seed box). Notice that each rule call branch maintains its own sequence of random numbers. This makes it possible to generate the same set of random numbers as used earlier, making it possible to combine randomness with self-similarity. <a href="http://www.flickr.com/photos/syntopia/3272916772/">More info</a>.</dd>
<dt>set background [color]</dt><dd>Allows you to set the background color. Colors are specified as text-strings parsed using Qt's <a href="http://doc.trolltech.com/4.3/qcolor.html#setNamedColor">color parsing</a>, allowing for standard HTML RGB specifications (e.g. #F00 or #FF0000), but also SVG keyword names (e.g. red or even lightgoldenrodyellow).</dd>
</dl>
</div>



<div class="header"><h3><a name="rule"></a>Rule modifiers</h3></div><div class="content">
	
<dl class="longer">
<dt>md / maxdepth [integer]</dt><dd><i>Rule Retirement</i>.Sets the maximum recursive for the rule. The rule would not execute any actions after this limit has been reached.</dd>
<dt>md / maxdepth [integer] > [rulename]</dt><dd><i>Rule Retirement with substitution</i>.Sets the maximum recursive for the rule. After this limit has been reached [rulename] will be executed instead this rule.</dd>
<dt>w / weight [float]</dt><dd><i>Ambiguous rules</i>.If several rules are defined with the same name, a random definition is chosen according to the weight specified here. If no weight is specified, the default weight of 1 is used.</dd>
</dl>
</div>

<div class="header"><h3><a name="transformations"></a>Transformations</h3></div><div class="content">
	
<p><b>Geometrical transformations</b></p>
<dl class="oneline">
	<dt>x [float]</dt><dd>X axis translation. The float argument is the offset measured in units of the local coordinate system.</dd>
	<dt>y [float]</dt><dd>Y axis translation. As above.</dd>
	<dt>z [float]</dt><dd>Z axis translation. As above.</dd>
	<dt>rx [float]</dt><dd>Rotation about the x axis. The 'float' argument is the angle specified in <i>degrees</i>. The rotation axis is centered at the unit cube in the local coordinate system: that is the rotation axis contains the line segment from (0, 0.5, 0.5) -> (1, 0.5, 0.5). </dd>
	<dt>ry [float]</dt><dd>Rotation about the y axis. As above. </dd>
	<dt>rz [float]</dt><dd>Rotation about the z axis. As above. </dd>
	<dt>s [float]</dt><dd>Resizes the local coordinate system. Notice that the center for the resize is located at the center of the unit cube in the local system (at (0.5,0.5,0.5)</dd>
	<dt>s [f1] [f2] [f3]</dt><dd>Resizes the local coordinate system. As above but with separate scale for each dimension.</dd>
	<dt>m [f1] ... [f9]</dt><dd>Applies the specified 3x3 rotation matrix to the transformation matrix for the current state. About the argument order: [f1],[f2],[f3] defines the first <i>row</i> of the matrix. </dd>
	<dt class="warn">fx</dt><dd>Mirrors the local coordinate system about the x-axis. As above the mirroring planes is centered at the cube. </dd>
	<dt class="warn">fy</dt><dd>Mirrors the local coordinate system about the y-axis. </dd>
	<dt class="warn">fz</dt><dd>Mirrors the local coordinate system about the z-axis. </dd>
</dl>
<p><b>Color space transformations</b></p>
<dl class="oneline">
	<dt>h / hue [float]</dt><dd>Adds the 'float' value to the hue color parameter for the current state. Hues are measured from 0 to 360 and wraps cyclicly - i.e. a hue of 400 is equal to a hue of 40.</dd>
	<dt>sat [float]</dt><dd>Multiplies the 'float' value with the saturation color parameter for the current state. Saturation is measured from 0 to 1 and is clamped to this interval (i.e. values larger then 1 are set to 1).</dd>
	<dt>b / brightness [float]</dt><dd>Multiples the 'float' value with the brightness color parameter for the current state. Brightness is measured from 0 to 1 and is clamped to this interval. Notice that parameter is sometimes called 'V' or 'Value' (and the color space is often refered to as <a href="http://en.wikipedia.org/wiki/HSV_color_space">HSV</a>).</dd>
    <dt>a / alpha [float]</dt><dd>Multiplies the 'float' value with the alpha color parameter for the current state. Alpha is measured from 0 to 1 and is clamped to this interval. An alpha value of zero is completely transparant, and an alpha value of one is completely opaque.</dd>
	<dt>color [color]</dt><dd>This commands sets the color to an <i>absolut</i> color (most other transformations are relative modifications on the current state). Colors are specified as text-strings parsed using Qt's <a href="http://doc.trolltech.com/4.3/qcolor.html#setNamedColor">color parsing</a>, allowing for standard HTML RGB specifications (e.g. #F00 or #FF0000), but also SVG keyword names (e.g. red or even lightgoldenrodyellow)</dd>
	<dt>blend [color] [strength]</dt><dd>Blends the current color with the specified color. A strength of 1.0 will weight the current and new color evenly. Colors are mixed in HSV color space. Hue's will wrap around. Saturation and Value are clamped to [0,1]. Notice that since the mixing is performed in HSV space, the result may seems counterintuitive. For instance blending a red color into a blue color, may have intermediate green steps (since you are change the hue - so you will move around on the HSV color circle). <a href="http://www.flickr.com/photos/syntopia/3287820331/">More info...</a></dd>
	<dt>set color random</dt><dd>Chooses a random color (using the current colorpool - see below).</dd>
	<dt>set colorpool [scheme]</dt><dd>Determines how random colors are drawn. The possible schemes are:<br /><b>randomhue</b> - chooses a random hue, with full brighness and saturation.<br /><b>randomrgb</b> - three independent random r,g, and b values.<br /><b>greyscale</b> - random r=g=b.<br /><b>image:filename.png</b> - color sampling. Chooses a random pixel from the specified image.<br /><b>list:orange,white,grey</b> - chooses from the specified list of colors. A color may appear multiple times to increase its weight. <a href="http://blog.hvidtfeldts.net/index.php/2009/04/random-colors-color-pools-and-dual-mersenne-twister-goodness/">More info...</a></dd>

	</dl>
	
	
	
	
</div></div>
	
<div class="post"><div class="header"><h3><a name="drawing"></a>Drawing Primitives</h3></div><div class="content">


<dl class="oneline">
<dt>box</dt><dd>solid box</dd>
<dt>grid</dt><dd>wireframe box</dd>
<dt>sphere</dt><dd>the round thingy (as of now this primitive has some issues - e.g. ellipsoids are not working.)</dd>
<dt>line</dt><dd>along x axis, centered in y,z plane.</dd>
<dt>point</dt><dd>centered in coordinate system.</dd>
<dt>triangle</dt><dd>creates a custom polygon. Specify the coordinates as follows: Triangle[0,0,0;1,0,0;0.5,0.5,0.5]</dd>
<dt class="warn">mesh</dt><dd>prototype mesh</dd>
<dt class="na">cylinder</dt><dd>the symmetry axis will be the current x axis. [Not implemented]</dd>
<dt class="na">tube</dt><dd>polygonal cylinder (will be drawn smoothly as the coordinate system transforms). [Not implemented]</dd>
</dl>
		

</div></div>

<div class="post"><div class="header"><h3><a name="preprocessor"></a>Preprocessor commands</h3></div><div class="content">

<dl class="oneline">
<dt>#define&nbsp;varname&nbsp;value</dt><dd><br />substitutes every occurrence of 'varname' with 'value'. Value may contain spaces.</dd>
<dt>#define&nbsp;varname&nbsp;value (float:0-40)</dt><dd><br />As above, but creates a pane with sliders for each of the variables defined. The values in the float-statement determines the lower and upper slider bounds. Example: '#define angle 14 (float:0-90)' will create a GUI slider for adjusting the angle parameter between 0 and 90.</dd>
</dl>
		

</div>

<div class="header"><h3><a name="for"></a>For Context Free / CFDG users</h3></div><div class="content">
<p>The EisenScript syntax in Structure Synth has a lot in common with CFDG.</p>
<p>There are however a few important differences:</p>
<p>
<b>Context sensitivity</b>: A CFDG script can be viewed as a <a href="http://en.wikipedia.org/wiki/Context_free_grammar">grammar</a>, where the production rules are independent of their context - or put differently - when choosing between rules CFDG does not have any knowledge of the history of system. This 'Context Free' property of CFDG was deliberately omitted in EisenScript, simply for pragmatic reasons: some structures would be difficult to create without having some way to change the rules after a certain number of recursions. 
</p>
<p>
<b>The 'startrule' statement</b>: in CFDG startrules are explicitly specified. In EisenScript, a more generic approach is used: statements which can be used in a rule definition, can also be used at the top-level scope, so in order to specify a start-rule, just write the name of the rule.
</p>

<p>
<b>Termination criteria</b>: in CFDG recursion automatically terminates when the objects produced are too small to be visible. This is a very elegant solution, but it is not easy to do in a dynamic 3D world, where the user can move and zoom with the camera. Several options exist in Structure Synth for terminating the rendering.
</p>
<p>
<b>Transformation order</b>: in CFDG transformations (which CFDG refers to as adjustments) in curly brackets are not applied in the order of appearence, and if multiple transformations of the same type are applied, only the last one is actually carried out. For transformations in square brackets in CFDG the order on the other hand is significant. In Structure Synth the transformation order is always significant: transformations are applied starting from the right-most one. 
</p>



</div>

</div></div>  


		
		<div id="secondarycontent">

			<!-- secondary content start -->
		
			<h3>Outline</h3>
			<div class="content">
			<a href="#anatomy">The Anatomy of EisenScript</a><br />
			<a href="#actions">Actions</a><br />
			<a href="#rule">Rule modifiers</a><br />
			<a href="#transformations">Transformations</a><br />
			<a href="#drawing">Drawing Primitives</a><br />
			<a href="#preprocessor">Preprocessor commands</a><br />
			<a href="#for">For Context Free / CFDG users</a><br />
			
			</div>
			
			<h3>Links</h3>
			<div class="content">
    <a href="http://sourceforge.net/projects/structuresynth/"><img class="center" src="http://sflogo.sourceforge.net/sflogo.php?group_id=202402&amp;type=3" width="125" height="37"  alt="SourceForge.net Logo" /></a>
			</div>

			<!-- secondary content end -->

  <?php
insertFooter("","");
?>


