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

        <h2 style="font-size: 22px"  id="nav" class="navbar-brand"><img src="./img/LogoP.png" height="50px"> Reparos Solicitados</h2>
        <a style="font-size: 18px;" id="navLink" class="nav-link" href="./?act=aut" type="submit"><i class="fas fa-arrow-left"></i> Voltar</a>
</nav>

<!----------------------------------------Formulario------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!-----------------------------------------------Em Andamento-------------------------------------------------------------------------------->
<br><br>
<div class="flex-container"> 







<div class="">
<div>
<a style="font-size: 18px;" class="linkT" href="./?ped=allA" type="submit">Aberto</a>
<a style="font-size: 18px;background-color:#e0e0e0;color:#00af66" class="linkT" href="#" type="submit">Em Andamento</a> 
<a style="font-size: 18px;" class="linkT" href="./?ped=allF" type="submit"> Finalizados </a> 
</div>
          
  <table class="EmAndamento">
    <thead>
      <tr>
        <th style="border-left: none;">Detalhes</th>
        <th>Categoria</th>
        <th>Data</th>
        <th>Status</th>
        <th>Cliente</th>
        <th>Região</th>
        <th class="THT">Telefone</th>
        <th class="THB">Ação</th>

      </tr>
    </thead>
    <tbody>

    <?php foreach($pedidosEA as $objEA){ ?> 
    
      <tr>
        <td style="border-left: none;"><?=$objEA->detalhes?></td>
        <td><?=$objEA->categoria?></td>
        <td><?=$objEA->data?></td>
        <td><?=$objEA->status?></td>
        <td><?=$objEA->Cliente?></td>
        <td><?=$objEA->regiao?></td>
        <td><?=$objEA->telefone?></td>

        <?php  if($objEA->status == "Aguardando Confirmação"): ?> <td></td> <?php endif; ?>

        <?php  if($objEA->status != "Aguardando Confirmação"  ): ?> <td><button type="button" class="btnFinalizar" data-toggle="modal" data-target="#Fmodal" data-id="<?=$objEA->id?>"><i class="bi bi-check-square"></i></button>  <?php endif; ?>
        <?php  if($objEA->status == "Em Andamento"): ?> <button type="button" class="btnRevisar" data-toggle="modal" data-target="#modalCancel" data-id="<?=$objEA->id?>"><i class="bi bi-x-square" style="font-weight: bold;"></i></button> </td> <?php endif; ?>


      </tr>
    
    <?php } ?>
      
    </tbody>
  </table>
</div>


<!------------------------------------------------------------Modal Finalizar-------------------------------------------------------------------------------------->

<div class="modal" id="Fmodal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Finalizar</h4>
        <button type="button" class="close" data-dismiss="modal">X</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Após Marcar como feito, o cliente tambem deverá marcar para ser concluido. Deseja Finalizar ?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a id="modal-btn-finalizar" href="" class="btn btn-primary">Sim</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
      </div>

    </div>
  </div>
</div>


<div class="modal" id="modalCancel">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Cancelar</h4>
        <button type="button" class="close" data-dismiss="modal">x</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Confirma o Cancelamento ?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a id="modal-btn-cancelar" href="" class="btn btn-primary">Sim</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
      </div>

    </div>
  </div>
</div>

<!----------------------------------------------------------------------------------------------------------------------------------------------------------->

<script>

  $('#Fmodal').on('shown.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    $("#modal-btn-finalizar").attr('href', './?ped=finalizar&id='+id);
});

$('#modalCancel').on('shown.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    $("#modal-btn-cancelar").attr('href', './?ped=cancelarT&id='+id);
});
</script>




</body>
</html>