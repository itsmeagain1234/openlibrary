<?php
session_start();
$Regno=$_POST['REGNO'];
$pass=$_POST['phpro_password'];
$Regno=strtoupper($Regno);
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
		$_SESSION['username']=$row['USERNAME'];
		 $_SESSION['password']=$row["phpro_password"];
		$_SESSION['email']=$row["EMAILID"];
		$_SESSION['MOB']=$row["MOBNO"];
                  $_SESSION['flagg']=0;		
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
<link rel='stylesheet' type='text/css' href='stylesheetmenu1.css'/>
<meta charset='utf-8'>
<title>NAV BAR</title>
</head>
<body background='Book-iPad-wallpaper-Library-1.jpg' >
<ul>
        <li><a href='viewprofile.php' target='_blank'><h3>View Profile</h3></a></li>
        <li><a href='Help.html'><h3>Help</h3></a></li>
        <li><a href='About.html'><h3>About Us</h3></a></li>
        <li><a href='Contact.html'><h3>Contact Us</h3></a></li>
        
         <li>
            <a href='#'><h3>Settings &#9662;</h3></a>
            <ul class='dropdown'>
                <li><a href='editprofile.php' target='_blank'>Edit Profile</a></li>
		<li><a href='Pass.html' target='_blank'>Change Password</a></li>
                <li><a href='deletbook.php' target='_blank'>Delet Books</a></li>
                <li><a href='logout.php'>Logout</a></li>
            </ul>
        </li>
        
    </ul>


<h1 align='center'><font color='white' face='verdana' color='green'> WELCOME TO OPEN-LIBRARY</font></h1> <iframe src=postlogin.html  height=99% width=99% frameborder='0' scrolling='no'></iframe></body></html>";
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
	
