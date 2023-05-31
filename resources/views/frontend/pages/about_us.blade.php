@extends('frontend.layouts.front_template')
@section('content')
    <!--banner-->
    <div class="banner-top">
        <div class="container">
            <h3>About Us</h3>
            <h4><a href="{{ url('/') }}">Home</a><label>/</label>About Us</h4>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- faqs -->
    <div class="about-w3 ">
        <!--about-->
        <div class="container">
            <div class="about">
                <div class="spec ">
                    <h3>About</h3>
                    <div class="ser-t">
                        <b></b>
                        <span><i></i></span>
                        <b class="line"></b>
                    </div>
                </div>

                {{-- <div class="col-md-4 about-right">
                    <img class="img-responsive" src="{{ asset($about_us->image) }}" alt="">
                </div> --}}
                <div class="col-md-4 col-md-offset-4 about-left">
                    <p>{!! $about_us->description !!}</p>
                </div>
                <div class="col-md-4 about-right">
                    <img width="180px" class="img-responsive" src="{{ asset($about_us->image) }}" alt="Not Found">
                </div>

                <div class="clearfix"> </div>
            </div>
        </div>
        <!--//about-->

    </div>
    <!-- // Terms of use -->
@endsection
