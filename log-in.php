<?php
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    header("location: index.php");
    exit;
}

require "db.php";

$lid_nr = $wachtwoord = "";
$lid_nr_err = $wachtwoord_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Checked of lid_nr er is
    if(empty(trim($_POST["lid_nr"]))){
        $lid_nr_err = "Voer lid nummer in.";
    } else{
        $lid_nr = trim($_POST["lid_nr"]);
    }
    
    // checked of het wachtwoord er is
    if(empty(trim($_POST["wachtwoord"]))){
        $wachtwoord_err = "Voer wachtwoord in.";
    } else{
        $wachtwoord = trim($_POST["wachtwoord"]);
    }
    
    // validatie
    if(empty($lid_nr_err) && empty($wachtwoord_err)){

        $sql = "SELECT Niveau, Lid_nr, Wachtwoord FROM leden WHERE Lid_nr = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_lid_nr);
            
            $param_lid_nr = $lid_nr;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                // wachwoord verificatie als lid nummer bestaat
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $niveau, $lid_nr, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($wachtwoord, $hashed_password)){
                            // correct wachtwoord start sessie
                            session_start();
                            
                            // slaat data op in variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["niveau"] = $niveau;
                            $_SESSION["lid_nr"] = $lid_nr;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // wachtwoord bestaat niet
                            $login_err = "fout wachtwoord.";
                        }
                    }
                } else{
                    // lid_nr bestaat niet
                    $login_err = "fout lid nummer.";
                }
            } else{
                echo "Er ging iets mis.";
            }

            // sluit statement
            mysqli_stmt_close($stmt);
        }
    }
}
?>

<head>
<title>Schaakclub de Blauwe Loper</title>
<link rel="icon" type="image/x-icon" href="/images/favicon.ico">

<link rel="stylesheet" href="login.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body class="text-center bg-dark">
<?php 
    if(!empty($login_err)){
        echo '<div class="alert alert-danger">' . $login_err . '</div>';
    }        
?>

<form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <h1 class="h3 mb-3 font-weight-normal text-white">Log in</h1>
                    <label for="lid_nr" class="sr-only">Lid Nummer</label>
                    <input type="lid_nr" name="lid_nr" class="form-control" placeholder="Lid Nummer" required="" autofocus="" value="<?php echo $lid_nr; ?>" oninvalid="this.setCustomValidity('Dit veld is verplicht!')" oninput="setCustomValidity('')">
            </div>    
            <div class="form-group">
                <label for="wachtwoord" class="sr-only">Wachtwoord</label>
                <input type="password" name="wachtwoord" class="mt-2 form-control" placeholder="Wachtwoord" required="" oninvalid="this.setCustomValidity('Dit veld is verplicht!')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <button class="mt-3 btn btn-lg btn-primary btn-block" value="login" type="submit">Log in</button>
            </div>
            <div class="form-group">
                <a class="btn btn-lg btn-danger btn-block" href="index.php">Terug naar startpagina</a>
            </div>
      <p class="mt-5 mb-3 text-white">© 2021 TUU</p>
    </form>
</body>