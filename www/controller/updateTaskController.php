<?php

Class UpdateTaskController {

    function Update($post_params) {
        $data = array(
            'id' => $post_params['task_id'],
            'task_name' => $post_params['task_name']
        );

        $ctm = new CrudTaskModel();
        $ctm->Put($data);

        header( 'Location: /view/tasks/' );

    }

}

?>
