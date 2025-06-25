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
        <h2>FOODS AVAILABLE</h2>
        <div class="cofee">
        <img src="../images/coffe cup.avif" alt="">
        <h4>Coffee Capuchino: PRICE Ksh.450</h4>
        <a href=""><button>Order</button></a>
       
           <div class="img1">
            <img src="../images/pizza.avif" alt="">
            <h4>  Domino Pizaa: PRICE Ksh.1200</h4>
            <a href=""><button>Order</button></a>
        </div>
           <div class="img2">
                <img src="../images/gallary-9.jpg" alt="">
                <h4> Spanish Specialty :PRICE Ksh.700</h4>
                <a href=""><button>Order</button></a>
            </div>
            <div class="img3">
                    <img src="../images/gallary-10.jpg" alt="">
                    <h4>Sahil Dish: PRICE Ksh.900</h4>
                    <a href=""><button>Order</button></a>
                </div>
      </div>

    </div>
    <style>
        body{
            background color:orange;
            padding:20px;
            height:100%;
            width:100%;
            border:1px solid red;
        }
        .foods{
            background color:orange;
            margin left:14px;
            margin bottom: 3px;
           
        }
        .foods h2{
            justify content:center;
            text align:center;
            margin top:4px;
            border:1px solid red;
            
        }
        .cofee{
            justify content:center;
            padding:20px;

        }
        .cofee img{
            height:300px;
            width: 300px;
            padding: 20px;
        }
    </style>
    
</body>
</html>