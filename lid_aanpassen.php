<?php
    require 'db.php';
    $lid_nr = $_GET['lid_nr'];
    $select = "SELECT * FROM leden WHERE Lid_nr = '$lid_nr'";
    $qry = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($qry);
?>
<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="bg-dark">
        <div class="container">
            <form method="POST" action="lid_edit_send.php" class="text-light mt-4" enctype="multipart/form-data" >
                <div class="form-row bg-dark border-rad p-2">
                    <div class="form-group col-6">
                        <label for="lid_nr">Lid nummer</label>
                            <input type="number" name="lid_nr" id="lid_nr" class="form-control" value="<?php echo $row['Lid_nr'];?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="wachtwoord">Wachtwoord</label>
                            <input type="password" name="wachtwoord" id="wachtwoord" class="form-control">
                    </div>
                    <div class="form-group col-4">
                        <label for="voornaam">Voornaam</label>
                            <input type="text" name="voornaam" id="voornaam" class="form-control" value="<?php echo $row['Voornaam'];?>">
                    </div>
                    <div class="form-group col-4">
                        <label for="tv">Tussenvoegsel</label>
                            <input type="text" name="tv" id="tv" class="form-control" value="<?php echo $row['Tussenvoegsel'];?>">
                    </div>
                    <div class="form-group col-4">
                        <label for="achternaam">Achternaam</label>
                            <input type="text" name="achternaam" id="achternaam" class="form-control" value="<?php echo $row['Achternaam'];?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="geslacht">Geslacht</label>
                            <input type="text" name="geslacht" id="geslacht" class="form-control" value="<?php echo $row['Geslacht'];?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="email">E-mail</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo $row['Email'];?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="T_nr">Telefoon nummer</label>
                            <input type="number" name="T_nr" id="T_nr" class="form-control" value="<?php echo $row['Telefoon_nr'];?>">
                    </div>
                    <div class="form-group col-6">
                        <label for="postcode">Postcode</label>
                            <input type="text" name="postcode" id="postcode" class="form-control" value="<?php echo $row['Postcode'];?>">
                    </div>
                    <div class="form-group col-12">
                        <label for="adres">Adres</label>
                            <input type="text" name="adres" id="adres" class="form-control" value="<?php echo $row['Adres'];?>">
                    </div>
                    
                    <div class="form-group col-6">
                        <input type="submit" name="submit" value="Verzenden" class="btn btn-primary">
                    </div>
                    <div class="form-group order-12 col-6">
                        <a class="btn btn-danger " href="index.php">Annuleren</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>