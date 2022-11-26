<?php
    include('menu.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-image: url(imagens/Valorant);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .errormsg{
            height: 30px;
            width: 100%;
            margin-top: 75px;
        }
    </style>
</head>
<body>
    
    <fieldset id="quadro">
    <legend>Entrar</legend>

    <form class="formlogin" action="login.act.php" method="post" enctype="multipart/form-data">
    <p>Email:    <input type="text" name="email"></p>
    <p>Senha:    <input type="password" name="senha"></p>
    <p><input type="submit" id="botão" value="Entrar"></p>
    <div class="errormsg">
    <?php 
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?></div>
    </form>
    

    </fieldset>
</body>
</html>