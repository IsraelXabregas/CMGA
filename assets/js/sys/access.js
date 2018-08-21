var tableAccess;

$(document).ready(function () {
    tableAccess = $('#tableAcess').DataTable({
        "order": [],
        "responsive": true,     // RESPONSIVE TABLE
        "sPaginationType": "full_numbers",  // FULL PAGINATION BUTTONS
        "language": {    // LANGUAGE PLUGIN BRASIL
            "url": "http://localhost/CMGP/assets/DataTables/Portuguese-Brasil.json"
        },
        "processing": true,     // PROCESSING ALERT ON
        "serverSide": false,    // SERVER SIDE PAGINATION OFF
        "ajax": {
            "url": 'access/DataTablesAccess',    // DEFINE URL REQUEST
            "type": "GET"   // TYPE OF RESQUEST
        },
        "columns": [    // TABLE COLUMNS SERVERDATA
            {"data": "USER"},
            {"data": "RM"},
            {"data": "NIVEL"},
            {"data": "DATE"},
            {"data": "AREA"},
            {"data": "EVENT"}

        ] // END COLUMNS
    });
    $("#btnRefresh").click(function () {    // BUTTON SELECTOR
        tableAccess.ajax.reload();         // REFRESH DATATABLE
        return false;
    });

});