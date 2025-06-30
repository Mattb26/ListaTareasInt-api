<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarea_model extends CI_Model {

    private $table = 'tareas';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Obtener todas las tareas
    public function get_all() {
        return $this->db->get($this->table)->result();
    }

    // Identificar tarea por ID
    public function get($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    // Insertar nueva tarea
    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    // Actualizar tarea
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // Eliminar tarea
    public function delete($id) {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}
