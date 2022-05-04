@extends('admin.layout.app')


@section('content')
 <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Items
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" style="margin-left: 17px;margin-bottom: 20px;" href="{{ route('item_add') }}">Add Item</a>
                </div>
            </div>
            @if (count($item) > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($item as $key => $singleItem)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $singleItem->name }}</td>
                        <td>{{ $singleItem->price }}</td>
                        <td>
                            @if ($singleItem->image)
                            <img src="{{ asset($singleItem->image) }}" alt="{{ $singleItem->name }}" width="100">
                            @else
                            <h3>No image</h3>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('item_edit',['id' => $singleItem->id ]) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('item_destroy',['id' => $singleItem->id]) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure ?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h2>No Records Found !</h2>
            @endif
@endsection