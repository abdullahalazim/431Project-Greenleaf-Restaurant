@extends('layouts.admin.app')
@section('admin_content')

@section('title', 'Cotnact List')

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
                    <h2 class="card-title">LIST OF CONTACTS </h2>
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
                        <th>E-mail</th>
                        <th>Note</th>
                        </tr>
                        @foreach ($contacts as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->description }}</td>
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



