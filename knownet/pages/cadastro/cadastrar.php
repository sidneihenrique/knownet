<?php
    include('../../database/conexao.php');
    
    $nome = $_POST['txtNome'];
    $datanasc = $_POST['inpDataNasc'];
    $email = $_POST['txtEmail'];
    $senha = $_POST['txtSenha'];
    $confirmasenha = $_POST['txtConfirmaSenha'];
    $tipo_user = $_POST['cbxTipoUsuario'];         
    
    $sql = "INSERT INTO users(nome, email, senha, data_nascimento, tipo_user)
            VALUES ('$nome', '$email', '$senha', '$datanasc', $tipo_user)";

    if(mysqli_query($mysqli, $sql)){
    ?>
        <script language="JavaScript">
            alert('Usuário Cadastrado');
        </script>
    <?php
        header("Location: ../../index.php");            
    } else{    
    ?>
        <script language="JavaScript">
            alert('Erro ao cadastrar usuário! Tente novamente!');
        </script>
    <?php       
        header("Location: cadastro.php");
    }

    mysqli_close($mysqli);
    
?>