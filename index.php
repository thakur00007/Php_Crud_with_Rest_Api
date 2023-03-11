<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <a href = "insert.php">insert</a>
    <table border=1>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
            $ch = curl_init();
            $url = "http://localhost:5000/user";
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
            $res = curl_exec($ch);
        
            if($err = curl_error($ch)){
                echo "cURL Error #:" . $err;
            }
            else{
                $decode = json_decode($res, true);
                $data = $decode['data'];
                foreach($data as $row){
        ?>
            <tr>
                <td><?=$row['name']?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['phone']?></td>
                <td><a href="edit.php?id=<?=$row['id']?>">edit</a></td>
                <td><a onclick="if(confirm('Are you sure want to delete?')) window.location.href='delete.php?id=<?=$row['id']?>';"><button>Delete</button></a></td>

            </tr>
            <?php
                }
            }
             ?>
    </table>
</body>
</html>