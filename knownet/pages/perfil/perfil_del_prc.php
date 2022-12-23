<?php   
   
    include('../../database/conexao.php');

    include('../../database/protect.php');  

    $id_perfil = $_SESSION['id'];
    
    $sqlSelectPub = "SELECT * FROM publicacoes 
                     WHERE usuario = $id_perfil";

    $resultPub = $mysqli->query($sqlSelectPub);

    if($resultPub->num_rows > 0){
        $sqlDeletePub = "DELETE FROM publicacoes WHERE usuario = $id_perfil";
        $resultDeletePub = $mysqli->query($sqlDelete);
    }          

    $sqlDeletePerfil = "DELETE FROM users WHERE id = $id_perfil";
    $resultDeletePerfil = $mysqli->query($sqlDeletePerfil);
    session_destroy();
?>

<script>
    alert("Perfil Excluído com sucesso");
    location.href = "../../index.php";
</script>