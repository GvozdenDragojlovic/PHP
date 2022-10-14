<?php
include 'Baza.php';
$db = new Baza();

$podaci = $db->vratiProizvodjace();

foreach ($podaci as $proizvodjac){

    ?>
    <option value="<?= $proizvodjac->proizvodjacId ?>"><?= $proizvodjac->proizvodjac ?> </option>

<?php
}
?>