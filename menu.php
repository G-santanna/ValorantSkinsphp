<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        ul{
            background-color: #0f1822;
        }
        #linkmenu{
            color: #ebe6e0;
        }
    </style>
</head>
<body>
    <ul>
        <li><a id="linkmenu" href="home.php">HOME</a></li>
        <li><a id="linkmenu" href="list_skins.php">SKINS</a></li>
        <li><a id="linkmenu" href="list_admins.php">COLABORADORES</a></li>
        <li><a id="linkmenu" href="cad_skins.php">CADASTRAR SKINS</a></li>
        <li><a id="linkmenu" href="cad_admin.php">CADASTRAR ADMIN</a></li>
        <li><a id="linkmenu" href="pesquisa.php">PESQUISAR</a></li>
        <?php 
        @session_start();
        if(!isset($_SESSION['login']) || $_SESSION['login'] != true){
            echo "<li><a id=linkmenu href=home.php>LOGIN</a></li>";
        }else{
            echo "<li><a id=linkmenu href=logout.php>$_SESSION[nome]</a></li>";
        }
        ?>
    </ul>
</body>
</html>