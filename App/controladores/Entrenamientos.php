<?php
class Entrenamientos extends Controlador{

    public function __construct(){
        Sesion::iniciarSesion($this->datos);
        $this->datos['rolesPermitidos'] = [10];

       if (!tienePrivilegios($this->datos['usuarioSesion']->Rol_Cod,$this->datos['rolesPermitidos'])) {
            Sesion::cerrarSesion();
           redireccionar('/login');
        }


        $this->EntrenamientoModelo = $this->modelo('EntrenamientoModelo');
        
    }


    public function index(){
        $this->datos['Entrenamientos'] = $this->EntrenamientoModelo->obtenerEntrenamientos();
        $this->datos['Usuarios'] = $this->EntrenamientoModelo->obtenerUsuarios();
        $this->datos['Entrenadores'] = $this->EntrenamientoModelo->obtenerEntrenadores();
        $this->datos['Tipo_entreno'] = $this->EntrenamientoModelo->obtenerTipos();
        $this->datos['Superficie'] = $this->EntrenamientoModelo->obtenerSuperficies();

        $this->vista('Entrenamientos/inicio',$this->datos);
     
    }

    public function editEntrenamiento(){
        $usuarioEdit = [
            'Fecha' => trim($_POST["fecha"]),
            'Vueltas' => trim($_POST["vueltas"]),
            'Titulo' => trim($_POST["titulo"]),
            'Tiempo' => trim($_POST["tiempo"]),
            'superficie' => trim($_POST['superficie']),
            'Metros' => trim($_POST['metros']),
            'Tipo' => trim($_POST["Tipo"]),
            'CodUser' => trim($_POST['usuarios']),
            'CodEntre' => trim($_POST['entrenador']),
            'Cod' => trim($_POST['Cod'])

        ];
        $bandera = 1;
        $this->EntrenamientoModelo->editarEntrenamientos($usuarioEdit);
        $this->vistaApi($usuarioEdit); 
        
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
            $this->EntrenamientoModelo->agregarEntrenamientos($usuarioNuevo); 
            redireccionar("/Entrenamientos");
    
        }
    }

    public function borrar($id){
        $this->EntrenamientoModelo->eliminar($id); 
        redireccionar("/Entrenamientos");

    }
}
?>