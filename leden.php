<!DOCTYPE html>
<?php
        require 'db.php'; ?>
    <head>
        <meta charset="utf-8mb4" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
    </head>
<script>
                    $(document).ready(function(){
                        $('.container input[type="text"]').on("keyup input", function(){
                            var inputVal = $(this).val();
                            var resultDropdown = $(this).siblings(".row");
                            if(inputVal.length){
                                $.get("search.php", {term: inputVal}).done(function(data){
                                resultDropdown.html(data);
                                });
                            }
                            else
                            {
                                $.get("search.php", {term: inputVal}).done(function(data){
                                resultDropdown.html(data);
                                });
                            }
                    });
    
        $(document).on("click", ".result p", function(){
        $(this).parents(".container").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
        <?php require 'navbar.php' ?>
        <div class="container">
            <input type="text" class="form-control" autocomplete="off" placeholder="Zoeken...." />
            <div class="row">
                            <?php                            
                            $sql = mysqli_query($conn, "SELECT * FROM leden ORDER BY Lid_nr Asc");
                            if ($sql -> num_rows > 0)
                            {
                                while($row = $sql->fetch_assoc())
                                {
                                    echo "<div class='col-3 bg-dark boek-container-2'>";
                                    echo "<p class='text-light'>Lid nummer: " . $row['Lid_nr'] ."</p>";
                                    echo "<p class='text-light'>Voornaam: " . $row['Voornaam'] ."</p>";
                                    echo "<p class='text-light'>Tussenvoegsel: " . $row['Tussenvoegsel'] ."</p>";
                                    echo "<p class='text-light'>Achternaam: " . $row['Achternaam'] ."</p>";
                                    echo "<p class='text-light'>Geslacht: " . $row['Geslacht'] ."</p>";
                                    echo "<p class='text-light'>Email: " . $row['Email'] ."</p>";
                                    echo "<p class='text-light'>Telefoon nummer: " . $row['Telefoon_nr'] ."</p>";
                                    echo "<p class='text-light'>Postcode: " . $row['Postcode'] ."</p>";
                                    echo "<p class='text-light'>Adres: " . $row['Adres'] ."</p>";
                                    echo "<p class='text-light'>Speciale rol: " . $row['Speciale_rol'] ."</p>";
                                    if($niveau == "3")
                                    {
                                    echo  "<a href='lid_aanpassen.php?lid_nr=" . $row['Lid_nr'] . "'class='details-btn btn btn-primary'>Aanpassen</a>";
                                    echo "</div>";
                                    }
                                    elseif($niveau == "9")
                                    {
                                    echo  "<a href='lid_aanpassen.php?lid_nr=" . $row['Lid_nr'] . "'class='details-btn btn btn-primary'>Aanpassen</a>";
                                    echo  "<a href='niveau_aanpassen.php?lid_nr=" . $row['Lid_nr'] . "'class='details-btn btn btn-primary'>Niveau aanpassen</a>";
                                    echo "</div>";   
                                    }
                                    else
                                    {
                                    echo "</div>";
                                    }
                                }
                            }
                            ?>
                </div>
        </div>
                <?php require 'footer.php' ?>

</html>