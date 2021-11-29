<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
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
    <script src="./JS/mascara.js"></script>

</head>
<body style="font-family: Arial" class="corpo">
    <!----------------------------------------Menu------------------------------------------------------------------------------------------------------------------------------------------------------------->
<nav class="NavBar">
        <h2 style="font-size: 22px"  id="nav" class="navbar-brand"><img src="./img/LogoP.png" height="50px"> Editar Perfil</h2>
        <a style="font-size: 18px;" class="nav-link" id="navLink" href="./?act=aut" type="submit"><i class="fas fa-arrow-left"></i> Voltar</a>
</nav>
<!----------------------------------------Formulario------------------------------------------------------------------------------------------------------------------------------------------------------------->



<?php foreach($info as $infos) { ?>
<div class="cadastro">
    <div class="cad">
     <form action="./?act=editP" class="frmEdit" method="POST">
     <center><i class="bi bi-pencil-square" style="font-size: 6rem;"></i></center>
     <div class="row">
     <div class="col">
    <label for="usuario">Usuario:</label>
    <input  type="text" class="inputs selectT disable" name="usuario" value="<?=$infos->usuario?>" readonly></input>
    <label for="nome">Nome:</label>
    <input  type="text" class="inputs selectT" name="nome" value="<?=$infos->nome?>" required></input>
    <label for="idade">Idade:</label>
    <input  type="number" class="inputs selectT"  name="idade" value="<?=$infos->idade?>" required></input>
    <label for="telefone">Telefone:</label>
    <input  type="text" class="inputs selectT" onkeypress="mascaraTel()" id="Telefone" name="telefone" value="<?=$infos->telefone?>" required></input>
    <label for="pix">Pix:</label>
    <input type="text"class="inputs" placeholder="Chave Pix" name="pix" value="<?=$infos->pix?>"  required></input>

     </div>
     <div class="col">
    <label for="senha">Senha :</label>
    <input  type="text" class="inputs selectT"  name="senha" value="<?=$infos->senha?>" required> </input>
<label for="regiao">Região:</label>
<select name="regiao" class="inputs selectT"  required>
<option value="" disabled selected><?=$infos->regiao?></option>
    <option value="Belo Horizonte">Belo Horizonte</option>
    <option value="Contagem">Contagem</option>
</select>
    <label for="cpf">CPF:</label>
    <input  type="text" class="inputs selectT disable" id="CPF" onkeypress="mascaraCPF()" name="cpf" value="<?=$infos->cpf?>" readonly></input>
    <label for="tipo">Tipo:</label>
    <input  type="text" class="inputs selectT disable"  name="tipo" value="<?=$infos->tipo?>"  readonly> </input>
</div></div>
<center> <button class="btnSalvar" type="submit">Salvar</button></center>
         
         
     </form>
    </div>
</div>
<?php } ?>
<hr>
</body>
</html>