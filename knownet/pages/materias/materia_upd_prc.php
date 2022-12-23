<?php
    include('../../database/conexao.php');

    include('../../database/protect.php');

    if(isset($_POST['updateMateria'])){
        $id_materia = $_POST['txtID'];
        $nome_materia = $_POST['txtMateria'];

        $sqlUpdate = "UPDATE materias SET nome='$nome_materia'
                WHERE id = $id_materia";

        $result = $mysqli->query($sqlUpdate);?>

        <script>
            alert('Matéria atualizada com sucesso!');
            location.href = "materias.php";
        </script>
    <?php
    }    
?>