<?php
    session_start();
    function show_name()
    {
        if (!empty($_SESSION)) {
            echo $_SESSION["name"];
        }
    }
    function login_button()
    {
        if (empty($_SESSION)) {
            echo "<a href='login.php'>Login</a>";
        } else {
            echo "<a href='logout.php'>Logout</a>";
        }
    }
    function rolebutton(){
        if(!empty($_SESSION)){
            if($_SESSION["role"]=="manager"){   
                echo "<a href='Manager.php'>Manage</a>";
            }
         }
        
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $conn = new mysqli("localhost","root", "", "db1");

            $username=$_POST['username'];
            $mobileno=$_POST['mobileno'];
            $hallid=$_POST['hallid'];
            $date=$_POST['date'];
            $additional=$_POST['additional'];
            $hallbooking="INSERT INTO hallboking(name,username, mno, hallid, additional,seen) VALUES ('','$username','$mobileno','$hallid','$additional','0')";
            $result = $conn->query($hallbooking);
            unset($_POST);
            $conn->close();
    }

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/banquet.css">
        <script src="js/banquet.js"></script>
    </head>
<body onload="load()"> 
        <!--header-->
        <div class="header">
        <table>
            <tr>
                <td>
                    <div><?php show_name();?></div>
                </td>
                <td id="menu">
                <a href="index.php">Home</a>
                <?php rolebutton();?>
                
                    <div   class="dropdown">
                        <a href="banquet.php" class="dropbtn">Banquet hall</a>
                   
                    </div>
                    <div class="dropdown">
                        <a  href="accomodation.php" class="dropbtn">Accommodation</a>
                    </div>
                    <div class="dropdown">
                        <a href="restaurent.php" class="dropbtn">Restaurant</a>
                        <div class="dropdown-content"></div>
                    </div>
                    <a href="#footert1">Contact</a>
                    <a href="#footert1">About</a>
                    <?php login_button(); ?>
                </td>
            </tr>
        </table>
    </div>
 <!--header-->

 <!--slidshow-->
    <div id="imgs">
        <img src="images/1.jpg" id="imgc">
    </div>
    <!--slidshow-->
    <div class="gallery">
        <div style="text-align:center;padding:20px;"><h2>Gallery</h2></div>
        <img src="images/1.jpg">
        <img src="images/1.jpg">
        <img src="images/10.jpg">
        <img src="images/11.jpg">
        <img src="images/12.jpg">
        <img src="images/13.jpg">
        <img src="images/14.jpg">
        <img src="images/15.jpg">
        <img src="images/16.jpg">
        <img src="images/17.jpg">
        <img src="images/22.jpg">
        <img src="images/19.jpg">
        <img src="images/20.jpg">
        <img src="images/21.jpg">

    </div>
    <!--button-->
    <div class="order_button" id="order_button1">
        <img id="order_button" onclick=" bookinghall()" src="images/restaurent/order.png">
        <div id="ordertext">Booking Hall &nbsp;&nbsp;</div>  
    </div>
<!--button-->
   <!--order model-->
   <div id="bookingHall" class="order_model">
    <div  id="model_title"><div class="close" onclick="close_model()" >&times;</div>Booking Hall</div>
        <div class="order_modal_content">
            <form method="post" action="banquet.php" id="banquet">
            <table>
                <input type="text" name="username" placeholder="Username" required> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <input type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="mobileno" placeholder=" Mobile Number" required><br>
                <br>
                <input type="text" name="hallid" placeholder="Hall Id" size="40">  <br><br>
                <input type="text" name="date" placeholder="Date" size="40" ><br><br>
                <textarea name="additional" form="banquet" placeholder="Aditionals" rows=5 cols=30></textarea><br><br>
                <input type="submit" value="Book Now">
            </table>
            </form>
        </div>
    </div>
 <!--order model-->
  <!--footer-->
    <div class="footer"><div id="footert1"><div class="emptyf"></div>Contact <br> With Us</div>
        <div id="footert2"> <br><br><br><br><br><br>Menara Hotel &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;0717888566<br>
                Mathara Road &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; menarahotel@gmail.com <br>
                Walasmulla
            </div>
        </div> 
    </div>
<!--footer-->

    </body>

</html>