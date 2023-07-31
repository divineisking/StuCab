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
                            <form action="#" class="form" id="forms" onsubmit="event.preventDefault()">


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
                                        <label for="position">Email</label>
                                        <input type="text" name="position" id="position" />
                                    </div>
                                    <div class="group-inputs">
                                        <label for="email">Password</label>
                                        <input type="text" name="email" id="email" />
                                    </div>
                                    <div class="group-inputs">
                                        <label for="email">Confirm password</label>
                                        <input type="text" name="email" id="email" />
                                    </div>
                                    <div class="">
                                        <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
                                    </div>
                                </div>
                                <div class="step-forms">
                                    <div class="group-inputs">
                                        <label for="phone">Facebook</label>
                                        <input type="text" name="phone" id="phone" />
                                    </div>
                                    <div class="group-inputs">
                                        <label for="email">Twitter</label>
                                        <input type="text" name="email" id="email" />
                                    </div>
                                    <div class="group-inputs">
                                        <label for="email">Linkedin</label>
                                        <input type="text" name="email" id="email" />
                                    </div>
                                    <div class="group-inputs">
                                        <label for="email">Dribbble</label>
                                        <input type="text" name="email" id="email" />
                                    </div>
                                    <div class="btns-group">
                                        <a href="#" class="btn btn-prev">Previous</a>
                                        <a href="#" class="btn btn-next">Next</a>
                                    </div>
                                </div>
                                <div class="step-forms">
                                    <div class="group-inputs">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" name="dob" id="dob" />
                                    </div>
                                    <div class="group-inputs">
                                        <label for="ID">National ID</label>
                                        <input type="number" name="ID" id="ID" />
                                    </div>

                                    <div class="group-inputs">
                                        <label for="ID">Account Number</label>
                                        <input type="number" name="ID" id="ID" />
                                    </div>

                                    <div class="group-inputs">
                                        <label for="ID">Swift Code</label>
                                        <input type="text" name="ID" id="ID" />
                                    </div>
                                    <div class="btns-group">
                                        <a href="#" class="btn btn-prev">Previous</a>
                                        <input type="submit" value="Submit" id="submit-form" class="btn" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="mt-3">
                            <p class="mb-0 text-muted">Already have an account?</p>
                            <div class="btn btn-primary">Log in<span class="fas fa-chevron-right ms-1"></span></div>
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

</html>