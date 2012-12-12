<?php include 'include/global.php' ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

	<head>
	
		<title>404 - Not Found | <?=SITE_NAME?></title>
		
		<style type="text/css">
		
			#body {
				width: 588px;
			}
		
		</style>
		
		<?php include 'include/head.php' ?>
	
	</head>
	
	<body>
		
		<?php message("Good job. You broke it."); include 'include/template/global/header.php' ?>
		
		<?php include 'include/template/global/side.php' ?>
		
		<div id="body"><?php include 'include/template/global/404.php' ?></div>
		
		<div class="clear"></div>
	
		<?php include 'include/template/global/footer.php' ?>
		
	</body>
	
</html>