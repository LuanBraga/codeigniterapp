<?php
class Cliente extends CI_Model
{
    public $table = 'clientes';

    public function __construct()
    {
        parent:: __construct();
        $this->load->database();
        
    }

    public function get($id)
    {
        $cliente = $this->db->get_where($this->table, ['id' => $id]);
        return $cliente->custom_row_object(0, 'Cliente');
    }

    public function getAll()
    {
        $clientes = $this->db->get($this->table);
        return $clientes->result_array();
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function insert(array $data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update(array $data, $id)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function validaForm()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[4]|max_length[40]');

        return $this->form_validation->run();
    }

    public function getCadastradoEm()
    {
        return date('d/m/Y', strtotime($this->cadastrado_em));
    }

    public function search($string)
    {
        $clientes = $this->db->like('nome', $string)
                                ->or_like('email', $string)
                                ->get($this->table);

        return $clientes->result_array();
    }
}