<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">role</h4>
      </div>
      <div class="modal-body">


        <form id="frmroles" name="frmroles" class="form-horizontal" novalidate="">

        @include('roles.fields')

        </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
        <input type="hidden" id="role_id" name="role_id" value="0">
      </div>
    </div>
  </div>
</div>