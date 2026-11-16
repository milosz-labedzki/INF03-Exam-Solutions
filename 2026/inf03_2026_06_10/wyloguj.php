<?php
session_start();
    if(isset($_SESSION['nazwa'])){
    unset($_SESSION['nazwa']);
    header("Location: login.php");                
}
?>