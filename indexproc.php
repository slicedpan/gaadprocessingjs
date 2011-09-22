<html>
	<head>
		<title>
			Processing.js Projects
		</title>
		<link rel="stylesheet" href="style.css" type="text/css" >
		<script type="text/javascript" src="processing-1.3.0.js">
			
		</script>
		<script type="text/javascript" src="boxes.js">
			
		</script>
	</head>
	<body>
		<div id="header">
			<canvas width="800" height="120" id="titleBanner">
				
			</canvas>
		</div>
		<div id="content" >
			<div class="entry">
				<canvas width="760" height="29" id="canvProjBanner" class="smallProcBanner"></canvas>
				<p>
					Here are all the current processing.js projects:
				</p>
				<ol>
					<?php
						$dir = opendir("./");
						$links = array ();
						while ($file = readdir($dir))
						{
							if (is_dir($file) && $file[0] != '.')
							{
								array_push($links, $file);					
							}
						}
						sort($links, SORT_STRING);
						//print_r($links);
						foreach ($links as $link)
						{
							echo "<li><a href=\"" . $link . "\" >" . $link . "</a></li>";
						}
					?>
				</ol>
			</div>
			<div class="entry">
				<canvas width="760" height="29" id="canvLinkBanner" class="smallProcBanner"></canvas>
				<p>
					Here are some useful links for processing.js development:
					<ol>
						<li>
							<a href="http://processingjs.org/">http://processingjs.org/</a> Processing.js homepage
						</li>
					</ol>
				</p>
			</div>
		</div>
		<script type="text/javascript">
			var canvas = document.getElementById("canvProjBanner");
			var bannerFunc = function (processing)
			{
				processing.size (760, 29);
				var color = new Object();
				color.r = 186;
				color.g = 95;
				color.b = 62;
				var font = processing.loadFont("Liberation Sans Regular");
				processing.textFont(font, 25);
				var box = new boxBanner();
				box.setupBoxes (processing, color, 50);
				processing.mouseOver = function () {box.mouseActive = true;};
				processing.mouseOut = function () {box.mouseActive = false;};
				processing.draw = function ()
				{
					processing.background(25);
					box.updateBoxes (processing);
					processing.fill(255);
					processing.text ("Projects", 2, 23);					
				}
			}
			var bannerProcessing = new Processing (canvas, bannerFunc);
			
			var linkCanvas = document.getElementById("canvLinkBanner");
			var linkBannerFunc = function (processing)
			{
				processing.size (760, 29);
				var color = new Object();
				color.r = 186;
				color.g = 95;
				color.b = 62;
				var font = processing.loadFont("Liberation Sans Regular");
				processing.textFont(font, 25);
				var box = new boxBanner();
				box.setupBoxes (processing, color, 50);
				processing.mouseOver = function () {box.mouseActive = true;};
				processing.mouseOut = function () {box.mouseActive = false;};
				processing.draw = function ()
				{
					processing.background(25);
					box.updateBoxes (processing);
					processing.fill(255);
					processing.text ("Links", 2, 23);					
				}
			}
			var linkBannerProcessing = new Processing (linkCanvas, linkBannerFunc);	
			
			var titleCanvas = document.getElementById("titleBanner");
			var titleFunc = function (processing)
			{
				processing.size (800, 120);
				var color = new Object();
				color.r = 186;
				color.g = 186;
				color.b = 186;
				var font = processing.loadFont("Liberation Sans Regular");
				processing.textFont(font, 32);
				var box = new boxBanner();
				box.setupBoxes (processing, color, 50);
				processing.mouseOver = function () {box.mouseActive = true;};
				processing.mouseOut = function () {box.mouseActive = false;};
				processing.draw = function ()
				{
					processing.background(25);
					box.updateBoxes (processing);
					processing.fill(255);
					processing.text ("Processing.js Projects", 2, 30);					
				}
			}
			var titleProcessing = new Processing (titleCanvas, titleFunc);		

		</script>
	</body>
</html>