<?php
include './session.php';
$sql = mysqli_query( $conn ,"select * from user where email = '$email' ");
$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

 if(isset($_POST['submit'])){
    $id_user_from = $row['id']; //admin
    $id_user_to = $_POST['email'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];

    $sql = "insert into messages (id_user_from, id_user_to, subject, content ) values ('$id_user_from', '$id_user_to', '$subject', '$content') ";

    if($conn->query($sql) == TRUE){
        header("location: messages.php");
    }else{
        echo "Not not not";
    }
    
}

?>