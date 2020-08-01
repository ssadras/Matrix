<?php
class UserModel {
    public static function loginCheckUsernamePass ($username,$pass){
        $db=Db_core::reader();
        $result = $db->selectFirstQuery("select * from users where (email=$username or username=$username) and password=$pass");
        return $result;
    }

    public static function registerCheckUsernameEmail ($username,$email){
        $db=Db_core::reader();
        $result=$db->selectQuery("select * from users where username=$username or email=$email");
        return $result;
    }

    public static function registerNewUser ($username,$pass,$firstname,$lastname,$mobile,$email){
        $db=Db_core::reader();
        $pass=md5($pass);
        $result=$db->insertQuery("insert into users (username, password, firstname, lastname, mobile_number, email) values ($username,$pass,$firstname,$lastname,$mobile,$email)");
        return $result;
    }
}