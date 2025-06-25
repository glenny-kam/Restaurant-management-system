<?php

session_start();

if(!isset($_SESSION["phone"])){
    header("Location: adminlogin.php");
}



include 'connection.php';
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
           
            
        </ul>
    </div>
 
    <div class="dashboard">
        
            <div class="heading">
                    <h1>OUR EMPPLOYEES</h1>  
                    <a href="addemployee.php"><button>ADD EMPLOYEES</button></a>
            </div>
          
                            <table>
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last name</th>
                                        <th>Phone No:</th>
                                        <th>ID NO</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Mike</td>
                                        <td>Mike</td>
                                        <td>12345</td>
                                        <td>12345</td>
                                        <td>
                                            <button>edit</button>
                                            <button>delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
</section>
        <style>
             .heading{
       
       height: 10vh;
       padding: 2vh;
       justify-content: space-between;
       align-items: center;
       text-align: center;
       display: flex;
       background-color: orange;
       color: black;
   }
   .heading button{
        padding: 9px;
        background-color: black;
        color: white;
        border: none;
        border-radius: 3px;
        
    }
        .employees{
            height: 10vh;
        padding: 2vh;
        justify-content: space-between;
        align-items: center;
        text-align: center;
        display: flex;
        background-color: orange;
        color: black; 
                }
        .employees button{
            padding: 9px;
        background-color: black;
        color: white;
        border: none;
        border-radius: 3px; 
        }
     
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
    
   
        </style>
       


    
       
    </div>
</section>

    
  
</body>
</html>