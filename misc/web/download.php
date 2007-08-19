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
				<p>As of now there are no binary builds available. Within a month Windows executables will be available (September 2007), and at some point Linux and Mac executables will follow.</p>
	
	
 <p>The source code is hosted on SourceForge, and can be accessed using SVN (<a href="https://sourceforge.net/svn/?group_id=202402">see instructions</a>).</p>

 <p>It is only tested on Windows, so in order to get it to run on Mac / Linux some modifications might be necessary (but it is written using only standard C++ and with the cross-platform Qt API).</p>
  </div>
  </div>
  
  <div class="post">
				<div class="header">
					<h3>Build Instructions (Windows XP)</h3>
				</div>
				<div class="content">
  
  <p>
    A Visual Studio 2005 solution file is part of the project. The free <a href="http://msdn2.microsoft.com/en-us/express/default.aspx">Visual Studio Express C++ 2005</a> can be used to build Structure Synth.
  </p>
  <p>
    The <a href="http://trolltech.com/developer/downloads/qt">Qt 4.3/Windows Open Source Edition</a> is also necessary. The trickiest part is getting Qt compiled and installed with the Open Source version of Qt. <a href="http://wiki.qgis.org/qgiswiki/Building_QT_4_with_Visual_C++_2005">This tutorial explains how to do this</a>. Essentially you need to download a Patch file called <a href="http://sourceforge.net/project/showfiles.php?group_id=49109&amp;package_id=165202">'Advanced Compiler Support for 4.3.x'</a>. You will also need to install the <a href="http://www.microsoft.com/downloads/details.aspx?FamilyId=0BAF2B35-C656-4969-ACE8-E4C0C0716ADB&amp;displaylang=en">Microsoft Windows Platform SDK</a> since this is not part of the Express editions of Visual Studio - notice that 'Windows 2003 SDK...' is the correct version for Windows XP! (I haven't tried compiling on Vista).
  </p>
				</div>
			</div>
<?php
insertFooter("","");
?>