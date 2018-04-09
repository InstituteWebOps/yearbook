<!DOCTYPE html>
<?php 
session_start();
if(!isset($_SESSION['rollno'])) header('location: login.php')
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fill in Details - Yearbook Portal</title>
    <link rel="stylesheet" href="static/sandstone.min.css">
    <link rel="stylesheet" href="static/style.css">
</head>
<body>
    <?php include('include/_navbar.php'); ?>
    <div class="col-md-6 col-md-push-3">
        <div class="well well-lg">
            <?php 
            if(empty($_POST)) header('Location: details.php');
            $retr = retrieve('SELECT rollno FROM entries WHERE rollno = "'.$_SESSION['rollno'].'";', $conn);
            if(empty($retr)) store($conn, $_POST);
            else update($conn, $_POST);
            
            // print_r($_POST); 
            // print_r(retrieve("SELECT * FROM entries;", $conn));
            // print_r(update($conn, $_POST));
            ?>
                Thank you!
            <hr>
            <a class="btn btn-primary btn-lg text-center" href="details.php">Review changes</a>
        </div>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>