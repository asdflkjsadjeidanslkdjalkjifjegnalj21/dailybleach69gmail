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
$sr = $_REQUEST['sr'];
$niveau = $_REQUEST['niveau'];

$insert = "UPDATE leden SET Niveau = '$niveau', Speciale_rol = '$sr' WHERE Lid_nr = '$lid_nr' ";
            
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