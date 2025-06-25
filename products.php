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
              <h1>OUR FOODS</h1>
              <a href="addfood.php"><button>ADD FOOD</button></a>
        </div>
        <div class="foods">
                <?php 

                $checklist = "SELECT * FROM foods";
                $resuilt = mysqli_query($conn,$checklist);
                if($resuilt && mysqli_num_rows($resuilt)>0){
                    while( $data = mysqli_fetch_assoc($resuilt)){
                        echo"
                        <div class='food1'>
           
                            <div class='image'>
                                
                                    <img src='../images/".htmlspecialchars($data["file"])."'>
                            </div>
                            <div class='info'>
                                
                                <h4>Name:".htmlspecialchars($data["name"])."</h4>
                                <h5>Price:".htmlspecialchars($data["price"])."</h5>
                                
                            </div>

                        </div>


                     ";

                    }
                   
                   

                }
                    
  
                ?>
           
           

            

           

            
            
            
            
        </div>
       
    </div>
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
    .foods{
       
        height: auto;
        justify-content: center;
        align-items: center;
        text-align: center;
        display: flex;
        flex-wrap: wrap;


}
.food1{
   
    height: auto;
    width: 27%;
    margin: 10px;
    
}
.image{
    height: 27vh;
   
}
.image img{
    width: 100%;
    height: 100%
}
.info{
    background-color: black;
     color: white;
     padding:  10px;
     text-align: left;
     }

     .info button{
        background-color: orange;
        color: white;
        padding: 7px;
        margin: 2px;
        border: none;
        border-radius: 3px;
     }
</style>
    
  
</body>
</html>