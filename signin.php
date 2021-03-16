<?php
    include './database/db.php';
    session_start();

    if($_POST['type'] == 1){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $pwd = $_POST['password'];
        $password = md5($pwd);

        
        $sql = "INSERT INTO user (name, email, birthday, password) VALUES ('$name', '$email', '$birthday', '$password' )";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("statusCode"=>200));
        }else {
            echo json_encode(array("statusCode"=>201));
        }
        mysqli_close($conn);
    }
    if($_POST['type'] == 2){
        $email=$_POST['email'];
        $pwd = $_POST['password'];
        $password = md5($pwd);
        
        $sql = "SELECT * FROM user WHERE email = '$email' and password = '$password'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0) {
           $_SESSION['login_user'] = $email; // get email
           echo json_encode(array("statusCode"=>200));
        }else {
           echo json_encode(array("statusCode"=>201));
        }
        mysqli_close($conn);
   }

?>