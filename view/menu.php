<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu</title>
    <link rel="stylesheet" href="./css/Tabelas.css">
    <link rel="stylesheet" href="./css/Forms.css">
    <link rel="stylesheet" href="./css/Menus.css">
    <link rel="stylesheet" href="./css/avaliacao.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a785a1723d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<!----------------------------------------Fundo------------------------------------------------------------------------------------------------------------------------------------------------------------->

<body style="font-family: Arial;" class="corpo">
<?php foreach($usuario as $usuarios) { ?>
<!----------------------------------------Nav------------------------------------------------------------------------------------------------------------------------------------------------------------->
<nav class="NavBar">
    
    <?php if ($usuarios->tipo == 'Tecnico') {
            echo '<h2 style="font-size: 22px"  id="nav" class="navbar-brand"><img src="./img/LogoP.png" height="50px"> Menu-Tecnico</h2>';
        }else{
            echo '<h2 style="font-size: 22px"  id="nav" class="navbar-brand"><img src="./img/LogoP.png" height="50px"> Menu-Comum</h2>';
        }?>
        
        <a  id="navLink" class="nav-link" href="./logout.php" type="submit"><i class="far fa-arrow-alt-circle-right"></i> Sair </a>
   
</nav>
<br>
<!----------------------------------------Menu------------------------------------------------------------------------------------------------------------------------------------------------------------->
<br>
<div class="container menuu">

<div class="menu">
    <div class="list-group">
        <div style="background-color:#00af66; color: white; text-decoration: none;" class="list-group-item list-group-item" aria-current="true"><i class="fas fa-briefcase"></i> Operações</div>
        <?php if ($usuarios->tipo == 'Tecnico') {
            echo '<a href="./?ped=pedT" type="button" class="list-group-item list-group-item-action bot">Pedidos</a>
                  <a style="color:white;" class="list-group-item list-group-item-action bot">⠀⠀⠀⠀⠀⠀⠀⠀⠀</a>
                  <a style="color:white;" class="list-group-item list-group-item-action bot">⠀⠀⠀⠀⠀⠀⠀⠀⠀</a>
                  ';
        }else{
            echo '<a href="./?ped=fazerP" type="button" class="list-group-item list-group-item-action bot">Solicitar Reparo</a>
                  <a href="./?ped=pedC" type="button" class="list-group-item list-group-item-action bot">Pedidos</a>
                  <a style="color:white;" class="list-group-item list-group-item-action bot">⠀⠀⠀⠀⠀⠀⠀⠀⠀</a>';

        }?>
    </div>
</div>
<?php } ?>
<!---------------------------------------Info Pess------------------------------------------------------------------------------------------>
<div class="menu">
    <div class="list-group">
        <div style="background-color:#00af66; color: white; text-decoration: none;" class="list-group-item list-group-item" aria-current="true"><i class="fas fa-address-card"></i> Social</div>
        <a href="./?act=editP" type="button" class="list-group-item list-group-item-action bot" >Editar Perfil</a>
        <a href="./?soc=listT" type="button" class="list-group-item list-group-item-action bot" >Ver Tecnicos</a>
        <a href="./?soc=listC" type="button" class="list-group-item list-group-item-action bot" >Ver Usuarios</a>


    </div>
</div>
</div>
</body>
</html>