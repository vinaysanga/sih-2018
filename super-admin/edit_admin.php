<?php
    session_start();
    require_once '../db.php';
    if(isset($_SESSION['id_sadmin'])==NULL)
    {
        header("location: ../index.php");
    }
    $id=filter_input(INPUT_GET,'id');
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
                        <li><a href="add-dept.php"><em class="fa fa-file-o">&nbsp;</em> Add Department Admin</a></li>
                        <li class="active"><a href="edit-dept.php"><em class="fa fa-edit">&nbsp;</em> Edit Department Admin</a></li>                        
                        <li><a href="view-files.php"><em class="fa fa-user-circle-o">&nbsp;</em> View Files </a></li>                        
                        <li><a href="../logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
    <!-- Main Section -->
    <div class="container-fluid">                
        <div class="row" style="padding: 3%">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 well">
                    <div class="panel panel-blue">
                        <h3 class="text-center">Edit Departmental Admin</h3>
                    </div>                     
                    <?php
                    $sal="select * from deptadmin WHERE id_admin = '$id'";
                    $result=$conx->query($sal);
                    if($result->num_rows > 0){
                        while ($row=$result->fetch_assoc()){
                    ?>
                    <form method="post" action="save-dept-admin.php">
                        <div class="form-group" style="display: none">                            
                            <input type="text" name="id_admin" class="form-control" value="<?php echo $id;?>">
                        </div>
                        <div class="form-group">
                            <label>Departmental Admin Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $row['name'];?>">
                        </div>
                        <div class="form-group">
                            <label>Enter Admin Department</label>
                            <input type="text" name="dept" class="form-control" value="<?php echo $row['department'];?>">
                        </div>
                        <div class="form-group">
                            <label>Enter New Password </label>
                            <input type="text" name="password" class="form-control" placeholder="Enter New Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-success" name="ssubmit" id="ssubmit">Save Admin</button>
                        </div>
                    </form>
                    <?php
                        }
                    }
                    ?>
                </div>                 
            </div>    
        </div>
    </div>   
   
</body>
</html>