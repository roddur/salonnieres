<?php $__env->startSection('contentstyle'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="well well-sm col-sm-8" style="padding-left: 20px;">
    <h2 style=" font-family: 'Berkshire Swash';">Hilbert's Grand Hotel</h2>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox" style="height: 30%;">
            <div class="item active">
                <img src="https://www.ias.edu/sites/default/files/styles/grid_feature_teaser/public/images/featured-thumbnails/ideas/Pires_Hilbert%27s-Grand-Infinite-Hotel.png?itok=K_yyuJRb" alt="Image">
            </div>
            <div class="item">
                <img src="http://4.bp.blogspot.com/-C36gWMMvU5o/Uej41doGFeI/AAAAAAAAAxQ/j_75Z-UcvVI/w1200-h630-p-k-no-nu/Doboz-Interior-Party_2.jpg" alt="Image">
            </div>
            <div class="item">
                <img src="http://ichef.bbci.co.uk/food/ic/food_16x9_608/recipes/roasted_tomato_cod_with_43906_16x9.jpg" alt="Image">
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
    <h3 class="bg-info" style="font-family: 'Bubblegum Sans';">
    About this place</h4>
    <p><br><strong>Address:</strong><br>
        Mathworld, Imagi-nation<br><br>
        <strong>Phone: </strong>0123456789<br><br>
    </p>
</div>
<?php
    $month = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
?>
<div class="well well-sm col-sm-4" style="padding-left: 20px;">
    <h3 class="bg-info" style="font-family: 'Bubblegum Sans';">
    Select Date for Booking</h4>
    <form>
        <b>Pick Date:</b><br>
        <input type="date" id="booking_day"><br>
        <b>Shift:</b><br>
        <div class="radio-inline">
      <label><input type="radio" name="optradio" id="m">Morning</label>
    </div>
    <div class="radio-inline">
      <label><input type="radio" name="optradio" checked="">Evening</label>
    </div>
        <br>
        <button type="button" class="btn btn-default" onclick=book(this)>Show Date Info</button>
    </form>
    <!--h2><?php echo $month[intval(date('m'))].", ".date('Y')?></h2>
    <table class="table">
    <thead>
      <tr>
        <th>Sun</th>
        <th>Mon</th>
        <th>Tue</th>
        <th>Wed</th>
        <th>Thu</th>
        <th>Fri</th>
        <th>Sat</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
            /*$i=intval(date('w', strtotime(date('Y-m-01'))));
            $wc=$i;
            for(;$i>0;$i--){
                echo "<td></td>";
            }
            $k=intval(date("t", strtotime(date('Y-m-d'))));
            for($i=1;$i<=$k;$i++){
                if($wc%7==0)echo "</tr><tr>";
                echo "<td onclick=showWaitingList(this)>$i</td>";
                $wc++;
            }*/
        ?>
    </tr>
   </tbody>
  </table-->
  <p id="waitingmsg"></p>
</div>
<script>
function showWaitingList(id) { 
    document.getElementById("waitingmsg").innerHTML=id.innerHTML;
}
function book(id) {
    if(id.innerHTML=="Book"){
    if(<?php echo Auth::guest()==1?1:0; ?>){
        document.getElementById("waitingmsg").innerHTML="Please Sign in with an account.";
    }
    else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("waitingmsg").innerHTML = JSON.parse(this.responseText);
        }
        else document.getElementById("waitingmsg").innerHTML="Please provide a valid date";
        };
        var x = document.getElementById("booking_day").value;
        var s = document.getElementById("m").checked?0:1;
        xhttp.open("GET", "/test?sid=1&booking_day="+x+"&shift="+s, true);
        xhttp.send();
    }
    } else {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(JSON.parse(this.responseText)=="No"){
                document.getElementById("waitingmsg").innerHTML = "This schedule is already booked";
            } else {
                document.getElementById("waitingmsg").innerHTML = JSON.parse(this.responseText)+" has booked in this schedule";
                id.innerHTML="Book";
            }
        }
        else if (this.readyState == 4) document.getElementById("waitingmsg").innerHTML="Please provide a valid date";
        };
        var x = document.getElementById("booking_day").value;
        var s = document.getElementById("m").checked?0:1;
        xhttp.open("GET", "/check?sid=1&booking_day="+x+"&shift="+s, true);
        xhttp.send();
    }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>