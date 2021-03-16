<?php
    include './session.php';
    $sql = mysqli_query( $conn ,"select * from user where email = '$email' ");

    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

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
                        $sql = "SELECT * FROM user";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='col-md-4 mb-3'>";
                                    echo "<div class='card'>";
                                        echo "<div class='card-body'>";
                                            echo "<div class='d-flex flex-column align-items-center text-center'>";
                                                echo '<img src="./images/profile/'.$row["images"].'" alt='.$row["name"].' class="rounded-circle" width="200">';
                                                echo "<div class='mt-3'>";
                                                    echo "<h4><a href='show_information.php?id=".$row['id']." '>".$row['name']."</a></h4>";
                                                    echo '<p class="text-secondary mb-1">'.$row["work"].'</p>';
                                                    echo '<p class="text-muted font-size-sm"> '.$row["address"].' </p>';
                                                    echo "<a href='messages.php?id=".$row['id']." ' class='btn btn-outline-primary'>Message</a>";
                                                echo "</div>";
                                             echo "</div>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            }
                        }
                    ?>
                </div>
            </main>
        </div>
    </div>
</div>
</body>
</html>