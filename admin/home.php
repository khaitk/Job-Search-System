<?php
    include 'session.php';
    $sql = mysqli_query( $conn ,"select * from user where email = '$email' ");
    $row1 = mysqli_fetch_array($sql,MYSQLI_ASSOC);
    
    //print_r($row1);
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
                <h1>Home</h1>
                
            </main>
        </div>
    </div>
</div>
</body>
</html>