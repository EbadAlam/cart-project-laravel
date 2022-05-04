@extends('admin.layout.app')


@section('content')
 <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                       Edit Item
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" style="margin-left: 17px;margin-bottom: 20px;" href="{{ route("item") }}">Back To User</a>
                </div>
            </div>

            <form action="{{ route('item_update',['id' => $item->id]) }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">


                        <div class="form-group">
                            <label for="">Item Name</label>
                            <input type="text" class="form-control" name="name" placeholder="User Name" value="{{ $item->name }}">
                        </div>

                        <div class="form-group">
                            <label for="">Item Price</label>
                            <input type="number" class="form-control" name="price" placeholder="Email"  value="{{ $item->price }}">
                        </div>

                         <div class="form-group">
                            <label for="">Item Price</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        @if ($item->image)
                            <img src="{{ asset($item->image) }}" width="150" style="margin-bottom: 10px;">
                        @else
                        <h3>No image!</h3>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
</div>

@endsection