<?php

    function castMembers($user_id, $contact_id){
        $arrayMembers = array();

        $arrayMembers[] = $user_id;
        $arrayMembers[] = $contact_id;

        return $arrayMembers;
    }

    function findConversation($conversations, $user_id, $contact_id){//8 7
        foreach ($conversations as $conversation) {
            $membersList = explode(',', $conversation['members']);//7 8
            if(($membersList[0] == $user_id && $membersList[1] == $contact_id) || 
               ($membersList[0] == $contact_id && $membersList[1] == $user_id)){
                return $conversation;
            }
        }

        return [];
    }
?>