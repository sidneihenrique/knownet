<?php
    include('../../database/conexao.php');

    include('../../database/protect.php');
    
    if(isset($_GET['iduser'])){
        $id_perfil = $_GET['iduser'];
        $sql = "SELECT * FROM users WHERE id = $id_perfil";
        $result = $mysqli->query($sql);
        
        if($result->num_rows ==1){        
            $sqlPublicacoes = "SELECT * FROM publicacoes WHERE usuario = $id_perfil";
            $resultPublicacoes = $mysqli->query($sqlPublicacoes); 
        } else{?>
            <script>
                alert('Perfil inexistente!');
                location.href="../users/home.php";
            </script>
        <?php
        }
    }
?>

<html>
    <head>
        <?php include('../templates/_header.html');
        include('../../styles/styles.php');?>

    </head>
    <body>
        <?php include('../templates/header.php')?>

        <!-- <a href="perfil_upd_scr.php">
            <button>                
                Editar Perfil
            </button>
        </a> -->
        <?php 
            while($usuario = mysqli_fetch_assoc($result)){

                $usuario_nome = $usuario['nome'];
                $usuario_bio = $usuario['biografia'];

                switch ($usuario['tipo_user']) {
                    case 1:
                        $tp_user = "Administrador";
                        break;
                    case 2:
                        $tp_user = "Professor";
                        break;
                    case 3:
                        $tp_user = "Pedagogo";
                        break;
                    case 4:
                        $tp_user = "Aluno";
                        break;
                    case 5:
                        $tp_user = "Instituição";
                        break;
                }

            }
        ?>
        <div class = "container-perfil">

            <div class = "perfil-box">
                <div class = "header-perfil">
                    <img src = "../../assets/Perfil.svg" alt = "Foto de perfil" >                      
                </div>
                <div class = "usuarioInformations">
                    <?php 
                    echo "<h1> $usuario_nome </h1>";
                    echo "<h2> $tp_user </h2>";
                    echo "<p> $usuario_bio </p>";
                    ?>
                </div>
            </div>
            <?php          
            
            echo "<h2>Publicações: </h2>";
           
            if ($resultPublicacoes->num_rows > 0){
                $pub = 0;
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
                           
                    if($id_usuario <> $_SESSION['id']){
                        $pub += 1;
                        echo " 
                            <div class = 'publicacao' style = 'width: 100%;'> 
                                <div class = 'section-left-publi'>
                                    <a href='../publicacao_expandida/publicacao_expandida.php?id=$id_publicacao'><h1> $titulo </h1></a> 
                                    <p> $descricao </p> 
                                    <h2> $datahora_publicacao </h2>
                                    <h2> Publicado Por $nome_user </h2>
                                </div>
                                <div class = 'section-right-publi'>
                                    <a href = '../perfil_users/perfil_user.php?iduser=$id_usuario''> <img src = '../../assets/Perfil.svg' alt = 'perfil-image'> </a>
                                    <a onClick = 'return changeLike($id_publicacao);' > <img src = '../../assets/Like.svg' alt = 'like-button' id = 'like-$id_publicacao'> </a>
                                </div>
                            </div>
                        ";                    
                    }
                }

                if($pub == 0){
                    echo "<h4 class='white font'>Este perfil ainda não publicou conteúdos!</h4>";
                }
            }else{
            ?>                               
                <h4 class="white font">Este perfil ainda não publicou conteúdos!</h4>                
            <?php
            }

        ?>
        </div>

        <script>
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