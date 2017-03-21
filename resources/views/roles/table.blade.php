<div class="panel panel-primary">
<div class="panel-heading">Test
<button id="btn_add" name="btn_add" class="btn btn-default pull-right">Add New role</button>
</div>
  <div class="panel-body">
   <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Details</th>
        <th>Actions</th>
      </tr>
     </thead>
     <tbody id="roles-list" name="roles-list">
       @foreach ($roles as $role)
        <tr id="role{{$role->id}}">
         <td>{{$role->id}}</td>
         <td>{{$role->name}}</td>
         <td>{{$role->details}}</td>
          <td>
          <button class="btn btn-warning btn-detail open_modal" value="{{$role->id}}">Edit</button>
          <button class="btn btn-danger btn-delete delete-role" value="{{$role->id}}">Delete</button>
          </td>
        </tr>
        @endforeach
    </tbody>
    </table>
   </div>
</div>