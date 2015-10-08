<?php session_start() ?>
<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "openlibrary";
$Regno=$_SESSION['REGNO'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT bookdet.bookid,bookdet.bookname,bookdet.author,bookdet.regno,bookdet.status,bookdet.Request,phpro_users.username FROM bookdet join  phpro_users on bookdet.regno=phpro_users.regno ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<html>
<head>
    <title>DELETE BOOK</title>
</head>
<style type='text/css'>
    #wrapper {
        width:450px;
        margin:0 auto;
        font-family:Verdana, sans-serif;
    }
    legend {
        color:#0481b1;
        font-size:14px;
        padding:0 10px;
        background:#fff;
        -moz-border-radius:4px;
        box-shadow: 0 1px 5px rgba(4, 129, 177, 0.5);
        padding:5px 10px;
        text-transform:uppercase;
        font-family:Helvetica, sans-serif;
        font-weight:bold;
    }
    fieldset {
        border-radius:4px;
        background: #fff;
        background: -moz-linear-gradient(#fff, #f9fdff);
        background: -o-linear-gradient(#fff, #f9fdff);
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fff), to(#f9fdff)); /
        background: -webkit-linear-gradient(#fff, #f9fdff);
        padding:20px;
        border-color:rgba(4, 129, 177, 0.4);
    }
    input,
    textarea {
        color: #373737;
        background: #fff;
        border: 1px solid #CCCCCC;
        color: #aaa;
        font-size: 14px;
        line-height: 1.2em;
        margin-bottom:15px;

        -moz-border-radius:4px;
 -webkit-border-radius:4px;
        border-radius:4px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1) inset, 0 1px 0 rgba(255, 255, 255, 0.2);
    }
    input[type='text'],
    input[type='password']{
        padding: 8px 6px;
        height: 22px;
        width:280px;
    }
    input[type='text']:focus,
    input[type='password']:focus {
        background:#f5fcfe;
        text-indent: 0;
        z-index: 1;
        color: #373737;
        -webkit-transition-duration: 400ms;
        -webkit-transition-property: width, background;
        -webkit-transition-timing-function: ease;
        -moz-transition-duration: 400ms;
        -moz-transition-property: width, background;
        -moz-transition-timing-function: ease;
        -o-transition-duration: 400ms;
        -o-transition-property: width, background;
        -o-transition-timing-function: ease;
        width: 380px;

        border-color:#ccc;
        box-shadow:0 0 5px rgba(4, 129, 177, 0.5);
        opacity:0.6;
    }
    input[type='submit']{
        background: #222;
        border: none;
        text-shadow: 0 -1px 0 rgba(0,0,0,0.3);
        text-transform:uppercase;
        color: #eee;
        cursor: pointer;
        font-size: 15px;
        margin: 5px 0;
        padding: 5px 22px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-border-radius:4px;
        -webkit-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
    }
 button[type='button']{
        background: #222;
        border: none;
        text-shadow: 0 -1px 0 rgba(0,0,0,0.3);
        text-transform:uppercase;
        color: #eee;
        cursor: pointer;
        font-size: 10px;
        margin: 5px 0;
        padding: 5px 22px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-border-radius:4px;
        -webkit-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        -moz-box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
        box-shadow: 0px 1px 2px rgba(0,0,0,0.3);
    }

    textarea {
        padding:3px;
        width:96%;
        height:100px;
    }
    textarea:focus {
        background:#ebf8fd;
        text-indent: 0;
        z-index: 1;
        color: #373737;
        opacity:0.6;
        box-shadow:0 0 5px rgba(4, 129, 177, 0.5);
        border-color:#ccc;
    }
    .small {
        line-height:14px;
        font-size:12px;
        color:#999898;
        margin-bottom:3px;
    }
table {
align:center;
}
table, th, td {
height: 10px;
font-size:12px;
white-space: ;
}

</style><body><div id='wrapper'><form><fieldset><legend>BOOK Owned</legend><div><table border=3 bordercolor=#0481b1><tr><th><font color=#0481b1>Book Name</font></th><th><font color=#0481b1>Author</font></th><th><font color=#0481b1>Status</font></th><th><font color=#0481b1>Requested By</font></th><th><font color=#0481b1>User Link</font></th></tr></div>";
    while($row = $result->fetch_assoc()) {
	if($Regno == $row["regno"]){
	echo "<div><tr bgcolor='#B0B6B8'>";
	echo "<td>";
        echo  $row["bookname"];
	
	echo "</td>";
	echo "<td>";
	echo $row["author"];
	echo "</td>";
	echo "<td>";
	if($row["status"]==1){
	echo "Available";
	echo "</td><td><p align='center'>NA</p></td>";
	echo "<td><p align='center'>NA</p></td>";
	}
	elseif($row["status"]==2){
	$bookidval=$row["bookid"];
	echo "<p>Borrowed<br>";
	echo "<a href=received.php?bookid=$bookidval><button type='button'>RECEIVED</button></a></p>";
	}
	else{
	$bookidval=$row["bookid"];
	echo "<p> <a href=request.php?book=$bookidval><button type='button'>Accept</button></a> <br>";
	echo "<a href=denie.php?book=$bookidval><button type='button'>Deny</button></a></p> ";
}
echo "</td>";
echo "<td>";
echo $row["Request"];
echo "</td>";
if($row["Request"] !=NULL){
$request=$row["Request"];
echo "<td>";
echo "<a href='requser.php?req=$request'>REQUESTED USER DETAILS</a>";
echo "</td>";}
echo "</tr></div>";
}    }
echo "</table></fieldset></form></div></html>";
} else {
    echo "0 results";
}
$conn->close();
?>
