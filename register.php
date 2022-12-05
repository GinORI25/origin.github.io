<?php 

require 'dbcon.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            .container{
                position:relative;
                margin-top:5rem;
                width:420px;
                height:550px;
                border-radius: 10px;
                background:#1c1c1c;
                overflow:hidden;
            }
            .container::before{
                content:'';
                position: absolute;
                top:-50%;
                left:-50%;
                height: 420px;
                width: 550px;
                background: linear-gradient(0deg,transparent,rgb(71, 181, 44),rgb(71, 181, 44));
                animation:animate 7s linear infinite;
                transform-origin: bottom right;
                
            }
            .container::after{
                content:'';
                position: absolute;
                top:-50%;
                left:-50%;
                height: 420px;
                width: 550px;
                background: linear-gradient(0deg,transparent,rgb(71, 181, 44),rgb(71, 181, 44));
                animation:animate 6s linear infinite;
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
            .tbody{
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
            .tbody h1{
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
            input[type="reset"]
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
    <title>Register</title>

</head>
<body>
        <div class="container">
            <form a ction="index.php"method="post">
        <div class="tbody">
            <h1>Register</h1>
        <div class="inputbox">
            <input type="email" required="required" placeholder="Email" name="email">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
              </svg>
            <span>Email</span>
            <i></i>
        </div>
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
        <div class="inputbox">
            <input type="password" required="required" placeholder="Password" name="password2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-lock-fill" viewBox="0 0 16 16">
                <path d="M7 7a1 1 0 0 1 2 0v1H7V7zM6 9.3c0-.042.02-.107.105-.175A.637.637 0 0 1 6.5 9h3a.64.64 0 0 1 .395.125c.085.068.105.133.105.175v2.4c0 .042-.02.107-.105.175A.637.637 0 0 1 9.5 12h-3a.637.637 0 0 1-.395-.125C6.02 11.807 6 11.742 6 11.7V9.3z"/>
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM10 7v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V9.3c0-.627.46-1.058 1-1.224V7a2 2 0 1 1 4 0z"/>
                </svg>
            <span>Konfirmasi Password</span>
            <i></i>
        </div>
        <div class="links">
           <a href="index.php" style="margin-left:14rem; font-size: 0.75rem;">Sign in</a> 
        </div>
        <input type="submit" value="register" name="Register">   
       </div>
       
        </div>
            </form>
            <?php 

                  if(isset($_POST['Register'])) {

                    $email = htmlspecialchars($_POST['email']);
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);
                    $password2 = htmlspecialchars($_POST['password2']);
                    // $encryptedpassword = password_hash($password, PASSWORD_DEFAULT);

                    // echo $encryptedpassword;
                    $query = mysqli_query($con, "SELECT * FROM logindata WHERE email='$email'");
                    $count = mysqli_num_rows($query);

                    if($count > 0){
                        echo "tidak bisa register";
                    }
                    else{
                         $queryInsert = mysqli_query($con, "INSERT INTO logindata (email, username, password ) VALUES 
                         ('$email', '$username', '$password')");
                    }

                if ($password == $password2){
                    mysqli_query($con, "INSERT INTO logindata VALUES('', '$email', '$username', '$password')");
                    // echo "<div class='alert alert-light'> resgritasi sukses, silahkan Login</div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php'>";

                }elseif ($password !== $password2)
                    echo "<div  class='alert alert-light'> Password tidak cocok </div>";
                    echo "<meta http-equiv='refresh' content='1;url=register.php'>";



            }
            ?>
        </div>
        
</body>
</html>