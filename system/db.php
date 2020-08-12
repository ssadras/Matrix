<?php

class Db {
    private $db;
    private static $curdb;

    public static function reader ($option=null){
        if (self::$curdb==null){
            self::$curdb= new Db($option);
        }
        return self::$curdb;
    }

    private function __construct($option=null){
        if ($option!=null){
            $host=$option["host"];
            $user=$option["user"];
            $pass=$option["pass"];
            $name=$option["name"];
        }else{
            global $config;
            $host=$config["db"]["host"];
            $user=$config["db"]["user"];
            $pass=$config["db"]["pass"];
            $name=$config["db"]["name"];
        }

        $this->db= new mysqli($host,$user,$pass,$name);

        if ($this->db->connect_errno!=0){
            echo $this->db->connect_error;
            exit();
        }
        $this->db->query("SET NAMES 'UTF8'");
    }

    public function selectQuery ($sql){
        $results=$this->db->query($sql);
        $output=array();
        if ($results->num_rows == 0){
            $output=null;
        }
        if ($results->num_rows > 0){
            while ($result=$results->fetch_assoc()){
                $output[]=$result;
            }
        }
        return $output;
    }

    public function selectFirstQuery ($sql){
        $results=$this->selectQuery($sql);
        if ($results==null){
            return null;
        }elseif (sizeof($results[0])==1){
            return $results[0][0];
        }else {
            return $results[0];
        }
    }

    private function iudQuery ($sql){
        $this->db->query($sql);
        if ($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

    public function insertQuery ($sql){
        return $this->iudQuery($sql);
    }

    public function updateQuery ($sql){
        return $this->iudQuery($sql);
    }

    public function deleteQuery ($sql){
        return $this->iudQuery($sql);
    }

    public function close (){
        $this->db->close();
        self::$curdb=null;
    }
}