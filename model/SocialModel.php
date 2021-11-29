<?php
class SocialModel{

    public $regiao;
    public $nota;   
    public $id_reparo;
    public $usuario;
    public $coment;






    
    public $con;

    public function __construct(){
      $this->con = new PDO(SERVIDOR, USUARIO, SENHA);        
    }
    public function ListarTecnicos(){

        $sql = $this->con->prepare('CALL `prc_listarTecnicos`(?);');
        $sql->execute([$this->getRegiao()]);
        
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;

    }
    public function ListarUsuarios(){

        $sql = $this->con->prepare('CALL `prc_listarUsuarios`(?);');
        $sql->execute([$this->getRegiao()]);
    
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;

    }
    public function AvaliarTec(){
        
        
        $sql = $this->con->prepare("INSERT INTO avaliacao(nota, comentario, usuario, id_reparo) VALUES (?, ?, ?,?)");
        $sql->execute([$this->getNota(),$this->getComent(), $this->getUsuario(), $this->getId_reparo() ]);
  
        if ($sql->errorCode()!='00000'){
          echo $sql->errorInfo()[2];
        }else{
          header("Location:./?ped=allF");
        }
    
    }
    public function AvaliarTecC(){
        $sql = $this->con->prepare("INSERT INTO avaliacao(nota, comentario, usuario, id_reparo) VALUES (?, ?, ?,?)");
        $sql->execute([$this->getNota(), $this->getComent(), $this->getUsuario(), $this->getId_reparo() ]);
  
        if ($sql->errorCode()!='00000'){
          echo $sql->errorInfo()[2];
        }else{
          header("Location:./?ped=allFC");
        }
        
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
     * Get the value of nota
     */ 
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set the value of nota
     *
     * @return  self
     */ 
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get the value of id_reparo
     */ 
    public function getId_reparo()
    {
        return $this->id_reparo;
    }

    /**
     * Set the value of id_reparo
     *
     * @return  self
     */ 
    public function setId_reparo($id_reparo)
    {
        $this->id_reparo = $id_reparo;

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
     * Get the value of coment
     */ 
    public function getComent()
    {
        return $this->coment;
    }

    /**
     * Set the value of coment
     *
     * @return  self
     */ 
    public function setComent($coment)
    {
        $this->coment = $coment;

        return $this;
    }
}
?>