<?php
class Carreras extends Controlador{
 private $db;
    public function __construct(){
        $this->db = new Base;
        Sesion::iniciarSesion($this->datos);
        $this->datos['rolesPermitidos'] = [10];

       if (!tienePrivilegios($this->datos['usuarioSesion']->Rol_Cod,$this->datos['rolesPermitidos'])) {
            Sesion::cerrarSesion();
           redireccionar('/login');
        }


        $this->CarreraModelo = $this->modelo('CarreraModelo');
        
    }


    public function index(){
        $this->datos['Carreras'] = $this->CarreraModelo->obtenerCarreras();
        $this->datos['Usuarios'] = $this->CarreraModelo->obtenerUsuarios();
        $this->vista('Carreras/inicio',$this->datos);
     
    }

    public function obtenerCarreras(){
        $datos= $this->CarreraModelo->obtenerCarreras();
        $this->vistaApi($datos);
    }

    public function crear(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {      
                $carreraNueva = [
                'Fecha' => trim($_POST["fecha"]),
                'Titulo' => trim($_POST["titulo"]),
                'Tiempo' => trim($_POST["tiempo"]),
                'superficie' => trim($_POST['superficie']),
                'Metros' => trim($_POST['metros']),
                'CodUser' => trim($_POST['usuarios'])
            ];
            
            $this->CarreraModelo->agregarCarrera($carreraNueva);
            redireccionar("/Carreras");

        }
    }

    public function delCarrera(){
        $cod= $_POST['cod'];
        $datos = $this->CarreraModelo->eliminarCarrera($cod);
       
        if(empty($datos)){
            $bandera = 0;
        }
            $bandera = 1;
        
        $this->vistaApi($bandera);    
        
    }
    public function editarCarrera(){
         $carreraEditada = [
            'Fecha' => trim($_POST["fecha"]),
            'Titulo' => trim($_POST["tituloo"]),
            'Tiempo' => trim($_POST["tiempoo"]),
            'superficie' => trim($_POST['superficiee']),
            'CodUser' => trim($_POST['usuarioss']),
            'Metros' => trim($_POST['metross']),
            'Cod' => trim($_POST['Cod'])
        ]; 
      
         $datos = $this->CarreraModelo->modificarCarrera($carreraEditada);
        if(empty($datos)){
            $bandera = 0;
        }
            $bandera = 1; 
        $this->vistaApi($bandera); 
        

        


    }

    public function getCarreras(){
        $datos = $this->CarreraModelo->obtenerCarreras();
        $this->vistaApi($datos);    
        
    }
}
?>