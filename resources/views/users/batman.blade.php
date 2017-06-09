<!DOCTYPE html>
<html>
<head>
  <title>User Page</title>
  <meta charset="UTF-8">
  <link href='https://fonts.googleapis.com/css?family=Give You Glory' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Berkshire Swash' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bubblegum Sans' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
table.one {
    font-family: arial, sans-serif;
    border: 1px solid black;
    border-collapse: collapse;
    width: 40%; float: left;
}

table.two {
    font-family: arial, sans-serif;
    border: 1px solid black;
    border-collapse: collapse;
    width: 40%; float: right;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(1) {
    background-color: #dddddd;
}
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

<div class="container" style="width: 100%;">
<div class="row" style="background-color:black; color:white; padding-left:20px;">
            <h1 class="col-sm-4 title"><a style="text-decoration: none; color: white;" href="/"><span class="titl">Salonnières</span>.com</a></h1>
            <form>
                <input type="text" name="searchfor" class="col-sm-4 form-control" style="margin-top: 30px; width: 40%;border-width: 2px;border-style:solid; border-radius: 8px; padding-left: 5px;" placeholder="Search for..."><br>
                    <button type="submit" class="col-sm-1 btn btn-default" style="margin-top: 10px; margin-bottom: 20px; background-color: yellow;"><span class="glyphicon glyphicon-search"></span> Search</button>
            </form>
            <ul class="nav navbar-nav navbar-right col-sm-2" style="margin-top: -20px;">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}"  style="color: white;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="{{ route('register') }}"  style="color: white;"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: white;">{{ Auth::user()->name }} <span class="caret"></span></a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
            </ul>

      </div>
<div class="row" style="padding-left:20px;padding-right:10%;">
<figure style="float: left;" class="col-sm-4">
    <img src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png" alt="propic"  width="200" height="220" >
  <figcaption><a style="color:blue;"href="https://www.w3schools.com"> Update profile photo</a></figcaption>
  </figure>

<pre> <font size="4"> 

              <b>Name</b>           : {{ Auth::user()->name }}          <a style="color:blue;"href="https://www.w3schools.com">Edit</a>
        
              <b>E-mail</b>         :  {{ Auth::user()->email }}       <a style="color:blue;"href="https://www.w3schools.com">Edit</a>
      
              <b>Contact Number</b> :  +8801711111111                <a style="color:blue;"href="https://www.w3schools.com">Edit</a>

              <b>Address</b>        :  Palashi,Dhaka                 <a style="color:blue;"href="https://www.w3schools.com">Edit</a> </font></pre>
</div>

<div class="row" style="float: left; padding-left: 10%;">
<table class="col-sm-6">
  <tr>
    <th>Notifications</th>
 
  </tr>
  <?php
    $users = DB::table('booking_info')->where('user', '=', Auth::user()->name)->orderBy('time', 'desc')->get();
    foreach($users as $row) {
        $t=($row->shift==0)?"morning":"evening";
        echo "<tr><td>You have booked succesfully <span style=\"color:blue\">Hilbert Grand Hotel</span> for <b>".$row->booking_date." ".$t."</b> at <b>". $row->time. "</b></td></tr>";
    }
  ?>
  
 
</table>
<table class="col-sm-6">
  <tr>
    <th>Booking History</th>
 
  </tr>
  <tr>
    <td><b style="color:rgb(90, 72, 4)">></b>You booked <a style="color:rgb(86, 63, 255)"href="https://www.w3schools.com">Nibir Khabar</a> on May 20,2017. </td>
    
  </tr>
  <tr>
    <td><b style="color:rgb(90, 72, 4)">></b>You booked <a style="color:rgb(86, 63, 255)"href="https://www.w3schools.com">ABC Club</a> on December 18,2016.</td>
    
  </tr>
  
 
</table>

</div>
</div>

</body>
</html>