<?php 




$serverName="localhost";
$username="root";
$password="";
$databaseName="userdb";

function executeNonQuery($query)
{
    global $serverName,$username,$password,$databaseName;
    $result=false;
    $connection=mysqli_connect($serverName,$username,$password,$databaseName);
    if($connection)
        {
            $result=mysqli_query($connection,$query);
        }
    return $result;
}









function getUserByIdPass($email,$password)
{




    $query="SELECT * FROM person WHERE email=$email and password=$password";
    echo $query;
    $result=executeNonQuery($query);
        return $result;
}


if(isset($_POST["submit"])){
	$res=getUserByIdPass($_POST["email"],$_POST["password"]);
	if($res){
		echo "<br>login";
	}
	else {
		echo "<br>not login";
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
	<FORM method="post" >
	Name:	<input type="text" name="email"><br>
	
			Password:<input type="Password" name="password">
			<br>
			<input type="submit" name="submit" value="submit">

		</FORM>
	




</body>
</html>
