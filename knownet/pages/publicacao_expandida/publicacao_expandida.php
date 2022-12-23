<?php 
    include('../../database/conexao.php');
    include('../../database/protect.php');   
    
    if(!isset($_SESSION)){
        session_start();
    }

    $id_pub = $_GET['id'];
    
    $sqlPublicacoes = "SELECT * FROM publicacoes WHERE id = $id_pub";
    $resultPublicacoes = $mysqli->query($sqlPublicacoes) or die(mysql_error());
    
    $publicacoes_data = mysqli_fetch_assoc($resultPublicacoes);

    $titulo = $publicacoes_data['titulo'];
    $descricao = $publicacoes_data['descricao'];
    $resumo = $publicacoes_data['resumo'];
    $artigo = $publicacoes_data['artigo'];
    $user_id = $publicacoes_data['usuario'];

    $sqlUsuario = "SELECT * FROM users WHERE id = $user_id";
    $resultUsuario = $mysqli->query($sqlUsuario) or die(mysql_error());

    $user_data = mysqli_fetch_assoc($resultUsuario);
    $user_nome = $user_data['nome'];
    $user_bio = $user_data['biografia'];
    $user_type = $user_data['tipo_user'];

    switch ($user_type) {
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
      
?>

<head>
    <?php include('../templates/_header.html'); ?>
    <link rel="stylesheet" href="../../styles/publicacao_expandida.css">
</head>

<body>

    <div class = "publish-window">
        <div class = "header-window">
            <a href="../users/home.php" class = "container-voltar">
                <img src = "../../assets/back-icon.svg" alt = "back-icon">                
                <h3>Voltar para as publicações</h3>
            </a>
            <a href="" onclick="alert('Link copiado com sucesso!');" class = "copiar-container">
                <img src = "../../assets/link.svg" alt = "copy-icon">
                <h3>Copiar para compartilhar</h3>
            </a>
        </div>

        <main>
            <section class = "section-left">
                <div class = "title-and-desc">
                    <h1><?php echo $titulo?></h1>
                    <p class = "desc"><?php echo $descricao ?></p>
                </div>

                <div>
                    <h2>Resumo</h2>
                    <p><?php echo $resumo ?></p>
                </div>

                <div>
                    <h2>Artigo</h2>
                    <p><?php echo $artigo ?></p>
                </div>
                
            </section>

            <section class = "section-right">
                <!--<img src = "../../assets/image.png" alt = "imagem-publicação" id = "image">-->

                <div class = "right-down">
                    <div class = "usuario-informations">
                        <img src = "../../assets/Perfil.svg" alt = "Perfil-image">
                        <div>
                            <h4><?php echo $user_nome ?></h4>
                            <h5><?php echo $tp_user ?></h5>
                        </div>
                    </div>
                    <p><?php echo $user_bio ?></p>

                    <div class = "buttons">
                        <button type="button" onClick ="return changeLike(<?php echo $id_pub?>);">Curtir <img src = '../../assets/Like.svg' alt = 'like-button' id='like-<?php echo $id_pub;?>'></button>
                        <?php
                        
                        if($user_id == $_SESSION['id']){?>
                            <button type="button" onclick="location.href='../perfil/perfil.php'"> Abrir Perfil <img src = "../../assets/Open.svg"></button>
                        <?php
                        }else{?>
                            <button type="button" onclick="location.href='../perfil_users/perfil_user.php?iduser=<?php echo $user_id?>'"> Abrir Perfil <img src = "../../assets/Open.svg"></button>                            
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </section>
            
        </main>
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