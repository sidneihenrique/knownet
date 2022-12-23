<?php
    include('../../database/conexao.php');

    include('../../database/protect.php');    

    if(isset($_POST['updPub'])){   

        $id_pub = $_POST['txtID'];

        $titulo = $_POST['txtTitulo'];       
        $descricao = $_POST['txtDesc'];  
        $resumo = $_POST['txtResumo'];               
        $artigo = $_POST['txtArt'];
        $conteudo = $_POST['cbxConteudo'];       
        $usuario = $_SESSION['id'];        

        $sqlUpdate = "UPDATE publicacoes SET titulo='$titulo', descricao='$descricao', resumo='$resumo', artigo='$artigo', conteudo='$conteudo' WHERE id = $id_pub";

        $result = $mysqli->query($sqlUpdate);?>
        <script>
            alert('Publicação alterada com sucesso!');
            location.href="../users/home.php";
        </script>
    <?php
    } else{
        header("Location: ../users/home.php");
    }    
?>
