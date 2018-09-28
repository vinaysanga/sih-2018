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
                        <li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                        <li class="active"><a href="add-dept.php"><em class="fa fa-file-o">&nbsp;</em> Add Department Admin</a></li>
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
                <li class="active">Add Departmental Admin</li>
            </ol>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add Departmental Admin</h1>
            </div>
        </div> 
        <div class="col-md-2"></div>
        <h3 class="text-center">Add Departmental Admin</h3> <hr>
        <div class="col-md-3"></div><div class="col-md-6">
                    <?php   
                    if(isset($_SESSION['loginError'])) {
                      ?>
                      <div>
                        <p class="text-center font-red"><?php echo $_SESSION['loginError'] ?></p>
                      </div>
                    <?php
                     unset($_SESSION['loginError']); }
                    ?> 
                    
                    <?php
                    if(isset($_SESSION['success'])) {
                      ?>
                      <div>
                        <p class="text-center bg-green font-white">Departmental Admin added Sucessfully!</p>
                      </div>
                    <?php
                     unset($_SESSION['success']); }
                    ?> 
                    
                    <form method="post" action="add-dept-admin.php">
                        <div class="form-group">
                            <label>Departmental Admin Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Admin name" required="">
                        </div>
                        <div class="form-group">
                            <label>Enter Admin Department</label>
                            <input type="text" name="dept" class="form-control" placeholder="Enter Department of Admin" required="">
                        </div>
                        <div class="form-group">
                            <label>Password (Default  Password is 1234, you can change it later)</label>
                            <input type="password" name="password" class="form-control" value="1234" readonly="">
                        </div>
                            <button type="submit" class="btn btn-success" name="ssubmit" id="ssubmit">Add Admin</button>
                    </form>
                                
            </div>    
        </div>
    </div>   
</div>
   
</body>
</html>