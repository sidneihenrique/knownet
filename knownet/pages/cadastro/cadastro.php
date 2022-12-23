<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <html lang="pt-br">
	<?php include('../../styles/login_cadastro.php'); ?>
	<title> Cadastro </title>
	<link rel="icon" href="../assets/pesquisa.png" type="image/jpg">
</head>
<body onload="formCadastro.txtNome.focus();">
    <div class = "sectionLeft">
        <img src = "../../assets/logo.svg" alt = "logo">
        <i> <p>"O importante é não parar de questionar"</p> </i> <br>
        <p>Albert Einstein</p>
    </div>
    <div class = "sectionRight">
        <form id="formCadastro" name="formCadastro" action="cadastrar.php" method="POST" onsubmit="return formCadastroOnSubmit();">
            <h1>Cadastro</h1>
            <input type="text" name="txtNome" id="txtNome" placeholder="Nome Completo" />
            <input type="text" name="txtEmail" id="txtEmail" placeholder="Email" />
            <input type="password" name="txtSenha" id="txtSenha" placeholder="Senha" />
            <input type="password" name="txtConfirmaSenha" id="txtConfirmaSenha" placeholder="Confirmar Senha" />
            <input type="date" name="inpDataNasc" id="inpDataNasc" placeholder="Data de Nascimento"/>
            <select name="cbxTipoUsuario" id="cbxTipoUsuario" placeholder="Selecione uma opção">
                <option selected disabled> Selecione o tipo de Usuário</option>
                <option value = 2> Professor</option>
                <option value = 3> Pedagogo </option>
                <option value = 4> Aluno </option>
                <option value = 5> Instituição </option>
            </select>    

            <button type="submit">Cadastrar</button>
            <p> Já tem cadastro? <a href="../../index.php">Login</a></p>
            <img src = "../../assets/LogoBlack.svg" alt = "logo">				
        </form>					
    </div>

    <script language="JavaScript">

        function formCadastroOnSubmit(){

            let txtNome =          document.getElementById('txtNome');
            let txtEmail =         document.getElementById('txtEmail');
            let txtSenha =         document.getElementById('txtSenha');
            let txtConfirmaSenha = document.getElementById('txtConfirmaSenha');
            let inpDataNasc =      document.getElementById('inpDataNasc');
            let cbxTipoUsuario =   document.getElementById('cbxTipoUsuario');

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
            
            if (txtSenha.value.length == 0){
                alert('Por favor, preencha o campo de Senha!');
                txtSenha.focus();
                return false;
            }

            if (txtConfirmaSenha.value.length == 0){
                alert('Por favor, preencha o campo de confirmar Senha!');
                txtConfirmaSenha.focus();
                return false;
            }

            if (txtSenha.value.length < 7 || txtSenha.value.length > 20){
                alert('Senha deve possuir no mínimo 7 e no máximo 20 caracteres!');
                txtSenha.focus();
                return false;
            }            

            if (txtSenha.value != txtConfirmaSenha.value){
                alert('As senhas não coincidem!');
                txtSenha.focus();
                return false;
            }

            if (inpDataNasc.value == ''){
                alert('Por favor, preencha o campo de data!');
                inpDataNasc.focus();
                return false;
            }    

            //if (!reData.test(inpDataNasc.value)){
            //    alert('Insira uma data de nascimento válida! Formato: DD/MM/YYYY');
            //    inpDataNasc.focus();
            //    return false;
            //}           

            if (cbxTipoUsuario.selectedIndex == 0) {
                alert('Por favor, escolha uma opção de usuário!');
                cbxTipoUsuario.focus();
                return false;
            }
            
            return true;
        };

    </script>
   
</body>
</html>