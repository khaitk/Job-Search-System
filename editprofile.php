<?php
    include './session.php';
    $sql = mysqli_query( $conn ,"select * from user where email = '$email' ");

    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $id = $row['id'];
    // echo $id;
    if( !isset( $_SESSION['login_user']) ){
        header("location: login.php");
        die();
    }
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $birthday = $_POST['date'];
        $pwd = $_POST['pwd'];
        $password = md5($pwd);
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $work = $_POST['work'];
        $website = $_POST['website'];
        $github = $_POST['github'];
        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $instagram = $_POST['instagram'];

        $dir = "images/profile/";
        $image = $_FILES['file']['name'];
        $temp_name=$_FILES['file']['tmp_name'];

        if($image != "") {
            if(file_exists($dir.$image)) {
                $image= time().'_'.$image;
            }
            $fdir= $dir.$image;
            move_uploaded_file($temp_name, $fdir);
        }

        $sql = "UPDATE user SET name='$name', email='$email', birthday = '$birthday', password = '$password', phone='$phone', address='$address', 
        work='$work', images= '$image', website='$website', github='$github', facebook = '$facebook', twitter = '$twitter', 
        instagram='$instagram' WHERE id = '$id' ";
        if ($conn->query($sql) === TRUE) {
            header("Location: profile.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }
        
        $conn->close();
    }
?>