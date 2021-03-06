@extends('frontend.layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-start">
              @include('frontend.inc.user_side_nav')
              <div class="aiz-user-panel">
                  <div class="aiz-titlebar mt-2 mb-4">
                      <div class="row align-items-center">
                          <div class="col-md-6">
                              <b class="h4">{{ translate('Wishlist')}}</b>
                          </div>
                      </div>
                  </div>

                  <div class="row gutters-5">
                      @foreach ($wishlists as $key => $wishlist)
                          @if ($wishlist->product != null)
                              <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-sm-6" id="wishlist_{{ $wishlist->id }}">
                                  <div class="card mb-2 shadow-sm">
                                      <div class="card-body">
                                          <a href="{{ route('product', $wishlist->product->slug) }}" class="d-block mb-3">
                                              <img src="{{ uploaded_asset($wishlist->product->thumbnail_img) }}" class="img-fit h-140px h-md-200px">
                                          </a>

                                          <h5 class="fs-14 mb-0 lh-1-5 fw-600 text-truncate-2" style="
    font-style: italic;
    color: #676767
 !important;
">
                                              <a href="{{ route('product', $wishlist->product->slug) }}" class="text-reset">{{ $wishlist->product->getTranslation('name') }}</a>
                                          </h5>
                                          <div class="rating rating-sm mb-1">
                                              {{ renderStarRating($wishlist->product->rating) }}
                                          </div>
                                          <div class=" fs-14">
                                                @if(home_base_price($wishlist->product->id) != home_discounted_base_price($wishlist->product->id))
                                                    <del class="opacity-60 mr-1" style="color: #B57F2b !important;">{{ home_base_price($wishlist->product->id) }}</del>
                                                @endif
                                                    <span class="fw-600 text-primary" style="color: #B57F2b !important;">{{ home_discounted_base_price($wishlist->product->id) }}</span>
                                          </div>
                                      </div>
                                      <div class="card-footer">
                                          <a href="#" class="link link--style-3" data-toggle="tooltip" data-placement="top" title="Remove from wishlist" onclick="removeFromWishlist({{ $wishlist->id }})">
                                              <i class="la la-trash la-2x" style="
    color: #a57f2b;
"></i>
                                          </a>
                                          <button type="button" class="btn btn-sm btn-block btn-primary ml-3" style="background: #B57F2b !important;" onclick="showAddToCartModal({{ $wishlist->product->id }})">
                                              <i class="la la-shopping-cart mr-2"></i>{{ translate('Add to cart')}}
                                          </button>
                                      </div>
                                  </div>
                              </div>
                          @endif
                      @endforeach
                  </div>
                  <div class="aiz-pagination">
                      	{{ $wishlists->links() }}
                	</div>
              </div>
        </div>
    </div>
</section>
@endsection

@section('modal')

<div class="modal fade" id="addToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
        <div class="modal-content position-relative">
            <div class="c-preloader">
                <i class="fa fa-spin fa-spinner"></i>
            </div>
            <button type="button" class="close absolute-close-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div id="addToCart-modal-body">

            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        function removeFromWishlist(id){
            $.post('{{ route('wishlists.remove') }}',{_token:'{{ csrf_token() }}', id:id}, function(data){
                $('#wishlist').html(data);
                $('#wishlist_'+id).hide();
                AIZ.plugins.notify('success', '{{ translate('Item has been renoved from wishlist') }}');
            })
        }
    </script>
@endsection
