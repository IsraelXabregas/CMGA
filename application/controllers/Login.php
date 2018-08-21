<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model', 'usuario');
    }

    public function index() {
        $parameter = $this->input->get("action");
        switch ($parameter) {
            // LOGIN FUNCTION
            case 'login';
                $validator = array('success' => FALSE, 'messages' => array());
                $rules = array(                                            // REGRAS DO FORM
                    array(
                        'field' => 'rm',                            // CAMPO
                        'label' => 'RM',                            // RÓTULO
                        'rules' => 'trim|required|numeric|min_length[6]|max_length[6]'    // REGRAS = OBRIGATÓRIO, NUMERICO, MAX 6
                    ),
                    array(
                        'field' => 'senha',                          // CAMPO
                        'label' => 'senha',                          // RÓTULO
                        'rules' => 'trim|required'                   // REGRAS = OBRIGATÓRIO
                    )
                );      // END RULES
                $this->form_validation->set_rules($rules);           // SETA REGRAS
                $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

                if ($this->form_validation->run() == TRUE) {      // IF VALIDATION = TRUE
                    $data = array(                                         // RECUPERA AS DADOS DO INPUT
                        "RM" => $this->input->post('rm'),
                        "PASSWORD" => $this->input->post('senha')              // !! LEMBRAR DE PASSAR SENHA PARA MD5!!
                    );

                    $query = $this->usuario->loginDB($data);

                    if (count($query) == 1) {                               // IF QUERY = TRUE
                        $sessiondata = array(                                     // ARRAY DADOS DA SESSÃO BUSCANDO DO DB
                            "id" => $query->USERS_ID,
                            "nome" => $query->NAME,
                            "rm" => $query->RM,
                            "email" => $query->EMAIL,
                            "nivel" => $query->ACCESS_LEVEL,
                            "logged" => TRUE,
                        );
                        $this->session->set_userdata($sessiondata);

                        // ACCESS LOG FUNCTION
                        $this->load->helper('date');
                        $acessos = array(
                            "USER_ID" => $this->session->userdata('id'),
                            "USER" => $this->session->userdata('nome'),
                            "RM" => $this->session->userdata('rm'),
                            "USER_ACCESSLEVEL" => $this->session->userdata('nivel'),
                            "DATE" => date('Y-m-d H:i:s'),
                            "AREA" => 'Login',
                            "EVENT" => "Entrou no sistema"
                        );
                        $this->db->insert("SYSTEM_LOG", $acessos);
                        // END ACCESS LOG FUNCTION

                        $validator['success'] = TRUE;
                        $validator['messages'] = base_url("main");                                   //  DIRECIONA PARA HOME
                    } else {                                    // QUERY = FALSE
                        $validator['success'] = FALSE;
                        $validator['messages'] = ' Usuário ou senha inválidos, tente novamente.';
                    }
                } else {                                // VALIDATION = FALSE
                    $validator['success'] = FALSE;
                    foreach ($_POST as $key => $value) {
                        $validator['messages'][$key] = form_error($key);
                    }
                }
                echo json_encode($validator);
                break;
            // END LOGIN FUNCTION


            // LOGOUT FUNCTION
            case 'logout';
                $this->load->helper('date');
                $acessos = array(
                    "USER_ID" => $this->session->userdata('id'),
                    "USER" => $this->session->userdata('nome'),
                    "RM" => $this->session->userdata('rm'),
                    "USER_ACCESSLEVEL" => $this->session->userdata('nivel'),
                    "DATE" => date('Y-m-d H:i:s'),
                    "AREA" => 'Login',
                    "EVENT" => 'Saiu do sistema'
                );
                $this->db->insert("SYSTEM_LOG", $acessos);

                $this->session->sess_destroy();         // DESTRÓI DADOS DA SESSÃO
                redirect('login');                  // REDIRECIONA PARA A PÁGINA
                break;
            // END LOGOUT FUNCTION


            // DEFAULT FUNCTION
            default;
                $this->load->view('includes/html_header');                  // TEMPLATE HEADER
                $this->load->view('login');                                 // CARREGA A PÁGINA LOGIN
                $this->load->view('includes/html_footer');                  // TEMPLATE FOOTER
                break;
            // END DEFAULT FUNCTION

        }   // END SWITCH
    }   // END INDEX
}   // END CLASS