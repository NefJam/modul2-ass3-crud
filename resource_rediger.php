<?php include 'includes/header.php'; ?>

	<h1>Resource type</h1>
		<ul>
			<?php
			$rtid = filter_input(INPUT_GET, 'rt_id', FILTER_VALIDATE_INT) or die('missing parameter');
			require_once 'includes/dbcon.php';
			
			$sql = 'SELECT resource_type_name FROM resource_type WHERE resource_type_id=?';
			$stmt = $link->prepare($sql);
			$stmt->bind_param('i', $rtid);
			$stmt->execute();
			$stmt->bind_result($rtnam);
			



			while($stmt->fetch()){
				echo '<li><a href="resourcelist.php?rt_id='.$rtid.'&rt_nam='.$rtnam.'">'.$rtnam.'</a></li>'.PHP_EOL;
			}
			?>

			
		</ul>


	<h2>Rediger resource</h2>

		<form action="magi_resource_rediger.php" method="POST">
			<input type="hidden" name="rt_id" value="<?=$rtid?>" >
			<input type="text" name="rt_nam" value="<?=$rtnam?>"><br><br>
			    
	    	<input type="submit" name="submit_resource" value="Rediger resource" /><br>
			
		</form><br>

<a class="btn" href="resource_type_list.php">Tilbage til listen</a>

<?php include 'includes/footer.php'; ?>


