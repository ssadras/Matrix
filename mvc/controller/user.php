<?php
class UserController {
    public function login (){
        if (isset($_SESSION["user"])){
            $_SESSION["msg"]=["msg"=>"You are already login.","t_color"=>"white","bg_color"=>"yellow"];
            header(Domain_R()."home/");
        }
        if (!isset($_POST["user"]) and !isset($_POST["pass"]) and !isset($_POST["jsconf"])) {
            $_SESSION["msg"]=["msg"=>"Please complete all of the boxes.","t_color"=>"white","bg_color"=>"red"];
            $this->loginForm();
        }else{
        	if ($_POST["jsconf"]=="ljhgdbtryojh129034930674jonsifow4htgpo"){
		        $this->loginCheck($_POST["user"],$_POST["pass"]);
	        }else{
		        $this->loginForm();
	        }
        }
    }

    private function loginCheck($username,$pass){
        $result = UserModel::loginCheckUsernamePass($username,$pass);
        if ($result==null){
            $_SESSION["msg"]=["msg"=>"Username or password is incorrect","t_color"=>"white","bg_color"=>"red"];
            $this->loginForm();
        }
        else{
            $_SESSION["user"]=["username"=>$username,"name"=>$result["firstname"]." ".$result["lastname"]];
            $name=$_SESSION["user"]["name"];
            $_SESSION["msg"]=["msg"=>"Welcome $name","t_color"=>"white","bg_color"=>"green"];
            header(Domain_R()."home/");
        }
        return ;
    }

    private function loginForm(){
        View::render("/login.php","login.css","Login");
    }

    public function register (){
        if (isset($_SESSION["user"])){
            $_SESSION["msg"]=["msg"=>"You are already login.","t_color"=>"white","bg_color"=>"yellow"];
            header(Domain_R()."home/");
        }
        if (!isset($_POST["username"]) and !isset($_POST["pass"]) and !isset($_POST["email"]) and !isset($_POST["firstname"]) and !isset($_POST["lastname"]) and !isset($_POST["mobile"])) {
            $_SESSION["msg"]=["msg"=>"Please complete all of the boxes.","t_color"=>"white","bg_color"=>"red"];
            $this->registerForm();
        }else{
            $this->registerCheck($_POST["username"],$_POST["pass"],$_POST["email"],$_POST["firstname"],$_POST["lastname"],$_POST["mobile"]);
        }
    }

    private function registerCheck ($username,$pass,$email,$firstname,$lastname,$mobile){
        $result = UserModel::registerCheckUsernameEmail();
        if ($result==null){
            if (!CheckEmail($email)){
                $_SESSION["msg"]=["msg"=>"Enter a Valid email!","t_color"=>"white","bg_color"=>"red"];
                $this->registerForm();
            }elseif (strlen($pass)<8){
                $_SESSION["msg"]=["msg"=>"Password Must at least 8 characters","t_color"=>"white","bg_color"=>"red"];
                $this->registerForm();
            }elseif (strpos($username,"/") or strpos($username,"!") or strpos($username,"-") or strpos($username,"@") or strpos($username,"=") or strpos($username,"\\")){
                $_SESSION["msg"]=["msg"=>"For your username just use A-Z, a-z, 0-9, underline or dot.","t_color"=>"white","bg_color"=>"red"];
                $this->registerForm();
            }else{
                if (UserModel::registerNewUser($username,$pass,$firstname,$lastname,$mobile,$email)){
                    $_SESSION["msg"]=["msg"=>"Register completed!","t_color"=>"white","bg_color"=>"green"];
                    $this->loginForm();
                }else{
                    $_SESSION["msg"]=["msg"=>"Something went wrong! please try again!","t_color"=>"white","bg_color"=>"red"];
                    $this->registerForm();
                }
            }
        }
        else {
            $_SESSION["msg"]=["msg"=>"your email or username already is in server","t_color"=>"white","bg_color"=>"red"];
            header(Domain_R()."home/");
        }
        return ;
    }

    private function registerForm(){

    }
}