<?php
include 'connection.php';

session_start();

if(!isset($_SESSION["phone"])){
    header("Location: adminlogin.php");
}

// Change status to 'paid' when confirmed
if (isset($_POST["confirm"])) {
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $update = "UPDATE orders SET status='paid' WHERE id='$id'";
    mysqli_query($conn, $update);
    //insert into sales table
    //retrieve data
    $retrieve = "SELECT * FROM orders WHERE id='$id' AND status='paid'";
    $execute= mysqli_query($conn,$retrieve);
    if($execute && mysqli_num_rows($execute)>0){
        $row = mysqli_fetch_assoc($execute);
        $name = $row["name"]; 
        $price= $row["price"]; 
        $quantity = $row["quantity"];

        $total = $price * $quantity;

        $insert = mysqli_query($conn,"INSERT INTO sales (product_name,quantity,price,total) VALUES('$name','$quantity','$price','$total')");
    }


    //delete the order
    $delete = "DELETE FROM orders WHERE id='$id' AND status ='paid'";
    mysqli_query($conn,$delete);



    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
<section class="welcomehome">
    <div class="side-bar">
        <ul>
            <a href="admin.php">Dashboard</a> <li> &nbsp;</li>
            <a href="foods.php">Foods</a> <li> &nbsp;</li>
            <a href="order.php">Orders</a> <li> &nbsp;</li>
            <a href="employees.php">Employees</a> <li> &nbsp;</li>
            <a href="reports.php">Reports</a> <li> &nbsp;</li>
        </ul>
    </div>

    <div class="dashboard">
        <div class="heading">
            <h1>Orders Details</h1>
            <?php
            // Read orders from the table
            $menu = "SELECT * FROM orders";
            $result = mysqli_query($conn, $menu);

            if (mysqli_num_rows($result) > 0) {
                echo "
                <table>
                    <thead>
                        <tr>
                            <th>PRODUCT</th>
                            <th>FOOD NAME</th>
                            <th>FOOD PRICE</th>
                            <th>QUANTITY</th>
                            <th>TABLE NO</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>";

                while ($data = mysqli_fetch_assoc($result)) {
                    $imagePath = !empty($data["file"]) ? "../images/" . htmlspecialchars($data["file"]) : "default.jpg";
                    echo "
                    <tr>
                        <td><img src='$imagePath' alt='Food Image'></td>
                        <td>" . htmlspecialchars($data["name"]) . "</td>
                        <td>" . htmlspecialchars($data["price"]) . "</td>
                        <td>" . htmlspecialchars($data["quantity"]) . "</td>
                        <td>" . htmlspecialchars($data["table_no"]) . "</td>
                        <td>" . htmlspecialchars($data["status"]) . "</td>
                        <td>
                            <form action='' method='POST'>
                                <input type='hidden' name='id' value='" . htmlspecialchars($data["id"]) . "'>
                                <input type='submit' name='confirm' value='Confirm Pay'>
                            </form>
                        </td>
                    </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "No orders found.";
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>
</section>

<style>
  body {
        font-family: Arial, sans-serif;
        margin: 20px;
        padding: 20px;
        background-color: rgb(245, 155, 20);
        background-position: fixed;
        width: vh;
    }
    .welcomehome {
        display: flex;
    }
    .side-bar {
        width: 250px;
        background-color: rgb(2, 3, 3);
        padding: 20px;
        height: 100vh;
        color: white;
    }
    .side-bar ul {
        list-style: none;
        padding: 0;
    }
    .side-bar a {
        text-decoration: none;
        color: white;
        display: block;
        padding: 10px 0;
    }
    .side-bar a:hover {
        background-color: rgb(235, 22, 15);
    }
    .dashboard {
        flex-grow: 1;
        padding: 10px;
    }
    .heading h1 {
        text-align: center;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        background-color: rgb(255, 255, 255);
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }
    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }
    th {
        background-color: rgb(3, 3, 3);
        color: white;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    button {
        padding: 8px 12px;
        margin-right: 5px;
        border: none;
        cursor: pointer;
    }
    button:first-child {
        background-color: #28a745;
        color: white;
    }
    button:last-child {
        background-color: #dc3545;
        color: white;
    }
</style>
</body>
</html>
