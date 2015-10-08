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
	$REGNO=strtoupper($row['REGNO']);
	if(($REGNO==$Regno)&&($row["phpro_password"]==$pass)){
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
<meta charset='utf-8'>
<link rel='stylesheet' type='text/css' href='stylesheetmenu1.css'/>
<title>OPEN LIBRARY - You are the library!!</title>
</head>
<body background='Book-iPad-wallpaper-Library-1.jpg' >

<ul>
<li><h1>
WELCOME TO OPENLIBRARY...</h1>
</li>
        <li><a href='viewprofile.php' target='_blank'><h3>View Profile</h3></a></li>
        <li><a href='Help.html' target='_blank'><h3>Help</h3></a></li>
        <li><a href='About_Us.html' target='_blank'><h3>About Us</h3></a></li>
        <li><a href='Contact_Us.html'  target='_blank''><h3>Contact Us</h3></a></li>
        
         <li>
            <a href='#'><h3>Settings &#9662;</h3></a>
            <ul class='dropdown'>
                <li><a href='editprofile.php' target='_blank'>Edit Profile</a></li>
		<li><a href='Pass.html' target='_blank'>Password</a></li>
                <li><a href='deletbook.php' target='_blank'>Delete Books</a></li>
                <li><a href='logout.php'>Logout</a></li>
            </ul>
        </li>
        
    </ul>


<iframe src=postlogin.html  height=99% width=99% frameborder='0' scrolling='no'></iframe></body></html>";
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
