@extends('layouts.user.app')
@section('content')

<section><!--slider-->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://img.freepik.com/free-photo/top-view-fish-chips-plate-with-lemon-slice-copy-space_23-2148784865.jpg?w=996&t=st=1669740283~exp=1669740883~hmac=e17c1ac14a55ee2e772933c659b76d2866692291815a9a6118c150ae9fc659aa" class="d-block w-100" height="480px" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://t3.ftcdn.net/jpg/01/74/30/92/240_F_174309231_MFxMqvpDBjBj0xaeRRX9PprID9b1H5tU.jpg" class="d-block w-100" height="480px" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://t3.ftcdn.net/jpg/02/09/66/64/240_F_209666486_foN2EiDL18EraFyM5KyhUYGNUkzagguB.jpg" class="d-block w-100" height="480px" alt="...">
          </div>
        </div>
      </div>
</section><!--end slider-->

<!--category start-->
<section class="my-5 container">
    <div class="">
        <p class="text-center h4 p-2" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;"> LIST OF CATEGORIES</p>
    </div>
    <div class="row">
        @foreach ($categories as $cat)
            <div class="col-6 col-sm-6 col-md-2 col-lg-2 my-2">
                <div class="card" >
                    @php
                    $image=json_decode($cat->image);
                    @endphp
                    @if(empty($image))
                        <td>Image Not Selected</td>
                    @else
                    <div class="container mt-3 text-center" >
                        <img style="border-radius: 50%;" height="70px" width="70px" src="{{asset($image[0])}}" class="" alt="...">
                    </div>
                    @endif
                    <div class="card-body">
                    <p class="card-text text-center">
                        <a style="font-size: 18px; font-weight:bold " href="{{ url('/category/product',$cat->id) }}">{{ $cat->name }}</a> <br>
                    </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!--category end -->

<!--latest product start here-->
<section class="my-5 container">
    <div class="">
        <p class="text-center h4 p-2" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;">LATEST PRODUCTS</p>
    </div>
    <div class="row">
        @foreach ($latest_products as $l)
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 my-3">
                <div class="card" >
                    @php
                    $image=json_decode($l->image);
                    @endphp
                    @if(empty($image))
                        <td>Image Not Selected</td>
                    @else
                    <div class="container mt-3" >
                        <img height="200px" width="100%" src="{{asset($image[0])}}" class="card-img-top" alt="...">
                    </div>
                    @endif
                    <div class="card-body">
                    <p class="card-text text-center"><a href="{{ url('product/details',$l->id) }}">{{ $l->name }}</a> <br>
                        <span class="text-center">{{ $l->price }} Tk</span>
                    </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!--end latest product-->


<!--latest product start here-->
<section class="my-5 container">
    <div class="">
        <p class="text-center h4 p-2" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;">POPULAR PRODUCTS</p>
    </div>

    <div class="row">
        @foreach ($popular_products as $p)
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 my-3">
            <div class="card" >
                @php
                $image=json_decode($p->image);
                @endphp
                @if(empty($image))
                    <td>Image Not Selected</td>
                @else
                <div class="container mt-3" >
                    <img  height="200px" width="100%" src="{{asset($image[0])}}" class="card-img-top" alt="...">
                </div>
                @endif
                <div class="card-body">
                <p class="card-text text-center"><a href="{{ url('product/details',$p->id) }}">{{ $p->name }}</a> <br>
                    <span class="text-center">{{ $p->price }} Tk</span>
                </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!--end latest product-->

<!--latest product start here-->
<section class="my-5 container">
    <div class="">
        <p class="text-center h4 p-2" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;">REGULAR PRODUCTS</p>
    </div>

    <div class="row">
        @foreach ($regular_products as $r)
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 my-3">
            <div class="card" >
                @php
                $image=json_decode($r->image);
                @endphp
                @if(empty($image))
                    <td>Image Not Selected</td>
                @else
                <div class="container mt-3" >
                    <img  height="200px" width="100%"  src="{{asset($image[0])}}" class="card-img-top" alt="...">
                </div>
                @endif
                <div class="card-body">
                <p class="card-text text-center"><a href="{{ url('product/details',$r->id) }}">{{ $r->name }}</a> <br>
                    <span class="text-center">{{ $r->price }} Tk</span>
                </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>
<!--end latest product-->
@endsection
