<?php

    function castMembers($user_id, $contact_id){
        $arrayMembers = array();

        $arrayMembers[] = $user_id;
        $arrayMembers[] = $contact_id;

        return $arrayMembers;
    }

    function findConversation($conversations, $user_id, $contact_id){
        foreach ($conversations as $conversation) {
            $membersList = explode(',', $conversation['members']);
            if($membersList[0] == $user_id && $membersList[1] == $contact_id){
                return $conversation;
            }
        }

        return [];
    }
?>