<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION['rollno'])) header('location: index.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Yearbook Portal</title>
    <link rel="stylesheet" href="static/sandstone.min.css">
    <link rel="stylesheet" href="static/style.css">
</head>
<body>
    <?php include('include/_navbar.php'); ?>
    <div class="col-md-6 col-md-push-3">
        <form class="form-horizontal well" id="logInForm">
            <fieldset>
                <legend class="text-center">Please Log In</legend>
                <div class="form-group">
                    <label for="rollno" class="col-md-3 control-label">Roll No.</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="rollno" placeholder="Please enter your rollno">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-3 control-label">LDAP Password</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="password" placeholder="Please enter your LDAP Password">
                    </div>
                </div>
                <div class="form-group text-center">
                    <span id="errLogin" class="text-danger hidden">Invalid Credentials</span>
                    <br>
                    <button type="submit" class="btn btn-lg btn-primary btn-submit">Submit</button>
                </div>  
            </fieldset>
        </form>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="static/script.js"></script>
</html>