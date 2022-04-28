
<html>
<?php 
require_once RUTA_APP.'/vistas/inc/header.php';
?>
<div>
</nav>
    <div class="container-fluid px-2">
                <ul class="navbar-nav">
                    <li>
                        <button class="btn btn-primary" id="btnModal">Crear Entrenamiento</button></a>
                    </li>
                </ul>
    
  </div>
</div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th> 
                    <th scope="col">Metros</th>
                    <th scope="col">Tiempo</th>
                    <th scope="col">Ritmo</th>
                    <th scope="col">Superficie</th>
                    <th scope="col">Tipo Entrenamiento</th>
                    <th scope="col">Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos['Entrenamientos'] as $e): ?>
                    <tr>
                        <td><?php echo $e->Titulo ?></td>
                        <td><?php echo $e->Metros ?></td>
                        <td><?php echo $e->Tiempo ?></td>
                        <td><?php echo "Tiempo"?></td>
                        <td><?php echo $e->Tipo?></td>
                        <td><?php echo $e->Tipo_entrenamiento?></td>


                        
                    </tr>
                <?php endforeach ?>
            </tbody>
           <?php require_once RUTA_APP.'/vistas/inc/footer.php'; ?> 
    </html>
<?php

?>