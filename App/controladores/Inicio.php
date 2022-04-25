<?php

    class Inicio extends Controlador{

        public function __construct(){

        }

        public function index(){
            if (Sesion::sesionCreada($this->datos)){

                switch ($this->datos['usuarioSesion']->Rol_Cod) {
                    case 10:
                        redireccionar('/Admin');
                        break;
                    case 20:
                        redireccionar('/entrenador');
                        break;
                    case 30:
                        redireccionar('/Atleta');
                        break;  
            }} else {
                redireccionar('/login');
            }
    
}
    }

