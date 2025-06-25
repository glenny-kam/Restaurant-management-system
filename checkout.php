<?php 
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method='post'>
    <label for="">Quantity</label>
    <input type="text" name="quantity" placeholder="quantity" value='1' required>
    <label for="">Table Number</label>
    <input type="text" name = "table_no" placeholder="table number" required>
    <button type='submit' name='order'>submit</button>

    <?php
    
    if(isset($_POST["order"])) {
        $quantity = mysqli_real_escape_string($conn, $_POST["quantity"]);
        $table_no = mysqli_real_escape_string($conn, $_POST["table_no"]);
    
        // Ensure 'id' is received via GET
        if(isset($_GET["id"])) {
            $id = mysqli_real_escape_string($conn, $_GET["id"]);
    
            // Retrieve food item details
            $retrieve = "SELECT * FROM foods WHERE id = '$id'";
            $outcome = mysqli_query($conn, $retrieve);
    
            if($outcome && mysqli_num_rows($outcome) > 0) {
                while($data = mysqli_fetch_assoc($outcome)) {
                    $file = $data["file"];
                    $name = $data["name"];
                    $price = $data["price"];

                    $totalprice = $price*$quantity;
    
                    // Insert order
                    $insertorder = "INSERT INTO orders (file, name, price, quantity, table_no,status) 
                                    VALUES ('$file', '$name', '$price', '$quantity', '$table_no','waiting')";
                    $execute = mysqli_query($conn, $insertorder);
    
                    if($execute) {
                        echo "Order submitted successfully!  Ksh. $totalprice ";
                    } else {
                        echo "Error submitting order: " . mysqli_error($conn);
                    }
                }
            } else {
                echo "Food item not found!";
            }
        } else {
            echo "Error: No food ID provided.";
        }
    }
    
    ?>
   
</form>
<style>
    body{
        margin:10px;
        padding:5px;
        height: 100vh;
        width: 100vh;
        border:1px solid red;
        margin top: 10px;
        background:white;
        justify content:center;
        align-items:center;
    }
    form {
    max-width: 300px;
    margin: 20px auto;
    padding: 20px;
    background:rgb(238, 238, 238);
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    gap: 10px;
}

input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
}

input:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

button {
    background: #007bff;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
}

button:hover {
    background: #0056b3;
}


</style>
    
</body>
</html>