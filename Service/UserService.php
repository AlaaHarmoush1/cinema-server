<?php 

class UserService {

    public static function categoryToArray($user_db){
        $results = [];

        foreach($user_db as $u){
             $results[] = $u->toArray(); //hence, we decided to iterate again on the articles array and now to store the result of the toArray() which is an array. 
        } 

        return $results;
    }



}