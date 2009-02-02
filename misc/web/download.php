<?php
include("include.php");
$description = "";
$keywords = "";
insertHeader("","");
?>
	
			<div class="post">
				<div class="header">
					<h3>Get</h3>
					
				</div>
				<div class="content">
				<p>The current version of Structure Synth is Version 0.9.0 ("Glasnost"). It is beta quality, so expect some rough edges.
				<p/>
				
				<table class="download"><tr><td><img src="images/windows.png" width="85px" /></td><td>
				<p><b>Windows build</b> (for 32-bit XP and Vista):</p>
	<p><a href="http://downloads.sourceforge.net/structuresynth/StructureSynth-Windows_Binary_v0.9.0.zip?use_mirror=mesh">StructureSynth-Windows_Binary-v0.9.0.zip</a></p>
				</td></tr><tr><td><img src="images/apple.png" width="85px" /></td><td>
	
		<p><b>Mac build</b> (Universal binary, Mac OS 10.5):</p>
	<p><a href="http://downloads.sourceforge.net/structuresynth/StructureSynth-Mac_Universal_v0.9.0.zip?use_mirror=mesh">StructureSynth-Mac_Universal-v0.9.0.zip</a></p>
	<p>(Thanks for David Burnett for providing this - for an outline of the build process see <a href="https://sourceforge.net/forum/message.php?msg_id=6239736">this forum post</a>) </p>
	
	</td></tr><tr><td><img src="images/tux.png" width="85px" /></td><td>
	
	<p><b>Linux</b>:</p> 
	<p>You will have to build it yourself. See the build instructions below. The source of the latest release can be found here: <a href="http://downloads.sourceforge.net/structuresynth/StructureSynth-Source-v0.9.0.zip?use_mirror=mesh">StructureSynth-Source-v0.9.0.zip</a></p>
 <p>For the latest changes, it is recommended to pull the source code directly from the SourceForge repository. It can be accessed using SVN (<a href="https://sourceforge.net/svn/?group_id=202402">see instructions</a>).</p>

 </td></tr></table>
	

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
  <b>Update:</b> I do not think the 'Advanced Compiler Support' patches still are necessary for compiling newer versions of Qt with Visual Studio Express. See this link for a <a href="http://tom.paschenda.org/blog/?p=28">simpler installation guide</a>.
  </p>
  <p>
    The <a href="http://trolltech.com/developer/downloads/qt">Qt 4.3.0/Windows Open Source Edition</a> is also necessary. The trickiest part is getting the Open Source version of Qt compiled and installed with Visual Studio. <a href="http://wiki.qgis.org/qgiswiki/Building_QT_4_with_Visual_C++_2005">This tutorial explains how to do this</a>. Essentially you need to download a Patch file called <a href="http://sourceforge.net/project/showfiles.php?group_id=49109&amp;package_id=165202">'Advanced Compiler Support for 4.3.x'</a>. <b>Notice that Qt 4.3.4 will not work with the 'Advanced Compiler Support' patch! Use Qt 4.3.0 instead</b>. </p><p>You will also need to install the <a href="http://www.microsoft.com/downloads/details.aspx?FamilyId=0BAF2B35-C656-4969-ACE8-E4C0C0716ADB&amp;displaylang=en">Microsoft Windows Platform SDK</a> since this is not part of the Express editions of Visual Studio - notice that 'Windows 2003 SDK...' is the correct version for Windows XP. On Windows Vista use the <a href="http://www.microsoft.com/downloads/details.aspx?FamilyId=E6E1C3DF-A74F-4207-8586-711EBE331CDC&displaylang=en">Windows SDK for Windows Server 2008</a>.
  </p>
  
  
  </div></div>
 
 
  
  <div class="post">
   <div class="header">
					<h3>Build Instructions (Linux)</h3>
				</div>
				<div class="content">
				
				<p>
				These instructions should work for Ubuntu 8.10 (but Structure Synth is known to compile on many other distributions). If you encounter graphics trouble, you might have to turn off any advanced 3D desktop effects.
				</p>
				<p>
You will need to have a C++ compiler, X11, Qt4, and OpenGL development libs (and Subversion if fetching the source directly from the repository):</p>

 <pre>
# aptitude install build-essential libx11-dev 
mesa-common-dev libgl1-mesa-dev libglu1-mesa-dev 
subversion libxext-dev libqt4-opengl-dev 
</pre>
<p>(No line breaks!)</p>
<p>If you are feeling adventurous, get the latest <a href="http://sourceforge.net/svn/?group_id=202402">Structure Synth sources</a> otherwise download the latest zipped release above (releases are more stable).
</p>
<p>Build Structure Synth. Make sure your working directory is the directory containing the 'Examples' and 'Misc' folder.</p>
<pre>$ qmake-qt4 -project -after "CONFIG+=opengl" 
-after "QT+=xml opengl script" 
$ qmake-qt4 
$ make 
</pre>
  <p>That's it. Enjoy.</p>
<p>Notice: if you build Qt from the <a href="http://trolltech.com/developer/downloads/qt/x11">sources</a>, remember to enable OpenGL support, e.g.:</p>
<pre>
./configure -opengl -nomake examples -nomake demos
make 
sudo make install
</pre>



  </div></div>

  <div class="post">
				<div class="header">
					<h3>Build Instructions (Mac OS X)</h3>
				</div>
				<div class="content">
				
				<p>
				Disclaimer: I am not a Mac expert - trying to compile Structure Synth in XCode was my first experience with Mac OS X.
</p><p>
First install Qt Open Source for Mac. I tested with 4.3.4, which worked for me. I used XCode 2.5 on Mac OS 10.4.7 (with Qt 4.3.4 Open Source).
</p><p>
Now check out the source (see the Linux build instructions), and type the following:
</p>
<p><pre>
qmake -project -after "CONFIG += opengl" 
qmake -spec macx-xcode
</pre></p>
<p>
Now an XCode project file has been created (mac.xcodeproj - actually a dir). 
Open this file in XCode. 
</p><p>
Open the 'mac' project, go to "External Frameworks and Libraries" and add QtOpenGL.framework and QtXml.framework by browsing to their locations. The header files now need to be added: go to 'Project | Edit Active Target 'mac'' and go to the Build tab. Add the following header search paths:</p>
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