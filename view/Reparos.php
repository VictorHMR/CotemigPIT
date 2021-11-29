<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reparos Solicitados</title>
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
<body style="font-family: Arial;" class="corpo">


<!----------------------------------------Menu------------------------------------------------------------------------------------------------------------------------------------------------------------->
<nav class="NavBar">
    
    <h2 style="font-size: 22px"  id="nav" class="navbar-brand"><img src="./img/LogoP.png" height="50px"> Reparos Solicitados</h2>

<form action="" style="margin-top: 15px;">  
  <select name="categoria" id="categoria" class="" onchange="selecionarC()" required >
  <?php  if(!isset($filtroC) ): ?>  <option value="" disabled selected>Filtrar Categoria</option><?php endif; ?>  
    <?php  if(isset($filtroC) ): ?> <option value="" disabled selected><?php echo $filtroC ?></option> <?php endif; ?>  
      <option value="Limpeza">Limpeza</option>
    <option value="Formatação">Formatação</option>
    <option value="Troca de Peça">Troca de Peça</option>
    <option value="Defeito">Defeito</option>
    <option value="Outros">Outros</option>

  </select>

<select name="regiao" id="regiao" onchange="selecionarR()" required> 
<?php  if(!isset($filtroR) ): ?> <option value="" disabled selected>Filtrar Região</option> <?php endif; ?>   
<?php  if(isset($filtroR) ): ?> <option value="" disabled selected><?php echo $filtroR ?></option> <?php endif; ?> 

    <option value="Belo Horizonte">Belo Horizonte</option>
    <option value="Contagem">Contagem</option>
</select>

<a href="./?ped=allFiltrado" class="btnFiltrar" id="filtrar">Filtrar</a>
<a href="./?ped=allA" class="btnRemoverFiltro">Limpar</a>
</form>


    <a style="font-size: 18px;" id="navLink" class="nav-link" href="./?act=aut" type="submit"><i class="fas fa-arrow-left"></i> Voltar</a>
  
</nav>
<!----------------------------------------Formulario------------------------------------------------------------------------------------------------------------------------------------------------------------->
<br><br>
 <div class="flex-container"> 







<div>



<div>
<a style="font-size: 18px;background-color:#e0e0e0;color:#00af66" class="linkT"  href="#" type="submit">Aberto</a>
<a style="font-size: 18px;" class="linkT" href="./?ped=allEA" type="submit">Em Andamento</a> 
<a style="font-size: 18px;" class="linkT" href="./?ped=allF" type="submit"> Finalizados </a> 
</div>




  



  <table class="Aberto">
    <thead>
   
      <tr>
        <th style="border-left: none;">Detalhes</th>
        <th>Categoria</th>
        <th>Data</th>
        <th>Status</th>
        <th>Cliente</th>
        <th>Região</th>
        <th>Telefone</th>
        <th>Ação</th>


      </tr>

    </thead>
    <tbody>

    <?php foreach($pedidosA as $objA){ ?> 
    
      <tr>
        <td style="border-left: none;"><?=$objA->detalhes?></td>
        <td><?=$objA->categoria?></td>
        <td><?=$objA->data?></td>
        <td><?=$objA->status?></td>
        <td><?=$objA->Cliente?></td>
        <td><?=$objA->regiao?></td>
        <td><?=$objA->telefone?></td>


        <td><button type="button" class="btnConfirm" data-toggle="modal" data-target="#Amodal" data-id="<?=$objA->id?>"><i class="bi bi-bookmark-plus"></i></button> </td>

      </tr>
    
    <?php } ?>
      
    </tbody>
  </table>
</div>


</div>

<!-------------------------------------------------------------Modal Aceitar------------------------------------------------------------------------->

<div class="modal" id="Amodal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Aceitar</h4>
        <button type="button" class="close" data-dismiss="modal">X</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Aceitar Reparo ?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a id="modal-btn-aceitar" href="" class="btn btn-primary">Sim</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
      </div>

    </div>
  </div>
</div>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------->

<script>
$('#Amodal').on('shown.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    $("#modal-btn-aceitar").attr('href', './?ped=aceitar&id='+id);
});

  
</script>




</body>
</html>