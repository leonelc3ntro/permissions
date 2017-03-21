    // var url = "http://localhost:8000/permissions/usuarioajaxCRUD";
    var url = "http://localhost:9090/laravel_projects/permissions/public/usuarios";
    //display modal form for usuario editing
    $(document).on('click','.open_modal',function(){


        var usuario_id = $(this).val();
       
        $.get(url + '/' + usuario_id, function (data) {
            //success data
            console.log(data);
            $('#usuario_id').val(data.id);
            $('#name').val(data.name);
            $('#email').val(data.email);
            $('#password').val(data.password);
            $('#btn-save').val("update");
            $('#myModal').modal('show');
        }) 
    });
    //display modal form for creating new usuario
    $('#btn_add').click(function(){
        $('#btn-save').val("add");
        $('#frmusuarios').trigger("reset");
        $('#myModal').modal('show');
    });
    //delete usuario and remove it from list
    $(document).on('click','.delete-usuario',function(){
        var usuario_id = $(this).val();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            type: "DELETE",
            url: url + '/' + usuario_id,
            success: function (data) {
                console.log(data);
                $("#usuario" + usuario_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //create new usuario / update existing usuario
    $("#btn-save").click(function (e) {       

        if (!$("#frmusuarios").valid()) {                   
            return false;
        };
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault(); 
        var formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            password: $('#password').val(),
        }
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var type = "POST"; //for creating new resource
        var usuario_id = $('#usuario_id').val();;
        var my_url = url;
        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + usuario_id;
        }
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var usuario = '<tr id="usuario' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.email + '</td><td>' + data.password + '</td>';
                usuario += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Edit</button>';
                usuario += ' <button class="btn btn-danger btn-delete delete-usuario" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add"){ //if user added a new record
                    $('#usuarios-list').append(usuario);
                }else{ //if user updated an existing record
                    $("#usuario" + usuario_id).replaceWith( usuario );
                }
                $('#frmusuarios').trigger("reset");
                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });