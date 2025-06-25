
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
              <h1>OUR ADD FOOD</h1>
             
        </div>

        <div class="form">
            <form action="" method="post">
               





                <h3>ADD FOOD INFORMATION</h3>
                        <?php
                        if(isset($_POST["submit"])){
                        //    get data from form
                        $file = $_POST["file"];
                        $name = $_POST["name"];
                        $serial = $_POST["serial"];
                        $price = $_POST["price"];

                        $addfood = mysqli_query($conn,"INSERT INTO foods (file,name,serial,price) VALUES ('$file','$name','$serial','$price')");
                      header("Location: foods.php");
                        }

                        ?>
                 <div class="form-group">
                    <label for=""></label>
                    <input type="file" name="file">
                </div>       

                <div class="form-group">
                    <label for="">Food Name</label>
                    <input type="text" name="name">
                </div>
                <div class="form-group">
                    <label for="">Serial Number</label>
                    <input type="text" name="serial">
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" name="price">
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <input type="submit" name="submit">
                </div>
            </form>
        </div>
        
       
    </div>
</section>
<style>
    .heading{
       
        height: 10vh;
        width: 10vw;
        justify-content: center;
        align-items: center;
        text-align: center;
        display: flex;
        background-color: orange;
        color: black;
        border:1px solid red;
       
    }
    form{
        box-shadow: rgba(19, 17, 17, 0.24) 0px 3px 8px;
        padding: 3vh;
        height: 60vh;
        width: 500px;
        justify-content: center;
        align-items: center;
        text-align: center;
        display: flex;
        flex-direction: column;
        margin: 3vh;
        border-radius:10px;
       
    }
    .form-group{
        margin-top: 10px;
        width: 100%;
        border-radius:5px;
      
    }
    .form-group label{
        text-align: left;
        font-weight: bold;
    }
    form input{
        outline: none;
        padding: 9px;
        width: 100%;
        margin-top: 5px;
        font-size: 14px;
    }
   
</style>
    
  
</body>
</html>