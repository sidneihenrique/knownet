<?php
    include('../../database/conexao.php');

    include('../../database/protect.php');

    if(isset($_POST['updateConteudo'])){
        $id_conteudo = $_POST['txtID'];
        $nome_conteudo = $_POST['txtConteudo'];
        $id_materia = $_POST['cbxMateria'];

        $sqlUpdate = "UPDATE conteudos SET nome='$nome_conteudo', materia='$id_materia'
                WHERE id = $id_conteudo";

        $result = $mysqli->query($sqlUpdate);?>
        <script>
            alert('Conteúdo atualizado com sucesso!');
            location.href="conteudos.php";
        </script>
    <?php
    }
?>