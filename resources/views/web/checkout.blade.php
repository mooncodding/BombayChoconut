@extends('web.master')
@section('content')
            <!--Breadcrumb Section Start-->
            <section class="breadcrumb-bg" style="background-image:url({{asset('web-assets/images/banner/checkout.jpg')}})">                
                <div class="theme-container container ">                       
                    {{-- <div class="site-breadcumb white-clr">                        
                        <h2 class="section-title"> <strong class="clr-txt">naturix </strong> <span class="light-font">Shop </span> </h2>
                        <ol class="breadcrumb breadcrumb-menubar">
                            <li> <a href="/#"> Home </a> Checkout  </li>                             
                        </ol>
                    </div>   --}}
                </div>
            </section>
            <!--Breadcrumb Section End-->


            <!-- Checkout Starts-->
            <section class="checkout-wrap sec-space">
                <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <style>
                * {
                box-sizing: border-box;
                }
                .section-checkout .row {
                display: -ms-flexbox; /* IE10 */
                display: flex;
                -ms-flex-wrap: wrap; /* IE10 */
                flex-wrap: wrap;
                margin: 0 -16px;
                }
                .section-checkout .col-25 {
                -ms-flex: 25%; /* IE10 */
                flex: 25%;
                }
                .section-checkout .col-50 {
                -ms-flex: 50%; /* IE10 */
                flex: 50%;
                }
                .section-checkout .col-75 {
                -ms-flex: 75%; /* IE10 */
                flex: 75%;
                }
                .section-checkout .col-25,
                .col-50,
                .col-75 {
                padding: 0 16px;
                }
                .section-checkout .container {
                padding: 5px 20px 15px 20px;
                border-radius: 3px;
                }
                .section-checkout input[type=text] {
                width: 100%;
                margin-bottom: 20px;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 3px;
                }
                .section-checkout label {
                margin-bottom: 10px;
                display: block;
                }
                .section-checkout .icon-container {
                margin-bottom: 20px;
                padding: 7px 0;
                font-size: 24px;
                }
                .section-checkout .btn {
                background-color: #04AA6D;
                color: white;
                padding: 12px;
                margin: 10px 0;
                border: none;
                width: 100%;
                border-radius: 3px;
                cursor: pointer;
                font-size: 17px;
                }
                .section-checkout .btn:hover {
                background-color: #45a049;
                }
                .section-checkout a {
                color: #2196F3;
                }
                .section-checkout hr {
                border: 1px solid lightgrey;
                }
                .section-checkout span.price {
                float: right;
                color: grey;
                }
                /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
                @media (max-width: 800px) {
                    .section-checkout .row {
                    flex-direction: column-reverse;
                }
                .section-checkout .col-25 {
                    margin-bottom: 20px;
                }
                }
                </style>
                </head>
                <body>
                <div class="section-checkout">
                <div class="row">
                <div class="col-75">
                    <div class="container">
                        @if ($message = Session::get('success'))
                          <div class="p-4 mb-3 bg-green-400 rounded">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                      @endif
                    <form action="{{route('order.store')}}" method="POST">
                        @csrf
                        <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="name" placeholder="John M. Doe">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="john@example.com">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="New York">
                            <div class="row">
                            <div class="col-50">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" placeholder="NY">
                            </div>
                            <div class="col-50">
                                <label for="zip">Zip</label>
                                <input type="text" id="zip" name="zip" placeholder="10001">
                            </div>
                            </div>
                        </div>
                        </div>
                        <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Cash On Delivery
                        </label>
                        <button type="submit" class="btn">Order Placed</button>
                    </form>
                    </div>
                </div>
                </div>
                </div>
                </body>
                </html>
            </section>
            <!-- / Checkout Ends -->      

            <!-- / CONTENT AREA -->

     @endsection