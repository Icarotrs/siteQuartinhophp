<?php

include('protect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    Bem-vindo ao painel, <?php echo $_SESSION['nome'] ?>


    <p>
        <a href="logout.php">Finalizar sessão</a>
    </p>
</body>
</html>