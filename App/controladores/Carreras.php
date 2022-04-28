<?php
class Carreras extends Controlador{

    public function __construct(){
        Sesion::iniciarSesion($this->datos);
        $this->datos['rolesPermitidos'] = [10];

       if (!tienePrivilegios($this->datos['usuarioSesion']->Rol_Cod,$this->datos['rolesPermitidos'])) {
            Sesion::cerrarSesion();
           redireccionar('/login');
        }


        $this->CarreraModelo = $this->modelo('CarreraModelo');
        
    }


    public function index(){
        echo "hola";
        $this->datos['Carreras'] = $this->CarreraModelo->obtenerCarreras();
        $this->vista('Carreras/inicio',$this->datos);
     
    }

    public function obtenerCarreras(){
        $datos = "hola";
        $this->vistaApi($this->datos);
    }

    public function crear(){
            echo "dentro crear";
    }
}
?>