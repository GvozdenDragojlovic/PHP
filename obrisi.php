<?php
include "Baza.php";
$db = new Baza();
$poruka = "";

if(isset($_POST['obrisi'])){
    $telefon = trim($_POST['telefon']);

    if($db->obrisi($telefon)){
        $poruka = "Uspesno obrisan telefon";
    }else{
        $poruka = "Neuspesno obrisan telefon";
    }

}

$telefoni = $db->pretrazi("SVE", 'asc');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Mobile shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="dodaj.php" class="nav-item nav-link">Dodaj uredjaj</a>
                <a href="izmeni.php" class="nav-item nav-link">Izmeni cenu uredjaja</a>
                <a href="obrisi.php" class="nav-item nav-link">Obrisi uredjaj</a>
            </div>
        </div>  
    </nav>

    <div id="lineH"></div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h3 class="text-primary"><?= $poruka; ?></h3>
            </div>
            <div class="row">
                <form method="post" action="">
                    <label for="telefon">Telefon</label>
                    <select id="telefon" name="telefon" class="form-control">
                        <?php
                        foreach ($telefoni as $telefon){
                            ?>
                        <option value="<?= $telefon->id ?>"><?= $telefon->proizvodjac . " " . $telefon->model ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <hr/>
                    <center><button class="BtnForm" type="submit" name="obrisi">Obrisi uredjaj</button></center>

                </form>
            </div>
            <br/>
            <br/>

        </div>
    </div>
    <div id = "razmak"></div>
    <div id = "footer"></div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        function popuniKomboProizvodjaca() {

            $.ajax({
                url: 'proizvodjaci.php',
                success: function (data) {
                   $("#proizvodjac").html(data);
                }
            });
        }
        popuniKomboProizvodjaca();
    </script>

</body>

</html>