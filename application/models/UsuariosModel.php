<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//IMPLEMENTACIÓN QUERY BUILDER
class UsuariosModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getUsarios()
    {
        $sql = $this->db->get("users")->result();//JE- Igual a 'SELECT * FROM TABLE'
        //echo $this->db->get_compiled_select();
        return $sql;
        //return $this->db->select('name, email');//Algnos campos nada más.
        //return $this->db->get("users",5,2)->result();//JE- Con límites.
        //return $this->db->get_where("users", array("estatura" => $estatura), 5,2)->result();//JE- Con Condición.
    }
    public function getMaxId()
    {        
        $this->db->select('id', 'name', 'email');
        $this->db->select_max("id");//Máximo
        //$this->db->select_mim("id");//Mínimo
        //$this->db->select_avg("id");//Promedio
        //$this->db->select_sum("id");//Suma
        $sql = $this->db->get("users")->result();
        return $sql;
    }

    public function getMinId()
    {        
        $this->db->from('users');//Se puede seleccionar la tabla.
        $this->db->select_min("id");//Máximo
        $sql = $this->db->get()->result();
        return $sql;
    }

    public function setUsuario(array $datos)
    {        
        $sql = $this->db->insert('Usuario', $datos);
        return $sql;
    }

    public function setCodigo(int $id_usuario, string $codigo)
    {        
        $datos = array('code'=>$codigo);        
        return $this->db->where('id', $id_usuario)->update('users', $datos);
    }

    public function getUsuario(int $id_usuario)
    {
        return $this->db->where('id', $id_usuario)->get('users')->row();
    }

    public function actualizaUsuario(int $id_usuario, array $datos)
    {        
        //print_r($datos);
        return $this->db->where('id', $id_usuario)->update('users', $datos);        
    }

    public function deleteUser(int $id)
    {
        return $this->db->where('id', $id)->delete('users');
    }

    public function countUsers()
    {
        $sql = $this->db->count_all_results('users');
        return $sql;
    }

    public function countApps()
    {
        $sql = $this->db->count_all_results('Aplicaciones');
        return $sql;
    }

    public function pagination(int $page_size, int $offset, string $valorFiltro)//Registros/Núm Pag.
    {
        if($valorFiltro == ""){
            $sql = $this->db->limit($page_size, $offset)->get("Aplicaciones")->result();
        }else{
            $sql = $this->db->like('nombre', $valorFiltro)->limit($page_size, $offset)->get("Aplicaciones")->result();
        }
        return $sql;
    }

    public function getAplicacion(int $id_app)
    {
        return $this->db->where('Id', $id_app)->get('Aplicaciones')->row();
    }

    public function actualizaApp(int $id_usuario, array $datos)
    {        
        return $this->db->where('Id', $id_usuario)->update('Aplicaciones', $datos);        
    }

    public function deleteApp(int $id)
    {
        return $this->db->where('Id', $id)->delete('Aplicaciones');
    }

    public function getCliente(string $valorFiltro)
    {
        if($valorFiltro != ""){
            $sql = $this->db->like('nombre', $valorFiltro)->limit(1, 1)->get("Aplicaciones")->result();
        }
        return $sql;
    }
    
    public function getUsuariosCli(string $valorFiltro)
    {
        $sql = "";
        if($valorFiltro != ""){
            $sql = $this->db->like('nombre', $valorFiltro)->limit(1)->get("Cliente")->result();
        }
        return $sql;
    }
}