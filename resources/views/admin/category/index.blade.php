@extends('layouts.admin.app')
@section('admin_content')

@section('title', 'Category')

@section('css')
@endsection

<section class="content">
    <div class="container-fluid">

    <div class="row">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"> {{ isset($category) ? 'Category Update Form' : 'Category Create Form' }} </h3>
                </div>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!--Form error message show -->
            @if(!empty($category))
            <form class="" method="post" action="{{ url('admin/category', $category->id) }}" >
                @method('PUT')
                @else
                    <form action="@route('admin.category.store')" method="POST" enctype="multipart/form-data"> 
                @endif
                @csrf
                <div class="">
                        <div class="form-group">
                            <label for="">Category Name <span class="text-danger">*</span> </label>
                            <input type="text" name="name" value="{{ @$category->name }}" placeholder="Category Name" class="form-control" id="">
                        </div>

                        <div class="form-gorup">
                            <label for="">Image</label>
                            @if(isset($category))
                            <input type="file" name="image[]" multiple class="form-control"  id="">
                            @else
                            <input type="file" required name="image[]" multiple class="form-control"  id="">
                            @endif
                        </div>
                </div><!--name, end-->
                <div class="from-gorup float-right">
                    @if (!empty($category))
                    <input type="submit" class="btn btn-primary text-center" value="Update Category" name="" id="">
                    @else
                    <input type="submit" class="btn btn-primary text-center" value="Create New Category" name="" id="">
                    @endif
                </div><!--submit button end -->
             </form>
        </div>
        <div class="col-12 col-sm-12 col-md-9 col-lg-9">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    <h2 class="card-title">LIST OF CATEGORY </h2>
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
                        <th>Index</th>
                        <th>Category Name</th>
                        <th>Category Image</th>
                        <th>Action</th>
                        </tr>
                        @foreach ($categories as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item->name }}</td>
                            
                                @php
                            $image=json_decode($item->image);
                            @endphp
                            @if(empty($image))
                                <td>Image Not Selected</td>
                            @else
                                <td><img src="{{asset($image[0])}}" height="60px" width="60px" alt=""> </td>
                            @endif
                            
                            <td>
                                <a class="btn btn-sm btn-success" href="@route('admin.category.edit', $item->id)"><i class="fas fa-user-edit"></i></a>
                                <form  action="@route('admin.category.destroy', $item->id)" method="POST" >
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



