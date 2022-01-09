<?php
class LoginModel extends CI_Model
{

    function getTajPassword($taj, $hashpassword)
    {
        $que = $this->db->query("SELECT * FROM paciens WHERE tajszam='$taj' AND jelszo='$hashpassword'");

        return $que->row_array();
    }

    function insertData($taj, $hashpassword)
    {
        $this->db->query("INSERT INTO paciens(tajszam,jelszo) VALUES('$taj','$hashpassword')");
    }
}
