@extends('master.master')
@section('title')
    <title>About</title>
@endsection
@section('content')
    <div class="all-title-box" style="background: url({{ asset('home/images/1200px-Sun-group-logo.png') }})">
        <div class="container text-center">
            <h1>Blog<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
        </div>
    </div>
   <div class="container">
       <!--Section: Block Content-->
       <section class="mb-5 mt-4">
           <div class="row">
               <div class="col-md-6 mb-4 mb-md-0">
                   <div class="mdb-lightbox">
                       <div class="row product-gallery mx-1">
                           <div class="col-12 mb-0">
                               <figure class="view overlay rounded z-depth-1 main-img">
                                   <a href="">
                                       <img src="{{ asset($courseDetail->image_path) }}"
                                            class="img-fluid z-depth-1">
                                   </a>
                               </figure>
                           </div>

                       </div>

                   </div>

               </div>
               <div class="col-md-6">
                   <h1>{{ $courseDetail->name }}</h1>
                   <p><span class="mr-1"><strong>{{ number_format($prices->price) }}</strong> VNĐ</span></p>
                   <p><span class="mr-1"><strong>{{ $prices->lesson }}</strong> Buổi</span></p>
                   <hr>
                   <button type="button" class="btn btn-primary btn-md mr-1 mb-2">Buy now</button>
               </div>
           </div>

       </section>
       <!--Section: Block Content-->
   </div>
@endsection
