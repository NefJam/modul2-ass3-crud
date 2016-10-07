<?php
	include 'includes/header.php'; 
	require_once 'includes/dbcon.php';
	$rtid = filter_input(INPUT_POST, 'rt_id', FILTER_VALIDATE_INT) or die('missing parameter');
	$rtnam 	= filter_input(INPUT_POST, 'rt_nam', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[A-Za-z\\s]+/"))) or die('Forkert!!!');

	

    $sql = "UPDATE resource_type SET resource_type_name=? WHERE resource_type_id=?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param('si', $rtnam, $rtid);
    $stmt->execute();

	if ($stmt->errno) {
  		echo "Der er sket en fejl!!! " . $stmt->error();
	}
	else {
		echo 'Updated '.$stmt->affected_rows.' rows';

		echo '<p>Resourcen <b>' .$rtnam. '</b> er nu redigeret!</p>';

 		echo '<a class="btn" href="resource_type_list.php">Tilbage</a>';
	}



?>