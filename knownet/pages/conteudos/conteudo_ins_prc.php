<?php
    include('../../database/conexao.php');

    include('../../database/protect.php');

    if(isset($_POST['insertConteudo'])){        
        $nome_conteudo = $_POST['txtConteudo'];
        $id_materia = $_POST['cbxMateria'];

        $sqlInsert = "INSERT INTO conteudos(nome, materia) VALUES ('$nome_conteudo', '$id_materia')";

        $result = $mysqli->query($sqlInsert);?>
        <script>
            alert('Conteúdo adicionado com sucesso!');
            location.href = "conteudos.php";
        </script>
    <?php        
    }else{
        header("location conteudo_ins_scr.php");    
    }
    mysqli_close($mysqli); 
?>