<?php
include("include.php");
$description = "";
$keywords = "";
insertHeader("","");
?>
	
	<div class="post"><div class="header"><h3>States, transformations and actions.</h3></div><div class="content">
	
<p>Structure Synth is all about <i>states</i>. A state describes the current coordinate system and the current coloring mode. The coordinate system determines the position, orientation and size of all object drawn while in the current state. </p>
<p>
States are modified by <i>transformations</i>. For instance we can move the coordinate system one unit in the x-direction by applying the transformation: <span class="ipre">{ x 1 }</span>. Similarly we can rotate the coordinate system 90 degrees about the x-axis by applying:<span class="ipre">{ rx 90 }</span>. States are automatically combined while parsing, that is <span class="ipre">{ x 1 x 1 }</span> is equal to <span class="ipre">{ x 2 }</span>. 
</p><p>
States can be combined with <i>rule calls</i> to create <i>actions</i>. <span class="ipre">{ x 2 } box</span> is an example of a transformation followed by a rule call. 'box' is a built-in rule. Not surprisingly, this rule draws a box located at (0,0,0) -> (1,1,1) in the current coordinate system.
</p><p>
Now take a look at the following example:</p>
<p>
<pre>
box
{ x 2 } box
{ x 4 } box
{ x 6 } box
</pre>
</p>
<p>
This creates the following output:<br />
<img src="media/box4.png" />

</p>
<p>
This produces four boxes with equal space between them. Notice that when we have multiple actions following each other like this they are all applied to the same state - in this case the initial state. The actions are <b>not</b> applied to the state produced by the previous action - this would have create an uneven spacing.
</p>
<h4>Iterated actions</h4>
<p>
It is possible to apply <i>iterated</i> actions, this is done using the multiplication symbol: for instance <span class="ipre">3 * { x 2 } box</span> would be equal to creating three actions:
</p>
<p>
<pre>
{ x 2 } box
{ x 4 } box
{ x 6 } box
</pre>
</p>
<h4>Color transformations</h4>
<p>
Similar to the spatial transformations it is also possible to transform the current rendering color. Structure Synth uses HSV (Hue, Saturation and Value) for representing colors - this is perhaps not as familiar as the RGB color model, but offers a slightly more intuitive representation once you get used to it (at least that is what some people claim - personally I still find it easier think in terms of red, green and blue components). The color transformations are applied using the 'hue', 'saturation' and 'value' operators. 
</p>
<p>
The next example demonstrates both iterated actions and color transformations to draw a nice color cube:</p>
<p>
<img src="media/colorcube.png" />
<pre>
10 * { x 1 hue 36 } 10 * { y 1 sat 0.9 } 10 * { z 1 b 0.9 } box
</pre>
</p>

<p>
Here is another example demonstrating different kinds of transformations:<br/>
<img src="media/misc.png" />
<pre>
10 * { x 2 } box
1 * { y 2 } 10 * { x 2 rx 6 } box
1 * { y 4 } 10 * { x 2 hue 9 } box
1 * { y 6 } 10 * { x 2 s 0.9 } box
</pre>
</p>

<h4>Built-in rules</h4>
<p>
The Box is an example of one the primitives - built-in rules - in Structure Synth. The other
built-in rules are: Sphere, Dot, Grid, Line, <span class="na">Cylinder</span>, <span class="na">Mesh</span>, <span class="na">CylinderMesh</span>. 
</p>
<p>
This example demonstrates different primitives (from left to right: mesh, grid, line, dot, box, sphere):
<br/>
<img src="media/primitives.png" />

</p>

</div></div>

	
<div class="post"><div class="header"><h3>Making Rules</h3></div><div class="content">
	
<p>
Custom rules are the key to creating complex and sophisticated structures. Rules are created using the 'rule' keyword. A rule can used the same way as any built-in primitive.

The most important aspect of rules are, that they are able to call themselves. Take a look at the following example:

<pre>
R1

rule R1 {
  { x 0.9 rz 6 ry 6 s 0.99  sat 0.99  } R1
  { s 2 } sphere
}
</pre>

Which generates this output.
<img src="media/rule.png" />

Notice that this rule recursively calls itself. It would never terminate - however Structure Synth has a default maximum recursion depth of 1000 recursions. This value can be changes using the 'set maxdepth xxx' command. Another way to force termination would be using the 'set maxobjects xxx' keyword, which makes Structure Synth keep track of the number of objects drawn.

</p>

<h4>Adding some randomness</h4>
<p>
Now, in order to things interesting, we will probably want to create something less static - by adding some randomness. In Structure Synth this is achieved by creating multiple definitions for the same rule:
<pre>
R1

rule R1 {
  { x 0.9 rz 6 ry 6 s 0.99  sat 0.99  } R1
  { s 2 } sphere
}

rule R1  {
  { x 0.9 rz -6 ry 6 s 0.99  sat 0.99  } R1
  { s 2 } sphere
}
</pre>

Notice the 'R1' rule has two definitions. Now, whenever the Structure Synth builder needs to call the 'R1' rule, it will choose one of the definitions at random, resulting in something like the following image:<br />
<img src="media/rule2.png" />
</p>

		
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


