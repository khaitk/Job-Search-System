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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
                            <form action="editprofile.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">My image : </label>
                                    <input type="file" name="file" id="fileToUpload" onchange="loadFile(event)" >
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img id="output" width="200" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Name : </label>
                                    <input type="text" class="form-control" name="name" id=""  placeholder="Name" value="<?php echo $row['name'];  ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Email : </label>
                                    <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="Email" value="<?php echo $row['email'];  ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Birthday : </label>
                                    <input type="date" class="form-control" name="date" id="" aria-describedby="emailHelpId" placeholder="" value="<?php echo $row['birthday'];  ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Password : </label>
                                    <input type="password" class="form-control" name="pwd" id="" aria-describedby="emailHelpId" placeholder="Password" value="<?php echo $row['password']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone : </label>
                                    <input type="text" class="form-control" name="phone" id=""  placeholder="Phone" value="<?php echo $row['phone'];  ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Address : </label>
                                    <input type="text" class="form-control" name="address" id=""  placeholder="Address" value="<?php echo $row['address'];  ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Work : </label>
                                    <input type="text" class="form-control" name="work" id=""  placeholder="work" value="<?php echo $row['work'];  ?>">
                                </div>
                                <button type="submit" name="submit" class="btn btn-danger">Edit</button>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Website : </label>
                                    <input type="text" class="form-control" name="website" id=""  placeholder="Website" value="<?php echo $row['website'];  ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Github : </label>
                                    <input type="text" class="form-control" name="github" id=""  placeholder="Github" value="<?php echo $row['github'];  ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Facebook : </label>
                                    <input type="text" class="form-control" name="facebook" id="" placeholder="Facebook" value="<?php echo $row['facebook'];  ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Twitter : </label>
                                    <input type="text" class="form-control" name="twitter" id=""  placeholder="Twitter" value="<?php echo $row['twitter']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Instagram : </label>
                                    <input type="text" class="form-control" name="instagram" id=""  placeholder="Phone" value="<?php echo $row['instagram'];  ?>">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
</body>
</html>