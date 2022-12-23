<?php
    include('../../database/conexao.php');

    include('../../database/protect.php');

    if ($_SESSION['user_type'] == 1){

        $sql = "SELECT * FROM materias ORDER BY id ASC;";
        $result = $mysqli->query($sql);           

    } else{
        header("location: index.php");
    }  

?>

<html>
    <head>
        <?php include('../templates/_header.html');
              include('../../styles/styles.php');
        ?>
    </head>
    <body>
        <?php include('../templates/header_admin.php')?>
        
        <center>
            <h1 class="white space font">
                Gerenciar Matérias
            </h1>

            <div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col" hidden>#</th>
                            <th scope="col">Nome da Matéria</th> 
                            <th scope="col" width="270px"> Ações</th>                       
                        </tr>                
                    </thead>   
                    <tbody>
                        <?php
                            if($result->num_rows > 0){                  
                                while($materia_data = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td hidden>".$materia_data['id']."</td>";
                                    echo "<td>".$materia_data['nome']."</td>";
                                    echo "<td width='270px'>
                                            <a href='materia_upd_scr.php?id=$materia_data[id]'>
                                                <input type='button' class='button-alterar' value='Alterar'>
                                            </a>                                        
                                            <a href='materia_del_prc.php?id=$materia_data[id]'>
                                                <input type='button' class='button-excluir' value='Excluir'>
                                            </a>                                    
                                        </td>";
                                    echo "</tr>";
                                }
                            }else{
                                echo "<tr>";
                                echo "<td class='font' colspan='2'> Sem registros no banco! </td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>             
                </table>
            </div>        
            
            <button type="button" class='button' onclick="location.href='materia_ins_scr.php'">
                Inserir Nova Matéria
            </button>           
           
            <button type="button" class="button" onclick="location.href='../admin/home_admin.php'">
                Voltar
            </button>
            
        <center>        
    </body>
</html>