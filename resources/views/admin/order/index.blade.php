@extends('layouts.admin.app')
@section('admin_content')

@section('title', 'Order List')

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
                    <h2 class="card-title">ALL ORDERS </h2>
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
                        
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Action</th>
                        </tr>
                        @foreach ($orders as $item)
                        <tr>
                           
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ url('admin/order/details', $item->id) }}"><i class="fas fa-eye"></i></a>
                                <a class="btn btn-sm btn-danger" href="{{ url('admin/order/delete/'.$item->id) }}"><i class="fas fa-trash"></i></a>
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



