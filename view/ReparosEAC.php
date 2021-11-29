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

<!------------------------------------------------- Em Andamento ------------------------------------------------------------------------>
<br><br>
<div class="flex-container"> 






<div  class="tableAndamento">
<div>
<a style="font-size: 18px;" class="linkT" href="./?ped=allAC" type="submit">Aberto</a>
<a style="font-size: 18px;background-color:#e0e0e0;color:#00af66" class="linkT" href="#" type="submit">Em Andamento</a> 
<a style="font-size: 18px;" class="linkT" href="./?ped=allFC" type="submit"> Finalizados </a> 
</div>
          
  <table class="EmAndamento">
    <thead>
      <tr>
        <th>Detalhes</th>
        <th>Categoria</th>
        <th>Data</th>
        <th>Status</th>
        <th>Tecnico</th>
        <th class="THT">Telefone</th>
        <th>Pix</th>
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
        <td><?=$objEA->Tecnico?></td>
        <td><?=$objEA->telefone?></td>
        <td><?=$objEA->pix?></td>

        <?php  if($objEA->status == "Em Andamento" || $objEA->status == "Revisar" ): ?><td></td><?php endif; ?>
        <?php  if($objEA->status == "Aguardando Confirmação"): ?> <td><button type="button" class="btnConfirm" data-toggle="modal" data-target="#modalC" data-id="<?=$objEA->id?>"><i class="bi bi-check-square"></i> </button>
         <button type="button" class="btnRevisar" data-toggle="modal" data-target="#modalRevis" data-id="<?=$objEA->id?>"><i class="bi bi-arrow-counterclockwise"></i></button> </td> <?php endif; ?>

        


      </tr>
    
    <?php } ?>
      
    </tbody>
  </table>
</div>

<!--------------------------------------------------------------------------------------------------------------------------------->


    </div>
  </div>
</div>
    </div>
<!-- Modal Revisão -->
<div class="modal" id="modalRevis">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Mandar Para Revisão ?</h4>
        <button type="button" class="close" data-dismiss="modal">x</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Enivar para revisão ? mesmo após mandar pode-se marcar como concluido.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a id="modal-btn-revisão" href="" class="btn btn-primary">Sim</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
      </div>

    </div>
  </div>
</div>



<!------------------------------------------------------ Modal Confirmar ----------------------------------------------------------->
<div class="modal" id="modalC">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Confirmar</h4>
        <button type="button" class="close" data-dismiss="modal">x</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Após Confirmar a Finalização Não será possivel fazer alterações. Deseja confirmar ?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a id="modal-btn-confirmar" href="" class="btn btn-primary">Sim</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
      </div>

    </div>
  </div>
</div>


<script>


$('#modalC').on('shown.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    $("#modal-btn-confirmar").attr('href', './?ped=confirmar&id='+id);
});

$('#modalRevis').on('shown.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    $("#modal-btn-revisão").attr('href', './?ped=revisar&id='+id);
});
</script>




</body>
</html>