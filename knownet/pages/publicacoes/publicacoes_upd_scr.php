<?php

    if(!empty($_GET['id'])){
        include('../../database/conexao.php');
        include('../../database/protect.php');         
               
        define("ID_PUB", $_GET['id']); 
        
        $sqlPub = "SELECT * FROM publicacoes WHERE id =".ID_PUB;
        $resultPub = $mysqli->query($sqlPub);

        if($resultPub->num_rows == 1){
            $publicacao_data = mysqli_fetch_assoc($resultPub);
            $tituloPub = $publicacao_data['titulo'];
            $descricaoPub = $publicacao_data['descricao'];
            $conteudoPub = $publicacao_data['conteudo'];
            $resumoPub = $publicacao_data['resumo'];
            $artigoPub = $publicacao_data['artigo'];

            $sqlPubConteudo = "SELECT * FROM conteudos WHERE id =".$conteudoPub;                  
            $resultPubConteudo = $mysqli->query($sqlPubConteudo) or die(mysql_error());  

            $sqlConteudo = "SELECT * FROM conteudos";
            $resultConteudo = $mysqli->query($sqlConteudo) or die(mysql_error());
        }else{ ?>            
            <script>
                alert('Erro ao tentar alterar a publicação!');
                location.href="../users/home.php";
            </script>
        <?php
        }                           
    } else{
        header("location: ../users/home.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include('../templates/_header.html')?>
        <link rel="stylesheet" href="../../styles/publicar.css">
    </head>
    <body onload="formUpdPub.txtTitulo.focus();">    

        <div class = "publish-box">
            <div class = "header-publish-box">
                <h3>Editar Publicação: <?php echo ID_PUB." - ".$tituloPub ?></h3>
                <a href="../users/home.php"> <img src = "../../assets/x.svg" alt = "Sair"> </a>
            </div>
            
            <form id="formUpdPub" name="formUpdPub" action='publicacoes_upd_prc.php' method='POST' onsubmit="return formUpdPubOnSubmit();">             

                <input type="hidden" name="txtID" value="<?php echo ID_PUB;?>">      
            
                <h2> Título </h2>
                <input type="text" name="txtTitulo" id="txtTitulo" value="<?php echo $tituloPub;?>">

                <h2> Conteúdo </h2>
                <select name="cbxConteudo" id="cbxConteudo">
                    <!--<option value="" selected disabled="disabled" hidden>Selecione um Conteúdo ---</option>-->
                    <option value="<?php echo $conteudoPub;?>" selected>
                        <?php                 
                            $conteudo = mysqli_fetch_array($resultPubConteudo);                    
                            echo $conteudo['nome'];                 
                        ?>
                    </option>
                    <?php                
                        while($conteudos = mysqli_fetch_array($resultConteudo)){
                            $id_conteudo = $conteudos['id'];
                            $nome_conteudo = $conteudos['nome'];
                            if ($id_conteudo != $conteudoPub){
                                echo "<option value='".$id_conteudo."'>".$nome_conteudo."</option>";
                            }                
                        }
                    ?>                                       
                </select>

                <h2> Descrição da Publicação </h2>                
                <textarea name="txtDesc" id="txtDesc"><?php echo $descricaoPub?></textarea>

                <h2>Resumo</h2>
                <textarea name="txtResumo" id="txtResumo" ><?php echo $resumoPub; ?></textarea>
                
                <h2>Artigo</h2>
                <textarea name="txtArt" id="txtArt" ><?php echo $artigoPub; ?></textarea>
                
            </form>
            <button type="submit" name="updPub" id="updPub" form = "formUpdPub">Atualizar</button>  
        </div>

        <script language="JavaScript">

            function formUpdPubOnSubmit(){

                let txtTitulo = document.getElementById('txtTitulo');
                let txtDesc = document.getElementById('txtDesc')
                let cbxConteudo = document.getElementById('cbxConteudo');
                let txtResumo = document.getElementById('txtResumo');
                let txtArt = document.getElementById('txtArt');
                
                if (txtTitulo.value.length == 0){
                    alert('Por favor, preencha o campo de título!');
                    txtTitulo.focus();
                    return false;
                }    
                
                if (txtDesc.value.length == 0){
                    alert('Por favor, preencha o campo de descrição!');
                    txtDesc.focus();
                    return false;
                }                  

                if (txtResumo.value.length == 0){
                    alert('Por favor, preencha o campo de descrição!');
                    txtResumo.focus();
                    return false;
                }

                if (txtDesc.value.length == 0){
                    alert('Por favor, preencha o campo de descrição!');
                    txtArt.focus();
                    return false;
                }

                return true;
            }

        </script>

    </body>
</html>
