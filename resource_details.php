<?php
include 'includes/header.php';

$rid = filter_input(INPUT_GET, 'rid', FILTER_VALIDATE_INT) or die('missing parameter');

require_once 'includes/dbcon.php';
$sql = 'SELECT rt.resource_type_name, r.resources_id, r.resource_name, r.resource_other_details
FROM resources r, resource_type rt
WHERE r.resources_id = ?
AND r.resources_id = rt.resource_type_id
';

$stmt = $link->prepare($sql);
$stmt->bind_param('i', $rid);
$stmt->execute();

$stmt->bind_result($rtnam, $rid, $rnam, $rresdet);
while($stmt->fetch()){
	echo '<h1>'.$rnam.'</h1>'; 
	echo '<h3>'.$rtnam.'</h3>';
	echo '<p>'.$rresdet.'</p>';
	
}
?><br>















<a class="btn" href="resource_type_list.php">Tilbage til listen</a>

<?php include 'includes/footer.php'; ?>