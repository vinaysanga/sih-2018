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
	<title>File Tracking System - Dashboard</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/datepicker3.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
	
	<!--Custom Font-->
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
			
			<div class="profile-usertitle">
                            <div class="profile-usertitle-name"><?php echo $_SESSION['name'];?></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"><ul class="nav">
			<li><a href="#"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                        <li><a href="add-off.php"><em class="fa fa-user-circle-o">&nbsp;</em> Add Officer </a></li> 
                        <li><a href="view-off.php"><em class="fa fa-user-circle-o">&nbsp;</em> View Officers </a></li>
                        <li><a href="add-dispt.php"><em class="fa fa-file-o">&nbsp;</em> Add Dispatcher</a></li>
                        <li><a href="view-dispt.php"><em class="fa fa-edit">&nbsp;</em> Edit Dispatcher</a></li>
                        <li><a href="view-files.php"><em class="fa fa-user-circle-o">&nbsp;</em> View Deparmental Files </a></li>
                        <li class="active"><a href="delay_files.php"><em class="fa fa-warning">&nbsp;</em> Delayed Files </a></li>                        
                        <li><a href="../logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul></div>
		
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Delayed Files</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Delayed Files</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
                <div class="col-md-1"></div>
		<div class="col-md-10" style="background: white;padding: 1%">
                    <div class="container-fluid">
                        <h2 style="text-align: center">List of all delayed files :</h2><hr>
                        <table id="example2" class="table table-hover" >
                            <thead>
                                <tr style="border: 1px #000 solid">
                                    <th>File No</th>   
                                    <th>Delayed by</th>  
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                              $sql = "SELECT * FROM files f,officer o WHERE o.id_officer= f.off_to and o.department='$_SESSION[dept]'";
                              $result = $conx->query($sql);
                              if($result->num_rows > 0) {

                                      while($row = $result->fetch_assoc()) {
                                          for($x=1;$x<5;$x++){
                                            $date1=date_create(date("d-m-Y, H:i"));
                                            if($row['createdate']!==NULL){
                                                $date2=date_create(date("d-m-Y, H:i", strtotime($row['createdate'])));
                                                $diff=date_diff($date1,$date2);
                                                if(($diff->format('%a'))>'20'){
                                                ?>
                                                <tr style="border: 1px #000 solid">
                                                    <td><?php echo $row['file_no']?></td>
                                                    <td><?php echo $diff->format('%a').' days'?></td> 
                                                </tr>  
                                              <?php }
                                            }
                                        }
                                    }
                                }
                              ?>
                            </tbody>                    
                        </table> 
                    </div>
                </div>
            </div>  
            <script>
          $(function () {
            $('#example2').DataTable({
              'paging'      : true,
              'lengthChange': true,
              'searching'   : true,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : false
            });
          });
        </script>
		
		<!--/.row-->
		
			<div class="col-sm-12">
				<p class="back-link">Demo Footer</p>
			</div>
		</div><!--/.row-->
</body>
</html>