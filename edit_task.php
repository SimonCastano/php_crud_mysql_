<?php
include "db.php";



if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $query_edit = "SELECT * FROM task WHERE id = '$id'";

    $result = mysqli_query($conn, $query_edit);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_array($result);
        $title = $data['title'];
        $description = $data['description'];
    }
}


if(isset($_POST['update_task'])){
   $id = $_GET['id'];
   $title = $_POST['title-task'];
   $description = $_POST['task-description'];
   
   $query = "UPDATE task set title = '$title', description = '$description' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task '.$title.' Updated Successfully';
  $_SESSION['color-class'] = 'uk-alert-warning'; 
  header('Location: index.php');
}

?>

<?php include "includes/header.php" ?>

<main>
    <div class="task-container uk-flex uk-flex-center uk-padding-small uk-flex-column">
        <div>
            <div class="uk-card  uk-card-body">

                <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <fieldset class="uk-fieldset">

                        <legend class="uk-legend">Edit <?php echo $title ?> task</legend>

                        <div class="uk-margin">
                            <input value="<?php echo $title ?>" class="uk-input" name="title-task" type="text" placeholder="Title task" aria-label="Input">
                        </div>
                        <div class="uk-margin">
                            <textarea class="uk-textarea" name="task-description" rows="5" placeholder="Task description" aria-label="Textarea"><?php echo $description ?></textarea>
                        </div>
                        <button name="update_task" type="submit" class="uk-button uk-button-secondary">Actualizar</button>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>
</main>
<?php include "includes/footer.php" ?>