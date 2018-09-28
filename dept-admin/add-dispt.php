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
                        <li><a href="add-off.php"><em class="fa fa-user-circle-o">&nbsp;</em> Add Officer </a></li> 
                        <li><a href="view-off.php"><em class="fa fa-user-circle-o">&nbsp;</em> View Officers </a></li>
                        <li class="active"><a href="add-dispt.php"><em class="fa fa-file-o">&nbsp;</em> Add Dispatcher</a></li>
                        <li><a href="view-dispt.php"><em class="fa fa-edit">&nbsp;</em> Edit Dispatcher</a></li>
                        <li><a href="view-files.php"><em class="fa fa-user-circle-o">&nbsp;</em> View Deparmental Files </a></li>
                        <li><a href="../logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
    <!-- Main Section -->
    <div class="container-fluid">                
        <div class="row" style="padding: 3%">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 well">
                    <?php
                        $sql1 = "SELECT * FROM dispatcher WHERE department='$_SESSION[dept]'";
                          $result1 = $conx->query($sql1);
                          if($result1->num_rows == 0) {                                
                    ?>
                    <div class="panel panel-blue">
                        <h3 class="text-center">Add Dispatcher</h3>
                    </div>                    
                    <form method="post" action="add-dept-dispt.php">
                        <div class="form-group">
                            <label>Departmental Dispatcher Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Dispatcher name" required="">
                        </div>
                        <div class="form-group">
                            <label>Dispatcher Department</label>
                            <input type="text" name="dept" class="form-control" value="<?php echo $_SESSION['dept'];?>" readonly="">
                        </div>
                        <div class="form-group">
                            <label>Password (Default  Password is 1234)</label>
                            <input type="password" name="password" class="form-control" value="1234" readonly="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-success" name="submit" id="submit">Add Dispatcher</button>
                        </div>
                    </form>
                    <?php
                      }
                      else
                      {
                          ?>
                    <div class="panel panel-info text-center" style="padding: 3%">
                        <h3 class="text-center">Dispatcher is already Assign to Department <?php echo $_SESSION['dept'];?></h3><br>
                        <a href="view-dispt.php" class="btn btn-danger">View Dispatcher</a>
                    </div> 
                    <?php
                      }
                    ?>
                </div>                 
            </div>    
        </div>
    </div>   
   
</body>
</html>