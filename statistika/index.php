<?php session_start(); if (!isset ( $_SESSION ['jrkn'] )) header("Location: ../sisene");
$uid = $_SESSION ['jrkn'];
include '../c.php';
$leiaOmanik = mysqli_query($con,"SELECT * FROM users WHERE uid='$uid'") or die(mysqli_error($con));
			if(mysqli_num_rows($leiaOmanik) == 1){
				while($omanikud = mysqli_fetch_array($leiaOmanik)){
					$username = $omanikud[1];
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

    <title>Monki Statistika</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style type="text/css">
	.valitud{
		color:blue
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
                <a class="navbar-brand" href="../">Monki Statistika</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Välju</a>
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
                        <li>
                            <a href="../"><i class="fa fa-dashboard fa-fw"></i> Töölaud</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Statistika<span class="fa arrow"></span></a>
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
                <h3>Töötajate statsitika</h3>
				<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Nädalas läbi töötatud meilid
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="342" version="1.1" width="758" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><text x="50.5" y="308" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan></text><path fill="none" stroke="#aaaaaa" d="M63,308H732.5" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="50.5" y="237.25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">7,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M63,237.25H732.5" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="50.5" y="166.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M63,166.5H732.5" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="50.5" y="95.75" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">22,500</tspan></text><path fill="none" stroke="#aaaaaa" d="M63,95.75H732.5" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="50.5" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30,000</tspan></text><path fill="none" stroke="#aaaaaa" d="M63,25H732.5" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="608.8775758189458" y="320.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2016</tspan></text><text x="311.9396992557339" y="320.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2015</tspan></text><path fill="#7cb57c" stroke="none" d="M63,257.8807C81.70267961115893,252.69236666666666,119.10803883347678,241.92430907701018,137.8107184446357,237.12736666666666C156.52187231026278,232.32825074367685,193.94418004151686,226.0632520069808,212.65533390714393,219.49646666666666C231.17157992000404,212.99808534031413,268.20407194572425,186.8057303509781,286.72031795858436,184.86669999999998C305.02470760974126,182.9498553509781,341.6334869120551,202.66269737424625,359.937876563212,204.07296666666667C378.64055617437094,205.51392237424625,416.04591539668877,195.31197573801433,434.7485950078477,196.27159999999998C453.4597488734748,197.23165907134765,490.88205660472886,228.78622565445028,509.5932104703559,211.7517C528.109456483216,194.89461732111693,565.1419485089363,68.92819836728465,583.6581945217963,60.705166666666656C602.1659662801883,52.48589836728464,639.1815097969723,133.9253336597586,657.6892815553642,145.9825C676.3919611665232,158.16664199309193,713.7973203888411,154.748425,732.5,157.6704L732.5,308L63,308Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#4da74d" d="M63,257.8807C81.70267961115893,252.69236666666666,119.10803883347678,241.92430907701018,137.8107184446357,237.12736666666666C156.52187231026278,232.32825074367685,193.94418004151686,226.0632520069808,212.65533390714393,219.49646666666666C231.17157992000404,212.99808534031413,268.20407194572425,186.8057303509781,286.72031795858436,184.86669999999998C305.02470760974126,182.9498553509781,341.6334869120551,202.66269737424625,359.937876563212,204.07296666666667C378.64055617437094,205.51392237424625,416.04591539668877,195.31197573801433,434.7485950078477,196.27159999999998C453.4597488734748,197.23165907134765,490.88205660472886,228.78622565445028,509.5932104703559,211.7517C528.109456483216,194.89461732111693,565.1419485089363,68.92819836728465,583.6581945217963,60.705166666666656C602.1659662801883,52.48589836728464,639.1815097969723,133.9253336597586,657.6892815553642,145.9825C676.3919611665232,158.16664199309193,713.7973203888411,154.748425,732.5,157.6704" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="63" cy="257.8807" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="137.8107184446357" cy="237.12736666666666" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="212.65533390714393" cy="219.49646666666666" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="286.72031795858436" cy="184.86669999999998" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="359.937876563212" cy="204.07296666666667" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="434.7485950078477" cy="196.27159999999998" r="5" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="509.5932104703559" cy="211.7517" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="583.6581945217963" cy="60.705166666666656" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="657.6892815553642" cy="145.9825" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="732.5" cy="157.6704" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#a8b4bd" stroke="none" d="M63,282.8507333333333C81.70267961115893,277.1765833333333,119.10803883347678,265.12319508305023,137.8107184446357,260.15413333333333C156.52187231026278,255.18282008305022,193.94418004151686,245.80603333333332,212.65533390714393,243.0892333333333C231.17157992000404,240.4007333333333,268.20407194572425,240.71864155159187,286.72031795858436,238.53293333333335C305.02470760974126,236.37223321825854,341.6334869120551,228.73527071215938,359.937876563212,225.7036C378.64055617437094,222.60596237882604,416.04591539668877,213.88719994526235,434.7485950078477,214.01569999999998C453.4597488734748,214.1442582785957,490.88205660472886,239.86184799301918,509.5932104703559,226.73183333333333C528.109456483216,213.73858965968586,565.1419485089363,117.2267462806134,583.6581945217963,109.52266666666665C602.1659662801883,101.82211294728006,639.1815097969723,157.02553252106583,657.6892815553642,165.1133C676.3919611665232,173.28624085439915,713.7973203888411,172.20245,732.5,174.5655L732.5,308L63,308Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#7a92a3" d="M63,282.8507333333333C81.70267961115893,277.1765833333333,119.10803883347678,265.12319508305023,137.8107184446357,260.15413333333333C156.52187231026278,255.18282008305022,193.94418004151686,245.80603333333332,212.65533390714393,243.0892333333333C231.17157992000404,240.4007333333333,268.20407194572425,240.71864155159187,286.72031795858436,238.53293333333335C305.02470760974126,236.37223321825854,341.6334869120551,228.73527071215938,359.937876563212,225.7036C378.64055617437094,222.60596237882604,416.04591539668877,213.88719994526235,434.7485950078477,214.01569999999998C453.4597488734748,214.1442582785957,490.88205660472886,239.86184799301918,509.5932104703559,226.73183333333333C528.109456483216,213.73858965968586,565.1419485089363,117.2267462806134,583.6581945217963,109.52266666666665C602.1659662801883,101.82211294728006,639.1815097969723,157.02553252106583,657.6892815553642,165.1133C676.3919611665232,173.28624085439915,713.7973203888411,172.20245,732.5,174.5655" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="63" cy="282.8507333333333" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="137.8107184446357" cy="260.15413333333333" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="212.65533390714393" cy="243.0892333333333" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="286.72031795858436" cy="238.53293333333335" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="359.937876563212" cy="225.7036" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="434.7485950078477" cy="214.01569999999998" r="5" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="509.5932104703559" cy="226.73183333333333" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="583.6581945217963" cy="109.52266666666665" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="657.6892815553642" cy="165.1133" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="732.5" cy="174.5655" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><path fill="#2677b5" stroke="none" d="M63,282.8507333333333C81.70267961115893,282.5866,119.10803883347678,284.44200846734617,137.8107184446357,281.7942C156.52187231026278,279.14519180067947,193.94418004151686,262.8357682373473,212.65533390714393,261.66346666666664C231.17157992000404,260.5033765706806,268.20407194572425,274.71556887226694,286.72031795858436,272.4646333333333C305.02470760974126,270.2394522056003,341.6334869120551,245.9788035264484,359.937876563212,243.75900000000001C378.64055617437094,241.49089519311505,416.04591539668877,252.16698982634958,434.7485950078477,254.513C453.4597488734748,256.8600731596829,490.88205660472886,273.6770883071554,509.5932104703559,262.53133333333335C528.109456483216,251.501679973822,565.1419485089363,172.73112096780346,583.6581945217963,165.81136666666666C602.1659662801883,158.8947793011368,639.1815097969723,199.39613870037198,657.6892815553642,207.18596666666667C676.3919611665232,215.05783036703866,713.7973203888411,223.14009166666668,732.5,228.45813333333334L732.5,308L63,308Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path><path fill="none" stroke="#0b62a4" d="M63,282.8507333333333C81.70267961115893,282.5866,119.10803883347678,284.44200846734617,137.8107184446357,281.7942C156.52187231026278,279.14519180067947,193.94418004151686,262.8357682373473,212.65533390714393,261.66346666666664C231.17157992000404,260.5033765706806,268.20407194572425,274.71556887226694,286.72031795858436,272.4646333333333C305.02470760974126,270.2394522056003,341.6334869120551,245.9788035264484,359.937876563212,243.75900000000001C378.64055617437094,241.49089519311505,416.04591539668877,252.16698982634958,434.7485950078477,254.513C453.4597488734748,256.8600731596829,490.88205660472886,273.6770883071554,509.5932104703559,262.53133333333335C528.109456483216,251.501679973822,565.1419485089363,172.73112096780346,583.6581945217963,165.81136666666666C602.1659662801883,158.8947793011368,639.1815097969723,199.39613870037198,657.6892815553642,207.18596666666667C676.3919611665232,215.05783036703866,713.7973203888411,223.14009166666668,732.5,228.45813333333334" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><circle cx="63" cy="282.8507333333333" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="137.8107184446357" cy="281.7942" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="212.65533390714393" cy="261.66346666666664" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="286.72031795858436" cy="272.4646333333333" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="359.937876563212" cy="243.75900000000001" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="434.7485950078477" cy="254.513" r="5" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="509.5932104703559" cy="262.53133333333335" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="583.6581945217963" cy="165.81136666666666" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="657.6892815553642" cy="207.18596666666667" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle><circle cx="732.5" cy="228.45813333333334" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle></svg><div class="morris-hover morris-default-style" style="left: 377.913px; top: 150px;"><div class="morris-hover-row-label">2016 Q2</div><div class="morris-hover-point" style="color: #0b62a4">
  Markus:
  5,670
</div><div class="morris-hover-point" style="color: #7A92A3">
  Raul:
  4,293
</div><div class="morris-hover-point" style="color: #4da74d">
  Roman:
  1,881
</div></div></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js" type="text/javascript"></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
		esimene();
		teine();
    });
    </script>

</body>

</html>
