<?php
class RegistrationModel extends CI_Model
{

    function insertData($taj, $hashpassword)
    {
        $this->db->query("INSERT INTO paciens(tajszam,jelszo) VALUES('$taj','$hashpassword')");
    }
}
