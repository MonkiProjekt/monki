<?php session_start(); if (!isset ( $_SESSION ['jrkn'] )) header("Location: /sisene");
$uid = $_SESSION ['jrkn'];
$seeaasta = date('Y');
$seekuu = date('m');

    if (date('m')==12){
        $eelmineaasta = $seeaasta;
        $j2rgmineaasta = date('Y', strtotime('+1 year'));
    } elseif (date('m')==01) {
        $eelmineaasta = date('Y', strtotime('-1 year'));
        $j2rgmineaasta = $seeaasta;
    } else {
        $eelmineaasta = $seeaasta;
        $j2rgmineaasta = $seeaasta;
    }

    if ($seekuu==01) {
        $eelminekuu="31";
    } else {
        $eelminekuu = date('m', strtotime('-1 month'));
    }
$eelminekuusrc = "https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=l3upthkhmrvn5927cjvl4d5r6s%40group.calendar.google.com&amp;color=%23711616&amp;ctz=Europe%2FTallinn&dates=".$eelmineaasta.$eelminekuu."01%2F".$eelmineaasta.$eelminekuu."20";
$j2rgminekuu = date('m', strtotime('+1 month'));
$j2rgminekuusrc = "https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=l3upthkhmrvn5927cjvl4d5r6s%40group.calendar.google.com&amp;color=%23711616&amp;ctz=Europe%2FTallinn&dates=".$j2rgmineaasta.$j2rgminekuu."01%2F".$j2rgmineaasta.$j2rgminekuu."20";




include 'c.php';
$leiaOmanik = mysqli_query($con,"SELECT * FROM users WHERE uid='$uid'") or die(mysqli_error($con));
			if(mysqli_num_rows($leiaOmanik) == 1){
				while($omanikud = mysqli_fetch_array($leiaOmanik)){
					$username = $omanikud[1];
                    $permission = $omanikud[4];
				}
			}


?>
<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monki Management v5.0</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />';
    <link rel="icon" href="favicon.png">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style type="text/css">
	#meilid, #asjad{
        max-height: 800px;
        overflow: scroll 
    }

    #tulemid{
        max-height: 400px;
        overflow:scroll;
    }

	</style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Monki Management v5.0</a><img src="refresh.png" onclick="esimene();teine();" height="40px" style="margin-left: 40px; cursor: pointer;">
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Välju</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input id="otsing" onkeydown="otsi();" type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button" onclick="otsi();">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                                <select id="valik">
                                    <option>
                                        Uued
                                    </option>

                                    <option>
                                        Määratud
                                    </option>
                                    
                                    <option>
                                        Tellimisel
                                    </option>                                                                     
                                    <option>
                                        Tehtud
                                    </option> 
                                </select>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-list-alt fa-fw"></i> Töölaud</a>
                        </li>



<?php  
    if ($permission==1) {


?>
                    <!-- /. siia tuleb igasugust asju mida näeb ainult admin: kasutajate registreerimine, muutmine, statistika jpm -->

                        <li>
                            <a href="/statistika"><i class="fa fa-bar-chart-o fa-fw"></i> Statistika</a>
                        </li>


<?php  
} 
?>


                   
                        <li>
                            <a href="#"><i class="fa fa-calendar fa-fw"></i>Kalender<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>

 
                                  <div>

            <iframe src=<?php echo $eelminekuusrc;?> style="border-width:0" width="250" height="250" frameborder="0" scrolling="no"></iframe>
            </div>
                                <div>
             <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=50ejcuv6grvr17lndu5stgeslk%40group.calendar.google.com&amp;color=%23711616&amp;src=3j64mhqpbjiht37qb7jtotfnjc%40group.calendar.google.com&amp;color=%236B3304&amp;src=1u5fit2lhos80q2p1m95ksj8n8%40group.calendar.google.com&amp;color=%23AB8B00&amp;src=mk213015r75nubu865187gkkr8%40group.calendar.google.com&amp;color=%232F6309&amp;src=eih1mrannutedu2qi21e1l17t4%40group.calendar.google.com&amp;color=%23182C57&amp;src=4vcuk17eks80l3iqfjijggdjho%40group.calendar.google.com&amp;color=%2323164E&amp;ctz=Europe%2FTallinn" style="border-width:0" width="250" height="250" frameborder="0" scrolling="no"></iframe>
            </div>
                                    <div class="kalender">
             <iframe src=<?php echo $j2rgminekuusrc;?> style="border-width:0" width="250" height="250" frameborder="0" scrolling="no"></iframe>
            </div>
                                </li>
                                <li>
                                    <a target="_blank" href="http:/google.com">Lisa kalendrisse midagi</a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


 </ul>
                </div>
                <!-- /.sidebar-collapse -->

           
               
            </div>
            <!-- /.navbar-static-side -->
        </nav>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12" id="tulemid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="tulemused">
                                    
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			 <div class="row">
                <div class="col-lg-6" id="meilid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Uued meilid
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="esimene">
                                    
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6" id="asjad">
                    <div class="panel panel-default">
                        <div class="panel-heading">
						Ülesanded 

                        </div>







                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active" onclick="m22ratud();" id="m22ratud"><a href="#home" data-toggle="tab">Määratud</a>
                                </li>
                                <li onclick="tellimisel();" id="tellimisel" ><a href="#profile" data-toggle="tab">Tellimisel</a>
                                </li>
                                <li onclick="tehtud();" id="tehtud"><a href="#messages" data-toggle="tab">Tehtud</a>
                                </li>
                                    <ul style="float:right;list-style-type: none;margin: 0;padding: 0;list-style-type: none">
                                        <li style="float: left;margin-right: 0px;padding: 0 10px;">
                                       <font size="4">Minu</font>
                                        <input type="checkbox" class="showAll" onclick="" style="width:20px;height:20px; cursor: pointer;">
                                        </li>
                                    </ul>

                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">

                           

                                <div class="tab-pane fade in active" id="home">
                                    
                                        <div class="table-responsive">
                                            <table class="table" id="teine">
                                            </table>
                                        </div>
                                </div>

                                <div class="tab-pane fade in active" id="home">

                                    <div class="table-responsive">
                                            <table class="table" id="teine">
                                            </table>
                                        </div>
                                </div>

                                <div class="tab-pane fade in active" id="home">

                                    <div class="table-responsive">
                                            <table class="table" id="teine">
                                            </table>
                                        </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Meili eelvaade
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" id="eelvaade">
                            <h3> </h3>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
<div id="tlkio" data-channel="monkichatikas" data-nickname="<?php echo $username;?>" data-theme="theme--minimal" style="width:100%;height:400px;"></div><script async src="https://tlk.io/embed.js" type="text/javascript"></script>
					    <!-- /.panel -->
                </div>
				<div class="col-lg-6">
				
                  
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js" type="text/javascript"></script>
	
	<!-- Custom JavaScript -->
    <script src="func.js" type="text/javascript"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });

		esimene();
		teine();
		setInterval(function(){ esimene();teine(); }, 1000);

        if($("#otsing").val() === ""){
            $("#tulemid").css("display","none");
        };


    });
    </script>

</body>

</html>
