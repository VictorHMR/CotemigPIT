<?php
class UsuarioModel{

    public $id;
    public $nome;
    public $idade;
    public $usuario;
    public $cpf;
    public $telefone;
    public $senha;
    public $tipo;
    public $regiao;
    public $pix;
    public $con;

    public function __construct(){
      $this->con = new PDO(SERVIDOR, USUARIO, SENHA);        
    }
    public function CreateComum(){

      $sql = $this->con->prepare("INSERT INTO usuario(nome, idade, usuario, cpf, telefone, pix, senha, tipo, regiao) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)");
      $sql->execute([$this->getNome(), $this->getIdade(), $this->getUsuario(), $this->getCpf(),  $this->getTelefone(), $this->getPix(), $this->getSenha(), $this->getTipo(), $this->getRegiao() ]);

      if ($sql->errorCode()=='00000'){
        header("Location:./");
      }else if($sql->errorInfo()[1] == '1062'){
        echo "<script> window.alert('Usuario já existe, Escolha um diferente.') </script>";
      }
      else{
        echo $sql->errorInfo()[2];
      }
    }
    public function lerU(){
      $sql = $this->con->prepare("SELECT * FROM usuario where usuario=?");
      $sql->execute([$this->getUsuario()]);
    
      $rows = $sql->fetchAll(PDO::FETCH_CLASS);
      return $rows;
    }
    public function EditarPerfil(){
      $sql = $this->con->prepare("UPDATE usuario SET nome =?, telefone =?, pix=?, senha= ?, idade= ?, tipo= ?, regiao= ? WHERE usuario =?;");
      $sql-> execute([$this->getNome(),$this->getTelefone(), $this->getPix(), $this->getSenha(), $this->getIdade(), $this->getTipo(), $this->getRegiao(), $this->getUsuario()]);

      if($sql->errorCode()!='00000'){
          echo "<div class='alert alert-danger'>" .$sql->errorInfo()[2]. "</div>";
      }else{
          header("Location: ./");
      }
    }  








    

/**
 * Get the value of id
 */ 
public function getId()
{
return $this->id;
}

/**
 * Set the value of id
 *
 * @return  self
 */ 
public function setId($id)
{
$this->id = $id;

return $this;
}

/**
 * Get the value of nome
 */ 
public function getNome()
{
return $this->nome;
}

/**
 * Set the value of nome
 *
 * @return  self
 */ 
public function setNome($nome)
{
$this->nome = $nome;

return $this;
}

/**
 * Get the value of idade
 */ 
public function getIdade()
{
return $this->idade;
}

/**
 * Set the value of idade
 *
 * @return  self
 */ 
public function setIdade($idade)
{
$this->idade = $idade;

return $this;
}

/**
 * Get the value of usuario
 */ 
public function getUsuario()
{
return $this->usuario;
}

/**
 * Set the value of usuario
 *
 * @return  self
 */ 
public function setUsuario($usuario)
{
$this->usuario = $usuario;

return $this;
}

/**
 * Get the value of cpf
 */ 
public function getCpf()
{
return $this->cpf;
}

/**
 * Set the value of cpf
 *
 * @return  self
 */ 
public function setCpf($cpf)
{
$this->cpf = $cpf;

return $this;
}

/**
 * Get the value of telefone
 */ 
public function getTelefone()
{
return $this->telefone;
}

/**
 * Set the value of telefone
 *
 * @return  self
 */ 
public function setTelefone($telefone)
{
$this->telefone = $telefone;

return $this;
}

/**
 * Get the value of senha
 */ 
public function getSenha()
{
return $this->senha;
}

/**
 * Set the value of senha
 *
 * @return  self
 */ 
public function setSenha($senha)
{
$this->senha = $senha;

return $this;
}




/**
 * Get the value of tipo
 */ 
public function getTipo()
{
return $this->tipo;
}

/**
 * Set the value of tipo
 *
 * @return  self
 */ 
public function setTipo($tipo)
{
$this->tipo = $tipo;

return $this;
}

/**
 * Get the value of regiao
 */ 
public function getRegiao()
{
return $this->regiao;
}

/**
 * Set the value of regiao
 *
 * @return  self
 */ 
public function setRegiao($regiao)
{
$this->regiao = $regiao;

return $this;
}

    /**
     * Get the value of pix
     */ 
    public function getPix()
    {
        return $this->pix;
    }

    /**
     * Set the value of pix
     *
     * @return  self
     */ 
    public function setPix($pix)
    {
        $this->pix = $pix;

        return $this;
    }
} ?>