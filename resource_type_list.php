<?php include 'includes/header.php'; ?>
	<h1>Resource type</h1>
		<ul>
			<?php
			require_once 'includes/dbcon.php';
			$sql = 'SELECT resource_type_id, resource_type_name FROM resource_type';
			$stmt = $link->prepare($sql);
			$stmt->execute();
			$stmt->bind_result($rtid, $rtnam);
			while($stmt->fetch()){
				echo '<li><a href="resourcelist.php?rt_id='.$rtid.'&rt_nam='.$rtnam.'">'.$rtnam.'</a>'.'  
				<a href="resource_rediger.php?rt_id='.$rtid.'"><img class="icon" src="img/edit.png" alt="Rediger" title="Rediger"></a>'.'  
				<a href="resource_slet.php?rt_id='.$rtid.'"><img class="icon" src="img/trash.png" alt="Slet" title="Slet" ></a></li>'.PHP_EOL;
				
			}
			?>
		</ul>

	<h2>Opret ny resource type</h2>
		<form action="magi_opret_resource.php" method="POST">
			
			<input type="text" name="rt_nam" placeholder="Resource navn"><br><br>
			    
	    	<input type="submit" name="submit_resource" value="Opret resource type" /><br>
			
		</form>



<?php include 'includes/footer.php'; ?>
