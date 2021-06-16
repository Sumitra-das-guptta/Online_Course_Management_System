<?php
//get values passe from form in login.php file
$username = $_POST['uname'];
$password = $_POST['psw'];



//connect to the server and select database
mysql_connect("localhost","root","");
mysql_select_db("login");

//query the database for user
$result = mysql_query("select * from users where username = '$username' and password = '$password'") 
or die("Failed to query database ".mysql_error());
$row = mysql_fetch_array($result);
if ($row['username'] == $username && $row['password'] == $password) {
	echo "login success!!! Welcome ".$row['username'];
}
else{
	echo "Failed to login!";
}
?>