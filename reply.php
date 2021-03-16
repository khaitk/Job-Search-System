<?php
    include './session.php';
    $sql = mysqli_query( $conn ,"select * from user where email = '$email' ");

    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    $id1 = $row['id'];
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
    <style>
    .scroll{
        height : 600px;
        overflow-y: scroll;
    }
    </style>
</head>
<body>
    <div id="main">
        <div class="container-fluid">
            <div class="row">
                <?php include './template/menu.php'; ?>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="row">
                        <?php   
                            $id2 = $_GET['id'];

                            $sql = "select subject, content, messages.time from messages, user where messages.id_user_from = user.id  and id_user_to = '$id1' and id_user_from = '$id2' order by messages.time desc";

                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row1 = $result->fetch_assoc()) {
                                    echo "<div class='card border-danger mb-3' style='max-width: 18rem;'>";
                                            // echo '<img src="./images/profile/'.$row1["images"].'" alt='.$row1["name"].' width="100" class="rounded-circle mx-auto d-block">';
                                        echo "<div class='card-header bg-transparent border-danger'><i class='text-warning'><b> To : ".$row['name']."</b></i></div>";
                                        echo "<div class='card-body text-danger'>";
                                            echo "<div class='card-title'><h3 class='text-primary'>".$row1['subject']."</h3></div>";
                                        echo "<p class='card-text'><i>".$row1['content']."</i></p>";
                                        echo "</div>";
                                        echo "<div class='card-footer bg-transparent border-danger'>".$row1['time']."</div>";
                                    echo "</div>";
                                }
                            }  
                        ?>
                    </div> 
                    <?php echo "<a href='messages.php?id=".$id2." ' class='btn btn-outline-dark'>Send Messages</a>";   ?>
                </main>
            </div>
        </div>
    </div>
</body>
</html>