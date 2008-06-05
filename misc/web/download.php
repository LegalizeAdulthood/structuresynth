<?php
include("include.php");
$description = "";
$keywords = "";
insertHeader("","");
?>
	
			<div class="post">
				<div class="header">
					<h3>Download</h3>
					
				</div>
				<div class="content">
				<p>The current version of Structure Synth is Version 0.8.0 (Exonautica). It is beta quality, so expect some rough edges. It it quite stable though. Currently, only Windows builds are provided (mac builds coming soon):</p>
	<p><a href="http://downloads.sourceforge.net/structuresynth/StructureSynth-Windows_Binary_v0.8.0.zip?use_mirror=mesh">StructureSynth-Windows_Binary-v0.8.0.zip</a></p>
	 <p>Structure Synth is developed on Windows, but it is known to compile under Linux and Mac OS X as well (see below):</p>
	<p><a href="http://downloads.sourceforge.net/structuresynth/StructureSynth-Source-v0.8.0.zip?use_mirror=mesh">StructureSynth-Source-v0.8.0.zip</a></p>
	
	
 <p>For the latest changes, it is recommended to pull the source code directly from the SourceForge repository. It can be accessed using SVN (<a href="https://sourceforge.net/svn/?group_id=202402">see instructions</a>).</p>


  </div>
  </div>
  
 
 
 <div class="post">
				<div class="header">
					<h3>Build Instructions (Windows XP and Vista)</h3>
				</div>
				<div class="content">
  
  <p>
    A Visual Studio 2008 solution file is part of the project. The free <a href="http://msdn2.microsoft.com/en-us/express/default.aspx">Visual Studio Express C++ 2008</a> can be used to build Structure Synth.
  </p>
  <p>
    The <a href="http://trolltech.com/developer/downloads/qt">Qt 4.3.0/Windows Open Source Edition</a> is also necessary. The trickiest part is getting Qt compiled and installed with the Open Source version of Qt. <a href="http://wiki.qgis.org/qgiswiki/Building_QT_4_with_Visual_C++_2005">This tutorial explains how to do this</a>. Essentially you need to download a Patch file called <a href="http://sourceforge.net/project/showfiles.php?group_id=49109&amp;package_id=165202">'Advanced Compiler Support for 4.3.x'</a>. <b>Notice that Qt 4.3.4 will not work with the 'Advanced Compiler Support' patch! Use Qt 4.3.0 instead</b>. </p><p>You will also need to install the <a href="http://www.microsoft.com/downloads/details.aspx?FamilyId=0BAF2B35-C656-4969-ACE8-E4C0C0716ADB&amp;displaylang=en">Microsoft Windows Platform SDK</a> since this is not part of the Express editions of Visual Studio - notice that 'Windows 2003 SDK...' is the correct version for Windows XP. On Windows Vista use the <a href="http://www.microsoft.com/downloads/details.aspx?FamilyId=E6E1C3DF-A74F-4207-8586-711EBE331CDC&displaylang=en">Windows SDK for Windows Server 2008</a>.
  </p>
  
  
  </div></div>
 
 
  
  <div class="post">
   <div class="header">
					<h3>Build Instructions (Linux)</h3>
				</div>
				<div class="content">
				
				<p>
				This is instructions for compiling Structure Synth from a clean <a href="http://www.ubuntu.com/">Ubuntu</a> installation. I used Ubuntu 6.06 x86, but newer version should work just as good (update: works on Ubuntu 7.10 as well - but you might have to turn off any advanced 3D desktop effects).
				</p>
				<p>
				
First of all, make sure you have C++ compiler and the X11 and OpenGL development libs. (And Subversion if fetching the source directly from the repository).</p>
<pre>
sudo aptitude install build-essential
sudo aptitude install libx11-dev
sudo aptitude install mesa-common-dev 
sudo aptitude install libgl1-mesa-dev
sudo aptitude install libglu1-mesa-dev
sudo aptitude install subversion
</pre>

<p><br />Build Qt 4.3 with OpenGL support. (<a href="http://trolltech.com/developer/downloads/qt/x11">Download Qt here</a>)</p>
<pre>
./configure -opengl -nomake examples -nomake demos
./make 
sudo ./make install
</pre>

<p><br />Get the latest <a href="http://sourceforge.net/svn/?group_id=202402">Structure Synth sources</a>.</p>


<p>Build structure synth.</p>
<pre>
qmake -project
qmake trunk.pro
make
</pre>
  <p><br />Enjoy.</p>
  </div></div>

  <div class="post">
				<div class="header">
					<h3>Build Instructions (Mac OS X)</h3>
				</div>
				<div class="content">
				
				<p>
				Disclaimer: I am not a Mac expert - trying to compile Structure Synth in XCode was my first experience with Mac OS X.
</p><p>
First install Qt Open Source for Mac. I tested with 4.3.4, which worked for me. I Used XCode 2.5 on Mac OS 10.4.7 (with Qt 4.3.4 Open Source).
</p><p>
Now check out the source (see the Linux build instructions), and type the following:
</p>
<p><pre>
qmake -project -after "CONFIG += opengl" -o mac.pro
qmake -spec macx-xcode mac.pro
</pre></p>
<p>
Now an XCode project file has been created (mac.xcodeproj - actually a dir). 
Open this file in XCode. 
</p><p>
Open the 'mac' project, go to "External Frameworks and Libraries" and add QtOpenGL.framework and QtXml.framework by browsing to their locations. The header files now needs to be added: go to 'Project | Edit Active Target 'mac'' and go to the Build tab. Add the following Header search paths:</p>
<p><pre>'(qt_dir)/lib/QtOpenGL.framework/Versions/4/Headers' <br/>'(qt_dir)/Qt-4.3.4/lib/QtXML.framework/Versions/4/Headers'  </pre>
</p>
<p>It should now be possible to compile and run Structure Synth from XCode.</p>
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