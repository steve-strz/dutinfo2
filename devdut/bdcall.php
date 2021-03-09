<?php
    try{
        $user="on40ftz4_admin";
        $pass="";
        $co = new PDO('mysql:host=devdut.site;dbname=on40ftz4_homeworks', $user, $pass);
        $sql = 'SELECT * FROM homework';
        $result = array();
        foreach($co->query($sql) as $row){
            array_push($result, array('id' => $row['id'], 'title' => $row['title'], 'content' => $row['content'], 'links' => $row['links'], 'tags' => $row['tags']));
        }
        echo json_encode($result);
    }catch(PDOException $e){
        echo $e;
    }
?>
