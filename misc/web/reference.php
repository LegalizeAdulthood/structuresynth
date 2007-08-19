<?php
include("include.php");
$description = "";
$keywords = "";
insertHeader("","");
?>
	
<div class="post"><div class="header"><h3>Transformations</h3></div><div class="content">
	
	
<ul>
	<li>x <float>  - X axis translation. The float argument is the offset measured in units of the local coordinate system.</li>
	<li>y <float>  - Y axis translation. As above.</li>
	<li>z <float>  - Z axis translation. As above.</li>
	<li>rx <float> - Rotation about the x axis. The 'float' argument is the angle specified in <i>degrees</i>. The rotation axis is centered at the unit cube in the local coordinate system: that is the rotation axis contains the line segment from (0, 0.5, 0.5) -> (1, 0.5, 0.5). </li>
	<li>ry <float> - Rotation about the y axis. As above. </li>
	<li>rz <float> - Rotation about the z axis. As above. </li>
	<li>s <float> - Resizes the local coordinate system. Notice that the center for the resize is located at the center of the unit cube in the local system (at (0.5,0.5,0.5)</li>
	<li>fx - Mirrors the local coordinate system about the x-axis. As above the mirroring planes is centered at the cube. </li>
	<li>fy - Mirrors the local coordinate system about the y-axis. </li>
	<li>fz - Mirrors the local coordinate system about the z-axis. </li>
	<li>h / hue <float>  - Adds the 'float' value to the hue color parameter for the current state. Hues are measured from 0 to 360 and wraps cyclicly - i.e. a hue of 400 is equal to a hue of 40.</li>
	<li>sat <float>  - Multiples the 'float' value with the saturation color parameter for the current state. Saturations are measured from 0 to 1 and are clamped to this interval (i.e. values larger then 1 are set to 1).</li>
	<li>b / brightness <float>  - Multiples the 'float' value with the brightness color parameter for the current state. Brightness is measured from 0 to 1 and is clamped to this interval. Notice that parameter is sometimes called 'V' or 'Value' (and the color space is often refered to as <a href="http://en.wikipedia.org/wiki/HSV_color_space">HSV</a>).</li>
    <li>a / alpha <float> - Multiples the 'float' value with the alpha color parameter for the current state. Alpha is measured from 0 to 1 is clamped to this interval. An alpha value of zero is completely transperant, and an alpha value of one is completely opaque.</li>
	</ul>
</div></div>
	
<div class="post"><div class="header"><h3>Drawing Primitives</h3></div><div class="content">


<ul>
<li>box      - solid box</li>
<li>grid	 - wireframe box</li>
<li>sphere   - </li>
<li>line     - along x axis, centered in y,z plane.</li>
<li>point    - centered in coordinate system.</li>
<li>-cylinder - the symmetry axis will be the current x axis.</li>
<li>-tube     - polygonal cylinder (will be drawn smoothly as the coordinate system transforms).</li>
</ul>
		
</div></div>  
  <?php
insertFooter("","");
?>


