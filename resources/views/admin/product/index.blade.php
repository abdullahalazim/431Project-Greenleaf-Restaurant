@extends('layouts.admin.app')
@section('admin_content')

@section('title', 'Category')

@section('css')
@endsection

<section class="content">
    <div class="container-fluid">
    <div class="">
        <div class="">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h2 class="card-title">ALL PRODUCTS </h2>
                        <div class="card-tools">
                            <div class="form-inline input-group input-group-sm" style="width: 115px;">
                                <div class="input-group-append">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                    <table class="table table-hover  text-center" id="table">
                        <tr>
                        
                        <th>Product Title</th>
                        <th>Category Name</th>
                        <th>Price</th>
                        <th>Unit</th>
                        <th>image</th>
                        <th>Description</th>
                        <th>Action</th>
                        </tr>
                        @foreach ($products as $item)
                        <tr>
                           
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category ? $item->category->name: 'data not found' }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->unit }}</td>
                            @php
                            $image=json_decode($item->image);
                            @endphp
                            @if(empty($image))
                                <td>Image Not Selected</td>
                            @else
                                <td><img src="{{asset($image[0])}}" height="60px" width="60px" alt=""> </td>
                            @endif
                            <td>{!! $item->description !!}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="@route('admin.product.edit', $item->id)"><i class="fas fa-user-edit"></i></a>
                                <form  action="@route('admin.product.destroy', $item->id)" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn btn-sm btn-danger" type="submit" ><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    </div>
</section>

@endsection
@section('js')
@endsection



