<?php 

include('db.php');

$id = $_GET['id'];


if(isset($_POST['editar'])){

    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE `tasks` SET `title`='$title',`description`='$description' WHERE `id` = $id";
    $result = mysqli_query($conn,$query);

    
    if(!$result){

        $_SESSION['message'] = 'No pudimos editar tu tarea';
        $_SESSION['type'] = 'danger';


    }else{

        $_SESSION['message'] = 'Edistaste la Tarea correctamente';
        $_SESSION['type'] = 'success'; 
    }

    header('Location:index.php');

}else{

$query = "SELECT * FROM `tasks` WHERE `id` = $id";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) == 1 ){

    $dato = mysqli_fetch_array($result);
}

}

?>

<?php include('fijos/header.php');?>

<div class="container">
    <div class="row">
        <div class="col-sm-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Editar tarea
                    </h3>
                </div>
                <div class="card-body">
                        <form action="edit.php?id=<?php echo $dato['id']; ?>" method="POST">
                            <div class="mb-3">
                                <label for="title" class="form-label">Título</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $dato['title'] ;?>" id="title" placeholder="Tarea a realizar">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Describa la Actividad"><?php echo $dato['description'] ;?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-5 mx-auto text-center">
                                <button type="submit" name="editar" class="btn btn-primary w-100">Enviar</button>

                                </div>
                            </div>

                        </form>
                        
                    </div>
            </div>
        </div>
    </div>
</div>
<?php include('fijos/footer.php');?>
