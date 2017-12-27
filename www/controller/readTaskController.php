<?php

Class ReadTaskController {

    function ReadOne($id){
        $ctm = new CrudTaskModel();
        return json_decode($ctm->Get($id));
    }

    function ReadAll(){
        $ctm = new CrudTaskModel();
        return json_decode($ctm->Get());
    }

}


?>
