@extends('layouts.admin')

@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User roles</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Context Classes
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>User</th>
                                            <th>Author</th>
                                            <th>Admin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($users as $user)
                                        @if($user->hasRole('Admin'))
                                          <tr class="danger">
                                          @elseif($user->hasRole('Author'))
                                          <tr class="success">
                                          @elseif($user->hasRole('User'))
                                          <tr class="info">
                                          @endif
                                           <form action="{{ route('admin.assign') }}" method="post">
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                                            <td><input name="role_user" type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} ></td>
                                            <td><input name="role_author" type="checkbox" {{ $user->hasRole('Author') ? 'checked' : '' }}></td>
                                            <td><input name="role_admin" type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }}></td>
                                            {{ csrf_field() }}
                                            <td><button type="submit">Assign Roles</button></td>
                                           </form>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
</div>
@endsection