
<?php

session_start();

if(!isset($_SESSION["phone"])){
    header("Location: adminlogin.php");
}

include 'connection.php';

$orders = mysqli_query($conn, "SELECT * FROM sales ") or die ('cant select from table ');
 $ordersadd = mysqli_num_rows($orders);

 $pendingorders = mysqli_query($conn, "SELECT * FROM orders WHERE status='waiting' ") or die ('cant select from table ');
 $pendingordersadd = mysqli_num_rows($pendingorders);

 $employees = mysqli_query($conn, "SELECT * FROM employees ") or die ('cant select from table ');
 $employeesadd = mysqli_num_rows($employees);

//  $farmers = mysqli_query($conn, "SELECT * FROM farmers ") or die ('cant select from table ');
//  $farmersadd = mysqli_num_rows($farmers);

// $orders = mysqli_query($conn,"SELECT * FROM orders") or die('cant select from oders table');
// $ordersadd = mysqli_num_rows($orders);

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
        <!-- <div class="logo-name">
            <h1>LOGO</h1>
        </div> -->
        <ul>
        <a href="admin.php">Dashboard</a> <li> &nbsp;</li>
            <a href="foods.php">Foods</a> <li> &nbsp;</li>
            <a href="order.php">orders</a> <li> &nbsp;</li>
            <a href="employees.php">Employees</a> <li> &nbsp;</li>
            
           
            
            <a href="logout.php"> Log Out</a> <li> &nbsp;</li>
            
        </ul>
    </div>

    <div class="dashboard">
    <p>Welcome to Glenny’s Restaurant and Eateriees</p>
    <div class="boxes">
        <div class="box1">
            <h2>To generate reports</h2>
               <a href="pdfgenerator.php">click here</a>
        </div>
        <div class="box1">
            <h2>ORDERS</h2>
            <?php
                echo " <div class='count'>$ordersadd</div>";
               
            ?>
              
        </div>
        <div class="box1">
            <h2>EMPLOYEES</h2>
            <?php
                echo " <div class='count'>$employeesadd</div>";
                
                
            ?>
             
        </div>
        <div class="box1">
        <h2>PENDING ORDERS</h2>
        <?php
                echo " <div class='count'> $pendingordersadd</div>";
                
                
            ?>
              
        </div>

    </div>
    <style>
        .boxes{
        
            height: 60vh;
            margin-top: 10vh;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }
        .box1{
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 1vh;
            height: 20vh;
            width: 25%;
            margin: 1vh;

            display: flex;
           
            align-items: center;
            justify-content: center;
            text-align: center;
            flex-direction: column;

        }
        .count{
            color: red;
            font-size: 5vh;
        }
    </style>


       
    </div>
</section>

    
  
</body>
</html>