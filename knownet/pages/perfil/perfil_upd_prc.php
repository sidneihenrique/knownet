<?php
    include('../../database/conexao.php');

    include('../../database/protect.php');

    if(isset($_POST['updatePerfil'])){
        $id_perfil = $_POST['txtID'];
        $nome_perfil = $_POST['txtNome'];
        $email_perfil = $_POST['txtEmail'];
        $biografia_perfil = $_POST['txtBiografia'];
        $datanasc_perfil = $_POST['inpDataNasc'];        

        $sqlUpdate = "UPDATE users SET nome='$nome_perfil', email='$email_perfil', data_nascimento='$datanasc_perfil',biografia='$biografia_perfil'
                      WHERE id = $id_perfil";
        $result = $mysqli->query($sqlUpdate);?>
        <script>
            alert('Perfil Alterado Com Sucesso!');
            location.href = "perfil.php";
        </script>
    <?php
    }
?>