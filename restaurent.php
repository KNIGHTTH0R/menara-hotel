<?php
session_start();

function show_name(){
    
if(!empty($_SESSION)){
    echo $_SESSION["name"];
 }
}


function rolebutton(){
    if(!empty($_SESSION)){
        if($_SESSION["role"]=="manager"){   
            echo "<a href='Manage.php'>Managers</a>";
        }
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







    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        

        if(isset($_POST['username'])){
            $conn4 = new mysqli("localhost","root", "", "db1");
           
            $username=$_POST['username'];
            $mobileno=$_POST['mobileno'];
            $meal=$_POST['meal'];
            $drink=$_POST['drink'];
            $desert=$_POST['desert'];
            $additional=$_POST['additr'];;
            $tableno=$_POST['tableno'];
            $ordersql="INSERT INTO mealorders (username,mobileno,meal,drinks,desert,additional,tableno) VALUES ('$username','$mobileno','$meal','$drink','$desert','$additional','$tableno')";
            $result= $conn4->query($ordersql);
            $conn4->close();
            unset($_POST);
  
        }
        
      if(isset($_POST['usernamew'])){
            $conn4 = new mysqli("localhost","root","", "db1");
            $username=$_POST['usernamew'];
            $time=time();
            $tablenow=$_POST['tablenow'];
            $waiter="INSERT INTO waiter (username,tableno,time,confirm) VALUES ('$username','$tablenow','$time','0')";
            $result2  = $conn4->query($waiter);
            unset($_POST);
            $conn4->close();
            header('Location:restaurent.php');

        }
        if(isset($_POST['usernamer'])){
            $conn5 = new mysqli("localhost","root","", "db1");
            $username=$_POST['usernamer'];
            $time=$_POST['timer'];
            $date=$_POST['dater'];
            $cmmnt=$_POST['addit'];
            $treservation="INSERT INTO treservation (username,date,time,additional) VALUES ('$username','$date','$time','$cmmnt')";
            $result3  = $conn5->query($treservation);
            $conn5->close();
            unset($_POST); 
        }

        

}
function submitchecka()
{
    if (empty($_SESSION)) {
        echo "event.preventDefault();";
    }
}
function submitcheckb()
{
    if (empty($_SESSION)) {
        echo "alertsubmit();";
    }
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/restaurent.css">
    <script src="js/restaurent.js"></script>
</head>
   <body onload="load()">

<div id="body">
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

    <div id="empty"></div>
    <!--slideshow-->
    <div id="imgs">
    <img src="images/1.jpg" id="imgc">
    </div>
     <!--slideshow-->
    <!--button-->
    <div class="order_button" id="order_button1">
    <img id="order_button" onclick="order()" src="images/restaurent/order.png">
    <div id="ordertext">Order Meals &nbsp&nbsp</div>  
</div>

<div class="order_button" id="order_button2">
<img id="order_button" onclick="waiter()" src="images/restaurent/order.png">
<div id="ordertext">Call a Waiter &nbsp&nbsp</div>  
</div>

<div class="order_button" id="order_button3">
<img id="order_button" onclick="reservation()" src="images/restaurent/order.png">
<div id="ordertext">Table Reservation &nbsp&nbsp</div>  
</div>

    <!--button-->
     <!--order model-->
<div id="order_model" class="order_model">
<div  id="model_title"><div class="close" onclick="close_model()" >&times;</div>Order Meals</div>
  <div class="order_modal_content">

    <form id="mealsfrm" method="post"  action="restaurent.php" >
        
        <table>
    <input type="text" name="username" placeholder="Username" required> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <input type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="mobileno" placeholder=" Mobile Number" required><br>
    <br>
     <input type="number" name="tableno" placeholder="Table Number"  required size="60"><br><br>
        <input type="text" name="meal" placeholder="Foods" size="40">  <br><br>
        <input type="text" name="drink" placeholder="Drinks" size="40" ><br><br>
        <input type="text" name="desert" placeholder="Deserts" size="40"><br><br>
        <textarea name="additr" form="mealsfrm" placeholder="Aditionals" rows=5 cols=30>  </textarea><br><br>
        <input type="submit" value="Order Meals">
        </table>
    </form>
  </div>
</div>

<div id="request_waiter_model" class="order_model">
<div  id="model_title"><div class="close" onclick="close_model()" >&times;</div>Call A Waiter</div>
  <div class="order_modal_content">
    <form method="post" action="restaurent.php" onsubmit="<?php submitchecka(); submitcheckb(); ?>">
        <input type="text" name="usernamew" placeholder="Username" value="<?php if(!empty($_SESSION)){echo $_SESSION["name"];}?>" required><br>
    <input type="number" name="tablenow" placeholder="Table Numer" required><br>
        <input type="submit" value="Call">
    </form>
  </div>
</div>
<div id="reservation" class="order_model">
<div  id="model_title"><div class="close" onclick="close_model()" >&times;</div>Table Reservation</div>
  <div class="order_modal_content">
    <form action="restaurent.php" id="reserve" method="post"  onsubmit="<?php submitchecka(); submitcheckb(); ?>">
    <table>
        <tr>
            <td>Username</td>
            <td>
            <input type="text" placeholder="Username" name="usernamer" value="<?php if(!empty($_SESSION)){echo $_SESSION["name"];}?>" required>
            </td>    
        </tr>
        <tr>
            <td>Date</td>
            <td><input type="date" placeholder="Date" name="dater" required></td><br><br>
        <tr>
        <tr><td>Time</td>
            <td><input type="time" name="timer" placeholder="TIme" required></td>
        </tr> 
        <tr>
        <td>        </td>
        <td> <textarea name="addit"  form="reserve" placeholder="Additionals" ></textarea></td>
</table>
    
    <input type="submit" value="Reserve">
    </form>
  </div>
</div>
<!--order model-->
<!--tab-->
    <div class="tabbar">
        <div class="tabspace"></div>
        <div class="tabbutton" id="tb1" onclick="tabclick('tab1','tb1')"><div id="texttb">Breakfast</div></div>
        <div class="tabspace"></div>
        <div class="tabbutton" id="tb2" onclick="tabclick('tab2','tb2')"><div id="texttb">Lunch</div></div>
        <div class="tabspace"></div>
        <div class="tabbutton" id="tb3" onclick="tabclick('tab3','tb3')"><div id="texttb">Dinner</div></div>
        <div class="tabspace"></div>
        <div class="tabbutton" id="tb4" onclick="tabclick('tab4','tb4')"><div id="texttb">Dessert</div></div>
        <div class="tabspace"></div>
        <div class="tabbutton" id="tb5" onclick="tabclick('tab5','tb5')"><div id="texttb">Drinks</div></div>
        <div class="tabspace"></div>
    </div>
    <div class="tab" id="tab1">
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\1.jpg" class="mealsimage">
            <div class="text1">Rs20/=</div>
            <div class="mealbottom">Hoppers</div>
        </div>
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\6.jpg" class="mealsimage">
            <div class="text1">Rs35/=</div>
            <div class="mealbottom">Milk Rice</div>
        </div>
    </div>
    <div class="tab" id="tab2">
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\2.jpg" class="mealsimage">
            <div class="text1">Rs200/=</div>
            <div class="mealbottom">Rice & Cury</div>
        </div>
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\12.jpg" class="mealsimage">
            <div class="text1">Rs1000/=</div>
            <div class="mealbottom">Pizza</div>
        </div>
    </div>
    <div class="tab" id="tab3">
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\22.jpg" class="mealsimage">
            <div class="text1">Rs8/=</div>
            <div class="mealbottom">String Hoppers</div>
        </div>
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\25.jpg" class="mealsimage">
            <div class="text1">Rs300/=</div>
            <div class="mealbottom">Fried Rice</div>
        </div>
    </div>
    <div class="tab" id="tab4">
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\33.jpeg" class="mealsimage">
            <div class="text1">Rs100/=</div>
            <div class="mealbottom">Ice Cream</div>
        </div>
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\34.jpeg" class="mealsimage">
            <div class="text1">Rs200/=</div>
            <div class="mealbottom">Pudding</div>
        </div>
    </div>
    <div class="tab" id="tab5">
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\31.jpeg" class="mealsimage">
            <div class="text1">Rs150/=</div>
            <div class="mealbottom">Mango Juice</div>
        </div>
        <div class="mealscontainer" >
            <img src="images\restaurent\Breakfast\35.jpg" class="mealsimage">
            <div class="text1">Rs150/=</div>
            <div class="mealbottom">Apple Juice</div>
        </div>
    </div>

<!--tab-->
<div class="footer"><div id="footert1"><div class="emptyf"></div>Contact <br> With Us</div>
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