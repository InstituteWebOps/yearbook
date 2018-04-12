<!DOCTYPE html>
<?php 
session_start();
// $_SESSION['rollno'] = 'ae15b004';
if(!isset($_SESSION['rollno'])) header('location: login.php');

if((int)(substr($_SESSION['rollno'], 2, 2)) > 14 && strtolower(substr($_SESSION['rollno'], 4, 1)) == 'b') die('Sorry. You are not eligible to sign up for the yearbook.');

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
<!-- <body style="background: url(https://www.wallpapersvenue.com/wp-content/uploads/2017/07/white-background-wallpaper.jpg)"> -->
<body style="background: url(img/Portal.jpg)">
    <?php include('include/_navbar.php'); ?>
    <?php

        $retr = retrieve('SELECT * FROM entries WHERE rollno = "'.$_SESSION['rollno'].'";', $conn);
        // echo($retr['rollno']);
        // echo($_SESSION['rollno']);

        if (!empty($retr[0]) && $retr[0]['rollno'] == $_SESSION['rollno'])
        {
            // echo "a";
            $data = $retr[0];
        } else
        {
            // echo "b";
            $data = array(
                'email' => '',
                'first' => '',
                'insti' => '',
                'last' => '',
                'hostel' => '',
                'story' => '',
                'phone' => '',
                'year' => '2018',
                'quote' => '',
                'donate' => '1',
                'bp' => '1'
            );
        }
        // print_r($data);
        // die('end');
    ?>
        <div class="col-md-6 col-md-push-3">
            <form class="form-horizontal" method="POST" action="submit.php" enctype="multipart/form-data" onsubmit="return valid() && true">
                <fieldset>
                    <legend class="text-center">Fill details for the Yearbook</legend>
                    <div class="form-group text-center">
                        <label for="pic" class="col-lg-3 control-label">Your Photo</label>
                        <div class="col-lg-9">
                            <img class="uplDP" width="170" src="<?php echo(file_exists("uploads/".$_SESSION['rollno'].".jpg")?"uploads/".$_SESSION['rollno'].".jpg":"img/default.png")?>">
                            <hr>
                            <small class="text-muted">Your image will be uploaded only after you click on <b>Save Changes button</b> below.</small><br>
                            <small class="text-muted">Maximum file size is 5MB. Please upload only PNG, JPG or JPEG formats.</small>
                            <input type="file" class="fileUpl" id="pic" name="pic">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rollno" class="col-lg-3 control-label">Roll No.</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="rollno" placeholder="Your Roll No." readonly value="<?php echo $_SESSION['rollno']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-lg-3 control-label">Personal email ID</label>
                        <div class="col-lg-9">
                            <input type="email" class="form-control" name="email" required placeholder="Your personal email ID, NOT SMail ID" value="<?php echo $data['email'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="first" class="col-lg-3 control-label">Name</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="first" required placeholder="First Name" value="<?php echo $data['first'] ?>">
                        </div>
                        <div class="col-lg-3">
                            <span class="help-block text-center"></span>
                            <input type="text" class="form-control" name="insti" placeholder="Insti Name" value="<?php echo $data['insti'] ?>">
                            <span class="help-block text-center">(Optional)</span>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="last" required placeholder="Last Name" value="<?php echo $data['last'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hostel" class="col-lg-3 control-label">Hostel</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="hostel" name="hostel">
                            <?php
                            foreach(json_decode(file_get_contents('hostels.json'), 1)['hostels'] as $h)
                            {
                                echo '<option '.($data['hostel']==$h?'selected':'').' value="'.$h.'">'.$h.'</option>
                                ';
                            }
                            ?>
                            </select>
                            <!-- <input type="text" class="form-control" name="hostel" required placeholder="Hostel" value="<?php echo $data['hostel'] ?>"> -->
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="hostel" class="col-lg-3 control-label">Hostel</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" name="hostel" required placeholder="Hostel" value="<?php echo $data['hostel'] ?>">
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="phone" class="col-lg-3 control-label">Mobile No.</label>
                        <div class="col-lg-9">
                            <input type="text" pattern="\d*" class="form-control" maxlength="10" name="phone" required placeholder="Mobile No." value="<?php echo $data['phone'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="year" class="col-lg-3 control-label">Graduating Year</label>
                        <div class="col-lg-9">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="year" id="2018" class="year" value="2018" <?php echo ($data['year']=='2018'?'checked':'') ?>> 2018
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="year" id="2019" class="year" value="2019" <?php echo ($data['year']=='2019'?'checked':'') ?>> 2019
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="quote" class="col-lg-3 control-label">Yearbook Quote</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" rows="2" id="quote" maxlength="96" name="quote" required><?php echo $data['quote'] ?></textarea>
                            <span class="text-muted" id="quoLen">96 characters remaining</span>
                            <span class="help-block">Put something quirky, hillarous, or deep. Or just put whatever identifies you amongst your mates.</span>
                            <a onclick="modOpen('yearbook')">Have a look at some examples!</a>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="story" class="col-lg-3 control-label">One Crazy Insti Story<br>(Optional)</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" rows="3" id="story" name="story" placeholder="It will be kept anonymous."><?php echo $data['story'] ?></textarea>
                            <span class="help-block">Just make sure it does not get too colorful.
                                <br>
                                <!-- <a onclick="modOpen('story')">Some of the tales from your seniors.</a> -->
                            </span>
                        </div>
                    </div>
                    <!-- <hr> -->
                    <div class="form-group">
                        <div class="col-lg-9 col-lg-push-3 batchProj">
                            <div class="checkbox">
                                <label>
                                <input type="hidden" name="donate" value="0"><input type="checkbox" id="donate" name="donate" <?php echo ($data['donate']?'checked="checked"':'') ?> onclick="this.previousSibling.value=1-this.previousSibling.value"> Yes, I would like to donate my caution money for the batch project.
                                </label>
                            </div>
                            <div class="panel panel-success" id="bProj">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Choose your Batch Project from the following: </h3>
                                </div>

                                <div class="panel-body">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="bp" id="Option 1" value="1" <?php echo ($data['bp']=='1'?'checked':'') ?>> New Placement Portal
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input required type="radio" name="bp" id="Option 2" value="2" <?php echo ($data['bp']=='2'?'checked':'') ?>> Sports Scholarship for new students
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="bp" id="Option 3" value="3" <?php echo ($data['bp']=='3'?'checked':'') ?>> Funding of Travel and logistics of CFI Student Teams
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="bp" id="Option 4" value="4" <?php echo ($data['bp']=='4'?'checked':'') ?>> Adopt an athlete
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <a onclick="modOpen('bp')">Click here for detailed description of the Batch Project 2018 proposals.</a>
                            <hr><a onclick="modOpen('tnc')">Terms &amp; Conditions.</a>
                        </div>
                    </div>
                    <!-- <hr class="batchProj"> -->
                    <div class="form-group text-center">
                        <div class="col-lg-9 col-lg-offset-3">
                            <p>You can edit these details until we freeze the portal on <span class = "label label-default">April 20, 2018</span>.<br>
                            Yearbooks will be distributed during <b>Convocation</b> along with gowns.</p>
                            <button type="submit" class="btn btn-lg btn-success btn-submit">Save Changes</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <?php include('include/_modal.php'); ?>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="static/script.js"></script>
<!-- <script>selhostel("<?php //echo $data['hostel'] ?>")</script> -->

</html>
