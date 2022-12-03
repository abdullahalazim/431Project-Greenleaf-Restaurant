@extends('layouts.user.app')
@section('content')



@if(count($carts) > 0)


<section class="container my-5">

    <table class="table text-center">
        <thead class="" style="background-color: #F4530D; color: white;">
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Poruduct Name</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Quantity</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php  $total_amount=0; ?>
            @foreach($carts as $item)

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

                <td>{{ $item->product->price * $item->quantity}}Tk</td>
                <?php
              $total_amount +=$item->product->price *$item->quantity;
             ?>
                <td>
                    <form class="form-inline" action="{{url('user/cart/update/'.$item->id)}}" method="post">
                        @csrf
                        <input class="form-control form-control-sm" type="text" name="quantity" value="{{$item->quantity}}">
                        <input class="btn btn-sm btn-info" type="submit" name="product_quantity_btn" value="Update">
                    </form>
                </td>
                <td><a class="btn btn-danger" href="{{url('user/cart/delete/'.$item->id)}}">Delete</a> </td>
            </tr>

            @endforeach
        </tbody>
    </table>


    <div class="row">
        <div class="col-md-8">
            <p class="text-center font-weight-bold" colspan="7">Total Amount: <strong
                    class="text-info">{{$total_amount}}Tk</strong></p>

        </div>
        <div class="col-md-4">
            <a class="btn btn-info" href="{{ url('/') }}">Countinue Shopping</a>
        </div>
    </div>


    <!--order area start-->
    <div class="card my-5">
        <div class="card-header">
            <div class="card-title">
                <p class="h4">CHECKOUT FORM</p>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('user/order/store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="">Enter Name</label>
                            <input class="form-control" type="text" placeholder="Enter your name" required name="name" value="" id="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="">Enter Phone</label>
                            <input class="form-control" type="number" required name="phone" value="" placeholder="Enter here Phone number" id="">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="">Table no.</label>
                            <input class="form-control" type="text" required name="table_no" value="" placeholder="Enter here table no" id="">
                        </div>
                    </div>
                </div>


                <div class="form-gorup">
                    <label for="">Notes</label>
                    <textarea name="note" id="" cols="10" rows="4" class="form-control"></textarea>
                </div>
                <div class="form-group my-2">
                    <input type="submit" class="btn btn-primary" name="" id="">
                </div>
            </form>
        </div>
    </div>
    <!--order end here-->

    <hr>

    <br>
</section>
@else
<h4 class="text-center text-info">Your Cart is no Item pleace choose Product thankyou .....!</h4>

@endif

@endsection
