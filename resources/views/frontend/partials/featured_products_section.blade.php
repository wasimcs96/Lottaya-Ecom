<section class="mb-4">
    <div class="container mw-100">
        <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
            <div class="d-flex mb-3 align-items-baseline border-bottom justify-content-between">
                <h3 class="h5 fw-600 mb-0">
                    <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block homeheading"
                        style="font-style: italic;color: #B57F2F;">{{ translate('Featured Products') }}</span>
                </h3>
               <!-- <a href="#"  class="ml-auto mr-0 btn btn-primary btn-sm shadow-md w-100 w-md-auto"
                        style="background-color: transparent;border-color:  #A57F2B;color: #A57F2B;font-style: italic;">View More</a> -->
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm shadow-md" style="
    color: #B57F2F;
    background-color: white;
    font-style: italic;
    font-weight: 600;
    border: 1px solid #A57F2B;
    white-space: nowrap;
">View More</a>
            </div>
            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"
                data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
                @foreach (filter_products(\App\Product::where('published', 1)->where('featured', '1'))->limit(12)->get()
                as $key => $product)
                <div class="carousel-box">
                    <div class="aiz-card-box border border-light rounded hov-shadow-md my-2 has-transition">
                        <div class="position-relative">

                            <img class="img-fit lazyload mx-auto h-140px h-md-210px"
                                src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                data-src="{{ uploaded_asset($product->thumbnail_img) }}"
                                alt="{{  $product->getTranslation('name')  }}"
                                onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                            </a>
                            <div class="absolute-top-right aiz-p-hov-icon" style="left: 65%;top: 0;">
                                <a href="javascript:void(0)" onclick="addToWishList({{ $product->id }})"
                                    data-toggle="tooltip" data-title="{{ translate('Add to wishlist') }}"
                                    data-placement="left">
                                    <i class="la la-heart-o"></i>
                                </a>
                                <!-- <a href="javascript:void(0)" onclick="addToCompare({{ $product->id }})"
                                    data-toggle="tooltip" data-title="{{ translate('Add to compare') }}"
                                    data-placement="left">
                                    <i class="las la-sync"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})"
                                    data-toggle="tooltip" data-title="{{ translate('Add to cart') }}"
                                    data-placement="left">
                                    <i class="las la-shopping-cart"></i>
                                </a> -->
                            </div>
                        </div>
                        <div class="p-md-3 p-2 text-left">
                            <h3 class="fw-600 fs-13 text-truncate-2 lh-1-4 mb-0 h-35px">
                                <a href="{{ route('product', $product->slug) }}" class="d-block text-reset" style="
    font-style: italic;
    color: #676767
 !important;
">{{  $product->getTranslation('name')  }}</a>
                            </h3>
                            <br>
                            <div class="fs-15" style="color: #B57F2F;">
                            <span class="fw-700 text-primary"
                                    style="color: #B57F2F !important;font-size: 3vh;">{{home_discounted_base_price($product->id)}}</span> <br>
                                @if(home_base_price($product->id) != home_discounted_base_price($product->id))
                                <del class="fw-600 opacity-50 mr-1">{{ home_base_price($product->id) }}</del>-<span>{{$product->discount_percentage}}%</span>
                                @endif
                                <br>
                                
                            </div>
                            <div class="rating rating-sm mt-1">
                                {{ renderStarRating($product->rating) }}
                                <a href="javascript:void(0)" onclick="showAddToCartModal({{ $product->id }})"
                                    data-toggle="tooltip" data-title="{{ translate('Buy Now') }}" data-placement="left">
                                    <button style="
    color: #B57F2F !important;
    border-color: #B57F2F !important;
    font-style: italic;
    width: fit-content;
    background-color: #FFFAF6;
">Add to Cart</button>
                                </a>

                            </div>


                            @if (\App\Addon::where('unique_identifier', 'club_point')->first() != null &&
                            \App\Addon::where('unique_identifier', 'club_point')->first()->activated)
                            <div class="rounded px-2 mt-2 bg-soft-primary border-soft-primary border">
                                {{ translate('Club Point') }}:
                                <span class="fw-700 float-right">{{ $product->earn_point }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>