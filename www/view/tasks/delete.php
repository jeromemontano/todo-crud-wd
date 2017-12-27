<?php
    include ("../../controller/deleteTaskController.php");
    include("../../model/crudTaskModel.php");

    if (isset($_GET['task_id']) || isset($_GET['all'])) {

        $dtc = new DeleteTaskController();

        if (isset($_GET['task_id'])) {
            $dtc->DeleteOne($_GET['task_id']);
        } else {
            $dtc->DeleteAll();
        }

    } else {
        echo "poropor";
        exit;
    }

?>
