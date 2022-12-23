<?php
    include('../../database/conexao.php');

    include('../../database/protect.php');

    if ($_SESSION['user_type'] == 1){

        $sqlConteudos = "SELECT * FROM conteudos ORDER BY id ASC;";        

        $resultConteudos = $mysqli->query($sqlConteudos);       
        
    } else{
        header("location: index.php");
    }  

?>

<html>
    <head>
        <?php include('../templates/_header.html');
              include('../../styles/styles.php')?>        
    </head>
    <body>
        <?php include('../templates/header_admin.php')?>
        <center>
            <h1 class="white space font">
                Gerenciar Conteúdos
            </h1>

            <div>
                <table>
                    <thead>
                        <tr>
                            <th scope="col" hidden>#</th>
                            <th scope="col" width="200px">Matéria</th>
                            <th scope="col" hidden>#</th>
                            <th scope="col" width="200px">Nome do Conteúdo</th>                             
                            <th scope="col" width="280px">Ações</th>                       
                        </tr>                
                    </thead>   
                    <tbody>
                        <?php
                            if($resultConteudos->num_rows > 0){
                                while($conteudo_data = mysqli_fetch_assoc($resultConteudos)){
                                    $id_conteudo = $conteudo_data['id'];
                                    echo "<tr>";                                  
                                    $sqlNomeMateria = "SELECT materias.nome FROM materias INNER JOIN conteudos ON materias.id = conteudos.materia WHERE conteudos.id = $id_conteudo";                                                    
                                    $resultNomeMateria = $mysqli->query($sqlNomeMateria);
                                    $materia_data = mysqli_fetch_assoc($resultNomeMateria);
                                    echo "<td width='200px'>".$materia_data['nome']."</td>";
                                    echo "<td hidden>".$conteudo_data['materia']."</td>";                                
                                    echo "<td hidden>".$conteudo_data['id']."</td>";                                    
                                    echo "<td width='200px'>".$conteudo_data['nome']."</td>";                                                                    
                                    echo "<td width='280px'>
                                            <a href='conteudo_upd_scr.php?id=$conteudo_data[id]'>
                                                <input type='button' class='button-alterar' value='Alterar'>
                                            </a>
                                            &nbsp;
                                            <a href='conteudo_del_prc.php?id=$conteudo_data[id]'>
                                                <input type='button' class='button-excluir' value='Excluir'>
                                            </a>
                                        </td>";
                                    echo "</tr>";
                                }
                            }else{
                                echo "<tr>";
                                echo "<td colspan='3'> Sem registros no banco! </td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>             
                </table>
            </div>
            
            <button type="button" class="button" onclick="location.href='conteudo_ins_scr.php'">
                Inserir Novo Conteúdo
            </button>                       
            
            <button type="button" class="button" onclick="location.href='../admin/home_admin.php'">
                Voltar
            </button>
            
        </center>
        
    </body>
</html>