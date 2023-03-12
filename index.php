<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/339f066cec.js" crossorigin="339f066cec"></script>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <div class="container">
        <div class="col-12 d-flex justify-content-center m-2 p-2">
            <h1>CRUD Operation</h1>
        </div>
        <div class="col-12 d-flex justify-content-end m-2 p-2">
            <a href="insert.php"><button class="btn btn-success"><i class="fas fa-plus"></i> Add New</button></a>
        </div>
        <div class="table-responsive">
            <table border=1 class="table table-striped ">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
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
                        <td><a class="p-y" href="edit.php?id=<?=$row['id']?>"><i class="fas fa-edit"></i></a></td>
                        <td><a class="p-3" onclick="if(confirm('Are you sure want to delete?')) window.location.href='delete.php?id=<?=$row['id']?>';"><i class="fas fa-trash text-danger"></i></a></td>

                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>