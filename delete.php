<?php 

include('db.php');

$id = $_GET['id'];

$query = "DELETE FROM `tasks` WHERE `id` = $id";
$result = mysqli_query($conn,$query);


if(!$result){

    $_SESSION['message'] = 'No pudimos borrar tu tarea';
    $_SESSION['type'] = 'danger';


}else{

    $_SESSION['message'] = 'Borraste la tarea correctamente';
    $_SESSION['type'] = 'success'; 
}

header('Location:index.php');

?>