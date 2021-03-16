<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-sm-6 mx-auto">
        <div class="row mx-auto">
            <div class="col-sm-6">
                <button type="button" class="btn btn-success btn-sm" id="register" style="width : 200px">Register</button>
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn btn-success btn-sm" id="login" style="width : 200px">Login</button>  
            </div> 
        </div>
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                </div>
                <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                </div>
            </div>
        </div>
        <div class="row"  id="login_form" style="display:none"; >
            <div class="col-sm-12 mx-auto">
                <h4 class="text-center">Log in</h4>
                <form  name="form1" method="post">
                    <div class="form-group">
                        <label for="">Email : </label>
                        <input type="email" class="form-control" name="email" id="email_log" aria-describedby="emailHelpId" placeholder="Email" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Password : </label>
                        <input type="password" class="form-control" name="password" id="password_log" aria-describedby="emailHelpId" placeholder="Password" required="">
                    </div>
                    <input type="button" name="save" class="btn btn-primary" value="Login" id="butlogin">
                </form>
            </div>
        </div>
        <div class="row" id="register_form">
            <div class="col-sm-12 mx-auto">
                <h4 class="text-center">Sign in</h4>
                <form  name="form1" method="post" id="fupForm">
                    <div class="form-group">
                        <label for="">Name : </label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelpId" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="">Email : </label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="">Birthday : </label>
                        <input type="date" class="form-control" name="birthday" id="birthday" aria-describedby="emailHelpId" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Password : </label>
                        <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelpId" placeholder="Password">
                    </div>
                    <button type="button" name="save" class="btn btn-primary" id="butsave">Register</button>
                </form>
            </div>
        </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#login').on('click', function() {
            $("#login_form").show();
            $("#register_form").hide();
        });

        $('#register').on('click', function() {
            $("#register_form").show();
            $("#login_form").hide();
        });

        $('#butsave').on('click', function() {
            $("#butsave").attr("disabled", "disabled");

            var name = $('#name').val();
            var email = $('#email').val();
            var birthday = $('#birthday').val();
            var password = $('#password').val();

            if(name!="" && email!="" && birthday!="" && password!=""){
                $.ajax({
                    url: "signin.php",
                    type: "POST",
                    data: {
                        type : 1,
                        name: name,
                        email: email,
                        birthday: birthday,
                        password: password				
                    },cache: false, success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode==200){
                            $("#butsave").removeAttr("disabled");
                            $('#fupForm').find('input').val('');
                            $("#success").show();
                            $('#success').html('Đăng Ký Thành Công !'); 
                            						
                        }else if(dataResult.statusCode==201){
                            alert("Đã xảy ra lỗi !");
                        }
                            
                    }
                });
            }else{
                alert('Hãy điền tất cả thông tin!');
            }
        });

        $('#butlogin').on('click', function() {
            var email = $('#email_log').val();
            var password = $('#password_log').val();
            if(email!="" && password!="" ){
                $.ajax({
                    url: "signin.php",
                    type: "POST",
                    data: {
                        type:2,
                        email: email,
                        password: password						
                    },cache: false, success: function(dataResult){
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode==200){
                            location.href = "home.php";						
                        }
                        else if(dataResult.statusCode==201){
                            $("#error").show();
                            $('#error').html('Email hoặc mật khẩu không chính xác!');
                        }
                    }
                });
            }
            else{
                alert('Hãy điền tất cả thông tin!');
            }
        });
    });

</script>
    </body>
</html>