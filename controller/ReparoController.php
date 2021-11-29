  
<?php
class ReparoController{


    public function CreateReparo(){
        if ( !isset($_SESSION['usuario'])) {
            header("Location: view/login.php");
        }

        $obj = new ReparoModel();
        $usu = $_SESSION['usuario'];

        if(isset($_POST['detalhes']) && isset($_POST['categoria']) && isset($_POST['data'])){
            
            $obj->setRegiao($usu->regiao);
            $obj-> setDetalhes($_POST['detalhes']);
            $obj-> setCategoria($_POST['categoria']);
            $obj-> setData($_POST['data']);
            $obj-> setStatus("Aberto");
            $obj->setUsuario($usu->usuario);
            
           
            $obj ->CreateReparo();
        }
        include "view/CriarReparo.php";
    }
    public function filtrar(){
        if ( !isset($_SESSION['usuario'])) {
            header("Location: view/login.php");
        }
        $usu = $_SESSION['usuario'];
        $obj = new ReparoModel();
            if(isset($_GET['F_categoria']) && isset($_GET['F_regiao'])){
                $obj-> setFiltroCategoria($_GET['F_categoria']);
                $obj-> setFiltroRegiao($_GET['F_regiao']);
                $pedidosA = $obj-> filtrarRC();

                $filtroC = $_GET['F_categoria'];
                $filtroR = $_GET['F_regiao'];
                
            }else if(!isset($_GET['F_categoria']) && isset($_GET['F_regiao'])){

                $obj-> setFiltroRegiao($_GET['F_regiao']);
                $pedidosA = $obj-> filtrarR();
                $filtroR = $_GET['F_regiao'];
            }else if(isset($_GET['F_categoria']) && !isset($_GET['F_regiao'])){
                $obj-> setFiltroCategoria($_GET['F_categoria']);
                $pedidosA = $obj-> filtrarC();
                $filtroC = $_GET['F_categoria'];
            }else{
            $pedidosA = $obj ->ListarAbertos();
            $obj-> setTecnico($usu->usuario);
            }
              

           
            
        
    
        include "view/Reparos.php";
    }
    public function ListarT(){
        if ( !isset($_SESSION['usuario'])) {
            header("Location: view/login.php");
        }

        $obj = new ReparoModel();
        $usu = $_SESSION['usuario'];

            $obj-> setTecnico($usu->usuario);

           
            $pedidosA = $obj ->ListarAbertos();
            $pedidosEA = $obj ->ListarEmAndamento();
            $pedidosF = $obj ->ListarFinalizados();
        
    
        include "view/Reparos.php";
    }
    public function ListarTEA(){
        if ( !isset($_SESSION['usuario'])) {
            header("Location: view/login.php");
        }

        $obj = new ReparoModel();
        $usu = $_SESSION['usuario'];

            $obj-> setRegiao($usu->regiao);
            $obj-> setTecnico($usu->usuario);

           
            $pedidosEA = $obj ->ListarEmAndamento();
        
    
        include "view/ReparosEA.php";
    }
    public function ListarF(){
        if ( !isset($_SESSION['usuario'])) {
            header("Location: view/login.php");
        }

        $obj = new ReparoModel();
        $usu = $_SESSION['usuario'];

            $obj-> setTecnico($usu->usuario);

            $pedidosF = $obj ->ListarFinalizados();
        
    
        include "view/ReparosF.php";
    }

    public function VerNotaT(){

        if ( !isset($_SESSION['usuario'])) {
            header("Location: view/login.php");
        }

        $obj = new ReparoModel();
        $usu = $_SESSION['usuario'];
        $obj->setIdReparo($_GET['idreparo']);
        $obj-> setTecnico($usu->usuario);

        $notaT = $obj ->notasT() ;
    }

    public function ListarC(){
        if ( !isset($_SESSION['usuario'])) {
            header("Location: view/login.php");
        }

        $obj = new ReparoModel();
        $usu = $_SESSION['usuario'];

            $obj-> setUsuario($usu->usuario);
            
           
            $pedidos = $obj ->ListarAbertosC();

        
    
        include "view/ReparosC.php";
    }
    public function ListarEAC(){
        if ( !isset($_SESSION['usuario'])) {
            header("Location: view/login.php");
        }

        $obj = new ReparoModel();
        $usu = $_SESSION['usuario'];

            $obj-> setUsuario($usu->usuario);
            
           
            $pedidosEA = $obj ->ListarEmAndamentoC();

        
    
        include "view/ReparosEAC.php";
    }
    public function ListarFC(){
        if ( !isset($_SESSION['usuario'])) {
            header("Location: view/login.php");
        }

        $obj = new ReparoModel();
        $usu = $_SESSION['usuario'];

            $obj-> setUsuario($usu->usuario);
            
            $pedidosF = $obj ->ListarFinalizadosC();
             
        
    
        include "view/ReparosFC.php";
    }
    public function DeletarReparo(){
       $obj = new ReparoModel();
        $obj-> setIdReparo($_GET['id']);
        $obj ->DeletarReparo();
        include "view/ReparosC.php";
    }
    public function AceitarReparo(){
        $obj = new ReparoModel();
        $usu = $_SESSION['usuario'];

        $obj-> setIdReparo($_GET['id']);
        $obj-> setTecnico($usu->usuario);
        $obj ->AceitarReparo();
        include "view/ReparosEA.php";

    }
    public function FinalizarReparoT(){
        $obj = new ReparoModel();

        $obj-> setIdReparo($_GET['id']);
        $obj ->FinalizarReparoT();
        include "view/ReparosEA.php";

    }
    public function ConfirmarReparo(){
        $obj = new ReparoModel();

        $obj-> setIdReparo($_GET['id']);
        $obj ->ConfirmarReparo();
        include "view/ReparosEAC.php";

    }
    public function RevisarReparo(){
        $obj = new ReparoModel();

        $obj-> setIdReparo($_GET['id']);
        $obj ->RevisarReparo();
        include "view/ReparosEAC.php";

    }
    public function FecharReparo(){
        $obj = new ReparoModel();

        $obj-> setIdReparo($_GET['id']);
        $obj ->FecharReparo();
        include "view/ReparosF.php";

    }
    public function FecharReparoC(){
        $obj = new ReparoModel();

        $obj-> setIdReparo($_GET['id']);
        $obj ->FecharReparoC();
        include "view/ReparosFC.php";

    }
    public function CancelReparo(){
        $obj = new ReparoModel();

        $obj-> setIdReparo($_GET['id']);
        $obj ->CancelReparoT();
        include "view/ReparosEA.php";

    }
}


    


?>