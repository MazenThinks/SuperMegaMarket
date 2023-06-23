<?php
    include "config.php";

    // if the 'id' variable is set in the URL, we hnow that we need to edit a record
    if(isset($_GET['id'])){
        $product_id = $_GET['id'];

        //write delete query
        $sql  = "DELETE FROM `products` WHERE `id`= '$product_id'";

        //execute the query
        $result = $conn->query($sql);
        if ($result == TRUE) {

            echo "Record deleted successfully.";
          
    	}else{
			echo "Error:" . $sql . "<br>" . $conn->error;
		
    }
}
?>