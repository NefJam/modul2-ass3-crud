<?php
	include 'includes/header.php';
	require_once 'includes/dbcon.php';
	
	

	
	$rtnam 	= filter_input(INPUT_POST, 'rt_nam', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[A-Za-z\\s]+/"))) or die('missing parameter');

	
	
		
	$sql = 'INSERT INTO resource_type (resource_type_name) VALUES (?)';

	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $rtnam);
	$stmt->execute();
?>

 <p>Den nye resource er nu oprettet!</p>

 <a class="btn" href="resource_type_list.php">Tilbage til listen</a>