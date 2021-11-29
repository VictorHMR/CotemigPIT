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
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
<br>
<br>
<!------------------------------------------------- Pedidos Finalizados ------------------------------------------------------------------------>

<div class="flex-container">




<div class="">
  
<div>
<a style="font-size: 18px;" class="linkT" href="./?ped=allA" type="submit">Aberto</a>
<a style="font-size: 18px;" class="linkT" href="./?ped=allEA" type="submit">Em Andamento</a> 
<a style="font-size: 18px;background-color:#e0e0e0;color:#00af66" class="linkT" href="#" type="submit"> Finalizados </a> 
</div>

  <table class="Finalizado">
    <thead>
      <tr>
        
        <th style="border-left: none;">id</th>
        <th>Categoria</th>
        <th>Data</th>
        <th>Status</th>
        <th>Cliente</th>
        <th>Região</th>
        <th>Nota</th>
        <th>Comentário</th>

        <th>Ação</th>
  
      </tr>
    </thead>
    <tbody>

    <?php foreach($pedidosF as $objF){ ?> 

      <tr>
        
      <td style="border-left: none;"><?=$objF->id?></td>

        <td><?=$objF->categoria?></td>
        <td><?=$objF->data?></td>
        <td><?=$objF->status?></td>
        <td><?=$objF->Cliente?></td>
        <td><?=$objF->regiao?></td>
        <?php  if($objF->nota != ""):?> <td><?=$objF->nota?></td> <?php else:?>  <td>N/A</td>    <?php endif; ?>
        <?php  if($objF->comentario != ""):?> <td><?=$objF->comentario?></td> <?php else:?>  <td>N/A</td>    <?php endif; ?>


        
        <?php  if($objF->status != "Aguardando Avaliação" && $objF->status != "Avaliado Pelo Usuario" ): ?> <td></td> <?php endif; ?>

        <?php  if($objF->status == "Aguardando Avaliação" || $objF->status == "Avaliado Pelo Usuario" ): ?> <td><button type="button" class="btnAvaliar" data-toggle="modal" data-target="#modalAva" data-user="<?=$objF->usuario?>" data-id="<?=$objF->id?>"><i class="bi bi-award-fill"></i></button> </td> <?php endif; ?>
</td>
      </tr>
    
    <?php } ?>
      
    </tbody>
  </table>
</div>
</div>
<div class="modal" id="modalAva">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header pezin2">
        <h4 class="modal-title">Avaliar</h4>
        <button type="button" class="close" data-dismiss="modal">X</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <form action="" id="tempo">
        <div class="tempo" >
         <h4>Avalie o Usuario</h4>
            <input type="radio" id="empty" name="fb" value="" checked/>

            <label for="ava1"><i class="fa"></i></label>
            <input type="radio" id="ava1" name="fb" value="1" onclick="nota()"/>

            <label for="ava2"><i class="fa"></i></label>
            <input type="radio" id="ava2" name="fb" value="2" onclick="nota()"/>
            <label for="ava3"><i class="fa"></i></label>
            <input type="radio" id="ava3" name="fb" value="3" onclick="nota()"/>
            <label for="ava4"><i class="fa"></i></label>
            <input type="radio" id="ava4" name="fb" value="4" onclick="nota()"/>
            <label for="ava5"><i class="fa"></i></label>
            <input type="radio" id="ava5" name="fb" value="5" onclick="nota()"/><br><br>

           <textarea class="Coment" placeholder="Deixe Seu comentário" id="coment" name="comentario" maxlength="200" onkeyup="nota()"></textarea>
<br>
          </div>



     </form>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer pezin">
        <a  id="modal-btn-avaliar" href="" class="btnAvaliar" onclick="nota()">Enviar</a>
        <button type="button" class="btnRevisar" data-dismiss="modal">Cancelar</button>
      </div>

    </div>
  </div>
</div>
<script> 

var Nota;




 $('#modalAva').on('shown.bs.modal', function(event) {
    
    const button = $(event.relatedTarget);
    $('#modal-btn-avaliar').on('click', function(event){

      var id = button.data('id');
      var Usuario = button.data('user');
      $("#modal-btn-avaliar").attr('href', './?ava=avaliarT&id='+id+'&cliente='+Usuario+'&nota='+Nota+'&coment='+Coment)
    });
});

function nota(){
  if($("#ava1").prop("checked")){
      Nota = 1
    }else if($("#ava2").prop("checked")){
      Nota = 2
    }else if($("#ava3").prop("checked")){
      Nota = 3
    }else if($("#ava4").prop("checked")){
      Nota = 4
    }else if($("#ava5").prop("checked")){
      Nota = 5
    }

    Coment = document.getElementById('coment').value;
    console.log(Coment)
}





</script>
</body>
</html>