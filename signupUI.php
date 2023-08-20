<?php
// Start the session
session_start();

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the input from the signup form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $user_id = random_int( 2, 1024);

    // Replace these variables with your actual database credentials
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'stucab';

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

        // Pass the error message to JavaScript
        echo "<script>let errorMessage = " . json_encode($error_message) . ";</script>";
    } else {
        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user information into the database
        $insert_query = "INSERT INTO users (username, password, email, role, user_id) VALUES (?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($insert_query);
        $stmt_insert->bind_param("sssss", $username, $hashed_password, $email, $role, $user_id);
        $stmt_insert->execute();

        // Close the prepared statements
        $stmt_insert->close();
        $stmt_check->close();

        // Close the database connection
        $conn->close();

        // Redirect the user to a success page or a login page
        header("Location: loginUI.php");
        exit();
    }

    // Close the prepared statement
    $stmt_check->close();

    // Close the database connection
    $conn->close();
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <style src="CSS/signupform.css"></style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');


        :root {
            --primary-color: rgb(11, 78, 179)
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Montserrat, "Segoe UI", 'Poppins', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            margin: 50px auto;
        }

        .body {
            position: relative;
            width: 720px;
            height: 440px;
            margin: 20px auto;
            border: 1px solid #dddd;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .box-1 img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .box-2 {
            padding: 10px;
        }

        .box-1,
        .box-2 {
            width: 50%;
        }

        .h-1 {
            font-size: 24px;
            font-weight: 700;
        }

        .text-muted {
            font-size: 14px;
        }

        .container .box {
            width: 100px;
            height: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 2px solid transparent;
            text-decoration: none;
            color: #615f5fdd;
        }

        .box:active,
        .box:visited {
            border: 2px solid #ee82ee;
        }

        .box:hover {
            border: 2px solid #ee82ee;
        }

        .btn.btn-primary {
            background-color: transparent;
            color: #ee82ee;
            border: 0px;
            padding: 0;
            font-size: 14px;
        }

        .btn.btn-primary .fas.fa-chevron-right {
            font-size: 12px;
        }

        .footer .p-color {
            color: #ee82ee;
        }

        .footer.text-muted {
            font-size: 10px;
        }

        .fas.fa-times {
            position: absolute;
            top: 20px;
            right: 20px;
            height: 20px;
            width: 20px;
            background-color: #f3cff379;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .fas.fa-times:hover {
            color: #ff0000;
        }

        @media (max-width:767px) {
            body {
                padding: 10px;
            }

            .body {
                width: 100%;
                height: 100%;
            }

            .box-1 {
                width: 100%;
            }

            .box-2 {
                width: 100%;
                height: 440px;
            }
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php if (isset($error_message)) : ?>
    <p>
        <?php echo $error_message; ?>
    </p>
    <?php endif; ?>
    <div class="container">
        <div class="body d-md-flex align-items-center justify-content-between">
            <div class="box-1 mt-md-0 mt-5">
                <img src="IMG/signupIMG.jpg" class="" alt="">
            </div>
            <div class=" box-2 d-flex flex-column h-100">
                <div class="mt-5">
                    <p class="mb-1 h-1">Create Account.</p>
                    <p class="text-muted mb-2">From Campus to Class, StuCab's Got Your Back - Eco-Friendly and Affordable!</p>
                    <div class="d-flex flex-column ">
                        <div class="d-flex align-items-center">
                            <form action="" method="POST" class="form">


                                <div class="progressbar">
                                    <div class="progress" id="progress"></div>

                                    <div class="progress-step progress-step-active" data-title="Account"></div>

                                    <div class="progress-step" data-title="Social"></div>
                                    <div class="progress-step" data-title="Personal"></div>
                                </div>
                                <div class="step-forms step-forms-active">
                                    <div class="group-inputs">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" />
                                    </div>
                                    <div class="group-inputs">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email" />
                                    </div>
                                    <div class="group-inputs">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" />
                                    </div>
                                    <div class="group-inputs">
                                        <label for="confirm password">Confirm password</label>
                                        <input type="password" name="confirm password" id="confirm_password" />
                                    </div>
                                    <div class="group-inputs">
                                        <label for="email">Signup as </label>
                                        <select name="role">
                                            <option value="student">Student</option>
                                            <option value="driver">Driver</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="submit" name="submit">
                            </form>
                        </div>
                        <div class="mt-3">
                            <p class="mb-0 text-muted">Already have an account?</p>
                            <div class="btn btn-primary"><a href="loginUI.php">Login</a><span class="fas fa-chevron-right ms-1"></span></div>
                        </div>
                    </div>
                </div>
                <div class="mt-auto">
                    <p class="footer text-muted mb-0 mt-md-0 mt-4">By register you agree with our
                        <span class="p-color me-1">terms and conditions</span>and
                        <span class="p-color ms-1">privacy policy</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    // Check if there's an error message from PHP
    if (typeof errorMessage !== 'undefined' && errorMessage !== null) {
        // Create the popup
        alert(errorMessage);
    }
</script>

</html>