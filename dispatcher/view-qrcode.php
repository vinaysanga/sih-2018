<?php
    session_start();
    require_once '../db.php';
    if(isset($_SESSION['id_dispatcher'])==NULL)
    {
        header("location: ../index.php");
    }
    $id = filter_input(INPUT_GET,'id');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>File Tracking System</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/datepicker3.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
        <script src="../js/jquery.min.js"></script>
	<link href="../css/custom-font.css" rel="stylesheet">
        
        
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />        
        <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
        <script type="text/javascript">
        function setChartImage() {
            var query = { cht: "qr", choe: "UTF-8",chs: "300x300", chld: "L",chl: $("#text").val() };
            var url = "http://chart.apis.google.com/chart?" + $.param(query);

            $("#chart").attr('src', url);
            $("#url").val(url);            
        }
        </script>
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">File<span> Tracking </span>System</a>                                
			</div>
                    
		</div><!-- /.container-fluid -->
	</nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">			
			<div class="profile-usertitle text-capitalize"> 
                            <?php
                              $sql = "SELECT department FROM dispatcher WHERE id_dispatcher='$_SESSION[id_dispatcher]'";
                              $result = $conx->query($sql);
                              if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                              ?>
                            <div class="profile-usertitle-name">Dispatcher: <?php echo $row['department'];?></div>
                            <div class="profile-usertitle-name"><h5><?php echo $_SESSION['name'];?></h5></div>
                            <?php
                                }
                              }
                            ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav">
			<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                        <li><a href="add-file.php"><em class="fa fa-user-circle-o">&nbsp;</em> Add File </a></li> 
                        <li><a href="inward-file.php"><em class="fa fa-user-circle-o">&nbsp;</em> Forward File </a></li>
                        <li class="active"><a href="view-file.php"><em class="fa fa-edit">&nbsp;</em> View File</a></li>  
                        <li><a href="../logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
    <!-- Main Section -->
    <div class="container-fluid">                
        <div class="row" style="padding: 3%">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 well">
                    <div class="form-group"> 
                        <label>File Number</label>
                        <input id="text" type="text" name="fileno" class="form-control" value="<?php echo $id; ?>" readonly="">
                    </div>
                    <div class="form-group text-center">
                        <a id="link" href="#"><img id="chart" name="qrimg" src="" alt="QR code is not Generated Yet" /></a> 
                    </div>
                    <button data-theme="b" onclick="setChartImage()">Show QR Code</button>
                </div>
            </div>
        </div>
    </div>  
   
</body>
</html>