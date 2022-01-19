<head>
<!--title and icon of the webpage-->
<title>Schaakclub de Blauwe Loper</title>
<link rel="icon" type="image/x-icon" href="/images/favicon.ico">

    <!--Requirements-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body class="bg-dark">

<?php
    $niveau = "0";
    session_start();
if(isset($_SESSION['loggedin']))
{
    $niveau = $_SESSION["niveau"];
}
?>

<!--start navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-dark ">
<!--toogle button if the navbar can't be fully shown-->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

    <a class="navbar-brand" href="index.php">
        <img src="/images/logo.png" width="30" height="30" alt="">
    </a>
<!-- checks if user is logged in-->
<?php if( $niveau >= "1") {  ?>

<!--navbar items (links to other pages)-->
  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link text-light" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="svk.php">Schaken voor kinderen</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="leden.php">Leden</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="wedstrijd.php">Wedstrijden</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="loguit.php">Log uit</a>
      </li>
<?php }elseif( $niveau >= "9") {?>
    <!--navbar items (links to other pages)-->
  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link text-light" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="svk.php">Schaken voor kinderen</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="leden.php">Leden</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="wedstrijd.php">Wedstrijden</a>
      </li>

    <li class="nav-item">
        <a class="nav-link text-light" href="wedstrijd.php">Wedstrijden</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="loguit.php">Log uit</a>
      </li>

      
      <!--checks if hte the user is not logged in-->
<?php } else { ?>
    <!--navbar items (links to other pages)-->
  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link text-light" href="index.pph">Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="svk.php">Schaken voor kinderen</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="log-in.php">Login</a>
      </li>
<?php } ?>
</div>

</nav>

<!--end navbar-->