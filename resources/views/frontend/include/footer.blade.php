<footer id="footer" class="footer bg-main">
    <div class="footer-wrap">
        <div class="footer-body">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="footer-infor">
                            <div class="footer-logo">
                                <a href="index.html">
                                    <img src="{{ asset('public/frontend/images/logo/logo-white.svg') }}" alt="">
                                </a>
                            </div>
                            <div class="footer-address">
                                <p>549 Oak St.Crystal Lake, IL 60014</p>
                                <a href="contact.html" class="tf-btn-default style-white fw-6">GET DIRECTION<i class="icon-arrowUpRight"></i></a>
                            </div>
                            <ul class="footer-info">
                                <li>
                                    <i class="icon-mail"></i>
                                    <p>themesflat@gmail.com</p>
                                </li>
                                <li>
                                    <i class="icon-phone"></i>
                                    <p>315-666-6688</p>
                                </li>
                            </ul>
                            <ul class="tf-social-icon style-white">
                                <li><a href="#" class="social-facebook"><i class="icon icon-fb"></i></a></li>
                                <li><a href="#" class="social-twiter"><i class="icon icon-x"></i></a></li>
                                <li><a href="#" class="social-instagram"><i class="icon icon-instagram"></i></a></li>
                                <li><a href="#" class="social-tiktok"><i class="icon icon-tiktok"></i></a></li>
                                <li><a href="#" class="social-amazon"><i class="icon icon-amazon"></i></a></li>
                                <li><a href="#" class="social-pinterest"><i class="icon icon-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div class="footer-menu">
                            <div class="footer-col-block">
                                <div class="footer-heading text-button footer-heading-mobile">
                                    Infomation
                                </div>
                                <div class="tf-collapse-content">
                                    <ul class="footer-menu-list">
                                        <li class="text-caption-1">
                                            <a href="about-us.html" class="footer-menu_item">About Us</a>
                                        </li>
                                        <li class="text-caption-1">
                                            <a href="#" class="footer-menu_item">Our Stories</a>
                                        </li>
                                        {{-- <li class="text-caption-1">
                                            <a href="#" class="footer-menu_item">Size Guide</a>
                                        </li> --}}
                                        <li class="text-caption-1">
                                            <a href="contact.html" class="footer-menu_item">Contact us</a>
                                        </li>
                                        <li class="text-caption-1">
                                            <a href="#" class="footer-menu_item">Career</a>
                                        </li>
                                        <li class="text-caption-1">
                                            <a href="my-account.html" class="footer-menu_item">My Account</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="footer-col-block">
                                <div class="footer-heading text-button footer-heading-mobile">
                                    Customer Services
                                </div>
                                <div class="tf-collapse-content">
                                    <ul class="footer-menu-list">
                                        <li class="text-caption-1">
                                            <a href="#" class="footer-menu_item">Shipping</a>
                                        </li>
                                        <li class="text-caption-1">
                                            <a href="#" class="footer-menu_item">Return & Refund</a>
                                        </li>
                                        <li class="text-caption-1">
                                            <a href="#" class="footer-menu_item">Privacy Policy</a>
                                        </li>
                                        <li class="text-caption-1">
                                            <a href="term-of-use.html" class="footer-menu_item">Terms & Conditions</a>
                                        </li>
                                        <li class="text-caption-1">
                                            <a href="FAQs.html" class="footer-menu_item">Orders FAQs</a>
                                        </li>
                                        <li class="text-caption-1">
                                            <a href="wish-list.html" class="footer-menu_item">My Wishlist</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="footer-col-block">
                            <div class="footer-heading text-button footer-heading-mobile">
                                Newletter
                            </div>
                            <div class="tf-collapse-content">
                                <div class="footer-newsletter">
                                    <p class="text-caption-1">Sign up for our newsletter and get 10% off your first purchase</p>
                                    <div class="sib-form">
                                        <div id="sib-form-container" class="sib-form-container">
                                            <div id="sib-container" class="sib-container--large sib-container--vertical">
                                                <form method="POST" action="{{ route('newsletter.request') }}" class="form-newsletter" id="newsletter_form">
                                                    @csrf
                                                    
                                                    <div>
                                                        <div class="sib-input sib-form-block">
                                                            <div class="form__entry entry_block">
                                                                <div class="form__label-row ">
                                                                    <label class="entry__label" for="EMAIL">
                                                                    </label>

                                                                    <div class="entry__field">
                                                                        <input class="input radius-60 subscribe_input" type="text" id="EMAIL" name="email" autocomplete="off" placeholder="Enter your e-mail..." value="{{ old('email') }}" />
                                                                    </div>
                                                                </div>
                                                                <label class="entry__error entry__error--primary"></label>
                                                                <label class="entry__specification">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div class="sib-form-block">
                                                            <button class="sib-form-block__button sib-form-block__button-with-loader subscribe-button radius-60" type="submit" id="subscription_btn">
                                                                <i class='bx bx-up-arrow-alt'></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Footer --}}
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-bottom-wrap">
                            <div class="left">
                                <p class="text-caption-1">©2024 Modave. All Rights Reserved.</p>
                            </div>

                            <div class="tf-payment">
                                <p class="text-caption-1">Payment:</p>
                                <ul>
                                    <li>
                                        <img src="{{ asset('public/frontend/images/payment/img-1.png') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('public/frontend/images/payment/img-2.png') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('public/frontend/images/payment/img-3.png') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('public/frontend/images/payment/img-4.png') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('public/frontend/images/payment/img-5.png') }}" alt="">
                                    </li>
                                    <li>
                                        <img src="{{ asset('public/frontend/images/payment/img-6.png') }}" alt="">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>