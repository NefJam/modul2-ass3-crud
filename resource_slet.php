<?php
	include 'includes/header.php';
	$rtid = filter_input(INPUT_GET, 'rt_id', FILTER_VALIDATE_INT) or die('missing parameter');
			require_once 'includes/dbcon.php';

    $stmt = $link->prepare("DELETE FROM resource_type WHERE resource_type_id=$rtid");
    $stmt->execute();
    echo '<p>Slettede '.$stmt->affected_rows.' resource</p>';

    echo '<a class="btn" href="resource_type_list.php">Tilbage til listen</a>';

?>
