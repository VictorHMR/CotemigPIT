  
<?php
class UsuarioController{

    
    public function CreateComum(){
         
        $obj = new UsuarioModel();

        if( isset($_POST['nome']) && isset($_POST['idade']) && isset($_POST['usuario']) && isset($_POST['cpf']) && isset($_POST['telefone']) && isset($_POST['pix']) && isset($_POST['senha'])){
            if($_POST['senha'] != $_POST['Csenha']){

                echo "<script>window.Alert('As Senhas não conferem')</script>";
            }else{
                $obj-> setNome($_POST['nome']);
                $obj-> setIdade($_POST['idade']);
                $obj-> setUsuario($_POST['usuario']);
                $obj-> setCpf($_POST['cpf']);
                $obj-> setTelefone($_POST['telefone']);
                $obj->setPix($_POST['pix']);
                $obj-> setSenha($_POST['senha']);
                $obj-> setTipo($_POST['tipo']);
                $obj-> setRegiao($_POST['regiao']);
    
                $obj ->CreateComum();
            }
            
        }
        
        include "view/RegistrarUsuario.php";
    }
    public function lerU(){
        
        if ( !isset($_SESSION['usuario'])) {
            header("Location: view/login.php");
        }

        $obj = new UsuarioModel();

        if (isset($_SESSION['usuario'])) {
            $usu = $_SESSION['usuario'];
            $obj->setUsuario($usu->usuario);

            $usuario = $obj->lerU();
            
        }
        include 'view/menu.php';

    }
    public function EditarPerfil(){

        
        $obj = new UsuarioModel();
        $usu = $_SESSION['usuario'];

        if( isset($_POST['nome']) && isset($_POST['telefone']) && isset($_POST['pix']) && isset($_POST['senha']) && isset($_POST['idade']) && isset($_POST['tipo']) && isset($_POST['regiao'])){
            $obj->setNome($_POST['nome']);
            $obj->setTelefone($_POST['telefone']);
            $obj->setSenha($_POST['senha']);
            $obj->setIdade($_POST['idade']);
            $obj->setTipo($_POST['tipo']);
            $obj->setRegiao($_POST['regiao']);
            $obj->setPix($_POST['pix']);
            $obj->setUsuario($usu->usuario);
            $obj->EditarPerfil();
            
        }
        $obj->setUsuario($usu->usuario);
        $info= $obj-> lerU();
        include "view/EditarPerfil.php";
    } 
}

?>