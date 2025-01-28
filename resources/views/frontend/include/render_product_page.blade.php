@if ( $products->count() > 0 )

    <div class="tf-grid-layout tf-col-4" id="gridLayout" style="">
        @foreach ($products as $row)

            <div class="swiper-slide">
                <div class="card-product wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card-product-wrapper">
                        <a href="{{ route('product.details', $row->slug) }}" class="product-img">
                            <img class="lazyload img-product" data-src="{{ asset($row->thumb_image) }}" src="{{ asset($row->thumb_image) }}" alt="{{ $row->slug }}">

                            @php
                                $image = App\Models\ProductImage::where('product_id', $row->id)->first();

                                $discount = '';
                                if( checkDiscount($row) ){
                                    if ( !empty($row->discount_type === "amount" ) ){
                                        $discount = '-'. $row->discount_value . "Tk";
                                    }   
                                    else if( $row->discount_type === "percent" ){
                                        $discount = '-'. $row->discount_value . "%";
                                    }
                                }
                            @endphp

                            @if (!empty($image))
                                <img class="lazyload img-hover" data-src="{{ asset($image->images) }}" src="{{ asset($image->images) }}" alt="{{ $row->slug }}">
                            @endif
                        </a>
                        <div class="on-sale-wrap">
                            <span class="on-sale-item">
                                {{ $discount }}
                            </span>
                        </div>


                        @if ( checkDiscount($row) )
                            @if ( !empty($row->discount_type === "amount") || !empty($row->discount_type === "percent") )
                                <div class="marquee-product bg-main">
                                    <div class="marquee-wrapper">
                                        <div class="initial-child-container">
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="marquee-wrapper">
                                        <div class="initial-child-container">
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                            </div>
                                            <div class="marquee-child-item">
                                                <p class="font-2 text-btn-uppercase fw-6 text-white">Hot Sale {{ $discount }} OFF</p>
                                            </div>
                                            <div class="marquee-child-item">
                                                <ion-icon name="flash-outline" class="text-critical"></ion-icon>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif

                        
                        <div class="list-product-btn">
                            <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                <i class='bx bx-heart' style="font-size: 24px;"></i>
                                <span class="tooltip">Wishlist</span>
                            </a>
                            <a href="#compare" data-bs-toggle="offcanvas" aria-controls="compare" class="box-icon compare btn-icon-action">
                                <i class='bx bx-git-compare' style="font-size: 24px;"></i>
                                <span class="tooltip">Compare</span>
                            </a>
                            <a href="#quickView" data-id={{ $row->id }} data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                <ion-icon name="eye-outline" style="font-size: 24px;"></ion-icon>
                                <span class="tooltip">Quick View</span>
                            </a>
                        </div>
                        <div class="list-btn-main">
                            <a href="#quickAdd" data-id={{ $row->id }} data-bs-toggle="modal" class="btn-main-product quickAdd">Quick Add</a>
                        </div>
                    </div>


                    <div class="card-product-info">
                        <a href="{{ route('product.details', $row->slug) }}" class="title link">{{ $row->name }}</a>
                        <div class="box-rating">
                            <ul class="list-star">
                                <li class="bx bxs-star" style="color: #F0A750;"></li>
                                <li class="bx bxs-star" style="color: #F0A750;"></li>
                                <li class="bx bxs-star" style="color: #F0A750;"></li>
                                <li class="bx bxs-star" style="color: #F0A750;"></li>
                                <li class="bx bx-star" style="color: #F0A750;"></li>
                            </ul>
                            <span class="text-caption-1 text-secondary">(1.234)</span>
                        </div>

                        @if ( checkDiscount($row) )
                            @if ( !empty($row->discount_type === "amount") )
                                <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $row->discount_value }}</span>
                            @elseif( !empty($row->discount_type === "percent") )
                            @php
                                $discount_val = $row->selling_price * $row->discount_value / 100;
                            @endphp
                                <span class="price"><span class="old-price">${{ $row->selling_price }}</span> ${{ $row->selling_price - $discount_val }}</span>
                            @else
                                <span class="price"> ${{ $row->selling_price }}</span>
                            @endif
                        @else
                            <span class="price"> ${{ $row->selling_price }}</span>
                        @endif

                        <div class="box-progress-stock">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="stock-status d-flex justify-content-between align-items-center">
                                <div class="stock-item text-caption-1">
                                    <span class="stock-label text-secondary-2">Available:</span>
                                    <span class="stock-value">{{ $row->qty }}</span>
                                </div>
                                <div class="stock-item text-caption-1">
                                    <span class="stock-label text-secondary-2">Sold:</span>
                                    <span class="stock-value">{{ $row->product_sold }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

    <div class="pagination_page text-center">
        @if ($products->hasPages())
            {!! $products->withQueryString()->links() !!}
        @endif
    </div>

@else
    <div class="tf-grid-layout tf-col-1" id="gridLayout" style="">
        <div class="alert alert-danger alert-dismissible fade show px-4 mb-0 text-center" role="alert">
            <i class="bx bx-tired d-block display-4 mt-2 mb-3 text-danger"></i>
            {{-- <h5 class="text-danger">Warning</h5> --}}
            <p>There is no product item.</p>
        </div>
    </div>
@endif