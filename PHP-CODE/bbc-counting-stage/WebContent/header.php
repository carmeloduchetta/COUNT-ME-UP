<!DOCTYPE html>
<?php
	include_once 'definitions.php';
		
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="user-scalable=0, initial-scale=1.0" />
		<meta name="apple-mobile-web-app-capable" content="no" />
		<meta HTTP-EQUIV="Pragma" CONTENT="no-cache"/>
		<title>BBC</title>		
			
		<link href="<?php echo BBC_CUSTOM_CSS_STYLE; ?>css/main.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo BBC_CUSTOM_CSS_STYLE; ?>css/custom.css" rel="stylesheet" media="screen">
		<script src="<?php echo BBC_CUSTOM_CSS_STYLE; ?>js/custom.js" type="text/javascript" /></script>
		<script src="<?php echo BBC_CUSTOM_CSS_STYLE; ?>js/jquery.js" type="text/javascript" /></script>
		<script src="<?php echo BBC_CUSTOM_CSS_STYLE; ?>js/jquery-ui-dep.js" type="text/javascript" /></script>
		<script src="<?php echo BBC_CUSTOM_CSS_STYLE; ?>js/scripts.js" type="text/javascript" /></script>		
		<script src="<?php echo BBC_CUSTOM_CSS_STYLE; ?>js/jquery.validate.js" type="text/javascript" /></script>	
		
	</head>
	
	<?php 
		if(preg_match('/add-user/', $_SERVER['REQUEST_URI'])) {
			include 'includes/logonavigation.php';
		}
		else {
			include 'includes/navigation.php';
		}
		
	?>