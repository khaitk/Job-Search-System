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
    <style>
        .like.p-2.cursor:hover {
            color: blue !important;
        }
  
        .like.p-2.cursor {
            cursor: pointer !important;
        }
    </style>
</head>
<body>
    <div id="main">
        <div class="container-fluid">
            <div class="row">
            <?php include './template/menu.php'; ?>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="row p-2">
                        <div class="col-sm-12 p-2">
                            <?php
                                $sql1 = "select post.id_user, name, post.images,post.id, content, likes, post.time from post, user, likes_post where post.id_user = user.id and post.id = likes_post.id_post order by post.time desc";
                                $result = $conn->query($sql1);
                                //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                                //print_r($row);
                                if ($result->num_rows > 0) {
                                    while($row1 = $result->fetch_assoc()) {
                                        echo "<div class='row p-2'>";
                                            echo "<div class='card mb-6'>";
                                                echo "<div class='card-header'><h3><a href='show_information.php?id=".$row1['id_user']." '>".$row1['name']."</a></h3></div>";
                                                echo '<img src="./images/'.$row1["images"].'" alt='.$row["name"].' width="550" class="rounded mx-auto d-block img-fluid">';
                                                echo "<div class='card-body'>";
                                                    echo "<p class='card-text'>".$row1['content']."</p>";
                                                    echo "<p class='card-text'><p class='text-muted'>".$row1['time']."</p></p>";
                                                echo"</div>";
                                                echo "<div class='card-body'>";
                                                    echo "<div class='bg-white'>";
                                                        echo "<div class='d-flex flex-row fs-12'>";
                                                            echo "<div class='like p-2 cursor'><i class='fa fa-thumbs-o-up'></i><span class='ml-1'><a href='like_post.php?id=".$row1['id']." '>Like</a></span><strong class='m-2'>".$row1['likes']."</strong></div>";
                                                            echo "<div class='like p-2 cursor'><i class='fa fa-commenting-o'></i><span class='ml-1'><a href='messages.php?id=".$row1['id_user']." '>Send Messages</a></span></div>";
                                                            echo "<div class='like p-2 cursor'><i class='fa fa-share'></i><span class='ml-1'>Share</span></div>";
                                                        echo"</div>";
                                                    echo"</div>";
                                                echo"</div>";
                                             echo"</div>";
                                        echo"</div>";
                                        }
                                    }
                                ?>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
</html>