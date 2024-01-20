@extends('web.master')
@section('content') 
<section class="account-page ptb-50">
    <div class="container"> 
        <h2 class="section-title ptb-15" style="text-align: center;"> <span class="light-font">Wishlist </span> <strong>Product </strong>  </h2>
        <!-- Shopping Cart Starts -->
        <div class="cart-table">
            <form class="cart-form">    
                <table class="product-table">                   
                    <thead class="">        
                        <tr>
                            <th>product </th>                                                                        
                            <th>product detail</th>  
                            
                            <th>date</th> 
                            <th>quantity</th>
                            <th>Product price</th>
                            <th>Total price</th>
                            <th>In Stock</th>                                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="image">
                                <div class="white-bg">
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt=""/>    
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
                                <div class="text-center pt-20"> <b class="fsz-16"> 12th Dec'15 </b> </div>
                            </td>   
                            <td>
                                <div class="prod-btns fontbold-2">
                                    <b class="fsz-16"> 1 </b>
                                </div>
                            </td>
                            <td> 
                                <div class="price fontbold-2"> 
                                    <strong class="fsz-20">Rs 50.00 </strong> 
                                </div>
                            </td> 
                            <td> 
                                <div class="price fontbold-2"> 
                                    <strong class="fsz-20">Rs 150.00 </strong> 
                                </div>
                            </td> 
                            
                            <td> 
                                <div class="order-status pt-15"> 
                                    <a href="/#" class="theme-btn-sm-2 btn">Add TO Cart</a>
                                     
                                </div>
                            </td>                                       
                        </tr>      

                    </tbody>  
                    <tbody>
                        <tr>
                            <td class="image">
                                <div class="white-bg">
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt=""/>    
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
                                <div class="text-center pt-20"> <b class="fsz-16"> 12th Dec'15 </b> </div>
                            </td>   
                            <td>
                                <div class="prod-btns fontbold-2">
                                    <b class="fsz-16"> 1 </b>
                                </div>
                            </td>
                            <td> 
                                <div class="price fontbold-2"> 
                                    <strong class="fsz-20">Rs 50.00 </strong> 
                                </div>
                            </td> 
                            <td> 
                                <div class="price fontbold-2"> 
                                    <strong class="fsz-20">Rs 150.00 </strong> 
                                </div>
                            </td> 
                            
                            <td> 
                                <div class="order-status pt-15"> 
                                    <a href="/#" class="theme-btn-sm-2 btn">Add TO Cart</a>
                                     
                                </div>
                            </td>                                       
                        </tr>      

                    </tbody> 
                    <tbody>
                        <tr>
                            <td class="image">
                                <div class="white-bg">
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt=""/>    
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
                                <div class="text-center pt-20"> <b class="fsz-16"> 12th Dec'15 </b> </div>
                            </td>   
                            <td>
                                <div class="prod-btns fontbold-2">
                                    <b class="fsz-16"> 1 </b>
                                </div>
                            </td>
                            <td> 
                                <div class="price fontbold-2"> 
                                    <strong class="fsz-20">Rs 50.00 </strong> 
                                </div>
                            </td> 
                            <td> 
                                <div class="price fontbold-2"> 
                                    <strong class="fsz-20">Rs 150.00 </strong> 
                                </div>
                            </td> 
                            
                            <td> 
                                <div class="order-status pt-15"> 
                                    <a href="/#" class="theme-btn-sm-2 btn">Add TO Cart</a>
                                     
                                </div>
                            </td>                                       
                        </tr>      

                    </tbody> 
                    <tbody>
                        <tr>
                            <td class="image">
                                <div class="white-bg">
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt=""/>    
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
                                <div class="text-center pt-20"> <b class="fsz-16"> 12th Dec'15 </b> </div>
                            </td>   
                            <td>
                                <div class="prod-btns fontbold-2">
                                    <b class="fsz-16"> 1 </b>
                                </div>
                            </td>
                            <td> 
                                <div class="price fontbold-2"> 
                                    <strong class="fsz-20">Rs 50.00 </strong> 
                                </div>
                            </td> 
                            <td> 
                                <div class="price fontbold-2"> 
                                    <strong class="fsz-20">Rs 150.00 </strong> 
                                </div>
                            </td> 
                            
                            <td> 
                                <div class="order-status pt-15"> 
                                    <a href="/#" class="theme-btn-sm-2 btn">Add TO Cart</a>
                                     
                                </div>
                            </td>                                       
                        </tr>      

                    </tbody> 
                    <tbody>
                        <tr>
                            <td class="image">
                                <div class="white-bg">
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt=""/>    
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
                                <div class="text-center pt-20"> <b class="fsz-16"> 12th Dec'15 </b> </div>
                            </td>   
                            <td>
                                <div class="prod-btns fontbold-2">
                                    <b class="fsz-16"> 1 </b>
                                </div>
                            </td>
                            <td> 
                                <div class="price fontbold-2"> 
                                    <strong class="fsz-20">Rs 50.00 </strong> 
                                </div>
                            </td> 
                            <td> 
                                <div class="price fontbold-2"> 
                                    <strong class="fsz-20">Rs 150.00 </strong> 
                                </div>
                            </td> 
                            
                            <td> 
                                <div class="order-status pt-15"> 
                                    <a href="/#" class="theme-btn-sm-2 btn">Add TO Cart</a>
                                     
                                </div>
                            </td>                                       
                        </tr>      

                    </tbody>                              
                </table>
          

              

            </form>
        </div>                    
        <!-- / Shopping Cart Ends -->
    </div>
</section>
@endsection