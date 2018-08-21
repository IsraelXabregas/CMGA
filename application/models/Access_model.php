<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Access_model extends CI_Model
{
    public function getTableAccess() {
        $this->db->select();
        $this->db->from('ACCESS_LEVELS');
        $this->db->join('SYSTEM_LOG', 'SYSTEM_LOG.USER_ACCESSLEVEL = ACCESS_LEVELS.NIVEL_ID', 'inner');
        $this->db->order_by('DATE', 'desc');
        return $this->db->get()->result_array();
    }
}