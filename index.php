
<?php
header("Content-type: text/html; charset=utf-8");
require_once "inc/config.php";
require_once "controller/UsuarioController.php";
require_once "model/UsuarioModel.php";
require_once "controller/ReparoController.php";
require_once "model/ReparoModel.php";
require_once "controller/SocialController.php";
require_once "model/SocialModel.php";

$app = new UsuarioController();
$ped = new ReparoController();
$soc = new SocialController();


if(isset($_GET['act']) ){
    if($_GET['act']=='criarUsuario'){
        $app->CreateComum();
    }else if($_GET['act']=='aut'){
        require_once 'restrita.php';
        $app->LerU();
    }else if($_GET['act']=='editP'){
        require_once 'restrita.php';
        $app->EditarPerfil();
    }
    

}else if(isset($_GET['ped'])){
    if($_GET['ped']=='fazerP'){
        require_once 'restrita.php';
        $ped->CreateReparo();
    }else  if($_GET['ped']=='pedT'){
        require_once 'restrita.php';
        $ped->ListarT();
    }else  if($_GET['ped']=='pedC'){
        require_once 'restrita.php';
        $ped->ListarC();
    }else  if($_GET['ped']=='allA'){
        require_once 'restrita.php';
        $ped->ListarT();
    }else  if($_GET['ped']=='allFiltrado'){
        require_once 'restrita.php';
        $ped->filtrar();
    }else  if($_GET['ped']=='allEA'){
        require_once 'restrita.php';
        $ped->ListarTEA();
    }else  if($_GET['ped']=='allAC'){
        require_once 'restrita.php';
        $ped->ListarC();
    }else  if($_GET['ped']=='allEAC'){
        require_once 'restrita.php';
        $ped->ListarEAC();
    }else  if($_GET['ped']=='allFC'){
        require_once 'restrita.php';
        $ped->ListarFC();
    }else  if($_GET['ped']=='allF'){
        require_once 'restrita.php';
        $ped->ListarF();
    }else  if($_GET['ped']=='cancelar'){
        require_once 'restrita.php';
        $ped->DeletarReparo();
    }else  if($_GET['ped']=='cancelarT'){
        require_once 'restrita.php';
        $ped->CancelReparo();
    }else  if($_GET['ped']=='aceitar'){
        require_once 'restrita.php';
        $ped->AceitarReparo();
    }else  if($_GET['ped']=='finalizar'){
        require_once 'restrita.php';
        $ped->FinalizarReparoT();
    }else  if($_GET['ped']=='confirmar'){
        require_once 'restrita.php';
        $ped->ConfirmarReparo();
    }else  if($_GET['ped']=='revisar'){
        require_once 'restrita.php';
        $ped->RevisarReparo();
    }

}else if(isset($_GET['soc'])){
    if($_GET['soc']=='listT'){
        require_once 'restrita.php';
        $soc->ListarTecnicos();
    }else  if($_GET['soc']=='listC'){
        require_once 'restrita.php';
        $soc->ListarUsuarios();
    }else  if($_GET['soc']=='avaliar'){
        require_once 'restrita.php';
        $soc->ListarTecnicos();
    }


}else if(isset($_GET['ava'])){
    if($_GET['ava']=='avaliarT'){
        require_once 'restrita.php';
        $soc->CreateAvaliacao();
        $ped->FecharReparo();
    }else if($_GET['ava']=='avaliar'){
        require_once 'restrita.php';
        $soc->CreateAvaliacaoC();
        $ped->FecharReparoC();
    }

}else{
    include "view/PagInicial.php";
}

?>


