@extends('frontend.layouts.front_template')
@section('content')
    <div data-vide-bg="video/video">
        <div class="container">
            <div class="banner-info">
                <h3>It is a long established fact that a reader will be distracted by
                    the readable </h3>
                <div class="search-form">
                    <form action="#" method="post">
                        <input id="search_data" type="text" placeholder="Search..." name="Search...">
                        <input type="submit" value=" ">
                        <input id="search_value" type="hidden" value="">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.jQuery || document.write('<script src="{{ asset('/frontend/js/vendor/jquery-1.11.1.min.js') }}"><\/script>')
    </script>

    <!-- Carousel
        ================================================== -->
    {{-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner text-center" role="listbox">
            <div class="item active">
                <a href="kitchen.html"><img class="first-slide" src="{{ asset('/frontend/images/ba.jpg') }}"
                        alt="First slide"></a>

            </div>
            <div class="item">
                <a href="care.html"> <img class="second-slide " src="{{ asset('/frontend/images/ba1.jpg') }}"
                        alt="Second slide"></a>

            </div>
            <div class="item">
                <a href="hold.html"><img class="third-slide " src="{{ asset('/frontend/images/ba2.jpg') }}"
                        alt="Third slide"></a>

            </div>
        </div>

    </div> --}}

    <!--content-->
    <div class="content-top ">
        <div class="container ">
            <div class="spec ">
                <h3>New Arrivals</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
            <div class="tab-head ">
                <nav class="nav-sidebar">
                    <ul class="nav tabs ">
                        @foreach ($categories as $category)
                            <li><a href="{{ route('single-category', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </nav>
                <div class=" tab-content tab-content-t ">
                    <div class="tab-pane active text-style" id="tab1">
                        <div class=" con-w3l">
                            @foreach ($new_arrivals as $item)
                                <div class="col-md-3 m-wthree">
                                    <div class="col-m">
                                        <a href="#" data-toggle="modal" data-target="#myModal" class="offer-img">
                                            <img src="{{ asset($item->image) }}" class="img-responsive" alt="">
                                            {{-- <div class="offer">
                                                <p><span>Offer</span></p>
                                            </div> --}}
                                        </a>
                                        <div class="mid-1">
                                            <div class="women">
                                                <h6><a href="single.html">{{ $item->name }}</a></h6>
                                            </div>
                                            <div class="">
                                                <p><label>{{ $item->retail_price }}</label></p>
                                                <div class="block">
                                                    <div class="starbox small ghosting"> </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="add">
                                                <button class="btn btn-danger my-cart-btn my-cart-b "
                                                    data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                    data-summary="summary 1" data-price="{{ $item->retail_price }}"
                                                    data-quantity="1" data-image="{{ asset($item->image) }}">Add to
                                                    Cart</button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                {{-- Product Modal --}}
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content modal-info">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body modal-spa">
                                                <div class="col-md-5 span-2">
                                                    <div class="item">
                                                        <img src="{{ asset($item->image) }}" class="img-responsive"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="col-md-7 span-1 ">
                                                    <h3>{{ $item->name }}</h3>
                                                    <p class="in-para"> There are many variations of this product.
                                                    </p>
                                                    <div class="price_single">
                                                        <span
                                                            class="reducedfrom "><del>{{ $item->retail_price }}tk</del>{{ $item->cost_price }}tk</span>

                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <h4 class="quick">Quick Overview:</h4>
                                                    <p class="quick_desc">{{ $item->description }}</p>
                                                    <div class="add-to">
                                                        <button class="btn btn-danger my-cart-btn my-cart-btn1 "
                                                            data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                            data-summary="summary 24" data-price="{{ $item->cost_price }}"
                                                            data-quantity="1" data-image="{{ asset($item->image) }}">Add to
                                                            Cart</button>
                                                    </div>
                                                </div>
                                                <div class="clearfix"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal End --}}
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!--content-->
    <div class="content-mid">
        <div class="container">

            <div class="col-md-4 m-w3ls">
                <div class="col-md1 ">
                    <a href="kitchen.html">
                        <img src="{{ asset('/frontend/images/co1.jpg') }}" class="img-responsive img" alt="">
                        <div class="big-sa">
                            <h6>New Collections</h6>
                            <h3>Season<span>ing </span></h3>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 m-w3ls1">
                <div class="col-md ">
                    <a href="hold.html">
                        <img src="{{ asset('/frontend/images/co.jpg') }}" class="img-responsive img" alt="">
                        <div class="big-sale">
                            <div class="big-sale1">
                                <h3>Big <span>Sale</span></h3>
                                <p>It is a long established fact that a reader </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 m-w3ls">
                <div class="col-md2 ">
                    <a href="kitchen.html">
                        <img src="{{ asset('/frontend/images/co2.jpg') }}" class="img-responsive img1" alt="">
                        <div class="big-sale2">
                            <h3>Cooking <span>Oil</span></h3>
                            <p>It is a long established fact that a reader </p>
                        </div>
                    </a>
                </div>
                <div class="col-md3 ">
                    <a href="hold.html">
                        <img src="{{ asset('/frontend/images/co3.jpg') }}" class="img-responsive img1" alt="">
                        <div class="big-sale3">
                            <h3>Vegeta<span>bles</span></h3>
                            <p>It is a long established fact that a reader </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--content-->
    {{-- <!-- Carousel
            ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <a href="kitchen.html"><img class="first-slide" src="{{ asset('/frontend/images/ba.jpg') }}"
                        alt="First slide"></a>

            </div>
            <div class="item">
                <a href="care.html"> <img class="second-slide " src="{{ asset('/frontend/images/ba1.jpg') }}"
                        alt="Second slide"></a>

            </div>
            <div class="item">
                <a href="hold.html"><img class="third-slide " src="{{ asset('/frontend/images/ba2.jpg') }}"
                        alt="Third slide"></a>

            </div>
        </div>

    </div><!-- /.carousel --> --}}

    <!--content-->
    <div class="product">
        <div class="container">
            <div class="spec ">
                <h3>Popular Categories</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
            @foreach ($popular_categories as $category)
                <div class="col-md-4 kic-top1">
                    <a href="{{ route('single-category', $category->id) }}">
                        <img src="{{ asset($category->image) }}" style="height: 140px !important" class="img-responsive"
                            alt="">
                    </a>
                    <h6 style="font-weight: bold">{{ $category->name }}</h6>
                    <p>{!! $category->details !!}</p>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('#search_data').autocomplete({
                source: "livesearch",
                minLength: 1,
                select: function(event, ui) {
                    $('#search_data').val(ui.item.value);
                }
            }).data('ui-autocomplete')._renderItem = function(ul, item) {
                $('#search_value').val(item.id);
                return $("<li class='ui-autocomplete-row'></li>")
                    .data("item.autocomplete", item)
                    .append(item.label)
                    .appendTo(ul);
            };

            $(document).bind('keypress', function(e) {
                if (e.keyCode == 13) {

                    var inputs = $(this).parents("form").eq(0).find(":input");
                    if (inputs[inputs.index(this) + 1] != null) {
                        inputs[inputs.index(this) + 1].focus();
                    }
                    e.preventDefault();

                    var pid = $('#search_value').val();
                    window.location.href = "{{ url('/details/') }}" + '/' + pid;
                }
            });

        });
    </script>
@endsection
