<?php

class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function totalBayar($id)
    {

        $query = $this->db->query("SELECT sum(jumlah) jumlah FROM troli, user WHERE user.id_user=troli.id_user AND user.email='" . $id . "'");
        $row = $query->row(1);
        return $row;
    }

    function totalBelanja($id)
    {
        $query = $this->db->query("SELECT count(*) total FROM troli, user WHERE user.id_user=troli.id_user AND user.email='" . $id . "'");
        $row = $query->row(1);
        return $row;
    }

    function dataTroli($id)
    {
        $query = $this->db->query("SELECT * FROM troli t, user u, menu m WHERE m.id_menu=t.id_menu AND u.id_user=t.id_user AND u.email='" . $id . "'");
        return $query->result_array();
    }
}
