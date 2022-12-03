@extends('layouts.user.app')
@section('content')



@if(count($orders) > 0)


<section class="container my-5">

    <table class="table text-center">
        <thead class="" style="background-color: #0d71f4; color: white;">
            <tr>
                <th scope="col">SL</th>
                <th scope="col">Poruduct Name</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Price</th>
                <th scope="col">Order Date</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php  $total_amount=0; ?>
            @foreach($orders as $item)

            <tr>
                <th scope="row">#{{$loop->index +1}}</th>
                <td>{{$item->product ? $item->product->name: ''}}</td>
                @php
                $image=json_decode($item->product ? $item->product->image:'');
                @endphp
                @if(empty($image))
                    <td>Image Not Selected</td>
                @else
                    <td><img src="{{asset($image[0])}}" height="60px" width="60px" alt=""> </td>
                @endif

                <td>{{$item->product ? $item->product->price: 0 * $item->quantity}}Tk</td>
                <th>{{ $item->created_at->diffForHumans() }}</th>
                <?php
              $total_amount +=$item->product ? $item->product->price : 0 *$item->quantity;
             ?>
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


    <hr>

    <br>
</section>
@else
<h4 class="text-center text-info">Your Cart is no Item pleace choose Product thankyou .....!</h4>
@endif

@endsection
