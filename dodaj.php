<?php
include "Baza.php";
$db = new Baza();
$poruka = "";

if(isset($_POST['dodaj'])){
    $model = trim($_POST['model']);
    $godinaLansiranja = trim($_POST['godinaLansiranja']);
    $proizvodjac = trim($_POST['proizvodjac']);
    $cena = trim($_POST['cena']);
    $akcija = trim($_POST['akcija']);


    if($db->sacuvaj($model, $godinaLansiranja, $proizvodjac, $cena, $akcija)){
        $poruka = "Uspesno sacuvan uredjaj";
    }else{
        $poruka = "Neuspesno sacuvan uredjaj";
    }

}

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
    <center><div><img src="img/logo2.png" id="logo"></div></center>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h3 id="por"><?= $poruka; ?></h3>
            </div>
            <div class="row">
                <form method="post" action="">
                    <label for="model">Model</label>
                    <input type="text" id="model" name="model" class="form-control">
                    <label for="godinaLansiranja">Godina lansiranja</label>
                    <input type="text" id="godinaLansiranja" name="godinaLansiranja" class="form-control">
                    <label for="proizvodjac">Proizvodjac</label>
                    <select id="proizvodjac" name="proizvodjac" class="form-control">

                    </select>

                    <label for="cena">Cena</label>
                    <input type="number" id="cena" name="cena" class="form-control">
                    <label for="akcija">Akcija</label>
                    <select id="akcija" name="akcija" class="form-control">
                        <option value="1">Da </option>
                        <option value="0">Ne </option>
                    </select>
                    <hr/>
                    <center><button class="BtnForm" type="submit" name="dodaj" >Dodaj uredjaj</button></center>

                </form>
            </div>
            <br/>
            <br/>

        </div>
    </div>
    <div><img id="android2" src="img/and.png"></div>
    <div id="lineH"></div>
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