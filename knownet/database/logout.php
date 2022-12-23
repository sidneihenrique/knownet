<?php

   if(!isset($_SESSION)){
      session_start();
   }  

   $_SESSION['id'] =   '';
   $_SESSION['nome'] = '';   

   session_abort();
   session_destroy();

   header("Location: ../index.php");

?>