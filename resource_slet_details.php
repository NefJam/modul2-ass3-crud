<?php
	include 'includes/header.php';
	$rid = filter_input(INPUT_GET, 'r_id', FILTER_VALIDATE_INT) or die('missing parameter');
			
	include 'includes/dbcon.php';

    $stmt = $link->prepare("DELETE FROM resources WHERE resources_id = $rid");
    $stmt->execute();
    echo '<p>Slettede '.$stmt->affected_rows.' resource</p>';

    echo '<a class="btn" href="resource_type_list.php">Tilbage til listen</a>';

?>
