
<?php 

session_start();



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
            <h1>EMPLOYEES SIGN UP AND LOG IN FORM</h1>
            <h5>Fill the fields to <span>sign in</span></h5>
            <?php 
               if(isset($_POST["submit"])){
                // geting user inputs
                $user_id = $_POST["user_id"];
                $phone = $_POST["phone"];

                $checkingdetails = "SELECT * FROM admin WHERE user_id='$user_id' AND phone='$phone'";
                $resuilt = mysqli_query($conn,$checkingdetails);
                if($resuilt && mysqli_num_rows($resuilt)>0){
                    $data = mysqli_fetch_assoc($resuilt);
                    $_SESSION["phone"] = $data["phone"];
                    header("Location: admin.php");
                }else{
                    echo"<div class='alert alert-danger'>User do not exist</div>";

                }
 
               

               }
              
            ?>
            <label> USER ID:</label>
            <input type="text"  id="user" name = "user_id" required><br><br>
            <label>USER PHONE</label>
            <input type="text"  name="phone" required><br><br>
            <input type="submit" id="btn" value="Login" name="submit"/>
            <p>have no account? <a href="adminsignup.php">Sign Up here</a></p>

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
    background-color:rgb(202, 202, 226);
}

/* Form Styling */
form {
    background:rgba(255, 255, 255, 0.64);
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
    color: red;
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
    border:  1px solid blue;
    border-radius:5px;
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