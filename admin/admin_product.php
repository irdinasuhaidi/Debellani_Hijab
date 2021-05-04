<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<?php 
include ('header.php');
?>
<style>
td, th, tr { 
	border: 1px solid black;
	border: collapse;
}
</style>
<script type="text/javascript">
function deleteOrder(id) {
	if (confirm("Are you sure you want to delete?")) {
		window.location.href = 'admin_product?deleteOrder='+ id;
		return true;
	} else {
		return false;
	 }
}
</script>
<?php
session_start();
if(!isset($_SESSION['email'])){
header("Location: index.php");
}
else
{    
?>

<?php

?>
<div class="w3-main" style="margin-left:340px;margin-right:40px;">
<div class="w3-container">
<h1 class="w3-large w3-text-grey"> Products </h1>
     <?php #  - add_product.php

             	     require_once ('mysql_connect.php'); // Connect to the db.	
             	     // Make the query.
             	     $query = "SELECT * from product";		
             	     $result = mysqli_query ($dbc, $query); // Run the query.
             	     $num = mysqli_num_rows($result);
             	     
             	     if ($num > 0) { // If it ran OK, display the records.
      
                 	// Table header.
                 	                 	echo '<table class="w3-table-all w3-hoverable">
                 	                 	<thead>
                 				<th class="text-left">Name</th>
								 <th class="text-left">Price (RM)</th> 
								 <th class="text-left"> Type </th>
								 <th class="text-left">Edit</th>
								 <th class="text-left"> Remove </th>

                 				</tr>
                 	
                 	                 ';        	     	
                 	// Fetch and print all the records.
                 	while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr><td class="text-left">' . $row['name'] . '</td>
									<td>' . $row['price'] . '</td>
									<td>' . $row['type'] . '</td>
									<td class="text-left"><center><a href="admin_editprod.php?id=' . $row ['id'] . '">
									<img src="/ACC/img/edit.jpg" width="20px" height="15px" title="Edit order"/><center></td>
									<td class="text-left"><center><a href="del.php?id=' . $row ['id'] . '" onclick = "return deleteOrder (' . $row['id'] . ');">
      	  							<img src="/ACC/img/delete.jpg" width="15px" height="15px"/></center>	  
									</tr>
                 	                 		';
                 	      
                 	             	     	}
                 	             	     
                 	             	     	echo '</table>';
             	     	
             	     	mysqli_free_result ($result); // Free up the resources.	
             	     }
             	     	
             	     	mysqli_close($dbc); // Close the database connection.
             	     	
                          ?> 
</br>
						  <a href="admin_addprod.php" class="w3-button w3-border">Add New Product</a>
						</div></div>
</html>
<?php
      }
      ?>