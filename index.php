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
			<h1>Processing.js Projects</h1>
		</div>
		<div id="content" >
			<div class="entry">
				<h2 class="entryheader">Projects</h2>
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
				<h2 class="entryheader">Links</h2>
				<p>
					Here are some useful links for processing.js development:
					<ol>
						<li>
							<a href="http://processingjs.org/">http://processingjs.org/</a> Processing.js homepage
						</li>
						<li>
							<a href="indexproc.php">Processing Projects</a> This page with added processing
						</li>
					</ol>
				</p>
			</div>
		</div>

	</body>
</html>