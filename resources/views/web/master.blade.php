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
        <style>
            .details {
              position: relative;
              width: 100%;
              height: 100%;
              float: left;
            }
            * {box-sizing: border-box;}


                        $speed: 250ms;
                    
                    body {
                      background: #F3F3F3;
                      padding: 0;
                      margin: 0;
                      overflow-x: hidden;
                      
                      font-family: Arial, sans-serif;
                      font-size: 16px;
                      line-height: 20px;
                    }
                    
                    body.open {
                      overflow-y: hidden;
                    }
                    
                    .shop {
                      position: relative;
                      z-index: 5;
                    }
                    
                    .shop__header {
                      box-sizing: border-box;
                      position: fixed;
                      background: rgba(255, 255, 255, 0.9);
                      width: 100%;
                      padding: 15px;
                      overflow: hidden;
                      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                    }
                    
                    .shop__products {
                      padding-top: 70px;
                    }
                    
                    .shop__title {
                      display: block;
                      margin: 0;
                      float: left;
                      
                      font-size: 30px;
                      line-height: 40px;
                    }
                    
                    .shop__text {
                      display: block;
                      padding: 0;
                      margin: 0;
                      float: right;
                      
                      .button {
                        padding: 10px 15px;
                      }
                    }
                    
                    .products {
                      display: flex;
                      flex-wrap: wrap;
                      justify-content: center;
                      padding: 20px 0 20px 20px;
                    }
                    
                    .products__item {
                      width: 290px;
                    }
                    
                    .product {
                      background: #FFF;
                      padding: 30px 15px;
                      margin: 0 20px 20px 0;
                      border-radius: 5px;
                      text-align: center;
                    }
                    
                    .product__title {
                      font-weight: bold;
                      font-size: 20px;
                      margin: 0 0 15px 0;
                    }
                    
                    .product__text {
                      margin: 0;
                    }
                    
                    .button {
                      display: inline-block;
                      background: #39C;
                      padding: 5px 10px;
                      border-radius: 3px;
                      
                      font-weight: bold;
                      font-size: 14px;
                      text-decoration: none;
                      color: #FFF;
                    }
                    
                    .button--light {
                      background: #FFF;
                      color: #F00;
                    }
                    
                    .cart {
                      position: fixed;
                      background: #F3F3F3;
                      width: 400px;
                      max-width: 90%;
                      height: 100%;
                      top: 0;
                      right: 0;
                      box-shadow: -2px 0 4px rgba(0, 0, 0, 0.2);
                      overflow: hidden;
                      transform: translate(500px, 0);
                      transition: transform $speed ease-in-out;
                      z-index: 20;
                    }
                    
                    body.open .cart {
                      transform: translate(0, 0);
                    }
                    
                    .cart__header {
                      box-sizing: border-box;
                      position: absolute;
                      background: rgba(255, 255, 255, 0.9);
                      width: 100%;
                      padding: 15px 15px;
                      top: 0;
                      left: 0;
                      overflow: hidden;
                      z-index: 2;
                      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                      
                      .cart__text {
                        float: right;
                      }
                    }
                    
                    .cart__title {
                      font-size: 20px;
                      line-height: 40px;
                      margin: 0;
                      float: left;
                    }
                    
                    .cart__products {
                      box-sizing: border-box;
                      position: absolute;
                      width: 100%;
                      height: 100%;
                      padding: 70px 0;
                      overflow-x: hidden;
                      overflow-y: scroll;
                      -webkit-overflow-scrolling: touch;
                      z-index: 1;
                      
                      article {
                        padding: 15px;
                        border-bottom: 1px dotted #CCC;
                        
                        h1 {
                          font-size: 16px;
                          line-height: 20px;
                          margin: 0;
                        }
                        
                        p {
                          font-size: 14px;
                          margin: 0;
                          
                          a {
                            color: #F00
                          }
                        }
                      }
                    }
                    
                    .cart__product {
                      display: none;
                    }
                    
                    .cart__empty {
                      padding: 30px 15px;
                      margin: 0;
                      font-style: italic;
                      text-align: center;
                      
                      &.hide {
                        display: none;
                      }
                    }
                    
                    .cart__footer {
                      box-sizing: border-box;
                      position: absolute;
                      background: rgba(255, 255, 255, 0.9);
                      width: 100%;
                      padding: 15px;
                      left: 0;
                      bottom: 0;
                      z-index: 2;
                      box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.2);
                      text-align: right;
                    }
                    
                    .cart__text {
                      margin: 0;
                      
                      .button {
                        padding: 10px 15px;
                      }
                    }
                    
                    .lightbox {
                      position: fixed;
                      background: #000;
                      width: 0;
                      height: 100%;
                      top: 0;
                      left: 0;
                      z-index: 10;
                      opacity: 0;
                      transition: opacity $speed ease-in-out, width 0ms ease-in-out $speed;
                    }
                    
                    body.open .lightbox {
                      width: 100%;
                      opacity: 0.8;
                      transition: opacity $speed ease-in-out, width 0ms ease-in-out;
                    }
                    .modal-backdrop.fade.in {
                        display: none;
                    }
                    </style>
                    <script>
                        function imageZoom(imgID, resultID) {
              var img, lens, result, cx, cy;
              img = document.getElementById(imgID);
              result = document.getElementById(resultID);
              /* Create lens: */
              lens = document.createElement("DIV");
              lens.setAttribute("class", "img-zoom-lens");
              /* Insert lens: */
              img.parentElement.insertBefore(lens, img);
              /* Calculate the ratio between result DIV and lens: */
              cx = result.offsetWidth / lens.offsetWidth;
              cy = result.offsetHeight / lens.offsetHeight;
              /* Set background properties for the result DIV */
              result.style.backgroundImage = "url('" + img.src + "')";
              result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
              /* Execute a function when someone moves the cursor over the image, or the lens: */
              lens.addEventListener("mousemove", moveLens);
              img.addEventListener("mousemove", moveLens);
              /* And also for touch screens: */
              lens.addEventListener("touchmove", moveLens);
              img.addEventListener("touchmove", moveLens);
              function moveLens(e) {
                var pos, x, y;
                /* Prevent any other actions that may occur when moving over the image */
                e.preventDefault();
                /* Get the cursor's x and y positions: */
                pos = getCursorPos(e);
                /* Calculate the position of the lens: */
                x = pos.x - (lens.offsetWidth / 2);
                y = pos.y - (lens.offsetHeight / 2);
                /* Prevent the lens from being positioned outside the image: */
                if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
                if (x < 0) {x = 0;}
                if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
                if (y < 0) {y = 0;}
                /* Set the position of the lens: */
                lens.style.left = x + "px";
                lens.style.top = y + "px";
                /* Display what the lens "sees": */
                result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
              }
              function getCursorPos(e) {
                var a, x = 0, y = 0;
                e = e || window.event;
                /* Get the x and y positions of the image: */
                a = img.getBoundingClientRect();
                /* Calculate the cursor's x and y coordinates, relative to the image: */
                x = e.pageX - a.left;
                y = e.pageY - a.top;
                /* Consider any page scrolling: */
                x = x - window.pageXOffset;
                y = y - window.pageYOffset;
                return {x : x, y : y};
              }
            }</script>
                          
    </head>

    <body id="home" class="wide">
        <!-- WRAPPER -->
        <main class="wrapper home-wrap"> 
            <!-- CONTENT AREA -->
            <div class="top-header">
                <div class="row">
                    <div class="col-lg-5">
                        <a href="/specialoffers">  <p>SUPER DEALS <span style="padding-left:10px;">   FEATURE PRODUCTS <span style="padding-left:10px;">  TRENDING PRODUCTS <span style="padding-left:10px;">  GIFT BASKETS</p></a>
                    </div>
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-2 locator">
                        <a href="/contact"> <p>  <i class="fa fa-user-plus" aria-hidden="true"></i>
                            STORE LOCATOR</p> </a>
                        <span>
                    </div>
                    <div class="col-lg-2 track">
                        <a href="/tracking">  <p style="
                    border-right: 1px solid white;
                    border-left: 1px solid white;
                        "><i class="fa fa-heart" aria-hidden="true">&nbsp;
                            </i>TRACK YOUR ORDER</p> </a>
                            </div>
                            <div class="col-lg-1">
                                <a href="/wishlist">  <p style="
                            text-align: start;
                        "><i class="fa fa-user-plus" aria-hidden="true"></i>


                                ACCOUNT</p></a>
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
                        @php
                            $parentCategories = App\Models\ProductCategory::parentCategories()->get();
                            $products = App\Models\Product::all();
                        @endphp
                        <form action="{{route('searchByProduct')}}" method="GET">  
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                                <select name="category_id" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <ul class="dropdown-menu scrollable-dropdown" role="menu" id="categories">
                                     <option value="all"class="caret">All Categories</option>   
                                        @foreach ($parentCategories as $category)
                                            <option value="{{$category->id}}"  >{{$category->name}}</option>
                                        @endforeach
                                    </ul>
                                </select>
                            </div>
                                {{-- <select name="id" class="form-control">
                                    <option value="" id="search" >Search Product.....</option>
                                    @foreach ($products as $product)
                                        <option value="{{$product->id}}">{{$product->title}}</option>
                                    @endforeach
                                </select> --}}
                                <input type="text" class="form-control" name="name" placeholder="Search  For Products...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                        </form>
                    </div>
                     <div style=" padding-left: 20px;  padding-top: 10px;   font-size: 20px;" class="col-lg-1 ">
                     <i class="fa fa-list" aria-hidden="true"></i><span style=" padding-left: 33px; "><a href="/wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                    </div> 
                    <div class="col-lg-2 col-sm-4 cart-megamenu">
                        <div class="cart-hover modal-open" id="openCartButton">
                            <a id="openCartButton" href=""> <img  src="assets/img/icons/cart-icon.png" /> </a>
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
                    <a href="/blog" >Blog</a>
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
   <div class="col-lg-2 cart-megamenu">
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
<section class="mob-top-header">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3">
            <p>SUPER DEALS</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <p>FEATURE PRODUCTS</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <p>TRENDING PRODUCTS</p>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <p>GIFT BASKETS</p>
        </div>
    </div>
</section>
<section class="mob-top-search">
    <div class="search-wrap">
        <input class="form-control" placeholder="" >
        <button class="btn" type="submit"> <i class="fa fa-search"></i> </button>
    </div>
</section>
<section class="mob-menu-header">
    <div class="row">
        <div class="col-lg-10 col-md-6 col-sm-12 responsive-menu">  
            <div class="responsive-toggle fa fa-bars"> </div>
            <div class="row mind">
            <div class="col-lg-4 locator">
                <a href="/giftbundle">   <i class="fa fa-user-plus" aria-hidden="true"></i>
                    <p>SIGN IN</p> </a>
                <span>
            </div>
            <div class="col-lg-4 track">
                <i class="fa fa-heart" aria-hidden="true">&nbsp;
                </i>
            <p>TRACK ORDER</p> 
            </div>
            <div class="col-lg-4 account">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
            <p style="
            text-align: start;
        ">


                ACCOUNT</p>
            </div>
        </div>
            <section id="marzen" class="tab-panel">
  
        
              
              <div class="tabset">
                <!-- Tab 1 -->
                
                <input  type="radio" name="tabset" id="tab1" aria-controls="marzen" checked>
                <label for="tab1" class="menu-tabs1">Menu</label>
                <!-- Tab 2 -->
                <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
                <label for="tab2" class="menu-tabs2">Categories</label>
                
                <!-- Tab 3 -->
             
                
                <div class="tab-panels">
                  <section id="marzen" class="tab-panel">
                   
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
                </section>
                  <section id="rauchbier" class="tab-panel">
                    <ul>
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
                  </section>
                
                </div>
                
              </div>
              
                  
            
        
        </div>
       <div class="col-lg-2 cart-megamenu">
    {{-- <div class="mega-submenu">
    
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
    </div> --}}
    <div class="responsive-toggle fa fa-bars"> </div>
    </div>
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="main-logo">
                <img src="{{asset('web-assets/images/logo/bombaylogo.png')}}" alt="">
               
            </div>
        </div>
        <div class="col-lg-2 col-sm-4 cart-megamenu ">
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
</div>
</section>
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
                                    <li> <a href="/about-us"> about our shop </a> </li>
                                    <li> <a href="/specialoffers"> top sellers </a> </li>
                                    <li> <a href="/#"> our blog </a> </li>
                                    <li> <a href="/shop"> new products </a> </li>
                                    <li> <a href="/wishlist"> secure shopping </a> </li>
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
                                <a href="/contact"> <h2 class="title-1">  <span class="light-font"> Contact Us </span> <strong> </strong> </h2></a>
                            
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
                                    <li> <a href="/contact">contact us </a> </li>
                                    <li> <a href="/shop">order online  </a> </li>
                                    <li> <a href="/specialoffers">special offer </a> </li>
                              
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

                                       
                                            <div class="product-media "> 
                                               
                                                <img class="prod-img drift-demo-trigger " data-zoom="{{asset('images/product-images/${product.photo}')}}" src="{{asset('images/product-images/${product.photo}')}}" alt=""/>     

                                             
                                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                                <div class="prod-icons"> 
                                                    <a href="#" class="fa fa-heart"></a>
                                                    <a  href="javascript:void(0);" data-target="#product-preview" data-toggle="modal" class="fa fa-shopping-basket view-details-btn" data-product-id="${product.id}"></a>
                                                </div>
                                            </div>
                                   
                                       
                                       
                                            <div class="product-caption details"> 
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
                                <div class="row">
                                <div class="col-lg-6 col-sm-6 col-sm-offset-2 col-lg-offset-0 pt-50">
                                    <div class="prod-slider sync1">
                                    
                              <div id='slideshow-items-container'>
                                        <div class="item slideshow-items img-zoom-container"> 
                                        <img id="myimage"  src="{{asset('images/product-images/${product.photo}')}}" data-image="${product.photo}" width="300" alt=""/>
                                        <div id="myresult" class="img-zoom-result"></div>
                                            <a href="/assets/img/products/prod-big-1.png" data-gal="prettyPhoto[prettyPhoto]" title="Product" class="caption-link"><i class="arrow_expand"></i></a>
                                        </div>
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
                                                <a href="/#" class="theme-btn js-add-product  add-to-cart-btn" data-product-id="${product.id}"> <strong> ADD TO CART </strong> </a>
                                            </div>
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
                    $('.modal-open').on('click', '.add-to-cart-btn', function () {
                        // console.log(123)
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
                            // location.reload();
                        },
                        error: function (error) {
                            console.error('Error adding to cart:', error);
                        }
                    });
                }
            });
  

        </script>
        <script>
            imageZoom("myimage", "myresult");
            </script>
<script>
            var cartOpen = false;
        var numberOfProducts = 0;
        
        $('body').on('click', '.js-toggle-cart', toggleCart);
        $('body').on('click', '.js-add-product', addProduct);
        $('body').on('click', '.js-remove-product', removeProduct);
        
        function toggleCart(e) {
          e.preventDefault();
          if(cartOpen) {
            closeCart();
            return;
          }
          openCart();
        }
        
        function openCart() {
          cartOpen = true;
          $('body').addClass('open');
        }
        
        function closeCart() {
          cartOpen = true;
          $('body').removeClass('open');
        }
        
        function addProduct(e) {
          e.preventDefault();
          console.log(e)
          openCart();
          $('.js-cart-empty').addClass('hide');
          var product = $('.js-cart-product-template').html();
          $('.js-cart-products').prepend(product);
          numberOfProducts++;
        }
        
        function removeProduct(e) {
          e.preventDefault();
          
          numberOfProducts--;
          $(this).closest('.js-cart-product').hide(250);
          if(numberOfProducts == 0) {
            $('.js-cart-empty').removeClass('hide');
          }
        }
 
        </script>

 
          <aside class="cart js-cart">
            <div class="cart__header">
              <h1 class="cart__title">Shopping cart</h1>
              <p class="cart__text">
                <a class="button button--light js-toggle-cart" href="#" title="Close cart">
                  Close cart
                </a>
              </p>
            </div>
            <div class="cart__products js-cart-products">
              <p class="cart__empty js-cart-empty">
                Add a product to your cart
              </p>
              <div class="cart__product js-cart-product-template">
                <article class="js-cart-product">
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
                            <div class="quantity-product">
                                <p>Quantity </p>
                                <p>x1</p>
                                
                            </div>

                            <div class="close-icon">
                                <form action="{{route('cart.remove')}}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                    <button type="submit"><i class="fa fa-trash clr-txt"></i></button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                   
                </article>
              </div>
            </div>
            {{-- <div class="col-lg-2 col-sm-4 cart-megamenu">

        </div>  --}}
            <div class="cart__footer">
                <div class="width-price">
                <p class="text-left">Total Price: <span class="price"> Rs {{Cart::getTotal()}}</span></p>
            </div>
            <div class="foter-check">
              <p class="cart__text">
                
                <a class="button" href="/checkout">
                  Check out
                </a>
              </p>
            </div>
        </div>
          </aside>
          
          <div class="lightbox js-lightbox js-toggle-cart"></div>
   


</body>
</html>