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
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">File<span> Tracking </span>System</a>                                
			</div>
                    
		</div><!-- /.container-fluid -->
	</nav>
  <body>
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
            <li class="active"><a href="inward-file.php"><em class="fa fa-file-o">&nbsp;</em> Forward File</a></li>
            <li><a href="view-file.php"><em class="fa fa-edit">&nbsp;</em> View File</a></li>  
            <li><a href="../logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div>
      
                      
    <div class="container">
        <div class="col-md-3"></div>
        <div class="col-md-6">            
            <form method="post" action="forward.php">
                        <div class="form-group">
                        <label>File No .</label>
                        <input id="text" type="text" name="fileno" class="form-control" value="<?php
                        if (isset($_SESSION['valued']))
                            {echo $_SESSION['valued']; 
                            unset($_SESSION['valued']);}
                            ?>" readonly="">
    
                        </div>
                        <div class="form-group">
                            <label>Officer From</label>
                            <select name="officerfrom" class="form-control input-lg">
                                <option value="" selected="">Select Officer</option>
                                <?php
                                    $sql1 = "SELECT * FROM officer WHERE department='$_SESSION[dept]'";
                                    $result1 = $conx->query($sql1);
                                    if($result1->num_rows > 0) {
                                      while($row1 = $result1->fetch_assoc()) {
                                    ?>
                                <option value="<?php echo $row1['id_officer'];?>"><?php echo $row1['name'];?>-<?php echo $row1['department'];?></option>>
                                  
                                  <?php
                                      }
                                    }
                                  ?>
                            </select>
                        </div>                        
                        <div class="form-group">
                            <label>Officer To</label>
                            <select name="officerto" class="form-control input-lg">
                                <option value="" selected="">Select Officer</option>
                                <?php
                                    $sql2 = "SELECT * FROM officer";
                                    $result2 = $conx->query($sql2);
                                    if($result2->num_rows > 0) {
                                      while($row2 = $result2->fetch_assoc()) {
                                    ?>
                                <option value="<?php echo $row2['id_officer'];?>"><?php echo $row2['name'];?>-<?php echo $row2['department'];?></option>>
                                  
                                  <?php
                                      }
                                    }
                                  ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control" placeholder="Status of File" required="">
                        </div>         
                        <div class="form-group">
                            <label>Active</label>
                            <input type="text" name="status" class="form-control" placeholder="Status of File" required="">
                        </div> 
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-success" name="submit" id="submit">Go</button>
                        </div>
                    </form>
            <?php if (isset($_SESSION['success']))
                {echo $_SESSION['success'];                
                unset($_SESSION['success']);} 
                else if (isset($_SESSION['fail'])){
                    
                    echo $_SESSION['fail'];                
                unset($_SESSION['fail']);
                }?>
            
        </div>
        </div>
    </div> <!-- /container -->
  </body>
</form>
</html>