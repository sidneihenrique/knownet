<?php    
    if(!empty($_GET['id'])){

        include('../../database/conexao.php');

        include('../../database/protect.php');  

        $id_conteudo = $_GET['id'];        
        
        $sqlPub = "DELETE FROM publicacoes 
                   WHERE conteudo = $id_conteudo";
        $resultPub = $mysqli->query($sqlPub);             

        $sqlDelete = "DELETE FROM conteudos WHERE id = $id_conteudo";
        $resultDelete = $mysqli->query($sqlDelete);
        ?>
        <script>
            alert('Conteúdo excluído com sucesso!');
            location.href = "conteudos.php";
        </script>     
    <?php    
    }else{
        header("Location: conteudos.php");
    };
?>