<?php require_once RUTA_APP.'/vistas/inc/header.php' ?>

<?php
    if (isset($datos['usuario']->id_usuario)){
        $accion = "Modificar";
    } else {
        $accion = "Agregar";
    }
?>

<a href=".." class="btn btn-light"><i class="bi bi-chevron-double-left"></i>Volver</a>

<div class="card bg-light mt-5 w-75 card-center" style=" margin: auto;">
    <h2 class="card-header"><?php echo $accion ?> Usuario</h2>

    <form method="post" class="card-body">
        <div class="mt-3 mb-3">
            <label for="nombre_username">Nombre: <sup>*</sup></label>
            <input type="text" name="user_username" id="nombre" class="form-control form-control-lg" value="<?php echo $datos['usuario']->user_username ?>">
        </div>
        <div class="mb-3">
            <label for="email">Email: <sup>*</sup></label>
            <input type="email" name="email" id="email" class="form-control form-control-lg" value="<?php echo $datos['usuario']->user_email ?>">
        </div>
        <div class="mb-3">
            <label for="user_pass">Contraseña: <sup>*</sup></label>
            <input type="text" name="user_pass" id="user_pass" class="form-control form-control-lg" value="<?php echo $datos['usuario']->user_pass ?>">
        </div>
        <div class="mb-3">
            <label for="nombre">Nombre: <sup>*</sup></label>
            <input type="text" name="nombre" id="nombre" class="form-control form-control-lg" value="<?php echo $datos['usuario']->user_nombre ?>">
        </div>
        <div class="mb-3">
            <label for="apellido">Apellido1: <sup>*</sup></label>
            <input type="text" name="apellido" id="apellido" class="form-control form-control-lg" value="<?php echo $datos['usuario']->user_apll1 ?>">
        </div>
        <div class="mb-3">
            <label for="apellido2">Apellido2: <sup>*</sup></label>
            <input type="text" name="apellido2" id="apellido2" class="form-control form-control-lg" value="<?php echo $datos['usuario']->user_apell2 ?>">
        </div>
        <div class="mb-3">
            <label for="user_nif">NIF: <sup>*</sup></label>
            <input type="text" name="user_nif" id="user_nif" class="form-control form-control-lg" value="<?php echo $datos['usuario']->user_nif ?>">
        </div>
        <div class="mb-3">
            <label for="user_fnac">Fecha Nacimiento: <sup>*</sup></label>
            <input type="date" name="user_fnac" id="user_fnac" class="form-control form-control-lg" value="<?php echo $datos['usuario']->user_fnac ?>">
        </div>
        <div class="mb-3">
            <label for="user_rol">Rol: <sup>*</sup></label>
            <select name="rol" id="user_rol" class="form-select form-select-lg">
                <?php foreach($datos['listaRoles'] as $user_rol): ?>
                    <?php if ($rol->id_rol == $datos['usuario']->id_rol):?>
                        <option value="<?php echo $rol->id_rol?>" selected><?php echo $rol->rol?></option>
                    <?php else: ?>
                        <option value="<?php echo $rol->id_rol?>"><?php echo $rol->rol?></option>
                    <?php endif ?>
                <?php endforeach ?>
            </select>
        </div>
        <input type="submit" class="btn btn-success" value="<?php echo $accion ?> Usuario">
    </form>
    
</div>

<?php require_once RUTA_APP.'/vistas/inc/footer.php'?>
