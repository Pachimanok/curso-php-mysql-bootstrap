<?php 

include('db.php');
/* Informacion del Usuario  */

$title = $_POST['title'];
$description = $_POST['description'];

/* Consulta a la DB o query */

$query = "INSERT INTO `tasks`(`title`, `description`) VALUES ('$title','$description')";
$result = mysqli_query($conn,$query);

if(!$result){

    $_SESSION['message'] = 'No pudimos guardar tu tarea';
    $_SESSION['type'] = 'danger';


}else{

    $_SESSION['message'] = 'Guardaste la Tarea correctamente';
    $_SESSION['type'] = 'success'; 
}

header('Location:index.php');


?>
