<?php
    session_start();
    require_once '../db.php';
    if(isset($_SESSION['id_dispatcher'])==NULL)
    {
        header("location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    	<title>File Tracking System</title>

    <link rel="icon" href="../../favicon.ico"><link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/datepicker3.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    
        
    <!-- Custom styles for this template -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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
            <li class="active"><a href="capture.php"><em class="fa fa-user-circle-o">&nbsp;</em> Capture QR </a></li>
            <li><a href="inward-file.php"><em class="fa fa-file-o">&nbsp;</em> Forward File</a></li>
            <li><a href="view-file.php"><em class="fa fa-edit">&nbsp;</em> View File</a></li>  
            <li><a href="../logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div>
                      
    <div class="container">
        <div class="col-md-6">
        <div class="text-center">
            <div id="camera_info"></div>
            <div id="camera"></div><br>
            <button id="take_snapshots" class="btn btn-success btn-sm" type="submit">Capture QR Code</button>
            </div>
        </div>
    </div> <!-- /container -->
  </body>
</html>
<style>
#camera {
  width: 100%;
  height: 350px;
}

</style>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="jpeg_camera/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>
<script>
    var options = {
      shutter_ogg_url: "jpeg_camera/shutter.ogg",
      shutter_mp3_url: "jpeg_camera/shutter.mp3",
      swf_url: "jpeg_camera/jpeg_camera.swf",
    };
    var camera = new JpegCamera("#camera", options);
  
  $('#take_snapshots').click(function(){
    var snapshot = camera.capture();
    snapshot.show();
    
    snapshot.upload({api_url: "action.php"}).done(function(response) {
$('#imagelist').prepend("<tr><td><img src='"+response+"' width='100px' height='100px'></td><td>"+response+"</td></tr>");
}).fail(function(response) {
  alert("Upload failed with status " + response);
});
})

function done(){
    $('#snapshots').html("uploaded");
}
</script>