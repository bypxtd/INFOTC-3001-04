<!DOCTYPE HTML>
<!-- 
TODO:

sql injection tests
	style
	add table
	delete user 

redirect
required fields
validate / restrict input
trim input
mysqli_real_escape_string
prepared statements
-->
<html>

<title>
	Final Project
</title>

<head></head>

<style>
	table, th, td {
		border: 1px solid black;
	}
	
	table {
		border-collapse: collapse;
	}
</style>

<body>
	<!-- Form submission -->
	<form method="post" action="">
		Name: <input type="text" name="name">
		<br>
		Email: <input type="text" name="email">
		<br>
		<input type="submit" name="submit">
	</form>
	
	<?php
		// Database credentials
		$dbhost = "localhost";
		$dbusername = "root";
		$dbpassword = "Asdfzxcv17";
		$dbname = "FinalProject";
		
		// Create database connection 
		$conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
	
		// Set variables to POST
		$name = $_POST['name'];
		$email = $_POST['email'];
	
		// Form to database
		if (isset($_POST['submit'])) {
			// INSERT statement
			$insert = "INSERT INTO User (UserID, Name, Email) VALUES ('', '$name', '$email')";
			$conn->query($insert);
		}
	
		echo "<h2>Date:</h2>";
		// SELECT * FROM statement
		$sql = "SELECT * FROM User";
		$result = mysqli_query($conn, $sql);
	
		// Output
		if($result->num_rows > 0) {
			echo "<table><tr><th>UserID</th><th>Name</th><th>Email</th></tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" .$row["UserID"]. "</td><td>" .$row["Name"]. "</td><td>" .$row["Email"]. "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
		// Close database connection
		$conn->close();
	?>
</body>
</html>