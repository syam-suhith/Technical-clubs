<?php
	$Name = $_POST['Name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];

	// Database connection
	$conn = new mysqli('localhost','root','','regi');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into user(Name, email, password, phone) values(?, ?, ?, ?)");
		$stmt->bind_param("sssi", $Name, $email, $password, $phone);
		$stmt->execute();
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>