<?php 
require_once RUTA_APP.'/vistas/inc/header.php';


print_r($datos["Carreras"]);
json_encode($datos); 
?>
<br><br><br>
<html>
<div>
</nav>
    <div class="container-fluid px-2">
                <ul class="navbar-nav">
                    <li>
                        <button class="btn btn-primary" id="btnModal">Crear Temporada</button></a>
                    </li>
                </ul>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title">Añadir Carrera</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Carreras/crear" method="POST">
          <label for="fecha">Fecha</label>
          <input type="date" id="fecha">
          <button type="submit" class="button"><?php echo RUTA_URL ?></button>

        </form>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Agregar</button>
        <button type="button" class="btn btn-secondary" form="crearCarreras"data-bs-dismiss="modal">Cerrar</button>      </div>
    </div>
  </div>
</div>
    <div class="table-responsive" id="divTabla">
        <table class="table table-hover" id="tabla">

            
    </html>
    <script>
     

      if(document.getElementById("btnModal")){
			var modal = document.getElementById("myModal");
			var btn = document.getElementById("btnModal");
			var span = document.getElementsByClassName("close")[0];
			var body = document.getElementsByTagName("body")[0];

			btn.onclick = function() {
				modal.style.display = "block";

				body.style.position = "static";
				body.style.height = "100%";
				body.style.overflow = "hidden";
			}

			span.onclick = function() {
				modal.style.display = "none";

				body.style.position = "inherit";
				body.style.height = "auto";
				body.style.overflow = "visible";
			}

			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";

					body.style.position = "inherit";
					body.style.height = "auto";
					body.style.overflow = "visible";
				}
			}
		}
    
   function getCarreras(){
    fetch(`<?php echo RUTA_URL?>/Carreras/obtenerCarreras`, {
      headers: {
          "Content-Type": "application/json"
      },
      credentials: 'include'
    })
      .then((resp) => resp.json())
      .then((data) => {
        console.log(data)
        //carreras = data;
      })
   }
   var datos = <?php echo json_encode($datos);?>;
   var tabla = document.getElementById("tabla");
   tabla.innerHTML = "";
   let thead = document.createElement("thead");
   let th = document.createElement("th");
   let th1 = document.createElement("th");
   let th2 = document.createElement("th");
   let th3 = document.createElement("th");
   let th4 = document.createElement("th");
   let th5 = document.createElement("th");
   th.appendChild(document.createTextNode("Nombre"));
   th1.appendChild(document.createTextNode("Metros"));
   th2.appendChild(document.createTextNode("Tiempo"));
   th3.appendChild(document.createTextNode("Ritmo"));
   th4.appendChild(document.createTextNode("Superficie"));
   th5.appendChild(document.createTextNode("Acciones"));

   thead.appendChild(th);
   thead.appendChild(th1);
   thead.appendChild(th2);
   thead.appendChild(th3);
   thead.appendChild(th4);
   thead.appendChild(th5);
   
   tabla.appendChild(thead);
   let tbody = document.createElement("tbody");
   datos["Carreras"].forEach((value) => {
          console.log(value=>titulo);
    });
   console.log(datos["Carreras"][0]["Titulo"])
    </script>

    
   
<?php
require_once RUTA_APP.'/vistas/inc/footer.php';
?>

