<?php
session_start();
$sbmitfailemsg = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn2 = new mysqli("localhost", "root", "", "db1");
    
    $username = $_POST['name'];
    $comment  = $_POST['comment'];
    $sql2     = "INSERT INTO comments (username,comment) VALUES ('$username', '$comment')";
    $result   = $conn2->query($sql2);
    unset($_POST);
    header('Location:index.php');
    
}

function rolebutton(){
    if(!empty($_SESSION)){
        if($_SESSION["role"]=="manager"){   
            echo "<a href='Manager.php'>Manage</a>";
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
function show_name()
{
    if (!empty($_SESSION)) {
        echo $_SESSION["name"];
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
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <script src="js/index.js"></script>
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

  <!--Welcome-->
  <div class="welcome_container">
        <div id="wp">Menara</div>
        <p id="welcomep">Hotel & Restaurent<p>
    </div>
  <!--Welcome-->
  <!--About-->
  <div class="about">
      <div class="aboutText"><h2>ABOUT</h2>
      Menara hotel and restaurant is a perfect place to spend a holiday to your own in the area of Walasmulla. It is bejeweled as one of the finest hotel in the southern province. We ensure your stay is perfect and your experiences are complete since 2002 our
            valuable guests have experienced a luxurious gateway in the city with our-on-site facilities and contemporary amenities. No matter the event, be it the wedding of the century or a small corporate business meeting or even a birthday party,
            Menara hotel and restaurant is equipped to create the perfect affair. Thanks to the dedicated service of our experienced teams, we have a fantastic selection of spacious wedding halls in Sri Lanka. Modern boardrooms that will add a touch of
            elegance and magic to your special celebration.
      </div>
      <div class="imgc">
          <img src="images/1.jpg" id="imgc">
      </div>
  </div>
  <!--About-->
  <div class="facilities">
  <h2 style="color:white;">Facilities</h2>
      <div class="icon">Restaurent</div>
      <div class="icon">Accomadation</div>
      <div class="icon">Tasty Foods</div>
      <div class="icon">Banquet Halls</div>
      <div class="icon">Children Play Area</div>
      <div class="icon">Free WiFi</div>
      <div class="icon">Fully Air Conditioned</div>
      <div class="icon">Pre Reservation</div>
      <div class="icon">Forigen Foods</div>
      <div class="icon">Local Foods</div>
      <div class="icon">Trusted Service</div>
      <div class="icon">Various Payment Method</div>
      
  </div>
  <!--feedback-->
  <div style="text-align:center;color:white;"><h2>Feedback<h2></div>
    <div class="coment"><form id="feedback_form" method="post" action="index.php" onsubmit="<?php submitchecka();submitcheckb() ?>">
    <?php echo $sbmitfailemsg ?>
    Name<br>
    <input type="text" name="name" value="<?php if(!empty($_SESSION)){echo $_SESSION["name"];}?>" required><br><br>
    Mobile Number<br>
    <input  type="text"  name="phone_no"  required><br><br>
    Feedback<br>
    <textarea rows=5 cols=20 name="comment" form="feedback_form"  required></textarea><br><br>
    <input type="submit" id="submitbtn" onclick="test_cmnt_condition();" value="Done" >
    </form></div>
    <!--feedback-->
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