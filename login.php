<?php
    session_start();
    $_SESSION['user'] = '';
    $_SESSION['userid'] = '';
    include 'auth/connection.php';
    $conn = connect();
    $m = '';
    if(isset($_POST['submit'])){
        $userName = $_POST['uname'];
        $pass = $_POST['pass'];

        $sql = "SELECT * FROM users_info WHERE user_name = '$userName' AND password = '$pass'";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result) == 1){
            $user = mysqli_fetch_assoc($result);
            $id = $user['id'];
            $sq = "UPDATE users_info SET last_login_time = current_timestamp() WHERE id='$id'";
            $conn->query($sq);
            $_SESSION['user'] = $user['name'];
            $_SESSION['userid'] = $user['id'];
            header("Location: dashboard.php");
        }else{
            $m = "Credentials Mismatch!";
        }
    }
?>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/login.css">
        <title>Log In - IMS</title>
    </head>
    <body>
        <div class="logo">

        </div>
        <form method="post">
            <div class="box bg-img">
                <div class="content">
                        <h2>Log <span>In</span></h2>
                    <div class="forms">
                        <p style="color: red;padding: 20px;"><?php if($m!='') echo $m; ?></p>
                        <div class="user-input">
                            <input name="uname" type="text" class="login-input" placeholder="Username" id="name">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="pass-input">
                            <input name="pass" type="password" class="login-input" placeholder="Password" id="my-password">
                            <span class="eye" onclick="myFunction()">
                                <i class="fas fa-eye-slash" id="hide-1"></i>
                                <i class="fas fa-eye" id="hide-2"></i>
                            </span>
                        </div>
                    </div>
                    <button class="login-btn" type="submit" name="submit">Sign In</button>
                    <p class="new-account">Not a user? <a href="register.php">Sign Up now!</a></p>
                    <br>

                    <p class="f-pass">
                        <a href="#">Forget Password?</a>
                    </p>
                </div>
            </div>
        </form>
        <script src="https://kit.fontawesome.com/d40d3b593c.js" crossorigin="anonymous"></script>
    </body>
</html>
<script>
    function myFunction(){
        var x = document.getElementById("my-password");
        var y = document.getElementById("hide-1");
        var z = document.getElementById("hide-2");

        if(x.type === "password"){
            x.type = "test";
            y.style.display = "block";
            z.style.display = "none";

        }else{
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
</script>