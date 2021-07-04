<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>
<?php
    include "included/config.php";
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql = "SELECT * from user_tbl WHERE username = '" . $username . "' AND password = '" . $password . "'";
        $result = $conn->query($sql);

        // check result 

        if($result->num_rows > 0 )
        {
            $row = $result->fetch_assoc();
            $_SESSION["name"] = $row['name'];
            $_SESSION["usertype"] = $row['user_type'];
            $conn->close();

            echo "
            <script>
                window.location.href='Dashboard.php';
            </script>
            ";
        }
        else
        {
            echo "
            <script>
            alert('Incorrect Credentials');
            </script>";
        }
    }
?>
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10" style="margin-top: 200px;">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex"><img class="img-fluid" style="min-width: 440px;max-height: 440px;" src="assets/img/bantaylogo.jpg"></div>
                            <div class="col-lg-6">
                                <div class="p-5" style="margin-top: 32px;">
                                    <div class="text-center">
                                        <h3 class="text-dark mb-4">Welcome Back!</h3>
                                    </div>
                                    <!-- log in form -->
                                    <form class="user" action = "#" method = "post">
                                        <!--<div class="form-group"><input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" name="username"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password"></div>-->
                                        <div class="input-group mb-3">
                                            <input type="text" name="username" class="form-control form-control-user" placeholder="Username" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><a><i class="fas fa-grin-beam" aria-hidden="true"></i></a></span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3" id="show_hide_password">
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2"><a href=""><i class="fas fa-eye-slash" aria-hidden="true"></i></a></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div><input class="btn btn-primary btn-block text-white btn-user" type="submit" name="submit" value="Login">
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/index.js"></script>
</body>

</html>