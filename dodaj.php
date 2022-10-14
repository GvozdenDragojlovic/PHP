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

    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status"></div>
        <img class="position-absolute top-50 start-50 translate-middle" src="img/icons/icon-1.png" alt="Icon">
    </div>



    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.php" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="text-primary m-0">Mobile shop</h1>
        </a>
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

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Mobile shop</h4>
                <h3 class="text-primary"><?= $poruka; ?></h3>
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
                    <button type="submit" name="dodaj">Dodaj uredjaj</button>

                </form>
            </div>
            <br/>
            <br/>

        </div>
    </div>
    <div id = "razmak"></div>
    <div class="container-fluid bg-dark text-body footer mt-5 pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">

        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        .
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                    .
                    </div>
                </div>
            </div>
        </div>
    </div>


    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

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