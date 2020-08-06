<?php
class AdvertModel {
    public static function getById ($id){
        $db = Db::reader();
        $result = $db->selectFirstQuery("select * from adverts where advert_id=$id; ");
        return $result;
    }
}