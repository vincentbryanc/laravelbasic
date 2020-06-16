$(function() {

	fetch_cities();

	// Add or Update Data
    $('#frmCity').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            beforeSend: function() {
                $("#frmCity .btn-success").attr("disabled", true);
                $("#frmCity .btn-success").text("Loading...Please wait!");
            },
            url: '/cities',
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success:function(data)
            {
                var html = '';
                $("#frmCity .btn-success").attr("disabled", false);
                $("#frmCity .btn-success").html('<i class="ti-save"></i> Save');
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
                    $('#tblCities').DataTable().ajax.reload();
                    Swal.fire({
                        title: "SUCCESS!",   
                        text: "Data Successfully saved!",   
                        type: "success",
                        confirmButtonText: "OK",
                        onClose: () => {
                            $('#frmCity')[0].reset();
                            $('#modalCity').modal('hide');
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

    // Fetch Cities
    function fetch_cities() {
        $('#tblCities').DataTable().clear().destroy();
        $('#tblCities').DataTable({
            "processing": true,
            serverSide: true,
            language: {
                search: "Search City: ",
                searchPlaceholder: "Name",
                infoFiltered: "",
                processing: "<i class='fas fa-spinner fa-pulse'></i> Processing...",
            },
            ajax:{
                url: "/cities",
            },
            columns:[
                {
                    data: 'name',
                    name: 'name'
                },
            ],
            responsive: true,
            paging: true,
            lengthChange: false,
            pageLength: 5,
        });
    }

});