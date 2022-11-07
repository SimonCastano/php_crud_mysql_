<?php include "db.php" ?>
<?php include "includes/header.php" ?>


<main>
    <div class="task-container uk-flex uk-flex-center uk-padding-small uk-flex-column">


        <?php if (isset($_SESSION['message'])) { ?>

            <div class="<?= $_SESSION['color-class'] ?>" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p> <?= $_SESSION['message'] ?></p>
            </div>
        <?php session_unset();
        } ?>
        <h1>Task list</h1>

        <button class="uk-button uk-button-secondary" type="button" uk-toggle="target: #modal-close-default">Add new task <span uk-icon="icon: plus-circle"></span></button>
        <!-- This is the modal with the default close button -->
        <div id="modal-close-default" uk-modal>
            <div class="uk-modal-dialog uk-modal-body">
                <button class="uk-modal-close-default" type="button" uk-close></button>

                <form action="save_task.php" method="POST">
                    <fieldset class="uk-fieldset">

                        <legend class="uk-legend">Add new task</legend>

                        <div class="uk-margin">
                            <input class="uk-input" name="title-task" type="text" placeholder="Title task" aria-label="Input">
                        </div>
                        <div class="uk-margin">
                            <textarea class="uk-textarea" name="task-descript" rows="5" placeholder="Task description" aria-label="Textarea"></textarea>
                        </div>
                        <button name="save_task" type="submit" class="uk-button uk-button-secondary">Guardar</button>
                    </fieldset>
                </form>
            </div>
        </div>

        <h3>Saved task list </h3>






        <div class="uk-child-width-1-3@s uk-flex uk-flex-center" uk-grid>
            <div>

                <div uk-sortable="group: sortable-group">
                    <?php
                    $query_data = "SELECT * from task ORDER BY id DESC";
                    $result_task = mysqli_query($conn, $query_data);

                    while ($task = mysqli_fetch_array($result_task)) 
                    {
                    ?>
                        <div class="uk-margin">
                            <div class="uk-card uk-card-default uk-card-body uk-card-small">
                                <ul uk-accordion>
                                    <li>
                                        <a class="uk-accordion-title" href="#">
                                            <?php echo $task['title']?>
                                        </a>
                                        <div class="uk-accordion-content">
                                            <p><?php echo $task['description']?></p>
                                            <q><?php echo $task['created_at']?></q>
                                            <div>
                                                <div class="uk-button-group">
                                                    <a href="edit_task.php?id=<?php echo $task['id']; ?>" class="uk-button uk-button-primary"><span uk-icon="icon: pencil"></span></a>
                                                    <a href="delete_task.php?id=<?php echo $task['id']; ?>" class="uk-button uk-button-danger"><span uk-icon="icon: trash"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>


        </div>
    </div>

</main>

<?php include "includes/footer.php" ?>