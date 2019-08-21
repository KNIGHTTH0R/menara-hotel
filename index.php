<?php
        session_start();
        function login_button(){
            if(empty($_SESSION)){
                echo"<a href='login.php'>Login</a>";
            }
            else{
                $code="<?php  session_unset();session_destroy(); ?>";
                echo "<a action='' href='index.php'>Logout</a>";
            }
        }
           
        
      function show_name(){
          if(!empty($_SESSION)){
             echo $_SESSION["name"];
          }
      }
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="js/index.js">  
    </script>
</head>

<body class="background" onload="load()">
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
                    <a>Contact</a>
                    <a>About</a>
                    <a action="<?php session_unset();session_destroy(); ?>" ? href="index.php">asd</a>
                </td>
            </tr>
        </table>
    </div>
    <div class="welcome_container">
        <div id="wp">Menara Hotel & Restaurant</div>
    </div>
    <div class="about">

        <div id="p" class="col left">
            <h5>About</h5>
            Minoli hotel and restaurant is a perfect place to spend a holiday to your own in the area of Walasmulla. It is bejeweled as one of the finest hotel in the southern province. We ensure your stay is perfect and your experiences are complete since 2002 our
            valuable guests have experienced a luxurious gateway in the city with our-on-site facilities and contemporary amenities. No matter the event, be it the wedding of the century or a small corporate business meeting or even a birthday party,
            Minoli hotel and restaurant is equipped to create the perfect affair. Thanks to the dedicated service of our experienced teams, we have a fantastic selection of spacious wedding halls in Sri Lanka. Modern boardrooms that will add a touch of
            elegance and magic to your special celebration.
        </div>

        <div class="col right">
            <img src="images/1.jpg" id="imgc">
        </div>

    </div>
    </div>
</body>

</html>