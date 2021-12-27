<?php

    function castMembers($user_id, $contact_id){
        $arrayMembers = array();

        $arrayMembers[] = $user_id;
        $arrayMembers[] = $contact_id;

        return $arrayMembers;
    }
?>