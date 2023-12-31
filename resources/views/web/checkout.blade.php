@extends('web.master')
@section('content')

<section class="checkout">
    <h1 class="section-title ptb-15" style="text-align: center;"> <span class="light-font">Check</span> <strong>Out </strong>  </h1>
    <form action="{{route('order.store')}}" method="POST" role="form" id="checkout_form">
        <div class="row">
        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-5 px-md-1 pl-md-3 px-0 px-lg-3 px-sm-0">
        <div class="bg-white border p-3">
        <input type="hidden" id="price" name="price" value="9180">
        <div class="row">
        <div class="form-group col-md-12 mb-2">
        <input type="hidden" name="ordertype" id="ordertype" value="12">
        <label class="" for="name">Name*</label>
        <input name="name" type="text" id="name" placeholder="Name" value="" class="form-control " required="">
        </div>
        <div class="form-group col-md-12 mb-2">
        <label class="" for="email">Email</label>
        <input name="email" type="email" id="email" placeholder="Email" value="" class="form-control " required="">
        </div>
        <div class="form-group col-lg-6 col-md-6 col-12 mb-2">
        <label class="" for="mobile">Mobile*</label>
        <input name="mobile" type="tel" id="mobile" value="" class="form-control  onlyNumerics" placeholder="Mobile Number " pattern="[0-9]*" required="">
        </div>
        @php
            $cities = App\Models\City::all();
        @endphp
        <div class="form-group col-lg-6 col-md-6 col-12 mb-2">
            <label class="" for="city">City*</label>
            <select name="city_id" id="" class="form-control select_city js_select_2">
                <option value="">Select Category</option>
                @foreach ($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
         </div>
        <div class="form-group col-md-12 mb-2">
        <label class="" for="address">Address*</label>
        <textarea name="address" class="form-control " placeholder="Address" row="2" id="address" required=""></textarea>
        </div>
        <div class="form-group col-md-12 ">
        <label class="" for="instructions">Special Instructions</label>
        <textarea name="instructions" class="form-control " row="2" id="instructions" placeholder="Instructions"></textarea>
        </div>
        
        </div>
        </div>
        <div class="col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-6 px-0">
        <div class="w-100">
        <p class="bg-primary text-uppercase p-2 get_nav font-weight-semi-bold">Payment Method</p>
        <div class="container ">
        <div class="row">
        <div class="col-md-12 my-2">
        <div class="row"><input type="hidden" id="pm_type" value="2"><div id="payment_box" class="col-lg-3 col-md-6 col-sm-6 col-6 my-2 pr-1 pl-0"> <label class=" cursor-pointer text-center rounded mx-1 py-2 border w-100 border-primary" for="payment_methods4"><input checked="" class="d-none" type="radio" onchange="show_payment_description(this.value);" id="payment_methods4" name="payment_methods" value="4" required="required"><img src="https://www.bombaydryfruits.com/images/COD.webp" width="50" height="50" alt=""><span class="d-block text-capitalize font-weight-medium text-black font-size11" checked="" value="4">Cash On Delivery</span> </label></div><input type="hidden" id="pm_type" value="2"></div>
        </div>
        </div>
        </div>
        </div>
        </div>
        
        </div>
        
        
        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-7 px-md-1 pr-md-3 px-0 px-lg-3 px-sm-0">
       
        
        <table class="table table-bordered mb-0 bg-white">
        <thead>
        <tr>
        <th class="text-uppercase" style="
        width: 40%;
    ">PRODUCT NAME</th>
        <th class="text-uppercase" style="
        width: 23%;
    ">QTY</th>
        <th class="text-uppercase">Price</th>
        <th class="text-uppercase" style="
        width: 22%;
    ">Total Price</th>
        <th></th>
        </tr>
        </thead>
        <tbody>
        <input type="hidden" onclick="typeof fbq != 'undefined' &amp;&amp; fbq('track', 'RemoveFromCart', {content_ids:'1626,201,1022,1189',content_type:'product',value: '9687',currency: 'PKR',contents: [ {id: '1626',quantity: '1'},{id: '201',quantity: '1'},{id: '1022',quantity: '3'},{id: '1189',quantity: '4'}]})" id="removefromcart"> <input type="hidden" id="gid1626" value="1626">
        <input type="hidden" id="gtitle1626" value="3 In 1 Flavoured Cashews Box">
        <input type="hidden" id="gbrand1626" value="BDF">
        <input type="hidden" id="gcategory1626" value="dry-fruits/flavoured-nuts/">
        <input type="hidden" id="glast_category1626" value="flavoured-nuts">
        <input type="hidden" id="gvariant1626" value="330Gm">
        <input type="hidden" id="gqty1626" value="1">
        <input type="hidden" id="gprice1626" value="2180">
        <tr class="row_0 row_count_checkout">
        
        
        
        <td class="boxis">
        <img class="img-fluid no-src lazyloaded" data-src="https://www.bombaydryfruits.com/images/product_gallery/1684756624_512.webp" width="70" alt="3 In 1 Flavoured Cashews Box" src="https://www.bombaydryfruits.com/images/product_gallery/1684756624_512.webp">
        <p class="font-size12">3 In 1 Flavoured Cashews Box </p>
           
         
        </td>
        <td class="px-0 px-sm-0 px-md-2 px-lg-2">
            <div class="input-group">
                <span class="input-group-btn">
                    <button class="btn btn-default btn-subtract" type="button">-</button>
                </span>
                <input type="text" class="form-control no-padding text-center item-quantity" value="1">
                <span class="input-group-btn">
                     <button class="btn btn-default btn-add" type="button">+</button>
                </span>
            </div>
        </td>
        <td>
        <p>Rs.<span id="cart_row_price0">2,180</span></p>
        </td>
        <td>
            <p>Rs.<span id="cart_row_price0">2,180</span></p>
            </td>
        <td class="text-center align-middle">
        <button class="btn btn-danger" type="button" onclick="remove_cart_item(1626,0);">
        <img src="https://www.bombaydryfruits.com/images/theme_icons/trash-icon-02.svg" class="white-icons" alt="trash" width="18" height="18">
        </button>
        </td>
        </tr>
        <input type="hidden" id="gid201" value="201">
        <input type="hidden" id="gtitle201" value="Sughai Dates">
        <input type="hidden" id="gbrand201" value="BDF">
        <input type="hidden" id="gcategory201" value="dates/saudi-dates/">
        <input type="hidden" id="glast_category201" value="saudi-dates">
        <input type="hidden" id="gvariant201" value="500gm">
        <input type="hidden" id="gqty201" value="1">
        <input type="hidden" id="gprice201" value="2000">
        <tr class="row_2 row_count_checkout">
        
        
        
        <td class="boxis">
        <img class="img-fluid no-src lazyloaded" data-src="https://www.bombaydryfruits.com/images/product_gallery\/1678356339_217.webp" width="70" alt="Sughai Dates" src="https://www.bombaydryfruits.com/images/product_gallery\/1678356339_217.webp">
        <p class="font-size12">Sughai Dates weight:500gm, </p>
           
         
        </td>
        <td class="px-0 px-sm-0 px-md-2 px-lg-2">
            <div class="input-group">
                <span class="input-group-btn">
                    <button class="btn btn-default btn-subtract" type="button">-</button>
                </span>
                <input type="text" class="form-control no-padding text-center item-quantity" value="1">
                <span class="input-group-btn">
                     <button class="btn btn-default btn-add" type="button">+</button>
                </span>
            </div>
        </td>
        <td>
        <p>Rs.<span id="cart_row_price2">2,000</span></p>
        </td>
        <td>
            <p>Rs.<span id="cart_row_price0">2,180</span></p>
            </td>
        <td class="text-center align-middle">
        <button class="btn btn-danger" type="button" onclick="remove_cart_item(201,2);">
        <img src="https://www.bombaydryfruits.com/images/theme_icons/trash-icon-02.svg" class="white-icons" alt="trash" width="18" height="18">
        </button>
        </td>
        </tr>
        <input type="hidden" id="gid1022" value="1022">
        <input type="hidden" id="gtitle1022" value="Cardamom Green">
        <input type="hidden" id="gbrand1022" value="BDF">
        <input type="hidden" id="gcategory1022" value="mouth-freshener/mukhwas/">
        <input type="hidden" id="glast_category1022" value="mukhwas">
        <input type="hidden" id="gvariant1022" value="125gm">
        <input type="hidden" id="gqty1022" value="3">
        <input type="hidden" id="gprice1022" value="1500">
        <tr class="row_3 row_count_checkout">
        
        
        
        <td class="boxis">
        <img class="img-fluid no-src lazyloaded" data-src="https://www.bombaydryfruits.com/images/product_gallery\/1678356339_217.webp" width="70" alt="Cardamom Green" src="https://www.bombaydryfruits.com/images/product_gallery\/1678356339_217.webp">
        <p class="font-size12">Cardamom Green weight:125gm, </p>
           
         
        </td>
        <td class="px-0 px-sm-0 px-md-2 px-lg-2">
            <div class="input-group">
                <span class="input-group-btn">
                    <button class="btn btn-default btn-subtract" type="button">-</button>
                </span>
                <input type="text" class="form-control no-padding text-center item-quantity" value="1">
                <span class="input-group-btn">
                     <button class="btn btn-default btn-add" type="button">+</button>
                </span>
            </div>
        </td>
        <td>
        <p>Rs.<span id="cart_row_price3">4,500</span></p>
        </td>
        <td>
            <p>Rs.<span id="cart_row_price0">2,180</span></p>
            </td>
        <td class="text-center align-middle">
        <button class="btn btn-danger" type="button" onclick="remove_cart_item(1022,3);">
        <img src="https://www.bombaydryfruits.com/images/theme_icons/trash-icon-02.svg" class="white-icons" alt="trash" width="18" height="18">
        </button>
        </td>
        </tr>
        <input type="hidden" id="gid1189" value="1189">
        <input type="hidden" id="gtitle1189" value="Sugar Coated Fennel Seeds (Saunf)">
        <input type="hidden" id="gbrand1189" value="BDF">
        <input type="hidden" id="gcategory1189" value="mouth-freshener/mukhwas/">
        <input type="hidden" id="glast_category1189" value="mukhwas">
        <input type="hidden" id="gvariant1189" value="250gm">
        <input type="hidden" id="gqty1189" value="4">
        <input type="hidden" id="gprice1189" value="125">
        <tr class="row_4 row_count_checkout">
        
        
        
        <td class="boxis">
        <img class="img-fluid no-src lazyloaded" data-src="https://www.bombaydryfruits.com/images/product_gallery\/1693150278_773.webp" width="70" alt="Sugar Coated Fennel Seeds (Saunf)" src="https://www.bombaydryfruits.com/images/product_gallery\/1693150278_773.webp">
        <p class="font-size12">Sugar Coated Fennel Seeds (Saunf) weight:250gm, </p>
           
         
        </td>
        <td class="px-0 px-sm-0 px-md-2 px-lg-2">
            <div class="input-group">
                <span class="input-group-btn">
                    <button class="btn btn-default btn-subtract" type="button">-</button>
                </span>
                <input type="text" class="form-control no-padding text-center item-quantity" value="1">
                <span class="input-group-btn">
                     <button class="btn btn-default btn-add" type="button">+</button>
                </span>
            </div>
        </td>
        <td>
        <p>Rs.<span id="cart_row_price4">500</span></p>
        </td>
        <td>
            <p>Rs.<span id="cart_row_price0">2,180</span></p>
            </td>
        <td class="text-center align-middle">
        <button class="btn btn-danger" type="button" onclick="remove_cart_item(1189,4);">
        <img src="https://www.bombaydryfruits.com/images/theme_icons/trash-icon-02.svg" class="white-icons" alt="trash" width="18" height="18">
        </button>
        </td>
        </tr>
        <tr>
            <td>

            </td>
            <td></td>
            <td></td>
            <td>
                
            </td>
            <td>
                <button class="btn btn-danger" type="button" onclick="remove_cart_item(1189,4);">Delete All
                    {{-- <img src="https://www.bombaydryfruits.com/images/theme_icons/trash-icon-02.svg" class="white-icons" alt="trash" width="18" height="18"> --}}
                    </button>
            </td>
        </tr>
        <input type="hidden" id="checkout_items" value="1626,201,1022,1189"> </tbody>
        </table>
        <div class="d-flex align-items-end justify-content-between mb-30">
            <h4>Your Order</h4>
            <h4 class="text-muted">Subtotal
                <span class="sub-pri"> 6000</span>
            </h4>
        </div>
        <div class=" bg-white ">
        <span id="loader_checkout" style="display:none; font-size: 40px;" class="fa fa-spinner fa-spin float-right"></span>
        <button type="submit" name="submit" class="font16 mbl_btn_checkout btn bg-primary rounded font-weight-bold float-right  btn-checkout  text-uppercase py-md-3 hvr-float-shadow">
        Place Order
        </button>
        <button  class="slide-btn cont">
           Continue Shopping
            </button>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        </form>

</section>

     @endsection