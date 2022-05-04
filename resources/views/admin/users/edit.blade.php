@extends('admin.layout.app')


@section('content')
 <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                       Edit User
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" style="margin-left: 17px;margin-bottom: 20px;" href="{{ route("user") }}">Back To User</a>
                </div>
            </div>

            <form action="{{ route('user_update',['id' => $user->id ]) }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">


                        <div class="form-group">
                            <label for="">User Name</label>
                            <input type="text" class="form-control" name="username" placeholder="User Name" value="{{ $user->username }}">
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email"  value="{{ $user->email }}">
                        </div>

                         <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
</div>

@endsection