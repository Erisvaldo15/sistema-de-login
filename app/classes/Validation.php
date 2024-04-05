<?php

namespace app\classes;

use app\classes\PersistedData;

class Validation {

    public static function sanitize(array $data) {

        $filteredFields = [];

        foreach($data as $field => $value) {

            if(array_key_exists('email', $data)) {
                $filteredFields[$field] = filter_var($_POST[$field], FILTER_SANITIZE_EMAIL);
            } 
            
            if($field !== 'created_at') {
                $filteredFields[$field] = filter_var($_POST[$field], FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
       
        return $filteredFields += [
            "created_at" => date("Y-m-d H:i:s"),
        ];
    }

    public static function validate(array|object $data): array {

        $validatedFields = [];

        foreach ($data as $field => $type) {
        
            switch ($type) {

                case 'e':

                    if(empty($_POST[$field])) {
                        Message::set($field, "Empty {$field} field");
                    } 
                    
                    else if(!filter_var($_POST[$field],FILTER_VALIDATE_EMAIL)) {
                        Message::set('email', 'Email invalid');
                        PersistedData::set($field, $_POST[$field]);
                    }

                    else {
                        $validatedFields[$field] = $_POST[$field]; 
                        PersistedData::set($field, $_POST[$field]);
                    }

                    break;
                
                case 't': 

                    if(empty($_POST[$field])) {
                        Message::set($field, "Empty {$field} field");
                    } else {
                        $validatedFields[$field] = $_POST[$field]; 
                        PersistedData::set($field, $_POST[$field]);
                    }

                    break;

               case 'p': 

                    if(empty($_POST[$field])) {
                        Message::set($field, "Empty {$field} field");
                    } 
                    
                    elseif(strlen($_POST[$field]) < 6) {
                        Message::set($field, "Minimum 6 characters for {$field} field");
                        PersistedData::set($field, $_POST[$field]);
                    }
                    
                    else {
                        $validatedFields[$field] = $_POST[$field]; 
                        PersistedData::set($field, $_POST[$field]);
                    }

                break;

                case 'cp': 

                    if(empty($_POST[$field])) {
                        Message::set($field, "Empty {$field} field");
                    } 
                    
                    else {
                        $validatedFields[$field] = $_POST[$field];
                        PersistedData::set($field, $_POST[$field]); 
                    }

                break;
            }

        }

        return $validatedFields;
    }

}