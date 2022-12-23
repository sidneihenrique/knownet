<?php
    include('../../database/conexao.php');

    include('../../database/protect.php');   
?>

<html>
    <head>
        <?php include('../templates/_header.html');
        include('../../styles/styles.php');?>
        
    </head>
    <body>       
        
        <center>            
            <h1 class="white font space">
                Você quer mesmo apagar o seu perfil! Esta ação é irreversível! Publicações e todos os seus dados serão excluídos da plataforma!
            </h1>

            <br><br>

            <div>                
                <button type="button" class="button-confirm2" onclick="location.href='perfil_del_prc.php'">                
                    SIM, quero APAGAR meu perfil!
                </button>               

                &nbsp;&nbsp;&nbsp;&nbsp;

                <button type="button" class="button-excluir2" onclick="location.href='perfil_upd_scr.php'">
                    Cancelar
                </button>                
                
            </div>

        </center>
        
    </body>
</html>