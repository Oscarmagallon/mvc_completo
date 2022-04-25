<?php

    class Usuario {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }


        public function obtenerUsuarios(){
            $this->db->query("SELECT * FROM Usuario_persona");

            return $this->db->registros();
        }


        public function obtenerRoles(){
            $this->db->query("SELECT * FROM Rol");

            return $this->db->registros();
        }


        public function agregarUsuario($datos){
            $this->db->query("INSERT INTO Usuario_persona (user_username, user_email, user_userpass,user_nombre,user_apell1,user_apell2,user_nif, user_rol, user_fnac) 
                                        VALUES (:user_username, :user_email, :user_userpass, :user_nombre, :user_apell1, :user_apell2, :user_nif, :user_rol, :user_fnac)");

            //vinculamos los valores
            $this->db->bind(':user_username',$datos['user_username']);
            $this->db->bind(':user_email',$datos['user_email']);
            $this->db->bind(':user_pass',$datos['user_pass']);
            $this->db->bind(':user_nombre',$datos['user_nombre']);
            $this->db->bind(':user_apell1',$datos['user_apell1']);
            $this->db->bind(':user_apell2',$datos['user_apell2']);
            $this->db->bind(':user_nif', $datos['user_nif']);
            $this->db->bind(':user_rol',$datos['user_rol']);
            $this->db->bind(':user_fnac',$datos['user_fnac']);

            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }


        public function obtenerUsuarioId($id){
            $this->db->query("SELECT * FROM Usuario_persona WHERE user_username = :user_username");
            $this->db->bind(':id',$id);

            return $this->db->registro();
        }


        public function actualizarUsuario($datos){
            $this->db->query("UPDATE Usuario_persona SET nombre=:nombre, email=:email, telefono=:telefono, id_rol=:id_rol
                                                WHERE id_usuario = :id");

            //vinculamos los valores
            $this->db->bind(':user_username',$datos['user_username']);
            $this->db->bind(':user_email',$datos['user_email']);
            $this->db->bind(':user_pass',$datos['user_pass']);
            $this->db->bind(':user_nombre',$datos['user_nombre']);
            $this->db->bind(':user_apell1',$datos['user_apell1']);
            $this->db->bind(':user_apell2',$datos['user_apell2']);
            $this->db->bind(':user_nif', $datos['user_nif']);
            $this->db->bind(':user_rol',$datos['user_rol']);
            $this->db->bind(':user_fnac',$datos['user_fnac']);

            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }


        public function borrarUsuario($id){
            $this->db->query("DELETE FROM Usuario_persona WHERE user_username = :user_username");
            $this->db->bind(':id',$id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

///////////////////////////////////////////////// Sesion //////////////////////////////////////////////

        public function obtenerSesionesUsuario($id){
            $this->db->query("SELECT * FROM sesiones 
                                        WHERE id_usuario = :id
                                        ORDER BY fecha_inicio");
            $this->db->bind(':id',$id);

            return $this->db->registros();
        }


        public function cerrarSesion($id_sesion){
            $this->db->query("UPDATE sesiones SET fecha_fin = NOW()  
                                    WHERE id_sesion = :id_sesion");

            $this->db->bind(':id_sesion',$id_sesion);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
