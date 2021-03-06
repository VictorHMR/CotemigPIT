<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista De Usuarios</title>
    <link rel="stylesheet" href="./css/Tabelas.css">
    <link rel="stylesheet" href="./css/Forms.css">
    <link rel="stylesheet" href="./css/Menus.css">
    <link rel="stylesheet" href="./css/avaliacao.css">
    <link rel="stylesheet" href="./css/Botoes.css">
    <script src="./JS/function.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a785a1723d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body style="font-family: Arial" class="corpo">
<!----------------------------------------Menu------------------------------------------------------------------------------------------------------------------------------------------------------------->
<nav class="NavBar">
        <h2 style="font-size: 22px"  id="nav" class="navbar-brand"><img src="./img/LogoP.png" height="50px"> Lista De Usuarios</h2>

        <form action="" style="margin-top:15px ;">
<select name="regiao" id="regiao" onchange="selecionarRT()">
<?php  if(!isset($filtroR) ): ?> <option value="" disabled selected>Filtrar Regi??o</option> <?php endif; ?>   
<?php  if(isset($filtroR) ): ?> <option value="" disabled selected><?php echo $filtroR ?></option> <?php endif; ?> 

    <option value="Belo Horizonte">Belo Horizonte</option>
    <option value="Contagem">Contagem</option>
</select>

<a href="./?soc=listC" class="btnFiltrar" id="filtrar">Filtrar</a>
</form>


        <a style="font-size: 18px;" id="navLink" class="nav-link" href="./?act=aut" type="submit"><i class="fas fa-arrow-left"></i> Voltar</a>
</nav>
<br>
<br>
<!------------------------------------------------- Pedidos Finalizados ------------------------------------------------------------------------>
<div class="flex-container">
<div>
<h2 style="text-align: center;">Usuarios Por regi??o</h2> <br>
<h6 style="text-align: center; margin-top:0;">(Somente s??o listados usuarios que possuem ao menos uma solicita????o avaliada)</h6>





  <table class="Usuarios">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Idade</th>
        <th>Nota</th>
        <th>Quantidade</th>
      </tr>
    </thead>
    <tbody>

    <?php foreach($usuarios as $objC){ ?> 
    
      <tr>
        <td><?=$objC->nome?></td>
        <td><?=$objC->telefone?></td>
        <td><?=$objC->idade?></td>
        <td><?=number_format($objC->Nota, 1)?></td>
        <td><?=$objC->quantidade?></td>

      </tr>
    
    <?php } ?>
      
    </tbody>
  </table>
</div>
</div>
<!--------------------------------------------------------------------------------------------------------------------------------->



</body>
</html>