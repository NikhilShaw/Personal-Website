<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="user";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully<br>";

$email=$_POST['email'];


$select = $conn->query("SELECT `emails` FROM `sub` WHERE `emails` = '".$email."'") or exit(mysql_error());
if($select->num_rows!=0) {

    exit('This email is already being used');
}
else
{
	$sql= "INSERT INTO sub(emails) VALUES('$email')";

	if($conn->query($sql)==TRUE)
	{
		echo "data added";
	}
	else
		echo "ERROR:".$sql."<br>".$conn->error;

}


header("refresh:2; url=blog_signup.html");
	
$conn->close();

?>


