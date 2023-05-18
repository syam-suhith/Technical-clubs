<?php
$servername = "localhost";
$username = "root";
$password = "hello";
$dbname = "clubs";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['Name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Prepare the SQL statement
$stmt = mysqli_prepare($conn, "INSERT INTO userrs (Name, Mail, PhoneNumber,YourComment) VALUES (?, ?, ?)");

if ($stmt === false) {
    die("Error: " . mysqli_error($conn));
}

// Bind parameters to the SQL statement
mysqli_stmt_bind_param($stmt, "sss", $name, $email, $phone);

// Execute the SQL statement
if (mysqli_stmt_execute($stmt)) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
