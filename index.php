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
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="js/index.js"></script>
</head>

<body class="background" onload="load()">
<!--header-->
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
                            <a href="restaurent.php">Home Page</a>
                            <a href="#">Reserve Table</a>
                            <a href="#">Order Meals</a>
                            <a href="#">Request Waiter</a>
                            <a href="#">Feedback</a>
                        </div>
                    </div>
                    <a href="#footer">Contact</a>
                    <a href="#about">About</a>
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
    <div class="about" id="about">

        <div id="p" class="col left">
            <h2>About</h2>
            Minoli hotel and restaurant is a perfect place to spend a holiday to your own in the area of Walasmulla. It is bejeweled as one of the finest hotel in the southern province. We ensure your stay is perfect and your experiences are complete since 2002 our
            valuable guests have experienced a luxurious gateway in the city with our-on-site facilities and contemporary amenities. No matter the event, be it the wedding of the century or a small corporate business meeting or even a birthday party,
            Minoli hotel and restaurant is equipped to create the perfect affair. Thanks to the dedicated service of our experienced teams, we have a fantastic selection of spacious wedding halls in Sri Lanka. Modern boardrooms that will add a touch of
            elegance and magic to your special celebration.
        </div>

        <div class="col right">
            <img src="images/1.jpg" id="imgc">
        </div>
    </div>
 <!--About-->
    <div class="empty"></div>
<!--feedback-->
    <div><form id="feedback_form" method="post" action="index.php" onsubmit="<?php submitchecka();submitcheckb() ?>">
    <?php echo $sbmitfailemsg ?>
    <table>
      <tr>
          <td>Name</td><td>:<input type="text" name="name" value="<?php if(!empty($_SESSION)){echo $_SESSION["name"];}?>" required></td>
    </tr>
 
    <tr>
          <td>Phone No</td><td>:<input  type="text" maxlength=20 name="phone_no"  required></td>
    </tr>
        <br>
        <tr>
          <td>Comment</td><td>:<textarea rows=5 cols=20 name="comment" form="feedback_form"  required></textarea></td>
    </tr>
    </table>
    <input type="submit" onclick="test_cmnt_condition();" value="submit" ">
       
    </form></div>
    <!--feedback-->
   
    <div class="footer" id="footer">czxczxbcvxzcvnhcgnhcg</div>
    <div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.428513241144!2d80.51299881428773!3d8.35943749398709!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2s6MW29G58%2BQ3!5e0!3m2!1sen!2slk!4v1564895266750!5m2!1sen!2slk"
            width=100% height="200" frameborder="0" style="border:0" allowfullscreen>
    </iframe>
    </div>

</body>

</html>