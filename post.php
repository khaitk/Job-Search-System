<?php
    include './session.php';
    $sql = mysqli_query( $conn ,"select * from user where email = '$email' ");

    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

    if( !isset( $_SESSION['login_user']) ){
        header("location: login.php");
        die();
    }
    if(isset($_POST['submit'])){
        $id_user = $row['id'];
        $content = $_POST['content'];

        $dir = "images/";
        $image = $_FILES['file']['name'];
        $temp_name=$_FILES['file']['tmp_name'];

        if($image != "") {
            if(file_exists($dir.$image)) {
                $image= time().'_'.$image;
            }
            $fdir= $dir.$image;
            move_uploaded_file($temp_name, $fdir);
        }
     
        $sql1 = "insert into post(id_user, content, images) values('$id_user', '$content', '$image')";
        

        if($conn->query($sql1) ==TRUE){
            header("location: status.php");
        }else{
            echo "Not not not";
        }
    }
?>