<?php
    session_start();
    require_once '../db.php';
    if(isset($_SESSION['id_dadmin'])==NULL)
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
                            <?php
                              $sql = "SELECT department FROM deptadmin WHERE id_admin='$_SESSION[id_dadmin]'";
                              $result = $conx->query($sql);
                              if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                              ?>
                            <div class="profile-usertitle-name">Admin: <?php echo $row['department'];?></div>
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
                        <li class="active"><a href="add-off.php"><em class="fa fa-user-circle-o">&nbsp;</em> Add Officer </a></li> 
                        <li><a href="view-off.php"><em class="fa fa-user-circle-o">&nbsp;</em> View Officers </a></li>
                        <li><a href="add-dispt.php"><em class="fa fa-file-o">&nbsp;</em> Add Dispatcher</a></li>
                        <li><a href="view-dispt.php"><em class="fa fa-edit">&nbsp;</em> Edit Dispatcher</a></li>
                        <li><a href="view-files.php"><em class="fa fa-user-circle-o">&nbsp;</em> View Deparmental Files </a></li>
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
				<li class="active">Add Officer</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Officer</h1>
			</div>
		</div><!--/.row-->
		
                <div class="col-md-4 col-md-offset-4 well">
                    <div class="">
                        <h3 class="text-center">Add Officer</h3>
                    </div> 
                    <form method="post" action="add-officer.php">
                        <div class="form-group">
                            <label>Officer Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Admin name" required="">
                        </div>
                        <div class="form-group">
                            <label>Deparment Name</label>
                            <input type="text" name="dept" class="form-control" value="<?php echo $_SESSION['dept'];?>" readonly="">
                        </div>                        
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary" name="submit" id="submit">Add Officer</button>
                        </div>
                    </form>
                </div>                 
            </div>    
        </div>
    </div>   
   
</body>
</html>