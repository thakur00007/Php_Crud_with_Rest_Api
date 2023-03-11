

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Back</a>
    <form method="post">
        <label>Name: </lable><input type="text" name="name" ><br>
        <label>Email: </lable><input type="text" name="email" ><br>
        <label>Phone: </lable><input type="text" name="phone" ><br>
        <input type="submit" value = "submit" name="submit">
    </form>
</body>
</html>

<?php 

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $data_arr = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        );

        $arr = json_encode($data_arr);
        $ch = curl_init();
        $url = "http://localhost:5000/user";
        curl_setopt($ch, CURLOPT_URL, $url);        
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $arr);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));


        $res = curl_exec($ch);
        if($err = curl_error($ch)){
            echo "cURL Error #:" . $err;
        }
        else{
            $decode = json_decode($res, true);
            $data = $decode['data'];
            
            if($data == 1){
                echo $decode['message'];
            }
            else{
                echo $decode['message'];
            }
        }

        curl_close($ch);
    }

?>