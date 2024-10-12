<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                {{-- Dashboard --}}
                <li >
                    <a href="{{ route('admin.dashboards') }}">
                        <i class='bx bx-home'></i>
                        <span>{{ __('message.dashboard') }}</span>
                    </a>
                </li>

                {{-- Role & Permission --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-lock'></i>
                        <span>Admin Permission</span>
                    </a>
                    
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.permission.index') }}">
                                <span >Permission</span>
                            </a>
                        </li>
                        <li class="@yield('edit_role')">
                            <a href="{{ route('admin.role.index') }}">
                                <span >Role</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.admin-role.index') }}">
                                <span >User</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Attribute --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-message-square-dots'></i>
                        <span >Attribute</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li >
                            <a href="{{ route('admin.attribute.name.index') }}">
                                <span >Attribute Name</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.attribute.value.index') }}">
                                <span >Attribute Values</span>
                            </a>
                        </li>
                    </ul>
                </li>


                {{-- E-commerce --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-cart'></i>
                        <span >E-commerce</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.flashSale.item.index') }}">
                                <span >Flash Sale Product</span>
                            </a>
                        </li>

                        <li >
                            <a href="{{ route('admin.coupons.index') }}">
                                <span >Coupons</span>
                            </a>
                        </li>

                        <li >
                            <a href="{{ route('admin.shipping-rule.index') }}">
                                <span >Shipping Rule</span>
                            </a>
                        </li>
                    </ul>
                </li>
                

                {{-- All Products List --}}
                <li >
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-package'></i>
                        <span >Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.category.index') }}">
                                <span >Categories</span>
                            </a>
                        </li>

                        <li >
                            <a href="{{ route('admin.subcategory.index') }}">
                                <span >Sub-Categories</span>
                            </a>
                        </li>

                        <li >
                            <a href="{{ route('admin.childCategory.index') }}">
                                <span >child-Categories</span>
                            </a>
                        </li>

                        <li >
                            <a href="{{ route('admin.brand.index') }}">
                                <span>Brands</span>
                            </a>
                        </li>

                        <li >
                            <a href="{{ route('admin.product.index') }}">
                                <span >Products</span>
                            </a>
                        </li>

                        <li >
                            <a href="{{ route('admin.reviews.index') }}">
                                <span >Reviews</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Manage Website --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-grid-alt'></i>
                        <span >Manage Website</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.slider.index') }}">
                                <span >Slider</span>
                            </a>
                        </li>
                    </ul>
                </li>


                {{-- Setting Website --}}
                <li>
                    <a href="{{ route('admin.settings.index') }}" >
                        <i class='bx bx-cog'></i>
                        <span >Settings</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
