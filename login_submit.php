<?php
session_start();
$Regno=$_POST['REGNO'];
$pass=$_POST['phpro_password'];

$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "openlibrary";
$Flag=1;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
                        }
$sql="SELECT * from phpro_users";
               

$result = $conn->query($sql);
if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
	if(($row["REGNO"]==$Regno)&&($row["phpro_password"]==$pass)){
		echo "logged in";
		 $_SESSION['REGNO'] =$row["REGNO"];
			$Flag=0;	
			$iframepage="postlogin";
}
}}
if($Flag==1)
{
$iframepage="logoutnor";
};

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body background=" Book-iPad-wallpaper-Library-1.jpg">
<div>
<p align="right"> <a href="logout.php"><button type="button">LOGOUT</button></a></p>
</div>
<h1 align="center"><font face="verdana" color="green"> WELCOME TO OPEN-LIBRARY</font></h1>
 <iframe src=<?php echo $iframepage; ?>.html  height=99% width=99% frameborder='0' scrolling='no'> 
</iframe>
</body>
</html>
	