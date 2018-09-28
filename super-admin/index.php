<?php
    session_start();
    require_once '../db.php';
    if(isset($_SESSION['id_sadmin'])==NULL)
    {
        header("location: ../index.php");
    }
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
                            <div class="profile-usertitle-name">Super Admin</div>
                            <div class="profile-usertitle-name"><h5><?php echo $_SESSION['name'];?></h5></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav">
                    <li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                        <li><a href="add-dept.php"><em class="fa fa-file-o">&nbsp;</em> Add Departmental Admin</a></li>
                        <li><a href="edit-dept.php"><em class="fa fa-edit">&nbsp;</em> Edit Department Admin</a></li>                        
                        <li><a href="view-files.php"><em class="fa fa-user-circle-o">&nbsp;</em> View Files </a></li>      
                        
                        
                        <li><a href="../logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
    <!-- Main Section -->
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-database color-gray"></em>
							<div class="large">24</div>
							<div class="text-muted">Total Files</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-user color-orange"></em>
							<div class="large">9</div>
							<div class="text-muted">Department 1</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-user color-teal"></em>
							<div class="large">11</div>
							<div class="text-muted">Department 2</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-user color-red"></em>
							<div class="large">4</div>
							<div class="text-muted">Department 3</div>
						</div>
					</div>
				</div>
				
			</div><!--/.row-->
		</div>
		
		<!--/.row-->
		
			<div class="col-sm-12">
				<p class="back-link">NumeroUno</p>
			</div>
		</div>
   
</body>
</html>