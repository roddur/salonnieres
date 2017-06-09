<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Give You Glory' rel='stylesheet'>
    <title>Salonnières</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        h1.title{
            font-family: 'Give You Glory';
            font-size: 30px;
        }
        span.titl{
            font-size:60px;
        }
        .carousel-inner img {
            width: 100%; /* Set width to 100% */
            margin: auto;
            max-height:200px;
        }

        /* Hide the carousel text when the screen is less than 600 pixels wide */
        @media (max-width: 600px) {
            .carousel-caption {
                display: none; 
            }
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: white;
            border: 1px solid #555;
        }

        li a {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
        }

        li {
            text-align: left;
            border-bottom: 1px solid #555;
        }

        li:last-child {
            border-bottom: none;
        }

        li a:hover {
            background-color: #555;
            color: yellow;
        }
    </style>
</head>
<body>
    <div class="container" style="width: 100%">
        <div class="row" style="background-color:black; color:white; padding-left:20px;">
            <h1 class="col-sm-4 title"><span class="titl">Salonnières</span>.com</h1>
            <form>
                <div class="form-group">
                    <input type="text" name="searchfor" class="col-sm-4 form-control" style="margin-top: 30px; width: 500px;border-width: 2px;border-style:solid; border-radius: 8px; padding-left: 5px;" placeholder="Search for..."><br>
                    <button type="submit" class="col-sm-1 btn btn-default" style="margin-top: 10px; background-color: yellow;"><span class="glyphicon glyphicon-search"></span> Search</button>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right col-sm-2" style="margin-top: -20px;background-color: black;border-style: hidden;">
                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(route('login')); ?>"  style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="<?php echo e(route('register')); ?>"  style="color: white;"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="margin-top: -20px;background-color: black; color:white; border-style: hidden;"><?php echo e(Auth::user()->name); ?> <span class="caret"></span></a>

                                <ul style="margin-top: -20px;background-color: black;border-style: hidden;">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
            </ul>
        </div>
    </div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="https://media.licdn.com/mpr/mpr/AAEAAQAAAAAAAArmAAAAJDk0NTI5NTNkLTkzODktNDc2OS1hNGVhLWY1NTM4YjliMDA4MA.jpg" alt="Image">
                <div class="carousel-caption">
                    <h3>Special Ramadan Offer</h3>
                    <p>Xindian Restaurant</p>
                </div>      
            </div>

            <div class="item">
                <img src="http://www.seattleorganicrestaurants.com/vegan-whole-foods/images/Food-Guidelines.jpg" alt="Image">
                <div class="carousel-caption">
                    <h3>New Arrival: Paprika</h3>
                    <p>Best quality foods</p>
                </div>      
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="well well-lg" style="margin-top: 40px; margin-left: 20px; margin-right: 20px; text-align: center;">
            <h1>Welcome</h1>
            <?php if(Auth::guest()): ?>
                <p>Sign in for the best experience</p>
                <a href="/login" class="btn btn-primary" role="button">Sign in</a><br><br>
                <p>Don't have an account ? <a href="/register">Register Now</a></p>
            <?php else: ?>
            	<p><?php echo e(Auth::user()->name); ?></p>
            <?php endif; ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="well well-lg" style="margin-top: 40px; margin-left: 20px; margin-right: 40px;">
                <h3><strong>Popular Convension Centers</strong></h3>
                <ul>
                <li><a href="\hilbert"> Hilbert's Grand Hotel</a></li>
                    <li><a href="basundhara_cc"> Penguin Restaurant</a></li>
                    <li><a href="sena_kunja">Malibu Cafe</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="well well-lg" style="margin-top: 40px; margin-left: 20px; margin-right: 40px;">
                <h3><strong>Popular Catering Services</strong></h3>
                <ul>
                <li><a href="\hilbert">Lannister's Western Cuisine</a></li>
                    <li><a href="basundhara_cc">Heisenberg's Catering</a></li>
                    <li><a href="sena_kunja">Khaleesi's Special Food Service</a></li>
                </ul>
            </div>
        </div>
    </div>

    </body>
    </html>