<?php
    include '../database/db.php';
    session_start();

    if(isset($_POST['submit'])) {

        $email=$_POST['email'];
        $pwd = $_POST['pwd'];
        $password = md5($pwd); 
        
        $sql = "SELECT id, user_status FROM user WHERE email = '$email' and password = '$password'";

        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        
        $count = mysqli_num_rows($result);
        $id = $row['user_status'];
        if($count == 1) {
           
           $_SESSION['login_user'] = $email; // get email
           
           if($id == 1){
            header("Location: home.php");
           }
        }else {
           $error = "Your Login Name or Password is invalid";
        }
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-sm-6 mx-auto">
                <form action="" method="post">
                    <div class="form-group">
                      <label for="">Email :</label>
                      <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="">Password : </label>
                      <input type="password" class="form-control" name="pwd" id="" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-danger" name="submit">Log in</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>