<?php
class Entrenamientos extends Controlador{

    public function __construct(){
        Sesion::iniciarSesion($this->datos);
        $this->datos['rolesPermitidos'] = [10];

       if (!tienePrivilegios($this->datos['usuarioSesion']->Rol_Cod,$this->datos['rolesPermitidos'])) {
            Sesion::cerrarSesion();
           redireccionar('/login');
        }


        $this->EntrenamietoModelo = $this->modelo('EntrenamientoModelo');
        
    }


    public function index(){
        $this->datos['Entrenamientos'] = $this->EntrenamietoModelo->obtenerEntrenamientos();
        $this->vista('Entrenamientos/inicio',$this->datos);
     
    }

    public function crear(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               
            echo "hola";
        } else {
           
        }
    }
}
?>