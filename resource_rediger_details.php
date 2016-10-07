<?php include 'includes/header.php'; ?>

	<h1>Resource details</h1>
		<ul>
			<?php
			$rid = filter_input(INPUT_GET, 'r_id', FILTER_VALIDATE_INT) or die('missing parameter');
			require_once 'includes/dbcon.php';
			
			$sql = 'SELECT resource_name, resource_other_details FROM resources WHERE resources_id=?';
			$stmt = $link->prepare($sql);
			$stmt->bind_param('i', $rid);
			$stmt->execute();
			$stmt->bind_result($rnam, $rodet);
			



			while($stmt->fetch()){
				// echo '<li><a href="resourcelist.php?rt_id='.$rtid.'&rt_nam='.$rtnam.'">'.$rtnam.'</a>'.'  <a href="resource_rediger.php?rt_id='.$rtid.'"><img class="icon" src="img/edit.png" alt="Rediger" title="Rediger"></a>'.'  <a href="resource_slet.php?rt_id='.$rtid.'"><img class="icon" src="img/trash.png" alt="Slet" title="Slet" ></a></li>'.PHP_EOL;
			}
			?>

			
		</ul>


	<h2>Rediger resourcen <? '$rnam' ?></h2>

		<form action="magi_resource_rediger_details.php" method="POST">
			<input type="hidden" name="r_id" value="<?=$rid?>" >
			<input type="text" name="r_nam" value="<?=$rnam?>"><br><br>
			<textarea rows="4" cols="50" name="rodet" ><?=$rodet?></textarea><br><br>
			    
	    	<input type="submit" name="submit_resource" value="Rediger resource" /><br>
			
		</form><br>

<a class="btn" href="resource_type_list.php">Tilbage til listen</a>

<?php include 'includes/footer.php'; ?>


