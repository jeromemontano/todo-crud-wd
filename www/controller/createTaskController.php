<?php

Class CreateTaskController {

    function Add($task) {
        $data = array(
            'task_name' => $task
        );

        $ctm = new CrudTaskModel();
        $result = $ctm->Post($data);

        session_start();
        if ($result == "ERROR") {
            $_SESSION['msg'] = "Database Error";
        } else {
            $_SESSION['msg'] = "New Task Added";
        }

        header( 'Location: /view/tasks/' );
    }

}

?>
