<?php

Class DeleteTaskController {

    function DeleteOne($id){
        $ctm = new CrudTaskModel();
        $result = $ctm->Delete($id);

        session_start();
        if ($result == "ERROR") {
            $_SESSION['msg'] = "Database Error";
        } else {
            $_SESSION['msg'] = "Selected Task Deleted";
        }

        header( 'Location: /view/tasks/' );
    }

    function DeleteAll() {
        $ctm = new CrudTaskModel();
        $result = $ctm->Delete();

        session_start();
        if ($result == "ERROR") {
            $_SESSION['msg'] = "Database Error";
        } else {
            $_SESSION['msg'] = "All Tasks are Deleted";
        }

        header( 'Location: /view/tasks/' );
    }

}


?>
