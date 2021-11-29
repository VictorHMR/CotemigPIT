
<?php
class SocialController{

    
    public function ListarTecnicos(){
        $obj = new SocialModel();
        if ( !isset($_SESSION['usuario'])) {
        header("Location: view/login.php");
        }

        $obj = new SocialModel();
        $usu = $_SESSION['usuario'];
        if(isset($_GET['F_regiao'])){
            $obj->setRegiao($_GET['F_regiao']);
            $filtroR = $_GET['F_regiao'];
        }else{
            $obj-> setRegiao($usu->regiao);
            
        }

        
        
        $tecnicos = $obj->ListarTecnicos();

         include "view/ListarTecnicos.php";

    }
    public function ListarUsuarios(){
        $obj = new SocialModel();
        if ( !isset($_SESSION['usuario'])) {
            header("Location: view/login.php");
        }
    
        $obj = new SocialModel();
        $usu = $_SESSION['usuario'];

        if(isset($_GET['F_regiao'])){
            $obj->setRegiao($_GET['F_regiao']);
            $filtroR = $_GET['F_regiao'];
        }else{
            $obj-> setRegiao($usu->regiao);
        }

        $usuarios = $obj->ListarUsuarios();
    
        include "view/listarUsuarios.php";
    
    }
    public function CreateAvaliacao(){
        if ( !isset($_SESSION['usuario'])) {
            header("Location: view/login.php");
        }

        $obj = new SocialModel();
        $usu = $_SESSION['usuario'];

       
            
            
        $obj-> setNota($_GET['nota']);
        $obj-> setId_reparo($_GET['id']);
        $obj-> setUsuario($_GET['cliente']);
        $obj->setComent($_GET['coment']);
           
            
           
        $obj ->AvaliarTec();
        include "view/ReparosF.php";
        
        
    }
    public function CreateAvaliacaoC(){
        if ( !isset($_SESSION['usuario'])) {
            header("Location: view/login.php");
        }

        $obj = new SocialModel();
        $usu = $_SESSION['usuario'];

       
            
            
        $obj-> setNota($_GET['nota']);
        $obj-> setId_reparo($_GET['id']);
        $obj-> setUsuario($_GET['cliente']);
        $obj->setComent($_GET['coment']);
           
            
           
        $obj ->AvaliarTecC();
        include "view/ReparosFC.php";
        
        


    }

}


?>