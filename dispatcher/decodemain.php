<!DOCTYPE html>
<?php session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Decoding QR codes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        
</head>
<body class="bg">
    <div class="container">
        <br><br><br>
        <div class="row">
            <div class="col-md-6 offset-md-3" style="background-color: white; padding: 20px; box-shadow: 10px 10px 5px #888;">
                <div class="panel-heading">
                    <h1>Decode QR codes</h1>
                </div>
                <hr>
                <form action="decode.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="qrimage" accept="image/*" id="qrimage" class="form-control"><br>
                    <button type="submit" class="btn btn-md btn-block btn-danger" value="Decode the Code">Decode</button>
                </form>
                
                <?php(if isset($_SESSION['valued']))   {echo $_SESSION['valued'];                unset($_SESSION['valued']);} ?>
            </div>
        </div>
    </div>
    
</body>
</html>