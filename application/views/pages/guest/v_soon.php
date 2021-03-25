<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
  
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Prinneo.com</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
    <!-- CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- Add icon library -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="images/favicon.ico" rel="shortcut icon">
</head>

<body >

 <!-- baner -->
 <div class="row">
  <div class="col-md-7 p-4">
    <img src="img/under_construction.svg" alt="" width="100%">
  </div>
  <div class="col-md-5 p-4">
    <h1 class="p-2 text-info font-weight-bold text-center">SEDANG DALAM PEMBANGUNAN</h1>
    <h4 class="p-2 text-center">Kami akan segera hadir dengan hal-hal yang menarik untuk anda</h4>
    <br>
<!--     <div class="row justify-content-center">
      <div class="col-2 btn btn-info mx-1" >
        <h1 id="hari"></h1>
        <h5>Days</h5>
      </div>
      <div class="col-2 btn btn-info mx-1" >
        <h1 id="jam"></h1>
        <h5>Hrs</h5>
      </div>
      <div class="col-2 btn btn-info mx-1" >
        <h1 id="menit"></h1>
        <h5>Min</h5>
      </div>
      <div class="col-2 btn btn-info mx-1" >
        <h1 id="detik"></h1>
        <h5>Sec</h5>
      </div>
    </div> -->

  </div>
</div>
<center> 

 <small id="demo" style="color: black" hidden> </small>

</center>
<script>
// Set the date we're counting down to
var countDownDate = new Date("May 26, 2020 23:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  document.getElementById("hari").innerHTML = days ;
  document.getElementById("jam").innerHTML = hours ;
  document.getElementById("menit").innerHTML = minutes ;
  document.getElementById("detik").innerHTML = seconds ;

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED" ;
    document.getElementById("hari").innerHTML = "EXPIRED" ;
    document.getElementById("jam").innerHTML = "EXPIRED" ;
    document.getElementById("menit").innerHTML = "EXPIRED" ;
    document.getElementById("detik").innerHTML = "EXPIRED" ;
  }
}, 1000);
</script>
</body>

</html>