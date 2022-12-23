<?php
    include('../../database/conexao.php');

    include('../../database/protect.php');

    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_POST['insertPublicacao'])){        
        $titulo = $_POST['txtTitulo'];
        $descricao = $_POST['txtDesc'];
        $resumo = $_POST['txtResumo'];
        $artigo = $_POST['txtArt'];
        $conteudo = $_POST['cbxConteudo'];
        $user = $_SESSION['id'];

        $sqlInsert = "INSERT INTO publicacoes(titulo, descricao, resumo, artigo, conteudo, usuario, datahora_publicacao) VALUES ('$titulo', '$descricao', '$resumo', '$artigo', '$conteudo', '$user', now())";

        $result = $mysqli->query($sqlInsert);

        mysqli_close($mysqli);
    }

    header("Location: ../users/home.php");

?>