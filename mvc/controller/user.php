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
        	header("Location: ../home");
        	return ;
        }
        if (!isset($_POST["username"]) and !isset($_POST["pass"]) and !isset($_POST["email"])) {
	        $this->registerForm();
        }else{
            $this->registerCheck($_POST["user"],$_POST["pass"],$_POST["mail"],$_POST["f_name"],$_POST["l_name"],$_POST["phone"],$_POST["repass"]);
        }
    }

    private function registerCheck ($username,$pass,$email,$firstname,$lastname,$mobile,$repass){
        $result_user = UserModel::registerCheckUsername($username);
	    $result_email = UserModel::registerCheckEmail($email);
	    $status=array("username" => "valid","equal_passwords"=>"valid","email"=>"valid","phone"=>"valid","system_error"=>"valid");
	    if ($result_user!=null){
		    $status["username"]="invalid";
	    }
	    if ($result_email!=null) {
		    $status["email"] = "invalid";
	    }
	    if (!CheckEmail($email)){
	    	$status["email"]="invalid";
	    }
	    if (strpos($username,"/") or strpos($username,"!") or strpos($username,"-") or strpos($username,"@") or strpos($username,"=") or strpos($username,"\\")){
	    	$status["username"]="invalid";
	    }
	    if ($pass!=$repass){
	    	$status["equal_passwords"]="invalid";
	    }elseif ($status["username"]=="valid" and $status["email"]=="valid" and $status["equal_passwords"]=="valid"){
	    	if (UserModel::registerNewUser($username,$pass,$firstname,$lastname,$mobile,$email)){
	    		2+2;
	    	}else{
	    		$status["system_error"]="invalid";
	    	}
	    }
        //$respond=json_encode(array('status' => $status,'url' => '../user/login'));
        //echo $respond;
	    echo json_encode(array('status' => $status,'url' => '../user/login'));
        return ;
    }

    private function registerForm(){
		View::render("/register.php","Register.css","Register");
    }
}