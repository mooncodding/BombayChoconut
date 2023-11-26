@extends('web.master')
@section('content')
            <!--Breadcrumb Section Start-->
            <section class="breadcrumb-bg" style="background-image:url({{asset('web-assets/images/banner/shop.jpg')}})">                
                <div class="theme-container container ">                       
                    <div class="site-breadcumb white-clr">                        
                        <h2 class="section-title"> <strong class="clr-txt">Bombay </strong> <span class="light-font">Shop </span> </h2>
                    </div>  
                </div>
            </section>
            <!--Breadcrumb Section End-->
            <!-- Shop Starts-->
            <section class="shop-wrap sec-space-bottom">
                <div class="pattern"> 
                    <img alt="" src="assets/img/icons/white-pattern.png">
                </div>

                <div class="container rel-div">
                    <div class="organic-wrap"> 
                        <img class="logo-img" alt style="
                    width: 120px;" src="{{asset('web-assets/images/bombaylogo.png')}}" />
                        
                        <div class="tabs-box">
                            <ul class="theme-tabs" id="categories">
                                <li class="active"><a href="#" data-toggle="tab" class="category-btn" data-id="all">All Categories</a></li>                                
                                <li class="active"><a href="#" data-toggle="tab" class="category-btn" data-id="1">Dry fruits</a></li>                                
                                <li class=""><a href="#" data-toggle="tab" class="category-btn" data-id="2">Chocolates</a></li>                                
                                <li class=""><a href="#" data-toggle="tab" class="category-btn" data-id="3">Fresh Biscuit</a></li>                                
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content shop-content">
                        <div class="tab-pane fade active in productShopCards"  role="tabpanel">
                        </div>
                    </div>
                </div>
                
            </section>
        
            <!-- / Shop Ends -->   

@endsection

@section('scripts')
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

            // Set up click event for "Add to Cart" buttons
            $('.productShopCards').on('click', '.add-to-cart-btn', function () {
                const productId = $(this).data('product-id');
                addToCart(productId);
            });

            // Set up click event for "View Details" buttons
            $('.productShopCards').on('click', '.view-details-btn', function () {
                const productId = $(this).data('product-id');
                fetchProductDetails(productId);
            });
        });

        function displayProductCards(products) {
            let productsContainer = $(".productShopCards");
            productsContainer.empty(); // Clear previous products
            // Loop through the products and generate HTML for each product card
            $.each(products, function (index, product) {
                let productCard = `<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-3 col-md-4 col-sm-6"> 
                                    <div class="product-box"> 
                                        <div class="product-media"> 
                                            <img class="prod-img" src="{{asset('images/product-images/${product.photo}')}}" alt=""/>     
                                            <img class="shape" alt="" src="assets/img/icons/shap-small.png" />
                                            <div class="prod-icons"> 
                                                <a href="#" class="fa fa-heart"></a>
                                                <a  href="/#product-preview" data-toggle="modal" class="fa fa-shopping-basket view-details-btn" data-product-id="${product.id}"></a>
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
                                <img src="{{asset('images/product-images/${product.photo}')}}" width="300" alt=""/>
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
                                            <input title="Qty" name="quantity" placeholder="1" min="1" class="form-control qty" type="number">
                                        </div>
                                    </div>
                                    <ul class="meta">
                                        <li class="tags-widget" id="variantsContainer"> 
                                            <strong>Variants:</strong>
                                            ${product.product_variants.map(variant => `
                                                <span class="weight-option" data-price="${variant.sale_price}"><a href="/#">${variant.weight} </a></span>
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

            // Add event listener to the weight options
            $('.weight-option').on('click', function() {
                const selectedWeight = $(this).data('price');
                updatePrice(selectedWeight);
            });

            // Set the default price to be the price of the first variant
            const defaultPrice = product.product_variants[0].sale_price;
            updatePrice(defaultPrice);

            // Function to update the displayed price
            function updatePrice(newPrice) {
                console.log(newPrice)
                $('.saleprice').text('Rs' + newPrice);
            }
        }
    });
</script>
@endsection
           



