<script src="<?= base_url(); ?>assets/js/sys/access.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/DataTables/datatables.min.css"/>
<script src="<?= base_url() ?>assets/DataTables/datatables.min.js"></script>

<div class="col-md-10 col-centered">
    <div class="panel panel-darker">
        <div class="panel-heading text-center">
            <h3 class="panel-title">Log de Acessos e Alterações</h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <button class="btn btn-primary pull-right" href="javascript:void(0)" id="btnRefresh">Atualizar
                    Tabela
                </button>
                <br/>
                <br/>
            </div>
            <div class="table-responsive">
                <table id="tableAcess" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Usuário</th>
                        <th>RM</th>
                        <th>Nível de Acesso</th>
                        <th>Data e Horário</th>
                        <th>Área</th>
                        <th>Ocorrência</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Usuário</th>
                        <th>RM</th>
                        <th>Nível de Acesso</th>
                        <th>Data e Horário</th>
                        <th>Área</th>
                        <th>Ocorrência</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>