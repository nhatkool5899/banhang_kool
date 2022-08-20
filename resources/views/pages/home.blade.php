@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <p class="title">
        <span>Điện thoại nổi bật nhất</span>
        <a href="{{URL::to('show-all-product/1')}}" class="show-all-phone">Xem tất cả điện thoại</a>
    </p>
    @foreach ($phone_product as $item =>$product)
    
    <div class="col-sm-3 product-main">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo">
                    <form>
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$product->product_quantity}}" class="check_product_qty_{{$product->product_id}}">

                        <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_img}}" class="cart_product_image_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_desc}}" class="cart_product_desc_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">


                        <a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}" class="link-product-details">
                        </a>
                        <img src="{{URL::to('public/upload/product/'.$product->product_img)}}" alt="" style="height: 220px" />
                        <div class="product-info-details">
                            <p>{{$product->product_name}}</p>
                            <div class="product-price-sold">
                                <span class="product-price">{{number_format($product->product_price,0,',','.')}}.đ</span>
                                <span class="product-sold">Đã bán 100</span>
                            </div>
                            <div class="product-rate-cart">
                                <div class="product-rate">
                                    <img style="width:75%; margin-top:0" src="{{asset('public/front-end/images/product-details/rating.png')}}" alt=""/>
                                    <span style="color: #ccc; margin-left:4px">10</span>
                                </div>
                                <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart"><i class="fa-solid fa-cart-plus"></i></button>
                            </div>
                        </div>

                        {{-- <a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}" class="btn btn-default add-to-cart">
                            <i class="fa fa-shopping-cart"></i>Add to cart</a> --}}

                    </form>
                </div>

            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    {{-- <li><a href="#"><i class="fa-solid fa-heart active like-product"></i>Add to wishlist</a></li> --}}
                    <li><a href="#" ><i class="fa-regular fa-heart like-product"></i>Yêu thích</a></li>
                    <li><a href="#" class=""><i class="fa-solid fa-down-left-and-up-right-to-center" style="color: rgb(115, 115, 241)"></i>So sánh</a></li>
                </ul>
            </div>
        </div>
        <div class="items-overlay"></div>
    </div>
    @endforeach
    
</div><!--product body-->

<div class="features_items"><!--features_items-->
    <p class="title">
        <span>Laptop bán chạy nhất</span>
        <a href="{{URL::to('show-all-product/2')}}" class="show-all-phone">Xem tất cả Laptop</a>

    </p>
    @foreach ($laptop_product as $item =>$product)
    
    <div class="col-sm-3 product-main">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo">
                    <form>
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$product->product_quantity}}" class="check_product_qty_{{$product->product_id}}">

                        <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_img}}" class="cart_product_image_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_desc}}" class="cart_product_desc_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">


                        <a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}" class="link-product-details">
                        </a>
                        <img src="{{URL::to('public/upload/product/'.$product->product_img)}}" alt="" style="height: 220px"/>

                        <div class="product-info-details">
                            <p>{{$product->product_name}}</p>
                            <div class="product-price-sold">
                                <span class="product-price">{{number_format($product->product_price,0,',','.')}}.đ</span>
                                <span class="product-sold">Đã bán 100</span>
                            </div>
                            <div class="product-rate-cart">
                                <div class="product-rate">
                                    <img style="width:75%; margin-top:0" src="{{asset('public/front-end/images/product-details/rating.png')}}" alt=""/>
                                    <span style="color: #ccc; margin-left:4px">10</span>
                                </div>
                                <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart"><i class="fa-solid fa-cart-plus"></i></button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    {{-- <li><a href="#"><i class="fa-solid fa-heart active like-product"></i>Add to wishlist</a></li> --}}
                    <li><a href="#" ><i class="fa-regular fa-heart like-product"></i>Yêu thích</a></li>
                    <li><a href="#" class=""><i class="fa-solid fa-down-left-and-up-right-to-center" style="color: rgb(115, 115, 241)"></i>So sánh</a></li>
                </ul>
            </div>
        </div>
        <div class="items-overlay"></div>
    </div>
    @endforeach
    
</div><!--product body-->

<div class="features_items"><!--features_items-->
    <p class="title">
        <span>Phụ kiện giá rẻ</span>
        <a href="{{URL::to('show-all-product/3')}}" class="show-all-phone">Xem tất cả phụ kiện</a>

    </p>
    @foreach ($accessories_product as $item =>$product)
    
    <div class="col-sm-3 product-main">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo">
                    <form>
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$product->product_quantity}}" class="check_product_qty_{{$product->product_id}}">

                        <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_img}}" class="cart_product_image_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_desc}}" class="cart_product_desc_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">


                        <a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}" class="link-product-details">
                        </a>
                        <img src="{{URL::to('public/upload/product/'.$product->product_img)}}" alt=""  style="height: 220px"/>
                        <div class="product-info-details">
                            <p>{{$product->product_name}}</p>
                            <div class="product-price-sold">
                                <span class="product-price">{{number_format($product->product_price,0,',','.')}}.đ</span>
                                <span class="product-sold">Đã bán 100</span>
                            </div>
                            <div class="product-rate-cart">
                                <div class="product-rate">
                                    <img style="width:75%; margin-top:0" src="{{asset('public/front-end/images/product-details/rating.png')}}" alt=""/>
                                    <span style="color: #ccc; margin-left:4px">10</span>
                                </div>
                                <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart"><i class="fa-solid fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    {{-- <li><a href="#"><i class="fa-solid fa-heart active like-product"></i>Add to wishlist</a></li> --}}
                    <li><a href="#" ><i class="fa-regular fa-heart like-product"></i>Yêu thích</a></li>
                    <li><a href="#" class=""><i class="fa-solid fa-down-left-and-up-right-to-center" style="color: rgb(115, 115, 241)"></i>So sánh</a></li>
                </ul>
            </div>
        </div>
        <div class="items-overlay"></div>
    </div>
    @endforeach
    
</div><!--product body-->

<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tshirt" data-toggle="tab">Đồng hồ thông minh</a></li>
            <li><a href="#blazers" data-toggle="tab">Trang sức</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="tshirt" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="https://cdn.tgdd.vn/Products/Images/7077/234918/se-40mm-vien-nhom-day-cao-su-den-thumb-600x600.jpg" alt="" />
                            <h3 class="text-primary">500.000 đ</h3>
                            <p  style="background: #f0f0f0">Sang trọng, lịch lãm</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="https://bizweb.dktcdn.net/thumb/large/100/095/515/products/1-4dc20b6a-77b7-48f6-9717-1a4a7c83c29a.png" alt="" />
                            <h3 class="text-primary">990.000 đ</h3>
                            <p style="background: #f0f0f0">Trẻ trung, năng động</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="https://cdn.tgdd.vn/Products/Images/7264/231809/elio-el071-01-nam-1-600x600.jpg" alt="" />
                            <h3 class="text-primary">990.000 đ</h3>
                            <p style="background: #f0f0f0">Trẻ trung, năng động</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="https://cdn.tgdd.vn/Products/Images/7264/269352/elio-ec004-02-nu-thumb-600x600.jpg" alt="" />
                            <h3 class="text-primary">990.000 đ</h3>
                            <p style="background: #f0f0f0">Trẻ trung, năng động</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="blazers" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="https://eropi.com/media/wysiwyg/bo_trang_suc/bo-trang-suc-bac-love-star_2_.JPG" alt="" />
                            <h3>$520</h3>
                            <p style="background: #f0f0f0">Trẻ trung, năng động</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/category-tab-->

@endsection