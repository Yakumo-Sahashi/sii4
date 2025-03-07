<?php
    use config\Router;
    use config\Token;
    require_once realpath('./vendor/autoload.php');
?>
 <div>
     <h1 class="fs-4 fw-bold text-primary">Listado de numeros de control</h1>
     <nav>
         <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="<?= Router::redirigir('') ?>"><i class="fa-solid fa-caret-left"></i>Inicio</a></li>
             <li class="breadcrumb-item active"><a href="<?= Router::redirigir($_GET['view']) ?>">Listado de numeros de control</a></li>
         </ol>
     </nav>
 </div>
 <div class="container p-4 my-5">
     <div class="row justify-content-around">
         <div class="col-lg-4 col-md-4 col-sm-4">
             <div class="form-floating">
                 <select class="form-select" id="select_estado" name="select_estado">
                     <option value="" selected>Seleccionar</option>
                     <option value="disponible">Disponible</option>
                     <option value="asignado">Asignado</option>
                 </select>
                 <label for="select_estado" class="text-primary"><i class="fa-regular fa-circle-check me-2"></i> Estado</label>
             </div>
         </div>
     </div>
     <div class="row justify-content-around mt-5">
         <div class="col">
             <div class="table-responsive">
                 <table class="table table-md table-hover table-responsive-lg mt-3 text-center" id="table_created_rooms">
                     <thead>
                         <tr class="text-center">
                             <th>Numero de control</th>
                             <th>Estado</th>
                             <th>Fecha creacion</th>
                             <th>Autorizacion</th>
                         </tr>
                     </thead>
                     <tbody id="tabla_listado_num_ctrl" class="text-center">
                    </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
 <script src="<?=CONTROLLER?>se/listado_num_ctrl.controller.js"></script>