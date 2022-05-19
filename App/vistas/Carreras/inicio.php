<?php 
require_once RUTA_APP.'/vistas/inc/header.php';
json_encode($datos); 
?>

<html>
<div>
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
         <h5 class="modal-title">Añadir Carrera</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="Carreras/crear" method="POST">
          <label for="fecha">Fecha</label>
          <input type="date"name="fecha" id="fechaedit">
          <label for="Titulo">Titulo</label>
          <input type="text" name="titulo" id="tituloedit">
          <p>Superficie</p>
            <input type="radio" id="Cross" name ="superficie" value="1">
            <label for="Cross">Cross</label>
            <input type="radio" id="Tierra" name ="superficie" value="2">
            <label for="Tierra">Tierra</label>
            <input type="radio" id="Pista" name ="superficie"  value="3">
            <label for="Pista">Pista</label> <br>
          <input type="number" value ="" name="metros"> &nbsp;
          <input type="time" id="tiempo" name="tiempo">
          <select name="usuarios" id="usuarios">
              <?php 
                foreach ($datos["Usuarios"] as $u):
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

<div>
    <div class="container-fluid px-2">

          
    </div>
    <div class="modal fade" id="modalAdd" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEditUsuarioLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title">Editar Carrera</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" id="formEditCarrera" class="card-body" action="javascript:editCarrera()">
        <input type="hidden" id="Cod" name = "Cod"> 
          <label for="fecha">Fecha</label>
          <input type="text" name="fecha" id="fechaa">
          <label for="Titulo">Titulo</label>
          <input type="text" name="tituloo"  id="tituloo">
          <p>Superficie</p>
            <input type="radio" id="Cross" name ="superficiee" value="1">
            <label for="Cross">Cross</label>
            <input type="radio" id="Tierra" name ="superficiee" value="2">
            <label for="Tierra">Tierra</label>
            <input type="radio" id="Pista" name ="superficiee"  value="3">
            <label for="Pista">Pista</label> <br>
          <input type="number" value ="" name="metross" id = "metross">  &nbsp;
          <input type="time" id="tiempo" name="tiempoo">
          <select name="usuarioss" id="usuarios">
              <?php 
                foreach ($datos["Usuarios"] as $u):
              ?>
              <option value="<?php echo $u->idUsuario ?>"><?php echo $u->Nombre ?></option>
                <?php endforeach; ?>
          </select>


        
      </div>
      </form>
      <div class="modal-footer">
        
       <button type="submit" form="formEditCarrera" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>      
      </div>
    </div>

  </div>
</div>
<?php
  print_r($datos);
?>
 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  Filtrar por superficie</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li class="dropdown-item" onclick="filtrarSuperficie(1)">Cross</li>
                <li><a class="dropdown-item"  onclick="filtrarSuperficie(2)">Tierra</a></li>
                <li><a class="dropdown-item"  onclick="filtrarSuperficie(3)">Pista</a></li>
              </ul>

    <div class="table-responsive" id="divTabla">
        <table class="table table-hover" id="tabla">

       >
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
    function filtrarSuperficie(tipo){
    let newArrayEntrenos= [];
    let newArrayEntrenoss= [];
    let datoss = '<?php echo json_encode($datos); ?>';
        let datos = JSON.parse(datoss);
         for (let i = 0; i < datos['Carreras'].length; i++) {
                if( datos['Carreras'][i]['Superficie_Cod'] == tipo){
                  newArrayEntrenos[i] =  datos['Carreras'][i];
               }
         }
         newArrayEntrenoss = cleanArray(newArrayEntrenos);
         
         pintarTablaModi(newArrayEntrenoss);
    }

    function cleanArray(actual){
  var newArray = new Array();
  for( var i = 0, j = actual.length; i < j; i++ ){
      if ( actual[ i ] ){
        newArray.push( actual[ i ] );
    }
  }
  return newArray;
}
   function pintarTablaModi(data){
     console.log(data);
    var tabla = document.getElementById("tabla");
    tabla.innerHTML = "";
    let titulo = document.getElementById("tituloo");
    let tiempo = document.getElementById("tiempo");
    let user = document.getElementById("usuarios");
    let fecha = document.getElementById("fechaa");
    let cod = document.getElementById("Cod");
    let metros = document.getElementById("metross")

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
    
      for (let i = 0; i <= data.length; i++) {
        
        let tr = document.createElement("tr");
        let td = document.createElement("td");
        let td1 = document.createElement("td");
        let td2 = document.createElement("td");
        let td3 = document.createElement("td");
        let td4 = document.createElement("td");
        let td5 = document.createElement("td");
        let button = document.createElement("button");
        let a = document.createElement("button");

        td.appendChild(document.createTextNode(data[i]['Titulo']));
        td1.appendChild(document.createTextNode(data[i]['Metros']));
        td2.appendChild(document.createTextNode(data[i]['Tiempo']));
        td3.appendChild(document.createTextNode("Ritmo"));
        td4.appendChild(document.createTextNode(data[i]['Tipo']));
        a.appendChild(document.createTextNode("Edit"));
        a.addEventListener("click", function(){
          titulo.setAttribute("value", data[i]['Titulo']);
          tiempo.setAttribute("value",data[i]['Tiempo']);
          fecha.setAttribute("value",data[i]['Fecha']);
          Cod.setAttribute("value",data[i]['Cod']);
          metros.setAttribute("value",data[i]['Metros'])
          


        });
        a.setAttribute("data-bs-toggle", "modal");
        a.setAttribute("data-bs-target", "#modalAdd");
        a.className += "btn btn-success float-end";
        button.appendChild(document.createTextNode("X"));
        button.addEventListener("click", function(){
            resultado = confirm('¿Realmente desea eliminar:'+data[i]['Cod']+'? hola');
            if(resultado){
              delEntrenamiento(data[i]['Cod'])
            }
        });
        td5.appendChild(a);
        td5.appendChild(button);  
        tr.appendChild(td);
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tr.appendChild(td5);
        tbody.appendChild(tr);
        tabla.appendChild(tbody);

      
      }


   }

   function editCarrera(){
      //cogemos lo datos del formulario
      const data = new FormData(document.getElementById("formEditCarrera"));
      fetch('<?php echo RUTA_URL?>/carreras/editarCarrera', {
          method: "POST",
          body: data,
      })
          .then((resp) => resp.json())
          .then((data) => {
              if (Boolean(data)){
                  this.getCarreras()                        
                  
              } else {
                console.log('error al borrar el registro')
              }
          })
          .catch(function(error) {
            console.log(error)
          })
  }

  function delEntrenamiento(cod){
      // console.log(cod)
      // cogemos lo datos del formulario
      const data = new FormData()
      data.append('cod', cod)
 
// console.log(data)
      fetch('<?php echo RUTA_URL?>/carreras/delCarrera', {
          method: "POST",
          body: data,
      })
          .then((resp) => resp.json())
          .then((data) => {
              if (Boolean(data)){
                  this.getCarreras()                              // la pagina 0 es la primera
                  
              } else {
                console.log('error al borrar el registro')
              }
          })
          .catch(function(error) {
            console.log(error)
          })
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
        //console.log(data);
        pintarTablaModi(data);
      })
   }

   var datos = <?php echo json_encode($datos["Carreras"]);?>;

   window.onload = pintarTablaModi(datos); 


    </script>

    
   
<?php
require_once RUTA_APP.'/vistas/inc/footer.php';
?>

