$(function() {

    //****************************
    /* Variable */
    //****************************
    var url = ""; // for ajax
    var btnValue = "";

    //****************************
    /* On load of page */
    //****************************
    fetch_users();

    //****************************
    /* Add User */
    //****************************
    $('#btnModalUser').on("click", function() {
        $('#form_result').html('');
        $('#frmUser .modal-title').html('<i class="mdi mdi-account-plus mr-2"></i> Add New User');
        $('#frmUser #btnSave').show();
        $('#frmUser #btnSave').html('<i class="ti-save"></i> Save');
        $('#frmUser')[0].reset();
        $('#frmUser #type').val('folder');
        btnValue = $('#btnSave').html();
        url = '/users';
    });

    //****************************
    /* Edit User */
    //****************************
    $(document).on('click', '.btnedit', function() {
        userId = $(this).attr('user_id');
        $('#form_result').html('');
        $('#frmUser .modal-title').html('<i class="mdi mdi-pencil mr-2"></i> Edit User');
        $('#frmUser #btnSave').show();
        $('#frmUser #btnSave').html('<i class="ti-save"></i> Update');
        $('#frmUser')[0].reset();
        btnValue = $('#btnSave').html();
        url = 'users/update';
        $.ajax({
            url: "users/" + userId + "/edit",
            dataType: "json",
            success: function(html) {
                $('#frmUser #userid').val(html.data.id);
                $('#frmUser #name').val(html.data.name);
                $('#frmUser #email').val(html.data.email);
                $('#frmUser #age').val(html.data.age);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log('textStatus: ' + textStatus);
                console.log('errorThrown: ' + errorThrown);
            }
        });
    });

    //****************************
    /* Add / Update User */
    //****************************
    $('#frmUser').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            beforeSend: function() {
                $("#frmUser .btn-success").attr("disabled", true);
                $("#frmUser .btn-success").text("Loading...Please wait!");
            },
            url: url,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success:function(data)
            {
                var html = '';
                $("#frmUser .btn-success").attr("disabled", false);
                $("#frmUser .btn-success").html(btnValue);
                if(data.errors)
                {
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++)
                    {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                }
                if(data.success)
                {
                    $('#tblUsers').DataTable().ajax.reload();
                    Swal.fire({
                        title: "SUCCESS!",   
                        text: "Data Successfully saved!",   
                        type: "success",
                        confirmButtonText: "OK",
                        onClose: () => {
                            $('#frmUser')[0].reset();
                            $('#modalUser').modal('hide');
                        }
                    });
                }
                $('#form_result').html(html);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log("textStatus: " + textStatus);
                console.log("errorThrown: " + errorThrown);
                console.log("textStatus: " + textStatus);
            }
        });
    });

    //****************************
    /* Functions */
    //****************************

    // Fetch Cities
    function fetch_users() {
        $('#tblUsers').DataTable().clear().destroy();
        $('#tblUsers').DataTable({
            "processing": true,
            serverSide: true,
            language: {
                search: "Search: ",
                infoFiltered: "",
                processing: "<i class='fas fa-spinner fa-pulse'></i> Processing...",
            },
            ajax:{
                url: "/users",
            },
            columns:[
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'age',
                    name: 'age'
                },
                {
                    data: 'actions',
                    name: 'actions'
                }
            ],
            responsive: true,
            paging: true,
            lengthChange: false,
            pageLength: 5,
        });
    }

});