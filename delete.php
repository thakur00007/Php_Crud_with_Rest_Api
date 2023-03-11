<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $ch = curl_init();
        $url = "http://localhost:5000/user/$id";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $res = curl_exec($ch);

        if($err = curl_error($ch)){
            echo "cURL Error #:" . $err;
        }
        else{
            $decode = json_decode($res, true);
            $data = $decode['data'];
            header("Location: index.php");
        }
    }

    ?>