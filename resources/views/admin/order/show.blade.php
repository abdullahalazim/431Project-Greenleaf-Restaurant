@extends('layouts.admin.app')
@section('admin_content')

@section('title', 'Order List')

@section('css')
@endsection

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <p>Order info</p>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <h4>Customer Info</h4>
                        <p>
                            <span>Name: {{ $order->name }}</span><br>
                            <span>Phone: {{ $order->phone }}</span><br>
                        </p>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <h4>Table</h4>
                        <p>
                            <span>Table no.: {{ $order->table_no }}</span><br>
                        </p>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <h4>Customer Note</h4>
                        <p>
                            <span>Note: {{ $order->note }}</span><br>
                        </p>
                    </div>
                </div>
            </div>
        </div>




<section class="container my-5">

    <table class="table text-center">
        <thead class="" style="background-color: #370df4; color: white;">
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Poruduct Name</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Quantity</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody class="text-center">
            <?php  $total_amount=0; ?>
            @foreach(App\Models\Cart::where('order_id', $order->id)->get(); as $item)

            <tr>
                <th scope="row">#{{$loop->index +1}}</th>
                <td>{{$item->product ? $item->product->name: ''}}</td>
                @php
                $image=json_decode($item->product->image);
                @endphp
                @if(empty($image))
                    <td>Image Not Selected</td>
                @else
                    <td><img src="{{asset($image[0])}}" height="60px" width="60px" alt=""> </td>
                @endif

                <td>{{$item->product->price* $item->quantity}}Tk</td>
                <?php
              $total_amount +=$item->product->price*$item->quantity;
             ?>
                <td>
                    <form class="form-inline" action="{{url('admin/cart/update/'.$item->id)}}" method="post">
                        @csrf
                        <input class="form-control form-control-sm" type="text" name="quantity" value="{{$item->quantity}}">
                        <input class="btn btn-sm btn-info" type="submit" name="product_quantity_btn" value="Update">
                    </form>
                </td>
                <td>
                    <a class="btn btn-sm btn-danger" href="@route('admin.cart.delete', $item->id)">Delete</a>
                </td>

            </tr>

            @endforeach
        </tbody>
    </table>


    <div class="row">
        <div class="col-md-8">
            <p class="font-weight-bold" colspan="7">Total Amount: <strong
                    class="text-info">{{$total_amount}}Tk</strong></p>

            @if ($order->status == 0)
                <a class="btn btn-sm btn-danger" href="@route('admin.order.status', $order->id)">Payment unsuccessfully</a>
            @else
                <a class="btn btn-sm btn-success" href="@route('admin.order.status', $order->id)">Payment successfully</a>
            @endif
            <a class="btn btn-sm btn-success" href="@route('admin.invoice',$order->id)">Generate invoice</a>
        </div>

    </div>
    <hr>
    <br>
</section>


    </div>
</section>

@endsection
@section('js')
@endsection
