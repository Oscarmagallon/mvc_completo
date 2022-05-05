
<?php 
require_once RUTA_APP.'/vistas/inc/header.php';
json_encode($datos); 

?>

<html>
<div>
</nav>
    <div class="container-fluid px-2">

                <ul class="navbar-nav">
                    <li>
                    <br> <br><br> <br> <br>
                        <button class="btn btn-primary" id="btnModal">Crear Temporada</button></a>
                    </li>
                </ul>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title">Añadir Entrenamiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Entrenamientos/crear" method="POST">
          <label for="fecha">Fecha</label> <br>
          <input type="date" name="fecha" value="" id="fecha">
          <label for="vueltas">vueltas</label>
          <input type="number" value ="" name="vueltas"> 
          <label for="Titulo">Titulo</label>
          <input type="text" name="titulo" id="titulo">
          <label for="tiempo">Tiempo</label>
          <input type="time" id="tiempo" name="tiempo">
          <p>Superficie</p>
            <?php foreach ($datos['Superficie'] as $s): ?>
                <label for="<?php echo $s->Tipo ?>"><?php echo $s->Tipo ?></label>

                <input type="radio" id="<?php echo $s->Tipo ?>" name ="superficie" value="<?php echo $s->Cod ?>">
            <?php endforeach ?>
            <br>
          <label for="Metros">Metros </label>
          <input type="number" value ="" name="metros"> <br>
          
          <label for="Tipo">Tipo Entrenamiento</label>
          <select name="Tipo" id="Tipo">
              <?php 
                foreach ($datos["Tipo_entreno"] as $u):
              ?>
              <option value="<?php echo $u->Cod ?>"><?php echo $u->Tipo_entrenamiento ?></option>
                <?php endforeach; ?>
          </select>
          &nbsp;  &nbsp;  &nbsp;  &nbsp;
          <label for="usuarios">Atleta</label>
          <select name="usuarios" id="usuarios">
              <?php 
                foreach ($datos["Usuarios"] as $u):
              ?>
              <option value="<?php echo $u->idUsuario ?>"><?php echo $u->Nombre ?></option>
                <?php endforeach; ?>
          </select>
          <br>
          <label for="entrenador">Entrenador</label>
          <select name="entrenador" id="entrenador">
              <?php 
                foreach ($datos["Entrenadores"] as $u):
              ?>
              <option value="<?php echo $u->idUsuario ?>"><?php echo $u->Nombre ?></option>
                <?php endforeach; ?>
          </select>
        
      </div>
      <div class="modal-footer">
        
      <button type="submit" class="button">Agregar</button>
        <button type="button" class="btn btn-secondary" form="crearCarreras"data-bs-dismiss="modal">Cerrar</button>      
      </div>
    </div>
</form>
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
   function pintarTabla(){
    var datos = <?php echo json_encode($datos);?>;
   console.log(datos["Entrenamientos"][0]['Titulo']);
   var tabla = document.getElementById("tabla");
   tabla.innerHTML = "";
   let thead = document.createElement("thead");
   let th = document.createElement("th");
   let th1 = document.createElement("th");
   let th2 = document.createElement("th");
   let th3 = document.createElement("th");
   let th4 = document.createElement("th");
   let th5 = document.createElement("th");
   let th6 = document.createElement("th");
   let th7 = document.createElement("th");
   th.appendChild(document.createTextNode("Nombre"));
   th1.appendChild(document.createTextNode("Vuelta"));
   th2.appendChild(document.createTextNode("Metros"));
   th3.appendChild(document.createTextNode("Tiempo"));
   th4.appendChild(document.createTextNode("Ritmo"));
   th5.appendChild(document.createTextNode("Superficie"));
   th6.appendChild(document.createTextNode("Tipo Entrenamientos"));
   th7.appendChild(document.createTextNode("Acciones"));

   thead.appendChild(th);
   thead.appendChild(th1);
   thead.appendChild(th2);
   thead.appendChild(th3);
   thead.appendChild(th4);
   thead.appendChild(th5);
   thead.appendChild(th6);
   thead.appendChild(th7);

   
   tabla.appendChild(thead);
   let tbody = document.createElement("tbody");
  
    for (let i = 0; i <= datos["Entrenamientos"].length; i++) {
      
      let tr = document.createElement("tr");
      let td = document.createElement("td");
      let td1 = document.createElement("td");
      let td2 = document.createElement("td");
      let td3 = document.createElement("td");
      let td4 = document.createElement("td");
      let td5 = document.createElement("td");
      let td6 = document.createElement("td");
      let td7 = document.createElement("td");
      let button = document.createElement("button");

      td.appendChild(document.createTextNode(datos["Entrenamientos"][i]['Titulo']));
      td1.appendChild(document.createTextNode(datos["Entrenamientos"][i]['Vuelta']));
      td2.appendChild(document.createTextNode(datos["Entrenamientos"][i]['Metros']));
      td3.appendChild(document.createTextNode(datos["Entrenamientos"][i]['Tiempo']));
      td4.appendChild(document.createTextNode("Ritmo"));
      td5.appendChild(document.createTextNode(datos["Entrenamientos"][i]['Tipo']));
      td6.appendChild(document.createTextNode(datos["Entrenamientos"][i]['Tipo_entrenamiento']));
      button.appendChild(document.createTextNode("X"));
      button.addEventListener("click", function(){
           resultado = confirm('¿Realmente desea eliminar?');
           if(resultado){
            window.location.href = "/mvc_completo/Entrenamientos/borrar/"+datos["Entrenamientos"][i]['Cod'];
           }

});
      //a.href="<?//php echo RUTA_URL?>/Entrenamientos/borrar/"+datos["Entrenamientos"][i]['Cod'];
      
      td7.appendChild(button);
      tr.appendChild(td);
      tr.appendChild(td1);
      tr.appendChild(td2);
      tr.appendChild(td3);
      tr.appendChild(td4);
      tr.appendChild(td5);
      tr.appendChild(td6);
      tr.appendChild(td7);
      tbody.appendChild(tr);
      tabla.appendChild(tbody);


   }
   }

   window.onload = pintarTabla(); 
      
    
    
  
    </script>

    
   
<?php
require_once RUTA_APP.'/vistas/inc/footer.php';
?>

