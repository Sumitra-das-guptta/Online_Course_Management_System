<?php
$server="localhost";
$user="root";
$pass="";
$dbname="login";
//creating connection for sqli
$conn=new mysqli($server,$user,$pass,$dbname);
//checking connection
if($conn->connect_error){
	die("connection failed:".$conn->connect_error);
}
$id=mysqli_real_escape_string($conn, $_POST['roll']);
$name=mysqli_real_escape_string($conn, $_POST['name']);
$department=mysqli_real_escape_string($conn, $_POST['department']);
$batch=mysqli_real_escape_string($conn, $_POST['batch']);
$level=mysqli_real_escape_string($conn, $_POST['level']);
$term=mysqli_real_escape_string($conn, $_POST['term']);
$course=mysqli_real_escape_string($conn, $_POST['course']);
$credit=mysqli_real_escape_string($conn, $_POST['credit']);
$sql="INSERT INTO registration(id,name,department,batch,level,term,course,credit) VALUES ('$id','$name','$department','$batch','$level','$term','$course','$credit')";
if($conn->query($sql)==TRUE){
	echo "record added successfully";
}
else{
	echo "error" .$sql ."<br/>" . $conn->error;
}
$conn->close();
?>