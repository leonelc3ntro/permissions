@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    @role('admin')
                        <p>This is visible to users with the admin role. Gets translated to
                        \Entrust::role('admin')</p>
                    @endrole

                    @role('user')
                        <p>This is visible to users with the user role. Gets translated to
                        \Entrust::role('user')</p>

                        <ul>
                            @permission('create-user')
                             <li>
                                <p>This is visible to users with the create-user permission. Gets translated to
                                \Entrust::permission('create-user')</p>
                             </li>
                            @endpermission
                            @permission('update-user')
                             <li>
                                <p>This is visible to users with the update-user permission. Gets translated to
                                \Entrust::permission('update-user')</p>
                             </li>
                            @endpermission
                            @permission('delete-user')
                             <li>
                                <p>This is visible to users with the delete-user permission. Gets translated to
                                \Entrust::permission('delete-user')</p>
                             </li>
                            @endpermission
                            @permission('read-user')
                             <li>
                                <p>This is visible to users with the read-user permission. Gets translated to
                                \Entrust::permission('read-user')</p>
                             </li>
                            @endpermission
                        </ul>

                    @endrole

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
