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
    <div class="listmsg">
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    </div>
    <?php
        require('connect.php');
        $admins = mysqli_query($con, "select * from `tb_admin` order by `nome`");
        echo "<div class = box>";
        while($admin = mysqli_fetch_array($admins)){
        echo "<div class =\"scadm\">";
        echo "<p id = pag>$admin[nome]</p>";
        echo "<p id = pag>$admin[email]</p>";
        echo "<p id = pagimgadm><img src=$admin[imagem]></p>";
        if(!isset($_SESSION['login']) || $_SESSION['login'] != true){

        }else{
            if($_SESSION['codigo']==$admin['codigo']){
            echo"<p><a href=alterar_admins.php?cod=$admin[codigo]>Alterar</a></p>";
            echo"<p><a href=javascript:confirmar($admin[codigo])>Excluir</a></p>";
            }
        }
        echo "</div>";
        }
        echo "</div>";
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