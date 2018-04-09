<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yearbook Portal</title>
    <link rel="stylesheet" href="static/sandstone.min.css">
    <link rel="stylesheet" href="static/style.css">
</head>
<body style="background: url(img/Portal0.jpg)" onload="animat()">
    <?php include('include/_navbar.php'); ?>

    <div class="col-md-8 col-md-push-2">
        <div class="jumbotron">
            <h1 id="1">Hi</h1>
            <h2 id="2">Welcome to Yearbook 2018 Portal!</h2>
            <h5 style="text-align: justify; font-size: 117%">
                Yearbook tries to captures the nostalgic memories of the graduating batch in the form of photos and content related to insti life. Few years from now when you walk down the memory lane, this yearbook will prove to be the light that will lit up the faded memories. It gives you an opportunity to relive the golden days of your life in a creative way, a beautiful chapter that always made the preface of your biography.
                The International and Alumni Relations (IAR) Student Council works every year to publish two separate yearbooks, one for each of the graduating batches of the Undergraduate and Post Graduate students. The yearbook contains message from the Director, the Dean IAR and the Dean of Students (DoST) for the graduating batch. Each year, the International and Alumni Relations (IAR) Student Council strives to make the yearbook as wholesome and complete to touch upon the different prospects of insti life in a humorous way.

            </h5>
            <hr>
            <p class="text-center">
                <?php if(!isset($_SESSION['rollno'])) echo '<a href="login.php" class="btn btn-primary">Log in</a><br><br>'; ?>
                <a class="btn btn-primary"<?php echo (!isset($_SESSION['rollno'])?'disabled':'href="details.php"') ?>>Click here to fill in details for the Yearbook</a>
            </p>
            <div class="row">
                <!-- <a onclick="modOpen('img6')"> -->
                <img src="img/2016reduced.jpg" class="col-md-6 text-left"/>
                <!-- </a> -->
                <img src="img/2017reduced.jpeg" class="col-md-6 text-right"/>
            </div>
            <br>
            <h4 class="text-center">Previous Versions of Yearbook</h4>
        </div>
    </div>
    <?php include('include/_modal.php'); ?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="static/script.js"></script>
</html>