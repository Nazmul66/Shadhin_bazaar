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

                {{-- Customers List --}}
                <li class="@yield('all_customer')">
                    <a href="{{ route('admin.customer.index') }}">
                        <i class='bx bx-support'></i>
                        <span >All Customers</span>
                    </a>
                </li>

                
                {{-- Subscription List --}}
                <li class="">
                    <a href="{{ route('admin.subscription.index') }}">
                        <i class='bx bxs-tag-alt'></i>
                        <span>Subscriptions</span>
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


                {{-- Order List --}}
                <li class="@yield('all_orders')">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-line-chart'></i>
                        <span >Order Panel</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="@yield('all_orders')">
                            <a href="{{ route('admin.order.index', ['status' => 'all']) }}">
                                <span >All Orders</span>
                            </a>
                        </li>
                        <li class="@yield('all_orders')">
                            <a href="{{ route('admin.order.index', ['status' => 'pending']) }}">
                                <span >Pending Order</span>
                            </a>
                        </li>
                        <li class="@yield('all_orders')">
                            <a href="{{ route('admin.order.index', ['status' => 'dropped_off']) }}">
                                <span >Dropped Off Order</span>
                            </a>
                        </li>
                        <li class="@yield('all_orders')">
                            <a href="{{ route('admin.order.index', ['status' => 'shipped']) }}">
                                <span >Shipped Order</span>
                            </a>
                        </li>
                        <li class="@yield('all_orders')">
                            <a href="{{ route('admin.order.index', ['status' => 'delivered']) }}">
                                <span >Delivered Order</span>
                            </a>
                        </li>
                        <li class="@yield('all_orders')">
                            <a href="{{ route('admin.order.index', ['status' => 'cancelled']) }}">
                                <span >Cancelled Order</span>
                            </a>
                        </li>
                    </ul>
                </li>


                {{-- Transaction List --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <span >Transaction Panel</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.transaction.index') }}">
                                <span >All Transactions</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                {{-- Manage Website --}}
                <li>
                    <a href="{{ route('admin.customPage.index') }}" >
                        <i class='bx bx-grid-alt'></i>
                        <span >Custom Pages</span>
                    </a>
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
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class='bx bx-cog'></i>
                        <span >Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.settings.index') }}">
                                <span >General Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.profile-update') }}">
                                <span >Profile Update</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.email.setup') }}">
                                <span >Email Configuration</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
