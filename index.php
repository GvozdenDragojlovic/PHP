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
                <h1 class="display-5 mb-4">Ponuda</h1>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <center><label for="procitano">Marka</label></center>
                    <select class="form-control" id="marka">
                        <option value="SVE">Svi telefoni</option>
                        <option value="1">Samsung</option>
                        <option value="2">Apple</option>
                        <option value="3">Huawei</option>
                        <option value="4">Xiaomi</option>
                    </select>
                </div>
                <div class="col-md-6">
                <center><label for="sort">Sortiraj po ceni</label></center>
                    <select class="form-control" id="sort">
                        <option value="asc">Rastuce</option>
                        <option value="desc">Opadajuce</option>
                    </select>
                </div>

                <div class="cols-md-12" style="padding-top: 20px">
                    <center><button class="BtnFormP" onclick="pretrazi()">Prikazi ponudu</button></center>
                </div>
            </div>
            <br/>
            <br/>
            <div class="row g-4" id="rezultat" >

            </div>
        </div>
    </div>
    <div id = "razmak"></div>
    <div id = "footer"></div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        function pretrazi() {
            let marka = $("#marka").val();
            let sort = $("#sort").val();

            $.ajax({
                url: 'pretraga.php',
                data: {
                    marka: marka,
                    sort: sort
                },
                success: function (data) {
                    $("#rezultat").html(data);
                }
            });
        }
    </script>
</body>

</html>