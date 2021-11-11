<?php
    include 'auth/connection.php';
    $conn = connect();
    $m = '';
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $userName = $_POST['uname'];
        $email= $_POST['email']?$_POST['email']:'';
        $pass = $_POST['pass'];
        $r_pass = $_POST['r_pass'];
        if($pass === $r_pass){
            $sq= "INSERT INTO users_info(name, user_name, email, password) VALUES('$name', '$userName', '$email', '$pass')";
            if($conn->query($sq) === true){
                header('Location: login.php');
            }
            else{
                $m = "Connection Not Established!";
            }
        }else{
            $m = "Password Not Match!";
        }
    }
?>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registration Form</title>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/register.css">
        <!-- Bootstrap CSS-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <form method="post" action="register.php" enctype="multipart/form-data">
            <div class="container">
                <span><?php if($m!='') echo $m; ?></span>
                <h1>Registration Form</h1>
                <p>Please fill up the form</p>
                <hr>
                <div>
                    <label>Your Name<span style="color: red">*</span></label>
                    <input name="name" id="name" type="text" placeholder="Enter Your Name" required>
                </div>
                <div>
                    <label>Your Username<span style="color: red">*</span></label>
                    <input name="uname" id="uname" type="text" placeholder="Enter Your Username" required>
                </div>
                <div>
                    <label>Your Email</label>
                    <input name="email" id="email" type="email" placeholder="Enter Your Email">
                </div>
                <div>
                    <label>Your Password<span style="color: red">*</span></label>
                    <input name="pass" id="pass" type="password" placeholder="Enter Your Password" required>
                </div>
                <div>
                    <label>Your Password Again<span style="color: red">*</span></label>
                    <input name="r_pass" id="pass" type="password" placeholder="Confirm Your Password" required>
                </div>
                <div style="text-align: center;">
                    <p><span>***</span>By creating your account you agree to our Terms & Privacy Policy</p>
                </div>
                <div style="text-align: center; padding: 20px;">
                    <input name="submit" type="submit" value="Submit" class="btn btn-primary">
                </div>
                <div style="text-align: center;">
                    <p>Already have an account? <a href="login.php" style="text-decoration: none">Sign in</a></p>
                </div>
            </div>
        </form>
        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        -->
    </body>
</html>