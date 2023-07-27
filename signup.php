Certainly! Below is a procedural PHP code example for a basic signup logic:

```php
<?php
// Start the session
session_start();

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the input from the signup form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

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

    // Check if the username or email already exists in the database
    $check_query = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt_check = $conn->prepare($check_query);
    $stmt_check->bind_param("ss", $username, $email);
    $stmt_check->execute();

    $result = $stmt_check->get_result();
    if ($result->num_rows > 0) {
        // Username or email already exists
        $error_message = "Username or email already exists. Please choose a different one.";
    } else {
        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user information into the database
        $insert_query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt_insert = $conn->prepare($insert_query);
        $stmt_insert->bind_param("sss", $username, $hashed_password, $email);
        $stmt_insert->execute();

        // Close the prepared statements
        $stmt_insert->close();
        $stmt_check->close();

        // Close the database connection
        $conn->close();

        // Redirect the user to a success page or a login page
        header("Location: signup_success.php");
        exit();
    }

    // Close the prepared statement
    $stmt_check->close();

    // Close the database connection
    $conn->close();
}
?>
```