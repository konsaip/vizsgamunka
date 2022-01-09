<?php
class PatientDataModel extends CI_Model
{

    public function displaydata()
    {
        $userdata = $this->session->userdata('user');

        $this->db->select('*');
        $this->db->from('paciens');
        $this->db->where('id', $userdata['id']);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update($nev, $lakcim, $telefonszam, $email, $tajszam)
    {

        $userdata = $this->session->userdata('user');

        $data = array(
            'nev' => $nev,
            'lakcim' => $lakcim,
            'telefonszam' => $telefonszam,
            'email' => $email,
            'tajszam' => $tajszam

        );

        $this->db->where('id', $userdata['id']);
        $this->db->update('paciens', $data);
    }

    
}
