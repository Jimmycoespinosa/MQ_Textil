<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("UsuariosModel");
    }

    public function index()
    {
        if ($this->session->userdata('perfil') == false) {
            redirect(str_replace("Home/", "", base_url()));
        }

        $paginaUsuario = $this->session->userdata('user');
        $data['titulo'] = 'Sistemas MQ';
        $data['view'] = 'inicio';
        $this->load->view('layout_ini', $data);
    }

    public function aplicaciones($pag = 1)
    {
        $pag--;
        if($pag < 0)
        {
            $pag = 0;
        }
        $page_size = 8;
        $offset = $pag * $page_size;
        $valorFiltro = (is_null($this->input->get_post('filtro'))?"":$this->input->get_post('filtro'));
        $paginaUsuario = $this->session->userdata('user');
        if ($this->session->userdata('perfil') == false) {
            redirect(str_replace("Home/", "", base_url()));
        }

        $data["current_page"] = $pag + 1;
        $data["apps"] = $this->UsuariosModel->pagination($page_size, $offset, $valorFiltro);
        if($valorFiltro == ""){
            $data["last_page"] = ceil($this->UsuariosModel->countApps()/$page_size);
        }else{
            $data["last_page"] = ceil(count($data["apps"])/$page_size);
        }
        $data['titulo'] = 'Sistemas MQ';
        $data['view'] = 'UsersView';
        $this->load->view('layout_ini', $data);
    }

    public function editApp($id = null)
    { 
        if(!$id == null)
        {
            $appEdit = $this->UsuariosModel->getAplicacion($id);
            $data['appEdit'] = $appEdit;
            $data['titulo'] = 'Sistemas MQ';
            $data['view'] = 'EditarView';
            $this->load->view('layout_ini', $data);
        }
        else
        {
            header("Location:".base_url());
        }
    }

    public function updateApp()
    { 
        if (!$this->input->post('Cancelar'))
        {
            if($this->input->post())
            {
                $Id = $this->input->post('Id');
                $nombre = $this->input->post('nombre');
                $dependencia = $this->input->post('dependencia');
                $ciudad = $this->input->post('ciudad');
                $url = $this->input->post('urlConect');

                $datos = array('nombre'=>$nombre, 'dependencia'=>$dependencia, 'ciudad'=>$ciudad, 'urlConect'=>$url);
                if($this->UsuariosModel->actualizaApp($Id, $datos))
                {
                    echo "Se actualiza";
                    header("Location:".str_replace("Home/", "", base_url())."Inicio/aplicaciones");
                }
                else
                {
                    echo "NO se actualiza";
                    header("Location:".str_replace("Home/", "", base_url())."Inicio/editUser");
                }
            }
            else
            {
                echo "No hay datos...";
                header("Location:".str_replace("Home/", "", base_url())."Inicio/aplicaciones");
            }
        }
        else
        {
            echo "Cancelar";
            header("Location:".str_replace("Home/", "", base_url())."Inicio/aplicaciones");
        }
    }

    public function deleteApp($id = null)
    { 
        if(!$id == null)
        {
            if($this->UsuariosModel->deleteApp($id))
            {
                header("Location:".str_replace("Home/", "", base_url())."Inicio/aplicaciones");
            }
        }
        else{
            header("Location:".str_replace("Home/", "", base_url())."Inicio/aplicaciones");
        }
    }

    public function Usuario()
    {
        if ($this->session->userdata('perfil') == false) {
            redirect(str_replace("Home/", "", base_url()));
        }

        $paginaUsuario = $this->session->userdata('user');
        $data['userSearch'] = (object) array('nombre'=>'', 'email'=>'', 'IdDependencia'=>'', 'IdRol'=>'');
        $data['processRes'] = false;
        $data['titulo'] = 'Sistemas MQ';
        $data['view'] = 'CrearUser';
        $this->load->view('layout_ini', $data);
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
    
    public function crearUsuario()
    {
        if($this->input->post())
        {
            $flowOption = $this->input->post('flowOption');
            if($flowOption == 1){
                echo "Cancelar ...";
                header("Location:".str_replace("Home/", "", base_url())."Inicio/aplicaciones");
            }else{
                if($this->input->post()){
                    $ObjUser['user'] = $this->input->post('user');
                    $ObjUser['pass'] = $this->getValueUserKey(md5(trim($this->input->post('password'), " ")));
                    $ObjUser['ciudad'] = $this->input->post('ciudad');
                    $ObjUser['statusUser'] = $this->input->post('checkState');

                    try{
                        $this->db->trans_begin();
                        $this->UsuariosModel->setUsuario($ObjUser);
                        $id_usuario = $this->db->insert_id();
                        //$this->UsuariosModel->setCliente($datosCli, $id_usuario);
                        $this->db->trans_commit();

                        $data['userSearch'] = (object) array('nombre'=>'', 'email'=>'', 'IdDependencia'=>'', 'IdRol'=>'');
                        $data['processRes'] = true;
                        $data['titulo'] = 'Sistemas MQ';
                        $data['view'] = 'CrearUser';
                        $this->load->view('layout_ini', $data);
                    }
                    catch(Exception $e)
                    {
                        $this->db->trasn_rollback();
                    }
                }else{
                    echo "Inicio ...";
                    header("Location:".str_replace("Home/", "", base_url())."Inicio/aplicaciones");
                }
            }
        }
        else
        {
            echo "No recibe datos ...";
            header("Location:".str_replace("Home/", "", base_url())."Inicio/");
        }
    }
    
    public function consultarUser()
    {
        if($this->input->post())
        {
            $filtroCl = $this->input->post('filtro');
            if($filtroCl != ""){
                $userSearch = $this->UsuariosModel->getUsuariosCli($filtroCl);
                if(count($userSearch)==0){
                    $data['userSearch'] = (object) array('nombre'=>'', 'email'=>'', 'IdDependencia'=>'', 'IdRol'=>'');
                }else{
                    $data['userSearch'] = (object)$userSearch[0];
                }
            }else{
                $data['userSearch'] = (object) array('nombre'=>'', 'email'=>'', 'IdDependencia'=>'', 'IdRol'=>'');
            }
            $data['processRes'] = false;
            $data['titulo'] = 'Sistemas MQ';
            $data['view'] = 'CrearUser';
            $this->load->view('layout_ini', $data);
        }
        else
        {
            echo "No recibe datos ...";
            header("Location:".str_replace("Home/", "", base_url())."Inicio/");
        }
    }

}
