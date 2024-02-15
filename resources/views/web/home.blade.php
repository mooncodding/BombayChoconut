@extends('web.master')
@section('content')
    <!-- Main Slider Start -->
    <section class="main-slide">
        <div id="naturix-slider" class="owl-carousel nav-1">
            <div class="item">
                <img src="{{ asset('web-assets/images/banner/Home1.jpg') }}" alt="">
                <div class="tbl-wrp slide-1">
                    <div class="text-middle">
                        <div class="tbl-cell">
                            <div class="slide-caption container text-center">
                                <div class="slide-title">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('web-assets/images/banner/Home2.jpg') }}" alt="">
                <div class="tbl-wrp slide-1">
                    <div class="text-middle">
                        <div class="tbl-cell">
                            <div class="slide-caption container text-center">
                                <div class="slide-title">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('web-assets/images/banner/Home3.jpg') }}" alt="">
                <div class="tbl-wrp slide-1">
                    <div class="text-middle">
                        <div class="tbl-cell">
                            <div class="slide-caption container text-center">
                                <div class="slide-title">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Main Slider Ends -->
    <section class="category-all">
        <h2 class="section-title ptb-15" style="text-align: center;"> <span class="light-font">Explore </span>
            <strong>Categories </strong>
        </h2>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="tab-content organic-content row">
                    <div id="product-tab-1" class="tab-pane fade active in">
                        <div class="product-slider-1 dots-1">
                            @foreach ($parentCategories as $category)
                                <div class="item">
                                    <div class="product-box category-box">
                                        <div class="product-media category-media">
                                            <img class="prod-img"
                                                src="{{ asset('images/product-categories/' . $category->image) }}"
                                                alt="">
                                            <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                        </div>
                                        <div class="product-caption">
                                            <h3 class="product-title">
                                                <a href="#"> <span class="light-font"> {{ $category->name }}</a>
                                            </h3>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="item">
                                <div class="product-box category-box category-views1"
                                    style=" background-image: url({{ asset('web-assets/images/product/categorynut.webp') }}) ;">
                                    <div class="product-media category-media category-all">
                                    </div>
                                    <div class="product-caption">
                                        <h3 class="product-title">
                                            <a href="/category"> <span class="light-font"> </span> <strong>View All
                                                    Categories</strong></a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Organic All Starts-->
    <section class="organic-all sec-space-bottom">
        <div class="container">
            <div class="organic-wrap">
                <h2 class="section-title ptb-15"> <span class="light-font">Shop By </span> <strong>Categories </strong></h2>
                <div class="tabs-box">
                    <ul class="theme-tabs" id="categories">
                        <div class="container-fluid">
                            <div class="col-md-12">
                                <div class="tab-content organic-content row">
                                    <div class="product-slider-1 dots-1">
                                        @foreach ($parentCategories as $category)
                                            <li class="hish"><a href="#" data-toggle="tab" class="category-btn"
                                                    data-id="{{ $category->id }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>

                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-md-12 center-btn">
                <div class="tab-content organic-content row">
                    <div id="product-tab-1" class="tab-pane fade active in">
                        <div class="product-slider-1 dots-1">

                            <div class="productCards">

                            </div>

                        </div>

                    </div>

                </div>
                <a href="/shop" class="theme-btn btn "> <strong> View All Products</strong> </a>
            </div>

        </div>
    </section>
    <!-- Organic Farmfood Starts-->
    <section class="organic-farm sec-space-top light-bg "
        style=" background-image: url({{ asset('web-assets/images/product/5-removebg-preview.png') }}) ;">
        <div class="container rel-div">
            <div class="title-wrap">
                <h2 class="section-title"> <span class="light-font">we are </span> <strong>Bombay Choco & Nuts <img
                            src="assets/img/icons/logo-icon.png" alt="" /> </strong> </h2>
                <h4 class="sub-title"> <span> ABOUT OUR DRY FRUITES </span> </h4>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                    laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 text-center">
                    <div class="feature-wrap">
                        <img src="{{ asset('web-assets/images/new/1.png') }}" alt="">
                        <h3 class="title-1 ptb-15"> <span class="light-font">fresh from </span> <strong> Bombay Choco
                                Nuts</strong> </h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy. </p>
                        <a href="/#" class="sm-bnt-wht">Read More</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 text-center">
                    <div class="feature-wrap">
                        <img src="{{ asset('web-assets/images/new/2.png') }}" alt="">
                        <h3 class="title-1 ptb-15"> <span class="light-font"> 100%</span> <strong> organic goods</strong>
                        </h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy. </p>
                        <a href="/#" class="sm-bnt-wht">Read More</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 text-center">
                    <div class="feature-wrap">
                        <img src="{{ asset('web-assets/images/new/3.png') }}" alt="">
                        <h3 class="title-1 ptb-15"> <span class="light-font">premium </span> <strong> quality</strong>
                        </h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy. </p>
                        <a href="/#" class="sm-bnt-wht">Read More</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 text-center">
                    <div class="feature-wrap">
                        <img src="{{ asset('web-assets/images/new/4.png') }}" alt="">
                        <h3 class="title-1 ptb-15"> <span class="light-font">100% </span> <strong>natural</strong> </h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy. </p>
                        <a href="/#" class="sm-bnt-wht">Read More</a>
                    </div>
                </div>
            </div>

            <div class="rel-div feature-img">
                <img class="aligncenter wp-image-402 size-full"
                    src="{{ asset('web-assets/images/product/almonds.png') }}" alt ="">
            </div>
        </div>
    </section>
    <!-- / Organic Farmfood Ends -->

    <!-- Our Products Starts-->
    <section class="organic-product sec-space">
        <div class="row sec-space-top">
            <div class="col-lg-7 col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="organic-prod">
                            <img src="{{ asset('web-assets/images/giftbasket/4.png') }}" alt="" />
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">organic </span> <strong>
                                        Basket</strong> </a> </h3>
                            <a class="clr-txt font-2" href="/#"> <i> 52 items </i> </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="organic-prod">
                            <img src="{{ asset('web-assets/images/giftbasket/3.png') }}" alt="" />
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">fresh </span> <strong>
                                        Chocolates</strong> </a> </h3>
                            <a class="clr-txt font-2" href="/#"> <i> 35 items </i> </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="organic-prod">
                            <img src="{{ asset('web-assets/images/giftbasket/2.png') }}" alt="" />
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">International </span>
                                    <strong> brand</strong> </a> </h3>
                            <a class="clr-txt font-2" href="/#"> <i> 23 items </i> </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-sm-12">
                <div class="organic-prod-info">
                    <h4 class="sub-title"> FRESH FROM OUR FARM </h4>
                    <h2 class="section-title ptb-15"> <span class="light-font">220+ </span> <strong>chocolates, dry
                            fruites </strong> <span class="light-font"> & </span> <strong> lot more</strong> </h2>
                    <p class="fsz-16">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                        euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                        nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem
                        ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                        laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                        ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
        <div class="row sec-space-top">
            <div class="col-lg-5 col-sm-12">
                <div class="organic-prod-info">
                    <h4 class="sub-title"> FRESH FROM OUR FARM </h4>
                    <h2 class="section-title ptb-15"> <span class="light-font">115+ </span> <strong>organic juices
                        </strong> <span class="light-font"> and </span> <strong> organic tea</strong> </h2>
                    <p class="fsz-16">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                        euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis
                        nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem
                        ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                        laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                        ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div class="col-lg-7 col-sm-12">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="organic-prod">
                            <img src="{{ asset('web-assets/images/giftboxes/1.png') }}" alt="" />
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">organic </span> <strong>
                                        juices</strong> </a> </h3>
                            <a class="clr-txt font-2" href="/#"> <i> 26 items </i> </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="organic-prod">
                            <img src="{{ asset('web-assets/images/giftboxes/2.png') }}" alt="" />
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">dried </span> <strong>
                                        juices</strong> </a> </h3>
                            <a class="clr-txt font-2" href="/#"> <i> 31 items </i> </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="organic-prod">
                            <img src="{{ asset('web-assets/images/giftboxes/3.png') }}" alt="" />
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">organic </span> <strong>
                                        tea</strong> </a> </h3>
                            <a class="clr-txt font-2" href="/#"> <i> 17 items </i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- / Our Products Ends -->

    <!-- Deals Starts-->
    <section class="deals sec-space light-bg">
        <img alt="" src="assets/img/extra/sec-img-3.png" class="right-bg-img" />
        <img alt="" src="assets/img/extra/sec-img-4.png" class="left-bg-img" />

        <div class="container">
            <div class="row">
                <div class="col-sm-5 text-right">
                    <h4 class="sub-title"> Bombay DEAL OF THE DAY </h4>
                    <h2 class="section-title"> <span class="light-font">organic goods </span> <strong>50% </strong> <span
                            class="light-font">off</span> </h2>
                </div>
                <div class="col-sm-2 text-center no-padding">

                    <img class="prod-img" src="{{ asset('web-assets/images/product/chocsss.png') }}" alt="">
                </div>
                <div class="col-sm-5">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                        laoreet dolore magna aliquam erat volutpat. </p>
                </div>
            </div>
            <div class="deal-count">
                <div class="countdown-wrapper">
                    <div id="defaultCountdown" class="countdown"></div>
                </div>
            </div>
            <div class="deal-slider dots-2">
                <div class="item">
                    <div class="deal-item">
                        <div class="deal-icons">
                            <a href="/#" class="fa fa-heart"></a>
                            <a href="/#" class="fa fa-shopping-basket"></a>
                            <a href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                        </div>
                        <div class="deal-content">
                            <div class="text-right">
                                <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                            </div>
                            <div class="deal-text">
                                <h4 class="sub-title"> ORGANIC FRUITS </h4>
                                <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh </span>
                                        <strong>Chocolates</strong> </a> </h2>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                                <div class="price pt-15">
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                            <div class="deal-img"> 
                                <img src="{{ asset('web-assets/images/product/51-removebg-preview.png') }}" alt style="width: 350px;"/>
                             </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="deal-item">
                        <div class="deal-icons">
                            <a href="/#" class="fa fa-heart"></a>
                            <a href="/#" class="fa fa-shopping-basket"></a>
                            <a href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                        </div>
                        <div class="deal-content">
                            <div class="text-right">
                                <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                            </div>
                            <div class="deal-text">
                                <h4 class="sub-title"> ORGANIC FRUITS </h4>
                                <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh </span>
                                        <strong>Buckets</strong> </a> </h2>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                                <div class="price pt-15">
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                            <div class="deal-img">
                                <img src="{{ asset('web-assets/images/product/52-removebg-preview.png') }}" alt
                                style=" width: 350px;" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="deal-item">
                        <div class="deal-icons">
                            <a href="/#" class="fa fa-heart"></a>
                            <a href="/#" class="fa fa-shopping-basket"></a>
                            <a href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                        </div>
                        <div class="deal-content">
                            <div class="text-right">
                                <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                            </div>
                            <div class="deal-text">
                                <h4 class="sub-title"> ORGANIC FRUITS </h4>
                                <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh </span>
                                        <strong>Chocolates</strong> </a> </h2>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                                <div class="price pt-15">
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                            <div class="deal-img"> <img src="{{ asset('web-assets/images/giftbasket/4.png') }}"
                                    alt="" /> </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="deal-item">
                        <div class="deal-icons">
                            <a href="/#" class="fa fa-heart"></a>
                            <a href="/#" class="fa fa-shopping-basket"></a>
                            <a href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                        </div>
                        <div class="deal-content">
                            <div class="text-right">
                                <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                            </div>
                            <div class="deal-text">
                                <h4 class="sub-title"> ORGANIC FRUITS </h4>
                                <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh </span>
                                        <strong>Buckets</strong> </a> </h2>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                                <div class="price pt-15">
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                            <div class="deal-img"> <img src="{{ asset('web-assets/images/giftbasket/5.png') }}"
                                    alt="" /> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Deals Ends -->

    <!-- Subscribe Newsletter Starts-->
    <section class="subscribe-wrap sec-space light-bg">
        <img alt="" src="assets/img/extra/sec-img-5.png" class="right-bg-img" />
        <!-- <img src="{{ asset('web-assets/images/product/chocolate.png') }}"  class="leftphp-bg-img" alt=""> -->
        <h4 class="sub-title"> JOIN OUR NEWSLETTER </h4>
        <h2 class="fsz-35"> <span class="light-font">subscribe </span> <strong> newsletter</strong> </h2>
        <div class="container">
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <form class="newsletter-form row">
                        <div class="form-group col-sm-8">
                            <input class="form-control" placeholder="enter your email address" required=""
                                type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <button class="theme-btn btn-block" type="submit"> subscribe <i
                                    class="fa fa-long-arrow-right"></i> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscribe Newsletter Ends -->

    <!-- Testimonials Starts-->
    <section class="">
        <div class="container">
            <div class="testimonials">
                <div id="testimonial-slider" class="testimonial-slider nav-1">
                    <div class="item">
                        <div class="testi-wrap">
                            <div class="testi-img">
                                <a href="/#"> <img src="{{ asset('web-assets/images/review/1.jpg') }}"
                                        alt="" />
                            </div>
                            <div class="testi-caption">
                                <p> <i>“Lorem ipsum dolor sit amet, consectetuer adipiscing elitsed the diam nonummy nibh
                                        euismod tincidunt.”</i> </p>
                                <a href="/#"> <i class="fa fa-user clr-txt"></i> <strong> LUIS GARCHIA </strong> </a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testi-wrap">
                            <div class="testi-img">
                                <a href="/#"> <img src="{{ asset('web-assets/images/review/1.jpg') }}"
                                        alt="" />
                            </div>
                            <div class="testi-caption">
                                <p> <i>“Lorem ipsum dolor sit amet, consectetuer adipiscing elitsed the diam nonummy nibh
                                        euismod tincidunt.”</i> </p>
                                <a href="/#"> <i class="fa fa-user clr-txt"></i> <strong> LUIS GARCHIA </strong> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Ends -->

    <!-- latest news Starts-->
    <section class="sec-space">
        <div class="container">
            <div class="title-wrap">
                <h4 class="sub-title"> BOMBAY CHOCO & NUTS BLOG </h4>
                <h2 class="section-title"> <span class="light-font">Bombay </span> <strong>latest news </strong> </h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="latest-news">
                        <div class="news-img">
                            <img src="{{ asset('web-assets/images/blog/1.png') }}" alt="" />
                        </div>
                        <div class="news-caption">
                            <h4 class="sub-title-sm"> 26 JUNE 2016 </h4>
                            <h2 class="title-2"> <a href="/#"> <span class="light-font">5 best foods to make you
                                    </span> <strong>fresh & healthy</strong> </a> </h2>
                            <span class="divider-1"></span>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                            <a href="/#" class="fsz-12"> READ ARTICLE <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="latest-news">
                        <div class="news-img">
                            <img src="{{ asset('web-assets/images/blog/2.png') }}" alt="" />
                        </div>
                        <div class="news-caption">
                            <h4 class="sub-title-sm"> 26 JUNE 2016 </h4>
                            <h2 class="title-2"> <a href="/#"> <span class="light-font">5 best foods to make you
                                    </span> <strong>fresh & healthy</strong> </a> </h2>
                            <span class="divider-1"></span>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                            <a href="/#" class="fsz-12"> READ ARTICLE <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest news Ends -->
@endsection
