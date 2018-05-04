<?php 
session_start();
session_destroy();
    
?>
<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    


    <!-- my styles -->
    <link rel="stylesheet"  href="./css/main.css">

    <!-- my php includes -->
    <?php include('./src/header.php'); ?>
    <?php include('./src/upload/upload-modal-template.html'); ?>

</head>

<body>
    <br/>
    <div class="container" id="divMainContainer">
        <div class="row" id="divAlerts">
            <div class="col-lg-12" id="divColAlerts">
                <br/>
                <?php
                    if (isset($_SESSION['upload_message'])) {
                        foreach($_SESSION['upload_message'] as $k=>$v){
                            // 
                            if (strpos($v, 'Sorry') !== false) {
                                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    <strong>Error!</strong> $v.
                                </div>";
                            }else{
                                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                    <strong>Success!</strong> $v.
                                </div>";
                            }
                            
                            
                        }
                    
                    }
                ?> 
            </div>
        </div>
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <div class="col-lg-12" align="center">
                        <h1 id="demo" class="display-8 lead"></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" align="center">
                        <div class="wrapper" id="imgWrapper" >
                            <div id="#output"><img id="myImg" src="https://via.placeholder.com/800x500" class="img-fluid rounded"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-lg-3" align="center">
                        <span id="btnLike" class="fas fa-thumbs-down fa-2x text-primary"></span>
                    </div> -->
                    <div class="col-lg-12" align="center">
                        <span>
                            <button id="btnUpload" class="btn btn-outline-success btn-lg"  data-toggle="modal" data-target="#exampleModal">UPLOAD</button>
                        </span>
                    </div>
                    <!-- <div class="col-lg-3" align="center">
                        <i id="btnLike" class="fas fa-thumbs-up fa-2x text-primary"></i>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <script src='./js/index.js' ></script>

</body>