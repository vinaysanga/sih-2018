<?php
    session_start();
    require_once '../db.php';
    if(isset($_SESSION['id_dispatcher'])==NULL)
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
        
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />        
        <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
        <script type="text/javascript">
        function setChartImage() {
            var query = { cht: "qr", choe: "UTF-8",chs: "100x100", chld: "L",chl: $("#text").val() };
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
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">View File</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">View File</h1>
			</div>
		</div><!--/.row--><div class="col-md-9 col-md-offset-1 well">
                    <div class="">
                        <h3 class="text-center">View Files</h3>
                        <hr>
                    </div> 
                    <div>
                        <div class="container-fluid">
                            <table id="example2" class="table table-hover">
                                <thead>
                                    <th>File No</th>
                                    <th>Departmental Officer</th>
                                    <th>Status</th> 
                                    <th>Action</th>                                    
                                </thead>
                                <tbody>
                                  <?php 
                                  $sql1 = "SELECT * FROM files f,officer o WHERE o.id_officer= f.off_to and o.department='$_SESSION[dept]' ";
                                  $result1 = $conx->query($sql1);
                                  if($result1->num_rows > 0) {
                                    while($row1 = $result1->fetch_assoc()) {
                                  ?>
                                    <tr>
                                        <td id="text" onload="setChartImage()"><?php echo $row1['file_no']; ?></td>
                                        <td><?php echo $row1['name']; ?></td>
                                        <td><?php echo $row1['status']; ?></td>
                                        <td><a href="view-qrcode.php?id=<?php echo $row1['file_no'];?>">View QR Code</a></td>
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