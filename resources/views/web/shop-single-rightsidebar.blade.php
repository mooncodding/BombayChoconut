
@extends('web.master')
@section('content')
<style>
    .col-lg-2.cart-megamenu {
    DISPLAY: NONE;
}
</style>
    <!--Breadcrumb Section Start-->
    <section class="breadcrumb-bg">
        <div class="theme-container container ">
            <div class="site-breadcumb white-clr">
                <h2 class="section-title"> <strong class="clr-txt">Bombay </strong> <span class="light-font">Shop </span>
                </h2>
                <ol class="breadcrumb breadcrumb-menubar">
                    <li> <a href="/#"> Home </a> SHOP </li>
                </ol>
            </div>
        </div>
    </section>
    <!--Breadcrumb Section End-->


    <!-- Shop Starts-->
    <section class="shop-wrap sec-space-bottom">
        <div class="container rel-div pt-50">
            <div class="row">
                <div class="col-md-12 pt-15">
                    <div class="product-single sec-space-bottom  clearfix">
                        <!-- Single Products Slider Starts -->
                        <div class="col-lg-6 pb-50 col-sm-8 col-sm-offset-2 col-lg-offset-0">
                            <div class="prod-slider sync1">
                                <div class="item">
                                    <img id="imgZoom" onmousemove="zoomIn(event)" onmouseout="zoomOut()" src="{{asset('images/product-images/'.$data->photo)}}" width="400" alt="">
                                    <div id="overlay" onmousemove="zoomIn(event)"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Products Slider Ends -->

                        <div class="col-lg-6">
                            <div class="product-content block-inline">

                                <div class="single-caption">
                                    <h3 class="section-title">
                                        <strong>{{$data->title}}</strong>
                                    </h3>
                                    <span class="divider-2"></span>
                                    <p class="price"> 
                                        <strong class="clr-txt fsz-20 saleprice"></strong>
                                    </p>

                                    <div class="fsz-16">
                                        <p>{!! $data->description !!} </p>
                                    </div>

                                    <div class="prod-btns">
                                        <div class="quantity">
                                            <input title="Qty" id="quatity" value="1" name="quantity" min="1" class="form-control" type="number">
                                        </div>
                                    </div>
                                    <ul class="meta">
                                        <li class="tags-widget" id="variantsContainer"> 
                                            <strong>Variants:</strong>
                                            @foreach($data->productVariants as $variant)
                                                <span class="weight-option" data-variant="{{ $variant->id }}" data-price="{{ $variant->sale_price }}">
                                                    <a href="javascript:void(0);">{{ $variant->weight }}</a>
                                                </span>
                                            @endforeach
                                        </li>
                                        <li>
                                            <strong>CATEGORY:</strong><span>{{ $data->productCategory->name }}</span>
                                        </li>
                                    </ul>
                                    <div class="divider-full-1"></div>
                                    <div class="add-cart pt-15">
                                        <a href="/#" class="theme-btn js-add-product  add-to-cart-btn" data-product-id="{{$data->id}}"> <strong> ADD TO CART </strong> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="prod-tabs pb-50">
                        <ul class="tabs fsz-20">
                            <li class=""><a href="/#prod-tab-1" data-toggle="tab"> <span class="light-font">item
                                </span> <strong>description </strong> </a></li>
                        </ul>
                        <div class="divider-full-1"></div>

                        <div class="tab-content prod-tab-content">
                            <div id="prod-tab-1" class="tab-pane fade in active">
                                <h3 class="fsz-16"><span class="light-font">item </span> <strong>description </strong> </h3>
                                <span class="divider-2 crl-bg"></span>

                                <div class="block-inline pera vhtml">
                                    {!! $data->description !!} 
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Shop Ends -->
@endsection
@section('meta_tags')
    {!! SEOMeta::generate() !!}
@endsection
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Initialize the price with the default value
        var defaultPrice = {!! $data->productVariants->first()->sale_price !!};
        var variantId = {!! $data->productVariants->first()->id !!};
        updatePrice(defaultPrice);

        // Handle variant click
        $('.weight-option a').on('click', function () {
            var variantPrice = $(this).parent().data('price');
            variantId = $(this).data('variant');
            updatePrice(variantPrice);
        });
        // Handle variant click
        $('.weight-option').on('click', function () {
            variantId = $(this).data('variant');
        });

        // Function to update the displayed price
        function updatePrice(price) {
            $('.saleprice').text('Rs' + price);
        }

        // Set up click event for "Add to Cart" buttons
        $('.single-caption').on('click', '.add-to-cart-btn', function() {
            var productId = $(this).data('product-id');
            var quantity = document.getElementById('quatity').value;
            var variant_id = variantId;
            array = [{
                'product_id': parseInt(productId),
                'quantity': parseInt(quantity),
                'variant_id': parseInt(variant_id),
            }];
            addToCart(array);
        });

        
        function addToCart(data) {
            // Get the CSRF token from the meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            // Make an AJAX request to add the product to the cart
            $.ajax({
                url: '{{ route('cart.store') }}',
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
                success: function(response) {
                    location.reload();
                    openCart();
                },
                error: function(error) {
                    console.error('Error adding to cart:', error);
                }
            });

        }
        
        $(document).ready(function() {
            openCart(); // Call openCart when the document is ready
        });
    });
</script>

