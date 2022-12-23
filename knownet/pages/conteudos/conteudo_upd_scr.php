<?php

    if(!empty($_GET['id'])){
        include('../../database/conexao.php');

        include('../../database/protect.php');         
        
        $id_conteudo = $_GET['id']; 
        
        $sqlConteudo = "SELECT * FROM conteudos WHERE id = $id_conteudo";
        $resultConteudo = $mysqli->query($sqlConteudo);

        if($resultConteudo->num_rows == 1){
            $conteudo_data = mysqli_fetch_assoc($resultConteudo);            
            $nome_conteudo = $conteudo_data['nome'];
            $materia_conteudo = $conteudo_data['materia'];

            $sqlMateriaConteudo = "SELECT nome
                                   FROM materias                                   
                                   WHERE id = $materia_conteudo";
            $resultMateriaConteudo = $mysqli->query($sqlMateriaConteudo) or die(mysql_error());             
            if($resultMateriaConteudo->num_rows > 0){
                $row = mysqli_fetch_array($resultMateriaConteudo); 
                $nome_materia_selecionada = $row['nome'];
            }            
            $sqlMateria = "SELECT * FROM materias";
            $resultMateria = $mysqli->query($sqlMateria) or die(mysql_error()); 

        }                      
                    
    } else{
        header("location: conteudos.php");
    }      

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
            Editar Conteúdo: <?php echo "$id_conteudo - $nome_conteudo";?>
        </h2>  

        <form id="formConteudo" name="formConteudo" action="conteudo_upd_prc.php" method="POST" onsubmit="return formConteudoOnSubmit();">            

            <input type="hidden" name="txtID" id="txtID" value="<?php echo "$id_conteudo";?>">       
        
            <div>
                <label class="white font">Nome conteúdo:</label>
                <input type="text" class="input-conteudo" name="txtConteudo" id="txtConteudo" value="<?php echo "$nome_conteudo";?>">
            </div>       
            
            <br>

            <div>
                <label class="white font">Matéria do Conteúdo:</label>
                <select name="cbxMateria" id="cbxMateria" class="input-conteudo">                    
                    <option value="<?php echo $materia_conteudo;?>" selected>
                        <?php
                            echo "$nome_materia_selecionada";
                        ?>
                    </option>
                    <?php                
                        while($dados = mysqli_fetch_array($resultMateria)){
                            $id_materia = $dados['id'];
                            $nome_materia = $dados['nome'];
                            if ($id_materia != $materia_conteudo){
                                echo "<option value='".$id_materia."'>".$nome_materia."</option>";
                            }                
                        }
                    ?>                                       
                </select>
            </div>

            <br>
                        
            <input type="submit" name="updateConteudo" class="button-confirm" id="updateConteudo" value="Atualizar Conteúdo">
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
