<?php
class ReservationModel extends CI_Model
{

    public function displaydata($paciensid)
    {

        $query = "SELECT

        nev,
        idopont,
        oltas_neve,
        keszleten_darab       
        FROM
        paciens
        LEFT JOIN foglalas ON (paciens.id=foglalas.paciensid)
        LEFT JOIN oltasok ON (foglalas.oltasid=oltasok.id)
        LEFT JOIN idopontok ON (foglalas.idopontid=idopontok.id)
        WHERE
        paciensid='$paciensid'";
        $que = $this->db->query($query);
        return $que->row_array();
    }

    public function getDate()
    {

        $query = $this->db->query("SELECT id, idopont FROM idopontok");
        return $query->result_array();
    }

    public function getVaccineName()
    {

        $query = $this->db->query("SELECT id, oltas_neve, keszleten_darab FROM oltasok");
        return $query->result_array();
    }

    public function getReservation()
    {
        $query = $this->db->query("SELECT * FROM foglalas");
        return $query->result_array();
    }




    public function insert($paciensid, $oltasid, $idopontid)
    {

        $this->db->query("INSERT INTO foglalas (paciensid, oltasid, idopontid)
    VALUES ('$paciensid', '$oltasid', '$idopontid')");
    }



    public function reduceQuantity($oltas_neve, $keszleten_darab)
    {
        $data = array(
            'keszleten_darab' => $keszleten_darab - 1,



        );

        $this->db->where('oltas_neve', $oltas_neve);
        $this->db->update('oltasok', $data);
    }



    public function addOneToQuantity($oltas_neve, $keszleten_darab)
    {
        $data = array(
            'keszleten_darab' => $keszleten_darab + 1,



        );

        $this->db->where('oltas_neve', $oltas_neve);
        $this->db->update('oltasok', $data);
    }



    public function delete($paciensid)
    {

        $this->db->query("DELETE FROM foglalas
        WHERE paciensid ='$paciensid' ");
    }

    public function deleteRegistration($paciensid)
    {
        $this->db->query("DELETE FROM paciens
        WHERE id ='$paciensid' ");
    }
}
