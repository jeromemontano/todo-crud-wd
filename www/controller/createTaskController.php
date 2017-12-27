<?php

Class CreateTaskController {

    function Add($task) {
        $data = array(
            'task_name' => $task
        );

        $ctm = new CrudTaskModel();
        $ctm->Post($data);
        header( 'Location: /view/tasks/' );
    }

}

?>
