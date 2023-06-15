<?php
include('conexao.php');

if(isset($_POST['email']) && isset($_POST['senha'])) {

    if(empty($_POST['email'])){
        echo "Preencha seu email";
    } else if(empty($_POST['senha'])){
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuários WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Erro na execução do código: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['user'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("location: painel.php");
            exit();

        } else {
            echo "Falha ao logar, email ou senha incorretos";
        }

    }
} else {
    if(empty($_POST['email'])){
        echo "Preencha seu email";
    } else if(empty($_POST['senha'])){
        echo "Preencha sua senha";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quartinho</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <header class="menu">


        <h2 class="logo">Quartinho</h2>


        <div class="mobile-menu">

            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>

        </div>

        
        <nav class = "navigation">

            <a href="#">Home</a>
            <a href="#">Sobre nós</a>
            <a href="#">Serviços</a>
            <a href="#">Contato</a>
            <a href="https://discord.gg/RBCTP7acXc">Discord</a>
            
            <button class="login-popup"> Login </button>
    
        </nav>

    </header>

    <div class="wrapper">

        <span class="icon-close">

            <ion-icon name="close-outline"></ion-icon>
            
        </span>


        
        <div class="form-box login">
            <h2>LOGIN</h2>
            <form action="" method="POST">


                <div class="input-box">

                    <span class="icon">
                        <ion-icon name="mail-outline"></ion-icon>
                    </span>

                    <input type="email" name="email" required>

                    <label>Email</label>

                </div>

                
                <div class="input-box">

                    <span class="icon">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </span>

                    <input type="password" name="senha" required>

                    <label>Password</label>

                </div>

                
                <div class="remember-forgot">

                <label> <input type="checkbox">Remember me </label>

                <a href="#">Forgot password?</a>

                </div>

                

                <button type="submit" class="submitbutton">Login</button>

                <div class="login-registro">
                    <p>Don't Have an Account?  <a href="#" class="register-link">Register</a></p>
                </div>

                
            </form>
        </div>


 

<div class="form-box register">


    <h2>Registration</h2>
    
    <form action="#">

        <div class="input-box">

            <span class="icon">
                <ion-icon name="person-circle-outline"></ion-icon>
            </span>

            <input type="text" required>

            <label>Username</label>

        </div>


        <div class="input-box">

            <span class="icon">
                <ion-icon name="mail-outline"></ion-icon>
            </span>

            <input type="email" required>

            <label>Email</label>

        </div>

        
        <div class="input-box">

            <span class="icon">
                <ion-icon name="lock-closed-outline"></ion-icon>
            </span>

            <input type="password" required>

            <label>Password</label>

        </div>

        
        <div class="remember-forgot">


        <label> <input type="checkbox">I agree with the terms and conditions </label>


        </div>

        

        <button type="submit" class="submitbutton">Register</button>

        <div class="login-registro">
            <p>Have an Account?  <a href="#" class="login-link">Log in</a></p>
        </div>

        
    </form>


    

</div>

    </div>

    <div class="post-filter container"></div>
    


    <script src="scripts.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



</body>
</html>
