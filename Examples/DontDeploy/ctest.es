/*
	A simple demonstration of Structure Synth.
*/

set maxdepth 400
R1
R2

rule R1 {
  { x 1 rz 6 ry 6 s 0.99 hue 1 } R1
  { s 2 } sphere
 { x 1 } box
}

rule R2 {
  { x -1 rz 6 ry 6 s 0.99 } R2
  { s 2 } sphere
} 