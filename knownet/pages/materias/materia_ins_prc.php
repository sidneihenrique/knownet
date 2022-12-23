<?php
    include('../../database/conexao.php');

    include('../../database/protect.php');

    if(isset($_POST['insertMateria'])){        
        $nome_materia = $_POST['txtMateria'];

        $sqlInsert = "INSERT INTO materias(nome) VALUES ('$nome_materia')";

        $result = $mysqli->query($sqlInsert);?>
        <script>
            alert('Matéria inserida com sucesso!');
            location.href="materias.php";
        </script>
    <?php
    }   
    mysqli_close($mysqli);
?>