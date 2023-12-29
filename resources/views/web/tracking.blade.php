@extends('web.master')
@section('content') 
<section class="tracking">
<div class="card">
    <div class="upper">
        <div class="row">
            <div class="col-8 heading">
                <h5><b>Track Your Order</b></h5>
            </div>
            {{-- <div class="col-4">
                <img class="img-fluid" src="https://i.imgur.com/Rzjor3M.png">
            </div> --}}
        </div>
        <form>
            <div class="form-element">
                <span id="input-header">Order ID</span>
                <input type="text" id="order_id" placeholder="2548745588958">
            </div>
          
        </form>
        
    </div>
    <hr>
    <div class="lower">
        <button class="btn">Track Order</button>
    </div>
        
    
</div>
</section>
<section class="account-page ptb-50">
    <div class="container"> 
        <!-- Shopping Cart Starts -->
        <div class="cart-table">
            <form class="cart-form">    
                <table class="product-table">                   
                    <thead class="">        
                        <tr>                                                                       
                            <th>product detail</th>  
                            
                            <th>date</th> 
                            <th>quantity</th>
                            <th>Product price</th>
                            <th>Total price</th>
                            <th>status</th>                                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- <td class="image">
                                <div class="white-bg">
                                    <img class="prod-img" src="{{asset('web-assets/images/giftbasket/1.png')}}" alt=""/>    
                                </div>
                            </td> --}}
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
                                    <a href="/#" class="theme-btn-sm-2 btn">In Progress</a>
                                     
                                </div>
                            </td>                                       
                        </tr>      

                    </tbody>                               
                </table>
                <table class="product-table">                   
                    <thead class="">        
                        <tr>                                                                       
                            <th>your name</th> 
                            <th>your email</th> 
                            <th>your phone number</th> 
                            <th>your address</th>
                            <th>your tracking id</th>
                                                                    
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          
                            <td> 
                                <div class="text-center pt-20"> <b class="fsz-16"> Muneeb Awan </b> </div>
                            </td>  
                            <td> 
                                <div class="text-center pt-20"> <b class="fsz-16"> muneebrazaawan@gmail.com </b> </div>
                            </td> 
                            <td> 
                                <div class="text-center pt-20"> <b class="fsz-16"> 03232771266 </b> </div>
                            </td>  
                            <td> 
                                <div class="text-center pt-20"> <b class="fsz-16"> England </b> </div>
                            </td> 
                            <td> 
                                <div class="text-center pt-20"> <b class="fsz-16">428332121331 </b> </div>
                            </td> 
                                                           
                        </tr>      

                    </tbody>                               
                </table>

                <div class="continue-shopping text-center">
                    <a href="/shop-1" class="theme-btn btn"> Back to shop </a>
                </div>

            </form>
        </div>                    
        <!-- / Shopping Cart Ends -->
    </div>
</section>
@endsection