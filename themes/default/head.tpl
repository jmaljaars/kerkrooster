<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title><?php echo $this->title; ?></title>
<link rel="stylesheet" href="./themes/default/style/stylesheet.css">
<link rel="stylesheet" href="./themes/<?php echo THEME; ?>/style/stylesheet.css">
<link rel="stylesheet" href="./themes/default/javascript/jquery/jquery-ui.min.css">

	<?php 
		foreach($this->scripts as $script){
			echo $script;
		}
	?>

</head>