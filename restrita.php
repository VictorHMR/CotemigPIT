<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    $_SESSION['msg'] = "Acesso restrito";
    header("Location:./view/login.php");
}