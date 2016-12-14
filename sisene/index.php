<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sisene Süsteemi</title>
    

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

     <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-heading" style="display: flex; justify-content: center;">
                            <img src="logo.svg" alt="Monki Management mascot" height=100px>
                        </div>
                        <h3 align="middle" class="panel-title">Palun sisene meie süsteemi</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="javascript:void(0);">
						<span id="mess" style="color: red"></span>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Kasutaja" id="username" type="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Parool" id="pwd" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Pea mind meeles">Hoia mind sisse logituna
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
								<button class="btn btn-lg btn-success btn-block" name="Submit" value="Sisenege" id="Submit">Sisenege</button>
							</fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

	<script>
	$(document).ready(function() {

		$("#Submit").click(function(){
		var username = $("#username").val();
		var pwd = $("#pwd").val();
		
		$.post("../checkAcc.php",
			{
				username: username,
				pwd: pwd
			},
			function(data, status){
				if(data == "success"){
					window.location.replace("..");
					
				}else{
					$("#mess").html("Kahjuks ei klapi meie andmed!");
				}
			});
		});
	});
	</script>
</body>

</html>
