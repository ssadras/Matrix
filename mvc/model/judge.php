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
            if ($tc_an["status"]==0){
                return $status;
            }elseif ($tc_an["status"]==1){
                $status="accepted";
                $tc_counter++;
            }elseif ($tc_an["status"]==2){
                $status="Wrong answer in testcase $tc_counter";
                return $status;
            }elseif ($tc_an["status"]==3){
                $status="Time limit exceeded in testcase $tc_counter";
                return $status;
            }elseif ($tc_an["status"]==4){
                $status="Storage limit exceeded in testcase $tc_counter";
                return $status;
            }elseif ($tc_an["status"]==5){
                $status="Runtime error in testcase $tc_counter";
                return $status;
            }else {
                $status="Error please try again.";
                return $status;
            }
        }
        return $status;
    }
    public static function setProbStatusById ($prob_id,$user_id){

    }
}