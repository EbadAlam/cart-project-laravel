@extends('layout.app')
@section('content')
<div class="row">
<!-- Blog Entries Column -->
<div class="col-md-8 ">
   <form action="{{ route('register_post') }}" method="POST" role="form" enctype="multipart/form-data">
      @csrf
      <legend>User Registration</legend>
   
      <div class="form-group">
         <label for="">User Name</label>
         <input type="text" class="form-control" placeholder="User Name" name="username">
      </div>
      <div class="form-group">
         <label for="">User Email</label>
         <input type="email" class="form-control" placeholder="User Email" name="email">
      </div>

      <div class="form-group">
         <label for="">Password</label>
         <input type="password" class="form-control" name="password">
      </div>
   
      
   
      <button type="submit" class="btn btn-primary">Register</button>
   </form>
</div>
@endsection
            