<?php
session_start();

if ( (isset($_SESSION["login"])) && ($_SESSION["role"] == "admin") ) {
    header("Location: admin");
    exit;
    
} elseif ( (isset($_SESSION["login"])) && ($_SESSION["role"] == "super") ){
    header("Location: super_admin");
    exit;
};

require 'function.php';
 
if( isset($_POST["login"]) ) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM login WHERE email = '$email' AND password = '$password'");
     
    $row = mysqli_fetch_array($result);
    $role = $row["role"] ;
    $number_rows =  mysqli_num_rows($result);

    if ( ($number_rows > 0) && ($role == 'super') ) {
            $_SESSION["login"] = True;
            $_SESSION["role"] = $role;

            header('location:super_admin');
            exit;

        } elseif ( ($number_rows > 0) && ($role == 'admin') ) {
            $_SESSION["login"] = True;
            $_SESSION["role"] = $role;

            header("Location: admin");
            exit;

        } else {
            echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
        };
};
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login || SMANILA INVENTARIS</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <img src="logoyp.png" width="100" height="100" style="display:block; margin:auto" />
                                        <h3 class="text-center font-weight-light my-4">Hello Welcome Back !</h3>
                                        <p class="text-center ">Sistem Inventaris SMA YP UNILA</p>
                                    </div>
                                    <div class="card-body">
                                        <!-- Form Login  -->
                                        <form method="post">
                                            <div class="form-group">
                                                <label for="inputEmail">Email address</label>
                                                <input class="form-control" name="email"id="inputEmail" type="email" placeholder="name@example.com" />
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword">Password</label>
                                                <input class="form-control" name="password"id="inputPassword" type="password" placeholder="Password" />
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" name="login">Login</button>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

        </div>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script> -->
    </body>
</html>
