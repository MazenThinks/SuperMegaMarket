<?php

include "config.php";

    // if the form's update button is clicked, we need to procss the form
    	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$product_id = $_POST['product_id'];
		$price = $_POST['price'];

		// write the update query
		$sql = "UPDATE `products` SET `name`='$name',`price`='$price' WHERE `id`='$product_id'";

		// execute the query
		$result = $conn->query($sql);

		if ($result == TRUE) {
			echo "Record updated successfully.";
		}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		}
	}
    

    // if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$product_id = $_GET['id'];

	// write SQL to get user data
	$sql = "SELECT * FROM `products` WHERE `id`='$product_id'";

	//Execute the sql
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$name = $row['name'];
			$price = $row['price'];
			$id = $row['id'];
		}

	?>
		<h2>User Update Form</h2>
		<form action="" method="post">
		  <fieldset>
		    <legend>Personal information:</legend>
		    name:<br>
		    <input type="text" name="name" value="<?php echo $name; ?>">
		    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
		    <br>
		    price:<br>
		    <input type="text" name="price" value="<?php echo $price; ?>">
		    <br><br>
		    <input type="submit" value="Update" name="update">
		  </fieldset>
		</form>

		</body>
		</html>




	<?php
	} else{
		// If the 'id' value is not valid, redirect the user back to view.php page
		header('Location: view.php');
	}

}
?>