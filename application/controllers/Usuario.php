<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model', 'usuario');
    }

    public function index() {
        $parameter = $this->input->get('action');
        switch ($parameter) {
            // ADD FUNCTION
            case 'add';
                $rules = array(                                            // DEFINE AS REGAS DO FORM
                    array(
                        'field' => 'nome',
                        'label' => 'nome',
                        'rules' => 'required|is_unique[USERS.NAME]'
                    ),
                    array(
                        'field' => 'rm',
                        'label' => 'RM',
                        'rules' => 'trim|numeric|required|max_length[6]|is_unique[USERS.RM]'
                    ),
                    array(
                        'field' => 'email',
                        'label' => 'e-mail',
                        'rules' => 'trim|required|valid_email|is_unique[USERS.EMAIL]'
                    ),
                    array(
                        'field' => 'nivel',
                        'label' => 'nível de acesso',
                        'rules' => 'required'
                    ),
                    array(
                        'field' => 'senha',
                        'label' => 'senha',
                        'rules' => 'trim|required'
                    ),
                    array(
                        'field' => 'confsenha',
                        'label' => 'confirmar senha',
                        'rules' => 'trim|required|matches[senha]'
                    )
                );
                $this->form_validation->set_rules($rules);
                $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

                if ($this->form_validation->run() === TRUE) {
                    $data = array(
                        'NAME' => $this->input->post('nome'),
                        'RM' => $this->input->post('rm'),
                        'EMAIL' => $this->input->post('email'),
                        'ACCESS_LEVEL' => $this->input->post('nivel'),
                        'PASSWORD' => $this->input->post('senha')
                    );
                    $query = $this->usuario->store($data);

                    if ($query == TRUE) {
                        $validator['success'] = TRUE;
                        $validator['messages'] = " Usuário adicionado com sucesso.";
                    } else {
                        $validator['success'] = FALSE;
                        $validator['messages'] = " Erro ao adicionar usuário, tente novamente.";
                    }

                } else {
                    $validator['success'] = FALSE;
                    foreach ($_POST as $key => $value) {
                        $validator['messages'][$key] = form_error($key);
                    }
                }
                echo json_encode($validator);
                break;
            // END ADD FUNCTION

            // EDIT FUNCTION
            case 'edit';
                $rules = array(                                            // DEFINE AS REGAS DO FORM
                    array(
                        'field' => 'editNome',
                        'label' => 'nome',
                        'rules' => 'required' //CREATE CALLBACK FOR UNIQUE INPUT
                    ),
                    array(
                        'field' => 'editRm',
                        'label' => 'RM',
                        'rules' => 'trim|numeric|required|max_length[6]' //CREATE CALLBACK FOR UNIQUE INPUT
                    ),
                    array(
                        'field' => 'editEmail',
                        'label' => 'e-mail',
                        'rules' => 'trim|required|valid_email' //CREATE CALLBACK FOR UNIQUE INPUT
                    ),
                    array(
                        'field' => 'editNivel',
                        'label' => 'nível de acesso',
                        'rules' => 'required'
                    )
                );
                $this->form_validation->set_rules($rules);
                $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

                if ($this->form_validation->run() === TRUE) {

                    $id = $this->input->post('editId');
                    $data = array(
                        'NAME' => $this->input->post('editNome'),
                        'RM' => $this->input->post('editRm'),
                        'EMAIL' => $this->input->post('editEmail'),
                        'ACCESS_LEVEL' => $this->input->post('editNivel'),
                    );
                    $query = $this->usuario->store($data, $id);

                    if ($query == TRUE) {
                        $validator['success'] = TRUE;
                        $validator['messages'] = " Usuário editado com sucesso.";
                    } else {

                        $validator['success'] = FALSE;
                        $validator['messages'] = " Erro ao editar usuário, tente novamente.";
                    }

                } else {
                    $validator['success'] = FALSE;
                    foreach ($_POST as $key => $value) {
                        $validator['messages'][$key] = form_error($key);
                    }
                }
                echo json_encode($validator);
                break;
            // END EDIT FUNCTION

            // DELETE FUNCTION
            case 'delete':
                $id = NULL;

                $id = $this->input->post('deleteID');
                $query = $this->usuario->delete($id);

                if ($query == TRUE) {
                    $validator['success'] = TRUE;
                    $validator['messages'] = ' Usuário excluído com sucesso.';
                } else {
                    $validator['success'] = FALSE;
                    $validator['messages'] = ' Erro ao excluir usuário, tente novamente.';
                }
                echo json_encode($validator);

                break;
            // END DELETE FUNCTION

            // DEFAULT FUNCTION
            default;

                $function['accessLevels'] = $this->db->get('ACCESS_LEVELS')->result();
                $this->load->view('includes/html_header');
                $this->load->view('includes/menu_top');
                $this->load->view('gerenciar_usuario', $function);
                $this->load->view('includes/html_footer');
                break;
            // END DEFAULT FUNCTION


        }   // END SWITCH

    }

    public function DataTableUsers($id = NULL) {
        if ($id) {
            $query = $this->usuario->getTableUsers($id);
            $data = array(
                "id" => $query->USERS_ID,
                "nome" => $query->NAME,
                "rm" => $query->RM,
                "email" => $query->EMAIL,
                "nivelacesso" => $query->ACCESS_LEVEL,
            );
            echo json_encode($data);

        } else {
            $query = $this->usuario->getTableUsers();
            $data['data'] = $query;
            echo json_encode($data);
        }
    }   // END DATATABLE

} // END CLASS CONTROLLER