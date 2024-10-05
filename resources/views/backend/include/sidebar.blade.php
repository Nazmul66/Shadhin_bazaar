<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                {{-- Dashboard --}}
                <li {{ setActive(['dashboards']) }}>
                    <a href="{{ route('dashboards') }}">
                        <i class='bx bx-home'></i>
                        <span data-key="t-dashboard">{{ __('message.dashboard') }}</span>
                    </a>
                </li>

                {{-- Role & Permission --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-lock'></i>
                        <span data-key="t-apps">Admin Permission</span>
                    </a>
                    
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.permission.index') }}">
                                <span data-key="t-permission">Permission</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.role.index') }}">
                                <span data-key="t-role">Role</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.admin-role.index') }}">
                                <span data-key="t-role">User</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Attribute --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-grid-alt'></i>
                        <span data-key="t-apps">Attribute</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.attribute.name.index') }}">
                                <span data-key="t-slider">Attribute Name</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.attribute.value.index') }}">
                                <span data-key="t-slider">Attribute Values</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- All Products List --}}
                <li {{ setActive([
                        'admin.category.index',
                        'admin.subcategory.index',
                        'admin.childCategory.index',
                        'admin.brand.index',
                        'admin.product.index',
                        'admin.coupons.index',
                        'admin.reviews.index',
                     ]) }}>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-package'></i>
                        <span data-key="t-apps">Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li {{ setActive(['admin.category.index']) }}>
                            <a href="{{ route('admin.category.index') }}">
                                <span data-key="t-categories">Categories</span>
                            </a>
                        </li>

                        <li {{ setActive(['admin.subcategory.index']) }}>
                            <a href="{{ route('admin.subcategory.index') }}">
                                <span data-key="t-subCat">Sub-Categories</span>
                            </a>
                        </li>

                        <li {{ setActive(['admin.childCategory.index']) }}>
                            <a href="{{ route('admin.childCategory.index') }}">
                                <span data-key="t-childCat">child-Categories</span>
                            </a>
                        </li>

                        <li {{ setActive(['admin.brand.index']) }}>
                            <a href="{{ route('admin.brand.index') }}">
                                <span data-key="t-brand">Brands</span>
                            </a>
                        </li>

                        <li {{ setActive(['admin.product.index']) }}>
                            <a href="{{ route('admin.product.index') }}">
                                <span data-key="t-product">Products</span>
                            </a>
                        </li>

                        <li {{ setActive(['admin.coupons.index']) }}>
                            <a href="{{ route('admin.coupons.index') }}">
                                <span data-key="t-coupon">Coupons</span>
                            </a>
                        </li>
                        <li {{ setActive(['admin.reviews.index']) }}>
                            <a href="{{ route('admin.reviews.index') }}">
                                <span data-key="t-review">Reviews</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Manage Website --}}
                <li {{ setActive(['admin.slider.index']) }}>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-grid-alt'></i>
                        <span data-key="t-apps">Manage Website</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li {{ setActive(['admin.slider.index']) }}>
                            <a href="{{ route('admin.slider.index') }}">
                                <span data-key="t-slider">Slider</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
