@extends('web.master')
@section('content')
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

<section class="bombay-categories sec-space-bottom">
    <div class="container"> 
        <div class="title-wrap">
            <h4 class="sub-title"> SEARCH </h4>
            <h2 class="section-title">  <span class="light-font cate">CATEGORIES </span> </h2>
            <div class="search-wrap">
                <form action="{{url('/category')}}" method="GET">
                    <input class="form-control" name="search" placeholder="">
                    <button class="btn" type="submit"> <i class="fa fa-search"></i> </button>
                </form>
            </div>
        </div>
        <div class="tab-content shop-content">
                        <div id="grid-view" class="tab-pane fade active in" role="tabpanel">
                            <div class="row">
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category) 
                                    <div class="col-lg-3 col-md-4 col-sm-6"> 
                                        <div class="product-box"> 
                                            <div class="product-media"> 
                                            <img class="prod-img" src="{{asset('images/product-categories/'.$category->image)}}" alt=""/>   
                                                <img class="shape" alt="" src="assets/img/icons/shap-small.png" />  
                                                <div class="prod-icons"> 
                                                    <a href="/#" class="fa fa-heart"></a>
                                                    <a href="/#" class="fa fa-shopping-basket"></a>
                                                    <a  href="/#product-preview" data-toggle="modal" class="fa fa-expand"></a>
                                                </div>
                                            </div>                                           
                                            <div class="product-caption"> 
                                                <h3 class="product-title">
                                            <a href="/shop-single-fullwidth"> <span class="light-font"> {{$category->name}}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <h2 class="text-danger">No Record Found</h2>
                                @endif                               
                            </div>
                            <div class="rel-div pt-50">
                                <div class="divider-full-1"></div>
                                <div class="nav-page">
                                    <a href="/#" class="fa fa-long-arrow-left left"></a> 
                                    <a href="/#" class="fa fa-long-arrow-right right"></a> 
                                </div>
                            </div>                            

                            <div class="pagination-wrap">
                                <ul class="pagintn">                                  
                                    <li><a href="/#">01</a></li>
                                    <li><a href="/#">02</a></li>
                                    <li><a href="/#">03</a></li>
                                    <li><a href="/#">04</a></li>
                                    <li><a href="/#">05</a></li>
                                    <li><a href="/#">...</a></li>
                                    <li><a href="/#">15</a></li>                                    
                                </ul>
                            </div>
                        </div>

                        <div id="list-view" class="tab-pane fade" role="tabpanel">
                            <div class="row"> 
                                <div class="col-md-6 col-sm-12"> 
                                    <div class="deal-item list-view">
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
                                                <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh </span> <strong>rasberry </strong> </a> </h2>
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                                                <div class="price pt-15"> 
                                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                                </div>
                                            </div>
                                            <div class="img"> <img alt="" src="assets/img/extra/deal-1.png"> </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12"> 
                                    <div class="deal-item list-view">
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
                                                <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh </span> <strong>cherry </strong> </a> </h2>
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                                                <div class="price pt-15"> 
                                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                                </div>
                                            </div>
                                            <div class="img"> <img alt="" src="assets/img/products/3.png"> </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-12"> 
                                    <div class="deal-item list-view">
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
                                                <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh </span> <strong>mushroom </strong> </a> </h2>
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                                                <div class="price pt-15"> 
                                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                                </div>
                                            </div>
                                            <div class="img"> <img alt="" src="assets/img/products/7.png"> </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12"> 
                                    <div class="deal-item list-view">
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
                                                <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh </span> <strong>pepper </strong> </a> </h2>
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                                                <div class="price pt-15"> 
                                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                                </div>
                                            </div>
                                            <div class="img"> <img alt="" src="assets/img/products/8.png"> </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-12"> 
                                    <div class="deal-item list-view">
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
                                                <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh </span> <strong>cabbage </strong> </a> </h2>
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                                                <div class="price pt-15"> 
                                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                                </div>
                                            </div>
                                            <div class="img"> <img alt="" src="assets/img/products/2.png"> </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12"> 
                                    <div class="deal-item list-view">
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
                                                <h2 class="fsz-30 pb-15"> <a href="/#"> <span class="light-font">fresh </span> <strong>salad </strong> </a> </h2>
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                                                <div class="price pt-15"> 
                                                    <strong class="clr-txt">$50.00 </strong> <del class="light-font">$65.00 </del>
                                                </div>
                                            </div>
                                            <div class="img"> <img alt="" src="assets/img/products/4.png"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="rel-div pt-50">
                                <div class="divider-full-1"></div>
                                <div class="nav-page">
                                    <a href="/#" class="fa fa-long-arrow-left left"></a> 
                                    <a href="/#" class="fa fa-long-arrow-right right"></a> 
                                </div>
                            </div>                            

                            <div class="pagination-wrap">
                                <ul class="pagintn">                                  
                                    <li><a href="/#">01</a></li>
                                    <li><a href="/#">02</a></li>
                                    <li><a href="/#">03</a></li>
                                    <li><a href="/#">04</a></li>
                                    <li><a href="/#">05</a></li>
                                    <li><a href="/#">...</a></li>
                                    <li><a href="/#">15</a></li>                                    
                                </ul>
                            </div>
                        </div>
                    </div>

    </div>
</section>

<section class="subscribe-wrap sec-space light-bg"> 
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

@endsection