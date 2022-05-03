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
        $this->datos['Usuarios'] = $this->EntrenamietoModelo->obtenerUsuarios();
        $this->datos['Entrenadores'] = $this->EntrenamietoModelo->obtenerEntrenadores();
        $this->datos['Tipo_entreno'] = $this->EntrenamietoModelo->obtenerTipos();

        $this->vista('Entrenamientos/inicio',$this->datos);
     
    }

    public function crear(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {          
                 $usuarioNuevo = [
                'Fecha' => trim($_POST["fecha"]),
                'Vueltas' => trim($_POST["vueltas"]),
                'Titulo' => trim($_POST["titulo"]),
                'Tiempo' => trim($_POST["tiempo"]),
                'superficie' => trim($_POST['superficie']),
                'Metros' => trim($_POST['metros']),
                'Tipo' => trim($_POST["Tipo"]),
                'CodUser' => trim($_POST['usuarios']),
                'CodEntre' => trim($_POST['entrenador']),

            ];

         
            print_r(($usuarioNuevo));
            //redireccionar("/Carreras");
    
        }
    }
}
?>