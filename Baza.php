<?php


class Baza
{
    private $konekcija;

    public function __construct()
    {
        $this->konekcija = new Mysqli('localhost', 'root', '', 'mobileshop');
        $this->konekcija->set_charset('utf8');
    }

    public function pretrazi($proizvodjac, $sort)
    {
        $sql = "SELECT * FROM telefon t join proizvodjac p on t.proizvodjacId = p.proizvodjacId";

        if($proizvodjac != "SVE"){
            $sql .= " WHERE p.proizvodjacId = " . $proizvodjac;
        }

        $sql.= " ORDER BY t.cena " . $sort;

        $resultSet = $this->konekcija->query($sql);

        $rezultati = [];

        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }

        return $rezultati;
    }

    public function vratiProizvodjace()
    {
        $sql = "SELECT * FROM proizvodjac";
        $resultSet = $this->konekcija->query($sql);

        $rezultati = [];

        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }

        return $rezultati;
    }

    public function sacuvaj($model, $godinaLansiranja, $proizvodjac, $cena, $akcija)
    {
        return $this->konekcija->query("INSERT INTO telefon VALUES(null, '$model' , '$godinaLansiranja', $proizvodjac , $akcija, $cena)");
    }

    public function azuriraj($telefonId, $cena, $akcija)
    {
        return $this->konekcija->query("UPDATE telefon SET cena=$cena,akcija=$akcija WHERE id=$telefonId");
    }

    public function obrisi($telefonId)
    {
        return $this->konekcija->query("DELETE FROM telefon WHERE id= $telefonId");
    }
}