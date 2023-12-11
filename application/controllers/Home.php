<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('captcha');
		$this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
		$this->load->model('login_model');
	}

	public function initCaptcha()
    {
        $img_path = FCPATH.'images/';
        $img_url = str_replace("Home/", "", base_url()) . 'images/';
        $result = true;

        if ($img_path === '' OR $img_url === '')
		{
			$result = FALSE;
		}
        if (!is_dir($img_path))
        {
            $result = FALSE;
        }
        if (!is_really_writable($img_path))
        {
            $result = FALSE;
        }
        if (!extension_loaded('gd'))
        {
            $result = FALSE;
        }

        $data['msg'] = "";
        $captcha = array(
            'word' => rand(9999,99999),
            'word_lenght' => 8,
            'img_path' => $img_path,
            'img_url' => $img_url,
            'font_path' => base_url() . 'system/fonts/texb.ttf',
            'img_width' => '150',
            'img_height' => '38',
            'img_id' => '',
            'word_length' => 8,
            'font_size' => 30,
            'pool' =>  '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' ,
            'expiration' => 3600,
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(37, 150, 190),
                'text' => array(19, 134, 181),
                'grid' => array(146, 182, 249)
            )
        );

        $cap = create_captcha($captcha);
        $data['image'] = $cap['image'] ;
        $data['word'] = $cap['word'] ;
        $this->session->set_userdata('token', $data['word']);
        return $data;
    }

	public function index()
	{
		$data['captcha'] = $this->initCaptcha();
		$data['contenido'] = 'index';
		$data['titulo'] = 'MQ Textil';
		
			switch ($this->session->userdata('perfil'))
        {
            case 0:
				if($data['captcha']['msg'] != ""){
					$this->session->set_flashdata('error','<div class="alert alert-danger"><i class="fa fa-exclamation-triangle" style="padding-right: 10px;"></i>'.$data['captcha']['msg'].'</div>');
				}
                $this->load->view('layout_login', $data);
                break;
            case 1:
                redirect(str_replace("Home/", "", base_url()) .'Inicio/');
                break;
            case 2:
                redirect(str_replace("Home/", "", base_url()) .'Inicio/');
                break;
            case 3:
                redirect(str_replace("Home/", "", base_url()) .'Inicio/');
                break;
            case 4:
                redirect(str_replace("Home/", "", base_url()) .'Inicio/');
                break;
            case 5:
                redirect(str_replace("Home/", "", base_url()) .'Inicio/');
                break;
            case 6:
                redirect(str_replace("Home/", "", base_url()) .'Inicio/');
                break;
            default:
                $this->load->view('layout_login', $data);
                break;
        }
	}

	function getValueUserKey($initKey)
    {
        ob_start();
        $method = 'AES-256-CBC';
        $initKey = str_pad($initKey, 44, "+", STR_PAD_RIGHT);
        $key = base64_decode($initKey);
        $iv = openssl_cipher_iv_length($method);
		$py_path = FCPATH.'application/py/privateKey.py';
		$command = 'python3 '.$py_path;
		system($command);
		$string = ob_get_contents();       
        ob_end_clean();
        $output = openssl_encrypt($string, $method, $key, OPENSSL_RAW_DATA, $iv);
        $strResult = base64_encode($iv.$output);

        return substr($strResult, 0, 32);
    }

	public function validateCredentials()
    {
        $this->form_validation->set_rules('usuario', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|max_length[150]|xss_clean');

        $username = trim($this->input->post('usuario'), " ");
        $password = $this->getValueUserKey(md5(trim($this->input->post('password'), " ")));

        $check_user = $this->login_model->login_user($username, $password);
        echo '<p class="alert alert-success agileits" role="alert">Captura realizada correctamente!</p>';

        if ($check_user == true) {
            $data = [
                'is_logued_in' => true,
                'perfil' => $check_user->IdRol,
                'user' => $check_user->user,
                'name' => $check_user->nombre,
				'area' => $check_user->IdDependencia,
            ];
            $this->session->set_userdata($data);
            $this->index();
        }else{
			$this->session->set_flashdata('usuario_incorrecto', 'Los datos introducidos son incorrectos');
			redirect(str_replace("Home/", "", base_url()), 'refresh');
		}
    }

	public function validar()
    {
		$this->load->library('form_validation');
		$data = new stdClass();

		$this->form_validation->set_rules(array());

		if($this->form_validation->run()){
			$this->validateCredentials();
		}else{
			$this->session->set_flashdata('error','<div class="alert alert-danger"><i class="fa fa-exclamation-triangle" style="padding-right: 10px;"></i>¡Validación reCaptcha incorrecto!</div>');
			redirect(base_url().'login', 'refresh');
		}
    }

	public function logout_ci()
    {
        $this->session->sess_destroy();
        $this->index();
    }
}