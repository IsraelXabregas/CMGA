<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model
{

    /**
     * Consulta dados para autenticar login.
     * @param $data . Array que contém os campos a serem consultados.
     * @return DB rows
     */
    public function loginDB($data) {
        $this->db->where($data);
        return $this->db->get('USERS')->row();
    }

    /**
     * Grava os dados na tabela.
     * @param $dados = Array que contém os campos a serem inseridos
     * @param Se for passado o $id via parâmetro, é feito UPDATE. Do contrário é feito INSERT
     * @return boolean
     */
    public function store($dados = NULL, $id = NULL) {

        if ($dados) {
            if ($id) {

                $this->db->where('USERS_ID', $id);
                if ($this->db->update('USERS', $dados)) {
                    $this->accessHelper($id, 'Usuários', 'Alterou dados do usuário:');

                    return TRUE;
                } else {
                    return FALSE;
                }
            } else {
                if ($this->db->insert('USERS', $dados)) {
                    // ACCESS LOG FUNCTION
                    $this->load->helper('date');
                    $username = $dados['NAME'];
                    $acessos = array(
                        "USER_ID" => $this->session->userdata('id'),
                        "USER" => $this->session->userdata('nome'),
                        "RM" => $this->session->userdata('rm'),
                        "USER_ACCESSLEVEL" => $this->session->userdata('nivel'),
                        "DATE" => date('Y-m-d H:i:s'),
                        "AREA" => 'Usuários',
                        "EVENT" => "Adicionou ao sistema o usuário: $username"
                    );
                    $this->db->insert("SYSTEM_LOG", $acessos);
                    // END ACCESS LOG FUNCTION

                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        }

    }

    /**
     * Recupera o registro do banco de dados
     * @param $id - Se indicado, retorna somente um registro, caso contário, todos os registros.
     * @return objeto da banco de dados da tabela usuarios
     */
    public function get($id = NULL) {

        if ($id) {
            $this->db->where('USERS_ID', $id);
        }
        $this->db->order_by("NAME", 'asc');
        return $this->db->get('USERS');
    }

    /**
     * Deleta um registro.
     * @param $id do registro a ser deletado
     * @return boolean
     */
    public function delete($id = NULL) {
        if ($id) {
            $this->accessHelper($id, 'Usuários', 'Excluiu o usuário:');

            $query = $this->db->where('USERS_ID', $id);
            $query->delete('USERS');
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Funçao auxiliar para verificar se senha antiga inserida no form coincide com senha existente.
     * @param $id do mulambo cuja senha sera pesquisada
     * @return $password
     */

    public function confirmaPass($id) {

        $this->db->select("senha");
        $this->db->where("id", $id);
        $query = $this->db->get("usuarios");
        return $query->row()->senha;
    }

    public function getTableUsers($id = NULL) {
        if ($id != NULL) {
            $this->db->where('USERS_ID', $id);
            $query = $this->db->get('USERS');
            return $query->row();

        } else {
            $this->db->select();
            $this->db->from('ACCESS_LEVELS');
            $this->db->join('USERS', 'USERS.ACCESS_LEVEL = ACCESS_LEVELS.NIVEL_ID', 'inner');
            return $this->db->get()->result_array();
        }
    }

    public function accessHelper($id = NULL, $area = '', $event = '') {
        $this->load->helper('date');
        $this->db->where('USERS_ID', $id);
        $getAccessUser = $this->db->get('USERS')->row('NAME');

        $acessos = array(
            "USER_ID" => $this->session->userdata('id'),
            "USER" => $this->session->userdata('nome'),
            "RM" => $this->session->userdata('rm'),
            "USER_ACCESSLEVEL" => $this->session->userdata('nivel'),
            "DATE" => date('Y-m-d H:i:s'),
            "AREA" => $area,
            "EVENT" => "$event $getAccessUser"
        );
        $this->db->insert("SYSTEM_LOG", $acessos);
    }
}