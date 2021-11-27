<?php 
    function isLoggin(){
        if(!isset($_SESSION['user'])){
            header('location: ../login/login.php');
        }
    }
?>