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
         <link rel="stylesheet" href="../css/jquery.dataTables.min.css">    
    <script src="../js/jquery.dataTables.min.js"></script>
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
                        <li><a href="view-rejected-files.php"><em class="fa fa-user-circle-o">&nbsp;</em> View Rejected Files </a></li>
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
				<li class="active">View Officers</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">View Officers</h1>
			</div>
		</div><!--/.row-->
		          <div class="col-md-8 col-md-offset-1 well">
                    <div class="">
                        <h3 class="text-center">View Files</h3>
                    </div> 
                    <div>
                        <div class="container-fluid">
                            <table id="example2" class="table table-hover">
                                <thead>
                                    <th></th>
                                    <th>Officer Name</th>
                                    <th>Department</th>
                                    <th>Action</th>                                   
                                </thead>
                                <tbody>
                                  <?php
                                  $sql = "SELECT * FROM officer WHERE department='$_SESSION[dept]'";
                                  $result = $conx->query($sql);
                                  if($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                  ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['department']; ?></td>                                        
                                        <td><a href="edit-off.php?id=<?php echo $row['id_officer'];?>">Edit</a>&nbsp;|&nbsp;<a href="remove-off.php?id=<?php echo $row['id_officer'];?>">Remove</a></td>
                                    </tr>  
                                 <?php
                                    }
                                  }
                                  ?>
                                </tbody>                    
                            </table> 
                        </div>
                    </div>
                    
                    
                </div>                 
            </div>    
        </div>
    </div>   
 <script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
</script>   
</body>
</html>