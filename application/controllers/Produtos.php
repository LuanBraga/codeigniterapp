<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends My_Controller
{
    public function index($page=0)
    {
        $this->load->library('pagination');
        $this->load->database();
        $this->require_min_level(1);

        $produtos = $this->db->get('produtos', 5, $page)->result();

        $config['base_url'] = 'http://[::1]/codeigniterapp/index.php/produtos/index';
        $config['total_rows'] = 40;
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        /* $this->pagination->initialize([
            'totals_rows' => $this->db->count_all('produtos'),
            'per_page' => 10,
            'base_url' => '/produtos/index',
            'first_link' => 'primeiro',
            'last_link' => 'último'
        ]); */

        $this->load->view('produtos/list', [
            'produtos'=>$produtos
        ]);
    }

    public function create()
    {
        echo "Cria um produto";
    }
}