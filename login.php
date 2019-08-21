<?php

session_start();
$status;
$conn = new mysqli("localhost","root", "","db1");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    if($row["username"]==null){
        $status="Worng Passwor or Username";
        break;
    }
    elseif($row["username"]==$_POST["username"]){
        if($row["password"]==$_POST["password"]){
            $_SESSION["username"] =$_POST["username"];
            $_SESSION["password"] =$_POST["password"];
            $_SESSION["name"]=$row["name"];
            $_SESSION["loged_in"]=true;

            header("Location:index.php");
        }
        else{
            $status="Worng Passwor or Username";
            break;
        }
       
    }
}
}
?>
    <html>

    <body>
        <form method="post" action="login.php">
            <input type="text" name="username"><br>
            <input type="password" name="password"><br>
            <input type="submit">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            echo $status;
        }
        ?>
    </body>

    </html>