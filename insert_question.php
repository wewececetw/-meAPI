<?php
    include_once("setdb.php");

    if(!empty($_GET)){
        $qa = htmlspecialchars($_GET["q"],ENT_QUOTES);
        $time = htmlspecialchars($_GET["time"],ENT_QUOTES);

        $provisionalTime = date("Y-m-d H:i:s",$time);
        $nowTime = date("Y-m-d H:i:s",strtotime("+6 hour"));
        
        date_default_timezone_set("Asia/Taipei");

        $url = "https://bot.hithot.cc/wise/qa-ajax.jsp?id=php-test-0001&apikey=102d78d84e244ad80827&q=".urlencode($qa);
 
        $ch = curl_init();
    

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        
        $rs = curl_exec($ch);
        if($rs === false) {
            return 'Curl error: ' . curl_error($ch);
        }

        curl_close($ch);
        $data = json_decode($rs);

        foreach ($data as $k => $v){
            if($k === "datetime"){
                $anstime = $v;
            }elseif($k === "output"){
                $answer = $v;
            }
        }

        $result_data = [$qa, $nowTime, $answer, $anstime,date('Y-m-d H:i:s'), "Barron" , "192.168.0.1"];
        $sql = 'INSERT INTO select_log ( `select_question`, `select_question_time`, `select_answer`, `select_answer_time`, `create_at`, `creator`, `create_ip`) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $sth = $PDO->prepare($sql);
        try {
            if ($sth->execute($result_data)) {
                $return_data["output"] = $answer;
                $return_data["time"] = $anstime;
                $return_data["Message"] = "新增成功";
            } else {
                $return_data["Message"] = "新增失敗";
            }
        } catch (PDOException $e) {
            $return_data["Message"] = "新增失敗";
        }

        echo json_encode($return_data);
    }

?>