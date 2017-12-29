<?php

Class UpdateTaskController {

    function Update($post_params) {
        $data = array(
            'id' => $post_params['task_id'],
            'task_name' => $post_params['task_name']
        );

        $ctm = new CrudTaskModel();
        $result = $ctm->Put($data);

        session_start();
        if ($result == "ERROR") {
            $_SESSION['msg'] = "Database Error";
        } else {
            $_SESSION['msg'] = "Selected Task Updated";
        }

        header( 'Location: /view/tasks/' );

    }

}

?>
