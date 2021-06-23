<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="admin_bg">
<div class="container py-3">
        <div class="row">
            <div class="col-12 text-center my-2 head-title">
                <h2 class="text-dark text-bolder">COMPUTER UNIVERSITY (NEW YOUK)</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-6 col-md-8 login-box mx-auto">
                <div class="col-lg-12">
                   <img src="../images/logo.jpg" alt="">
                </div>
                <div class="col-lg-12 login-title">
                    ADMIN PANEL
                </div>

                <div class="col-12 login-form mx-2">
                        <form action="../_actions/admin_login.php" method="post">
                        <?php if(isset($_GET['login_fail'])): ?>
                            <div class="col-12 mt-2">
                                <p class="text-center text-danger text-bolder">Admin Login Fail,Try Again</p>
                            </div>
                        <?php endif ?>
                            <div class="form-group">
                                <label class="form-control-label">EMAIL</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <div class="col-lg-12 login-button">
                                    <button type="submit">LOGIN</button>
                            </div>

                            <a href="#"><p class="text-center">Forget Password?</p></a>
                        </form>
                </div>
            </div>
        </div>





    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/fontawesome.js"></script>

</body>

</html>