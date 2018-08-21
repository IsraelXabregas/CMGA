var tableUsers;
$(document).ajaxStart(function () {
    $(".ajax-loader").removeClass("hidden");
});
$(document).ajaxStop(function () {
    $(".ajax-loader").addClass("hidden");
});

$(document).ready(function () {
    // Variável para executar ações no DataTable
    tableUsers = $('#tableUsers').DataTable({
        "responsive": true,
        "sPaginationType": "full_numbers",
        "language": {
            "url": "http://localhost/CMGP/assets/DataTables/Portuguese-Brasil.json"
        },
        "processing": true, //Exibe a informação de que o conteúdo está sendo processado
        "serverSide": false, //Define se a busca e a paginação serão a nivel server-side ou client-side
        "ajax": {
            "url": 'usuario/DataTableUsers', //Define a url onde será feita a solicitação dos dados
            "type": "GET" //Define o tipo da solicitação
        },
        //Como os dados que estão sendo retornados vieram da conversão de um array
        //chave-valor, então definimos quais são as colunas que deverão ser utilizadas
        //em suas respectivas ordens
        "columns": [
            {"data": "NAME"},
            {"data": "RM"},
            {"data": "EMAIL"},
            {"data": "NIVEL"},
            {
                'data': null,
                'render': function (data, type, row) {
                    return '<div class="text-center btn-group-xs">' +
                        '<button class="btn btn-warning btnEdit" data-toggle="modal" data-target="#modalEditUser" ' +
                        'onclick="editUser(' + row.USERS_ID + ')">' +
                        '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</button>\n' +
                        '<button class="btn btn-danger btnDelete" data-toggle="modal" data-target="#modalDeleteUser" ' +
                        'onclick="deleteUser(' + row.USERS_ID + ')">' +
                        '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir</button></div>'
                }
            }
        ] // END COLUMNS
    });

});

function addUser() {

    $("#formAddUser")[0].reset();

    $(".text-danger").remove();
    $(".form-group").removeClass('has-error').removeClass('has-success');

    $("#formAddUser").unbind('submit').bind('submit', function () {
        var form = $(this);

        // remove the text-danger
        $(".text-danger").remove();

        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(), // converting the form data into array and sending it to server
            dataType: 'json',
            success: function (data) {
                if (data.success === true) {
                    $(".messages").html('<div class="alert fade in alert-success alert-dismissible" role="alert">' +
                        '<span class="glyphicon glyphicon-ok-sign"></span>' + data.messages +
                        '</div>').fadeIn().delay(4000).fadeOut('slow');

                    $("#modalAddUser").modal('hide');    // Após salvar dados, fecha modal
                    tableUsers.ajax.reload(null, false);    // Atualiza DataTable

                } else {
                    if (data.messages instanceof Object) {
                        $.each(data.messages, function (index, value) {
                            var id = $("#" + index);

                            id
                                .closest('.form-group')
                                .removeClass('has-error')
                                .removeClass('has-success')
                                .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                .after(value);
                        });
                    } else {
                        $(".messages").html('<div class="alert fade in alert-success alert-dismissible" role="alert">' +
                            '<span class="glyphicon glyphicon-ok-sign"></span>' + data.messages +
                            '</div>').fadeIn().delay(4000).fadeOut('slow');
                    }
                }
            }
        });

        return false;
    });
}

function editUser(id) {
    if (id) {
        $("#formEditUser")[0].reset();

        $.ajax({
            url: 'usuario/DataTableUsers/' + id,
            type: 'post',
            dataType: 'json',
            success: function (data) {
                $("#editNome").val(data.nome);
                $("#editRm").val(data.rm);
                $("#editEmail").val(data.email);
                $("#editNivel").val(data.nivelacesso);
                $("#editId").val(data.id);

                $("#formEditUser").unbind('submit').bind('submit', function () {
                    var form = $(this);
                    $(".text-danger").remove();

                    $.ajax({
                        url: form.attr('action'),
                        type: 'post',
                        data: form.serialize(),
                        dataType: 'json',
                        success: function (data) {
                            if (data.success === true) {
                                $(".messages").html('<div class="alert fade in alert-success alert-dismissible" role="alert">' +
                                    '<span class="glyphicon glyphicon-ok-sign"></span>' + data.messages +
                                    '</div>').fadeIn('slow').delay(3000).fadeOut('slow');

                                $("#modalEditUser").modal('hide');    // Após salvar dados, fecha modal
                                tableUsers.ajax.reload(null, false);    // Atualiza DataTable

                            } else {

                                if (data.messages instanceof Object) {
                                    $.each(data.messages, function (index, value) {
                                        var id = $("#" + index);

                                        id
                                            .closest('.form-group')
                                            .removeClass('has-error')
                                            .removeClass('has-success')
                                            .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                            .after(value)
                                        ;

                                    });
                                } else {
                                    $(".messages").html('<div class="alert fade in alert-danger alert-dismissible" role="alert">' +
                                        '<span class="glyphicon glyphicon-ok-sign"></span>' + data.messages +
                                        '</div>').fadeIn().delay(4000).fadeOut('slow');
                                }
                            }
                        }
                    });

                    return false;
                });

            }

        });
    } else {
        alert('Erro, id não retornado.');
    }
}

function deleteUser(id) {
    if (id) {
        $.ajax({
            url: 'usuario/DataTableUsers/' + id,
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                $("#nome_exclusao").text(data.nome);
                $('#deleteID').val(data.id);
            }
        });

        $("#btnModalExcluir").off('click').on('click', function () {

            var hideID = $('#deleteID');
            $.ajax({
                url: 'usuario?action=delete',
                type: 'post',
                data: hideID.serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data.success === true) {
                        $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                            '<span class="glyphicon glyphicon-ok-sign"></span>' + data.messages +
                            '</div>').fadeIn().delay(3000).fadeOut('slow');

                        $("#modalDeleteUser").modal('hide');
                        tableUsers.ajax.reload(null, false);
                    } else {
                        $(".messages").html('<div class="alert alert-danger alert-dismissible" role="alert">' +
                            '<span class="glyphicon glyphicon-remove-sign"></span>' + data.messages +
                            '</div>').fadeIn().delay(3000).fadeOut('slow');
                    }
                }
            });
        });
    }
}