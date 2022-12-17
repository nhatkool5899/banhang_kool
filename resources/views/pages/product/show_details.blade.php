@extends('layout')
@section('content')
@foreach ($product_details as $item => $pd_details)

<div class="product-details"><!--product-details-->
    
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0" nonce="uOv3RWts"></script>

    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{URL::to('upload/product/'.$pd_details->product_img)}}" alt="{{$pd_details->product_img}}" />
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            
              <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                      <a href=""><img src="{{asset('front-end/images/product-details/similar1.jpg')}}" alt=""></a>
                      <a href=""><img src="{{asset('front-end/images/product-details/similar2.jpg')}}" alt=""></a>
                      <a href=""><img src="{{asset('front-end/images/product-details/similar3.jpg')}}" alt=""></a>
                    </div>
                    <div class="item">
                      <a href=""><img src="{{asset('front-end/images/product-details/similar1.jpg')}}" alt=""></a>
                      <a href=""><img src="{{asset('front-end/images/product-details/similar2.jpg')}}" alt=""></a>
                      <a href=""><img src="{{asset('front-end/images/product-details/similar3.jpg')}}" alt=""></a>
                    </div>
                    <div class="item">
                      <a href=""><img src="{{asset('front-end/images/product-details/similar1.jpg')}}" alt=""></a>
                      <a href=""><img src="{{asset('front-end/images/product-details/similar2.jpg')}}" alt=""></a>
                      <a href=""><img src="{{asset('front-end/images/product-details/similar3.jpg')}}" alt=""></a>
                    </div>
                    
                </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
        </div>

    </div>
  
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="{{asset('front-end/images/product-details/new.jpg')}}" class="newarrival" alt="" />
            <h2>{{$pd_details->product_name}}</h2>
            <p>Mã SP: {{$pd_details->product_id}}</p>
            <img src="{{asset('front-end/images/product-details/rating.png')}}" alt="" />
            <form>
                {{ csrf_field() }}
                <input type="hidden" value="{{$pd_details->product_quantity}}" class="check_product_qty_{{$pd_details->product_id}}">

                <input type="hidden" value="{{$pd_details->product_id}}" class="cart_product_id_{{$pd_details->product_id}}">
                <input type="hidden" value="{{$pd_details->product_name}}" class="cart_product_name_{{$pd_details->product_id}}">
                <input type="hidden" value="{{$pd_details->product_img}}" class="cart_product_image_{{$pd_details->product_id}}">
                <input type="hidden" value="{{$pd_details->product_desc}}" class="cart_product_desc_{{$pd_details->product_id}}">
                <input type="hidden" value="{{$pd_details->product_price}}" class="cart_product_price_{{$pd_details->product_id}}">
                    {{-- <input type="hidden" value="1" class="cart_product_qty_{{$pd_details->product_id}}"> --}}
                <span>
                    <span>{{number_format($pd_details->product_price)}} VND</span>
                    <label>Số lượng:</label>
                    <input type="number" class="cart_product_qty_{{$pd_details->product_id}}" name="quantity" value="1" min="1"/>
                </span>
                <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$pd_details->product_id}}" name="add-to-cart" style="margin-bottom: 10px;display:block">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                </button>

            </form>

            <p><b>Màn hình:</b> IPS LCD6.1"Liquid Retina</p>
            <p><b>Hệ điều hành:</b> IOS 15</p>
            <p><b>Thương hiệu:</b> {{$pd_details->brand_name}}</p>
            <p><b>Danh mục:</b> {{$pd_details->category_name}}</p>
            <a href=""><img src="{{asset('front-end/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->

<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details-pd" data-toggle="tab">Chi tiết sản phẩm</a></li>
            <li><a href="#comment" data-toggle="tab">Bình luận</a></li>
            <li class=""><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details-pd" >
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            <p><b>Write Your Review</b></p>
            <p>{!!$pd_details->product_content!!}p>
        </div>
        
        <div class="tab-pane fade" id="comment" >
            <input type="hidden" value="{{$pd_details->product_id}}" class="comment_product_id">
            {{-- <input type="hidden" value="{{session()->get('customer_name')}}" class="customer_name"> --}}
            <form class="col-sm-12">
                {{ csrf_field() }}
                <label class="col-sm-2 control-label">Bình luận:</label>
                <div class="col-sm-6">
                    <textarea style="resize: none" class="form-control add_comment" name="add_comment" id="" cols="30" rows="5" placeholder="Nhập vào bình luận..."></textarea>
                </div>
                <div class="col-sm-2 col-sm-offset-6">
                    <input type="button" id="submit_comment" class="btn btn-primary pull-right" value="GỬI" style="padding: 6px 26px; margin-top:10px">
                </div>
            </form>

            <h4 style="margin: 10px;">Tất cả bình luận</h4>
            <div class="comment-body" id="comment_show" style="margin-bottom:50px">

            </div>


            
            {{-- comment bằng fb --}}
            {{-- <div class="fb-comments" data-href="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D350964513734855%26id%3D100076104369952%26substory_index%3D350964513734855&show_text=true&width=500"></div> --}}
        </div>

        <div class="tab-pane fade" id="reviews" >
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <div class="rating-body">
                    <form>
                        {{ csrf_field() }}
                        <h4 class="title-rating">Đánh giá ngay:</h4>
                        <ul class="list-inline rating" id="rating" title="Average Rating">
                            @for ($i = 1; $i <= 5; $i++)
                                @php
                                    if($i < $rating){
                                        $color ='color:#ffcc00';
                                    }else {
                                        $color = 'color:#ccc';
                                    }
                                @endphp
                            <li title="star_rating"
                            id="{{$pd_details->product_id}}-{{$i}}"
                            data-index="{{$i}}"
                            data-product_id="{{$pd_details->product_id}}"
                            data-rating="{{$rating}}"
                            class="rating"
                            style="cursor: pointer; {{$color}}; font-size:40px;font-weight:500">
                                &#9733;
                            </li>
    
                            @endfor
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!--/category-tab-->
@endforeach
<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Sản phẩm liên quan</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">	
                @foreach ($related_product as $item => $related_pd)
                <div class="col-sm-3 product-main">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo">
                                <form>
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{$related_pd->product_quantity}}" class="check_product_qty_{{$related_pd->product_id}}">
            
                                    <input type="hidden" value="{{$related_pd->product_id}}" class="cart_product_id_{{$related_pd->product_id}}">
                                    <input type="hidden" value="{{$related_pd->product_name}}" class="cart_product_name_{{$related_pd->product_id}}">
                                    <input type="hidden" value="{{$related_pd->product_img}}" class="cart_product_image_{{$related_pd->product_id}}">
                                    <input type="hidden" value="{{$related_pd->product_desc}}" class="cart_product_desc_{{$related_pd->product_id}}">
                                    <input type="hidden" value="{{$related_pd->product_price}}" class="cart_product_price_{{$related_pd->product_id}}">
                                    <input type="hidden" value="1" class="cart_product_qty_{{$related_pd->product_id}}">
            
            
                                    <a href="{{URL::to('chi-tiet-san-pham/'.$related_pd->product_id)}}" class="link-product-details">
                                    </a>
                                    <img src="{{URL::to('upload/product/'.$related_pd->product_img)}}" alt="" />
                                    <div class="product-info-details">
                                        <p>{{$related_pd->product_name}}</p>
                                        <div class="product-price-sold">
                                            <span class="product-price">{{number_format($related_pd->product_price,0,',','.')}}.đ</span>
                                            <span class="product-sold">Đã bán 100</span>
                                        </div>
                                        <div class="product-rate-cart">
                                            <div class="product-rate">
                                                <img style="width:75%; margin-top:0" src="{{asset('front-end/images/product-details/rating.png')}}" alt=""/>
                                                <span style="color: #ccc; margin-left:4px">10</span>
                                            </div>
                                            <button type="button" class="btn btn-default add-to-cart" data-id_product="{{$related_pd->product_id}}" name="add-to-cart"><i class="fa-solid fa-cart-plus"></i></button>
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
            </div>
            {{-- <div class="item">	
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="front-end/images/home/recommend1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
   
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>			
    </div>
</div><!--/recommended_items-->
@endsection