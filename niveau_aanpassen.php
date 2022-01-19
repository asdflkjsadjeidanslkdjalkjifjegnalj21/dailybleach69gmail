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
            <form method="POST" action="niveau_edit_send.php" class="text-light mt-4" enctype="multipart/form-data" >
                <div class="form-row bg-dark border-rad p-2">
                    <div class="form-group col-4">
                        <label for="lid_nr">Lid nummer</label>
                            <input type="number" name="lid_nr" id="lid_nr" class="form-control" value="<?php echo $row['Lid_nr'];?>">
                    </div>
                    <div class="form-group col-4">
                        <label for="niveau">Niveau</label>
                            <input type="text" name="niveau" id="niveau" class="form-control" value="<?php echo $row['Niveau'];?>">
                    </div>
                    <div class="form-group col-4">
                        <label for="sr">Speciale rol</label>
                            <input type="text" name="sr" id="sr" class="form-control" value="<?php echo $row['Speciale_rol'];?>">
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