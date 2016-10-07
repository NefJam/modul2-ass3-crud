<?php
	include 'includes/header.php';
	require_once 'includes/dbcon.php';
	
	

	
	$rnam 	= filter_input(INPUT_POST, 'r_nam', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[A-Za-z\\s]+/"))) or die('missing parameter');

	$rresot = filter_input(INPUT_POST, 'r_resot', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[A-Za-z\\s]+/"))) or die('missing parameter');

	$rtid = filter_input(INPUT_POST, 'rt_id', FILTER_VALIDATE_INT) or die('missing parameter');

	
	
		
	$sql = 'INSERT INTO resources (resource_name, resource_other_details, resource_type_resource_type_id) VALUES (?, ?, ?)';

	$stmt = $link->prepare($sql);
	$stmt->bind_param('ssi', $rnam, $rresot, $rtid);
	$stmt->execute();
?>

 <p>De nye detalier for <b><?=$rnam?></b> er nu oprettet!</p>

 <a class="btn" href="resource_type_list.php">Tilbage til listen</a>