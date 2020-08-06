<?php
class ProblemsetModel {
    public static function quesGetById ($id){
        $db = Db::reader();
        $out1 = $db->selectFirstQuery("select * from problemsets where problemset_id=$id ;");
        $out2 = $db->selectQuery("select * from sample_tcs where problemset_id=$id ;");
        for ($i=0;$i<=key($out2); $i++){
            unset($out2[$i]["problemset_id"]);
            unset($out2[$i]["testcase_id"]);
        }
        $result = $out1+$out2;
        return $result;
    }
}