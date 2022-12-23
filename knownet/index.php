<?php
    include('./database/conexao.php');  
   
    if(isset($_POST['txtEmail']) || isset($_POST['txtSenha'])){
        
        $email = $mysqli->real_escape_string($_POST['txtEmail']);
        $senha = $mysqli->real_escape_string($_POST['txtSenha']);

        $sql_code = "SELECT * FROM users WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código sql" . $mysqli->error);


        $quantidade = $sql_query->num_rows;

        if($quantidade == 1){
            
            $usuario = $sql_query->fetch_assoc();
            
            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['user_type'] = $usuario['tipo_user'];

            if($_SESSION['user_type'] == 1){   
                header("Location: ./pages/admin/home_admin.php");
            } else{
                header("Location: ./pages/users/home.php");
            }
            
        }else{
        ?>
            <script>                
                alert('Login ou Senha inválidos!');                
            </script>
        <?php    
        }              
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <html lang="pt-br">
        <?php
        include ('./styles/login_cadastro.php');
        ?>
        <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
        <title>Login</title>
        
    </head>
    <body onload="formLogin.txtEmail.focus();">
        <section class = "sectionLeft">
            <img src = "./assets/logo.svg" alt = "logo">
            <i> <p>"O importante é não parar de questionar"</p> </i> <br>
            <p>Albert Einstein</p>
        </section>    
        
        <section class = "sectionRight">
            <form id="formLogin" name="formLogin" action="" method="POST" onsubmit="return formLoginOnSubmit();">
                <h1>Login</h1>
                <input type="text"     name="txtEmail" id="txtEmail" placeholder="Email" class = "input" />
                <input type="password" name="txtSenha" id="txtSenha" placeholder="Senha" class = "input"/>                
                <a href="#">Esqueci minha senha</a>       
                        
                <button type="submit">Entrar</button>

                <p> Não tem cadastro? <a href="./pages/cadastro/cadastro.php">Cadastre-se</a></p>                    
            </form>
            <img src = "./assets/LogoBlack.svg" alt = "logo">
        </section>  

        <script>

            function formLoginOnSubmit(){
                let txtEmail = document.getElementById('txtEmail');
                let txtSenha = document.getElementById('txtSenha');

                const reEmail = /^[a-z]\w*@\w{4}.*\.\w{2,4}$/;               
              
                if (txtEmail.value.length == 0){
                    alert('Por favor, preencha o campo de Email!');
                    txtEmail.focus();
                    return false;
                }

                if (txtEmail.value != 'admin'){
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

                    if (txtSenha.value.length < 7 || txtSenha.value.length > 20){
                        alert('Senha deve possuir no mínimo 7 e no máximo 20 caracteres!');
                        txtSenha.focus();
                        return false;
                    }
                }
                
                return true;
            };

        </script>
    </body>
</html>