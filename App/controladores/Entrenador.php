<?php
class Entrenador extends Controlador{

    public function __construct(){
        Sesion::iniciarSesion($this->datos);
        $this->datos['rolesPermitidos'] = [20];

       if (!tienePrivilegios($this->datos['usuarioSesion']->Rol_Cod,$this->datos['rolesPermitidos'])) {
            Sesion::cerrarSesion();
           redireccionar('/login');
        }


        //$this->AdminModelo = $this->modelo('AdminModelo');
        
    }


    public function index(){

        $this->vista('inicios/entrenador',$this->datos);
     
    }
}
?>