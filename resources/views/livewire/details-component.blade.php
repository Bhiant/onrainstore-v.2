<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>detail</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12 main-content-area">
                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery">
                          <ul class="slides">
                            <li data-thumb="{{ asset('front/assets/images/products') }}/{{$product->image}}">
                                <img src="{{ asset('front/assets/images/products') }}/{{$product->image}}" alt="{{$product->name}}" />
                            </li>
                            {{-- @php 
                                $images = explode(",",$product->images);
                            @endphp
                            @foreach ($images as $image)
                                @if($image)
                                    <li data-thumb="{{ asset('front/assets/images/products') }}/{{ $image }}">
                                        <img src="{{ asset('front/assets/images/products')}}/{{ $image }}" alt="{{ $product->name }}" />
                                    </li>
                                @endif
                            @endforeach --}}
                          </ul>
                        </div>
                    </div>
                    <div class="detail-info">
                        <h2 class="product-name">{{$product->name}}</h2>
                        <div class="short-desc">
                            <ul>
                                {{$product->SKU}}
                            </ul>
                        </div>
                        {{-- <div class="wrap-social">
                            <a class="link-socail" href="#"><img src="{{ asset('front/assets/images/social-list.png') }}" alt=""></a>
                        </div> --}}
                        <div class="wrap-price"><span class="product-price">Rp. {{$product->regular_price}}</span></div>
                        <div class="stock-info in-stock">
                            {{-- <p class="availability">Availability: <b>{{$product->stock_status}}</b></p> --}}
                            <p class="availability">Sisa Stock: <b>{{$product->quantity}}</b></p>
                        </div>
                        <div>
                            @foreach ($product->attributeValues->unique('product_attribute_id') as $av)
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-xs-2">
                                        <p>{{$av->productAttribute->name}}</p>
                                    </div>
                                    <div class="col-xs-10">
                                        <select class="form-control" style="width: 200px;" wire:model="satt.{{$av->productAttribute->name}}">
                                            @foreach ($av->productAttribute->attributeValues->where('product_id',$product->id) as $pav)
                                                <option value="{{$pav->value}}">{{$pav->value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                            @endforeach
                        </div>
                        <div class="quantity" style="margin-top: 10px;">
                            <span>Quantity:</span>
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" wire:model="qty" >
                                <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity"></a>
									<a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity"></a>
                            </div>
                        </div>
                        <div class="wrap-butons">
                            <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Add to Cart</a>
                            <div class="wrap">
                                <a href="{{route('user.copyproduct',['product_id'=>$product->id])}}" class="btn btn-app" style="margin-top: 10px;"><i class="fas fa-copy"></i> Copy Product</a>
                                {{-- <a href="#" class="btn btn-wishlist">Add Wishlist</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#description" class="tab-control-item active">description</a>
                            {{-- <a href="#add_infomation" class="tab-control-item">Addtional Infomation</a> --}}
                        </div>
                        
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                {{$product->description}}
                            </div>
                            {{-- <div class="tab-content-item " id="add_infomation">
                                <table class="shop_attributes">
                                    <tbody>
                                        <tr>
                                            <th>Weight</th><td class="product_weight">1 kg</td>
                                        </tr>
                                        <tr>
                                            <th>Dimensions</th><td class="product_dimensions">12 x 15 x 23 cm</td>
                                        </tr>
                                        <tr>
                                            <th>Color</th><td><p>Black, Blue, Grey, Violet, Yellow</p></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> --}}
                        </div>
                        
                    </div>
                </div>
            </div><!--end main products area-->
            </div><!--end sitebar-->
        </div><!--end row-->
    </div><!--end container-->
</main>