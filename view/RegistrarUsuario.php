<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./css/Tabelas.css">
    <link rel="stylesheet" href="./css/Forms.css">
    <link rel="stylesheet" href="./css/Menus.css">
    <link rel="stylesheet" href="./css/Botoes.css">
    <link rel="stylesheet" href="./css/avaliacao.css">
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
    <h2 style="font-size: 22px"  id="nav" class="navbar-brand"><img src="./img/LogoP.png" height="50px"> Registrar-Se</h2>
        <a style="font-size: 18px;" id="navLink" class="nav-link" href="./" type="submit"><i class="fas fa-arrow-left"></i> Voltar</a>
</nav>
<!----------------------------------------Formulario------------------------------------------------------------------------------------------------------------------------------------------------------------->





<div class="form-group">

    <div class="cad frmRegistro">
    <center><i class="bi bi-person-square" style="font-size: 6rem;margin:0"></i></center>
    <h4 style="text-align: center;font-size:xx-large;margin:0">Cadastre-se</h4>
    <div id="mensagem"></div>
    <br>
     <form action="" method="POST" autocomplete="off">
     <div class="row">
     <div class="col">
    <input  type="text" class="inputs" placeholder="Digite seu Nome" name="nome" required></input>
    <input  type="number" class="inputs selectT"  placeholder="Idade"   name="idade" required></input>
    <input  type="text"  class="inputs" placeholder="Usuario" name="usuario" required> </input>
    <input type="text"class="inputs" placeholder="CPF" name="cpf" id="CPF" onkeypress="mascaraCPF()"  required></input>
    <input type="text"class="inputs" placeholder="Chave Pix" name="pix"  required></input>

     </div>
     <div class="col">
    
    <input  type="text" class="inputs" id="Telefone" placeholder="Telefone Ex: (31)96666-6666" name="telefone" onkeypress="mascaraTel()" required></input>
    
    <input  type="password" class="inputs" placeholder="Senha" name="senha" required> </input>
    <input  type="password" class="inputs" placeholder=" Confirmar Senha" name="Csenha" required> </input>

<select name="tipo" class="inputs selectT"  required>
    <option value="" disabled selected>Selecione um Tipo</option>
    <option value="Usuario Comum">Usuario Comum</option>
    <option value="Tecnico">Tecnico</option>
</select>
<select name="regiao" class="inputs selectT" required>
    <option value="" disabled selected>Selecione sua Região</option>
    <option value="Belo Horizonte">Belo Horizonte</option>
    <option value="Contagem">Contagem</option>
</select>

<br>
     </div>
<center>

    <button class="btnSalvar" type="submit">Salvar</button> 
        <button class="btnLimpar" type="reset">Limpar</button>
 </center>
     </div>
     </form>
    
    </div>
</div>
<br><br><br>


<!-------------------------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>