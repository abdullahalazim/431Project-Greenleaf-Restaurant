@extends('layouts.admin.app')
@section('admin_content')

@section('title', 'Dashboard')

@section('css')
@endsection

<!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-gear"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Categories</span>
                <span class="info-box-number">
                    {{ count($categories) }}
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-google-plus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Products</span>
                <span class="info-box-number">{{ $products }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Orders</span>
                <span class="info-box-number">{{ count($orders) }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
        </div>
        <!-- /.row -->



        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <!-- TABLE: LATEST ORDERS -->
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
          <!-- /.col -->


          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->
  @endsection
@section('js')
@endsection



