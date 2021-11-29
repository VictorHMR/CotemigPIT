<?php
header("Content-type: text/html; charset=utf-8");
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="../css/Tabelas.css">
    <link rel="stylesheet" href="../css/Forms.css">
    <link rel="stylesheet" href="../css/Menus.css">
    <link rel="stylesheet" href="../css/Botoes.css">
    <link rel="stylesheet" href="../css/avaliacao.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a785a1723d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="corpo">
<!----------------------------------------Menu------------------------------------------------------------------------------------------------------------------------------------------------------------->
<nav class="NavBar">
        <h2 style="font-size: 22px"  id="nav" class="navbar-brand"> <img src="../img/LogoP.png" height="50px"> Login</h2>
        <a id="navLink" class="nav-link" href="../" type="submit"><i class="fas fa-arrow-left"></i> Voltar</a>
</nav>
<!----------------------------------------Formulario------------------------------------------------------------------------------------------------------------------------------------------------------------->


<div class="frmLogin">
        <form action="../autenticacao.php" method="POST" autocomplete="off">
       <center><i class="bi bi-person-circle" style="font-size: 6rem;"></i></center>
        
            <h4 style="text-align: center; font-size:xx-large">Login</h4>
            <br>
            
                <div class="col-md-12">
                    <input class="inputs" type="text" class="form-control" placeholder="Digite o Usuário" name="usuario" autofocus maxlength="60" required>
                </div>
                <div class="col-md-12" style="margin-bottom:10px">
                    <input class="inputs"  style="margin:0" type="password" class="form-control" placeholder="Digite a Senha" name="senha" maxlength="10" required>
                </div>
                <a href="#" class="esqueci">Esqueci Minha Senha</a>
                    
                        <!--- RTA usado para centralizar o botão---->
                <div style="display: flex;margin-top:10px">
                    <button style="width:45%" type="submit" class="btnEntrar">Entrar</button>
                    <a style="width:45%"  href="../?act=criarUsuario"  class="btnReg">Registrar-Se</a>
                </div>
        </form>
    </div>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>


