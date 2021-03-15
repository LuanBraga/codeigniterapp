<?php
$this->load->view('template/header');
$this->load->view('template/menu');
?>
<!-- Main content -->
<div class="row">
    <div class="col-lg-12">
        <h1>Atualização de Clientes</h1>
        <p>Alterar clientes existentes no sistema</p>
        <div class="col-lg-4">
            <div class="validation">
                <?=validation_errors();?>
            </div>
            <?=form_open("clientes/update/$cliente->id")?>
                <div class="form-group">
                    <label for="nome">Nome:</label>

                    <!-- <input class="form-control" type="text" name="nome"> -->

                    <?=form_input(
                        [
                            'name' => 'nome',
                            'class' => 'form-control',
                            'value' => $this->input->post('nome') ?? $cliente->nome
                        ])?>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input class="form-control" type="text" name="email" value="<?=$this->input->post('email') ?? $cliente->email?>" >
                </div>
                <div class="form-group">
                    <label for="cadastrado_em">Cadastrado em:</label>
                    <input class="form-control" type="text" name="cadastrado_em" disabled value=<?=$cliente->getCadastradoEm()?>>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Atualizar Cliente</button>
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