<?php
class UserController {
    public function login (){
        if (isset($_SESSION["user"])){
            $_SESSION["msg"]=["msg"=>"You are already login.","t_color"=>"white","bg_color"=>"yellow"];
            header(Domain_R()."home/");
        }
        if (!isset($_POST["user"]) and !isset($_POST["pass"]) and !isset($_POST["jsconf"])) {
            $this->loginForm();
        }else{
        	if ($_POST["jsconf"]=="1"){
		        $this->loginCheck($_POST["user"],$_POST["pass"]);
	        }else{
		        $this->loginForm();
	        }
        }
    }

    private function loginCheck($username,$pass){
        $result = UserModel::loginCheckUsernamePass($username,$pass);
        if ($result==null){
            echo 0;
        }
        else{
            $_SESSION["user"]=["username"=>$username,"name"=>$result["firstname"]." ".$result["lastname"]];
            echo "../user/register";
        }
        return ;
    }

    private function loginForm(){
        View::render("/login.php","login.css","Login");
    }

    public function register (){
        if (isset($_SESSION["user"])){
	        echo json_encode(array('status' => 1,'url' => '../home','error'=>''));
        }
        if (!isset($_POST["username"]) and !isset($_POST["pass"]) and !isset($_POST["email"])) {
	        $this->registerForm();
        }else{
            $this->registerCheck($_POST["user"],$_POST["pass"],$_POST["mail"],$_POST["first_name"],$_POST["last_name"],$_POST["phone"]);
        }
    }

    private function registerCheck ($username,$pass,$email,$firstname,$lastname,$mobile){
        $result_user = UserModel::registerCheckUsername($username);
	    $result_email = UserModel::registerCheckEmail($email);
        if ($result_email==null and $result_user==null){
            if (!CheckEmail($email)){
	            echo json_encode(array('status' => 0,'url' => '','error'=>'Your email is invalid'));
            }elseif (strlen($pass)<8){
	            echo json_encode(array('status' => 0,'url' => '','error'=>'Your password must al least have 8 characters'));
            }elseif (strpos($username,"/") or strpos($username,"!") or strpos($username,"-") or strpos($username,"@") or strpos($username,"=") or strpos($username,"\\")){
	            echo json_encode(array('status' => 0,'url' => '','error'=>'For your username just use A-Z, a-z, 0-9 and underline!'));
            }else{
                if (UserModel::registerNewUser($username,$pass,$firstname,$lastname,$mobile,$email)){
	                echo json_encode(array('status' => 1,'url' => '../user/login','error'=>''));
                }else{
	                echo json_encode(array('status' => 0,'url' => '','error'=>'Somethings went wrong. please try again'));
                }
            }
        }
        else {
        	if ($result_user==null){
		        echo json_encode(array('status' => 0,'url' => '','error'=>'We already have this email.'));
	        } else{
		        echo json_encode(array('status' => 0,'url' => '','error'=>'We already have this username.'));
	        }

        }
        return ;
    }

    private function registerForm(){
		View::render("/register.php","Register.css","Register");
    }
}