<?php
    include "config.php";

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $price = $_POST['price'];


  //write sql query
  $sql = "INSERT INTO `products`(`name`, `price`) VALUES ('$name','$price')";
//execute the query 
$result = $conn->query($sql);
if ($result == TRUE) {
    echo "new record created successfully.";

}else{
    echo "Error:" . $sql . "<br>" . $conn->error;
}

$conn->close();


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Products</title>
    <h1>Create products</h1>
</head>
<body>
    <form action="" method="POST">
        <fieldset>
            <legend>Products information</legend>
            name:<br>
            <input type="text" name="name">
            <br>
            price:<br>
            <input type="number" name="price">
            <br> 
            <br>
         <input type="submit" name="submit" value="submit">
           
        </fieldset>
    </form>
</body>
</html>