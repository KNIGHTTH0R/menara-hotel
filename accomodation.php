<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        

    if(isset($_POST['usernameom'])){
        $conn = new mysqli("localhost","root", "", "db1");
        $name=$_POST['name'];
        $username=$_POST['usernameom'];
        $roomno=$_POST['roomno'];
        $mobileno=$_POST['mobileno'];
        $meals=$_POST['meal'];
        $drink=$_POST['drink'];
        $desert=$_POST['desert'];
        $additional=$_POST['additional'];
        $ordersql="INSERT INTO ordermealstoroom (name,username,roomno,mobileno,meals,drink,desert,additional) VALUES ( '$name','$username','$roomno','$mobileno','$meals','$drink','$desert','$additional')";
        $result = $conn->query($ordersql);
        unset($_POST);
        $conn->close();
    }
    if(isset($_POST['usernamers'])){
        $conn6 = new mysqli("localhost","root", "", "db1");
        $name =$_POST['name'];
        $username=$_POST['usernamers'];
        $mobileno=$_POST['mobileno'];
        $roomno=$_POST['roomno'];
        $additional =$_POST['additional'];
        $roomservice="INSERT INTO roomservice (name,username,mobileno,roomno,additional) VALUES ('$name','$username','$mobileno','$roomno','$additional')";
        $result2 = $conn6->query($roomservice);
        unset($_POST);
        $conn6->close();

    }

    if(isset($_POST['usernamerb'])){
        $conn7 = new mysqli("localhost","root", "", "db1");
        $name =$_POST['name'];
        $username=$_POST['usernamerb'];
        $mobileno=$_POST['mobileno'];
        $period=$_POST['period'];
        $roomtype=$_POST['roomtype'];
        $additional =$_POST['additional'];
        $roomooking="INSERT INTO roomooking(name,username,mno,period,rtype,additional) VALUES ('$name','$username','$mobileno','$period','$roomtype','$additional')";
        $result3 = $conn7->query($roomooking);
        unset($_POST);
        $conn7->close();

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
function show_name()
{
    if (!empty($_SESSION)) {
        echo $_SESSION["name"];
    }
}
function rolebutton(){
    if(!empty($_SESSION)){
        if($_SESSION["role"]=="manager"){   
            echo "<a href='Manager.php'>Manage</a>";
        }
     }
    
}
?>
<html>
    <head>
<link rel="stylesheet" type="text/css" href="css/accomodation.css">
    <script src="js/accomodation.js"></script>
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

        <!--button-->
<div class="order_button" id="order_button1">
<img id="order_button" onclick="order()" src="images/restaurent/order.png">
<div id="ordertext">Order meals to room</div>  
</div>

<div class="order_button" id="order_button2">
<img id="order_button" onclick="roomservice()" src="images/restaurent/order.png">
<div id="ordertext">Room Service </div>  
</div>

<div class="order_button" id="order_button3">
<img id="order_button" onclick="roomboking()" src="images/restaurent/order.png">
<div id="ordertext">Room Booking </div>  
</div>
<!--button-->
<!--order model-->
    <div id="order_model" class="order_model">
    <div  id="model_title"><div class="close" onclick="close_model()" >&times;</div>Order Meals</div>
  <div class="order_modal_content">
    <form method="post" action="accomodation.php" id="meals">
       <input type="text" name="name" required placeholder=" Name" size="40"><br><br>
       <input type="text" name="usernameom" placeholder="Username" size="40"required ><br> <br>
        <input type="text" name="roomno" placeholder="Room Number" size="40" required><br><br>
      <input type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="mobileno" placeholder="  Mobile Number" size="40" required><br><br>
      <input type="text" name="meal" placeholder="Foods" size="40" ><br><br>
      <input type="text" name="drink" placeholder="Drinks" size="40" ><br><br>
        <input type="text" name="desert" placeholder="Deserts" size="40"><br><br>
        <textarea name="additional" form="meals" placeholder="Aditionals" rows=5 cols=30></textarea><br><br>
        <input type="submit" value="Order Meals">
    </form>
  </div>
</div>
<div id="roomboking" class="order_model">
<div  id="model_title"><div class="close" onclick="close_model()" >&times;</div>Room Boking</div>
  <div class="order_modal_content">
    <form method="post" action="accomodation.php" id="roomBoking">
    <input type="text" name="name" required placeholder=" Name" size="40"><br><br>
       <input type="text" name="usernamerb" placeholder="Username" size="40"required ><br> <br> 
       <input type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="mobileno" placeholder="Mobile Number" size="40" required><br><br>
        <input type="text" name="period" placeholder="Period"size="40"><br><br>
        <input type="text" name="roomtype" placeholder="Room Type" size="40" ><br><br>
        <textarea name="additional" form="roomBoking" placeholder="Aditionals" rows=5 cols=30></textarea><br><br>
        <input type="submit" Value="Book Now">
    </form>
  </div>
</div>

<div id="roomservice" class="order_model" id="roomService">
<div  id="model_title"><div class="close" onclick="close_model()" >&times;</div>Room Service</div>
  <div class="order_modal_content">
    <form method="post" id="mealForm" action="accomodation.php">
    <input type="text" name="name" required placeholder=" Name" size="40"><br><br>
       <input type="text" name="usernamers" placeholder="Username" size="40"required ><br> <br> 
       <input type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="mobileno" placeholder="  Mobile Number" size="40" required><br><br>
        <input type="text"  name="roomno" placeholder="Room Number" size="40"><br><br>
        <textarea name="additional" form="mealForm" placeholder="Aditionals" rows=5 cols=30></textarea><br><br>
        <input type="submit" value="Request Room Service">
    </form>
  </div>
</div>

    <!--order model-->
    <div id="imgs">
    <img src="images/1.jpg" id="imgc">
    </div>
    <h2>We Are Considering About Your Comfortable</h2>
    <div class="footer"><div id="footert1"><div class="emptyf"></div> Contact <br> With Us</div>
<div id="footert2"> <br><br><br><br><br><br>Menara Hotel &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;0717888566<br>
    Mathara Road &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; menarahotel@gmail.com <br>
    Walasmulla
 </div>
</div> 
</div>
    </body>
</html>