<?php
    include_once("setdb.php");

    if(!empty($_GET)){
        $qa = htmlspecialchars($_GET["q"],ENT_QUOTES);

        $sql = 'SELECT `select_question`,`select_answer` FROM `select_log` WHERE (`select_question` LIKE :QA or `select_answer` LIKE :AN ) ';
        $qa_sqldata = '%'.$qa.'%';
        $ans_sqldata = '%'.$qa.'%';

        $d = $PDO->prepare($sql);
        $d->bindParam(":QA", $qa_sqldata);
        $d->bindParam(":AN", $ans_sqldata);
        $d->execute();
        $data = $d->fetchAll();
        foreach ($data as $k => $v){
            
                    $return_data[] = [
                        "Atype" => true,
                        "Aoutput" => $v["select_answer"],    
                        "Qtype" => true,
                        "Qoutput" => $v["select_question"]
                    ];
                
        }
        
        echo json_encode($return_data);
    }

?>