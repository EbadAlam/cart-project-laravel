@extends('admin.layout.app')


@section('content')
 <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                       Add Item
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" style="margin-left: 17px;margin-bottom: 20px;" href="{{ route("item") }}">Back To Item</a>
                </div>
            </div>

            <form action="{{ route('item_post') }}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">


                        <div class="form-group">
                            <label for="">Item Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Item Name">
                        </div>

                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" class="form-control" name="price" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image" placeholder="Image">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
</div>

@endsection