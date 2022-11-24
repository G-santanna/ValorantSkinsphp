<?php
include('menu.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Admins</title>
</head>
<body>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>

    <?php
        require('connect.php');
        $admins = mysqli_query($con, "select * from `tb_admin`");
        echo "<div class = box>";
        while($admin = mysqli_fetch_array($admins)){
        echo "<div><p> Nome: $admin[nome]</p>";
        echo "<p>Email: $admin[email]</p>";
        echo "<div class = colabimg> <p><img src=$admin[imagem]></p> </div>";
        if(!isset($_SESSION['login']) || $_SESSION['login'] != true){
            echo "</div>";
        }else{
            echo"<p><a href=alterar_admins.php?cod=$admin[codigo]>Alterar</a></p>";
            echo"<p><a href=javascript:confirmar($admin[codigo])>Excluir</a></p></div>";
        }

        }
    ?>
    <script>
        function confirmar(codigo){
            resposta = confirm("Deseja excluir o resgistro de administrador "+codigo+"?");

            if(resposta == true){
                window.location = "excluir_admin.php?cod="+codigo;
            }
        }
    </script>
</body>
</html>