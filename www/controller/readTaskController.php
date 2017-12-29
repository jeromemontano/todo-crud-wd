<?php

Class ReadTaskController {

    function ReadOne($id){
        $ctm = new CrudTaskModel();

        $result = $ctm->Get($id);

        if ($result == "ERROR") {
            session_start();
            $_SESSION['msg'] = "Database Error";
            return array();
        } else {
            return json_decode($result);
        }
    }

    function ReadAll(){
        $ctm = new CrudTaskModel();

        $result = $ctm->Get();

        if ($result == "ERROR") {
            session_start();
            $_SESSION['msg'] = "Database Error";
            return array();
        } else {
            return json_decode($result);
        }
    }

}


?>
