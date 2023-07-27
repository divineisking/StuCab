<?php
// Start the session
session_start();

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the input from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Replace these variables with your actual database credentials
    $db_host = 'your_database_host';
    $db_user = 'your_database_username';
    $db_pass = 'your_database_password';
    $db_name = 'your_database_name';

    // Create a database connection using mysqli with prepared statements
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Check if the connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query with a placeholder to fetch user data based on the provided username
    $sql = "SELECT user_id, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username); // "s" means the parameter is a string

    // Execute the prepared statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the query returned any rows
    if ($result->num_rows === 1) {
        // Fetch the user data
        $row = $result->fetch_assoc();

        // Verify the password using password_verify
        if (password_verify($password, $row['password'])) {
            // Password is correct, so the login is successful
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php"); // Redirect to the dashboard or some other page
            exit();
        } else {
            // Invalid password
            $error_message = "Invalid password";
        }
    } else {
        // User not found
        $error_message = "User not found";
    }

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $conn->close();
}
?>