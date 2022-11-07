<?php include "db.php" ?>

<?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $query_delete = "DELETE FROM task WHERE id = '$id'";

    $result_delete = mysqli_query($conn, $query_delete);

    if(!$result_delete){
        die("no se va a poder");
    }

$_SESSION['message'] = 'Task <strong>'.$title.' </strong>Deleted successfully'; 
$_SESSION['color-class'] = 'uk-alert-danger'; 

 header("location:index.php");
}
?>