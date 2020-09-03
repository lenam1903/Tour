<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - Previewcode.net</title>

    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
        
    <!-- Custom CSS -->


    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>



   
  

    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
   




    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .error-form {
            color: red;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>


<body>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Company
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <li><a href="#">Yes</a></li>
          <li><a href="#">No</a></li>
        </ul>
      </div>
    
    

        <button type="button" class="btn btn-primary js-modal-register" >
            Open modal
        </button>


    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" method="POST" id="form-register">
                        @csrf
                        <div class="form-group" style="text-align: left">
                            <label for="email">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                            <span class="error-form"></span>
                        </div>
                        <div class="form-group" style="text-align: left">
                            <label for="email">Email address:</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email">
                            <span class="error-form"></span>
                        </div>
                        <div class="form-group" style="text-align: left">
                            <label for="pwd">Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd">
                            <span class="error-form"></span>
                        </div>
                        <button type="submit" class="btn btn-primary js-btn-login">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    
</body>
<script>
    $(function () {

    	$(".js-modal-register").click(function (event) {
			event.preventDefault();
			$("#myModal").modal('show');
		})
    	
        $('.js-btn-login').click(function (e) {
			e.preventDefault();
            $(".error-form").empty();
			let $this = $(this);
			let $domForm = $this.closest('form');

			$.ajax({
				url: 'dang-ky',
				data: $domForm.serialize(),
                method : "POST",
			}).done(function (results) {
                    // ẩn modal
				$("#myModal").modal('hide');
                alert('Đăng Ký Thành Công');
                    // làm mới lại form khi đăng kí thành công
				$("#form-register")[0].reset();
			}).fail(function (data) {
				var errors = data.responseJSON;
                $(".error-form").empty();
				$.each(errors.errors, function (i, val) {
					$domForm.find('input[name=' + i + ']').siblings('.error-form').text(val[0]);
				});
			});
		});
	})
</script>


<!-- Bootstrap Core JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/my.js"></script>
    <!-- Bootstrap Core JavaScript -->



    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
     
    <!-- Js Plugins -->
        <!-- //ajax -->
    


    
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.zoom.min.js"></script>
    <script src="assets/js/jquery.dd.min.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/main.js"></script>
  

   

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js
    "></script>



</html>

