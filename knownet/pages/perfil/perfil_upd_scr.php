<?php
    include('../../database/conexao.php');

    include('../../database/protect.php');  

    $id_perfil = $_SESSION['id']; 
    
    $sql = "SELECT * FROM users WHERE id =  $id_perfil";
    $result = $mysqli->query($sql);
    if($result->num_rows == 1){
        $perfil_data = mysqli_fetch_assoc($result);
        $nomePerfil  = $perfil_data['nome'];
        $emailPerfil = $perfil_data['email'];
        $senhaPerfil = $perfil_data['senha'];
        $dataNascPerfil = $perfil_data['data_nascimento'];        
        $biografiaPerfil = $perfil_data['biografia'];

    }else{?>
        <script>
            alert('Erro ao alterar o perfil!');
            location.href = "perfil.php";
        </script>
    <?php
    }                     
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include('../templates/_header.html')?>
        <link rel="stylesheet" href="../../styles/editarPerfil.css">
    </head>
    <body onload="formPerfil.txtNome.focus();">

        <div class = "editarPerfil-box">
            <h3>Editar meu perfil</h3>     

            <form id='formPerfil' name='formPerfil' action='perfil_upd_prc.php' method='POST' onsubmit='return formPerfilOnSubmit();'>             
                
                <section class = "section-left">
                    <input type="hidden" name="txtID" id="txtID" value="<?php echo  $id_perfil;?>">         

                    <h2>Nome completo</h2>         
                    <input type="text" name="txtNome" id="txtNome" value="<?php echo $nomePerfil; ?>">       

                    <h2>E-mail</h2>
                    <input type="text" name="txtEmail" id="txtEmail" value="<?php echo $emailPerfil; ?>">             
                    
                    <h2>Biografia</h2>
                    <textarea type="text" name="txtBiografia" id="txtBiografia" ><?php echo $biografiaPerfil; ?></textarea>
                </section>

                <section class = "section-right">
                    <div>
                        <h2>Data de Nascimento</h2>
                        <input type="date" name="inpDataNasc" id="inpDataNasc" value="<?php echo $dataNascPerfil;?>">      
                    </div>

                    <div class = "buttons">
                        <button type="button" id = "delete" onClick = "location.href= 'perfil_del_scr.php' ">Excluir perfil</button>

                        <button type="submit" name="updatePerfil" id="updatePerfil">Salvar</button>                         
                        <button type="button" id = "cancel" onClick = "location.href='perfil.php'" >Cancelar</button>
                    </div>l

                </section>
            </form>                                       

        <script>
            function formPerfilOnSubmit(){
                let txtNome = document.getElementById('txtNome');
                let txtEmail = document.getElementById('txtEmail');                
                let inpDataNasc = document.getElementById('inpDataNasc');      
                
                const reEmail = /^[a-z]\w*@\w{4}.*\.\w{2,4}$/;      
                //const reData = /^([0][1-9]|[1][0-9]|[2][0-9]|[3][01])[/]([0][1-9]|[1][0-2])[/]\d{4}$/;
                
                if (txtNome.value.length == 0){
                    alert('Por favor, preencha o campo de Nome!');
                    txtNome.focus();
                    return false;
                }

                if (txtEmail.value.length == 0){
                    alert('Por favor, preencha o campo de Email!');
                    txtEmail.focus();
                    return false;
                }
                
                if (!reEmail.test(txtEmail.value)) {
                    alert('Por favor, digite um Email válido!');
                    txtEmail.focus();
                    return false;
                }                
                
                if (inpDataNasc.value == ''){
                    alert('Por favor, preencha o campo de data de nascimento!');
                    inpDataNasc.focus();
                    return false;
                }    

                //if (!reData.test(inpDataNasc.value)){
                //    alert('Insira uma data de nascimento válida! Formato: DD/MM/YYYY');
                //    inpDataNasc.focus();
                //    return false;
                //}         
                                
                return true;
                
            }
        </script>

    </body>
</html>
