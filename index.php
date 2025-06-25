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
    <link rel="stylesheet" href="../index.css">
    <title>www.magnumresort.com</title>
</head>
<body>

    <div id="section1">

        <!--start of section1 header-->
        <div class="header">
            <div class="logo">
                <h1>Magnum Resort</h1>
            </div>

            <div class="menu">
               <ul>
                <a href="#section1"><li>Home</li> </a>
                <!--<a href="#section2"><li>About</li></a>!-->
                <a href="#section3"><li>Employees</li></a>
                <a href="menu.php"><li>Menu</li></a>
                <a href="#section5"><li>Contact</li></a>
               </ul>
            </div>
            
            <div class="contact">
                <p style="color: white;">CALL NOW! 0708661872</p>
                <a href="adminlogin.php"><button>ADMIN LOGIN</button></a>
            </div>
        </div>

        <!--end of section1 header-->

        <div class="content">
            <div class="info">
                <h1>GLENNY'S EATERY & RESTAURANT</h1>
                <h2>Our mission is to provide unforgettable dreams and tastes in your meals.</h2>
                <h2>unforgatable experience</h2> <br>
                

                <!--<a href="#section4"><button>Discover menu</button></a> -->
            </div>
            
        </div>
    </div>
    
    <!--end of section1-->

    <div id="section2">
        <div class="content">
            <div class="box1">
              <p>READ OUR STORY</p> <br>
              <h1>We've been Making The Delicious</h1>
              <h1>Foods Since 2022</h1> <br>

              <p>In our restaurant, we take pride in serving an exquisite variety of mouthwatering delicacies that cater to every palate.  <br>  <p>From rich, flavorful African cuisine to international favorites, our menu is crafted with the finest ingredients and a touch of culinary expertise. </p> <br><p> Whether you're craving a hearty traditional meal, a sizzling grilled dish, or a delightful dessert, our chefs ensure every bite is a burst of flavor. </p>  <br> <p>With a warm ambiance, exceptional customer service, and a commitment to quality, Glenny’s Restaurant is the perfect destination for a memorable dining experience. Come and taste the difference!</p>
            </div>
            
        </div>
    </div>

    <!--end of section2-->

    <div id="section3">
           <div class="heading">
            <h1>Meet our chefs</h1> <br>
            <h2>The are nice ,polite and very friendly when serving our customers and you can  <br>ask any of them for assistance in any area.</h2>
           </div>

            <div class="cont">
                <div class="pic">
                    
                  <img src="../images/team-image1.jpg" alt="">
                  
                </div>
                <div class="pic">
                    
                    <img src="../images/chef .7.webp" alt="">
                    
                  </div>
                  <div class="pic">
                    
                    <img src="../images/chef 5.webp" alt="">
                    
                  </div>

                

                
                

            </div>
    </div>

    <!--end of section3-->

    

    <!--end of section4-->

    <div id="section5">
        <div class="information">
            <h1>TESTIMONIALS</h1>
            <h2> "I recently had the pleasure of dining at GLENNY'S RESTAURANT AND EATERIES and I can confidently say it was an outstanding experience!  <br> From the moment I walked in, the warm ambiance and friendly staff made me feel right at home.
                The menu offers a delightful variety of dishes that are not only beautifully presented but also bursting with flavor. <br> I tried pizaa, and it was one of the best I've ever had! The attention to detail in both the food and service is truly commendable. <br>
                I wholeheartedly recommend GLENNY'S RESTAURANT AND EATERIES to anyone looking for a fantastic dining experience.  <br>Whether you're celebrating a special occasion or just want to enjoy a great meal, this place is a must-visit. I can't wait to return and try more of their delicious offerings!"
                    </h2>

                 <h2>Lawi Mariana</h2>
        </div>
    </div>

    <!--end of section5-->

    <div id="section6">
        <div class="contactus">
           <div class="contactus1">
             <img src="../images/footer-open-hour-bg.jpg" alt="">
           </div>
           <div class="contactus1">
            <form action="">
                                <h1>Contact Us</h1>

                    <input type="text" name="text" placeholder="full name">
                    <input type="email" name="email" placeholder="email">
                    <input type="text" name="number" placeholder="phone number">
                  
                    
                   </textarea>

                    <button>Send</button>
            </form>
           </div>
        </div>
    </div>

    <!--end of section6-->

    <div class="footer">
        <div class="foot">
            <div class="foot1">
               <h1>Find us</h1>
               <p>123 nulla a cursus rhoncus,</p>
               <p>augue sem viverra 10870</p>
               <p>id ultricies sapien</p>
            </div>
            <div class="foot1">
               <h1>Reservation</h1>
               <p>090-080-0650 | 090-070-0430</p>
               <p>info@magnumresort.com</p>
               <p>LINE: magnum247</p>
            </div>
            <div class="foot1">
                <h1>Opening hours</h1>
                <p>Monday: Closed</p>
                <h2>Tuesday to Friday</h2>
                <p>7:00 AM - 9:00 PM</p>
                <h2>Saturday - Sunday</h2>
                <p>11:00 AM - 10:00 PM

                </p>
            </div>
            <div class="foot1">
                

                <h1>Copyright © 2024</h1>
                <h1>Glenny Eateriees</h1> <br>
            
            </div>

        </div>

        <!--end of footer-->
    </div>

    <style>
    
    </style>
</body>
</html>