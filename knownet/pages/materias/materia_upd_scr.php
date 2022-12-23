<?php

    if(!empty($_GET['id'])){
        include('../../database/conexao.php');

        include('../../database/protect.php');        
        define("ID_MATERIA", $_GET['id']); 
        
        $sql = "SELECT nome FROM materias WHERE id = ".ID_MATERIA;
        $result = $mysqli->query($sql);

        while($materia_data = mysqli_fetch_assoc($result)){
            define("NOME_MATERIA", $materia_data['nome']);
        }   
                   
    } else{
        header("location: materias.php");
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <?php include('../templates/_header.html');
              include('../../styles/styles.php'); 
        ?>
    </head>
    <body>    

        <?php include('../templates/header_admin.php')?>      
         
        <center>
            <h2 class="white space font">
                Editar Matéria: <?php echo ID_MATERIA." - ".NOME_MATERIA?>
            </h2>
            <form action='materia_upd_prc.php' method='POST'>             

                <input type="hidden" name="txtID" value="<?php
                    if($result->num_rows > 0){                    
                        echo ID_MATERIA;
                    }else{
                        header("location: materias.php");
                    }
                ?>">         

                <div class="box-materia">
                    <label class="white">
                        Nome Matéria:&nbsp;&nbsp;
                    </label>                               
                    <input type="text" class="input-materia" name="txtMateria" value="<?php        
                        if($result->num_rows > 0){                    
                            echo NOME_MATERIA;
                        }else{
                            header("location: materias.php");
                        }       
                    ?>"> 
                </div>                  

                <br>

                <input type="submit" name="updateMateria" id="updateMateria" class="button-confirm" value="Atualizar Matéria">                 
                <button type="button" class="button" onclick="location.href = 'materias.php'">
                    Cancelar
                </button>
            </form>              
            
        </center>
    </body>
</html>
