
<?php 
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    
        

    
  
        <form name = "form"  method = "POST">
            <h1>ADMIN sign up</h1>
            <?php 
               if(isset($_POST["submit"])){
                // geting user inputs
                $name = $_POST["name"];
                $user_id = $_POST["user_id"];
                $phone = $_POST["phone"];

                //checking if there is already registered account
                $checkingadmin = "SELECT * FROM admin WHERE user_id = '$user_id' AND phone = '$phone'";
                $resuilt = mysqli_query($conn,$checkingadmin);
                if($resuilt && mysqli_num_rows($resuilt)>0){
                   
                        echo "<div class='alert alert-danger'>user exist</div>";
                  
                }else{
                    $addadmin = mysqli_query($conn,"INSERT INTO admin (name,user_id,phone) VALUES('$name','$user_id','$phone')");
                    header("Location: adminlogin.php");

                }

              
             
              
          
 
               

               }
              
            ?>
            <label> USER NAME:</label>
            <input type="text"  id="user" name = "name" required><br><br>
            <label> USER ID:</label>
            <input type="text"  id="user" name = "user_id" required><br><br>
            <label>USER PHONE</label>
            <input type="text"  name="phone" required><br><br>
            <input type="submit" id="btn" value="Sign Up" name="submit"/>
            <p>have  account? <a href="adminlogin.php">Sign in here</a></p>

        </form>   
        <style>
            /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Body Styling */
body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f4f4f9;
}

/* Form Styling */
form {
    background: #ffffff;
    padding: 2rem;
   
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 500px;
}
form h1{
    margin-bottom: 10px;
    background-color: black;
    color: white;
    padding: 5px;
  
}
form h5{
    font-size: 3vh;
    margin-bottom: 10px;
}
form h5 span{
    color: orange;
}
/* Label Styling */
form label {
    display: block;
     font-weight: bold;
    margin-bottom: 8px;
    color: #333;
}

/* Input Styling */
form input{
    width: 100%;
    padding: 10px;
    margin-bottom: 1rem;
    border: none;
    border: 1px solid black;
    outline: none;
   

}
form input:focus{
    border: 1px solid green;
}
/* Submit Button */
form input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color:rgb(255, 191, 15);
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s;
}

form input[type="submit"]:hover {
    background-color: #45a049;
}
form .alert{
    background-color: red;
    color: white;
    padding: 10px;
    border-radius: 3px;
    margin-bottom: 10px;
}


  

        </style>
            
  

    
</body>
</html>