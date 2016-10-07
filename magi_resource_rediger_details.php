<?php
	include 'includes/header.php'; 
	require_once 'includes/dbcon.php';
	$rid = filter_input(INPUT_POST, 'r_id', FILTER_VALIDATE_INT) or die('missing parameter');
	$rnam 	= filter_input(INPUT_POST, 'r_nam', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[A-Za-z\\s]+/"))) or die('Forkert!!!');
	$rodet	= filter_input(INPUT_POST, 'rodet', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[A-Za-z\\s]+/"))) or die('Forkert!!!');

	

    $sql = "UPDATE resources SET resource_name=?, resource_other_details=? WHERE resources_id=?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param('ssi', $rnam, $rodet, $rid);
    $stmt->execute();

	if ($stmt->errno) {
  		echo "Der er sket en fejl!!! " . $stmt->error();
	}
	else {
		echo 'Updated '.$stmt->affected_rows.' rows';

		echo '<p>Resourcen <b>' .$rnam. '</b> er nu redigeret!</p>';

 		echo '<a class="btn" href="resource_type_list.php">Tilbage</a>';
	}



?>