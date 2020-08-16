<?php
class UserModel {
    public static function loginCheckUsernamePass ($username,$pass){
        $db=Db::reader();
        $pass=md5($pass);
	    $sql="select * from users where (email='$username' or username='$username') and password='$pass'";
        $result = $db->selectFirstQuery($sql);
        return $result;
    }

    public static function registerCheckEmail ($email){
        $db=Db::reader();
        $result=$db->selectQuery("select * from users where email='$email'");
        return $result;
    }

	public static function registerCheckUsername ($username){
		$db=Db::reader();
		$result=$db->selectQuery("select * from users where username='$username'");
		return $result;
	}

    public static function registerNewUser ($username,$pass,$firstname,$lastname,$mobile,$email){
        $db=Db::reader();
        $pass=md5($pass);
        $result=$db->insertQuery("insert into users (username, password, firstname, lastname, phone_number, email) values ('$username','$pass','$firstname','$lastname','$mobile','$email')");
        return $result;
    }
}