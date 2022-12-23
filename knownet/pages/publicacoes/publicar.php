<?php
    include('../../database/conexao.php');
    include('../../database/protect.php');   
    
    if(!isset($_SESSION)){
        session_start();
    }

    $sqlConteudo = "SELECT * FROM conteudos";
    $resultConteudo = $mysqli->query($sqlConteudo) or die(mysql_error());

?>

<!DOCTYPE html>
<html>
    <head>
        <?php include('../templates/_header.html')?>
        <link rel="stylesheet" href="../../styles/publicar.css">
    </head>
    <body onload="formInsPub.txtTitulo.focus()">    
        
        <div class = "publish-box">

            <div class = "header-publish-box">
                <h3>Nova Publicação</h3>
                <a href="../users/home.php"><img src = "../../assets/x.svg" alt = "exit"></a>
            </div>

            <form id="formInsPub" name="formInsPub" action='publicacoes_ins_prc.php' method='POST' onsubmit="return formInsPubOnSubmit();">                  
                <h2> Título </h2>                
                <input type="text" name="txtTitulo" id="txtTitulo" placeholder="Título">
                
                <h2> Conteúdo </h2>                  
                <select name="cbxConteudo" id="cbxConteudo">
                    <option value="" selected disabled="disabled" hidden>Selecione um Conteúdo</option>
                    <?php                
                        while($dados = mysqli_fetch_array($resultConteudo)){
                            $id_conteudo = $dados['id'];
                            $nome_conteudo = $dados['nome'];                        
                            echo "<option value='".$id_conteudo."'>".$nome_conteudo."</option>";                                       
                        }
                    ?>                                       
                </select> 

                <h2> Descrição da Publicação </h2>                
                <textarea name="txtDesc" id="txtDesc" placeholder="Insira uma breve descrição da sua publicação"></textarea>

                <h2> Resumo </h2>
                <textarea name = "txtResumo" id = "txtResumo" placeholder = "Ex:  Algebra Linear com programação é extremamente interessante..."></textarea>
                <h2> Artigo </h2>
                <textarea name="txtArt" id="txtArt" placeholder="Ex:  Algebra Linear com programação é extremamente interessante, Algebra Espacial com programação é extremamente interessante, Algebra Linear com programação é extremamente interessante..."></textarea>           
                <!--<input type="textbox" name="txtDesc" id="txtDesc" placeholder="Descrição">-->
            </form>
            <button type="submit" name="insertPublicacao" id="insertPublicacao" form="formInsPub"> Publicar </button>
             
        </div>       

        <script language="JavaScript">

            function formInsPubOnSubmit(){

                let txtTitulo = document.getElementById('txtTitulo');
                let txtDesc = document.getElementById('txtDesc');
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

                if (cbxConteudo.selectedIndex == 0) {
                    alert('Por favor, escolha um conteúdo para a publicação!');
                    cbxConteudo.focus();
                    return false;
                }

                if (txtResumo.value.length == 0){
                    alert('Por favor, preencha o campo de resumo!');
                    txtResumo.focus();
                    return false;
                }

                if (txtArt.value.length == 0){
                    alert('Por favor, preencha o campo de artigo!');
                    txtArt.focus();
                    return false;
                }

                return true;
            }

        </script>

    </body>
</html>
