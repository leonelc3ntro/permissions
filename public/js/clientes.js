    // var url = "http://localhost:8000/permissions/clienteajaxCRUD";
    var url = "http://localhost:9090/laravel_projects/permissions/public/clientes";
    //display modal form for cliente editing
    $(document).on('click','.open_modal',function(){
        var cliente_id = $(this).val();
       
        $.get(url + '/' + cliente_id, function (data) {
            //success data
            console.log(data);
            $('#cliente_id').val(data.id);
            $('#name').val(data.name);
            $('#details').val(data.details);
            $('#btn-save').val("update");
            $('#myModal').modal('show');
        }) 
    });
    //display modal form for creating new cliente
    $('#btn_add').click(function(){
        $('#btn-save').val("add");
        $('#frmClientes').trigger("reset");
        $('#myModal').modal('show');
    });
    //delete cliente and remove it from list
    $(document).on('click','.delete-cliente',function(){
        var cliente_id = $(this).val();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            type: "DELETE",
            url: url + '/' + cliente_id,
            success: function (data) {
                console.log(data);
                $("#cliente" + cliente_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    //create new cliente / update existing cliente
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault(); 
        var formData = {
            name: $('#name').val(),
            details: $('#details').val(),
        }
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var type = "POST"; //for creating new resource
        var cliente_id = $('#cliente_id').val();;
        var my_url = url;
        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + cliente_id;
        }
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var cliente = '<tr id="cliente' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.details + '</td>';
                cliente += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Edit</button>';
                cliente += ' <button class="btn btn-danger btn-delete delete-cliente" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add"){ //if user added a new record
                    $('#clientes-list').append(cliente);
                }else{ //if user updated an existing record
                    $("#cliente" + cliente_id).replaceWith( cliente );
                }
                $('#frmClientes').trigger("reset");
                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });