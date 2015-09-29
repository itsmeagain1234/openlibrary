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
$iframepage="login";
}

?>
<?php 
if ($Flag==0)
{
echo "<html>
<head>
<link rel='Stylesheet' type='text/css' href='Stylesheetmenu.css'>
<title>NAV BAR</title>
</head>
<body background='Book-iPad-wallpaper-Library-1.jpg '  class='news'>
  <header>
    <div class='nav'>
      <ul>
        <li class='users'><a href='#'>Users</a></li>
        <li class='check mail'><a href='#'>Check Mail</a></li>
        <li class='help'><a href='#'>Help</a></li>
        <li class='contact us'><a href='#'>Contact Us</a></li>
        <li class='about us'><a href='#'>About Us</a></li>
      </ul>
    </div>
  </header>
<p align='right'> <a href='logout.php'><button type='button'>LOGOUT</button></a></p></div><h1 align='center'><font color='white' face='verdana' color='green'> WELCOME TO OPEN-LIBRARY</font></h1> <iframe src=postlogin.html  height=99% width=99% frameborder='0' scrolling='no'></iframe></body></html>";
}
else 
{
echo "<html>
<head>
<title>OpenLibrary - You are the library!!  Login Page</title>
<link type='text/css' rel='stylesheet' href='style.css' />
</head>
<body>
<div id='container'>
<form >
<fieldset>
<p>
<label for='REGNO'><font color='red'><h3>INVALID USERNAME OR PASSWORD</h3></font></label>
</p>
<p>
<div id='lower'>
<a href=login.html><button type='button'>TRY AGAIN</button></a>
</div>
</p>
</fieldset>
</form>
</div>
</body>
</html>
";
}
?>
</body>
</html>
	
