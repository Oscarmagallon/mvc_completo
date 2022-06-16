<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>

<a href=".." class="btn btn-light"><i class="bi bi-chevron-double-left"></i>Volver</a>

<div class="card bg-light mt-5 w-75 card-center" style=" margin: auto;">
    <h2 class="card-header">Borrar Usuario</h2>

    <form method="post" class="card-body">
        <div class="mt-3 mb-3">
            <label for="nombre">Nombre: <sup>*</sup></label>
            <input type="text" name="nombreusu" id="nombre" class="form-control form-control-lg" value="<?php echo $datos['usuario']->user_username ?>">
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
    </form>

</div>

<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>