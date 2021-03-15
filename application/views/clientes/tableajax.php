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