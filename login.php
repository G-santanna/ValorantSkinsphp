<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <fieldset id="quadro">
    <legend>Entrar</legend>

    <form class="formlogin" action="login.act.php" method="post" enctype="multipart/form-data">
    <p>Email:    <input type="text" name="email"></p>
    <p>Senha:    <input type="password" name="senha"></p>
    <p><input type="submit" id="botão" value="Entrar"></p>
    </form>
    
    <?php
    session_start();
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    </fieldset>
</body>
</html>