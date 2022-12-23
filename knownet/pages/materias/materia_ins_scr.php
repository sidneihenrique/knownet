<?php
    include('../../database/conexao.php');
    include('../../database/protect.php');     
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include('../templates/_header.html');
        include('../../styles/styles.php'); ?>
    </head>
    <body onload="formMateria.txtMateria.focus();">    

        <?php include('../templates/header_admin.php')?> 

        <center>
            <h2 class="white space font">
                Inserir Nova Matéria
            </h2>

            <form id="formMateria" name="formMateria" action="materia_ins_prc.php" method="POST" onsubmit="return formMateriaOnSubmit();">            
                
                <div class="box-materia">
                    <label class="white">
                        Nome Matéria:&nbsp;&nbsp;
                    </label>                       
                    <input type="text" name="txtMateria" id="txtMateria" class="input-materia">       
                </div>

                <br>

                <input type="submit" class="button-confirm" name="insertMateria" id="insertMateria" value="Inserir Matéria">    
                <button type="button" class="button" onclick="location.href = 'materias.php'">
                        Cancelar
                </button>             
            </form> 
        </center>        

        <script language="JavaScript">

            function formMateriaOnSubmit(){
                let txtMateria = document.getElementById('txtMateria');

                if(txtMateria.value.length == 0){
                    alert("Preencha o nome da matéria!");
                    txtMateria.focus();
                    return false;
                }

                return true;
            }

        </script>

    </body>
</html>
