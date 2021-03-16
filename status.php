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
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="post.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <textarea class="form-control" name="content" id="" rows="5" cols="5" placeholder="<?php echo "Hello, ".$row['name']; ?>"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="file" id="file"  onchange="loadFile(event)" >
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img id="output" width="200" />
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-danger" name="submit">Post</button>
                            </form>
                         </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-sm-12 p-2">
                            <?php
                                $sql1 = "select * from post where id_user = $id  order by time desc";
                                $result = $conn->query($sql1);
                                //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                                //print_r($row);
                                if ($result->num_rows > 0) {
                                    while($row1 = $result->fetch_assoc()) {
                                        echo "<div class='row p-2'>";
                                            echo "<div class='card mb-6'>";
                                                echo "<div class='card-header'><h3 class='float-left'>".$row['name']."</h3> <a href='delete_status.php?id=".$row1['id']." '> <button class='btn float-right'><i class='fa fa-remove'></i></button></a></div>";
                                                echo '<img src="./images/'.$row1["images"].'" alt='.$row["name"].' width="550" class="rounded mx-auto d-block img-fluid">';
                                                echo "<div class='card-body'>";
                                                    echo "<p class='card-text'>".$row1['content']."</p>";
                                                    echo "<p class='card-text'><p class='text-muted'>".$row1['time']."</p></p>";
                                                echo"</div>";
                                                echo "<div class='card-body'>";
                                                    echo "<div class='bg-white'>";
                                                        echo "<div class='d-flex flex-row fs-12'>";
                                                        echo "<div class='like p-2 cursor'><i class='fa fa-thumbs-o-up'></i><span class='ml-1'><a href='like_post.php?id=".$row1['id']." '>Like</a></span></div>";
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
    <script>
    $(document).ready(function(){

// Delete 
$('.delete').click(function(){
  var el = this;
 
  // Delete id
  var deleteid = $(this).data('id');

  var confirmalert = confirm("Are you sure?");
  if (confirmalert == true) {
     // AJAX Request
     $.ajax({
       url: 'delete_status.php',
       type: 'POST',
       data: { id:deleteid },
       success: function(response){

         if(response == 1){
       // Remove row from HTML Table
       $(el).closest('tr').css('background','tomato');
       $(el).closest('tr').fadeOut(800,function(){
          $(this).remove();
       });
         }else{
       alert('Invalid ID.');
         }

       }
     });
  }

});

});
</script>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    </body>
</html>