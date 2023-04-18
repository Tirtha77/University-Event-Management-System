<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database="event_db";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    $b = $_POST['inputPassword'];
    $d = $_POST['inputEmail'];

    $sql = "SELECT  `Email`, `Password` FROM `userlogin` WHERE `Email`='$d' and `Password`='$b'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        if($row["Email"]==$d&&$row["Password"]==$b){
            $_SESSION['email']=$row["Email"];
               header("location:homeuser.php?email=$d");
        }
        else{
            echo "No user exists"; 
        }
      }
    } else {
        echo "No user exists"; 
    }
    $conn->close();

?>