<?php 
    include('../../database/conexao.php');
    include('../../database/protect.php');
    
    if(!empty($_GET['search'])){
        $data = $_GET['search'];
        $sqlPublicacoes = "SELECT * FROM publicacoes WHERE titulo LIKE '%$data%' ORDER BY datahora_publicacao desc";        
    }else{
        $sqlPublicacoes = "SELECT * FROM publicacoes ORDER BY datahora_publicacao desc";        
    }
    $resultPublicacoes = $mysqli->query($sqlPublicacoes); 
?>


<head>
    <?php include ("../../styles/header.php");?>
    
</head>

<header>
    <img src="../../assets/Logo.svg" alt="logo" class="logo">    

    <div class="iconsNav">
        <div class="section-left">           

           <h1 class="white"> Usuário Administrador!</h1>
           <a href= "../../database/logout.php" class="Doubts">
                <img src="../../assets/LogOut.svg" alt="LogOut-Icon">                
            </a>
        </div>        
    </div>

    <div class="perfilPage">
        <a ><img src=""></a> 
    </div>
</header>