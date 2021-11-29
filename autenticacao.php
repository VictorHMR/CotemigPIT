<?php
session_start();

require_once "inc/config.php";

$con = new PDO(SERVIDOR, USUARIO, SENHA);
$sql = $con->prepare("SELECT * FROM usuario WHERE usuario=? AND senha=?");
$sql->execute([$_POST['usuario'] , $_POST['senha']]);

$usuario = $sql->fetchObject();
  if ($usuario) {

    $_SESSION['usuario'] = $usuario;

      if ($usuario) {
          header("Location:./?act=aut");
      }

  }else {
      header('Location: ./view/login.php');
  }
