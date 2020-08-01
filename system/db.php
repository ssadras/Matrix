<?php

class Db_core {
    private $db;
    private static $curdb;

    public static function reader ($option=null){
        if (self::$curdb==null){
            self::$curdb= new Db_core($option);
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
            $host=$config["db_core"]["host"];
            $user=$config["db_core"]["user"];
            $pass=$config["db_core"]["pass"];
            $name=$config["db_core"]["name"];
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
            return $output;
        }
    }

    public function selectFirstQuery ($sql){
        $results=$this->selectQuery($sql);
        if ($results==null){
            return null;
        }
        return $results[0];
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

class Db_judge {
    private $db;
    private static $curdb;

    public static function reader ($option=null){
        if (self::$curdb==null){
            self::$curdb= new Db_judge($option);
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
            $host=$config["db_judge"]["host"];
            $user=$config["db_judge"]["user"];
            $pass=$config["db_judge"]["pass"];
            $name=$config["db_judge"]["name"];
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
            return $output;
        }
    }

    public function selectFirstQuery ($sql){
        $results=$this->selectQuery($sql);
        if ($results==null){
            return null;
        }
        return $results[0];
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