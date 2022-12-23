<?php

    include('../../database/conexao.php');
    include('../../database/protect.php');

    if(!isset($_SESSION)){
        session_start();
    }  

    $sqlPublicacoes = "SELECT * FROM publicacoes ORDER BY datahora_publicacao desc";
    $resultPublicacoes = $mysqli->query($sqlPublicacoes);     
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include('../templates/_header.html')?>
        <link rel="stylesheet" href="../../styles/styles.css">
    </head>
    <body>
        <?php include('../templates/header.php')?>        

        <div class = "container-home">                     
            <?php           
                if ($resultPublicacoes->num_rows>=1){
                    while($publicacoes_data = mysqli_fetch_assoc($resultPublicacoes)){                                                                              
                        
                        $id_usuario = $publicacoes_data['usuario'];

                        $sqluser = "SELECT nome FROM users WHERE id = $id_usuario";
                        $resultuser = $mysqli->query($sqluser);
                        $row_user = mysqli_fetch_assoc($resultuser);
                        $nome_user = $row_user['nome'];

                        $id_publicacao = $publicacoes_data['id'];
                        $titulo = $publicacoes_data['titulo'];
                        $descricao = $publicacoes_data['descricao'];
                        $artigo = $publicacoes_data['artigo'];      
                        $datahora_publicacao = $publicacoes_data['datahora_publicacao'];         

                        
                        if ($_SESSION['id'] == $publicacoes_data['usuario']){
                            echo " 
                                <div class = 'publicacao'> 
                                    <div class = 'section-left-publi'>
                                        <a href='../publicacao_expandida/publicacao_expandida.php?id=$id_publicacao' class = 'a-titulo'><h1> $titulo </h1></a> 
                                        <p>$descricao</p>                                                                                                                        
                                        <h2> $datahora_publicacao </h2>                                        
                                        <h2> Publicado Por $nome_user </h2>                                        
                                    </div>
                                    <div class = 'section-right-publi'>
                                        <a href = '../perfil/perfil.php'> <img src = '../../assets/Perfil.svg' alt = 'perfil-image'></a>
                                        <div class = 'buttons'>
                                            <a href = '../publicacoes/publicacoes_upd_scr.php?id=$id_publicacao'> <img src = '../../assets/Edit.svg' alt = 'edit-button'> </a>
                                            <a href = '../publicacoes/publicacoes_del_prc.php?id=$id_publicacao'> <img src = '../../assets/Delete.svg' alt = 'delete-button'> </a>
                                            <a onClick = 'return changeLike($id_publicacao);'><img src = '../../assets/Like.svg' alt = 'like-button' id='like-$id_publicacao'> </a>
                                        </div>   
                                    </div>
                                </div>
                                ";
                        }  
                        else {
                            echo " 
                            <div class = 'publicacao'> 
                                <div class = 'section-left-publi'>
                                    <a href='../publicacao_expandida/publicacao_expandida.php?id=$id_publicacao'><h1> $titulo </h1></a> 
                                    <p>$descricao</p>                                     
                                    <h2> $datahora_publicacao </h2>
                                    <h2> Publicado Por $nome_user </h2>
                                </div>
                                <div class = 'section-right-publi'>
                                    <a href = '../perfil_users/perfil_user.php?iduser=$id_usuario'> <img src = '../../assets/Perfil.svg' alt = 'perfil-image'> </a>
                                    <a onClick = 'return changeLike($id_publicacao);' > <img src = '../../assets/Like.svg' alt = 'like-button' id = 'like-$id_publicacao'> </a>
                                </div>
                            </div>
                            ";
                        }   
                    }
                } else{
                    if(!empty($_GET['search'])){
                        echo"<h1 class='white font'>Sem resultados para a busca!</h1>";
                    }else{
                        echo"<h1 class='white font'>Nada Foi Publicado Ainda!</h1>";
                    }
                }
            ?>
        </div>
        <div id = "button-postar">
            <button onClick = "document.location.href='../publicacoes/publicar.php'"  id = "button-postar"> 
                    <img src = "../../assets/Pencil.svg" alt = "pencil">
            </button>
        </div>
        
        <script>
            var search = document.getElementById('inptPesquisar');

            search.addEventListener("keydown", function(event){
                if(event.key === "Enter"){
                    searchData();
                }
            }); 

            function searchData(){
                window.location = 'home.php?search='+search.value;
            };

            function changeLike(id_publicacao){
                let likeButton = document.getElementById(`like-${id_publicacao}`)
                let attributeValue = likeButton.getAttribute("src")


                if(attributeValue == "../../assets/Liked.svg"){
                    likeButton.setAttribute("src", "../../assets/Like.svg")
                } else {
                likeButton.setAttribute("src", "../../assets/Liked.svg")
                }
            }
        
        </script>

    </body>
</html>