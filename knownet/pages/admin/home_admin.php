<?php

    include('../../database/protect.php');

    if(!isset($_SESSION)){
        session_start();
    }  

?>

<!--Página HTML-->
<!DOCTYPE html>
<html>
    <head>
        <?php 
        include('../templates/_header.html');
        include('../../styles/styles.php');
        ?>
    </head>
    <body>
        <?php include('../templates/header_admin.php')?>
        <center>                                        
            <button type="button" class="button" onclick="location.href = '../materias/materias.php';">
                Manter Matérias
            </button>                                  
            
            <button type="button" class="button" onclick="location.href = '../conteudos/conteudos.php';">
                Manter Conteúdos
            </button>        
                           
        </center>              
        
    </body>
</html>