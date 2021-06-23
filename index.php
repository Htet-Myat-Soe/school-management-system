<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCSL_Login</title>
    <link rel="stylesheet" href="css/login.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->

</head>
<body>
    
   <div class="container-fluid">
       <div class="row">
           <div class="col-12">
               <h1 class="school-name">COMPUTER UNIVERSITY (NEW YOUK)</h1>
           </div>
           <div class="col-12">
           <?php if(isset($_GET['login_fail'])): ?>
                    
            <div class="alert-danger">
                User Login Fail , Try Again !
            </div>
                    
                <?php endif ?>
           <div class="container" id="container">
                <div class="form-container sign-up-container">
                    <form action="_actions/login.php" method="POST">
                        <h1>Teachers Login</h1>    
                        <input type="text" placeholder="Role No" name="role_no" />
                        <input type="email" placeholder="Email" name="email"/>
                        <input type="password" placeholder="Password" name="password"/>
                        <a href="#">Forgot your password?</a>
                        <button type="submit">Login</button>
                    </form>
                </div>
                <div class="form-container sign-in-container">
                    <form action="_actions/login.php" method="POST">
                        <h1>Students Login</h1>    
                        <input type="text" placeholder="Role No" name="role_no" />
                        <input type="email" placeholder="Email" name="email"/>
                        <input type="password" placeholder="Password" name="password"/>
                        <a href="#">Forgot your password?</a>
                        <button type="submit">Login</button>
                    </form>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1>Hello, Friend!</h1>
                            <p>To keep connected with us please login with your personal info</p>
                            <button class="ghost" id="signIn">Students</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h1>Hello, Teacher!</h1>
                            <p>To keep connected with us please login with your personal info</p>
                            <button class="ghost" id="signUp">Teachers</button>
                        </div>
                    </div>
                </div>
            </div>
           </div>
       </div>
   </div>
   <script src="../js/fontawesome.js"></script>
   <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
   </script>
</body>
</html>