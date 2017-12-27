<?php
    include ("../../controller/readTaskController.php");
    include("../../model/crudTaskModel.php");

    $rtc = new ReadTaskController();
    $tasks = $rtc->ReadAll();

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
                            <h4>List of Tasks</h4>
                        </div>
                        <div class="col-md-6 right col-sm-6 col-xs-6">
                            <a class="btn btn-default" href="/view/tasks/add.php">Add</a>
                            <a class="btn btn-default" href="/view/tasks/delete.php?all=true">Delete All</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="50%" class="center">Task Name</th>
                                    <th width="50%" class="center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tasks as $id => $task) { ?>
                                <tr>
                                    <td>
                                        <p class=""><?php echo $task ?></p>
                                    </td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <a href="/view/tasks/task.php?task_id=<?php echo $id ?>" class="btn btn-primary">View</a>
                                            <a href="/view/tasks/update.php?task_id=<?php echo $id ?>" class="btn btn-primary">Update</a>
                                            <a href="/view/tasks/delete.php?task_id=<?php echo $id ?>" class="btn btn-primary">Delete</a>
                                        </div>

                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php include("../../view/partials/bottom.php"); ?>
    </body>
</html>
