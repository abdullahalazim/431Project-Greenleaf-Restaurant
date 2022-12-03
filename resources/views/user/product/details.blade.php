@extends('layouts.user.app')
@section('content')

 <!--full wrapper start here-->
 <section class="full-wrapper" >
        <!--detials product start here-->
        <section class="container my-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                    <div class="">
                        <div class="card-body">
                            @php
                            $image=json_decode($product->image);
                            @endphp
                            @if(empty($image))
                                <td>Image Not Selected</td>
                            @else
                            <div class="container mt-3" >
                            <img src="{{asset($image[0])}}" class="card-img-top"   alt="...">
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                    <div class="container my-5">
                        <p>
                            <span class="font-weight-bold">{{ $product->name }}</span><br>
                            <span>---{{ $product->category ? $product->category->name:'' }}</span><br>
                            <span>---stock: <span class="text-success">Available</span></span><br>
                            <span>---Price:{{ $product->unit }} {{ $product->price }} Tk </span><br>
                        </p>
                        <p>

                            <a href="{{ url('user/cart/store', $product->id) }}" class="btn btn-primary my-5">Add To Card</a>
                        </p>

                        <p class="mt-5">
                            <span>
                                {!! $product->description !!}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!--end detials product-->


    <!--latest product start here-->
    <section class="my-5 container">
        <div class="">
            <p class="text-center">RELETED CATEGORY PRODUCTS</p>
        </div>

        <div class="row">
            @foreach (App\models\Product::where('category_id', $product->category_id)->get() as $item)
            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                <div class="card" >
                    @php
                    $image=json_decode($item->image);
                    @endphp
                    @if(empty($image))
                        <td>Image Not Selected</td>
                    @else
                    <div class="container mt-3" >
                        <img src="{{asset($image[0])}}" class="card-img-top" alt="...">
                    </div>
                    @endif
                    <div class="card-body">
                    <p class="card-text text-center"><a href="{{ url('product/details',$item->id) }}">{{ $item->name }}</a> <br>
                        <span class="text-center">{{ $item->price }} Tk</span>
                    </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!--end latest product-->

@endsection
