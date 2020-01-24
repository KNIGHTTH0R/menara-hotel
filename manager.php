<?php 
    session_start();
    $status1=null;
    $conn=new mysqli("localhost", "root", "", "db1");
    $hb=array();

    function show_name()
{
    if (!empty($_SESSION)) {
        echo $_SESSION["name"];
    }
}

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['repassword'])){
            
                $username=$_POST['username'];
                $name=$_POST['name'];
                $password=$_POST['password'];
                $role=$_POST['role'];
                if($_POST['repassword']==$password){
                    $sql3="select * from users";
                    $usersdata= $conn->query($sql3);
                    while($row = $usersdata->fetch_assoc()) {
                        if($row["username"]==$username){
                            $status1="Username already registerd " ;
                            $checkreg=0;
                            $status1="User Name already used";
                            break;
                        }
                         $checkreg=1;
                    }
            
                    if($checkreg==1){
                        $sql4 = "INSERT INTO  users (username,name,password,role) VALUES ('$username','$name', '$password','$role')";
                        $result = $conn->query($sql4);
                        $status1="Done.Login now.";
                        unset($_POST);
                  
                    }
                }
                else{
                $status1="password must same";
                unset($_POST);
                }
    
        }
    }
    function confirmd() {
        header("Location:manager.php");
        $conn = new mysqli("localhost","root","","db1");
        $sql="UPDATE hallboking SET seen=1 WHERE username='54' " ;
        $result = $conn -> query($sql); 
        
    }



?> 

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/manager.css"></head>
        <script src="js/manager.js">
        
 
        </script>
    </head>
    <body>
        <div class="sidepanel">
            <div style="height:200px;"></div>
                <a href="index.php">Home</a>
            <a href="javascript:button('reg');">Register</a>
            <a href="javascript:button('alljob');">All jobs</a>
      
        </div>
        <div class="content" id="reg" >
            <h1 style="color:#1e2e11;">Register Users</h1>
            <form method="post" action="manager.php" >
                  <input type="text" name="username" placeholder="Username" required><br>
                   <input type="text" name="name" placeholder="Name" required><br>
                   <input type="password" name="password" placeholder="Password" required><br>
                    <input type="password" name="repassword" placeholder="RE-Password" required><br>
                    <select name="role">
                        <option value="Choose the Role"  disabled selected>Choose the Role</option>
                        <option value="user" >user</option>
                        <option value="admin">admin</option>
                        <option value="manager">manager</option>
                        <option value="chef">Chef</option>
                    </select> <br>
                    <input type="submit" value="Sign Up">
            </form>
            <?php echo $status1;?>
        </div>
        <div class="content" id="alljob" >
            <div class="jbtable">
                <?php 
                    $sql3="select * from comments";
                    $result=$conn->query($sql3);
                    echo "Comments";
                    echo"<table>";
                    while($row=$result->fetch_assoc()) {
                        echo "<tr><td> ". $row["username"]. "</td><td>". $row["comment"] . "</td></tr>";
                     }
                    echo"</table>";
                ?>
            </div>
            <div class="jbtable">
                <?php 
                    $sql3="SELECT * FROM mealorders";
                    $result=$conn->query($sql3);
                    echo "Meal Orders";
                    echo"<table>";
                    while($row=$result->fetch_assoc()) {
                        echo "<tr><td> ". $row["username"]. "</td><td>". $row["mobileno"]. "</td><td>". $row["meal"]. "</td><td>". $row["drinks"]."</td><td>". $row["desert"]."</td><td>". $row["additional"] . "</td></tr>";
                     }
                    echo"</table>";
                ?>
            </div>
            <div class="jbtable">
                <?php 
                    $sql3="SELECT * FROM hallboking";
                    $result=$conn->query($sql3);
                    echo "Hall Booking Requests";
                    echo"<table>";
                    while($row=$result->fetch_assoc()) {
                        echo "<tr><td> ". $row["username"]. "</td><td>". $row["mno"]. "</td><td>". $row["hallid"]. "</td><td>". $row["additional"] . "</td></tr>";
                     }
                    echo"</table>";	
                ?>
            </div>
        </div>
        <div class="content" id="unjob" >
        <div class="jbtable">
                <?php
                    
                    $sql3="SELECT * FROM hallboking WHERE seen=0 ";
                    $result=$conn->query($sql3);
                    echo "Hall Booking Requests";
                    echo"<table>";
                    while($row=$result->fetch_assoc()) {
                        $hb[0][0]=$row["username"];
                        $hb[0][1]=$row["mno"];
                        $hb[0][2]=$row["additional"];
                        echo "<tr><td> ". $row["username"]. "</td><td>". $row["mno"]. "</td><td>". $row["hallid"]. "</td><td>". $row["additional"] . "</td></tr>";
                     }
                    echo"</table>";	
                ?>
            </div>
        </div>
    </body>
</html>