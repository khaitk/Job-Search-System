<?php
    include './session.php';
    $sql = mysqli_query( $conn ,"select * from user where email = '$email' ");
    $row1 = mysqli_fetch_array($sql,MYSQLI_ASSOC);

    if( !isset( $_SESSION['login_user']) ){
        header("location: index.php");
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
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="main">
    <div class="container-fluid">
        <div class="row">
            <?php include 'templates/menu.php'; ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="row">
                    <div class="col-sm-5">
                        <form action="send_messages.php" method="post">
                            <div class="form-group">
                                <label for="">Email : </label>
                                <select class="custom-select" name="email">
                                    <?php
                                        $sql = "SELECT * FROM user";
                                        $result = $conn->query($sql);
                                        if($result->num_rows > 0){
                                            while($row = $result->fetch_assoc()){
                                                echo "<option value= ".$row['id']." >".$row['email']."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Subject : </label>
                                <input type="text" class="form-control" name="subject" id="" aria-describedby="helpId" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="">Content : </label>
                                <textarea class="form-control" name="content" id="" rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-outline-secondary" name="submit">Send</button>
                        </form>
                    </div>
                    <div class="col-sm-7">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="../images/profile/1.jpg" alt="First slide">
                            </div>         
                                <?php
                                    $sql = "SELECT * FROM user";
                                    $result = $conn->query($sql);
                                    if($result->num_rows > 0){
                                        while($row = $result->fetch_assoc()){
                                            echo '<div class="carousel-item">';
                                                echo '<img src="../images/profile/'.$row["images"].'" alt='.$row["name"].' class="d-block w-100" width="100">';
                                                echo '<div class="carousel-caption d-none d-md-block bg-dark">';
                                                    echo '<h1 class="text-light ">'.$row['name'].'</h1>';
                                                    echo '<h3 class="text-primary">'.$row['email'].'</h3>';
                                                    echo '<h5 class="text-success ">'.$row['work'].'</h5>';
                                                echo '</div>';
                                            echo '</div>';
                                        }
                                    }
                                ?>
                                 <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>