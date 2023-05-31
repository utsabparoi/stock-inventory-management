@extends('frontend.layouts.front_template')

@section('content')


<!--content-->
<div class="content-top ">
    <div class="container ">
        <div class="spec ">
            <h3>Checkout Page</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
    </div>
</div>


<!--content-->
<div class="container wrapper">
    <div class="row cart-head">
        <div class="container">
            <div class="row">
                <p></p>
            </div>
            <div class="row" style="margin-bottom: 20px;">
                <div style="display: table; margin: auto;">
                    <span class="step step_complete"> <a href="#" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                    <span class="step step_complete"> <a href="#" class="check-bc" style="margin-left: 10px;">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                    <span class="step_thankyou check-bc step_complete">Thank you</span>
                </div>
            </div>
            <div class="row">
                <p></p>
            </div>
        </div>
    </div>
    <div class="row cart-body">
        <form id="customerOrder" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                <!--REVIEW ORDER-->
                <div class="panel panel-info">
                    <div class="panel-heading" style="padding: 10px 15px !important;">
                        Review Order <div class="pull-right"><small><a class="afix-1" href="#">Edit Cart</a></small></div>
                    </div>
                    <div class="panel-body" style="padding: 15px;">
                        @php $order_total = 0; @endphp
                        @foreach($cartdata as $productinfo)
                        @php $order_total+=$productinfo->retail_price @endphp
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-3">
                                <img class="img-responsive" src="{{ asset($productinfo->image) }}" width="50px" />
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="col-xs-12" name="product_name">{{ $productinfo->name }}</div>
                                <div class="col-xs-12"><small>Quantity:<span>{{ $productinfo->product_qty }}</span></small></div>
                            </div>
                            <div class="col-sm-3 col-xs-3 text-right">
                                <h6><span>৳ </span>{{ $productinfo->retail_price }}</h6>
                            </div>
                        </div>
                        @endforeach

                        <div class="form-group">
                            <hr />
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <strong>Subtotal</strong>
                                <div class="pull-right"><span>৳ </span><span id="order_subtotal">{{$order_total}}</span></div>
                            </div>
                            <div class="col-xs-12">
                                <small>Shipping</small>
                                <div class="pull-right">৳<span id="shippingfee">0</span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <hr />
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <strong>Order Total</strong>
                                <div class="pull-right"><span>৳ </span><span id="order_total"></span></div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class=text-center col-md-12 col-sm-6 col-xs-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Place Your Order</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--REVIEW ORDER END-->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                <!--SHIPPING METHOD-->
                <div class="panel panel-info">
                    <div class="panel-heading" style="padding: 10px 15px !important;">Address</div>
                    <div class="panel-body" style="padding: 15px;">
                        <div class="form-group">
                            <div class="col-md-12">
                                <h4>Shipping Address</h4>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-xs-12">
                                <strong>First Name:</strong>
                                <input type="text" name="first_name" class="form-control" value="@auth {{Auth::user()->name}}@endauth" />
                            </div>
                            <div class="span1"></div>
                            <div class="col-md-6 col-xs-12">
                                <strong>Last Name:</strong>
                                <input type="text" name="last_name" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Address:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="address" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>City:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="city" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Division</strong></div>
                            <div class="col-md-12">
                                <select id="DeliAddress" name="customer_area" required="required" class="form-control">
                                    <option selected="">Select Your Area</option>
                                    <option value="dhaka">Dhaka</option>
                                    <option value="chattagram">Chattagram</option>
                                    <option value="rajshahi">Rajshahi</option>
                                    <option value="barishal">Barishal</option>
                                    <option value="mymenshing">Mymenshing</option>
                                    <option value="khulna">Khulna</option>
                                    <option value="sylhet">Sylhet</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                            <div class="col-md-12">
                                <input type="text" name="zip_code" class="form-control" value="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Phone Number:</strong></div>
                            <div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="" /></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12"><strong>Email Address:</strong></div>
                            <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="@auth {{Auth::user()->email}}@endauth"" /></div>
                        </div>
                    </div>
                </div>
                <!--SHIPPING METHOD END-->


                <!--PAYMENT TYPE-->
                <div class="panel panel-info">
                    <div class="panel-heading" style="padding: 10px 15px !important;"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                    <div class="panel-body" style="padding: 15px;">
                        <div class="form-group">
                            <div class="col-md-12"><strong>Payment Type:</strong></div>
                            <div class="col-md-12">
                                <select id="payment_type" name="payment_type" class="form-control">
                                    <option value="1">Cash On Delivery</option>
                                    <option value="2">Bank</option>
                                    <option value="3">Bkash</option>
                                    <option value="4">Nagad</option>
                                    <option value="5">Visa</option>
                                    <option value="6">MasterCard</option>
                                    <option value="7">American Express</option>
                                    <option value="8">Discover</option>
                                </select>
                            </div>
                        </div>

                        <!-- Bkash and Nagad -->
                        <div id="txn_id" style="display:none">
                            <div class="form-group"></div>
                            <div class="col-md-12"><strong>Transection ID:</strong></div>
                            <div class="col-md-12"><input type="text" class="form-control" name="txn_number" value="" /></div>
                        </div>

                        <div id="credit_card" style="display:none">
                            <div id="card">
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Credit Card Number:</strong></div>
                                    <div class="col-md-12"><input type="text" class="form-control" name="car_number" value="" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12"><strong>Card CVV:</strong></div>
                                    <div class="col-md-12"><input type="text" class="form-control" name="car_code" value="" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <strong>Expiration Date</strong>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="">
                                            <option value="">Month</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="">
                                            <option value="">Year</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <span>Pay secure using your credit card.</span>
                                    </div>
                                    <div class="col-md-12">
                                        <ul class="ms-1 p-2 cards">
                                            <li class="visa hand">Visa</li>
                                            <li class="mastercard hand">MasterCard</li>
                                            <li class="amex hand">Amex</li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- PAYMENT END-->

            </div>

        </form>
    </div>
    <div class="row cart-footer">

    </div>
</div>

<script>
    $(document).ready(function() {
        $('#DeliAddress').on('change', function() {
            var selectedDivision = $(this).val();
            if (selectedDivision == 'dhaka') {
                var data = 25;
            } else {
                data = 60;
            }

            //$("#text").val(selectedDivision);
            $("#shippingfee").html(data);

            var order_subtotal = $('#order_subtotal').html();
            var order_total = parseInt(order_subtotal) + parseInt(data);
            $("#order_total").html(order_total);


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#customerOrder').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                //var product_id = $(this).data('id');
                //var price = $(this).data('price');
                //var quantity = $(this).data('quantity');

                $('#image-input-error').text('');

                $.ajax({
                    type: "POST",
                    url: "{{ route('submit-order')}}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.success === true) {
                            swal("Done!", response.message, "success");
                        } else {
                            swal("Error!", response.message, "error");
                        }
                        //console.log(response);
                        //alert("Data saved successfully");
                        window.location.href = "{{ route('thankyou') }}";
                        //location.reload();
                    },
                    error: function(error) {
                        console.log(error)
                        alert("Data not saved");
                    }
                })
            })

        });

    });
</script>



<script>
    $(document).ready(function() {

        $('#payment_type').on('change', function() {
            var payment_type = $(this).val();
            if (payment_type == 1) {
                $('#credit_card').hide();
                $('#txn_id').hide();
            } else if (payment_type == 3) {
                $('#credit_card').hide();
                $('#txn_id').show();
            } else if (payment_type == 4) {
                $('#credit_card').hide();
                $('#txn_id').show();
            } else {
                $('#credit_card').show();
                $('#txn_id').hide();
            }

        });

    });
</script>


@endsection


