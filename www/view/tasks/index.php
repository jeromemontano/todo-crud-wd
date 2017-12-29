<?php
    session_start();
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

                <div class="col-md-12">
                    <?php
                    if (isset($_SESSION['msg'])) {
                    ?>
                        <div class="alert alert-success" role="alert"><?php echo $_SESSION['msg']; ?></div>
                    <?php
                        unset($_SESSION['msg']);
                    }
                    ?>
                </div>

                <div class="col-md-8 col-md-offset-2">

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>List of Tasks</h4>
                        </div>
                        <div class="col-md-6 right col-sm-6 col-xs-6">
                            <a class="btn btn-default" href="/view/tasks/add.php">Add</a>
                            <a class="btn btn-default btn-delete" data-elem="all" href="/view/tasks/delete.php?all=true">Delete All</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="TasksTable" class="display" cellspacing="0" width="100%">
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
                                        <p class="table-data"><?php echo $task ?></p>
                                    </td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="/view/tasks/task.php?task_id=<?php echo $id ?>" >View</a>
                                            <a class="btn btn-primary" href="/view/tasks/update.php?task_id=<?php echo $id ?>" >Update</a>
                                            <a class="btn btn-primary btn-delete" data-elem="one" href="/view/tasks/delete.php?task_id=<?php echo $id ?>" >Delete</a>
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
    <script type="text/javascript" src="../../public/js/delete-confirm.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#TasksTable').DataTable( {
            columnDefs: [
                { orderable: false, targets: -1 }
            ],
        });
    });
    </script>
    </body>
</html>
