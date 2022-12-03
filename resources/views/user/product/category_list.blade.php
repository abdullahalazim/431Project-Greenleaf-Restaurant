@extends('layouts.user.app')
@section('content')

 <!--full wrapper start here-->
 <section class="full-wrapper" >

    <!--latest product start here-->
    <section class="my-5 container">
        <div class="">
            <p class="text-center">CATEGORY PRODUCTS</p>
        </div>

        <div class="row">
            @foreach ($products as $item)
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 my-3">
                <div class="card" >
                    @php
                    $image=json_decode($item->image);
                    @endphp
                    @if(empty($image))
                        <td>Image Not Selected</td>
                    @else
                    <div class="container mt-3" >
                        <img  height="250px" width="100%" src="{{asset($image[0])}}" class="card-img-top" alt="...">
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
