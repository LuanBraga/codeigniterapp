<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->require_min_level(9);
    }
    
    public function index()
    {
        /* $this->load->database(); */
        $this->load->model('cliente');
        

        $clientes = $this->cliente->getAll();

        //direto no controller
        /* $query = $this->db->query('SELECT * FROM clientes');
        //$query->result() = $clientes[0]->nome
        $clientes = $query->result_array(); //clientes[0][nome] */

        $this->load->view('clientes/list', [
            'clientes' => $clientes
        ]);
    }

    public function cadastro()
    {
        $this->load->helper(['form', 'url']);
        $this->load->model('cliente');

        $_SESSION['success_cadastro'] = 'cliente cadastrado com sucesso';

        //direto no controller
        /* $this->load->database(); */

        if($this->cliente->validaForm() === false){
            $this->load->view('clientes/cadastro');
        }
        else {
            //usando query ao invés da funcao insert
            /* $sql = 'INSERT INTO clientes
                        (nome, email, cadastrado_em)
                    VALUES
                        (?, ?, ?)';
            
            $this->db->query($sql, [
                $this->input->post('nome'),
                $this->input->post('email'),
                date('Y-m-d H:i:s')
            ]); */

            //direto no controller usando insert
            /* $insertCliente = $this->db->insert('clientes', [
              'nome' => $this->input->post('nome'),
              'email' => $this->input->post('email'),
              'cadastrado_em' => date('Y-m-d H:i:s')
            ]); */

            $insertCliente = $this->cliente->insert([
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
                'cadastrado_em' => date('Y-m-d H:i:s')
            ]);

            if($insertCliente){
                $this->session->mark_as_temp('success_cadastro', 1);
                redirect('clientes');
            }
            else{
                show_error('Erro ao cadastrar cliente');
            }
        }
    }

    public function update($id)
    {
        $this->load->helper(['form', 'url']);
        $this->load->model('cliente');

        $_SESSION['success_update'] = 'Cliente atualizado com sucesso';

        $cliente = $this->cliente->get($id);

        if($this->cliente->validaForm() === false)
        {
            $this->load->view('clientes/update', [
                'cliente' => $cliente
            ]);
        }
        else{
            $update = $this->cliente->update([
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email')
            ], $id);

            if($update)
            {
                $this->session->mark_as_temp('success_update', 1);
                redirect('clientes');
            }
            else{
                show_error('Erro ao atualizar cliente');
            }
        }
    }

    public function delete($id)
    {
        $this->load->helper('url');
        $this->load->model('cliente');

        $_SESSION['success_delete'] = 'cliente deletado com sucesso';

        if($this->cliente->delete($id))
        {
            $this->session->mark_as_temp('success_delete', 1);
            redirect('clientes');
        }
        else{
            show_error('Erro ao excluir');
        }
    }

    public function search($busca)
    {
        $this->load->helper('url');
        $this->load->model('cliente');

        $clientes = $this->cliente->search($busca);

        $this->load->view('clientes/tableajax', [
            'clientes' => $clientes
        ]);
    }
}