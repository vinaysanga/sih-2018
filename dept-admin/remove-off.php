<?php
    session_start();
    require_once '../db.php';
    if(isset($_SESSION['id_dadmin'])==NULL)
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
                        <li class="active"><a href="view-off.php"><em class="fa fa-user-circle-o">&nbsp;</em> View Officers </a></li>
                        <li><a href="add-dispt.php"><em class="fa fa-file-o">&nbsp;</em> Add Dispatcher</a></li>
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
                    <div class="panel panel-blue">
                        <h3 class="text-center">Remove Officer</h3>
                    </div> 
                    <?php
                    $sql1 = "SELECT * FROM officer WHERE id_officer='$id'";
                        $result1 = $conx->query($sql1);
                        if($result1->num_rows > 0) {
                          while($row1 = $result1->fetch_assoc()) {
                    ?>
                    <form method="post" action="remove-officer.php">
                        <div class="form-group" style="display: none">                            
                            <input type="text" name="id" class="form-control" value="<?php echo $id;?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Officer Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $row1['name'];?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Deparment Name</label>
                            <input type="text" name="dept" class="form-control" value="<?php echo $row1['department'];?>" readonly="">
                        </div>                        
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-success" name="submit" id="submit">Remove Officer</button>
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