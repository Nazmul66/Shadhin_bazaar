<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('dashboards') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.category.index') }}">
                                <span data-key="t-categories">Categories</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.subcategory.index') }}">
                                <span data-key="t-subCat">Sub-Categories</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.childCategory.index') }}">
                                <span data-key="t-childCat">child-Categories</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.brand.index') }}">
                                <span data-key="t-brand">Brands</span>
                            </a>
                        </li>

                        <li>
                            <a href="apps-chat.html">
                                <span data-key="t-product">Products</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.coupons.index') }}">
                                <span data-key="t-coupon">Coupons</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reviews.index') }}">
                                <span data-key="t-review">Reviews</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>