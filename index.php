<?php include('fijos/header.php');?>
    <div class="container">
        <div class="row">
         <h1 class="text-center text-primary pt-3">ToDo List</h1>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Crear una Tarea [C].</h3>
                        <?php 
                        include('db.php');
                         if(isset($_SESSION['message'])){  ?>
                            <div class="alert alert-<?php echo $_SESSION['type'];?> alert-dismissible fade show" role="alert">
                                <?php echo $_SESSION['message'];?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } 
                        session_unset()?>
                    </div>
                    <div class="card-body">
                        <form action="save.php" method="POST">
                            <div class="mb-3">
                                <label for="title" class="form-label">Título</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Tarea a realizar">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Describa la Actividad"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-5 mx-auto text-center">
                                <button type="submit" class="btn btn-primary w-100">Enviar</button>

                                </div>
                            </div>

                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Tareas por hacer. [RUD]</h3>
                    </div>
                    <div class="card-body">
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                $query = "SELECT * FROM `tasks`";
                                $result = mysqli_query($conn,$query);

                                while( $row =  mysqli_fetch_assoc($result)){  ?>

                                <tr>
                                    <th scope="row"><?php echo $row['id'] ;?></th>
                                    <td><?php echo $row['title'] ;?></td>
                                    <td><?php echo $row['description'] ;?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Editar</a>

                                        <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                            </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php include('fijos/footer.php');?>