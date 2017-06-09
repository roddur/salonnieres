<!DOCTYPE html>
<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Give You Glory' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Berkshire Swash' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bubblegum Sans' rel='stylesheet'>
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
    </style>
</head>
<body>
    <div class="container" style="width: 100%">
        <div class="row" style="background-color:black; color:white; padding-left:20px;">
            <h1 class="col-sm-4 title"><a style="text-decoration: none; color: white;" href="/"><span class="titl">Salonnières</span>.com</a></h1>
            <form>
                <input type="text" name="searchfor" class="col-sm-4 form-control" style="margin-top: 30px; width: 40%;border-width: 2px;border-style:solid; border-radius: 8px; padding-left: 5px;" placeholder="Search for..."><br>
                    <button type="submit" class="col-sm-1 btn btn-default" style="margin-top: 10px; margin-bottom: 20px; background-color: yellow;"><span class="glyphicon glyphicon-search"></span> Search</button>
            </form>
            <ul class="nav navbar-nav navbar-right col-sm-2" style="margin-top: -20px;">
                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(route('login')); ?>"  style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="<?php echo e(route('register')); ?>"  style="color: white;"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: white;"><?php echo e(Auth::user()->name); ?> <span class="caret"></span></a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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
  <?php echo $__env->yieldContent('content'); ?>
</body>
</html>