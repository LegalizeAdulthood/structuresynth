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
				<p>The current version of Structure Synth is Version 1.5 (Hinxton).
				<p/>
				
				<table class="download"><tr><td><img src="images/windows.png" width="85px" /></td><td>
				<p><b>Windows build</b> (for XP, Vista, and 7):</p>
	<p>Installer:<br /><a href="http://sourceforge.net/projects/structuresynth/files/Structure%20Synth/StructureSynth-Windows_Binary_v1.5.0.exe/download">StructureSynth-Windows_Binary-v1.5.0.exe</a></p>
	<p>Zip-archive (portable, just extract and run):<br /><a href="http://sourceforge.net/projects/structuresynth/files/Structure%20Synth/StructureSynth-Windows_Binary_v1.5.0.zip/download">StructureSynth-Windows_Binary-v1.5.0.zip</a></p>
				</td></tr><tr><td><img src="images/apple.png" width="85px" /></td><td>
	
		<p><b>Mac build</b> (Universal binary, Mac OS 10.6):</p>
	<p><a href="http://downloads.sourceforge.net/structuresynth/StructureSynth-Mac_Universal_v1.5.0.zip?use_mirror=mesh">StructureSynth-Mac_Universal_v1.5.0.zip</a></p>
	<p>(Thanks for David Burnett for providing this - for an outline of the build process see <a href="https://sourceforge.net/forum/message.php?msg_id=6239736">this forum post</a>) </p>
	
	</td></tr><tr><td><img src="images/tux.png" width="85px" /></td><td>
	
	<p><b>Linux</b>:</p> 
	<p>For Debian and Ubuntu, there is a 'structure-synth' package. (Thanks to Miriam Ruiz for maintaining this).</p>
	<p>For other platforms, you will have to build it yourself. See the build instructions below. The source of the latest release can be found here: <a href="http://sourceforge.net/projects/structuresynth/files/Structure%20Synth/StructureSynth-Source-v1.5.0.zip/download">StructureSynth-Source-v1.5.0.zip</a></p>
 <p>For the latest changes, it is recommended to pull the source code directly from the SourceForge repository. It can be accessed using SVN (<a href="https://sourceforge.net/svn/?group_id=202402">see instructions</a>).</p>
 

 </td></tr></table>
	

  </div>
  </div>
  
 
 
 <div class="post">
				<div class="header">
					<h3>Build Instructions (Windows XP, Vista, and 7)</h3>
				</div>
				<div class="content">
  
  <p>
    A Visual Studio 2008 solution file is part of the project. The free <a href="http://msdn2.microsoft.com/en-us/express/default.aspx">Visual Studio Express C++ 2008</a> can be used to build Structure Synth.
  </p>
  <p>You will need to install the <a href="http://www.microsoft.com/downloads/details.aspx?FamilyId=0BAF2B35-C656-4969-ACE8-E4C0C0716ADB&amp;displaylang=en">Microsoft Windows Platform SDK</a> since this is not part of the Express editions of Visual Studio - notice that 'Windows 2003 SDK...' is the correct version for Windows XP. On Windows Vista use the <a href="http://www.microsoft.com/downloads/details.aspx?FamilyId=E6E1C3DF-A74F-4207-8586-711EBE331CDC&displaylang=en">Windows SDK for Windows Server 2008</a>.
  </p>
  <p>
  You will also need to download Qt 4. Make sure you get a version for Visual C++. Precompiled version for Mingw will not work.
  </p>
  <p>
 For a guide to installing and compiling Qt, see this <a href="http://tom.paschenda.org/blog/?p=28">Qt installation guide</a>. (Update: Nokia provides precompiled builds for Windows now)
  </p>
 
  </div></div>
 
 
  
  <div class="post">
   <div class="header">
					<h3>Build Instructions (Linux)</h3>
				</div>
				<div class="content">
				
				<p>
				These instructions should work for Ubuntu 10.10 (but Structure Synth is known to compile on many other distributions). If you encounter graphics trouble, you might have to turn off any advanced 3D desktop effects.
				</p>
				<p>
You will need to have a C++ compiler, X11, Qt4, and OpenGL development libs (and Subversion if fetching the source directly from the repository):</p>

 <code>
# sudo apt-get install build-essential libx11-dev mesa-common-dev libgl1-mesa-dev libglu1-mesa-dev subversion libxext-dev libqt4-opengl-dev <br/>
</code>
<p>(No line breaks!)</p>
<p>If you are feeling adventurous, get the latest <a href="http://sourceforge.net/svn/?group_id=202402">Structure Synth sources</a> otherwise download the latest zipped release above (releases are more stable).
</p>
<p>Build Structure Synth. Navigate to the 'Build/Linux' directory and run the build script:</p>
<code>$ sh build.sh
</code>
  <p><br />That's it. Enjoy.</p>
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
First install <a href="http://www.qtsoftware.com/downloads">Qt Open Source</a> for Mac (version 4.5.0 or later). 
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
Open the 'mac' project, go to "External Frameworks and Libraries" and add QtScript.framework, QtOpenGL.framework and QtXml.framework by browsing to their locations. The header files now need to be added: go to 'Project | Edit Active Target 'mac'' and go to the Build tab. Add the following header search paths:</p>
<p><pre>'(qt_dir)/lib/QtOpenGL.framework/Versions/4/Headers' <br/>'(qt_dir)/lib/QtScript.framework/Versions/4/Headers' <br/>'(qt_dir)/Qt-4.3.4/lib/QtXML.framework/Versions/4/Headers'  </pre>
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