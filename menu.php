
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
    <title>Document</title>
    <link rel="stylesheet" href="food.css">
</head>
<body>
    <div class="foods">
    <?php
    // read menus from the table
    $menu = "SELECT * FROM foods";
    $resuilt = mysqli_query($conn,$menu);
    if(mysqli_num_rows($resuilt)>0){
        echo"
        <table>
            <thead>
                    <tr>
                        <th>PRODUCT</th>
                        <th>FOOD NAME</th>
                        <th>FOOD PRICE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
           
            
                <tbody>";
                while($data = mysqli_fetch_assoc($resuilt)){
                echo"
                    <tr>
                        <td> <img src='../images/".htmlspecialchars($data["file"])."' ></td>
                       
                        <td>".htmlspecialchars($data["name"])."</td>
                        <td>".htmlspecialchars($data["price"])."</td>
                        

                        <td>
                        
                    <a href='checkout.php?id=".htmlspecialchars($data["id"])." '><button type='' name='order'>place order</button></a>
                            
                         
                        </td>
                       
                    </tr>";
                   }
              echo"  </tbody> 
                    </table>";
              
        }
     else{
        echo"no products found";
    }
    ?> 
      </div>

    </div>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('../images/light-blue-background.jpg') no-repeat center center fixed;
            background-size: cover;
            text-align: center;
        }
        .foods {
            margin: 0px auto;
            background:rgb(255, 255, 255);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            font weight:600px;
        }
        table{
            border: 1px solid red;
            width: 100%;
            height: 50%;
           
        }
        table th{
            border: 1px solid red;
           font: bold;
           justify content:center;
           margin left:24px;
        }
        table td img{
            width: 400px;
            height:300px;
            header: 200px;
            padding:10px;
            margin left:15px;
            border bottom:2px;
           
        }
        table td{
            text-align: left;
            padding-left: 100px;
        }
        table td:nth-child(even){
            background-color: rgba(175, 182, 78, 0.1);
        }
      
        button {
            background-color: #ff6600;
            color: black;
            font weight:600px;
            border: none;
            padding: 10px 15px;
            border-radius: 10px;
            cursor: pointer;
        }
        button:hover {
            background-color:rgb(10, 221, 91);
        }   
    </style>
</body>
</html>