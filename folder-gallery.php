<?php
	/* 			Folder-Gallery 					*/
	/* A simple bootstrap-powered gallery 		*/
	/* created by placing pictures in folders 	*/
	/* (C) 2013 Marco Cirillo 					*/
	/* SETUP */
	
	/* galleries are placed in the gallery directory, as defined in the $gallery variable */
	$gallery = 'gallery';
	
	/* END SETUP */

	$current_dir = NULL;	// Initially null, will be filled in if the current dir is valid
	
	if( (!isset($_GET['gallery'])) || ($_GET['gallery'] == "") ) {
	// send user to latest gallery
		header("Location: index.php?gallery=latest");
		exit;
	} else {
	// check if gallery exists
	
		$current_dir = $gallery . '/' . $_GET['gallery'];
		if(!count(glob($current_dir . '/*'))) {
		/* This directory has no files, 
		 * let's assume the user made an error and send them to the latest gallery
		 */
			header("Location: index.php?gallery=latest");
			exit;
		}
	}
	
	// Get all directories (galleries) in the $gallery directory
	$directories = glob($gallery . '/*' , GLOB_ONLYDIR);
	
	// Set the current folder based on the page the user requested
	$folder = $_GET['gallery'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>folder-gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="css/screen.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/icon/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/icon/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/icon/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="img/icon/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="img/icon/favicon.png">
	
	<!-- Sharing -->
	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "c1bee76d-57e6-4119-b0cb-22e60ba62a93", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
  </head>

  <body>
    <div class="container">

	  <!-- Carousel -->
		<div id="imgCarousel" class="carousel slide">
			<ol class="carousel-indicators">
				<!-- Carousel slide numbers are 0-indexed -->
				<?php
					$i = 0;
					foreach (glob($current_dir . '/*') as $file) {
						echo "<li data-target='#imgCarousel' data-slide-to='$i' ";
						if ($i++ == 0) echo 'class="active"';	// set first item as active item
						echo "></li>";
					}
				?>
			</ol>

			<!-- Carousel items -->
			<div class="carousel-inner">
				<?php
					$i = 0;
					foreach (glob($current_dir . '/*') as $file) {
						
						// set first item as active
						if ($i++ == 0) echo '<div class="active item">';
						else echo '<div class="item">';
						
						//$link = rawurlencode($file);
						echo "<img src='$file' alt=''>";
						echo '</div>';
					}
				?>
			</div>
		
			<!-- Carousel nav -->
			<a class="carousel-control left" href="#imgCarousel" data-slide="prev">&lsaquo;</a>
			<a class="carousel-control right" href="#imgCarousel" data-slide="next">&rsaquo;</a>
		</div>
		
		<div>
			<h1>Galleries</h1>
			<ul>
			<?php 
				foreach ($directories as $dir) {
					$name = str_replace($gallery . '/', "", $dir);
					$files = glob($dir . '/*');
					$size = count($files);
					echo "<li><a href='index.php?gallery=$name'>$name</a></li>";
				}
			?>
			</ul>
		</div>		
		

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
	// Start the carousel
	$().ready(function(){
		$('.carousel').carousel({
		interval: 2000
		});
	});
	</script>

  </body>
</html>
