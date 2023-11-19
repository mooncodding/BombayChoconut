@extends('web.master')
@section('content')
<!-- Main Slider Start -->
<!-- <section class="main-slide">
    <div id="naturix-slider" class="owl-carousel nav-1">
        <div class="item">                        
            <img src="{{asset('web-assets/images/banner/banner3.jpeg')}}" alt="">
            <div class="tbl-wrp slide-1">
                <div class="text-middle">
                    <div class="tbl-cell">
                        <div class="slide-caption container text-center">
                            <div class="slide-title">
                                {{-- <img src="assets/img/icons/slide-txt-1.png" alt=""> --}}
                                {{-- <span>100% Guarantee</span> --}}
                            </div>
                            <div class="slide-title2 pb-50">
                                <h2 class="section-title"> <span class="light-font">Live </span> <strong>organic </strong> <span class="light-font">for live </span> <strong>healthy </strong> </h2>
                                <h4 class="sub-title"> ORGANIC FRUITS, VEGETABLES, AND LOT MORE TO YOUR DOOR </h4>
                            </div>
                            <div class="slide">
                                <a href="/#" class="slide-btn"> Shop Now</a>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">                       
            <img src="{{asset('web-assets/images/banner/banner2.jpg')}}" alt="">
            <div class="tbl-wrp slide-1">
                <div class="text-middle">
                    <div class="tbl-cell">
                        <div class="slide-caption container text-center">
                            <div class="slide-title">
                                {{-- <img src="assets/img/icons/slide-txt-1.png" alt=""> --}}
                                {{-- <span>100% Guarantee</span> --}}
                            </div>
                            <div class="slide-title2 pb-50">
                                <h2 class="section-title"> <span class="light-font">Live </span> <strong>organic </strong> <span class="light-font">for live </span> <strong>healthy </strong> </h2>
                                <h4 class="sub-title"> ORGANIC FRUITS, VEGETABLES, AND LOT MORE TO YOUR DOOR </h4>
                            </div>
                            <div class="slide">
                                <a href="/#" class="slide-btn"> Shop Now</a>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">                       
            <img src="{{asset('web-assets/images/banner/banner3.jpg')}}" alt="">
            <div class="tbl-wrp slide-1">
                <div class="text-middle">
                    <div class="tbl-cell">
                        <div class="slide-caption container text-center">
                            <div class="slide-title">
                                {{-- <img src="assets/img/icons/slide-txt-1.png" alt=""> --}}
                                {{-- <span>100% Guarantee</span> --}}
                            </div>
                            <div class="slide-title2 pb-50">
                                <h2 class="section-title"> <span class="light-font">Live </span> <strong>organic </strong> <span class="light-font">for live </span> <strong>healthy </strong> </h2>
                                <h4 class="sub-title"> ORGANIC FRUITS, VEGETABLES, AND LOT MORE TO YOUR DOOR </h4>
                            </div>
                            <div class="slide">
                                <a href="/#" class="slide-btn"> Shop Now</a>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>               
</section> -->
<!-- / Main Slider Ends -->   
<section class="home-banner" style=" background-image: url({{asset('web-assets/images/banner/BACKGROUND.jpg')}}) ;">
    <div class="container flex-iin">
    <div class="home-banner-content">
<h1>The Perfect <br>Dry Fruits Store</h1>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci dolorum natus eaque pariatur maiores quas illum ex temporibus est perspiciatis. Quos nobis doloremque harum voluptate dignissimos quaerat excepturi accusamus ducimus!</p>

<a href="/#" class="slide-btn"> Shop Now</a>  
</div>
    <div class="home-banner-image">
    <img  src="{{asset('web-assets/images/product/3-removebg-preview.png')}}" />
    </div>
</div>
</section>
<!-- Organic All Starts-->
<section class="organic-all sec-space-bottom">
    <!-- <div class="pattern"> 
        <img alt="" src="assets/img/icons/white-pattern.png" />
    </div> -->
    <div class="section-icon"> 
        <!-- <img src="{{asset('web-assets/images/product/coco.png')}}" alt style="
        width: 110px;"> -->
    </div>
    <div class="container">                    
        <div class="organic-wrap"> 
            <img class="logo-img" alt style="
        width: 120px;" src="{{asset('web-assets/images/bombaylogo.png')}}" />
            
            <div class="tabs-box">
                <ul class="theme-tabs">
                    <li class=""><a href="/#product-tab-1" data-toggle="tab"> <span class="light-font">Dry</span> <strong>fruits </strong> </a></li>                                
                    <li class="active"><a href="/#product-tab-2" data-toggle="tab"> <span class="light-font">Famous </span> <strong>Chocolates </strong> </a></li>                               
                    <li class=""><a href="/#product-tab-3" data-toggle="tab"> <span class="light-font">Fresh </span> <strong>Biscuit </strong> </a></li>
                    <li class=""><a href="/#product-tab-4" data-toggle="tab"> <span class="light-font">gift </span> <strong>Boxes</strong> </a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid"> 
        <div class="col-md-12"> 
            <div class="tab-content organic-content row"> 
                <div id="product-tab-1" class="tab-pane fade active in"> 
                    <div class="product-slider-1 dots-1"> 

                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                      <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">   
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>                                           
                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> gift </span>  <strong>Chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/Nuts/1.png')}}" alt="">     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Almond</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box active"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/3.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong> <del class="light-font">Rs 65.00 </del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/Nuts/3.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong> <del class="light-font">Rs 65.00 </del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                      <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>                                           
                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>tomato</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Almond</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong> <del class="light-font">Rs 65.00 </del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong> <del class="light-font">Rs 65.00 </del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="product-tab-2" class="tab-pane fade"> 
                    <div class="product-slider-1 dots-1"> 

                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                      <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>                                           
                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>tomato</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Almond</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box active"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong> <del class="light-font">Rs 65.00 </del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong> <del class="light-font">Rs 65.00 </del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                      <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>                                           
                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>tomato</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Almond</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong> <del class="light-font">Rs 65.00 </del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">Rs 50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="product-tab-3" class="tab-pane fade"> 
                    <div class="product-slider-1 dots-1"> 

                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                      <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>                                           
                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>tomato</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Almond</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box active"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                      <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>                                           
                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>tomato</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Almond</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="product-tab-4" class="tab-pane fade"> 
                    <div class="product-slider-1 dots-1"> 

                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                      <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>                                           
                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>tomato</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Almond</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box active"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/7.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                      <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>                                           
                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>tomato</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Almond</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <span class="prod-tag tag-1">new</span> <span class="prod-tag tag-2">sale</span>
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <div class="product-box"> 
                                <div class="product-media"> 
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                    <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                    <div class="prod-icons"> 
                                        <a href="/#" class="fa fa-heart"></a>
                                        <a href="/#" class="fa fa-shopping-basket"></a>
                                        <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                    </div>
                                </div>

                                <div class="product-caption"> 
                                    <h3 class="product-title">
                                        <a href="/#"> <span class="light-font"> organic </span>  <strong>chocolates</strong></a>
                                    </h3>
                                    <div class="price"> 
                                        <strong class="clr-txt">$50.00 </strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Organic All Ends -->

<!-- Organic Farmfood Starts-->
<section class="organic-farm sec-space-top light-bg " style=" background-image: url({{asset('web-assets/images/product/5-removebg-preview.png')}}) ;">
  
    <!-- <img alt="" src="assets/img/extra/sec-img-1.png" class="left-bg-img" />  
    <img alt="" src="assets/img/extra/sec-img-2.png" class="center-bg-img" />   -->

    <div class="container rel-div">
        <div class="title-wrap">
            <h2 class="section-title"> <span class="light-font">we are </span> <strong>Bombay Choco & Nuts <img src="assets/img/icons/logo-icon.png" alt="" /> </strong> </h2>
            <h4 class="sub-title"> <span> ABOUT OUR DRY FRUITES </span> </h4>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 text-center">
                <div class="feature-wrap">
                    <img src="{{asset('web-assets/images/new/1.png')}}" alt=""> 
                    <h3 class="title-1 ptb-15"> <span class="light-font">fresh from </span> <strong> Bombay Choco Nuts</strong> </h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.  </p>
                    <a href="/#" class="sm-bnt-wht">Read More</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <div class="feature-wrap">
                    <img src="{{asset('web-assets/images/new/2.png')}}" alt=""> 
                    <h3 class="title-1 ptb-15"> <span class="light-font"> 100%</span> <strong> organic goods</strong> </h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.  </p>
                    <a href="/#" class="sm-bnt-wht">Read More</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <div class="feature-wrap">
                    <img src="{{asset('web-assets/images/new/3.png')}}" alt=""> 
                    <h3 class="title-1 ptb-15"> <span class="light-font">premium </span> <strong> quality</strong> </h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.  </p>
                    <a href="/#" class="sm-bnt-wht">Read More</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <div class="feature-wrap">
                    <img src="{{asset('web-assets/images/new/4.png')}}" alt=""> 
                    <h3 class="title-1 ptb-15"> <span class="light-font">100% </span> <strong>natural</strong> </h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.  </p>
                    <a href="/#" class="sm-bnt-wht">Read More</a>
                </div>
            </div>
        </div>

        <div class="rel-div feature-img">
            <img class="aligncenter wp-image-402 size-full" src="{{asset('web-assets/images/product/almonds.png')}}"  alt =""> 
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
                            <img src="{{asset('web-assets/images/giftbasket/4.png')}}" alt=""/>
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">organic </span> <strong> Basket</strong> </a> </h3>                                        
                            <a class="clr-txt font-2" href="/#"> <i> 52 items </i> </a>
                        </div>
                    </div>
                    <div class="col-sm-4"> 
                        <div class="organic-prod">
                            <img src="{{asset('web-assets/images/giftbasket/3.png')}}" alt=""/>
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">fresh </span> <strong> Chocolates</strong> </a> </h3>
                            <a class="clr-txt font-2" href="/#"> <i> 35 items </i> </a>
                        </div>
                    </div>
                    <div class="col-sm-4"> 
                        <div class="organic-prod">
                            <img src="{{asset('web-assets/images/giftbasket/2.png')}}" alt=""/>
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">International </span> <strong> brand</strong> </a> </h3>
                            <a class="clr-txt font-2" href="/#"> <i> 23 items </i> </a>                                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-sm-12"> 
                <div class="organic-prod-info">
                    <h4 class="sub-title">  FRESH FROM OUR FARM </h4>
                    <h2 class="section-title ptb-15"> <span class="light-font">220+ </span> <strong>chocolates, dry fruites </strong> <span class="light-font"> & </span> <strong> lot more</strong> </h2>
                    <p class="fsz-16">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
        </div>
        <div class="row sec-space-top"> 
            <div class="col-lg-5 col-sm-12"> 
                <div class="organic-prod-info">
                    <h4 class="sub-title">  FRESH FROM OUR FARM </h4>
                    <h2 class="section-title ptb-15"> <span class="light-font">115+ </span> <strong>organic juices </strong> <span class="light-font"> and </span> <strong> organic tea</strong> </h2>
                    <p class="fsz-16">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div class="col-lg-7 col-sm-12"> 
                <div class="row"> 
                    <div class="col-sm-4"> 
                        <div class="organic-prod">
                            <img src="{{asset('web-assets/images/giftboxes/1.png')}}" alt=""/>
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">organic </span> <strong> juices</strong> </a> </h3>
                            <a class="clr-txt font-2" href="/#"> <i> 26 items </i> </a>
                        </div>
                    </div>
                    <div class="col-sm-4"> 
                        <div class="organic-prod">
                            <img src="{{asset('web-assets/images/giftboxes/2.png')}}" alt=""/>
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">dried </span> <strong> juices</strong> </a> </h3>
                            <a class="clr-txt font-2" href="/#"> <i> 31 items </i> </a>
                        </div>
                    </div>
                    <div class="col-sm-4"> 
                        <div class="organic-prod">
                            <img src="{{asset('web-assets/images/giftboxes/3.png')}}" alt=""/>
                            <span class="divider"></span>
                            <h3 class="title-1"> <a href="/#"> <span class="light-font">organic </span> <strong> tea</strong> </a> </h3>
                            <a class="clr-txt font-2" href="/#"> <i> 17 items </i> </a>
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
    
</section>
<!-- / Our Products Ends -->            

<!-- Naturix Goods Starts-->
<section class="naturix-goods sec-space-bottom">
    <div class="container"> 
        <div class="title-wrap">
            <h4 class="sub-title"> FRESH FROM OUR FARM </h4>
            <h2 class="section-title"> <span class="round-shape">  <span class="light-font">Bombay Choco & Nuts </span> <strong> organic goods <img src="assets/img/icons/logo-icon.png" alt="" /></strong> </span> </h2>
        </div>

        <div class="tabs-box text-center">
            <ul class="theme-tabs small">
                <li class=""><a href="/#naturix-tab-1" data-toggle="tab"> <span class="light-font">all </span> <strong>gift </strong> </a></li>                                
                <li class="active"><a href="/#naturix-tab-2" data-toggle="tab"> <span class="light-font">organic </span> <strong>chocolates</strong> </a></li>                               
                <li class=""><a href="/#naturix-tab-3" data-toggle="tab"> <span class="light-font">organic </span> <strong>dates </strong> </a></li>
                <li class=""><a href="/#naturix-tab-4" data-toggle="tab"> <span class="light-font">organic </span> <strong>tea </strong> </a></li>
                <li class=""><a href="/#naturix-tab-5" data-toggle="tab"> <span class="light-font">all </span> <strong>bread </strong> </a></li>
                <li class=""><a href="/#naturix-tab-6" data-toggle="tab"> <span class="light-font">organic </span> <strong>juices </strong> </a></li>
            </ul>
        </div>

        <div class="tab-content organic-content row"> 
            <div id="naturix-tab-1" class="tab-pane fade active in"> 
                <div class="naturix-slider-1 dots-1"> 
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/4.png')}}" alt=""/>    
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>mushroom</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>pinapple</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> green </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                 <img class="prod-img" src="{{asset('web-assets/images/giftboxes/1.png')}}" alt=""/>    
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts </strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                  <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Chocolates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> green </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts </strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                  <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div id="naturix-tab-2" class="tab-pane fade"> 
                <div class="naturix-slider-1 dots-1"> 
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Chocolates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> green </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts </strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                  <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Chocolates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> green </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts </strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                  <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div id="naturix-tab-3" class="tab-pane fade"> 
                <div class="naturix-slider-1 dots-1"> 
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Chocolates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> green </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts </strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                  <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Chocolates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> green </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts </strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                  <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div id="naturix-tab-4" class="tab-pane fade"> 
                <div class="naturix-slider-1 dots-1"> 
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Chocolates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> green </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts </strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                  <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Chocolates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> green </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts </strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                  <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div id="naturix-tab-5" class="tab-pane fade"> 
                <div class="naturix-slider-1 dots-1"> 
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Chocolates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> green </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts </strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                  <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Chocolates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> green </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts </strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                  <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
            <div id="naturix-tab-6" class="tab-pane fade"> 
                <div class="naturix-slider-1 dots-1"> 
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Chocolates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> green </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts </strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                  <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/8.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Chocolates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="">     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt=""src="{{asset('web-assets/images/giftbasket/1.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> green </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/20.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img" alt="" src="{{asset('web-assets/images/giftbasket/5.png')}}" alt="" />     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>gift</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="product-box"> 
                            <div class="product-media"> 
                                <img class="prod-img"  src="{{asset('web-assets/images/Nuts/21.png')}}" alt=""/>     
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>

                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>Nuts </strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>

                        <div class="product-box"> 
                            <div class="product-media"> 
                                  <img class="prod-img" src="{{asset('web-assets/images/Nuts/9.png')}}" alt="">   
                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                <div class="prod-icons"> 
                                    <a href="/#" class="fa fa-heart"></a>
                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                </div>
                            </div>                                           
                            <div class="product-caption"> 
                                <h3 class="product-title">
                                    <a href="/#"> <span class="light-font"> organic </span>  <strong>dates</strong></a>
                                </h3>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

    </div>
</section>
<!-- / Naturix Goods Ends -->

<!-- Deals Starts-->
<section class="deals sec-space light-bg">
    <img alt="" src="assets/img/extra/sec-img-3.png" class="right-bg-img" />  
    <img alt="" src="assets/img/extra/sec-img-4.png" class="left-bg-img" />  

    <div class="container"> 
        <div class="row"> 
            <div class="col-sm-5 text-right"> 
                <h4 class="sub-title"> NATURIX DEAL OF THE DAY </h4>
                <h2 class="section-title"> <span class="light-font">organic goods </span> <strong>50% </strong> <span class="light-font">off</span> </h2>
            </div>
            <div class="col-sm-2 text-center no-padding"> 
            
                <img class="prod-img" src="{{asset('web-assets/images/product/chocsss.png')}}" alt="">   
            </div>
            <div class="col-sm-5"> 
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
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
                            <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh </span> <strong>Chocolates</strong> </a> </h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                            <div class="price pt-15"> 
                                <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                            </div>
                        </div>
                        <div class="deal-img">   <img src="{{asset('web-assets/images/product/51-removebg-preview.png')}}" alt style="
    width: 350px;
"/> </div>
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
                            <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh </span> <strong>Buckets</strong> </a> </h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                            <div class="price pt-15"> 
                                <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                            </div>
                        </div>
                        <div class="deal-img"> <img src="{{asset('web-assets/images/product/52-removebg-preview.png')}}" alt style="
    width: 350px;"/> </div>
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
                            <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh </span> <strong>Chocolates</strong> </a> </h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                            <div class="price pt-15"> 
                                <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                            </div>
                        </div>
                        <div class="deal-img"> <img src="{{asset('web-assets/images/giftbasket/4.png')}}" alt=""/> </div>
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
                            <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh </span> <strong>Buckets</strong> </a> </h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                            <div class="price pt-15"> 
                                <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                            </div>
                        </div>
                        <div class="deal-img"> <img src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Deals Ends -->

<!-- Random Products Starts-->
<section class=" sec-space-bottom">
    <div class="pattern"> 
        <img alt="" src="assets/img/icons/white-pattern.png">
    </div>
    <div class="section-icon"> 
        <img src="{{asset('web-assets/images/product/53-removebg-preview.png')}}" alt style="
        width: 300px;"/> 
        <div class="pt-15 icon"> 
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>  
            <span class="light-font"> a taste of </span> <strong>real food</strong>
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>  
        </div>
    </div>
    <div class="container"> 
        <!-- Random Products -->
        <div class="row">
            <div class="col-md-4 pt-50">
                <h4 class="sub-title-sm"> NEW FROM THE FARM </h4>
                <h2 class="fsz-30 pb-15"> <span class="light-font">organic </span> <strong>new arrivals </strong> </h2>
                <div id="new-arrivals" class="nav-1"> 
                    <div class="item"> 
                        <div class="random-prod"> 
                            <div class="random-img"> 
                              <img src="{{asset('web-assets/images/giftbasket/2.png')}}" alt=""/>
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>blackberry </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                        <div class="random-prod"> 
                            <div class="random-img"> 
                               <img src="{{asset('web-assets/images/giftboxes/9.png')}}" alt=""/>
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>peach </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> 
                                </div>
                            </div>
                        </div>
                        <div class="random-prod"> 
                            <div class="random-img"> 
                              <img src="{{asset('web-assets/images/Nuts/9.png')}}" alt=""/>
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>redberry </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="random-prod"> 
                            <div class="random-img"> 
                             <img src="{{asset('web-assets/images/giftbasket/1.png')}}" alt=""/>
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>strawberry </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong>
                                </div>
                            </div>
                        </div>
                        <div class="random-prod"> 
                            <div class="random-img"> 
                         <img src="{{asset('web-assets/images/Nuts/11.png')}}" alt=""/>
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>Dates </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong>
                                </div>
                            </div>
                        </div>
                        <div class="random-prod"> 
                            <div class="random-img"> 
                               <img src="{{asset('web-assets/images/product/11.jpg')}}" alt=""/> 
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>apple </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pt-50">
                <h4 class="sub-title-sm"> Best Seller </h4>
                <h2 class="fsz-30 pb-15"> <span class="light-font">organic </span> <strong>popular </strong> </h2>
                <div id="best-seller" class="nav-1"> 
                    <div class="item"> 
                        <div class="random-prod"> 
                            <div class="random-img"> 
                             <img src="{{asset('web-assets/images/giftbasket/2.png')}}" alt=""/>
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>strawberry </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong>
                                </div>
                            </div>
                        </div>
                        <div class="random-prod"> 
                            <div class="random-img"> 
                         <img src="{{asset('web-assets/images/Nuts/11.png')}}" alt=""/>
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>Dates </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong>
                                </div>
                            </div>
                        </div>
                        <div class="random-prod"> 
                            <div class="random-img"> 
                               <img src="{{asset('web-assets/images/product/11.jpg')}}" alt=""/> 
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>apple </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="random-prod"> 
                            <div class="random-img"> 
             <img src="{{asset('web-assets/images/giftbasket/7.png')}}" alt=""/>
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>grapes </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> 
                                </div>
                            </div>
                        </div>
                        <div class="random-prod"> 
                            <div class="random-img"> 
                              <img src="{{asset('web-assets/images/giftbasket/2.png')}}" alt=""/>
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>blackberry </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> 
                                </div>
                            </div>
                        </div>
                        <div class="random-prod"> 
                            <div class="random-img"> 
                               <img src="{{asset('web-assets/images/product/9.jpg')}}" alt=""/> 
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>beans </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pt-50">
                <h4 class="sub-title-sm"> Customer Needs </h4>
                <h2 class="fsz-30 pb-15"> <span class="light-font">organic </span> <strong>random </strong> </h2>
                <div id="customer-needs" class="nav-1"> 
                    <div class="item"> 
                        <div class="random-prod"> 
                            <div class="random-img"> 
             <img src="{{asset('web-assets/images/giftbasket/7.png')}}" alt=""/>
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>grapes </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> 
                                </div>
                            </div>
                        </div>
                        <div class="random-prod"> 
                            <div class="random-img"> 
                              <img src="{{asset('web-assets/images/giftbasket/5.png')}}" alt=""/>
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>blackberry </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> 
                                </div>
                            </div>
                        </div>
                        <div class="random-prod"> 
                            <div class="random-img"> 
                               <img src="{{asset('web-assets/images/product/9.jpg')}}" alt=""/> 
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>beans </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item"> 
                        <div class="random-prod"> 
                            <div class="random-img"> 
                              <img src="{{asset('web-assets/images/giftbasket/2.png')}}" alt=""/>
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>blackberry </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                </div>
                            </div>
                        </div>
                        <div class="random-prod"> 
                            <div class="random-img"> 
                               <img src="{{asset('web-assets/images/giftboxes/9.png')}}" alt=""/>
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>peach </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> 
                                </div>
                            </div>
                        </div>
                        <div class="random-prod"> 
                            <div class="random-img"> 
                              <img src="{{asset('web-assets/images/Nuts/9.png')}}" alt=""/>
                            </div>
                            <div class="random-text"> 
                                <h3 class="title-1 no-margin"> <a href="/#"> <span class="light-font">organic </span> <strong>redberry </strong> </a> </h3>
                                <span class="divider"></span>
                                <div class="price"> 
                                    <strong class="clr-txt">$50.00 </strong> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Banner -->
        <div class="row">
            <div class="col-md-6">
                <div class="prod-banner green-banner">
                    <h4 class="title"> <span class="light-font"> FRESH FROM OUR FARM : </span> <strong> Chocolate Bundle </strong> </h4>
                    <div class="banner-box">
                        <div class="banner-content">
                            <h3 class="title-sec">Vegetable</h3>
                            <h2 class="section-title"> <span class="light-font"></span> <strong>BUCKET </strong> </h2>
                            <h4 class="sub-title"> 35% OFF IN JUNE-JULY </h4>
                            <a href="/#" class="btn"> <span> shop now </span> <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                    {{-- <img  class="top-img" src="{{asset('web-assets/images/giftbasket/2.png')}}" alt=""/>  --}}
                    <img  class="bottom-img" src="{{asset('web-assets/images/giftbasket/2.png')}}" alt=""/> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="prod-banner orange-banner">
                    <h4 class="title"> <span class="light-font"> FRESH SUMMER   </span> <strong>DRY FRUITS </strong> </h4>
                    <div class="banner-box">
                        <div class="banner-content">
                            <h3 class="title-sec">DRY Fruits</h3>
                            <h2 class="section-title"> <span class="light-font">ALL  </span> <strong>SUMMER </strong> </h2>
                            <h4 class="sub-title"> 35% OFF IN JUNE-JULY </h4>
                            <a href="/#" class="btn"> <span> shop now </span> <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                    <img class="bottom-img" src="{{asset('web-assets/images/giftbasket/3.png')}}" alt="" /> 
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Random Products Ends -->

<!-- Subscribe Newsletter Starts-->
<section class="subscribe-wrap sec-space light-bg">
    <img alt="" src="assets/img/extra/sec-img-5.png" class="right-bg-img" />  
    <!-- <img src="{{asset('web-assets/images/product/chocolate.png')}}"  class="leftphp-bg-img" alt=""> -->
    <h4 class="sub-title"> JOIN OUR NEWSLETTER </h4>
                <h2 class="fsz-35"> <span class="light-font">subscribe </span> <strong> newsletter</strong> </h2>
    <div class="container"> 
        <div class="row"> 
            <div class="col-md-2"> 
                
            </div>
            <div class="col-md-8"> 
                <form class="newsletter-form row">
                    <div class="form-group col-sm-8">
                        <input class="form-control" placeholder="enter your email address" required=""  type="text">                                                                                     
                    </div>
                    <div class="form-group col-sm-4">                                               
                        <button class="theme-btn btn-block" type="submit"> subscribe <i class="fa fa-long-arrow-right"></i> </button>                                            
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
                            <a href="/#">             <img src="{{asset('web-assets/images/review/1.jpg')}}" alt=""/>
                        </div>
                        <div class="testi-caption"> 
                            <p> <i>“Lorem ipsum dolor sit amet, consectetuer adipiscing elitsed the diam nonummy nibh euismod tincidunt.”</i> </p>
                            <a href="/#"> <i class="fa fa-user clr-txt"></i> <strong> LUIS GARCHIA </strong> </a>
                        </div>
                    </div>
                </div>
                <div class="item"> 
                    <div class="testi-wrap"> 
                        <div class="testi-img"> 
                            <a href="/#">             <img src="{{asset('web-assets/images/review/1.jpg')}}" alt=""/>
                        </div>
                        <div class="testi-caption"> 
                            <p> <i>“Lorem ipsum dolor sit amet, consectetuer adipiscing elitsed the diam nonummy nibh euismod tincidunt.”</i> </p>
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
                        <img src="{{asset('web-assets/images/blog/1.png')}}" alt=""/>
                    </div>
                    <div class="news-caption">
                        <h4 class="sub-title-sm"> 26 JUNE 2016 </h4>
                        <h2 class="title-2"> <a href="/#"> <span class="light-font">5 best foods to make you </span> <strong>fresh & healthy</strong> </a> </h2>
                        <span class="divider-1"></span>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                        <a href="/#" class="fsz-12"> READ ARTICLE <i class="fa fa-long-arrow-right"></i> </a> 
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="latest-news">
                    <div class="news-img">
                        <img src="{{asset('web-assets/images/blog/2.png')}}" alt=""/>
                    </div>
                    <div class="news-caption">
                        <h4 class="sub-title-sm"> 26 JUNE 2016 </h4>
                        <h2 class="title-2"> <a href="/#"> <span class="light-font">5 best foods to make you </span> <strong>fresh & healthy</strong> </a> </h2>
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