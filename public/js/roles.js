    // var url = "http://localhost:8000/permissions/roleajaxCRUD";
    var url = "http://localhost:9090/laravel_projects/permissions/public/roles";
    //display modal form for role editing
    $(document).on('click','.open_modal',function(){
        var role_id = $(this).val();
       
        $.get(url + '/' + role_id, function (data) {
            //success data
            console.log(data);
            $('#role_id').val(data.id);
            $('#name').val(data.name);
            $('#details').val(data.details);
            $('#btn-save').val("update");
            $('#myModal').modal('show');
        }) 
    });
    //display modal form for creating new role
    $('#btn_add').click(function(){
        $('#btn-save').val("add");
        $('#frmroles').trigger("reset");
        $('#myModal').modal('show');
    });
    //delete role and remove it from list
    $(document).on('click','.delete-role',function(){
        var role_id = $(this).val();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            type: "DELETE",
            url: url + '/' + role_id,
            success: function (data) {
                console.log(data);
                $("#role" + role_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
    //create new role / update existing role
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
        var role_id = $('#role_id').val();;
        var my_url = url;
        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + role_id;
        }
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var role = '<tr id="role' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.details + '</td>';
                role += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.id + '">Edit</button>';
                role += ' <button class="btn btn-danger btn-delete delete-role" value="' + data.id + '">Delete</button></td></tr>';
                if (state == "add"){ //if user added a new record
                    $('#roles-list').append(role);
                }else{ //if user updated an existing record
                    $("#role" + role_id).replaceWith( role );
                }
                $('#frmroles').trigger("reset");
                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });