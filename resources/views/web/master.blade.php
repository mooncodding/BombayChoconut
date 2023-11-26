<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="agency, ecommerce">
        <meta name="author" content="Md. Siful Islam, Jtheme">

        <title>Bombay Choconuts</title>

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="shortcut icon" href="/assets/ico/favicon.ico">

        <!-- Font Icon -->
        <link href="/assets/css/plugin/font-awesome.min.css" rel="stylesheet" type="text/css">  

        <!-- CSS Global -->
        <link href="/assets/css/plugin/bootstrap.min.css" rel="stylesheet" type="text/css">  
        <link href="/assets/css/plugin/bootstrap-select.min.css" rel="stylesheet" type="text/css">           
        <link href="/assets/css/plugin/animate.css" rel="stylesheet" type="text/css"> 
        <link href="/assets/css/plugin/subscribe-better.css" rel="stylesheet" type="text/css"> 
        <link href="/assets/css/plugin/owl.carousel.min.css" rel="stylesheet" type="text/css">
        <!-- Custom CSS -->
        <link href="/assets/css/theme.css" rel="stylesheet" type="text/css">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Color CSS -->       
    </head>

    <body id="home" class="wide">

        {{-- <div id="loading">
            <div class="loader">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div> --}}

        <!-- WRAPPER -->
        <main class="wrapper home-wrap"> 
            <!-- CONTENT AREA -->
            <div class="top-header">
            
                    <div class="row">
                        <div class="col-lg-5">
                <p>SUPER DEALS <span style="padding-left:10px;">   FEATURE PRODUCTS <span style="padding-left:10px;">  TRENDING PRODUCTS <span style="padding-left:10px;">  GIFT BASKETS</p>
                        </div>
                        <!-- <div class="col-lg-3">
                <p>
                     <span>adssad</p>
                        </div> -->
                        <div class="col-lg-2">

                        </div>
                        <div class="col-lg-2 locator">
                            <a href="/giftbundle"> <p>  <i class="fa fa-user-plus" aria-hidden="true"></i>
                                STORE LOCATOR</p> </a>
                            <span>
                        </div>
                        <div class="col-lg-2 track">
                        <p style="
                        border-right: 1px solid white;
                        border-left: 1px solid white;
                    "><i class="fa fa-heart" aria-hidden="true">&nbsp;
                        </i>TRACK YOUR ORDER</p> 
                        </div>
                        <div class="col-lg-1">
                        <p style="
                        text-align: start;
                    "><i class="fa fa-user-plus" aria-hidden="true"></i>


                            ACCOUNT</p>
                        </div>
                    
                    
                    </div>
                    
            </div>
            <!-- Main Header Start -->
            <header class="main-header">                  
                <div class="container-fluid rel-div">
                    <!-- <div class="pattern"> 
                        <img alt="" src="assets/img/icons/white-pattern.png" />
                    </div> -->
                    
                    <div class="col-lg-3 col-sm-8">
                        <div class="main-logo">
                            <img src="{{asset('web-assets/images/logo/bombaylogo.png')}}" alt="">
                           
                        </div>
                    </div>
                    <div class="col-lg-6 responsive-menu">  
                    <div class="input-group">
     <div class="input-group-btn search-panel">
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
        <span id="search_concept">All Categories</span> <span class="caret"></span>
      </button>
      <ul class="dropdown-menu scrollable-dropdown" role="menu" id="categories">
        <li><a href="#">Chocolates</a></li>
        <li><a href="#">Dates</a></li>
        <li><a href="#">Milk</a></li>
        <li><a href="#">Gift Pack</a></li>
        <li><a href="#">Bundles</a></li>
        <li><a href="#">Basket</a></li>
        <li><a href="#">Almond</a></li>
        <li><a href="#">Jelly</a></li>
        <li><a href="#">Juice</a></li>
        <li><a href="#">Fresh</a></li>
        <li><a href="#">Gift Bundle</a></li>
        <li><a href="#">Coconuts</a></li>
        <li><a href="#">Chilies</a></li>
        <li><a href="#">Custard</a></li>
        <li><a href="#">Toffees</a></li>
        <li><a href="#">Health and Personal Care</a></li>
      </ul>
     </div>
     <input type="hidden" name="search_param" value="all" id="search_param">
     <input type="text" class="form-control" name="x" id="search" placeholder="Search  For Products...">
     <span class="input-group-btn">
       <button class="btn btn-default" type="button">
         <span class="glyphicon glyphicon-search"></span>
       </button>
   </span>
    </div>
                    </div>
                 
                     <div style=" padding-left: 20px;  padding-top: 10px;   font-size: 20px;" class="col-lg-1 ">
                     <i class="fa fa-list" aria-hidden="true"></i><span style=" padding-left: 33px; "><i class="fa fa-heart-o" aria-hidden="true"></i>

                           
                    </div> 
                    <!-- <div class="col-lg-1">
                    <i class="fa fa-heart-o" aria-hidden="true"></i>

                           
                    </div>  -->
                    <div class="col-lg-2 col-sm-4 cart-megamenu">
                        <div class="cart-hover">
                            <a href="/#"> <img alt="" src="assets/img/icons/cart-icon.png" /> </a>
                            <span class="cnt crl-bg">{{ Cart::getTotalQuantity()}}</span> @if (Cart::getTotal())
                            <span class="price">Rs {{Cart::getTotal()}}</span>
                            @endif 
                            @if (count(Cart::getContent()) > 0)
                            <ul class="pop-up-box cart-popup">
                                @foreach (Cart::getContent() as $item)
                                    <li class="cart-list">
                                        <div class="cart-img"> <img src="{{asset('web-assets/images/giftbasket/1.png')}}" alt=""> </div>
                                        <div class="cart-title">
                                            <div class="fsz-16">
                                                <a href="/#"> {{$item->name}}</a>
                                            </div>
                                            <div class="price"> 
                                                <strong class="clr-txt">Rs {{$item->price}} </strong>
                                            </div>
                                        </div>
                                        <div class="close-icon">
                                            <form action="{{route('cart.remove')}}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                             <button type="submit"><i class="fa fa-close clr-txt"></i></button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                                
                                <li class="cart-list buttons">
                                    <div class="pull-left"> 
                                        <a href="{{route('cart')}}" class="theme-btn-sm-2">View Cart</a>
                                    </div>
                                    <div class="pull-right"> 
                                        <a href="/checkout" class="theme-btn-sm-3"> Checkout </a>
                                    </div>
                                </li>
                            </ul>
                                
                            @endif
                        </div>
                      

                </div>  
            </header>
            <div class="down-header">
<div class="row">
    <div class="col-lg-10 col-md-6 col-sm-12 responsive-menu">  
        <div class="responsive-toggle fa fa-bars"> </div>
        <nav class="fix-navbar" id="primary-navigation">            
            <ul class="primary-navbar">                                                
                <li class="dropdown active">
                    <a href="/" >Home</a>                                            
                    {{-- <ul class="dropdown-menu">    
                        <li><a href="/"> Home 1 </a></li> 
                        <li><a href="/index-2"> Home 2 </a></li> 
                        <li><a href="/index-3"> Home 3 </a></li>
                        <li><a href="/index-4"> Home 4 </a></li>
                    </ul> --}}
                </li> 
                <li><a href="/about-us">About Us</a></li>
                <li class="dropdown">
                    <a href="/shop-1"  >Shop</a>                                            
                    {{-- <ul class="dropdown-menu">    
                        <li><a href="/shop-1"> shop </a></li> 
                        <li><a href="/shop-2"> shop 2 </a></li> 
                        <li><a href="/shop-single"> shop single </a></li>  
                        <li><a href="/my-account"> my account </a></li> 
                    </ul> --}}
                </li> 
                <li class="dropdown">
                    <a href="/#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" >Blog</a>
                    {{-- <ul class="dropdown-menu">    
                        <li><a href="/blog"> blog </a></li>
                        <li><a href="/blog-single"> blog single </a></li>                  
                    </ul> --}}
                </li>
                <li><a href="/contact">Contact Us</a></li>   
               
                <li class="dropdown">
                    <a href="/giftbundle"  >Gift Bundle</a>
                </li>
                <li class="dropdown">
                    <a href="/specialoffers"  >Special Offers</a>
                </li>
                
            </ul>                           
        </nav>
    </div>
   <div class="col-lg-2">
        <div class="mega-submenu">

<span class="nav-trigger">
    <a class="menu-toggle" href="/#"> <img src="assets/img/icons/menu.png" alt="" /> </a>
</span>
<div class="mega-dropdown-menu">
    <a class="menu-toggle fa fa-close" href="/#">  </a>
    <div class="slider-mega-menu">
        <div class="menu-block">
            <div class="menu-caption">                                                               
                <h2 class="menu-title"> <span class="light-font"> Fresh </span>  <strong>Fruits</strong> </h2>
                <ul class="sub-list">
                    <li> <a href="/#">Banana</a> </li>
                    <li> <a href="/#">Water Melon </a> </li>
                    <li> <a href="/#">Blackberry </a> </li>
                    <li> <a href="/#">Plume</a> </li>
                    <li> <a href="/#">Orange</a> </li>
                    <li> <a href="/#">Lemon</a> </li>
                    <li> <a href="/#">Pineapple</a> </li>
                    <li> <a href="/#">Apple</a> </li>
                    <li> <a href="/#">Kiwi</a> </li>
                </ul>
                <h2 class="title"> <a href="/#" class="clr-txt"> All Fruits </a> </h2>
            </div>
            <div class="menu-img">
                <img alt="" src="assets/img/extra/menu-1.png" />
            </div>
        </div>  
        <div class="menu-block">
            <div class="menu-caption">                                                               
                <h2 class="menu-title"> <span class="light-font"> Fresh </span>  <strong>Vegetables</strong> </h2>
                <ul class="sub-list">
                    <li> <a href="/#">Cabbage</a> </li>
                    <li> <a href="/#">Garlic </a> </li>
                    <li> <a href="/#">Onion </a> </li>
                    <li> <a href="/#">Plume</a> </li>
                    <li> <a href="/#">Carrot</a> </li>
                    <li> <a href="/#">Papper</a> </li>
                    <li> <a href="/#">Mushrome</a> </li>
                    <li> <a href="/#">Apple</a> </li>
                    <li> <a href="/#">Kiwi</a> </li>
                </ul>
                <h2 class="title"> <a href="/#" class="clr-txt"> All Vegetables </a> </h2>
            </div>
            <div class="menu-img">
                <img alt="" src="assets/img/extra/menu-2.png" />
            </div>
        </div>  
        <div class="menu-block">
            <div class="menu-caption">                                                               
                <h2 class="menu-title"> <span class="light-font"> Fresh </span>  <strong>Dread Juices</strong> </h2>
                <ul class="sub-list">
                    <li> <a href="/#">Banana Juice</a> </li>
                    <li> <a href="/#">Water Melon Juice</a> </li>
                    <li> <a href="/#">Blackberry Juice</a> </li>
                    <li> <a href="/#">Plume Juice</a> </li>
                    <li> <a href="/#">Orange Juice</a> </li>
                    <li> <a href="/#">Lemon Juice</a> </li>
                    <li> <a href="/#">Pineapple Juice</a> </li>
                    <li> <a href="/#">Apple Juice</a> </li>
                    <li> <a href="/#">Kiwi Juice</a> </li>
                </ul>
                <h2 class="title"> <a href="/#" class="clr-txt"> All Dread juices </a> </h2>
            </div>
            <div class="menu-img">
                <img alt="" src="assets/img/extra/menu-3.png" />
            </div>
        </div>  
        <div class="menu-block">
            <div class="menu-caption">                                                               
                <h2 class="menu-title"> <span class="light-font"> Fresh </span>  <strong>Juices</strong> </h2>
                <ul class="sub-list">
                    <li> <a href="/#">Banana Juice</a> </li>
                    <li> <a href="/#">Water Melon Juice</a> </li>
                    <li> <a href="/#">Blackberry Juice</a> </li>
                    <li> <a href="/#">Plume Juice</a> </li>
                    <li> <a href="/#">Orange Juice</a> </li>
                    <li> <a href="/#">Lemon Juice</a> </li>
                    <li> <a href="/#">Pineapple Juice</a> </li>
                    <li> <a href="/#">Apple Juice</a> </li>
                    <li> <a href="/#">Kiwi Juice</a> </li>
                </ul>
                <h2 class="title"> <a href="/#" class="clr-txt"> All Fresh Juices </a> </h2>
            </div>
            <div class="menu-img">
                <img alt="" src="assets/img/extra/menu-1.png" />
            </div>
        </div>  
        <div class="menu-block">
            <div class="menu-caption">                                                               
                <h2 class="menu-title"> <span class="light-font"> Fresh </span>  <strong>Breads</strong> </h2>
                <ul class="sub-list">
                    <li> <a href="/#">Banana</a> </li>
                    <li> <a href="/#">Water Melon </a> </li>
                    <li> <a href="/#">Blackberry </a> </li>
                    <li> <a href="/#">Plume</a> </li>
                    <li> <a href="/#">Orange</a> </li>
                    <li> <a href="/#">Lemon</a> </li>
                    <li> <a href="/#">Pineapple</a> </li>
                    <li> <a href="/#">Apple</a> </li>
                    <li> <a href="/#">Kiwi</a> </li>
                </ul>
                <h2 class="title"> <a href="/#" class="clr-txt"> All Fresh Bread </a> </h2>
            </div>
            <div class="menu-img">
                <img alt="" src="assets/img/extra/menu-5.png" />
            </div>
        </div>  
        <div class="menu-block">
            <div class="menu-caption">                                                               
                <h2 class="menu-title"> <span class="light-font"> Fresh </span>  <strong>Tea</strong> </h2>
                <ul class="sub-list">
                    <li> <a href="/#">Cabbage</a> </li>
                    <li> <a href="/#">Garlic </a> </li>
                    <li> <a href="/#">Onion </a> </li>
                    <li> <a href="/#">Plume</a> </li>
                    <li> <a href="/#">Carrot</a> </li>
                    <li> <a href="/#">Papper</a> </li>
                    <li> <a href="/#">Mushrome</a> </li>
                    <li> <a href="/#">Apple</a> </li>
                    <li> <a href="/#">Kiwi</a> </li>
                </ul>
                <h2 class="title"> <a href="/#" class="clr-txt"> All Freash Tea </a> </h2>
            </div>
            <div class="menu-img">
                <img alt="" src="assets/img/extra/menu-6.png" />
            </div>
        </div> 
    </div>
</div>
</div>
<div class="responsive-toggle fa fa-bars"> </div>
</div>
    </div>
</div>
            </div>
            <!-- / Main Header Ends -->   

            @yield('content');

            <!-- / CONTENT AREA -->
   <!-- Subscribe Popup-Dark -->
   {{-- <section id="subscribe-popups" class="subscribe-me popups-wrap" style="background-image:url({{asset('web-assets/images/Nuts/1.png')}})">                
    <div class="modal-content">   
        <button type="button" class="sb-close-btn close popup-cls"> <i class="fa-times fa clr-txt"></i> </button>
        <div class="subscribe-wrap">                                                                   
            <div class="main-logo">
                <a href="/"> <img alt="" src="assets/img/logo/main-logo.png" />  </a>
            </div>

            <div class="title-wrap">
                <h2 class="section-title"> <strong>Subscribe Newsletter</strong> </h2>
                <h4 class="fsz-12"> Join our newsletter for free & get latest news weekly </h4>
            </div>

            <form class="newsletter-form">
                <div class="form-group">
                    <input class="form-control" placeholder="enter your email address" required="" type="text">                                                                                     
                </div>
                <div class="form-group">                                               
                    <button class="theme-btn upper-text" type="submit"> <strong> subscribe </strong> </button>                                            
                </div>
            </form>
        </div>
    </div>
</section> --}}
<!-- / Subscribe Popup-Dark -->
            <!-- FOOTER -->
            <footer class="page-footer"> 
                <section class="sec-space light-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 footer-widget">
                                {{-- <div class="main-logo"> --}}
                                    {{-- <a href="/"><img src="{{asset('web-assets/images/logo/bombaylogo.png')}}" alt="">  </a> --}}
                                    <span class="medium-font">Bombay Choconuts</span>
                                {{-- </div> --}}
                            
                                <div class="text-widget">
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
                                  
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 footer-widget lpc">
                                <h2 class="title-1">  <span class="light-font">Services</span> <strong> </strong> </h2>
                            
                                <ul class="list">
                                    <li> <a href="/#"> about our shop </a> </li>
                                    <li> <a href="/#"> top sellers </a> </li>
                                    <li> <a href="/#"> our blog </a> </li>
                                    <li> <a href="/#"> new products </a> </li>
                                    <li> <a href="/#"> secure shopping </a> </li>
                                </ul>
                            </div>
                            <!-- <div class="col-md-2 col-sm-4 footer-widget">
                                 <h2 class="title-1">  <span class="light-font">my  </span> <strong>account </strong> </h2>
                            
                                <ul class="list">
                                    <li> <a href="/my-account"> my account </a> </li>
                                    <li><a href="/account-information"> Account Information </a></li>
                                    <li><a href="/address-book"> Address Books</a></li>
                                    <li><a href="/order-history"> Order History</a></li>
                                    <li><a href="/review-rating"> Reviews and Ratings</a></li>
                                    <li><a href="/return"> Returns Requests</a></li>
                                    <li><a href="/newsletter"> Newsletter</a></li>
                                </ul>
                            </div>  -->
                            <div class="col-md-4 col-sm-4 footer-widget">
                                <h2 class="title-1">  <span class="light-font"> Contact Us </span> <strong> </strong> </h2>
                            
                                <ul>
                                <li> <i class="fa fa-phone"></i> <span>Phone Number<br><a href="/#">03121312312</a> </span> </li>
                                        <li> <i class="fa fa-map-marker"></i> <span> Location<br><strong>Muhammad Ali Society</strong> Sindh, Karachi </span> </li>
                                        <li> <i class="fa fa-envelope"></i> <span>Email<br><a href="/#">contact@bombaychoconuts.com</a> </span> </li>
                                 
                                    </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="footer-bottom">
                    <div class="pattern"> 
                        <img alt="" src="assets/img/icons/white-pattern.png">
                    </div>
                    <div id="to-top" class="to-top"> <i class="fa fa-arrow-circle-o-up"></i> </div>
                    <div class="container ptb-10">
                        <div class="row">
                            <div class="col-md-6 col-sm-5">
                                <p>©2016 <a href="/#"> <strong> bombaychoconnuts.com</strong> </a>,copyright<i class="fa fa-heart red-clr"></i>  all right reserved</p>
                            </div>
                            <div class="col-md-6 col-sm-7">
                                <ul class="primary-navbar footer-menu">
                                    <li> <a href="/#">contact us </a> </li>
                                    <li> <a href="/#">order online  </a> </li>
                                    <li> <a href="/#">special offer </a> </li>
                              
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </footer>
            <!-- /FOOTER -->
            <div id="to-top-mb" class="to-top mb"> <i class="fa fa-arrow-circle-o-up"></i> </div>
        </main>
        <!-- /WRAPPER -->

        <!-- Product Preview Popup -->
        <section class="modal fade" id="product-preview" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg product-modal">
                <div class="modal-content">
                    <a aria-hidden="true" data-dismiss="modal" class="sb-close-btn close" href="/#"> <i class=" fa fa-close"></i> </a>                 
                </div>
            </div>
        </section>
        <!-- / Product Preview Popup -->


     
        @yield('scripts')
        <!-- JS Global -->
        <script src="assets/js/plugin/jquery-2.2.4.min.js"></script>   
        <script src="assets/js/plugin/bootstrap.min.js"></script>
        <script src="assets/js/plugin/bootstrap-select.min.js"></script>
        <script src="assets/js/plugin/owl.carousel.min.js"></script>
        <script src="assets/js/plugin/jquery.plugin.min.js"></script>
        <script src="assets/js/plugin/jquery.countdown.js"></script>
        <script src="assets/js/plugin/jquery.subscribe-better.min.js"></script>

        <!-- Custom JS -->   
        <script src="assets/js/theme.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function () {
            // Function to fetch and display products
                function fetchAndDisplayProducts(id) {
                    $.ajax({
                        url: '/products/filter/' + id,
                        method: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            displayProductCards(data.products);
                        },
                        error: function (error) {
                            console.error('Error fetching data:', error);
                        }
                    });
                }

                // Display products for the default category on page load
                $(document).ready(function () {
                    // Replace 'defaultCategory' with your actual default category
                    const defaultCategory = '1';

                    fetchAndDisplayProducts(defaultCategory);

                    // Set up click event for category buttons
                    $('.category-btn').on('click', function () {
                        const selectedCategory = $(this).data('id');
                        fetchAndDisplayProducts(selectedCategory);
                    });

                    

                    // Set up click event for "View Details" buttons
                    $('.productCards').on('click', '.view-details-btn', function () {
                        const productId = $(this).data('product-id');
                        fetchProductDetails(productId);
                    });
                });

                function displayProductCards(products) {
                    let productsContainer = $(".productCards");
                    productsContainer.empty(); // Clear previous products
                    // Loop through the products and generate HTML for each product card
                    $.each(products, function (index, product) {
                        let productCard = `
                                    <div class="item">
                                        <div class="product-box"> 
                                            <div class="product-media"> 
                                                <img class="prod-img" src="{{asset('images/product-images/${product.photo}')}}" alt=""/>     
                                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                                <div class="prod-icons"> 
                                                    <a href="#" class="fa fa-heart"></a>
                                                    <a  href="javascript:void(0);" data-target="#product-preview" data-toggle="modal" class="fa fa-shopping-basket view-details-btn" data-product-id="${product.id}"></a>
                                                </div>
                                            </div>

                                            <div class="product-caption"> 
                                                <h3 class="product-title">
                                                    <a href="#"> ${product.title}</a>
                                                </h3>
                                                <div class="price"> 
                                                    <strong class="clr-txt">Rs ${product.product_variants[0].sale_price}</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        `;
                        // Append the product card HTML to the products container
                        productsContainer.append(productCard);
                    });
                    // Implement the logic to display the filtered products in the 'products' section
                    // For example, you can loop through the products and update the HTML
                }
                function fetchProductDetails(productId) {
                // Assuming you have an API endpoint to fetch product details
                    $.ajax({
                        url: '/api/getProductById/' + productId,
                        method: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            displayProductDetails(data);
                        },
                        error: function (error) {
                            console.error('Error fetching product details:', error);
                        }
                    });
                }

                function displayProductDetails(product) {
                    const modalBody = $('#product-preview');
                    // Clear existing product details
                    modalBody.empty();
                    // Display product details in the modal
                    modalBody.append(`<div class="modal-dialog modal-lg product-modal">
                        <div class="modal-content">
                            <a aria-hidden="true" data-dismiss="modal" class="sb-close-btn close" href="/#"> <i class=" fa fa-close"></i> </a>                 

                            <div class="product-single pb-50 clearfix">
                                <!-- Single Products Slider Starts --> 
                                <div class="col-lg-6 col-sm-8 col-sm-offset-2 col-lg-offset-0 pt-50">
                                    <div class="prod-slider sync1">
                                        <div class="item"> 
                                        <img src="{{asset('images/product-images/${product.photo}')}}" data-image="${product.photo}" width="300" alt=""/>
                                            <a href="/assets/img/products/prod-big-1.png" data-gal="prettyPhoto[prettyPhoto]" title="Product" class="caption-link"><i class="arrow_expand"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Products Slider Ends --> 

                                <div class="col-lg-6 pt-50">
                                    <div class="product-content block-inline">

                                        <div class="tag-rate">
                                            <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                            <div class="rating">
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="star active"></span>
                                                <span class="fsz-12"> Based on 25 reviews</span>
                                            </div>
                                        </div>

                                        <div class="single-caption"> 
                                            <h3 class="section-title">
                                                <a href="/#"><strong>${product.title}</strong></a>
                                            </h3>
                                            <span class="divider-2"></span>
                                            <p class="price"> 
                                                <strong class="clr-txt fsz-20 saleprice"></strong>
                                            </p>

                                            <div class="fsz-16">
                                                <p>${product.description}</p>
                                            </div>

                                            <div class="prod-btns">
                                                <div class="quantity">
                                                    <input title="Qty" id="quatity" value="1" name="quantity" min="1" class="form-control" type="number">
                                                </div>
                                            </div>
                                            <ul class="meta">
                                                <li class="tags-widget" id="variantsContainer"> 
                                                    <strong>Variants:</strong>
                                                    ${product.product_variants.map(variant => `
                                                        <span class="weight-option" data-variant="${variant.id}" data-price="${variant.sale_price}"><a href="/#">${variant.weight} </a></span>
                                                    `).join('')}
                                                </li>
                                                <li> <strong>CATEGORY:</strong><span> ${product.product_category.name}</span> </li>
                                            </ul>
                                            <div class="divider-full-1"></div>
                                            <div class="add-cart pt-15">
                                                <a href="/#" class="theme-btn btn add-to-cart-btn" data-product-id="${product.id}"> <strong> ADD TO CART </strong> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>  

                        </div>
                    </div>`);
                    // Set the default price to be the price of the first variant
                    const defaultPrice = product.product_variants[0].sale_price;
                    updatePrice(defaultPrice);

                    // Function to update the displayed price
                    function updatePrice(newPrice) {
                        $('.saleprice').text('Rs' + newPrice);
                    }
                    var variantId = product.product_variants[0].id;
                     // Add event listener to the weight options
                     $('.weight-option').on('click', function() {
                        const selectedWeight = $(this).data('price');
                        variantId = $(this).data('variant');
                        updatePrice(selectedWeight);
                    });

                    // Set up click event for "Add to Cart" buttons
                    $('#product-preview').on('click', '.add-to-cart-btn', function () {
                        var productId = $(this).data('product-id');
                        var quantity = document.getElementById('quatity').value;
                        var variant_id = variantId;
                       array=[{
                            'product_id': parseInt(productId),
                            'quantity': parseInt(quantity),
                            'variant_id': parseInt(variant_id),
                        }];
                        addToCart(array);
                    });
                }
                
                function addToCart(data) {
                    // Get the CSRF token from the meta tag
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    // Make an AJAX request to add the product to the cart
                    $.ajax({
                        url: '{{ route("cart.store") }}',
                        method: 'POST',
                        data: {
                            product_id: data[0].product_id,
                            quantity: data[0].quantity,
                            variant_id: data[0].variant_id
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        success: function (response) {
                            $('#product-preview').hide();
                            location.reload();
                        },
                        error: function (error) {
                            console.error('Error adding to cart:', error);
                        }
                    });
                }
            });
        </script>
    </body>
</html>