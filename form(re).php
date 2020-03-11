<!DOCTYPE html>
<html>
<head>
	<title>MyGuests</title>
</head>
<body>
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
	First Name: <input type="text" name="firstname"><br>
	<br>
	Last Name: <input type="text" name="lastname"><br>
	<br>
	E-mail: <input type="text" name="email"><br>
	<br>
	<input type="submit">
	<h1>Want to DELETE something:</h1>

ID:<input type="text" name="ID"><br>
<br>
<input type="submit" name="DELETE" value="DELETE"><br>
<br>
	<h1>Your Result:</h1>
	</form>
	

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$id= $_POST['ID'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

if($firstname !=''||$lastname !=''||$email !=''){


$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('$firstname','$lastname','$email')";
}
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully"."<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$sql = "SELECT * FROM MyGuests";
$result = $conn->query($sql);


 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       echo "ID: " . $row["ID"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]." "."Email:".$row["email"]."<br>";
        
    echo "0 results";
}




$sql = "DELETE FROM MyGuests WHERE ID='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
 }


mysqli_close($conn);
?>
</body>
</html>