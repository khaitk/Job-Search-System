<?php
    include './session.php';
    $sql = mysqli_query( $conn ,"select * from user where email = '$email' ");

    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $id = $row['id'];
    if( !isset( $_SESSION['login_user']) ){
        header("location: login.php");
        die();
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
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="main">
        <div class="container-fluid">
            <div class="row">
                <?php include './template/menu.php'; ?>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="list-group">
                        <?php   
                            //$sql = "select name, subject, email,time, id_user_to, count(name) as 'count' from messages, user where user.id = '$id'  and id_user_to = '$id' group by name ";
                            $sql = "select name, subject,images, email, messages.time, id_user_from, id_user_to, count(name) as 'count' from messages, user where messages.id_user_from = user.id  and id_user_to = '$id' group by name order by messages.time desc";
                            $result = $conn->query($sql);
                            // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                            // echo $row['subject'];
                            if ($result->num_rows > 0) {
                                while($row1 = $result->fetch_assoc()) {
                                    echo "<div class='row'>";
                                        echo "<div class='col-sm-8'>";
                                            echo "<a href='reply.php?id=".$row1['id_user_from']."' class='list-group-item list-group-item-action flex-column align-items-start m-1'>";
                                                echo "<div class='d-flex w-100 justify-content-between'>";
                                                    echo "<h5 class='mb-1'>".$row1['name']."</h5>";
                                                    echo "<small>".$row1['time']."</small>";
                                                echo "</div>";
                                                echo "<p class='mb-1'><h4 class='text-warning'>".$row1['subject']."</h4></p>";
                                                echo "<small><strong class='text-success'>".$row1['email']."</strong></small>";
                                                echo "<div class='float-right'><i class='fa fa-commenting-o'></i> ".$row1['count']."</div>"; 
                                            echo "</a>";
                                            
                                        // print_r($row1);
                                        // echo "<br>";
                                        echo "</div>";
                                        echo "<div class='col-sm-3 m-3'>";
                                            echo "<a href='show_information.php?id=".$row1['id_user_from']."' ><img src='./images/profile/".$row1['images']. " ' alt=".$row['name']." width='100' class='rounded-circle'> </a>";
                                            echo "<div class='float-right m-5'><a href='delete_messages.php?id=".$row1['id_user_from']." ' ><button type='button' class='close' aria-label='Close'><span aria-hidden='true'>&times;</span></button></a></div>";
                                        echo "</div>";
                                        
                                    echo "</div>";    
                                }
                            }else{
                                echo "Hiện tại chưa có tin nhắn đến";
                                echo "<a href='friend.php' class='btn btn-primary'>Send messages</a>";
                            }
                        ?>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
</html>