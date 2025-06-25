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
    <div class="add">
    <div class="heading">
              <h1>EMPLOYEES</h1>
             
        </div>
        <div class="form">
            <form action=""method="post">
               <div class="div1">
                    <label for="">First name</label>
                    <input type="text" name="firstname" placeholder=" enter first name">
                    <label for="">Last name</label>
                    <input type="text" name="lastname" placeholder=" enter  second name">
                    <label for="">Email</label> 
                    <input type="text"name="email" placeholder=" enter email">
               </div>
              <div class="div1">
                    <label for="">Employee Id</label>
                    <input type="text" name="employee_id" placeholder=" enter ID">
                    <label for="">Phone</label>
                    <input type="text" name="phone" placeholder=" enter phone no">
                    <label for=""></label>
                    <input type="submit" name="add" value ="ADD EMPLOYEE"> <br>

                    <?php 
                  if(isset($_POST["add"])){
                    $first_name = $_POST["firstname"];
                    $last_name = $_POST["lastname"];
                    $email = $_POST["email"];
                    $employee_id = $_POST["employee_id"];
                    $phone = $_POST["phone"];
                    
                    # insert into database
                 $addemployee = mysqli_query($conn,"INSERT INTO employees  (first_name,last_name,email,employee_id,phone) VALUES('$first_name',' $last_name',' $email','$employee_id','$phone')") ;
                 if($addemployee ) {
                    echo"employee added succefully";
                 }else{
                    echo "erro occured";
                 }



                    
                  }

              ?>
              </div>

             
               </form>
        </div>
        <style>
            .add{
                background-color: rgb(175, 164, 164);
                height: auto;
                width: 100%;
                
            }
            
            .header h1{
                font-weight: 700px;
                color: blue;
                border: 1px red;
            }
  .heading{
    border: 1px solid red;
    height: 15vh;
    text-align: left;
    justify-content: flex-start;
    padding: 1vh;
            align-items : center;
            display: flex;
            
    background-color: rgb(236, 161, 21);
    color: white;
  }
           .form{
            margin: 0 auto;
            width: 90%;
            height: 80vh;
            border: 1px solid red;
            justify-content: center;
            align-items : center;
            display: flex;
            text-align: center;


           }
           .div1{
            border: 1px solid red;
            width: 45%;
            margin: 2vh;
            padding: 1vh;
           }
           form{
            justify-content: center;
            align-items : flex-start;
            display: flex;
           
            text-align: left;
            width: 100%;

           }
           form label{
            text-align: left;
            font-weight:700px;
            margin-bottom: 5px;
            margin-top: 5px;

           }
           form input{
            width: 100%;
            padding: 14px;
            border-radius: 5px;
            background-color: white;
            border: none;
            margin-top: 20px;
            margin-bottom: 5px;

           }
           form input[type="submit"]{
            width: 40%;
            padding: 14px;
            border-radius: 0px;
            background-color: black;
            color: white;
            border: none;
            margin-top: 20px;
            margin-bottom: 5px;

           }

        </style>

    </div>


       
    </div>
</section>

    
  
</body>
</html>