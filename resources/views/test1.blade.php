<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register - Previewcode.net</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- Styles -->

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
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            PREVIEWCODE.NET
        </div>
        <form action="" method="POST">     
            {{ csrf_field() }}
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
</body>
<script>
    $(function () {
    	let URL = '{{ route('ajax_post.register') }}'
        $('.js-btn-login').click(function (e) {
			e.preventDefault();
			let $this = $(this);
            // chỉ đến form gần nhất so với  .js-btn-login
			let $domForm = $this.closest('form');

			$.ajax({
				url: URL,
				data: $domForm.serialize(),
                method : "POST",
			}).done(function (results) {
				alert(results);
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
</html>
