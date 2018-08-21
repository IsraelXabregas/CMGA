<script src="<?= base_url(); ?>assets/js/sys/users.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/DataTables/datatables.min.css"/>
<script src="<?= base_url() ?>assets/DataTables/datatables.min.js"></script>

<div class="col-md-9 col-centered">
    <div class="panel panel-darker">
        <div class="panel-heading">
            <h3 class="panel-title text-center">Gerenciar Usuários do Sistema</h3>
        </div>
        <div class="panel-body">
            <div class="messages"></div>
            <button class="btn btn-sm btn-primary" id="btnUsuario" data-toggle="modal" data-target="#modalAddUser"
                    onclick="addUser()">Novo
                Usuário
            </button>
            <br/>
            <br/>
            <div class="table-responsive">
                <table id="tableUsers" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>RM</th>
                        <th>E-mail</th>
                        <th>Nível de Acesso</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>RM</th>
                        <th>E-mail</th>
                        <th>Nível de Acesso</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div> <!-- Panel body div-->
    </div> <!-- Panel div-->
</div> <!-- Main div-->

<!-- MODALS-->

<!--ADD USER-->
<div class="modal fade" id="modalAddUser">
    <div class="ajax-loader hidden">
        <img src="<?= base_url() ?>images/ajax-loader.gif" class="img-responsive"/>
    </div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header label-primary" style="color: white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Adicionar Usuário</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="usuario?action=add" id="formAddUser">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input class="form-control" id="nome" name="nome" placeholder="Digite o nome">
                    </div>
                    <div class="form-group">
                        <label for="rm">RM</label>
                        <input class="form-control" id="rm" name="rm" placeholder="Digite o RM">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input class="form-control" id="email" name="email" placeholder="Digite o e-mail">
                    </div>
                    <div class="form-group">
                        <label for="editNivel">Nível de acesso</label>
                        <select class="form-control" id="nivel" name="nivel">
                            <option value="">Selecione nível de acesso</option>
                            <? foreach ($accessLevels as $level) { ?>
                                <option value="<?= $level->NIVEL_ID ?>"><?= $level->NIVEL ?></option>
                            <? } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha"
                               placeholder="Digite a senha">
                    </div>
                    <div class="form-group">
                        <label for="confsenhasenha">Confirmar senha</label>
                        <input type="password" class="form-control" id="confsenha"
                               name="confsenha" placeholder="Digite a confimação da senha">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> FECHAR
                        </button>
                        <button type="submit" class="btn btn-primary" id="btn_salvar">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> SALVAR
                        </button>
                    </div>
                </form>
            </div> <!-- modal-body -->

        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->
<!-- END ADD USER-->

<!-- EDIT USER-->
<div class="modal fade" id="modalEditUser">
    <div class="ajax-loader hidden">
        <img src="<?= base_url() ?>images/ajax-loader.gif" class="img-responsive"/>
    </div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header label-warning" style="color: white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Usuário</h4>
            </div>
            <div class="modal-body">

                <form method="post" action="usuario?action=edit" id="formEditUser">
                    <div class="form-group">
                        <label for="editNome">Nome</label>
                        <input class="form-control" id="editNome" name="editNome" placeholder="Digite o nome">
                    </div>
                    <div class="form-group">
                        <label for="editRm">RM</label>
                        <input class="form-control" id="editRm" name="editRm" placeholder="Digite o RM">
                    </div>
                    <div class="form-group">
                        <label for="editEmail">E-mail</label>
                        <input class="form-control" id="editEmail" name="editEmail" placeholder="Digite o e-mail">
                    </div>
                    <div class="form-group">
                        <label for="editNivel">Nível de acesso</label>
                        <select class="form-control" id="editNivel" name="editNivel">
                            <? foreach ($accessLevels as $level) { ?>
                                <option value="<?= $level->NIVEL_ID ?>"><?= $level->NIVEL ?></option>
                            <? } ?>
                        </select>
                    </div>
                    <input class="hidden" id="editId" name="editId">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> CANCELAR
                        </button>
                        <button type="submit" class="btn btn-primary" id="btn_editSalvar">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> SALVAR
                        </button>
                    </div>
                </form>
            </div> <!-- modal-body -->

        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->
<!-- END EDIT USER-->

<!--REMOVE USER-->
<div class="modal fade" id="modalDeleteUser">
    <div class="ajax-loader hidden">
        <img src="<?= base_url() ?>images/ajax-loader.gif" class="img-responsive"/>
    </div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header label-danger" style="color: white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmação de Exclusão</h4>
                <input class="hide" id="deleteID" name="deleteID">
            </div>
            <div class="modal-body">
                <p>Deseja realmente excluir o registro <strong><span id="nome_exclusao"></span></strong>?</p>
                <p>Esta ação não poderá ser desfeita.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> CANCELAR
                </button>
                <button type="submit" class="btn btn-danger" id="btnModalExcluir">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> EXCLUIR
                </button>
            </div>
        </div>
    </div>
</div>
<!--END REMOVE USER-->

<!--END MODALS-->
