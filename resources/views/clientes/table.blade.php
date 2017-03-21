<div class="panel panel-primary">
<div class="panel-heading">Test
<button id="btn_add" name="btn_add" class="btn btn-default pull-right">Add New cliente</button>
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
     <tbody id="clientes-list" name="clientes-list">
       @foreach ($clientes as $cliente)
        <tr id="cliente{{$cliente->id}}">
         <td>{{$cliente->id}}</td>
         <td>{{$cliente->name}}</td>
         <td>{{$cliente->details}}</td>
          <td>
          <button class="btn btn-warning btn-detail open_modal" value="{{$cliente->id}}">Edit</button>
          <button class="btn btn-danger btn-delete delete-cliente" value="{{$cliente->id}}">Delete</button>
          </td>
        </tr>
        @endforeach
    </tbody>
    </table>
   </div>
</div>