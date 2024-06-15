<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PakarTani</title>
  <!-- Stylesheet -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet">
 
  <!-- Font awesome -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
  integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!--for adding additional styles-->

</head >

<body @yield('background-styles')>
  <!-- Navbar Area Start -->
        <div class="navbar">
            <h2>PakarTani</h2>
            <div class="right">
            <input type="checkbox" id="check">
            <label for="check" class="checkBtn">
                <i class="fa fa-bars"></i>
            </label>
            <ul class="list">
                <li><a href="/home">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/information">Information</a></li>
                <li><a href="/hargapasar">Market Price</a></li>
                <li><a href="/weather">Weather</a></li>
                <li><a href="/croprecommendation">Crop Recommenadation</a></li>
                <li><a href="/contact">Contact Us</a></li>
            </ul>
            </div> 
        </div>

    <!-- Navbar Area End -->

  @yield('content')
  <!--for adding your content-->

  <!-- Add Footer Area Start -->
    <footer>
        <div class="footer-section">
            <div class="footer-item">
              
            <h2>PakarTani</h2>
            <p><a href="home.html"> Home </a></p>
            <p><a href="about.html"> About Us </a></p>
            <p><a href="informasi.html"> Informasi </a></p>
            <p><a href="cuaca.html"> Cuaca </a></p>
            <p><a href="harga_pasar.html"> Harga pasar </a></p>
            </div>
            <div class="footer-item">
            <h2>Get Help </h2>
            <p><a href=""> FAQ</a></p>
            <p><a href="contact.html"> Contact</a></p>
            </div>
            <div class="footer-item">
            <h2>Information</h2>
            <p><a href=""> Blogs </a></p>
            <p><a href=""> Artikel </a></p>
            </div>
            <div class="footer-item social">
            <h2> Follow Us </h2>
            <p><a href=""><i class="icon fa-brands fa-instagram"></i></a> <a href=""><i class="icon fa-brands fa-linkedin-in"></i></a> <a href=""><i class="icon fa-brands fa-youtube"></i></a> <a href=""><i class="icon fa-brands fa-twitter"></i></a></p>
            </div>
        </div>
    </footer>
  <!-- Add Footer Area End -->

  <!-- **** All JS Files here ***** -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <!--add this to have this scripts on all pages-->
  <!--for adding additional scripts-->

</body>

</html>
