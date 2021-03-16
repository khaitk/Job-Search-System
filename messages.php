<?php
    include './session.php';
    $sql = mysqli_query( $conn ,"select * from user where email = '$email' ");

    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);

    if( !isset( $_SESSION['login_user']) ){
        header("location: login.php");
        die();
    }

    $idget = $_GET['id']; 
    $sql1 = "select * from user where id = $idget";
    $result = $conn->query($sql1);
    $row1 = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if(isset($_POST['submit'])){
        $id_user_from = $row['id'];
        $id_user_to = $row1['id'];
        $subject = $_POST['subject'];
        $content = $_POST['content'];

        $sql = "insert into messages(id_user_from, id_user_to, subject, content ) values ('$id_user_from', '$id_user_to', '$subject', '$content') ";

        if($conn->query($sql) == TRUE){
            echo "";
        }else{
            echo "Not not not";
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
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="main">
        <div class="container-fluid">
            <div class="row">
                <?php include './template/menu.php'; ?>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">To: </label>
                                    <input type="text" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="" value="<?php echo $row['email']." | ".$row1['email'] ?>">
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
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-4">
                                <div class="card m-2">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img src="./images/profile/<?php echo $row['images'] ?>" alt="<?php echo $row['name']  ?>" class="rounded-circle" width="120">
                                            <div class="mt-3">
                                                <h4><?php echo $row['name']  ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="card m-2">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img src="./images/profile/<?php echo $row1['images'] ?>" alt="<?php echo $row1['name']  ?>" class="rounded-circle" width="120">
                                            <div class="mt-3">
                                                <h4><?php echo $row1['name']  ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                </div>        
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>
    <!-- </div>
</div> -->

</body>
</html>