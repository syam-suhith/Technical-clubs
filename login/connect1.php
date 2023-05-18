<?php
// Database connection information
$servername = "localhost";
$username = "root";
$password = "hello";
$dbname = "clubs";

// Connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the login form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form inputs
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare the SQL query to retrieve the user data
    $sql = "SELECT * FROM users8 WHERE username = '$username'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if a user with the given username was found
    if (mysqli_num_rows($result) == 1) {
        // Retrieve the user data from the result
        $row = mysqli_fetch_assoc($result);

        // Verify the password
        if ($password == $row["password"]) {
            // Password is correct, log in the user
            // You can redirect the user to a secure page here
            echo "Welcome";
        } else {
            // Password is incorrect, show an error message
            echo "Wrong password!";
        }
    } else {
        // Username not found, show an error message
        echo "Wrong username!";
    }
}

// Close the database connection
mysqli_close($conn);
?>
