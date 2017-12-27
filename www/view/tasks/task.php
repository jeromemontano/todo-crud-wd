<?php
    include ("../../controller/readTaskController.php");
    include("../../model/crudTaskModel.php");

    if (isset($_GET['task_id'])) {

        $rtc = new ReadTaskController();
        $task = $rtc->ReadOne($_GET['task_id']);
        $key = key($task);

    } else {

        echo "poropor";
        exit;

    }
?>
<!doctype html>
<html lang="en">
    <?php include("../../view/partials/header.php"); ?>
    <body>
        <div class="container">
            <div class="row">
                <?php include("../../view/partials/topbanner.php"); ?>
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>View Task</h4>
                        </div>
                        <div class="col-md-6 right col-sm-6 col-xs-6">
                            <a class="btn btn-default" href="/view/tasks/update.php?task_id=<?php echo $key ?>">Update</a>
                            <a class="btn btn-default" href="/view/tasks/delete.php?task_id=<?php echo $key ?>">Delete</a>
                            <a class="btn btn-default" href="/view/tasks/">Back to List</a>
                        </div>
                    </div>
                    <div class="well">
                        <p><b>Task Name:</b> <?php echo $task->$key ?> </p>
                    </div>
                </div>
            </div>
        </div>
    <?php include("../../view/partials/bottom.php"); ?>
    </body>
</html>
