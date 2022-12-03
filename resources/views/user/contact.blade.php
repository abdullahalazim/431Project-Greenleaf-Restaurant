@extends('layouts.user.app')
@section('content')

 <!--full wrapper start here-->
 <section class="full-wrapper container my-5" >
    <div class="card container ">
        <div class="card-header">
            <p class="card-title h4">CONTACT-US</p>
        </div>
        <div class="card-body ">
            <img class="my-3" src="https://t4.ftcdn.net/jpg/03/36/69/17/240_F_336691726_v3a0M1kBLuAMqyJpe5diWGTWoN2rAg1w.jpg" width="100%" alt="">
           <form action="{{ url('contact/store') }}" method="POST">
               @csrf
               <div class="row">
                   <div class="col-sm-12 col-md-6 col-lg-6">
                       <div class="form-gorup">
                           <label for="">NAME <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" name="name" placeholder="type here name" id="">
                       </div>
                   </div>
                   <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="form-gorup">
                        <label for="">E-MAIL <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" placeholder="type here email" id="">
                    </div>
                   </div>
                   <div class="col-sm-12 col-md-12 col-lg-12 my-2">
                       <label for="">Message <span class="text-danger">*</span></label>
                       <textarea name="description" id="" class="form-control" cols="10" rows="4"></textarea>
                   </div>

                   <div class="col-sm-12 col-md-12 col-lg-12 my-2 text-center">
                    <input type="submit" class="btn btn-info text-light" name="" value="Send Message" id="">
                   </div>
               </div>
           </form>
        </div>
    </div>


    <div class="my-5 ">
            <img width="100%" src="{{ asset('user/images/slider1.jpg') }}" alt="">
    </div>
 </section>

@endsection
