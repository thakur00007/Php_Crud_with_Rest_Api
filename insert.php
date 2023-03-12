

<!DOCTYPE html>
<html lang="en">
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
            <!-- alert message -->
            <div class="alert alert-dismissible fade show" id="alert" style="display: none;">
                <h5 class="" id="msg"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
            <div class="d-flex justify-content-center ">                
                <section class="card col-lg-5 col-sm-12 col-md-8 border-0  shadow-lg">
                    <div class="card-body px-5">
                        <div class="col-12 d-flex ">                                    
                            <div class="col-8 d-flex justify-content-end p-3">
                                <h2 class="py-2">Insert Data</h2>
                            </div>
                            <div class="col-4 d-flex justify-content-end p-3">
                                <a href="index.php"><button class="btn btn-link"><i class="fas py-3 text-success fa-home"></i></button></a>
                            </div>
                        </div>
                        <form  method="post" action="">
                        <div class="mb-1">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" placeholder="Your Name" class="form-control" required="">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" placeholder="Your email" class="form-control" required="">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Phone</label>
                            <input placeholder="Phone Number" name="phone" type="text" class="form-control" required="">
                        </div>
                        
                        <div class="d-inline-flex justify-content-center mb-2 col-12">
                            <input type="submit" name="submit" class="btn btn-success col-12 mt-2  my-auto" value="Insert">
                        </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>

<script>
        function successAlert(msg){
            document.getElementById("alert").style.display = "block";
            document.getElementById("msg").innerHTML = msg;
            document.getElementById("alert").classList.add("alert-success");


            // dismiss alert after 3 seconds
            setTimeout(function() {
                document.getElementById("alert").style.display = "none";
            }, 3000);
        }

        // error alert with argument
        function errorAlert(msg){
            document.getElementById("alert").style.display = "block";
            document.getElementById("msg").innerHTML = msg;
            document.getElementById("alert").classList.add("alert-danger");

            // dismiss alert after 3 seconds
            setTimeout(function() {
                document.getElementById("alert").style.display = "none";
            }, 3000);
        }
    </script>

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
            // echo "cURL Error #:" . $err;
            echo "<script>errorAlert('Connection Failed $err');</script>";
        }
        else{
            $decode = json_decode($res, true);
            $data = $decode['data'];
            
            if($decode['status'] == "success"){
                echo "<script>successAlert('Data Inserted Successfully');</script>";
            }
            else{
                echo "<script>errorAlert('Data Not Inserted');</script>";
            }
        }

        curl_close($ch);
    }

?>