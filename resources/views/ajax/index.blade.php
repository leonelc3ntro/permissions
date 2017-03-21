    <html>
      <head>
       <title>Test</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      </head>
    <body>
    <div class="container">
    <div class="panel panel-primary">
     <div class="panel-heading">Test
     <button id="btn_add" name="btn_add" class="btn btn-default pull-right">Add New Product</button>
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
             <tbody id="products-list" name="products-list">
               @foreach ($products as $product)
                <tr id="product{{$product->id}}">
                 <td>{{$product->id}}</td>
                 <td>{{$product->name}}</td>
                 <td>{{$product->details}}</td>
                  <td>
                  <button class="btn btn-warning btn-detail open_modal" value="{{$product->id}}">Edit</button>
                  <button class="btn btn-danger btn-delete delete-product" value="{{$product->id}}">Delete</button>
                  </td>
                </tr>
                @endforeach
            </tbody>
            </table>
           </div>
           </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Product</h4>
                </div>
                <div class="modal-body">
                <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                    <div class="form-group error">
                     <label for="inputName" class="col-sm-3 control-label">Name</label>
                       <div class="col-sm-9">
                        <input type="text" class="form-control has-error" id="name" name="name" placeholder="Product Name" value="">
                       </div>
                       </div>
                     <div class="form-group">
                     <label for="inputDetail" class="col-sm-3 control-label">Details</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="details" name="details" placeholder="details" value="">
                        </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                <input type="hidden" id="product_id" name="product_id" value="0">
                </div>
            </div>
          </div>
      </div>
    </div>
        <meta name="_token" content="{!! csrf_token() !!}" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="{{asset('js/ajaxscript.js')}}"></script>
    </body>
    </html>