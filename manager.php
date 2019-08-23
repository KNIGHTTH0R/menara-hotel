<?php
session_start();
$conn3 = new mysqli("localhost","root", "","db1");
$sql3="select * from comments";
echo "comments";
$result = $conn3->query($sql3);
while($row = $result->fetch_assoc()) {
    echo "<br> Username: ". $row["username"]. "         Comment:". $row["comment"] . "<br>";
}

?>