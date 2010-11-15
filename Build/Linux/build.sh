#!/bin/sh

cd ../..
qmake-qt4 -project -after "CONFIG+=opengl" -after "QT+=xml opengl script"
qmake-qt4
make

cd Build/Linux

mkdir "Structure Synth"
mkdir "Structure Synth/Examples"
mkdir "Structure Synth/Misc"
cp ../../trunk "Structure Synth/structuresynth"
cp -r ../../Examples/* "Structure Synth/Examples"
cp -r ../../Misc/* "Structure Synth/Misc"



