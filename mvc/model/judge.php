<?php
class JudgeModel {
    private static function getStatusByProbId ($prob_id,$user_id){
        $db = Db::reader();
        $tc_ids = $db->selectQuery("select testcase_id from testcases where problemset_id=$prob_id order by testcase_id;");
        $status="In Queue";
        $tc_counter=1;
        foreach ($tc_ids as $tc_id){
            $tc=$tc_id["testcase_id"];
            $tc_an = $db->selectFirstQuery("select * from users_tcs_ans where testcase_id=$tc and user_id=$user_id;");
            if ($tc_an!=null) {
                if ($tc_an["status"] == 0) {
                    return $status;
                } elseif ($tc_an["status"] == 1) {
                    $status = "accepted";
                    $tc_counter++;
                } elseif ($tc_an["status"] == 2) {
                    $status = "Wrong answer in testcase $tc_counter";
                    return $status;
                } elseif ($tc_an["status"] == 3) {
                    $status = "Time limit exceeded in testcase $tc_counter";
                    return $status;
                } elseif ($tc_an["status"] == 4) {
                    $status = "Storage limit exceeded in testcase $tc_counter";
                    return $status;
                } elseif ($tc_an["status"] == 5) {
                    $status = "Runtime error in testcase $tc_counter";
                    return $status;
                } else {
                    $status = "Error please try again.";
                    return $status;
                }
            }else{
                return $status;
            }
        }
        return $status;
    }
    public static function setProbStatusById ($prob_id,$user_id){
        $db=Db::reader();
        $status= self::getStatusByProbId($prob_id,$user_id);
        if (! $db->insertQuery("insert into users_probs_sts (problemset_id, user_id, status) values ($prob_id,$user_id,$status);")){
            $_SESSION["msg"]=["msg"=>"Something went wrong. Please try again","t_color"=>"white","bg_color"=>"red"];
        }
        return ;
    }
    public static function getStatusForUserById ($prob_id,$uer_id){
        $db=Db::reader();
        $output=$db->selectQuery("select * from users_probs_sts where problemset_id=$prob_id and user_id=$uer_id and status=1 ;");
        if ($output==null){
            $result=$db->selectFirstQuery("select * from users_probs_sts where problemset_id=$prob_id and user_id=$uer_id order by usprst_id DESC;");
            return $result["status"];
        }else{
            return 1;
        }
    }
}