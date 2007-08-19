<?php
include("include.php");
$description = "";
$keywords = "";
insertHeader("","");
?>
	
<div class="post"><div class="header"><h3>Transformations</h3></div><div class="content">
	
<p>Geometrical transformations</p>
<dl>
	<dt>x [float]</dt><dd>X axis translation. The float argument is the offset measured in units of the local coordinate system.</dd>
	<dt>y [float]</dt><dd>Y axis translation. As above.</dd>
	<dt>z [float]</dt><dd>Z axis translation. As above.</dd>
	<dt>rx [float]</dt><dd>Rotation about the x axis. The 'float' argument is the angle specified in <i>degrees</i>. The rotation axis is centered at the unit cube in the local coordinate system: that is the rotation axis contains the line segment from (0, 0.5, 0.5) -> (1, 0.5, 0.5). </dd>
	<dt>ry [float]</dt><dd>Rotation about the y axis. As above. </dd>
	<dt>rz [float]</dt><dd>Rotation about the z axis. As above. </dd>
	<dt>s [float]</dt><dd>Resizes the local coordinate system. Notice that the center for the resize is located at the center of the unit cube in the local system (at (0.5,0.5,0.5)</dd>
	<dt class="na">s [f1] [f2] [f3]</dt><dd>Resizes the local coordinate system. As above but with separate scale for each dimension.</dd>
	<dt class="na">m [f1] ... [f9]</dt><dd>Applies the specified 3x3 rotation matrix to the transformation matrix for the current state. About the argument order: [f1],[f2],[f3] defines the first <i>row</i> of the matrix. </dd>
	<dt class="warn">fx</dt><dd>Mirrors the local coordinate system about the x-axis. As above the mirroring planes is centered at the cube. </dd>
	<dt class="warn">fy</dt><dd>Mirrors the local coordinate system about the y-axis. </dd>
	<dt class="warn">fz</dt><dd>Mirrors the local coordinate system about the z-axis. </dd>
</dl>
<p>Color space transformations</p>
<dl>
	<dt>h / hue [float]</dt><dd>Adds the 'float' value to the hue color parameter for the current state. Hues are measured from 0 to 360 and wraps cyclicly - i.e. a hue of 400 is equal to a hue of 40.</dd>
	<dt>sat [float]</dt><dd>Multiples the 'float' value with the saturation color parameter for the current state. Saturations are measured from 0 to 1 and are clamped to this interval (i.e. values larger then 1 are set to 1).</dd>
	<dt>b / brightness [float]</dt><dd>Multiples the 'float' value with the brightness color parameter for the current state. Brightness is measured from 0 to 1 and is clamped to this interval. Notice that parameter is sometimes called 'V' or 'Value' (and the color space is often refered to as <a href="http://en.wikipedia.org/wiki/HSV_color_space">HSV</a>).</dd>
    <dt class="warn">a / alpha [float]</dt><dd>Multiples the 'float' value with the alpha color parameter for the current state. Alpha is measured from 0 to 1 is clamped to this interval. An alpha value of zero is completely transperant, and an alpha value of one is completely opaque.</dd>
	</dl>
</div></div>
	
<div class="post"><div class="header"><h3>Drawing Primitives</h3></div><div class="content">


<dl>
<dt>box</dt><dd>solid box</dd>
<dt>grid</dt><dd>wireframe box</dd>
<dt>sphere</dt><dd>...</dd>
<dt>line</dt><dd>along x axis, centered in y,z plane.</dd>
<dt>point</dt><dd>centered in coordinate system.</dd>
<dt class="na">cylinder</dt><dd>the symmetry axis will be the current x axis.</dd>
<dt class="na">tube</dt><dd>polygonal cylinder (will be drawn smoothly as the coordinate system transforms).</dd>
</dl>
		
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


