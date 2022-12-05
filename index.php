
<?php
session_start();
// Jika bisa login maka ke index.php
if (isset($_SESSION['login'])) {
    header('location:Full-data.php');
    exit;
}

// Memanggil atau membutuhkan file function.php
require 'dbcon.php';
include 'dbcon.php';

// jika tombol yang bernama login diklik
if (isset($_POST['login'])) {
    global $con;
    $username = mysqli_real_escape_string ($con, $_POST['username']);
    $password = mysqli_real_escape_string ($con, $_POST['password']);

    // mengambil data dari user dimana username yg diambil
    $result = mysqli_query($con, "SELECT * FROM loginData WHERE username = '$username' and password ='$password'");

    $cek = mysqli_num_rows($result);

    // jika $cek lebih dari 0, maka berhasil login dan masuk ke index.php
    if ($cek > 0) {
        $_SESSION['login'] = true;

        header('location: Full-data.php');
        exit;
    }
    // jika $cek adalah 0 maka tampilkan error
    $error = true;  
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login CRUD</title>
        <style>
            *{
                margin:0;
                padding:0;
                font-family:sans-serif;
            }
            body{
                display: flex;
                justify-content:center;
                background: url(bg-loading.png) no-repeat;
                background-size: cover;
            }
            .login-box{
                position:relative;
                margin-top:5rem;
                width:380px;
                height:420px;
                border-radius: 10px;
                background:#1c1c1c;
                overflow:hidden;
            }
            .login-box::before{
                content:'';
                position: absolute;
                top:-50%;
                left:-50%;
                height: 380px;
                width: 420px;
                background: linear-gradient(0deg,transparent,rgb(71, 181, 44),rgb(71, 181, 44));
                animation:animate 7s linear infinite;
                transform-origin: bottom right;
                
            }
            .login-box::after{
                content:'';
                position: absolute;
                top:-50%;
                left:-50%;
                height: 380px;
                width: 420px;
                background: linear-gradient(0deg,transparent,rgb(71, 181, 44),rgb(71, 181, 44));
                animation:animate 7s linear infinite;
                transform-origin: bottom right;
                animation-delay: -3s;
            }
              @keyframes animate
            {
                100%
                {
                    transform: rotate(360deg);
                }
                0%
                {
                    transform: rotate(0deg);
                }
            }
            .form{
                position: absolute;
                align-items:center;
                inset:3px;
                border-radius: 10px;
                background: rgb(34, 35, 34);
                z-index:10;
                padding: 50px,40px;
                display:flex;
                flex-direction: column;
            }
            .form h1{
                font-weight: 500;
                color:rgb(71, 181, 44);
                letter-spacing: 0.1em;
                text-align: center;
                margin-top: 2rem;
            }
            .inputbox{
                position: relative;
                width: 300px;
                margin-top:1rem;
               
            }
             .inputbox input{
                position: relative;
                width: 100%;
                padding: 20px 10px 10px;
                border:none;
                background: transparent;
                outline: none;
                color: rgb(34, 35, 34);
                font-size: 1em;
                letter-spacing: 0.05em;
                z-index:10;
            }
            .inputbox span{
                position: relative;
                left: 0;
                padding: 20px 0px 10px;
                font-size: 1em;
                color:gray;
                pointer-events: none;
                transition:0.5s;
                letter-spacing: 0.05em;
            }
            .inputbox input:valid ~ span,
            .inputbox input:focus ~ span
            {
             color:rgb(71, 181, 44);
             transform:translateX(0px)translateY(-34px);
             font-size: 0.75em;
            } 
            .inputbox i{
            position: absolute;
            left:0;
            bottom:0;
            width:100%;
            height: 2px;
            background:rgb(71, 181, 44);
            border-radius:4px;
            transition:0.5s;
            pointer-events:none;
            z-index:9;
            }
            .inputbox input:valid ~ i,
            .inputbox input:focus ~ i
            {
                height:3rem;
            }
            .links{
                display:flex;
                justify-content: right;
                margin-top: 0.5rem; 
             
            }
            .links a{
                font-size:10px;
                color:gray;
                margin:10px 0;
                text-decoration: none;
            }
            .links a:hover
            {
            color:rgb(71, 181, 44);
            }
            input[type="submit"]
            {
                border:none;
                outline: none;
                background:rgb(71, 181, 44) ;
                padding:11px 25px;
                width: 100px;
                margin-top: 2rem;
                border-radius: 5px;
                font-weight: 700;
                cursor:pointer;
            }

            svg{
                color:azure;
            }
        </style>
</head>
<body>
    <div class="login-box">
        <form action="index.php" method="post">
       <div class="form">
        <h1>Login</h1>
        
        <div class="inputbox">
            <input type="text" required="required" placeholder="Username" name="username">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
              </svg>
            <span>Username</span>
            <i></i>
        </div>
        <div class="inputbox">
            <input type="password" required="required" placeholder="Password" name="password">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-lock" viewBox="0 0 16 16">
                <path d="M8 5a1 1 0 0 1 1 1v1H7V6a1 1 0 0 1 1-1zm2 2.076V6a2 2 0 1 0-4 0v1.076c-.54.166-1 .597-1 1.224v2.4c0 .816.781 1.3 1.5 1.3h3c.719 0 1.5-.484 1.5-1.3V8.3c0-.627-.46-1.058-1-1.224zM6.105 8.125A.637.637 0 0 1 6.5 8h3a.64.64 0 0 1 .395.125c.085.068.105.133.105.175v2.4c0 .042-.02.107-.105.175A.637.637 0 0 1 9.5 11h-3a.637.637 0 0 1-.395-.125C6.02 10.807 6 10.742 6 10.7V8.3c0-.042.02-.107.105-.175z"/>
                <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
              </svg>
            <span>Password</span>
            <i></i>
        </div>
        <div class="links">
           <a href="#" style="margin-right: 4rem;">Forgot password?</a><br>
           <a href="register.php" style="margin-left:4rem; font-size: 0.75rem;">Sign up</a>
        </div>
        <input type="submit" value="Login" name="login">
       </div>
    </div>
</div>
</body>
</html>



