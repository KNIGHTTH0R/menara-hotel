<?php
$conn3 = new mysqli("localhost","root","","db1");
$status=null;
$checkreg=null;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username=$_POST['username'];
    $name=$_POST['name'];
    $password=$_POST['password'];
    $role="user";
    if($_POST['repassword']==$password){
        $sql3="select * from users";
        $usersdata= $conn3->query($sql3);
        while($row = $usersdata->fetch_assoc()) {
            if($row["username"]==$username){
                $status="Username already registerd " ;
                $checkreg=0;
                $status="User Name already used";
                break;
            }
             $checkreg=1;
        }

        if($checkreg==1){
            $sql4 = "INSERT INTO  users (username,name,password,role) VALUES ('$username','$name', '$password','$role')";
            $result = $conn3->query($sql4);
            unset($_POST);
            header('Location:login.php');
        }
    }
    else{
    $status="password must same";
    unset($_POST);
    }
}
?>


<html>

<body>
    <form method="post" action="register.php">
        username:<input type="text" name="username" required><br>
        name:<input type="text" name="name" required><br>
        password:<input type="password" name="password" required><br>
        repassword:<input type="password" name="repassword" required><br>
        <input type="submit">
    </form>
    <?php
    echo $status;
    ?>
</body>

</html>