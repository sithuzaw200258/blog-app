<?php require_once "core/base.php"; ?>
<?php require_once "core/functions.php"; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Form</title>

    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/style.css">
</head>
<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-primary text-center font-weight-bolder">
                            <i class="feather-users"></i>
                            User Register
                        </h4>
                        <hr>

                        <?php
                        if (isset($_POST["reg-btn"])){
                            echo register();
                        }

                        ?>

                        <form method="post">
                            <div class="form-group">
                                <lable for="username">
                                    <i class="text-primary feather-user"></i>
                                    Your Name
                                </lable>
                                <input type="text" name="username" class="form-control" id="username" required>
                            </div>

                            <div class="form-group">
                                <lable for="email">
                                    <i class="text-primary feather-mail"></i>
                                    Your Eamil
                                </lable>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>

                            <div class="form-group">
                                <lable for="password">
                                    <i class="text-primary feather-lock"></i>
                                    Password
                                </lable>
                                <input type="password" name="password" min="8" class="form-control" id="password" required>
                            </div>

                            <div class="form-group">
                                <lable for="cpassword">
                                    <i class="text-primary feather-lock"></i>
                                    Confirm Password
                                </lable>
                                <input type="password" name="cpassword" min="8" class="form-control" id="cpassword" required>
                            </div>

                            <div class="form-group mb-0">
                                <button class="btn btn-primary" name="reg-btn">Register</button>
                                <a href="login.php" class="btn btn-link">Login in here</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo $url; ?>/assets/vendor/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $url; ?>/assets/vendor/popper.min.js"></script>
    <script src="<?php echo $url; ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $url; ?>/assets/js/app.js"></script>
</body>
</html>
