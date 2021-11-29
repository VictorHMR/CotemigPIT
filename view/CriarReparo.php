<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solicitação</title>
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
        <h2 style="font-size: 22px"  id="nav" class="navbar-brand"><img src="./img/LogoP.png" height="50px"> Solicitar Reparo</h2>
        <a style="font-size: 18px;" class="nav-link" id="navLink" href="./?act=aut" type="submit"><i class="fas fa-arrow-left"></i> Voltar</a>
</nav>
<!----------------------------------------Formulario------------------------------------------------------------------------------------------------------------------------------------------------------------->


<div class="cadastro">
    <div class="cad">
   
     <form action="" method="POST" class="frmCriar" autocomplete="off">
     <center><i class="bi bi-clipboard-plus" style="font-size: 6rem;"></i></center>
     <h4 style="text-align: center; font-size:xx-large">Solicitar Reparo</h4><br>
    <textarea  type="text" class="inputs" placeholder="Detalhes do Pedido Ex: Modelo, Defeito etc" name="detalhes"></textarea>
<select name="categoria" class="inputs selectT">
    <option value="" disabled selected>Selecione a Categoria</option>
    <option value="Limpeza">Limpeza</option>
    <option value="Formatação">Formatação</option>
    <option value="Troca de Peça">Troca de Peça</option>
    <option value="Defeito">Defeito</option>
    <option value="Outros">Outros</option>


</select>
    <input  type="date" class="inputs selectT" placeholder="Data desejada" name="data"></input><br>
    
    <center><button class="btnSalvar" type="submit">Salvar</button></center>
        
         
     </form>
    </div>
</div>
<br><br><br>
<hr>
</body>
</html>