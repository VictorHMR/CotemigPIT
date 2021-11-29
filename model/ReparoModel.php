<?php
class ReparoModel{

    public $usuario;
    public $detalhes;
    public  $observacoes;
    public  $categoria;
    public  $data;
    public  $regiao;
    public  $status;
    public  $preferencia;
    public  $tecnico;
    public  $id_usuario;
    public  $idReparo;
    public $filtroRegiao;
    public $filtroCategoria;
    public $con;

    public function __construct(){
        $this->con = new PDO(SERVIDOR, USUARIO, SENHA);        
    }
    public function CreateReparo(){

        $sql = $this->con->prepare("INSERT INTO reparo(detalhes, regiao, categoria, data,  status, usuario) VALUES (?, ?, ?, ?, ?, ?)");
        $sql->execute([$this->getDetalhes(), $this->getRegiao(), $this->getCategoria(), $this->getData(),  $this->getStatus(), $this->getUsuario() ]);
    
        if ($sql->errorCode()!='00000'){
            echo $sql->errorInfo()[2];
        }else{
            header("Location:./?ped=allAC");

        }
        
    }
    public function filtrarRC(){
        $sql = $this->con->prepare('CALL `prc_filtrarRC`(?,?);');
        $sql->execute([$this->getFiltroCategoria(), $this->getFiltroRegiao()]);
        
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;
    }

    public function filtrarR(){
        $sql = $this->con->prepare('CALL `prc_filtrarR`(?);');
        $sql->execute([$this->getFiltroRegiao()]);
        
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;
    }

    public function filtrarC(){
        $sql = $this->con->prepare('CALL `prc_filtrarC`(?);');
        $sql->execute([$this->getFiltroCategoria()]);
        
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;
    }

    public function ListarAbertos(){
        $sql = $this->con->prepare('CALL `prc_pedidosAbertos`();');
        $sql->execute();
        
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;
    }
    public function ListarAbertosC(){
        $sql = $this->con->prepare('CALL `prc_pedidosAbertosC`(?);');
        $sql->execute([$this->getUsuario()]);
        
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;
    }
    public function ListarEmAndamento(){
        $sql = $this->con->prepare('CALL `prc_pedidosEmAndamento`(?);');
        $sql->execute([$this->getTecnico()]);
        
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;
    }
    public function ListarEmAndamentoC(){
        $sql = $this->con->prepare('CALL `prc_pedidosEmAndamentoC`(?);');
        $sql->execute([$this->getUsuario()]);
        
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;
    }
    public function ListarFinalizados(){
        $sql = $this->con->prepare('CALL `prc_pedidosFinalizados`(?);');
        $sql->execute([$this->getTecnico()]);
        
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;
    }
    public function ListarFinalizadosC(){
        
            $sql = $this->con->prepare('CALL `prc_pedidosFinalizadosCP`(?);');
            $sql->execute([$this->getUsuario()]);

            $rows = $sql->fetchAll(PDO::FETCH_CLASS); 
            return $rows;
        
        
    }
    public function notasT(){
        $sql = $this->con->prepare('SELECT avaliacao.nota, avaliacao.comentario FROM avaliacao, reparo WHERE  avaliacao.usuario = ? AND avaliacao.id_reparo = ? group BY avaliacao.id_reparo;');
        $sql->execute([$this->getTecnico(), $this->getIdReparo()]);
        
        $rows = $sql->fetchAll(PDO::FETCH_CLASS);
        return $rows;

        
    }
    public function DeletarReparo(){
        $sql = $this->con->prepare("DELETE FROM reparo where id=?");
        $sql->execute([$this->getIdReparo()]);
        
        if($sql->errorCode()!='00000'){
            echo "<div class='alert alert-danger'> " .$sql->errorInfo()[2]. "</div>";
        }else{
            header("Location:./?ped=allAC");
        }
    }
    public function AceitarReparo(){

        $sql = $this->con->prepare("UPDATE reparo SET status = 'Em Andamento', tecnico = ? where id=?");
        $sql->execute([$this->getTecnico(), $this->getIdReparo()]);
        if($sql->errorCode()!='00000'){
            echo "<div class='alert alert-danger'> " .$sql->errorInfo()[2]. "</div>";
        }else{
            header("Location:./?ped=allEA");
        }

    }
    public function FinalizarReparoT(){

        $sql = $this->con->prepare("UPDATE reparo SET status = 'Aguardando Confirmação' where id=?");
        $sql->execute([$this->getIdReparo()]);
        if($sql->errorCode()!='00000'){
            echo "<div class='alert alert-danger'> " .$sql->errorInfo()[2]. "</div>";
        }else{
            header("Location:./?ped=allEA");
        }

    }
    public function ConfirmarReparo(){

        $sql = $this->con->prepare("UPDATE reparo SET status = 'Aguardando Avaliação' where id=?");
        $sql->execute([$this->getIdReparo()]);
        if($sql->errorCode()!='00000'){
            echo "<div class='alert alert-danger'> " .$sql->errorInfo()[2]. "</div>";
        }else{
            header("Location:./?ped=allFC");
        }

    }
    public function RevisarReparo(){

        $sql = $this->con->prepare("UPDATE reparo SET status = 'Revisar' where id=?");
        $sql->execute([$this->getIdReparo()]);
        if($sql->errorCode()!='00000'){
            echo "<div class='alert alert-danger'> " .$sql->errorInfo()[2]. "</div>";
        }else{
            header("Location:./?ped=allEAC");
        }

    }
    public function FecharReparo(){
        $sql = $this->con->prepare("Select count(id) from avaliacao where id_reparo = ?");
        $sql->execute([$this->getIdreparo()]);
        $rows = $sql->fetch();
        

        if($rows[0] > 1){
            $sql = $this->con->prepare("UPDATE reparo SET status = 'Finalizado' where id=?");
            $sql->execute([$this->getIdreparo()]);
            
        }else{

        $sql = $this->con->prepare("UPDATE reparo SET status = 'Avaliado Pelo Tecnico' where id=?");
        $sql->execute([$this->getIdReparo()]);
        if($sql->errorCode()!='00000'){
            echo "<div class='alert alert-danger'> " .$sql->errorInfo()[2]. "</div>";
        }else{
            header("Location:./?ped=allF");
        }
             }
    }
    public function FecharReparoC(){
        $sql = $this->con->prepare("Select count(id) from avaliacao where id_reparo = ?");
        $sql->execute([$this->getIdreparo() ]);
        $rows = $sql->fetch();

        if($rows[0] > 1){
            $sql = $this->con->prepare("UPDATE reparo SET status = 'Finalizado' where id=?");
            $sql->execute([$this->getIdreparo()]);
            
        }else{
        $sql = $this->con->prepare("UPDATE reparo SET status = 'Avaliado Pelo Usuario' where id=?");
        $sql->execute([$this->getIdReparo()]);
        if($sql->errorCode()!='00000'){
            echo "<div class='alert alert-danger'> " .$sql->errorInfo()[2]. "</div>";
        }else{
            header("Location:./?ped=allFC");
        }
            }


    
    }
    public function CancelReparoT(){
        $sql = $this->con->prepare("UPDATE reparo SET status = 'Aberto', tecnico = null where id=?");
        $sql->execute([$this->getIdReparo()]);
        if($sql->errorCode()!='00000'){
            echo "<div class='alert alert-danger'> " .$sql->errorInfo()[2]. "</div>";
        }else{
            header("Location:./?ped=allEA");
        }
    }




    

    /**
     * Get the value of detalhes
     */ 
    public function getDetalhes()
    {
        return $this->detalhes;
    }

    /**
     * Set the value of detalhes
     *
     * @return  self
     */ 
    public function setDetalhes($detalhes)
    {
        $this->detalhes = $detalhes;

        return $this;
    }


    /**
     * Get the value of categoria
     */ 
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     *
     * @return  self
     */ 
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get the value of data
     */ 
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */ 
    public function setData($data)
    {
        $this->data = $data;

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
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of preferencia
     */ 
    public function getPreferencia()
    {
        return $this->preferencia;
    }

    /**
     * Set the value of preferencia
     *
     * @return  self
     */ 
    public function setPreferencia($preferencia)
    {
        $this->preferencia = $preferencia;

        return $this;
    }

    /**
     * Get the value of tecnico
     */ 
    public function getTecnico()
    {
        return $this->tecnico;
    }

    /**
     * Set the value of tecnico
     *
     * @return  self
     */ 
    public function setTecnico($tecnico)
    {
        $this->tecnico = $tecnico;

        return $this;
    }

    /**
     * Get the value of id_usuario
     */ 
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */ 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Get the value of idReparo
     */ 
    public function getIdReparo()
    {
        return $this->idReparo;
    }

    /**
     * Set the value of idReparo
     *
     * @return  self
     */ 
    public function setIdReparo($idReparo)
    {
        $this->idReparo = $idReparo;

        return $this;
    }

    /**
     * Get the value of observacoes
     */ 
    public function getObservacoes()
    {
        return $this->observacoes;
    }

    /**
     * Set the value of observacoes
     *
     * @return  self
     */ 
    public function setObservacoes($observacoes)
    {
        $this->observacoes = $observacoes;

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
     * Get the value of filtroRegiao
     */ 
    public function getFiltroRegiao()
    {
        return $this->filtroRegiao;
    }

    /**
     * Set the value of filtroRegiao
     *
     * @return  self
     */ 
    public function setFiltroRegiao($filtroRegiao)
    {
        $this->filtroRegiao = $filtroRegiao;

        return $this;
    }

    /**
     * Get the value of filtroCategoria
     */ 
    public function getFiltroCategoria()
    {
        return $this->filtroCategoria;
    }

    /**
     * Set the value of filtroCategoria
     *
     * @return  self
     */ 
    public function setFiltroCategoria($filtroCategoria)
    {
        $this->filtroCategoria = $filtroCategoria;

        return $this;
    }
}
?>