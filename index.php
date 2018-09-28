<?php
    session_start();
    require_once 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>File Tracking System</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
        <script src="js/jquery.min.js"></script>
	<link href="css/custom-font.css" rel="stylesheet">
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
                                <div class="navbar-right"style="padding-top:1%;padding-right:2%">
                                    <a class="link" href="#" style="font-size:18px;text-decoration:none" onclick="document.getElementById('id01').style.display='block'"><em class="fa fa-cogs"></em> Super Admin&nbsp;&nbsp;</a>
                                    <a class="link" href="#" style="font-size:18px;text-decoration:none" onclick="document.getElementById('id02').style.display='block'"><em class="fa fa-users"></em> Dept Admin&nbsp;&nbsp;</a>
                                    <a class="link" href="#" style="font-size:18px;text-decoration:none" onclick="document.getElementById('id03').style.display='block'"><em class="fa fa-user"></em> Dispatcher</a>
                                </div>
			</div>
                    
		</div><!-- /.container-fluid -->
	</nav>
    <!-- Main Section -->
    <div class="container-fluid">                
        <div class="row">        <br>    
                <div class="text-center">
                    <h2 style="font-size:50px;color: royalblue">File<span> Tracking </span>System</h2>
                </div>
            <div class="col-md-12">
                <div style="padding:3%">
                    <img class="img-responsive" width="100%" src="img/file-track.jpg">
                </div>
            </div>            
            </div>
        </div>
    
    <!-- Super Admin Login -->
    <div id="id01" class="modal">
        <div>
            <form method="post" class="modal-content animate" action="check-login-sadmin.php">
            <div class="text-center">
                <h4 class="font-white bg-darkblue" style="padding: 2%">Super Admin Login</h4>
            </div>
          <div class="container">
              <div class="form-group">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" class="form-control" placeholder="Enter Username" name="uname" required>
              </div>
              <div class="form-group">
                    <label for="psw"><b>Password</b></label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="psw" required>
              </div>
              <div class="form-group">
                  <button type="submit" class="form-control btn btn-success" name="ssubmit">Login</button>
              </div>                       
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>            
          </div>
        </form>
        </div>        
      </div>
    
    
    <!-- Admin Login -->
    <div id="id02" class="modal">
        <div>
            <form method="post" class="modal-content animate" action="check-login-dadmin.php">
            <div class="text-center">
                <h4 class="font-white bg-darkblue" style="padding: 2%">Departmental Admin Login</h4>
            </div>
          <div class="container">
              <div class="form-group">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" class="form-control" placeholder="Enter Username" name="aname" required>
              </div>
              <div class="form-group">
                    <label for="psw"><b>Password</b></label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="apsw" required>
              </div>
              <div class="form-group">
                  <button type="submit" class="form-control btn btn-success" name="asubmit">Login</button>
              </div>                       
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>            
          </div>
        </form>
        </div>        
      </div>
    
    
    <!-- Dispatcher Login -->
    <div id="id03" class="modal modal-dialog modal-lg">
        
        <div>
            <form method="post" class="modal-content animate" action="check-login-dispatcher.php">
            <div class="text-center">
                <h4 class="font-white bg-darkblue" style="padding: 2%">Dispatchers Login</h4>
            </div>
          <div class="container">
              <div class="form-group">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" class="form-control" placeholder="Enter Username" name="dname" required>
              </div>
              <div class="form-group">
                    <label for="psw"><b>Password</b></label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="dpsw" required>
              </div>
              <div class="form-group" >
                  <button type="submit" class="form-control btn btn-success" name="dsubmit">Login</button>
              </div>                       
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>            
          </div>
        </form>
        </div>        
      </div>
    </div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
};
</script>

<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
};
</script>

<script>
// Get the modal
var modal = document.getElementById('id03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
};
</script>
<div class="col-sm-12">
    <p class="back-link">NumeroUno</p>
</div>
</body>
</html>