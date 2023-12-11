<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login_user($username, $password)
    {
        $sql = ' SELECT Usuario.IdUser, Usuario.user, Usuario.pass, Usuario.statusUser, Cliente.nombre, Cliente.IdRol, Cliente.IdDependencia';        
        $sql .= ' FROM Usuario ';
        $sql .= ' INNER JOIN Cliente ON Cliente.IdUser = Usuario.IdUser ';
        $sql .= " WHERE Usuario.user = '".$username."' ";
        $sql .= " AND Usuario.pass = '".$password."' ";
        $sql .= " AND Usuario.statusUser = 1 ";

        $query = $this->db->query($sql);

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function consultaInfoConfigValue($strFilter)
    {
        $sql = '';
        $sql .= ' SELECT ';
        $sql .= ' * ';
        $sql .= ' FROM ';
        $sql .= ' gesi_config ';
        $sql .= ' ';
        $sql .= ' WHERE  ';
        $sql = $sql." NombreVariable LIKE '".$strFilter."%' ";
        $sql .= ' AND Activo = 1';
        $sql .= ' ';
        $query = $this->db->query($sql);
        $datos = $query->result();
        for ($c = 0; $c < count($datos); ++$c) {
            $ValorVariable = $datos[$c]->ValorVariable;
        }

        return $ValorVariable;
    }
}
