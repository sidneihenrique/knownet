<?php    

    if(!empty($_GET['id'])){

        include('../../database/conexao.php');

        include('../../database/protect.php');  

        $id_pub = $_GET['id'];
        
        $sqlSelect = "SELECT * FROM publicacoes 
                      WHERE id = $id_pub";
        $result = $mysqli->query($sqlSelect);

        if($result->num_rows > 0){

            $sqlDelete = "DELETE FROM publicacoes WHERE id = $id_pub";
            $resultDelete = $mysqli->query($sqlDelete);?>
            <script>
                alert('Publicação excluída com sucesso!');
                location.href = "../users/home.php";
            </script>
        <?php
        }       
    }    
?>