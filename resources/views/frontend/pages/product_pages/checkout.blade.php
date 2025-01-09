@extends('frontend.layout.master')

@push('add-meta')
    <title>Sazao || About-us Template</title>
@endpush

@push('add-css')
    <link rel="stylesheet" href="{{ asset('public/frontend/css/select2.min.css') }}">
@endpush


@section('body-content')

<!-- page-title -->
<div class="page-title" style="background-image: url({{ asset('public/frontend/images/section/page-title.jpg') }});">
    <div class="container">
        <h3 class="heading text-center">Check Out</h3>
        <ul class="breadcrumbs d-flex align-items-center justify-content-center">
            <li><a class="link" href="index.html">Homepage</a></li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li><a class="link" href="shop-default-grid.html">Shop</a></li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>View Cart</li>
        </ul>
    </div>
</div>
<!-- /page-title -->


<!-- Section checkout -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="flat-spacing tf-page-checkout">
                    <div class="wrap">
                        <div class="title-login">
                            <p>Already have an account?</p>
                            <a href="login.html" class="text-button">Login here</a>
                        </div>
                        <form class="login-box">
                            <div class="grid-2">
                                <input type="text" placeholder="Your name/Email">
                                <input type="password" placeholder="Password">
                            </div>
                            <button class="tf-btn" type="submit"><span class="text">Login</span></button>
                        </form>
                    </div>

                    <div class="wrap">
                        <h5 class="title">Information</h5>
                        <form class="info-box">
                            <div class="grid-2">
                                <input type="text" placeholder="First Name*">
                                <input type="text" placeholder="Last Name*">
                            </div>
                            <div class="grid-2">
                                <input type="text" placeholder="Email Address*">
                                <input type="text" placeholder="Phone Number*">
                            </div>
                            <div class="tf-select">
                                <select class="text-title" name="address[country]" data-default="">
                                    <option selected value="Choose Country/Region" data-provinces="[]">Choose Country/Region</option>
                                    <option value="United States" data-provinces="[['Alabama','Alabama'],['Alaska','Alaska'],['American Samoa','American Samoa'],['Arizona','Arizona'],['Arkansas','Arkansas'],['Armed Forces Americas','Armed Forces Americas'],['Armed Forces Europe','Armed Forces Europe'],['Armed Forces Pacific','Armed Forces Pacific'],['California','California'],['Colorado','Colorado'],['Connecticut','Connecticut'],['Delaware','Delaware'],['District of Columbia','Washington DC'],['Federated States of Micronesia','Micronesia'],['Florida','Florida'],['Georgia','Georgia'],['Guam','Guam'],['Hawaii','Hawaii'],['Idaho','Idaho'],['Illinois','Illinois'],['Indiana','Indiana'],['Iowa','Iowa'],['Kansas','Kansas'],['Kentucky','Kentucky'],['Louisiana','Louisiana'],['Maine','Maine'],['Marshall Islands','Marshall Islands'],['Maryland','Maryland'],['Massachusetts','Massachusetts'],['Michigan','Michigan'],['Minnesota','Minnesota'],['Mississippi','Mississippi'],['Missouri','Missouri'],['Montana','Montana'],['Nebraska','Nebraska'],['Nevada','Nevada'],['New Hampshire','New Hampshire'],['New Jersey','New Jersey'],['New Mexico','New Mexico'],['New York','New York'],['North Carolina','North Carolina'],['North Dakota','North Dakota'],['Northern Mariana Islands','Northern Mariana Islands'],['Ohio','Ohio'],['Oklahoma','Oklahoma'],['Oregon','Oregon'],['Palau','Palau'],['Pennsylvania','Pennsylvania'],['Puerto Rico','Puerto Rico'],['Rhode Island','Rhode Island'],['South Carolina','South Carolina'],['South Dakota','South Dakota'],['Tennessee','Tennessee'],['Texas','Texas'],['Utah','Utah'],['Vermont','Vermont'],['Virgin Islands','U.S. Virgin Islands'],['Virginia','Virginia'],['Washington','Washington'],['West Virginia','West Virginia'],['Wisconsin','Wisconsin'],['Wyoming','Wyoming']]">United States</option>
                                    <option value="Australia" data-provinces="[['Australian Capital Territory','Australian Capital Territory'],['New South Wales','New South Wales'],['Northern Territory','Northern Territory'],['Queensland','Queensland'],['South Australia','South Australia'],['Tasmania','Tasmania'],['Victoria','Victoria'],['Western Australia','Western Australia']]">Australia</option>
                                    <option value="Austria" data-provinces="[]">Austria</option>
                                    <option value="Belgium" data-provinces="[]">Belgium</option>
                                    <option value="Canada" data-provinces="[['Alberta','Alberta'],['British Columbia','British Columbia'],['Manitoba','Manitoba'],['New Brunswick','New Brunswick'],['Newfoundland and Labrador','Newfoundland and Labrador'],['Northwest Territories','Northwest Territories'],['Nova Scotia','Nova Scotia'],['Nunavut','Nunavut'],['Ontario','Ontario'],['Prince Edward Island','Prince Edward Island'],['Quebec','Quebec'],['Saskatchewan','Saskatchewan'],['Yukon','Yukon']]">Canada</option>
                                    <option value="Czech Republic" data-provinces="[]">Czechia</option>
                                    <option value="Denmark" data-provinces="[]">Denmark</option>
                                    <option value="Finland" data-provinces="[]">Finland</option>
                                    <option value="France" data-provinces="[]">France</option>
                                    <option value="Germany" data-provinces="[]">Germany</option>
                                    <option value="Hong Kong" data-provinces="[['Hong Kong Island','Hong Kong Island'],['Kowloon','Kowloon'],['New Territories','New Territories']]">Hong Kong SAR</option>
                                    <option value="Ireland" data-provinces="[['Carlow','Carlow'],['Cavan','Cavan'],['Clare','Clare'],['Cork','Cork'],['Donegal','Donegal'],['Dublin','Dublin'],['Galway','Galway'],['Kerry','Kerry'],['Kildare','Kildare'],['Kilkenny','Kilkenny'],['Laois','Laois'],['Leitrim','Leitrim'],['Limerick','Limerick'],['Longford','Longford'],['Louth','Louth'],['Mayo','Mayo'],['Meath','Meath'],['Monaghan','Monaghan'],['Offaly','Offaly'],['Roscommon','Roscommon'],['Sligo','Sligo'],['Tipperary','Tipperary'],['Waterford','Waterford'],['Westmeath','Westmeath'],['Wexford','Wexford'],['Wicklow','Wicklow']]">Ireland</option>
                                    <option value="Israel" data-provinces="[]">Israel</option>
                                    <option value="Italy" data-provinces="[['Agrigento','Agrigento'],['Alessandria','Alessandria'],['Ancona','Ancona'],['Aosta','Aosta Valley'],['Arezzo','Arezzo'],['Ascoli Piceno','Ascoli Piceno'],['Asti','Asti'],['Avellino','Avellino'],['Bari','Bari'],['Barletta-Andria-Trani','Barletta-Andria-Trani'],['Belluno','Belluno'],['Benevento','Benevento'],['Bergamo','Bergamo'],['Biella','Biella'],['Bologna','Bologna'],['Bolzano','South Tyrol'],['Brescia','Brescia'],['Brindisi','Brindisi'],['Cagliari','Cagliari'],['Caltanissetta','Caltanissetta'],['Campobasso','Campobasso'],['Carbonia-Iglesias','Carbonia-Iglesias'],['Caserta','Caserta'],['Catania','Catania'],['Catanzaro','Catanzaro'],['Chieti','Chieti'],['Como','Como'],['Cosenza','Cosenza'],['Cremona','Cremona'],['Crotone','Crotone'],['Cuneo','Cuneo'],['Enna','Enna'],['Fermo','Fermo'],['Ferrara','Ferrara'],['Firenze','Florence'],['Foggia','Foggia'],['Forlì-Cesena','Forlì-Cesena'],['Frosinone','Frosinone'],['Genova','Genoa'],['Gorizia','Gorizia'],['Grosseto','Grosseto'],['Imperia','Imperia'],['Isernia','Isernia'],['L'Aquila','L’Aquila'],['La Spezia','La Spezia'],['Latina','Latina'],['Lecce','Lecce'],['Lecco','Lecco'],['Livorno','Livorno'],['Lodi','Lodi'],['Lucca','Lucca'],['Macerata','Macerata'],['Mantova','Mantua'],['Massa-Carrara','Massa and Carrara'],['Matera','Matera'],['Medio Campidano','Medio Campidano'],['Messina','Messina'],['Milano','Milan'],['Modena','Modena'],['Monza e Brianza','Monza and Brianza'],['Napoli','Naples'],['Novara','Novara'],['Nuoro','Nuoro'],['Ogliastra','Ogliastra'],['Olbia-Tempio','Olbia-Tempio'],['Oristano','Oristano'],['Padova','Padua'],['Palermo','Palermo'],['Parma','Parma'],['Pavia','Pavia'],['Perugia','Perugia'],['Pesaro e Urbino','Pesaro and Urbino'],['Pescara','Pescara'],['Piacenza','Piacenza'],['Pisa','Pisa'],['Pistoia','Pistoia'],['Pordenone','Pordenone'],['Potenza','Potenza'],['Prato','Prato'],['Ragusa','Ragusa'],['Ravenna','Ravenna'],['Reggio Calabria','Reggio Calabria'],['Reggio Emilia','Reggio Emilia'],['Rieti','Rieti'],['Rimini','Rimini'],['Roma','Rome'],['Rovigo','Rovigo'],['Salerno','Salerno'],['Sassari','Sassari'],['Savona','Savona'],['Siena','Siena'],['Siracusa','Syracuse'],['Sondrio','Sondrio'],['Taranto','Taranto'],['Teramo','Teramo'],['Terni','Terni'],['Torino','Turin'],['Trapani','Trapani'],['Trento','Trentino'],['Treviso','Treviso'],['Trieste','Trieste'],['Udine','Udine'],['Varese','Varese'],['Venezia','Venice'],['Verbano-Cusio-Ossola','Verbano-Cusio-Ossola'],['Vercelli','Vercelli'],['Verona','Verona'],['Vibo Valentia','Vibo Valentia'],['Vicenza','Vicenza'],['Viterbo','Viterbo']]">Italy</option>
                                    <option value="Japan" data-provinces="[['Aichi','Aichi'],['Akita','Akita'],['Aomori','Aomori'],['Chiba','Chiba'],['Ehime','Ehime'],['Fukui','Fukui'],['Fukuoka','Fukuoka'],['Fukushima','Fukushima'],['Gifu','Gifu'],['Gunma','Gunma'],['Hiroshima','Hiroshima'],['Hokkaidō','Hokkaido'],['Hyōgo','Hyogo'],['Ibaraki','Ibaraki'],['Ishikawa','Ishikawa'],['Iwate','Iwate'],['Kagawa','Kagawa'],['Kagoshima','Kagoshima'],['Kanagawa','Kanagawa'],['Kumamoto','Kumamoto'],['Kyōto','Kyoto'],['Kōchi','Kochi'],['Mie','Mie'],['Miyagi','Miyagi'],['Miyazaki','Miyazaki'],['Nagano','Nagano'],['Nagasaki','Nagasaki'],['Nara','Nara'],['Niigata','Niigata'],['Okayama','Okayama'],['Okinawa','Okinawa'],['Saga','Saga'],['Saitama','Saitama'],['Shiga','Shiga'],['Shimane','Shimane'],['Shizuoka','Shizuoka'],['Tochigi','Tochigi'],['Tokushima','Tokushima'],['Tottori','Tottori'],['Toyama','Toyama'],['Tōkyō','Tokyo'],['Wakayama','Wakayama'],['Yamagata','Yamagata'],['Yamaguchi','Yamaguchi'],['Yamanashi','Yamanashi'],['Ōita','Oita'],['Ōsaka','Osaka']]">Japan</option>
                                    <option value="Malaysia" data-provinces="[['Johor','Johor'],['Kedah','Kedah'],['Kelantan','Kelantan'],['Kuala Lumpur','Kuala Lumpur'],['Labuan','Labuan'],['Melaka','Malacca'],['Negeri Sembilan','Negeri Sembilan'],['Pahang','Pahang'],['Penang','Penang'],['Perak','Perak'],['Perlis','Perlis'],['Putrajaya','Putrajaya'],['Sabah','Sabah'],['Sarawak','Sarawak'],['Selangor','Selangor'],['Terengganu','Terengganu']]">Malaysia</option>
                                    <option value="Netherlands" data-provinces="[]">Netherlands</option>
                                    <option value="New Zealand" data-provinces="[['Auckland','Auckland'],['Bay of Plenty','Bay of Plenty'],['Canterbury','Canterbury'],['Chatham Islands','Chatham Islands'],['Gisborne','Gisborne'],['Hawke's Bay','Hawke’s Bay'],['Manawatu-Wanganui','Manawatū-Whanganui'],['Marlborough','Marlborough'],['Nelson','Nelson'],['Northland','Northland'],['Otago','Otago'],['Southland','Southland'],['Taranaki','Taranaki'],['Tasman','Tasman'],['Waikato','Waikato'],['Wellington','Wellington'],['West Coast','West Coast']]">New Zealand</option>
                                    <option value="Norway" data-provinces="[]">Norway</option>
                                    <option value="Poland" data-provinces="[]">Poland</option>
                                    <option value="Portugal" data-provinces="[['Aveiro','Aveiro'],['Açores','Azores'],['Beja','Beja'],['Braga','Braga'],['Bragança','Bragança'],['Castelo Branco','Castelo Branco'],['Coimbra','Coimbra'],['Faro','Faro'],['Guarda','Guarda'],['Leiria','Leiria'],['Lisboa','Lisbon'],['Madeira','Madeira'],['Portalegre','Portalegre'],['Porto','Porto'],['Santarém','Santarém'],['Setúbal','Setúbal'],['Viana do Castelo','Viana do Castelo'],['Vila Real','Vila Real'],['Viseu','Viseu'],['Évora','Évora']]">Portugal</option>
                                    <option value="Singapore" data-provinces="[]">Singapore</option>
                                    <option value="South Korea" data-provinces="[['Busan','Busan'],['Chungbuk','North Chungcheong'],['Chungnam','South Chungcheong'],['Daegu','Daegu'],['Daejeon','Daejeon'],['Gangwon','Gangwon'],['Gwangju','Gwangju City'],['Gyeongbuk','North Gyeongsang'],['Gyeonggi','Gyeonggi'],['Gyeongnam','South Gyeongsang'],['Incheon','Incheon'],['Jeju','Jeju'],['Jeonbuk','North Jeolla'],['Jeonnam','South Jeolla'],['Sejong','Sejong'],['Seoul','Seoul'],['Ulsan','Ulsan']]">South Korea</option>
                                    <option value="Spain" data-provinces="[['A Coruña','A Coruña'],['Albacete','Albacete'],['Alicante','Alicante'],['Almería','Almería'],['Asturias','Asturias Province'],['Badajoz','Badajoz'],['Balears','Balears Province'],['Barcelona','Barcelona'],['Burgos','Burgos'],['Cantabria','Cantabria Province'],['Castellón','Castellón'],['Ceuta','Ceuta'],['Ciudad Real','Ciudad Real'],['Cuenca','Cuenca'],['Cáceres','Cáceres'],['Cádiz','Cádiz'],['Córdoba','Córdoba'],['Girona','Girona'],['Granada','Granada'],['Guadalajara','Guadalajara'],['Guipúzcoa','Gipuzkoa'],['Huelva','Huelva'],['Huesca','Huesca'],['Jaén','Jaén'],['La Rioja','La Rioja Province'],['Las Palmas','Las Palmas'],['León','León'],['Lleida','Lleida'],['Lugo','Lugo'],['Madrid','Madrid Province'],['Melilla','Melilla'],['Murcia','Murcia'],['Málaga','Málaga'],['Navarra','Navarra'],['Ourense','Ourense'],['Palencia','Palencia'],['Pontevedra','Pontevedra'],['Salamanca','Salamanca'],['Santa Cruz de Tenerife','Santa Cruz de Tenerife'],['Segovia','Segovia'],['Sevilla','Seville'],['Soria','Soria'],['Tarragona','Tarragona'],['Teruel','Teruel'],['Toledo','Toledo'],['Valencia','Valencia'],['Valladolid','Valladolid'],['Vizcaya','Biscay'],['Zamora','Zamora'],['Zaragoza','Zaragoza'],['Álava','Álava'],['Ávila','Ávila']]">Spain</option>
                                    <option value="Sweden" data-provinces="[]">Sweden</option>
                                    <option value="Switzerland" data-provinces="[]">Switzerland</option>
                                    <option value="United Arab Emirates" data-provinces="[['Abu Dhabi','Abu Dhabi'],['Ajman','Ajman'],['Dubai','Dubai'],['Fujairah','Fujairah'],['Ras al-Khaimah','Ras al-Khaimah'],['Sharjah','Sharjah'],['Umm al-Quwain','Umm al-Quwain']]">United Arab Emirates</option>
                                    <option value="United Kingdom" data-provinces="[['British Forces','British Forces'],['England','England'],['Northern Ireland','Northern Ireland'],['Scotland','Scotland'],['Wales','Wales']]">United Kingdom</option>
                                    <option value="Vietnam" data-provinces="[]">Vietnam</option>
                                </select>
                            </div>
                            <div class="grid-2">
                                <input type="text" placeholder="Town/City*">
                                <input type="text" placeholder="Street,...">
                            </div>
                            <div class="grid-2">
                                <div class="tf-select">
                                    <select class="text-title" data-default="">
                                        <option selected value="Choose State">Choose State</option>
                                        <option value="California">California</option>
                                        <option value="Alabama">Alabam</option>
                                        <option value="Alaska">Alaska</option>
                                        <option value="Arizona">Arizona</option>
                                        <option value="Arkansas">Arkansas</option>
                                        <option value="Florida">Florida</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Washington">Washington</option>
                                        <option value="Texas">Texas</option>
                                        <option value="Iowa">Iowa</option>
                                        <option value="Nevada">Nevada</option>
                                        <option value="Illinois">Illinois</option>
                                    </select>
                                </div>
                                <input type="text" placeholder="Postal Code*">
                            </div>
                            <textarea placeholder="Write note..."></textarea>
                        </form>
                    </div>

                    <div class="wrap">
                        <h5 class="title">Choose payment Option:</h5>
                        <form class="form-payment">
                            <div class="payment-box" id="payment-box">
                                <div class="payment-item payment-choose-card active">
                                    <label for="credit-card-method" class="payment-header" data-bs-toggle="collapse" data-bs-target="#credit-card-payment" aria-controls="credit-card-payment">
                                        <input type="radio" name="payment-method" class="tf-check-rounded" id="credit-card-method" checked>
                                        <span class="text-title">Credit Card</span>
                                    </label>
                                    <div id="credit-card-payment" class="collapse show" data-bs-parent="#payment-box">
                                        <div class="payment-body">
                                            <p class="text-secondary">Make your payment directly into our bank account. Your order will not be shipped until the funds have cleared in our account.</p>
                                            <div class="input-payment-box">
                                                <input type="text" placeholder="Name On Card*">
                                                <div class="ip-card">
                                                    <input type="text" placeholder="Card Numbers*">
                                                    <div class="list-card">
                                                        <img src="images/payment/img-7.png" width="48" height="16" alt="card">
                                                        <img src="images/payment/img-8.png" width="21" height="16" alt="card">
                                                        <img src="images/payment/img-9.png" width="22" height="16" alt="card">
                                                        <img src="images/payment/img-10.png" width="24" height="16" alt="card">
                                                    </div>
                                                </div>
                                                <div class="grid-2">
                                                    <input type="date">
                                                    <input type="text" placeholder="CVV*">
                                                </div>
                                            </div>
                                            <div class="check-save">
                                                <input type="checkbox" class="tf-check" id="check-card" checked>
                                                <label for="check-card">Save Card Details</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="payment-item">
                                    <label for="delivery-method" class="payment-header collapsed" data-bs-toggle="collapse" data-bs-target="#delivery-payment" aria-controls="delivery-payment">
                                        <input type="radio" name="payment-method" class="tf-check-rounded" id="delivery-method">
                                        <span class="text-title">Cash on delivery</span>
                                    </label>
                                    <div id="delivery-payment" class="collapse" data-bs-parent="#payment-box"></div>
                                </div>
                                <div class="payment-item">
                                    <label for="apple-method" class="payment-header collapsed" data-bs-toggle="collapse" data-bs-target="#apple-payment" aria-controls="apple-payment">
                                        <input type="radio" name="payment-method" class="tf-check-rounded" id="apple-method">
                                        <span class="text-title apple-pay-title"><img src="images/payment/applePay.png" alt="apple"> Apple Pay</span>
                                    </label>
                                    <div id="apple-payment" class="collapse" data-bs-parent="#payment-box"></div>
                                </div>
                                <div class="payment-item paypal-item">
                                    <label for="paypal-method" class="payment-header collapsed" data-bs-toggle="collapse" data-bs-target="#paypal-method-payment" aria-controls="paypal-method-payment">
                                        <input type="radio" name="payment-method" class="tf-check-rounded" id="paypal-method">
                                        <span class="paypal-title"><img src="images/payment/paypal.png" alt="apple"></span>
                                    </label>
                                    <div id="paypal-method-payment" class="collapse" data-bs-parent="#payment-box"></div>
                                </div>
                            </div>
                            <button class="tf-btn btn-reset">Payment</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-1">
                <div class="line-separation"></div>
            </div>

            <div class="col-xl-5">
                <div class="flat-spacing flat-sidebar-checkout">
                    <div class="sidebar-checkout-content">
                        <h5 class="title">Shopping Cart</h5>
                        <div class="list-product" id="list_product">

                            @if ($cartItems->count() > 0)
                                @foreach ($cartItems as $item)
                                    @php
                                        $totalPrice = ($item->price + ($item->options->size_price ?? 0) + ($item->options->color_price ?? 0)) * $item->qty;

                                        $variant_price = ($item->price + ($item->options->size_price ?? 0) + ($item->options->color_price ?? 0));
                                    @endphp

                                    <div class="item-product checkout_product" id="checkout-{{ $item->rowId }}">
                                        <a href="{{ route('product.details', $item->options->slug) }}" class="img-product">
                                            <img src="{{ asset($item->options->image) }}" alt="{{ $item->slug }}">
                                        </a>

                                        <div class="content-box">
                                            <div class="info">
                                                <a href="{{ route('product.details', $item->options->slug) }}" class="name-product link text-title">{{ $item->name }}</a>

                                                <div class="variant text-caption-1 text-secondary"><span class="size">{{ strtoupper($item->options->size_name) }} ( ${{ $item->options->size_price }} )</span> / <span class="color">{{ $item->options->color_name }} ( ${{ $item->options->color_price }} )</span></div>

                                                <div class="wg-quantity">
                                                    <span class="btn-quantity product-decrease">-</span>
                                                    <input type="text" name="number" class="product_quantity" data-row_id="{{ $item->rowId }}" value="{{ $item->qty }}">
                                                    <span class="btn-quantity product-increase">+</span>
                                                </div>
                                            </div>

                                            <div class="total-price text-button" style="flex-direction: column">
                                                <div class="text-button tf-btn-remove remove checkout_remove_cart" data-row_id="{{ $item->rowId }}">Remove</div>

                                                <div class="">
                                                    <span class="count" data-row_id="{{ $item->rowId }}" id="qty{{ $item->rowId }}">{{ $item->qty }}</span>
                                                    <span class="x-mark">X</span>  <span class="price">${{ $variant_price }}</span>
                                                </div>

                                                <div id="{{ $item->rowId }}" class="cart_total text-button total_price">${{ $totalPrice }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-danger text-center" style="margin: 0 24px;" role="alert">
                                    <p class="mb-3">No items in the cart. </p>
                                    <a href="{{ route('checkout') }}" class="tf-btn btn-reset">Continue Shopping</a>
                                </div>
                            @endif
                        </div>

                        <div class="whole_discount_container">
                            <div class="group-discount" style="display: block;">
                                <div class="sec-discount">
                                    @if ( getCartTotal() > 0 )
                                        <div dir="ltr" class="swiper tf-sw-categories" data-preview="2.25" data-tablet="3" data-mobile-sm="2.5" data-mobile="1.2" data-space-lg="20" data-space-md="20" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
                                            <div class="swiper-wrapper">
                                                @foreach ($coupons as $item)
                                                    <div class="swiper-slide">
                                                        @if ( date('Y-m-d') >= $item->start_date && date('Y-m-d') <= $item->end_date && $item->quantity >= $item->total_used)
                                                            <div class="box-discount {{ $item->code }} {{ Session::has('coupon') && Session::get('coupon')['coupon_code'] === $item->code ? 'active' : '' }}">
                                                                <div class="discount-top">
                                                                    <div class="discount-off">
                                                                        <div class="text-caption-1">Discount</div>
                                                                        <span class="sale-off text-btn-uppercase">
                                                                            @if ( $item->discount_type === "amount" )
                                                                                ${{ $item->discount }} OFF
                                                                            @elseif( $item->discount_type === "percent")
                                                                                {{ $item->discount }}% OFF
                                                                            @endif
                                                                        </span>
                                                                    </div>

                                                                    <div class="discount-from">
                                                                        <p class="text-caption-1">For all orders <br> from <span class="main_cart_total">${{ getMainCartTotal() }}</span></p>
                                                                    </div>
                                                                </div>

                                                                <div class="discount-bot">
                                                                    <span class="text-btn-uppercase">{{ $item->code }}</span>
                                                                    <button type="button" class="tf-btn tf_btn_discount" data-code="{{ $item->code }}"><span class="text">Apply Code</span></button>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    <form class="coupon_form">
                                        @csrf
                    
                                        <div class="ip-discount-code">
                                            <input type="text" name="coupon_code" id="coupon_codes" placeholder="Add voucher discount"
                                            @if ( Session::has('coupon') )
                                                value="{{ Session::get('coupon')['coupon_code'] }}"
                                            @endif
                                            >
                                            <button type="submit" class="tf-btn"><span class="text">Apply Code</span></button>
                                        </div>
                                    </form>

                                    {{-- <p>Discount code is only used for orders with a total value of products over $500.00</p> --}}
                                </div>
                            </div>
                        </div>

                        <div class="sec-total-price">
                            <div class="top">
                                <div class="item d-flex align-items-center justify-content-between text-button">
                                    <span>Shipping</span>
                                    <span>Free</span>
                                </div>

                                <div class="item d-flex align-items-center justify-content-between text-button">
                                    <span>(-) Discounts
                                        <code class="percent_show">
                                            @if ( Session::has('coupon') && Session::get('coupon')['discount_type'] === "percent")
                                                ({{ Session::get('coupon')['discount'] }}%)
                                            @endif
                                        </code>
                                    </span>

                                    <span class="total_discount">
                                        @if ( Session::has('coupon') )
                                            @if ( Session::get('coupon')['discount_type'] === "amount")
                                                ${{ Session::get('coupon')['discount'] }}
                                            @elseif( Session::get('coupon')['discount_type'] === "percent" )
                                                ${{ ( getCartTotal() * Session::get('coupon')['discount'] ) / 100; }}
                                           @endif
                                        @else
                                            $0
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="bottom">
                                <h5 class="d-flex justify-content-between">
                                    <span>Total</span>
                                    <span class="total-price-checkout main_cart_total">${{ getMainCartTotal() }}</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Section checkout -->

@endsection

@push('add-js')

<script>
    $(document).ready(function(){
        //__ Product Quantity Increament __//
        $(document).on('click', '.product-increase', function() {
            let input = $(this).siblings('.product_quantity');
            let rowId = input.data('row_id');
            let quantity = parseInt(input.val()) || 0;
            quantity += 1; 
            input.val(quantity); 
            console.log(rowId);

            $.ajax({
                url: "{{ route('cart.update.quantity') }}",
                method: 'POST',
                data: {
                    quantity : quantity,
                    rowId    : rowId,
                },
                success: function(data) {
                    console.log(data);
                    if( data.status === 'success' ){ 
                        let productId = '#' + rowId;
                        let qtyId = '#qty' + rowId;
                        $(productId).text('$' + data.productTotal);
                        $(qtyId).text(data.productQty);

                        calculationCouponDiscount();
                        getSidebarCartTotal();
                        sidebarCartData();
                        toastr.success(data.message);
                    }
                    else if( data.status === 'error' ){
                        input.val(data.recent_stock);
                        sidebarCartData();
                        toastr.error(data.message);
                    }
                },
                error: function(err) {
                    console.log(err);
                },
            })
        })

        //__ Product Quantity Decrement __//
        $(document).on('click', '.product-decrease', function() {
            let input = $(this).siblings('.product_quantity');
            let rowId = input.data('row_id');
            let quantity = parseInt(input.val()) || 0;
            quantity -= 1; 
            if( quantity < 1 ){
                quantity = 1
            }
            input.val(quantity); 
            // console.log(rowId);

            $.ajax({
                url: "{{ route('cart.update.quantity') }}",
                method: 'POST',
                data: {
                    quantity : quantity,
                    rowId    : rowId,
                },
                success: function(data) {
                    // console.log(data);
                    if( data.status === 'success' ){ 
                        let productId = '#' + rowId;
                        let qtyId = '#qty' + rowId;
                        $(productId).text('$' + data.productTotal);
                        $(qtyId).text(data.productQty);

                        calculationCouponDiscount();
                        getSidebarCartTotal();
                        sidebarCartData();
                        toastr.success(data.message);
                    }
                    else if( data.status === 'stock_out' ){
                        toastr.error(data.message);
                    }
                },
                error: function(err) {
                    console.log(err);
                },
            })
        })

        //__ Single product clear __//
        $(document).on('click', '.remove_product_cart', function(e) {
            e.preventDefault();
            let id = $(this).data('id');    
            // console.log(id); 

            $.ajax({
                url: "{{ url('/cart/remove-product') }}/" + id,
                method: 'GET',
                dataType: 'json',
                data: { id: id },
                success: function(data) {
                    // console.log(data);
                    if( data.status === 'success' ){ 
                        calculationCouponDiscount();
                        getSidebarCartTotal();
                        let singleProductRemove = '#remove-' +id;
                        $(singleProductRemove).remove();

                        // Check if the table is empty and display the message
                        const tableBody = $('#cart-table-body');
                        if (tableBody.children('tr.tf-cart-item').length === 0) {
                            tableBody.html(`
                                <tr>
                                    <td colspan="5">
                                        <div class="alert alert-danger text-center" role="alert" style="margin: 0 24px;">
                                            <p class="mb-3">No items in the cart. </p>
                                            <a href="{{ route('checkout') }}" class="tf-btn btn-reset">Continue Shopping</a>
                                        </div>
                                    </td>
                                </tr>
                            `);

                            $('.tf-mini-cart-threshold').remove();
                            $('#tf-mini-cart-actions-field').remove();
                            $('#coupon_codes').val('');
                            $('.group-discount').remove();
                        }
                        
                        sidebarCartData();
                        getCartCount(); 
                        toastr.success(data.message);
                    }
                },
                error: function(err) {
                    console.log(err);
                },
            })
        })

        //__ Sidebar Single product clear __//
        $(document).on('click', '.side_remove_cart', function(e) {
            e.preventDefault();
            let id = $(this).data('row_id');    
            // console.log(id); 

            $.ajax({
                url: "{{ url('/cart/remove-product') }}/" + id,
                method: 'GET',
                dataType: 'json',
                data: { id: id },
                success: function(data) {
                    // console.log(data);
                    if( data.status === 'success' ){ 
                        getSidebarCartTotal();
                        let singleProductRemove = '#side_remove-' +id;
                        $(singleProductRemove).remove();

                        // Check if the table is empty and display the message
                        const tableBody = $('#cart-sidebar-table-body'); // Replace with the actual tbody ID or class
                        if (tableBody.children('.tf-mini-cart-item').length === 0) {
                            tableBody.html(`
                                <div class="alert alert-danger text-center" role="alert" style="margin: 0 24px;">
                                    <p class="mb-3">No items in the cart. </p>
                                    <a href="{{ route('checkout') }}" class="tf-btn btn-reset">Continue Shopping</a>
                                </div>
                            `);
                            $('.tf-mini-cart-threshold').remove();
                            $('#tf-mini-cart-actions-field').remove();
                            $('#coupon_codes').val('');
                            $('.group-discount').remove();
                        }
                        calculationCouponDiscount(); 
                        CheckoutPageData();
                        CartPageData();
                        getCartCount(); 
                        toastr.success(data.message);
                    }
                },
                error: function(err) {
                    console.log(err);
                },
            })
        })

        //__ Checkout product clear __//
        $(document).on('click', '.checkout_remove_cart', function (e) {
            e.preventDefault();

            // Extract the correct rowId without the prefix
            let rowId = $(this).data('row_id');

            $.ajax({
                url: "{{ url('/cart/remove-product') }}/" + rowId,
                method: 'GET',
                success: function (data) {
                    if (data.status === 'success') {
                        $(`#checkout-${rowId}`).remove();

                        // Check if the cart is empty and update accordingly
                        if ($('#list_product .checkout_product').length === 0) {
                            $('#list_product').html(`
                                <div class="alert alert-danger text-center" role="alert" style="margin: 0 24px;">
                                    <p class="mb-3">No items in the cart.</p>
                                    <a href="{{ route('checkout') }}" class="tf-btn btn-reset">Continue Shopping</a>
                                </div>
                            `);
                            $('.tf-mini-cart-threshold').remove();
                            $('#tf-mini-cart-actions-field').remove();
                            $('#coupon_codes').val('');
                            $('.group-discount').remove();
                        }

                        sidebarCartData();  
                        getSidebarCartTotal();
                        calculationCouponDiscount(); 
                        getCartCount(); 
                        CartPageData();
                        toastr.success(data.message);
                    }
                },
                error: function (err) {
                    console.error(err);
                    toastr.error('Failed to remove item from cart.');
                }
            });
        });

        // Fetch all cart data from Sidebar
        function sidebarCartData() {
            $.ajax({
                method: 'GET',
                url: "{{ route('get.sidebar.cart') }}",
                success: function(response) {
                    let cartHtml = '';

                    // Check if the cart is empty
                    if (response.isEmpty) {
                        cartHtml = `
                            <div class="alert alert-danger text-center" role="alert" style="margin: 0 24px;">
                                <p class="mb-3">No items in the cart.</p>
                                <a href="{{ route('checkout') }}" class="tf-btn btn-reset">Continue Shopping</a>
                            </div>
                        `;
                    } else {
                        // Loop through cart items if not empty
                        response.cartItems.forEach(item => {
                            cartHtml += `
                                <div class="tf-mini-cart-item file_delete" id="side_remove-${item.rowId}">
                                    <div class="tf-mini-cart-image">
                                        <img class="lazyload" data-src="${item.image}" src="${item.image}" alt="${item.slug}">
                                    </div>
                                    <div class="tf-mini-cart-info flex-grow-1">
                                        <div class="mb_12 d-flex align-items-center justify-content-between de-flex gap-12">
                                            <div class="text-title">
                                                <a href="/product-details/${item.slug}" class="link text-line-clamp-1">${item.name}</a>
                                            </div>
                                            <div class="text-button tf-btn-remove remove side_remove_cart" data-row_id="${item.rowId}">Remove</div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between de-flex gap-12">
                                            <div class="text-secondary-2">
                                                ${item.size_name ? item.size_name.toUpperCase() + ` ($${item.size_price})` : ''} 
                                                ${item.color_name ? ` / ${item.color_name} ($${item.color_price})` : ''}
                                            </div>
                                            <div class="text-button">${item.qty} X $${item.price}</div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between de-flex gap-12">
                                            <div class="text-secondary-2">Amount</div>
                                            <div class="text-button">$${item.total}</div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                    }

                    // Update the cart sidebar body
                    $('#cart-sidebar-table-body').html(cartHtml);
                    sidebarCartActionElement();
                },
                error: function(err) {
                    toastr.error('Failed to fetch cart data.');
                    console.log(err);
                }
            });
        }

        // Fetch all cart data for Cart Page
        function CartPageData(){
            $.ajax({
                method: 'GET',
                url: "{{ route('get.sidebar.cart') }}", // Update with your route
                success: function(response) {
                    if (response.status === true) {
                        let cartHtml = '';

                        if (response.isEmpty) {
                            // If cart is empty, display a message
                            cartHtml = `
                                <tr>
                                    <td colspan="5">
                                        <div class="alert alert-danger text-center" role="alert">
                                            <p class="mb-3">There is no cart item</p>
                                            <a href="{{ route('checkout') }}" class="tf-btn btn-reset">Continue Shopping</a>
                                        </div>
                                    </td>
                                </tr>
                            `;
                        } else {
                            // Loop through cart items and generate HTML
                            response.cartItems.forEach(item => {
                                cartHtml += `
                                    <tr class="tf-cart-item file-delete" id="remove-${item.rowId}">
                                        <td class="tf-cart-item_product">
                                            <a href="/product-details/${item.slug}" class="img-box">
                                                <img src="${item.image}" alt="${item.slug}">
                                            </a>
                                            <div class="cart-info">
                                                <a href="/product-details/${item.slug}" class="cart-title link">${item.name}</a>
                                                <div class="variant-box">
                                                    <div class="tf-select">
                                                        <div class="product_variant">
                                                            Color: ${item.color_name || 'N/A'} ($${item.color_price})
                                                        </div>
                                                    </div>
                                                    <div class="tf-select">
                                                        <div class="product_variant">
                                                            Size: ${item.size_name || 'N/A'} ($${item.size_price})
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-cart-title="Price" class="tf-cart-item_price text-center">
                                            <div class="cart_price text-button price_on_sale">$${item.price}</div>
                                        </td>
                                        <td data-cart-title="Quantity" class="tf-cart-item_quantity">
                                            <div class="wg-quantity mx-md-auto">
                                                <span class="btn-quantity product-decrease" data-row_id="${item.rowId}">-</span>
                                                <input type="text" name="number" class="product_quantity" data-row_id="${item.rowId}" value="${item.qty}">
                                                <span class="btn-quantity product-increase" data-row_id="${item.rowId}">+</span>
                                            </div>
                                        </td>
                                        <td data-cart-title="Total" class="tf-cart-item_total text-center">
                                            <div id="${item.rowId}" class="cart_total text-button total_price">$${item.total}</div>
                                        </td>
                                        <td class="remove-cart remove_item_alignemnt" id="remove_cart">
                                            <i class="icon bx bx-x icon-close-popup remove_product_cart" style="font-size: 20px;" data-id="${item.rowId}"></i>
                                        </td>
                                    </tr>
                                `;
                            });
                        }

                        // Update the cart table body
                        $('#cart-table-body').html(cartHtml);
                    }
                },
                error: function(err) {
                    toastr.error('Failed to fetch cart data.');
                    console.log(err);
                }
            });
        }

        // Fetch all cart data for Checkout Page
        function CheckoutPageData(){
            $.ajax({
                method: 'GET',
                url: "{{ route('get.sidebar.cart') }}", // Update with your route
                success: function(response) {
                    if (response.status === true) {
                        let cartHtml = '';

                        if (response.isEmpty) {
                            // If cart is empty, display a message
                            cartHtml = `
                                <div class="alert alert-danger text-center" role="alert" style="margin: 0 24px;">
                                    <p class="mb-3">No items in the cart.</p>
                                    <a href="{{ route('checkout') }}" class="tf-btn btn-reset">Continue Shopping</a>
                                </div>
                            `;
                        } else {
                            // Loop through cart items and generate HTML
                            response.cartItems.forEach(item => {
                                cartHtml += `
                                <div class="item-product checkout_product" id="${item.rowId}">
                                        <a href="/product-details/${item.slug}" class="img-product">
                                            <img src="${item.image}" alt="${item.slug}">
                                        </a>

                                        <div class="content-box">
                                            <div class="info">
                                                <a href="/product-details/${item.slug}" class="name-product link text-title">${item.name}</a>

                                                <div class="variant text-caption-1 text-secondary"><span class="size">${item.color_name || 'N/A'} ( $${item.color_price} )</span> / <span class="color">${item.size_name || 'N/A'} ( $${item.size_price} )</span></div>

                                                <div class="wg-quantity">
                                                    <span class="btn-quantity product-decrease">-</span>
                                                    <input type="text" name="number" class="product_quantity" data-row_id="${item.rowId}" value="${item.qty}">
                                                    <span class="btn-quantity product-increase">+</span>
                                                </div>
                                            </div>

                                            <div class="total-price text-button" style="flex-direction: column">
                                                <div class="text-button tf-btn-remove remove checkout_remove_cart" data-row_id="${item.rowId}">Remove</div>

                                                <div class="">
                                                    <span class="count" data-row_id="${item.rowId}" id="qty${item.rowId}">1</span>
                                                    <span class="x-mark">X</span>  <span class="price">$2450</span>
                                                </div>

                                                <div id="${item.rowId}" class="cart_total text-button total_price">$2450</div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });
                        }

                        // Update the cart table body
                        $('#list_product').html(cartHtml);
                    }
                },
                error: function(err) {
                    toastr.error('Failed to fetch cart data.');
                    console.log(err);
                }
            });
        }

        //__ Clear all Cart data __//
        $('#clear_cart').on('click', function(e){
            e.preventDefault();

            swal.fire({
                title: "Are you sure?",
                text: "This action will clear your cart!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('clear.cart') }}",
                        method: 'GET',
                        success: function(data) {
                            // console.log(data);
                            if( data.status === 'success' ){ 
                                calculationCouponDiscount();
                                getSidebarCartTotal();
                                $('.tf-cart-item').remove();

                                // Check if the table is empty and display the message
                                const tableBody = $('#cart-table-body'); // Replace with the actual tbody ID or class
                                if (tableBody.children('tr.tf-cart-item').length === 0) {
                                    tableBody.html(`
                                        <tr>
                                            <td colspan="5">
                                                <div class="alert alert-danger text-center"  role="alert" style="margin: 0 24px;">
                                                    <p class="mb-3">No items in the cart. </p>
                                                    <a href="{{ route('checkout') }}" class="tf-btn btn-reset">Continue Shopping</a>
                                                </div>
                                            </td>
                                        </tr>
                                    `);
                                    
                                    $('.tf-mini-cart-threshold').remove();
                                    $('#tf-mini-cart-actions-field').remove();
                                    $('#coupon_codes').val('');
                                    $('.group-discount').remove();
                                }
                                sidebarCartData();
                                getCartCount();
                                toastr.success(data.message);
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        },
                    })
                } 
                else {
                    swal.fire('Your cart data is safe');
                }
            })
        })

        //__ Cart subTotal __//
        function getSidebarCartTotal(){
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.sidebar-product-total') }}",
                success: function(data) {
                    console.log('get total', data);
                    if( data.status === 'success' ){
                       $('.tf-totals-total-value').text('$' + data.total);
                       $('.subTotal').text('$' + data.total);
                    //    $('.main_cart_total').text('$' + data.total);
                    }
                },
                error: function(data) {
                    console.log('Error adding product to cart:', data);
                },
            });
        }

        //__ Sidebar Cart Element __//
        function sidebarCartActionElement(){
            $('.mini-cart-actions').html(`
                <div id="tf-mini-cart-actions-field">
                    <div class="tf-cart-checkbox">
                        <div class="tf-checkbox-wrapp">
                            <input class="" type="checkbox" id="CartDrawer-Form_agree" name="agree_checkbox">
                            <div>
                                <i class="icon-check"></i>
                            </div>
                        </div>
                        <label for="CartDrawer-Form_agree">
                            I agree with 
                            <a href="term-of-use.html" title="Terms of Service">Terms & Conditions</a>
                        </label>
                    </div>

                    <div class="tf-mini-cart-view-checkout">
                        <a href="{{ route('show-cart') }}" class="tf-btn w-100 btn-white radius-4 has-border"><span class="text">View cart</span></a>
                        <a href="{{ route('checkout') }}" class="tf-btn w-100 btn-fill radius-4"><span class="text">Check Out</span></a>
                    </div>

                    <div class="text-center">
                        <a class="link text-btn-uppercase" href="shop-default-grid.html">Or continue shopping</a>
                    </div>    
                </div>
            `);
        }

        //__ Cart Count __//
        function getCartCount(){
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.count') }}",
                success: function(data) {
                    console.log(data);
                    if( data.status === 'success' ){
                       $('.count-box').text(data.cartCount);
                    }
                },
                error: function(data) {
                    // console.log('Error adding product to cart:', data);
                },
            });
        }

        //__ Coupon Apply __//
        $(document).on('submit', '.coupon_form', function(e){
            e.preventDefault();
            let formdata = $(this).serialize(); 
            console.log(formdata);

            $.ajax({
                url: "{{ route('apply.coupon') }}",
                method: 'POST',
                data: formdata,
                success: function(data) {
                    console.log(data);
                    if (data.status === 'success') {
                        calculationCouponDiscount();
                        toastr.success(data.message);

                        // Activate the matching discount box
                        const appliedCouponCode = $('input[name="coupon_code"]').val();
                        $('.box-discount').removeClass('active'); 
                        $(`.box-discount.${appliedCouponCode}`).addClass('active'); 
                    } else if (data.status === 'error') {
                        toastr.error(data.message);
                    }
                },
                error: function(err) {
                    console.log(err);
                },
            })
        })

        //__ Calculate Coupon function __//
        function calculationCouponDiscount(){
            $.ajax({
                url: "{{ route('coupon.calculation') }}",
                method: 'GET',
                success: function(data) {
                    // console.log(data.cart_total, data.discount);
                    if( data.status === 'success' ){ 
                        $('.total_discount').text('$'+ data.discount);
                        $('.main_cart_total').text('$'+ data.cart_total);
                        $('.main_cart_total').text('$'+ data.cart_total);

                        if( data.discount_type === "percent" ){
                            $('.percent_show').text('(' + data.discount_percent + '%)');
                        }
                        else{
                            $('.percent_show').text('');
                        }
                    }
                },
                error: function(err) {
                    console.log(err);
                },
            })
        }

        //__ Coupon select function __//
        $(document).on('click', '.tf_btn_discount', function(e){
            e.preventDefault();
            let code = $(this).data('code');
            $('#coupon_codes').val(code);
        })

       //__ Quick View Cart __//
       $('.quickview').click(function (e) {
           e.preventDefault(); // Prevent default behavior if necessary
           var id = $(this).data('id'); // Use `data-id` attribute

           $.ajax({
               type: "GET",
               url: "{{ route('cart.quick.view') }}",
               data: { id: id }, // Pass `id` as a key-value pair
               success: function (res) {
                   // console.log(res); // Handle response
                   var product = res.product;

                   $('#modal_qty').val(1);
                   $('#product_id').val(`${product.id}`);
                   $('#thumb_image').html(res.main_image);
                   $('#category_name').text(`${product.cat_name}`);
                   $('#product_name').text(`${product.name}`);
                   $('#sold_product').text(`${product.product_sold}`);
                   $('.tf-product-info-price').html(res.price_val);
                   $('#short_desc').text(`${product.short_description}`);
                   $('#product_view').text(`${product.product_view}`);
                   // $('.total_price').text('$' + res.product_price);

                   var imagesHtml = '';

                   // Loop through the images array
                   res.multi_images.forEach(function (image) {
                       imagesHtml += `
                           <div class="quickView-item item-scroll-quickview" data-scroll-quickview="beige">
                               <img class="lazyload" data-src="${image}" src="${image}" alt="">
                           </div>
                       `;
                   });

                   $('.multiple_image').html(imagesHtml);


                    if (res.product_color && res.product_color.length > 0) {
                        var colorsHtml = '';

                       // Loop through the product_color array
                       res.product_color.forEach(function (color, index) {
                           colorsHtml += `
                               <div class="">
                                   <input id="color${color.id}" type="radio" data-price="${color.color_price}" name="color_id" value="${color.id}" ${index === 0 ? 'checked' : ''}>
                                   <label class="hover-tooltip tooltip-bot radius-60 color-btn  color_show ${index === 0 ? 'active' : ''}" 
                                       data-slide="0" 
                                       data-price="${color.color_price || ''}" 
                                       for="color${color.id}" 
                                       data-value="${color.color_name}" 
                                       data-scroll-quickview="${color.color_name.toLowerCase()}"
                                       >
                                       <span class="btn-checkbox" style="background-color:${color.color_code || ''}"></span>
                                       <span class="tooltip">${color.color_name} ( TK ${color.color_price} )</span>
                                   </label>
                               </div>
                           `;
                       });

                       $('#color_variant').html(colorsHtml);

                       // Dynamically set the first color name in the text-title span
                       var firstColor = res.product_color[0]; // Get the first color
                       $('.text-title.color_variant').text(firstColor.color_name);
                    } else {
                       $('#color_variant').html('<p>No colors available for this product.</p>');
                       $('.text-title.color_variant').text('No Color');
                    }

                    if (res.product_sizes && res.product_sizes.length > 0) {
                        var sizesHtml = '';

                        // Loop through the product_sizes array
                        res.product_sizes.forEach(function (size, index) {
                            sizesHtml += `
                                <div class="">
                                    <input type="radio" name="size_id" data-price="${size.size_price}" id="size${size.id}" value="${size.id}" ${index === 0 ? 'checked' : ''}>
                                    <label class="hover-tooltip tooltip-bot style-text size-btn" for="size${size.id}" data-value="${size.size_name.toUpperCase()}" data-size-price="${size.size_price}">
                                        <span class="text-title">${size.size_name.toUpperCase()}</span>
                                        <span class="tooltip">${size.size_name} ( TK ${size.size_price} )</span>
                                    </label>
                                </div>
                            `;
                        });

                        // Update the size container
                        $('#size_variant').html(sizesHtml);

                        // Dynamically set the first size name in the text-title span
                        var firstSize = res.product_sizes[0]; // Get the first size
                        $('.text-title.size_variant').text(firstSize.size_name.toUpperCase());
                    } else {
                        // Handle the case where no sizes are available
                        $('#size_variant').html('');
                        $('.text-title.size_variant').text('No Size');
                    }
               },
               error: function (err) {
                   console.log(err);
               }
           });
       });

       //__ Quick Add Cart __//
       $('.quickAdd').click(function (e) {
           e.preventDefault(); // Prevent default behavior if necessary
           var id = $(this).data('id'); // Use `data-id` attribute

           $.ajax({
               type: "GET",
               url: "{{ route('cart.quick.view') }}",
               data: { id: id }, // Pass `id` as a key-value pair
               success: function (res) {
                   // console.log(res); // Handle response
                   var product = res.product;

                   $('#quick_add_qty').val(1);
                   $('#quick_product_id').val(`${product.id}`);
                   $('#quick_thumb_image').html(res.main_image);
                   $('#quick_product_name').text(`${product.name}`);
                   $('.tf-product-info-price').html(res.price_val);

                   if (res.product_color && res.product_color.length > 0) {
                        var colorsHtml = '';

                       // Loop through the product_color array
                       res.product_color.forEach(function (color, index) {
                           colorsHtml += `
                               <div class="mb-2">
                                   <input id="color${color.id}" type="radio" data-price="${color.color_price}" name="color_id" value="${color.id}" ${index === 0 ? 'checked' : ''}>
                                   <label class="hover-tooltip tooltip-bot radius-60 color-btn  color_show ${index === 0 ? 'active' : ''}" 
                                       data-slide="0" 
                                       data-price="${color.color_price || ''}" 
                                       for="color${color.id}" 
                                       data-value="${color.color_name}" 
                                       data-scroll-quickview="${color.color_name.toLowerCase()}"
                                       >
                                       <span class="btn-checkbox" style="background-color:${color.color_code || ''}"></span>
                                       <span class="tooltip">${color.color_name} ( TK ${color.color_price} )</span>
                                   </label>
                               </div>
                           `;
                       });

                       $('#quick_color_variant').html(colorsHtml);

                       // Dynamically set the first color name in the text-title span
                       var firstColor = res.product_color[0]; // Get the first color
                       $('.text-title.color_variant').text(firstColor.color_name);
                   } else {
                       $('#color_variant').html('<p>No colors available for this product.</p>');
                       $('.text-title.color_variant').text('No Color');
                   }
                   

                    if (res.product_sizes && res.product_sizes.length > 0) {
                       var sizesHtml = '';

                       // Loop through the product_sizes array
                       res.product_sizes.forEach(function (size, index) {
                           sizesHtml += `
                               <div class="mb-2">
                                   <input type="radio" name="size_id" data-price="${size.size_price}" id="size${size.id}" value="${size.id}" ${index === 0 ? 'checked' : ''}>
                                   <label class="hover-tooltip tooltip-bot style-text size-btn for="size${size.id}" data-value="${size.size_name.toUpperCase()}" data-size-price="${size.size_price}" >
                                       <span class="text-title">${size.size_name.toUpperCase()}</span>
                                       <span class="tooltip">${size.size_name} ( TK ${size.size_price} )</span>
                                   </label>
                               </div>
                           `;
                       });

                       // Update the size container
                       $('#quick_size_variant').html(sizesHtml);

                       // Dynamically set the first size name in the text-title span
                       var firstSize = res.product_sizes[0]; // Get the first size
                       $('.text-title.size_variant').text(firstSize.size_name.toUpperCase());
                   } else {
                       $('#quick_size_variant').html('');
                       $('.text-title.size_variant').text('No Size');
                   }
                   
               },
               error: function (err) {
                   console.log(err);
               }
           });
       });

       // For color select
       $(document).on('click', '.color_show', function () {
           var radioId = $(this).attr('for');
           var $radioInput = $('#' + radioId);

           if ($radioInput.length) {
               $radioInput.prop('checked', true);

               var colorName = $(this).attr('data-value');
               $('.color_variant').text(colorName);

               $('.color_show').removeClass('active');
               $(this).addClass('active');
           }
       });

       // For size select
       $(document).on('click', '.size-btn', function () {
           var radioInput = $(this).prev('input[type="radio"]');
           radioInput.prop('checked', true);

           var selectedSize = $(this).data('value');
           $('.size_variant').text(selectedSize);

           $('.size-btn').removeClass('active');
           $(this).addClass('active');
       });

       // Product add to cart
       $('.add-to-cart-form').on('submit', function(e) {
           e.preventDefault(); 

           // Get the value of the clicked button
           const clickedButton = $('button[type="submit"]:focus');
           const buttonValue = clickedButton.val(); // 'add_cart' or 'buy_now'

           let formData = $(this).serialize() + '&button_value=' + buttonValue;

           $.ajax({
               method: 'POST',
               data: formData,
               url: "{{ route('add.cart') }}",
               success: function(data) {
                   // Handle success
                   if( data.status === 'success' ){
                       // console.log('Product added to cart:', data);
                       sidebarCartData();
                       sidebarCartActionElement();
                       getSidebarCartTotal();
                       getCartCount();
                       toastr.success(data.message);

                       if( data.button_value === "buy_now" ){
                           $('.show-shopping-cart').removeClass('show-shopping-cart');
                           window.location.href = "{{ url('/checkout') }}";
                       }
                       else{
                           // Add the 'show-shopping-cart' class to the clicked button
                           clickedButton.addClass('show-shopping-cart');
                           // Show the modal
                           $('#shoppingCart').modal('show');
                       }
                   }
                   else if( data.status === 'error' ){
                       toastr.error(data.message);
                   }

               },
               error: function(data) {
                   // Handle error
                   // console.log('Error adding product to cart:', data);
                   toastr.error('Failed to add product to cart.');
               },
           });
       });

       // Fetch all sidebar cart data
    //    function sidebarCartData(){
    //        $.ajax({
    //            method: 'GET',
    //            url: "{{ route('get.sidebar.cart') }}",
    //            success: function(response) {
    //                if (response.status === true) {
    //                    let cartHtml = '';
    //                    response.cartItems.forEach(item => {
    //                        cartHtml += `
    //                            <div class="tf-mini-cart-item file_delete" id="side_remove-${item.rowId}">
    //                                <div class="tf-mini-cart-image">
    //                                    <img class="lazyload" data-src="${item.image}" src="${item.image}" alt="${item.slug}">
    //                                </div>
    //                                <div class="tf-mini-cart-info flex-grow-1">
    //                                    <div class="mb_12 d-flex align-items-center justify-content-between de-flex gap-12">
    //                                        <div class="text-title">
    //                                            <a href="/product-details/${item.slug}" class="link text-line-clamp-1">${item.name}</a>
    //                                        </div>
    //                                        <div class="text-button tf-btn-remove remove side_remove_cart" data-row_id="${item.rowId}">Remove</div>
    //                                    </div>
    //                                    <div class="d-flex align-items-center justify-content-between de-flex gap-12">
    //                                        <div class="text-secondary-2">
    //                                            ${item.size_name ? item.size_name.toUpperCase() + ` ($${item.size_price})` : ''} 
    //                                            ${item.color_name ? ` / ${item.color_name} ($${item.color_price})` : ''}
    //                                        </div>
    //                                        <div class="text-button">${item.qty} X $${item.price}</div>
    //                                    </div>
    //                                    <div class="d-flex align-items-center justify-content-between de-flex gap-12">
    //                                        <div class="text-secondary-2">Amount</div>
    //                                        <div class="text-button">$${item.total}</div>
    //                                    </div>
    //                                </div>
    //                            </div>
    //                        `;
    //                    });

    //                    // Update the cart sidebar body
    //                    $('#cart-sidebar-table-body').html(cartHtml);

    //                    sidebarCartActionElement();
    //                }
    //            },
    //            error: function(err) {
    //                toastr.error('Failed to fetch cart data.');
    //                console.log(err);
    //            }
    //        });
    //    }

       //__ Sidebar Single product clear __//
       $(document).on('click', '.side_remove_cart', function(e) {
           e.preventDefault();
           let id = $(this).data('row_id');    
           // console.log(id); 

           $.ajax({
               url: "{{ url('/cart/remove-product') }}/" + id,
               method: 'GET',
               dataType: 'json',
               data: { id: id },
               success: function(data) {
                   // console.log(data);
                   if( data.status === 'success' ){ 
                       getSidebarCartTotal();
                       let singleProductRemove = '#side_remove-' +id;
                       $(singleProductRemove).remove();

                       // Check if the table is empty and display the message
                       const tableBody = $('#cart-sidebar-table-body'); // Replace with the actual tbody ID or class
                       if (tableBody.children('.tf-mini-cart-item').length === 0) {
                           tableBody.html(`
                               <div class="alert alert-danger text-center" role="alert" style="margin: 0 24px;">
                                   <a href="{{ route('checkout') }}" class="tf-btn btn-reset">Continue Shopping</a>
                               </div>
                           `);
                           $('.tf-mini-cart-threshold').remove();
                           $('#tf-mini-cart-actions-field').remove();
                       }

                       getCartCount(); 
                       toastr.success(data.message);
                   }
               },
               error: function(err) {
                   console.log(err);
               },
           })
       })

       //__ Cart Count __//
       function getCartCount(){
           $.ajax({
               method: 'GET',
               url: "{{ route('cart.count') }}",
               success: function(data) {
                   console.log(data);
                   if( data.status === 'success' ){
                      $('.count-box').text(data.cartCount);
                   }
               },
               error: function(data) {
                   // console.log('Error adding product to cart:', data);
               },
           });
       }

       //__ Cart subTotal __//
       function getSidebarCartTotal(){
           $.ajax({
               method: 'GET',
               url: "{{ route('cart.sidebar-product-total') }}",
               success: function(data) {
                   console.log('get total', data);
                   if( data.status === 'success' ){
                      $('.tf-totals-total-value').text('$' + data.total);
                   }
               },
               error: function(data) {
                   console.log('Error adding product to cart:', data);
               },
           });
       }

       //__ Sidebar Cart Element __//
       function sidebarCartActionElement(){
           $('.mini-cart-actions').html(`
               <div id="tf-mini-cart-actions-field">

                   <div class="tf-mini-cart-view-checkout">
                       <a href="{{ route('show-cart') }}" class="tf-btn w-100 btn-white radius-4 has-border"><span class="text">View cart</span></a>
                       <a href="{{ route('checkout') }}" class="tf-btn w-100 btn-fill radius-4"><span class="text">Check Out</span></a>
                   </div>

                   <div class="text-center">
                       <a class="link text-btn-uppercase" href="shop-default-grid.html">Or continue shopping</a>
                   </div>    
               </div>
           `);
       }

       $('.quick_view_cart').on('click', function() {
           $('.show-shopping-cart').removeClass('show-shopping-cart');
       });
   });
</script>

@endpush