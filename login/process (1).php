<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


//get values passe from form in login.php file
$username = $_POST['uname'];
$password = $_POST['psw'];

//to prevent mysql injection

$sql = "select * from users where username = '$username' and password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "login success!!! Welcome ".$row['username'];
	}
}
else{
	echo "Failed to login!";
}


$conn->close();
?> 

