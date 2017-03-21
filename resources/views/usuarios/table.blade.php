<div class="panel panel-primary">
<div class="panel-heading">Test
@permission('create-user')
<button id="btn_add" name="btn_add" class="btn btn-default pull-right">Add New usuario</button>
@endpermission
</div>
  <div class="panel-body">
   <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
     </thead>
     <tbody id="usuarios-list" name="usuarios-list">
       @foreach ($usuarios as $usuario)
        <tr id="usuario{{$usuario->id}}">
         <td>{{$usuario->id}}</td>
         <td>{{$usuario->name}}</td>
         <td>{{$usuario->email}}</td>
          <td>
          @permission('create-user')
          <button class="btn btn-warning btn-detail open_modal" value="{{$usuario->id}}">Edit</button>
          @endpermission
          @permission('delete-user')
          <button class="btn btn-danger btn-delete delete-usuario" value="{{$usuario->id}}">Delete</button>
          @endpermission
          </td>
        </tr>
        @endforeach
    </tbody>
    </table>
   </div>
</div>