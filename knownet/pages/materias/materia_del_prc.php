<?php    

    if(!empty($_GET['id'])){

        include('../../database/conexao.php');

        include('../../database/protect.php');  

        $id_materia = $_GET['id'];                 
              
        $sqlSelectPublicacoes = "SELECT publicacoes.id FROM publicacoes 
                                    INNER JOIN conteudos 
                                    ON publicacoes.conteudo = conteudos.id                                     
                                    WHERE conteudos.materia = $id_materia";
        $resultSelectPublicacoes = $mysqli->query($sqlSelectPublicacoes);
        if($resultSelectPublicacoes->num_rows >0){                
            while($row = mysqli_fetch_assoc($resultSelectPublicacoes)){
                $idpub = $row['id'];
                $sqlDeletePub = "DELETE FROM publicacoes WHERE id = $idpub";
                $resultDeletePub = $mysqli->query($sqlDeletePub);
            }
        }
        $sqlDeleteConteudos = "DELETE FROM conteudos WHERE materia = $id_materia";
        $resultDeleteConteudos = $mysqli->query($sqlDeleteConteudos);
        $sqlDelete = "DELETE FROM materias WHERE id = $id_materia";
        $resultDelete = $mysqli->query($sqlDelete);?>
        <script>
            alert('Matéria excluída com sucesso!');
            location.href="materias.php";
        </script>            
    <?php
               
    } 
?>