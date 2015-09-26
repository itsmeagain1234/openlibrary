<?php

/*** begin our session ***/
session_start();
$iframesource='nothing';
/*** check if the users is already logged in ***/
if(isset( $_SESSION['REGNO'] ))
{
    $message = 'User is alive...';
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $REGNO = filter_var($_POST['REGNO'], FILTER_SANITIZE_STRING);
    $phpro_password = filter_var($_POST['phpro_password'], FILTER_SANITIZE_STRING);
    /*** now we can encrypt the password ***/
    //$phpro_password = sha1( $phpro_password );
    $mycheck1='we are after setting the params'; 

/*** connect to database ***/
    /*** mysql hostname ***/
    $mysql_hostname = 'localhost';

    /*** mysql username ***/
    $mysql_username = 'root';

    /*** mysql password ***/
    $mysql_password = 'admin123';

    /*** database name ***/
    $mysql_dbname = 'openlibrary';

    try
    {
        $dbh = new PDO("mysql:host=$mysql_hostname;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT REGNO, USERNAME, phpro_password FROM phpro_users 
                    WHERE REGNO = :REGNO AND phpro_password = :phpro_password");
	
$mycheck2='after fetching the value and having some data in hand';
        /*** bind the parameters ***/
        $stmt->bindParam(':REGNO', $REGNO, PDO::PARAM_STR);
        $stmt->bindParam(':phpro_password', $phpro_password, PDO::PARAM_STR, 40);

        /*** execute the prepared statement ***/
        $stmt->execute();
	$result=$stmt->fetch();
	$_SESSION['NAME']=$result["USERNAME"];
	$_SESSION['REGNO']=$result['REGNO'];
        /*** check for a result ***/
        $user_id = $stmt ->fetchColumn();
	if($stmt->fetchColumn() > 0){
		$dataisthere='something found';
				}else {
		$dataisthere='nothing found';
			}
	


        /*** if we have no result then fail boat ***/
        if($user_id == false)
        {
                $message = 'Login Failed';
		$GLOBALS['iframesource']='logoutnor';
		
        }
        /*** if we do have a result, all is well ***/
        else
        {
                /*** set the session user_id variable ***/
		
                $_SESSION['REGNO'] = $REGNO;
                /*o* tell the user we are logged in ***/
                $message = 'You are now logged in';
		$GLOBALS['iframesource']='postlogin';
		
        }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later  "'+ $e;
    }
}

?>
<html>
<body background="background.jpg" > 
<a href="logout.php">Logout now</a>
<br>bye</br>
<?php echo $userid;echo $dataisthere; echo $iframesource;echo $message; ?>
 <iframe src="postlogin.html"  height=99% width=99% frameborder='0' scrolling='no'>
</iframe>
</body>
</html>

