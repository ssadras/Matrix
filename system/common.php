<?php

function br (){
    echo "<br>";
}

function printArray ($array = array()){
    foreach ($array as $key=>$value){
        echo "$key ==> $value".br();
    }
}

function randomArray($i){
    $array=array();
    for ($h = 0; $h < $i; $h++){
        $array[$h]=rand(0,10000);
    }
    return $array;
}

function FindUserByEmail ($email){
    $data=new mysqli("localhost","root","","contact_phplearn");
    $result=$data->query("select * from users where email='$email'");
    if ($result) {
        $result_row = $result->fetch_assoc();
        return $result_row["user_id"];
    }
    return false;
}

function DeleteCookieByKey($check){
    foreach ($_COOKIE as $key=>$value){
        if ($key==[$check]){
            unset($_COOKIE[$key]);
            break;
        }
    }
}

function CheckEmail ($email){
    if (filter_var($email,FILTER_VALIDATE_EMAIL)!== false){
        return true;
    }
    return false;
}

