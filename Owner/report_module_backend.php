    <?php
        $conn = mysqli_connect("localhost", "root", "") or die ("Unable to Connect". mysqli_error($conn));
        mysqli_select_db($conn, 'itisdev');

	
	if (@$_GET['date1'] != null && @$_GET['date2']!=null)  {
	  // collect value of input field	
	  $date1 = $_GET['date1'];
	  $date2 = $_GET['date2'];
	  date_default_timezone_set('Asia/Manila');
	  $timestamp = date("Y-m-d h:i:sa");
			$sql = "
				SELECT 	i.ingredientID, i.ingredientName, SUM(oi.quantity * r.quantity) AS stock_out, u.unitName, i.quantity AS current_quantity
				FROM 	ingredient	i  		JOIN recipe 		r					ON r.ingredientID=i.ingredientID
											JOIN dish			d					ON d.dishID=r.dishID
											JOIN order_item		oi					ON oi.dishID=d.dishID
											JOIN orders			o					ON o.orderID=oi.orderID
											JOIN unit			u					ON u.unitID=i.unitID

				WHERE 	 DATE(o.createdAt) >= '$date1' 
				AND 	 DATE(o.createdAt) <= '$date2'
				AND		 d.status='Active'
				GROUP BY i.ingredientID
				ORDER BY i.ingredientName;";

			$sql2 = "
				SELECT 		re.ingredientID,i.ingredientName, SUM(re.quantity) as stock_in, u.unitName
				FROM 		ingredient i			JOIN	replenish 	re		ON re.ingredientID=i.ingredientID
													JOIN 	unit	 	u		ON u.unitID=i.unitID
 
				WHERE 		DATE(re.boughtDate) 	>= '$date1' 	
				AND 		DATE(re.boughtDate) 	<= '$date2' 
				GROUP BY 	re.ingredientID
				ORDER BY 	i.ingredientName;";
			$sql3 =  "
				SELECT 		e.ingredientID,i.ingredientName, SUM(e.quantity) as expired, u.unitName
				FROM 		ingredient i			JOIN	expired e		ON e.ingredientID=i.ingredientID
													JOIN 	unit	u		ON u.unitID=i.unitID
 
				WHERE 		DATE(e.expiredDate) 	>= '$date1' 	
				AND 		DATE(e.expiredDate) 	<= '$date2' 
				GROUP BY 	e.ingredientID
				ORDER BY 	i.ingredientName;";

			$sql4 =  "
						SELECT 		d.ingredientID,i.ingredientName, d.sQuantity as system_quantity, d.mQuantity as manual_quantity
			    		FROM 		ingredient i			JOIN	disparity d		ON d.ingredientID=i.ingredientID
			    		WHERE 		DATE(d.createdAt) 	>= '$date1' 	
			    		AND 		DATE(d.createdAt) 	<= '$date2' 
						ORDER BY 	i.ingredientName;";		

			$records = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			$stockResult = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
			$expiredResult = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
			$disparityResult = mysqli_query($conn, $sql4) or die(mysqli_error($conn));

			$stock_in = [];
			while($stockResults = mysqli_fetch_array($stockResult))
			{
				$id = $stockResults['ingredientID'];
				$ingredientName = $stockResults['ingredientName'];
				$stockIn = $stockResults['stock_in'];
				$unit = $stockResults['unitName'];

				$stocks = array(
					'ingredientID' => $id,
					'ingredientName' => $ingredientName,
					'stock_in' => $stockIn,
					'unitName' => $unit
					 );
					
				array_push($stock_in, $stocks);	 	 
			}

			$expired_array = [];
			while($expiredResults = mysqli_fetch_array($expiredResult))
			{
				$id = $expiredResults['ingredientID'];
				$ingredientName = $expiredResults['ingredientName'];
				$expired_qty = $expiredResults['expired'];
				$unit = $expiredResults['unitName'];

				$expired = array(
					'ingredientID' => $id,
					'ingredientName' => $ingredientName,
					'expired_qty' => $expired_qty,
					'unitName' => $unit
					 );
					
				array_push($expired_array, $expired);	 	 
			}

			$disparities_array = [];
			while($disparities = mysqli_fetch_array($disparityResult))
			{
				$id = $disparities['ingredientID'];
				$ingredientName = $disparities['ingredientName'];
				$sys_qty = $disparities['system_quantity'];
				$man_qty = $disparities['manual_quantity'];
				$value = $sys_qty - $man_qty;

				if($value > 0){
					$identifier = "STOCK_OUT";
				}
				else if($value < 0){
					$identifier = "STOCK_IN";
					$value = abs($value);
				}

				$disparity = array(
					'ingredientID' => $id,
					'ingredientName' => $ingredientName,
					'value' => $value,
					'identifier' => $identifier
				);
							
				array_push($disparities_array, $disparity);	 	 
			}
			?>
			<div class="reportlabels">
    		<h3>Report Created <?php echo "$timestamp"; ?></h3>
    		<h3>Report for <?php echo "$date1";?> to <?php echo "$date2"; ?></h3>
			</div>
    		<table class="reporttable">
    		<th>Ingredient</th>
    		<th>Stock In</th>
    		<th>Stock Out</th>
			<th>Unit</th>
			<th>Current Quantity</th>

			<?php
			$in_counter = 0;
			$in = 0;
			$out_counter = 0;
			$out = 0;
			 while($results = mysqli_fetch_array($records))
			{
				$ingredientName = $results['ingredientName'];
			?>
			<tr onclick="window.location.href='detailed_report.php?results=<?php echo $ingredientName; ?>&date1=<?php echo $date1; ?>&date2=<?php echo $date2; ?>';">
			<td ><?php echo "$ingredientName"; ?></td>

			<?php
				$temp_in = 0;
						$temp_out = 0;
						foreach ($disparities_array as $dis) {
							
							if($dis['ingredientName'] == $ingredientName){
								if($dis['identifier'] == "STOCK_IN"){
									$temp_in += $dis['value'];
								}
								else if($dis['identifier'] == "STOCK_OUT"){
									$temp_out += $dis['value'];
								}
							}
			
						}
					
						foreach ($stock_in as $stockIn) {
							if($stockIn['ingredientName'] == $ingredientName){
								$in_counter++;
								$in = $stockIn['stock_in'];
							}
			
						}

						if($in_counter == 0){
							if ($temp_in != 0){
								$in += $temp_in;
								echo"<td>".$in."</td>";
								$in = 0;
							}
							else{
								$in = 0;
								echo"<td>".$in."</td>";
							}
		
						}
						else{
							$in += $temp_in;
							echo"<td>".$in."</td>";
							$in_counter = 0;
							$in = 0;
						}
		
						foreach ($expired_array as $exp) {
							if($exp['ingredientName'] == $ingredientName){
								$out_counter++;
								$out = $exp['expired_qty'];
							}
						}
						if($out_counter == 0){
							if($temp_out != 0 ){
								$out += $temp_out;
								$out += $results['stock_out'];
								echo"<td>".$out."</td>";
								$out = 0;
							}
							else{
								$out = 0;
								echo"<td>".$results['stock_out']."</td>";
							}
		
						}
						else{
							$out += $temp_out;
							$out += $results['stock_out'];
							echo"<td>".$out."</td>";
							$out_counter = 0;
							$out = 0;
						}

						echo"<td>".$results['unitName']."</td>";
						echo"<td>".$results['current_quantity']."</td>";
				?>

		<?php } ?>
		<?php
    		echo '</table>';
			?>
			<div class="reportlabels">
			<h3>*END OF REPORT*</h3>
			</div>
			<?php
		}
	elseif($_SERVER["REQUEST_METHOD"] == "POST"){
			  // collect value of input field	
			  $date1 = $_POST['date1'];
			  $date2 = $_POST['date2'];
			  date_default_timezone_set('Asia/Manila');
			  $timestamp = date("Y-m-d h:i:sa");
					$sql = "
						SELECT 	i.ingredientID, i.ingredientName, SUM(oi.quantity * r.quantity) AS stock_out, u.unitName, i.quantity AS current_quantity
						FROM 	ingredient	i  		JOIN recipe 		r					ON r.ingredientID=i.ingredientID
													JOIN dish			d					ON d.dishID=r.dishID
													JOIN order_item		oi					ON oi.dishID=d.dishID
													JOIN orders			o					ON o.orderID=oi.orderID
													JOIN unit			u					ON u.unitID=i.unitID
	
						WHERE 	 DATE(o.createdAt) >= '$date1' 
						AND 	 DATE(o.createdAt) <= '$date2'
						AND		 d.status='Active'
						GROUP BY i.ingredientID
						ORDER BY i.ingredientName;";
		
					$sql2 = "
						SELECT 		re.ingredientID,i.ingredientName, SUM(re.quantity) as stock_in, u.unitName
						FROM 		ingredient i			JOIN	replenish 	re		ON re.ingredientID=i.ingredientID
															JOIN 	unit	 	u		ON u.unitID=i.unitID
 
						WHERE 		DATE(re.boughtDate) 	>= '$date1' 	
						AND 		DATE(re.boughtDate) 	<= '$date2' 
						GROUP BY 	re.ingredientID
						ORDER BY 	i.ingredientName;";

		
					$sql3 =  "
						SELECT 		e.ingredientID,i.ingredientName, SUM(e.quantity) as expired, u.unitName
						FROM 		ingredient i			JOIN	expired e		ON e.ingredientID=i.ingredientID
													JOIN 	unit	u		ON u.unitID=i.unitID
 
						WHERE 		DATE(e.expiredDate) 	>= '$date1' 	
						AND 		DATE(e.expiredDate) 	<= '$date2' 
						GROUP BY 	e.ingredientID
						ORDER BY 	i.ingredientName;";
					
					$sql4 =  "
						SELECT 		d.ingredientID,i.ingredientName, d.sQuantity as system_quantity, d.mQuantity as manual_quantity
			    		FROM 		ingredient i			JOIN	disparity d		ON d.ingredientID=i.ingredientID
			    		WHERE 		DATE(d.createdAt) 	>= '$date1' 	
			    		AND 		DATE(d.createdAt) 	<= '$date2' 
						ORDER BY 	i.ingredientName;";	
		
					$records = mysqli_query($conn, $sql) or die(mysqli_error($conn));
					$stockResult = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
					$expiredResult = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
					$disparityResult = mysqli_query($conn, $sql4) or die(mysqli_error($conn));
		
					$stock_in = [];
					while($stockResults = mysqli_fetch_array($stockResult))
					{
						$id = $stockResults['ingredientID'];
						$ingredientName = $stockResults['ingredientName'];
						$stockIn = $stockResults['stock_in'];
						$unit = $stockResults['unitName'];

						$stocks = array(
							'ingredientID' => $id,
							'ingredientName' => $ingredientName,
							'stock_in' => $stockIn,
							'unitName' => $unit
					 		);
							
						array_push($stock_in, $stocks);	 	 
					}
		
					$expired_array = [];
					while($expiredResults = mysqli_fetch_array($expiredResult))
					{
						$id = $expiredResults['ingredientID'];
						$ingredientName = $expiredResults['ingredientName'];
						$expired_qty = $expiredResults['expired'];
						$unit = $expiredResults['unitName'];

						$expired = array(
							'ingredientID' => $id,
							'ingredientName' => $ingredientName,
							'expired_qty' => $expired_qty,
							'unitName' => $unit
					 		);
							
						array_push($expired_array, $expired);	 	 
					}

					$disparities_array = [];
					while($disparities = mysqli_fetch_array($disparityResult))
					{
						$id = $disparities['ingredientID'];
						$ingredientName = $disparities['ingredientName'];
						$sys_qty = $disparities['system_quantity'];
						$man_qty = $disparities['manual_quantity'];
						$value = $sys_qty - $man_qty;

						if($value > 0){
							$identifier = "STOCK_OUT";
						}
						else if($value < 0){
							$identifier = "STOCK_IN";
							$value = abs($value);
						}

						$disparity = array(
							'ingredientID' => $id,
							'ingredientName' => $ingredientName,
							'value' => $value,
							'identifier' => $identifier
					 		);
							
						array_push($disparities_array, $disparity);	 	 
					}
					?>
					<div class="reportlabels">
					<h3>Stock Report</h3>
					<h3>Report Created <?php echo "$timestamp"; ?></h3>
					<h3>Report for <?php echo "$date1";?> to <?php echo "$date2"; ?></h3>
					</div>
					<table class="reporttable">
					<th>Ingredient</th>
					<th>Stock In</th>
					<th>Stock Out</th>
					<th>Unit</th>
					<th>Current Quantity</th>

		
					<?php
					$in_counter = 0;
					$in = 0;
					$out_counter = 0;
					$out = 0;
					 while($results = mysqli_fetch_array($records))
					{
						$ingredientName = $results['ingredientName'];
					?>
					<tr onclick="window.location.href='detailed_report.php?results=<?php echo $ingredientName; ?>&date1=<?php echo $date1; ?>&date2=<?php echo $date2; ?>';">
					<td ><?php echo "$ingredientName"; ?></td>
		
					<?php
						$temp_in = 0;
						$temp_out = 0;
						foreach ($disparities_array as $dis) {
							
							if($dis['ingredientName'] == $ingredientName){
								if($dis['identifier'] == "STOCK_IN"){
									$temp_in += $dis['value'];
								}
								else if($dis['identifier'] == "STOCK_OUT"){
									$temp_out += $dis['value'];
								}
							}
			
						}
					
						foreach ($stock_in as $stockIn) {
							if($stockIn['ingredientName'] == $ingredientName){
								$in_counter++;
								$in = $stockIn['stock_in'];
							}
			
						}

						if($in_counter == 0){
							if ($temp_in != 0){
								$in += $temp_in;
								echo"<td>".$in."</td>";
								$in = 0;
							}
							else{
								$in = 0;
								echo"<td>".$in."</td>";
							}
		
						}
						else{
							$in += $temp_in;
							echo"<td>".$in."</td>";
							$in_counter = 0;
							$in = 0;
						}
		
						foreach ($expired_array as $exp) {
							if($exp['ingredientName'] == $ingredientName){
								$out_counter++;
								$out = $exp['expired_qty'];
							}
						}
						if($out_counter == 0){
							if($temp_out != 0 ){
								$out += $temp_out;
								$out += $results['stock_out'];
								echo"<td>".$out."</td>";
								$out = 0;
							}
							else{
								$out = 0;
								echo"<td>".$out."</td>";
							}
		
						}
						else{
							$out += $temp_out;
							$out += $results['stock_out'];
							echo"<td>".$out."</td>";
							$out_counter = 0;
							$out = 0;
						}

						echo"<td>".$results['unitName']."</td>";
						echo"<td>".$results['current_quantity']."</td>";
						?>
		
				<?php } ?>
				<?php
					echo '</table>';
					?>
					<div class="reportlabels">
					<h3>*END OF REPORT*</h3>
					</div>
					<?php
	} 

		mysqli_close($conn);
		?>
    </body>
</html>