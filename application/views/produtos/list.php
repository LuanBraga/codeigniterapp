<?php
$this->load->view('template/header');
$this->load->view('template/menu');
?>
<!-- Main component for a primary marketing message or call to action -->
<div class="row">
    <div class="col-lg-12">
        <h1>Lista de Produtos</h1>
        <p>Listagem de produtos</p>
        <br>
        <table class="table table-striped tabela-produto">
            <thead>
                <th>Id</th>
                <th>Produto</th>
                <th>Descrição</th>
                <th>Preço</th>
            </thead>
            <?php foreach($produtos as $produto) : ?>
                <tr>
                    <td><?=$produto->id?></td>
                    <td><?=$produto->produto?></td>
                    <td><?=$produto->descricao?></td>
                    <td><?='R$' . number_format($produto->preco, 2, ',', '.')?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="pagination">
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<style>
    .pagination a, strong {
        padding: 5px;
    }
</style>
<?php $this->load->view('template/footer'); ?>