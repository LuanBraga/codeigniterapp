<?php
$this->load->view('template/header');
$this->load->view('template/menu');
?>
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <h1>Cadastro de Clientes</h1>
        <p>Cadastro de clientes do sistema</p>
        <div class="col-lg-4">
            <div class="validation">
                <?=validation_errors();?>
            </div>
            <?=form_open('clientes/cadastro')?>
                <div class="form-group">
                    <label for="nome">Nome:</label>

                    <!-- <input class="form-control" type="text" name="nome"> -->

                    <?=form_input(
                        [
                            'name' => 'nome',
                            'class' => 'form-control',
                            'value' => set_value('nome')
                        ])?>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="text" name="email" value="<?=set_value('email')?>" >
                </div>
                <div class="form-group">
                    <label for="cadastrado_em">Cadastrado em:</label>
                    <input class="form-control" type="text" name="cadastrado_em" disabled value=<?=date('d/m/Y')?>>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Cadastrar Cliente</button>
                </div>
            <?=form_close();?>
        </div>
    </div>
</div>
<style>
    .validation {
        color: red;
    }
</style>