<?php
    include('../../database/conexao.php');
    include('../../database/protect.php');  
    
    $sqlMateria = "SELECT * FROM materias";
    $resultMateria = $mysqli->query($sqlMateria) or die(mysql_error());

?>

<!DOCTYPE html>
<html>
    <head>
        <?php include('../templates/_header.html');
              include('../../styles/styles.php');?> 
    </head>
    <body onload="formConteudo.txtConteudo.focus();">    

        <?php include('../templates/header_admin.php')?>        
        <center>
            <h2 class="white space font">
                Inserir Novo Conteúdo
            </h2>

            <form id="formConteudo" name="formConteudo" action='conteudo_ins_prc.php' method='POST' onsubmit="return formConteudoOnSubmit();">            
                    
                <label class="white font">
                    Nome Conteúdo:&nbsp;&nbsp;
                </label>                        
                <input type="text" class="input-conteudo" name="txtConteudo" id="txtConteudo">       

                <br><br>

                <label class="white font">
                    Matéria do Conteúdo:
                </label>
                <select class="select-conteudo" name="cbxMateria" id="cbxMateria">
                    <option value="" selected disabled="disabled" hidden>Selecione uma Matéria ---</option>
                    <?php                
                        while($dados = mysqli_fetch_array($resultMateria)){
                            $id_materia = $dados['id'];
                            $nome_materia = $dados['nome'];                        
                            echo "<option value='".$id_materia."'>".$nome_materia."</option>";                                       
                        }
                    ?>                                       
                </select>       
                <br>
                <input type="submit" class="button-confirm" name="insertConteudo" id="insertConteudo" value="Inserir Conteudo">
                <button type="button" class="button" onclick="location.href='conteudos.php'">
                    Cancelar
                </button>                 
            </form>    
        </center> 
        
        <script>

            function formConteudoOnSubmit(){
                let txtConteudo = document.getElementById('txtConteudo');
                let cbxMateria = document.getElementById('cbxMateria');

                if (txtConteudo.value.length == 0){
                    alert('Por favor, preencha o campo de nome do conteúdo!');
                    txtConteudo.focus();
                    return false;
                }

                if (cbxMateria.selectedIndex == 0) {
                    alert('Por favor, escolha uma opção de matéria para o conteúdo!');
                    cbxMateria.focus();
                    return false;
                }

                return true;
            }

        </script>

    </body>
</html>
