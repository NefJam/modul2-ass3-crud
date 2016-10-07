<?php include 'includes/header.php'; ?>

<?php

	$rt_nam = filter_input(INPUT_GET, 'rt_nam', FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/[A-Za-z\\s]+/"))) or die('missing parameter');


	$rt_id = filter_input(INPUT_GET, 'rt_id', FILTER_VALIDATE_INT) or die('missing parameter');
?>

	<h1><?=$rt_nam?></h1>
	
	<ul>
	
<?php
	require_once 'includes/dbcon.php';
	
	$sql = 'SELECT rt.resource_type_name, r.resources_id, r.resource_name, r.resource_other_details
	FROM resources r, resource_type rt
	
	WHERE r.resource_type_resource_type_id = rt.resource_type_id
	AND r.resource_type_resource_type_id = ? 
	';



	$stmt = $link->prepare($sql);
	$stmt->bind_param('i', $rt_id);
	$stmt->execute();
	$stmt->bind_result($rtnam, $rid, $rnam, $rresot);

	while($stmt->fetch())
	{
		echo '<li><h3><a href="resource_details.php?rid='.$rid.'&rnam='.$rnam.'">'.$rnam.'</a>'.'
		<a href="resource_rediger_details.php?r_id='.$rid.'"><img class="icon" src="img/edit.png" alt="Rediger" title="Rediger"></a>'.'  
		<a href="resource_slet_details.php?r_id='.$rid.'"><img class="icon" src="img/trash.png" alt="Slet" title="Slet" ></a></h3></li>'.PHP_EOL;
		
	}


?>
		
	<h2>Opret ny resource</h2>

		<form action="magi_opret_resource_details.php" method="POST">
			
			
			<input type="hidden" name="rt_id" value="<?=$rt_id?>" >
			<input type="text" name="r_nam" placeholder="Navn"><br><br>
			<textarea rows="4" cols="50" name="r_resot" placeholder="Andre detalier" ></textarea><br><br>
			    
	    	<input type="submit" name="submit_resource" value="Opret resource" /><br><br>
			
		</form>
	

<a class="btn" href="resource_type_list.php">Tilbage til listen</a>


<?php include 'includes/footer.php'; ?>