<?php
session_start();
function show_name(){
    if(!empty($_SESSION)){
       echo $_SESSION["name"];
    }
function login_button()
    {
        if (empty($_SESSION)) {
            echo "<a href='login.php'>Login</a>";
        } else {
            echo "<a href='logout.php'>Logout</a>";
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn3 = new mysqli("localhost", "root", "", "db1");
    $name=$_POST['name'];
    $username=$_POST['username'];
    $mobileno=$_POST['mobileno'];
    $meal=$_POST['meal'];
    $drink=$_POST['drink'];
    $desert=$_POST['desert'];
    $additional=$_POST['additional'];
    $tableno=$_POST['tableno'];
    $ordersql="INSERT INTO mealorders (name,username, mobileno, meal, drinks, desert, additional, tableno) VALUES ('$name','$username','$mobileno','$meal','$drink','$desert',$additional,'$tableno')";
    $result   = $conn3->query($ordersql);
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/restaurent.css">
    <script src="js/restaurent.js"></script>
</head>
   <body>

<div id="body" onload="tabclick('tab1')">
    <div class="header">
        <table>
            <tr>
                <td>
                    <div><?php show_name();?></div>
                </td>
                <td id="menu">
                    <div class="dropdown">
                        <a class="dropbtn">Banquet hall</a>
                        <div class="dropdown-content">
                            <a href="#">Booking Hall</a>
                            <a href="#">Gallery</a>
                            <a href="#">Feedback</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="dropbtn">Accommodation</a>
                        <div class="dropdown-content">
                            <a href="#">Booking Room</a>
                            <a href="#">Order Meals</a>
                            <a href="#">Request a waiter</a>
                            <a href="#">Feedback</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="dropbtn">Restaurant</a>
                        <div class="dropdown-content">
                            <a href="#">Reserve Table</a>
                            <a href="#">Order Meals</a>
                            <a href="#">Request Waiter</a>
                            <a href="#">Feedback</a>
                        </div>
                    </div>
                    <a href="index.php">Home</a>
                    <a href="#footer">Contact</a>
                    <a href="#about">About</a>
                    <?php login_button(); ?>
                </td>
            </tr>
        </table>
    </div>
    <!--header-->
    
    <!--button-->
<div class="order_button" >
<img id="order_button" onclick="order_button()" src="images/restaurent/order.png">
<div id="ordertext">Order Meals</div>  
</div>
    <!--button-->
        <!--order model-->
<div id="order_modals" class="order_model">
  <div class="order_modal_content">
  <div class="close" onclick="close_model()" >&times;</div>
    <form method="post" action="restaurent.php">
        Name<input type="text" name="name"><br>
        username<input type="text" name="username"><br>
        table no<input type="text" name="tableno"><br>
        Mobile no<input type="text" name="mobileno"><br>
        Meals<input type="text" name="meal"><br>
        Drinks<input type="text" name="drink"><br>
        Deserts<input type="text" name="desert"><br>
        Additional<input type="text" name="additional"><br>
        <input type="submit">
    </form>
  </div>
</div>
<!--order model-->
<div id="empty"></div>
<div class="tabbar">
    <div class="tabbutton" onclick="tabclick('tab1')"></div>
    <div class="tabspace"></div>
    <div class="tabbutton" onclick="tabclick('tab2')"></div>
</div>
<div id="tab1">sdfsadfs</div>
<div id="tab2">sdfsadfs</div>
<div class="footer"></div>
</body>
</html>