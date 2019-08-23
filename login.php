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
    if($row["username"]==$_POST["username"]){
        if($row["password"]==$_POST["password"]){
            $_SESSION["username"] =$_POST["username"];
            $_SESSION["password"] =$_POST["password"];
            $_SESSION["name"]=$row["name"];
            $_SESSION["loged_in"]=true;
            if($row["role"]=="manager"){

                header("Location:manager.php");
            }
            else{
                header("Location:index.php");
            }
           
        }
    }
        
}
$status="Worng Passwor or Username";
}
?>
    <html>

    <body>
        <form method="post" action="login.php">
            <input type="text" name="username" required><br>
            <input type="password" name="password" required><br>
            <input type="submit">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            echo $status;
        }
        ?>
    </body>

    </html>