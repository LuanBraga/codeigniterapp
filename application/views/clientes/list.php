<?php
$this->load->view('template/header');
$this->load->view('template/menu');
$this->load->helper('url');

?>
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <h1>Lista de Clientes</h1>
        <p>Listagem de clientes</p>

        <?php if ($this->session->tempdata('success_update')) : ?>
            <div class="alert alert-warning"><?=$this->session->tempdata('success_update')?></div>
        
        <?php elseif ($this->session->tempdata('success_delete')) : ?>
            <div class="alert alert-danger"><?=$this->session->tempdata('success_delete')?></div>

        <?php elseif ($this->session->tempdata('success_cadastro')) : ?>
            <div class="alert alert-success"><?=$this->session->tempdata('success_cadastro')?></div>
            
        <?php endif ?>
        
        <a href="clientes/cadastro" class="btn btn-success pull-right">Cadastrar Cliente</a>
        <div class="form-inline">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Sua busca aqui">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Buscar</button>
                </span>
            </div>
        </div>
        <br>
        <table class="table table-bordered table-striped">
            <thead>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Cadastro em</th>
                <th>Adm</th>
            </thead>
            <?php foreach ($clientes as $cliente) : ?>
                <tr>
                    <td><?=$cliente['id']?></td>
                    <td><?=$cliente['nome']?></td>
                    <td><?=$cliente['email']?></td>
                    <td><?=date('d/m/Y', strtotime($cliente['cadastrado_em']))?></td>
                    <td>
                        <a href="<?= site_url(['clientes', 'update', $cliente['id']])?>" class="btn btn-primary">Alterar</a>
                        <a href="<?= site_url(['clientes', 'delete', $cliente['id']])?>" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php $this->load->view('template/footer'); ?>