<?php include "db.php" ?>

<?php 

if(isset($_POST['save_task'])){
 $title =  $_POST['title-task'];
 $description =  $_POST['task-descript'];


 $querySQL = "INSERT INTO `task` (`id`, `title`, `description`, `created_at`) VALUES (NULL, '$title', '$description', current_timestamp());";

 $respuesta_db = mysqli_query($conn, $querySQL);

 if(!$respuesta_db){
    die ("todo mal con esta porqueria");
 }

$_SESSION['message'] = 'Task <strong>'.$title.' </strong>saved successfully'; 
$_SESSION['color-class'] = 'uk-alert-success'; 

 header("location:index.php");
}
?>