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
    <div class="barraPesquisar">
        <input type="text" name = "inputPesquisar" id="inptPesquisar" placeholder="Pesquisar por título" class="input">
        <button onClick= "searchData()" class="btnPesquisar">
            <img src="../../assets/LupaIcon.svg" alt= "Botão pesquisar" class="lupa">
        </button>
    </div>

    <div class="iconsNav">
        <div class="section-left">
            <a href = "../users/home.php" class="Inicio">
                <img src="../../assets/HomeIcon.svg" alt="Home-Icon">
                <p>Início</p>
            </a>
            <a href= "../perfil/perfil.php" class="Perfil">
                <img src="../../assets/Perfil.svg" alt="Doubts-Icon">
                <p>Perfil</p>
            </a>           
        </div>
        <div class="section-right">
            <a href= "../../database/logout.php" class="Doubts">
                <img src="../../assets/LogOut.svg" alt="LogOut-Icon">                
            </a>
        </div>
    </div>

    <div class="perfilPage">
        <a ><img src=""></a> 
    </div>
</header>