<?php

    function validateFormFields($fields){
        $errors = array();
        //validamos si existen campos vacios
        foreach ($fields as $field => $value) {
            if(empty($value)){
                $errors[$field] = 'Este campo es obligatorio';
            }
        }
        //validar el usuario
        if(strlen($fields['username']) < 8 && !preg_match('/[A-Z]/', $fields['username']) 
            && !preg_match('/[a-z]/', $fields['username']) && !preg_match('/[0-9]/', $fields['username'])){
            $errors['username'] = 'El campo ' . $fields['username'] . ' debe tener al menos 8 caracteres, 1 letra mayuscula y minuscula y 1 numero';
        }
        //validar la contraseña
        if(strlen($fields['password']) < 8 && !preg_match('/[A-Z]/', $fields['password'])){
            $errors['password'] = 'La contraseña debe tener al menos 8 caracteres y tener 1 letra mayuscula';
        }

        return $errors;
    }
?>