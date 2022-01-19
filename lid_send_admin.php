<head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require 'db.php';
if(isset($_POST['submit'])){
$lid_nr = $_REQUEST['lid_nr'];
$wachtwoord = $_REQUEST['wachtwoord'];
$voornaam = $_REQUEST['voornaam'];
$tussenvoegsel = $_REQUEST['tv'];
$achternaam = $_REQUEST['achternaam'];
$geslacht = $_REQUEST['geslacht'];
$email = $_REQUEST['email'];
$T_nr = $_REQUEST['T_nr'];
$postcode = $_REQUEST['postcode'];
$adres = $_REQUEST['adres'];
$niveau = $_REQUEST['niveau'];
$sl = $_REQUEST['sl'];
$H_wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

$insert = "INSERT INTO leden VALUES ('$lid_nr', '$H_wachtwoord', '$voornaam', '$tussenvoegsel', '$achternaam', '$geslacht', '$niveau', '$sl', '$email', '$T_nr' , '$postcode','$adres' )";
            
    if(mysqli_query($conn, $insert))
            {                        ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-1">
                    </div>
                    <div class="col bg-dark shut-the-fuck-up-willem block-main">
                        <h4 class="p-2 text-center text-light text-box-margin">
                            Data successvol toegevoegd
                        </h4>
                    </div>
                </div>
            </div>
            <script>
            window.location.replace("leden.php");
            </script>
            <?php
            }
            else
            {
            echo 'Error: '.mysqli_error($conn);
            }
}

?>