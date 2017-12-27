<?php

Class DeleteTaskController {

    function DeleteOne($id){
        $ctm = new CrudTaskModel();
        $ctm->Delete($id);
        header( 'Location: /view/tasks/' );
    }

    function DeleteAll() {
        $ctm = new CrudTaskModel();
        $ctm->Delete();
        header( 'Location: /view/read/' );
    }

}


?>
