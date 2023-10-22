@extends('web.master')
@section('content')

            <!--Breadcrumb Section Start-->
            <section class="breadcrumb-bg" style="background-image:url({{asset('web-assets/images/banner/cart.jpg')}})">                
                <div class="theme-container container ">                       
                    {{-- <div class="site-breadcumb white-clr">                        
                        <h2 class="section-title"> <strong class="clr-txt">Bombay</strong> <span class="light-font">Shop </span> </h2>
                        <ol class="breadcrumb breadcrumb-menubar">
                            <li> <a href="/#"> Home </a> Shopping Cart  </li>                             
                        </ol>
                    </div>   --}}
                </div>
            </section>
            <!--Breadcrumb Section End-->


            <!-- Cart Starts-->
            <section class="shop-wrap sec-space">
                <div class="container"> 
                    <!-- Shopping Cart Starts -->
                    <div class="cart-table">
                        <form class="cart-form">
                            <table class="product-table">
                                <thead class="">
                                    <tr>                                                                       
                                        <th>product detail</th>  
                                        <th></th> 
                                        <th>Product price</th> 
                                        <th>quantity</th>
                                        <th>total price</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="image">
                                            <div class="white-bg">
                                                <a class="media-link" href="/#"><img src="{{asset('web-assets/images/giftbasket/1.png')}}" alt=""></a> 
                                            </div>
                                        </td>
                                        <td class="description">
                                            <div class="rating">
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>                                               
                                            </div>
                                            <h6 class="fsz-12 gray-color"> Overall Rating : 5/5 </h6>
                                            <div class="divider-2"></div>
                                            <h3 class="product-title no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>almonds </strong> </a> </h3>
                                            <h6>DRY FRUITS</h6>                                                                                                                             
                                        </td>    
                                        <td> 
                                            <div class="price fontbold-2"> 
                                                <strong class="fsz-20">$50.00 </strong> <del class="light-font"> <b>$65.00</b> </del>
                                            </div>
                                        </td> 
                                        <td>
                                            <div class="prod-btns fontbold-2">
                                                <div class="quantity">
                                                    <button class="btn minus"><i class="fa fa-minus-circle"></i></button>
                                                    <input title="Qty" placeholder="03" class="form-control qty" type="text">
                                                    <button class="btn plus"><i class="fa fa-plus-circle"></i></button>
                                                </div>
                                                <div class="sort-dropdown">
                                                    <div class="search-selectpicker selectpicker-wrapper">
                                                        <select class="selectpicker input-price"  data-width="100%"
                                                                data-toggle="tooltip">
                                                            <option>Kilo</option>
                                                            <option>2 Kilo</option>
                                                            <option>3 Kilo</option>
                                                            <option>4 Kilo</option>
                                                            <option>5 Kilo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td> 
                                            <strong class="clr-txt fsz-20 fontbold-2">$50.00</strong> <a href="/#" class="remove fa fa-close clr-txt"></a>
                                        </td>                                       
                                    </tr>      
                                    <tr>
                                        <td class="image">
                                            <div class="white-bg">
                                                <a class="media-link" href="/#"><img src="{{asset('web-assets/images/giftbasket/2.png')}}" alt=""></a> 
                                            </div>
                                        </td>
                                        <td class="description">
                                            <div class="rating">
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>                                               
                                            </div>
                                            <h6 class="fsz-12 gray-color"> Overall Rating : 5/5 </h6>
                                            <div class="divider-2"></div>
                                            <h3 class="product-title no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>pepper </strong> </a> </h3>
                                            <h6>VEGETABLE</h6>                                                                                                                             
                                        </td>    
                                        <td> 
                                            <div class="price fontbold-2"> 
                                                <strong class="fsz-20">$50.00 </strong> <del class="light-font"> <b>$65.00</b> </del>
                                            </div>
                                        </td> 
                                        <td>
                                            <div class="prod-btns fontbold-2">
                                                <div class="quantity">
                                                    <button class="btn minus"><i class="fa fa-minus-circle"></i></button>
                                                    <input title="Qty" placeholder="03" class="form-control qty" type="text">
                                                    <button class="btn plus"><i class="fa fa-plus-circle"></i></button>
                                                </div>
                                                <div class="sort-dropdown">
                                                    <div class="search-selectpicker selectpicker-wrapper">
                                                        <select class="selectpicker input-price"  data-width="100%"
                                                                data-toggle="tooltip">
                                                            <option>Kilo</option>
                                                            <option>2 Kilo</option>
                                                            <option>3 Kilo</option>
                                                            <option>4 Kilo</option>
                                                            <option>5 Kilo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td> 
                                            <strong class="clr-txt fsz-20 fontbold-2">$50.00</strong> <a href="/#" class="remove fa fa-close clr-txt"></a>
                                        </td>                                       
                                    </tr>
                                    <tr>
                                        <td class="image">
                                            <div class="white-bg">
                                                <a class="media-link" href="/#"><img src="{{asset('web-assets/images/giftbasket/3.png')}}" alt=""></a> 
                                            </div>
                                        </td>
                                        <td class="description">
                                            <div class="rating">
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>                                               
                                            </div>
                                            <h6 class="fsz-12 gray-color"> Overall Rating : 5/5 </h6>
                                            <div class="divider-2"></div>
                                            <h3 class="product-title no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>onion </strong> </a> </h3>
                                            <h6>VEGETABLE</h6>                                                                                                                             
                                        </td>    
                                        <td> 
                                            <div class="price fontbold-2"> 
                                                <strong class="fsz-20">$50.00 </strong> <del class="light-font"> <b>$65.00</b> </del>
                                            </div>
                                        </td> 
                                        <td>
                                            <div class="prod-btns fontbold-2">
                                                <div class="quantity">
                                                    <button class="btn minus"><i class="fa fa-minus-circle"></i></button>
                                                    <input title="Qty" placeholder="03" class="form-control qty" type="text">
                                                    <button class="btn plus"><i class="fa fa-plus-circle"></i></button>
                                                </div>
                                                <div class="sort-dropdown">
                                                    <div class="search-selectpicker selectpicker-wrapper">
                                                        <select class="selectpicker input-price"  data-width="100%"
                                                                data-toggle="tooltip">
                                                            <option>Kilo</option>
                                                            <option>2 Kilo</option>
                                                            <option>3 Kilo</option>
                                                            <option>4 Kilo</option>
                                                            <option>5 Kilo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td> 
                                            <strong class="clr-txt fsz-20 fontbold-2">$50.00</strong> <a href="/#" class="remove fa fa-close clr-txt"></a>
                                        </td>                                       
                                    </tr>
                                </tbody>                               
                            </table>

                            <div class="continue-shopping">
                                <div class="left">
                                    <h6>ENTER VOUCHER CODE IF YOU HAVE ONE. <span class="clr-txt-2"> APPLY HERE </span> </h6>
                                    <div class="coupan-form"> 
                                        <input class="form-control" >
                                        <button class="btn" type="submit"> APPLY CODE </button>
                                    </div>
                                </div>
                                <div class="right"> <strong class="fsz-20 fontbold-2">Subtotal : <span class="clr-txt"> $150.00 </span> </strong> </div>
                            </div>

                            <div class="shp-btn col-sm-12 text-center">
                                <button class="theme-btn-2 btn"> <b> CONTINUE SHOPPING </b> </button>
                                <a href="/checkout"> <button class="theme-btn-3 btn"> <b>     CHECKOUT NOW </b> </button></a>
                            </div>                                   


                        </form>
                    </div>                    
                    <!-- / Shopping Cart Ends -->
                </div>
            </section>
            <!-- / Cart Ends -->      

            <!-- / CONTENT AREA -->

@endsection