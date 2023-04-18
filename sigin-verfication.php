<?php
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
    

    $a = $_POST['inputFirstName'];
    $b = $_POST['inputPassword'];
    $c = $_POST['inputPasswordConfirm'];
    $d = $_POST['inputEmail'];

    if($b==$c){
    $sql = "INSERT INTO `userlogin`( `Name`, `email`, `password`) 
    VALUES ('$a','$d','$b')";
if ($conn->query($sql) === TRUE) {
  header("location:login.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
    }
    else{
        echo "password do not match";
    }
    $conn->close();

?>