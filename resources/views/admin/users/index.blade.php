@extends('admin.layout.app')


@section('content')
 <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Users
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" style="margin-left: 17px;margin-bottom: 20px;" href="{{ route("user_add") }}">Create User</a>
                </div>
            </div>

            @if(count($users) > 0)

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $single_user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $single_user->username }}</td>
                        <td>{{ $single_user->email }}</td>
                        <td>
                            <a href="{{ route('user_edit',['id' => $single_user->id ]) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            @if(auth()->id() != $single_user->id)
                            <form action="{{ route('user_destroy',['id' => $single_user->id]) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure ?');">Delete</button>
                            </form>
                            @else
                             <p style="color:red;">Not Allowed</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @else
            <h3>No Record Found!</h3>
            @endif

@endsection