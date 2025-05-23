<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dreams POS is a powerful Bootstrap based Inventory Management Admin Template designed for businesses, offering seamless invoicing, project tracking, and estimates.">
    <meta name="keywords" content="inventory management, admin dashboard, bootstrap template, invoicing, estimates, business management, responsive admin, POS system">
    <meta name="author" content="Dreams Technologies">
    <meta name="robots" content="index, follow">
    <title>Dreams POS - Inventory Management & Admin Dashboard Template</title>

    <script src="{{ asset('public/backend/pos/js/theme-script.js') }}" type="f81afdffd142422a2a1d29da-text/javascript"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/backend/pos/img/favicon.png') }}">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/backend/pos/img/apple-touch-icon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/pos/css/bootstrap.min.css') }}">

    <!-- animation CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/pos/css/animate.css') }}">

    <!-- toaster css plugin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/pos/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/pos/plugins/fontawesome/css/all.min.css') }}">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/pos/plugins/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/pos/plugins/owlcarousel/owl.theme.default.min.css') }}">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/pos/plugins/tabler-icons/tabler-icons.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/pos/css/style.css') }}">


    <style>
        .pos-design .pos-wrapper {
            --bs-gutter-x: 0;
        }

        .tabs_wrapper ul.tabs li {
            list-style: none;
            cursor: pointer;
            width: 100%;
            border: 1px solid #E6EAED;
            box-shadow: 0px 4px 54px 0px rgba(224, 224, 224, 0.2509803922);
            margin-bottom: 11px;
            border-radius: 8px;
            padding: 6px 16px;
            text-align: center;
        }
        .tabs_wrapper ul.tabs {
            display: inline-block;
            width: 100%;
            padding-left: 0;
            padding-right: 16px !important;
        }
        .tab-wrap {
            width: 142px;
            padding: 12px !important;
            border-right: 1px solid #E6EAED;
            flex-shrink: 0;
        }
    </style>

</head>

<body class="pos-page">

    <!-- Main Wrapper -->
    <div class="main-wrapper pos-five">

        <!-- Header -->
        <div class="header pos-header">

            <!-- Logo -->
            <div class="header-left active">
                <a href="index.html" class="logo logo-normal">
						<img src="{{ asset('public/backend/pos/') }}img/logo.svg"  alt="Img">
					</a>
                <a href="index.html" class="logo logo-white">
						<img src="{{ asset('public/backend/pos/') }}img/logo-white.svg"  alt="Img">
					</a>
                <a href="index.html" class="logo-small">
						<img src="{{ asset('public/backend/pos/') }}img/logo-small.png"  alt="Img">
					</a>
            </div>
            <!-- /Logo -->

            <a id="mobile_btn" class="mobile_btn d-none" href="#sidebar">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>

            <!-- Header Menu -->
            <ul class="nav user-menu" style="justify-content: end; -webkit-justify-content: end;">
                <li class="nav-item pos-nav">
                    <a href="{{ route('admin.dashboards') }}" class="btn btn-purple btn-md d-inline-flex align-items-center">
							<i class="ti ti-world me-1"></i>Dashboard
						</a>
                </li>

                <li class="nav-item nav-item-box">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#calculator" class="bg-orange border-orange text-white"><i class="ti ti-calculator"></i></a>
                </li>
            </ul>
            <!-- /Header Menu -->

            <!-- Mobile Menu -->
            <div class="dropdown mobile-user-menu">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="general-settings.html">Settings</a>
                    <a class="dropdown-item" href="signin.html">Logout</a>
                </div>
            </div>
            <!-- /Mobile Menu -->
        </div>
        <!-- Header -->

        <!-- Sidebar -->
        <div class="sidebar d-none" id="sidebar">
            <!-- Logo -->
            <div class="sidebar-logo">
                <a href="index.html" class="logo logo-normal">
						<img src="{{ asset('public/backend/pos/') }}img/logo.svg" alt="Img">
					</a>
                <a href="index.html" class="logo logo-white">
						<img src="{{ asset('public/backend/pos/') }}img/logo-white.svg" alt="Img">
					</a>
                <a href="index.html" class="logo-small">
						<img src="{{ asset('public/backend/pos/') }}img/logo-small.png" alt="Img">
					</a>
                <a id="toggle_btn" href="javascript:void(0);">
						<i data-feather="chevrons-left" class="feather-16"></i>
					</a>
            </div>
            <!-- /Logo -->
            <div class="modern-profile p-3 pb-0">
                <div class="text-center rounded bg-light p-3 mb-4 user-profile">
                    <div class="avatar avatar-lg online mb-3">
                        <img src="{{ asset('public/backend/pos/') }}img/customer/customer15.jpg" alt="Img" class="img-fluid rounded-circle">
                    </div>
                    <h6 class="fs-14 fw-bold mb-1">Adrian Herman</h6>
                    <p class="fs-12 mb-0">System Admin</p>
                </div>
                <div class="sidebar-nav mb-3">
                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded nav-justified bg-transparent" role="tablist">
                        <li class="nav-item"><a class="nav-link active border-0" href="#">Menu</a></li>
                        <li class="nav-item"><a class="nav-link border-0" href="chat.html">Chats</a></li>
                        <li class="nav-item"><a class="nav-link border-0" href="email.html">Inbox</a></li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-header p-3 pb-0 pt-2">
                <div class="text-center rounded bg-light p-2 mb-4 sidebar-profile d-flex align-items-center">
                    <div class="avatar avatar-md onlin">
                        <img src="{{ asset('public/backend/pos/') }}img/customer/customer15.jpg" alt="Img" class="img-fluid rounded-circle">
                    </div>
                    <div class="text-start sidebar-profile-info ms-2">
                        <h6 class="fs-14 fw-bold mb-1">Adrian Herman</h6>
                        <p class="fs-12">System Admin</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between menu-item mb-3">
                    <div>
                        <a href="index.html" class="btn btn-sm btn-icon bg-light">
								<i class="ti ti-layout-grid-remove"></i>
							</a>
                    </div>
                    <div>
                        <a href="chat.html" class="btn btn-sm btn-icon bg-light">
								<i class="ti ti-brand-hipchat"></i>
							</a>
                    </div>
                    <div>
                        <a href="email.html" class="btn btn-sm btn-icon bg-light position-relative">
								<i class="ti ti-message"></i>
							</a>
                    </div>
                    <div class="notification-item">
                        <a href="activities.html" class="btn btn-sm btn-icon bg-light position-relative">
								<i class="ti ti-bell"></i>
								<span class="notification-status-dot"></span>
							</a>
                    </div>
                    <div class="me-0">
                        <a href="general-settings.html" class="btn btn-sm btn-icon bg-light">
								<i class="ti ti-settings"></i>
							</a>
                    </div>
                </div>
            </div>
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Main</h6>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="subdrop active"><i class="ti ti-layout-grid fs-16 me-2"></i><span>Dashboard</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="index.html" class="active">Admin Dashboard</a></li>
                                        <li><a href="admin-dashboard.html">Admin Dashboard 2</a></li>
                                        <li><a href="sales-dashboard.html">Sales Dashboard</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-user-edit fs-16 me-2"></i><span>Super Admin</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="dashboard.html">Dashboard</a></li>
                                        <li><a href="companies.html">Companies</a></li>
                                        <li><a href="subscription.html">Subscriptions</a></li>
                                        <li><a href="packages.html">Packages</a></li>
                                        <li><a href="domain.html">Domain</a></li>
                                        <li><a href="purchase-transaction.html">Purchase Transaction</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-brand-apple-arcade fs-16 me-2"></i><span>Application</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="chat.html">Chat</a></li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Call<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="video-call.html">Video Call</a></li>
                                                <li><a href="audio-call.html">Audio Call</a></li>
                                                <li><a href="call-history.html">Call History</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="calendar.html">Calendar</a></li>
                                        <li><a href="contacts.html">Contacts</a></li>
                                        <li><a href="email.html">Email</a></li>
                                        <li><a href="todo.html">To Do</a></li>
                                        <li><a href="notes.html">Notes</a></li>
                                        <li><a href="file-manager.html">File Manager</a></li>
                                        <li><a href="projects.html">Projects</a></li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Ecommerce<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="products.html">Products</a></li>
                                                <li><a href="orders.html">Orders</a></li>
                                                <li><a href="customers.html">Customers</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="reviews.html">Reviews</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="social-feed.html">Social Feed</a></li>
                                        <li><a href="search-list.html">Search List</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-layout-sidebar-right-collapse fs-16 me-2"></i><span>Layouts</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="layout-horizontal.html">Horizontal</a></li>
                                        <li><a href="layout-detached.html">Detached</a></li>
                                        <li><a href="layout-two-column.html">Two Column</a></li>
                                        <li><a href="layout-hovered.html">Hovered</a></li>
                                        <li><a href="layout-boxed.html">Boxed</a></li>
                                        <li><a href="layout-rtl.html">RTL</a></li>
                                        <li><a href="layout-dark.html">Dark</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Inventory</h6>
                            <ul>
                                <li><a href="product-list.html"><i data-feather="box"></i><span>Products</span></a></li>
                                <li><a href="add-product.html"><i class="ti ti-table-plus fs-16 me-2"></i><span>Create Product</span></a></li>
                                <li><a href="expired-products.html"><i class="ti ti-progress-alert fs-16 me-2"></i><span>Expired Products</span></a></li>
                                <li><a href="low-stocks.html"><i class="ti ti-trending-up-2 fs-16 me-2"></i><span>Low Stocks</span></a></li>
                                <li><a href="category-list.html"><i class="ti ti-list-details fs-16 me-2"></i><span>Category</span></a></li>
                                <li><a href="sub-categories.html"><i class="ti ti-carousel-vertical fs-16 me-2"></i><span>Sub Category</span></a></li>
                                <li><a href="brand-list.html"><i class="ti ti-triangles fs-16 me-2"></i><span>Brands</span></a></li>
                                <li><a href="units.html"><i class="ti ti-brand-unity fs-16 me-2"></i><span>Units</span></a></li>
                                <li><a href="varriant-attributes.html"><i class="ti ti-checklist fs-16 me-2"></i><span>Variant Attributes</span></a></li>
                                <li><a href="warranty.html"><i class="ti ti-certificate fs-16 me-2"></i><span>Warranties</span></a></li>
                                <li><a href="barcode.html"><i class="ti ti-barcode fs-16 me-2"></i><span>Print Barcode</span></a></li>
                                <li><a href="qrcode.html"><i class="ti ti-qrcode fs-16 me-2"></i><span>Print QR Code</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Stock</h6>
                            <ul>
                                <li><a href="manage-stocks.html"><i class="ti ti-stack-3 fs-16 me-2"></i><span>Manage Stock</span></a></li>
                                <li><a href="stock-adjustment.html"><i class="ti ti-stairs-up fs-16 me-2"></i><span>Stock Adjustment</span></a></li>
                                <li><a href="stock-transfer.html"><i class="ti ti-stack-pop fs-16 me-2"></i><span>Stock Transfer</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Sales</h6>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-layout-grid fs-16 me-2"></i><span>Sales</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="online-orders.html">Online Orders</a></li>
                                        <li><a href="pos-orders.html">POS Orders</a></li>
                                    </ul>
                                </li>
                                <li><a href="invoice.html"><i class="ti ti-file-invoice fs-16 me-2"></i><span>Invoices</span></a></li>
                                <li><a href="sales-returns.html"><i class="ti ti-receipt-refund fs-16 me-2"></i><span>Sales Return</span></a></li>
                                <li><a href="quotation-list.html"><i class="ti ti-files fs-16 me-2"></i><span>Quotation</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-device-laptop fs-16 me-2"></i><span>POS</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="pos.html">POS 1</a></li>
                                        <li><a href="pos-2.html">POS 2</a></li>
                                        <li><a href="pos-3.html">POS 3</a></li>
                                        <li><a href="pos-4.html">POS 4</a></li>
                                        <li><a href="pos-5.html">POS 5</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Promo</h6>
                            <ul>
                                <li><a href="coupons.html"><i class="ti ti-ticket fs-16 me-2"></i><span>Coupons</span></a></li>
                                <li><a href="gift-cards.html"><i class="ti ti-cards fs-16 me-2"></i><span>Gift Cards</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-file-percent fs-16 me-2"></i><span>Discount</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="discount-plan.html">Discount Plan</a></li>
                                        <li><a href="discount.html">Discount</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Purchases</h6>
                            <ul>
                                <li><a href="purchase-list.html"><i class="ti ti-shopping-bag fs-16 me-2"></i><span>Purchases</span></a></li>
                                <li><a href="purchase-order-report.html"><i class="ti ti-file-unknown fs-16 me-2"></i><span>Purchase Order</span></a></li>
                                <li><a href="purchase-returns.html"><i class="ti ti-file-upload fs-16 me-2"></i><span>Purchase Return</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Finance & Accounts</h6>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-file-stack fs-16 me-2"></i><span>Expenses</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="expense-list.html">Expenses</a></li>
                                        <li><a href="expense-category.html">Expense Category</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-file-pencil fs-16 me-2"></i><span>Income</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="income.html">Income</a></li>
                                        <li><a href="income-category.html">Income Category</a></li>
                                    </ul>
                                </li>
                                <li><a href="account-list.html"><i class="ti ti-building-bank fs-16 me-2"></i><span>Bank Accounts</span></a></li>
                                <li><a href="money-transfer.html"><i class="ti ti-moneybag fs-16 me-2"></i><span>Money Transfer</span></a></li>
                                <li><a href="balance-sheet.html"><i class="ti ti-report-money fs-16 me-2"></i><span>Balance Sheet</span></a></li>
                                <li><a href="trial-balance.html"><i class="ti ti-alert-circle fs-16 me-2"></i><span>Trial Balance</span></a></li>
                                <li><a href="cash-flow.html"><i class="ti ti-zoom-money fs-16 me-2"></i><span>Cash Flow</span></a></li>
                                <li><a href="account-statement.html"><i class="ti ti-file-infinity fs-16 me-2"></i><span>Account Statement</span></a></li>

                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Peoples</h6>
                            <ul>
                                <li><a href="customers.html"><i class="ti ti-users-group fs-16 me-2"></i><span>Customers</span></a></li>
                                <li><a href="billers.html"><i class="ti ti-user-up fs-16 me-2"></i><span>Billers</span></a></li>
                                <li><a href="suppliers.html"><i class="ti ti-user-dollar fs-16 me-2"></i><span>Suppliers</span></a></li>
                                <li><a href="store-list.html"><i class="ti ti-home-bolt fs-16 me-2"></i><span>Stores</span></a></li>
                                <li><a href="warehouse.html"><i class="ti ti-archive fs-16 me-2"></i><span>Warehouses</span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">HRM</h6>
                            <ul>
                                <li><a href="employees-grid.html"><i class="ti ti-user fs-16 me-2"></i><span>Employees</span></a></li>
                                <li><a href="department-grid.html"><i class="ti ti-compass fs-16 me-2"></i><span>Departments</span></a></li>
                                <li><a href="designation.html"><i class="ti ti-git-merge fs-16 me-2"></i><span>Designation</span></a></li>
                                <li><a href="shift.html"><i class="ti ti-arrows-shuffle fs-16 me-2"></i><span>Shifts</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-user-cog fs-16 me-2"></i><span>Attendence</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="attendance-employee.html">Employee</a></li>
                                        <li><a href="attendance-admin.html">Admin</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-calendar fs-16 me-2"></i><span>Leaves</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="leaves-admin.html">Admin Leaves</a></li>
                                        <li><a href="leaves-employee.html">Employee Leaves</a></li>
                                        <li><a href="leave-types.html">Leave Types</a></li>
                                    </ul>
                                </li>
                                <li><a href="holidays.html"><i class="ti ti-calendar-share fs-16 me-2"></i><span>Holidays</span></a>
                                </li>
                                <li class="submenu">
                                    <a href="employee-salary.html"><i class="ti ti-file-dollar fs-16 me-2"></i><span>Payroll</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="employee-salary.html">Employee Salary</a></li>
                                        <li><a href="payslip.html">Payslip</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Reports</h6>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-chart-bar fs-16 me-2"></i><span>Sales Report</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="sales-report.html">Sales Report</a></li>
                                        <li><a href="best-seller.html">Best Seller</a></li>
                                    </ul>
                                </li>
                                <li><a href="purchase-report.html"><i class="ti ti-chart-pie-2 fs-16 me-2"></i><span>Purchase report</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-triangle-inverted fs-16 me-2"></i><span>Inventory Report</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="inventory-report.html">Inventory Report</a></li>
                                        <li><a href="stock-history.html">Stock History</a></li>
                                        <li><a href="sold-stock.html">Sold Stock</a></li>
                                    </ul>
                                </li>
                                <li><a href="invoice-report.html"><i class="ti ti-businessplan fs-16 me-2"></i><span>Invoice Report</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-user-star fs-16 me-2"></i><span>Supplier Report</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="supplier-report.html">Supplier Report</a></li>
                                        <li><a href="supplier-due-report.html">Supplier Due Report</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-report fs-16 me-2"></i><span>Customer Report</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="customer-report.html">Customer Report</a></li>
                                        <li><a href="customer-due-report.html">Customer Due Report</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-report-analytics fs-16 me-2"></i><span>Product Report</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="product-report.html">Product Report</a></li>
                                        <li><a href="product-expiry-report.html">Product Expiry Report</a></li>
                                        <li><a href="product-quantity-alert.html">Product Quantity Alert</a></li>
                                    </ul>
                                </li>
                                <li><a href="expense-report.html"><i class="ti ti-file-vector fs-16 me-2"></i><span>Expense Report</span></a></li>
                                <li><a href="income-report.html"><i class="ti ti-chart-ppf fs-16 me-2"></i><span>Income Report</span></a></li>
                                <li><a href="tax-reports.html"><i class="ti ti-chart-dots-2 fs-16 me-2"></i><span>Tax Report</span></a></li>
                                <li><a href="profit-and-loss.html"><i class="ti ti-chart-donut fs-16 me-2"></i><span>Profit & Loss</span></a></li>
                                <li><a href="annual-report.html"><i class="ti ti-report-search fs-16 me-2"></i><span>Annual Report</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Content (CMS)</h6>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-page-break fs-16 me-2"></i><span>Pages</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="pages.html">Pages</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-wallpaper fs-16 me-2"></i><span>Blog</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="all-blog.html">All Blog</a></li>
                                        <li><a href="blog-tag.html">Blog Tags</a></li>
                                        <li><a href="blog-categories.html">Categories</a></li>
                                        <li><a href="blog-comments.html">Blog Comments</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-map-pin fs-16 me-2"></i><span>Location</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="countries.html">Countries</a></li>
                                        <li><a href="states.html">States</a></li>
                                        <li><a href="cities.html">Cities</a></li>
                                    </ul>
                                </li>
                                <li><a href="testimonials.html"><i class="ti ti-star fs-16 me-2"></i><span>Testimonials</span></a></li>
                                <li><a href="faq.html"><i class="ti ti-help-circle fs-16 me-2"></i><span>FAQ</span></a></li>

                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">User Management</h6>
                            <ul>
                                <li><a href="users.html"><i class="ti ti-shield-up fs-16 me-2"></i><span>Users</span></a></li>
                                <li><a href="roles-permissions.html"><i class="ti ti-jump-rope fs-16 me-2"></i><span>Roles & Permissions</span></a></li>
                                <li><a href="delete-account.html"><i class="ti ti-trash-x fs-16 me-2"></i><span>Delete Account Request</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Pages</h6>
                            <ul>
                                <li><a href="profile.html"><i class="ti ti-user-circle fs-16 me-2"></i><span>Profile</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-shield fs-16 me-2"></i><span>Authentication</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Login<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="signin.html">Cover</a></li>
                                                <li><a href="signin-2.html">Illustration</a></li>
                                                <li><a href="signin-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Register<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="register.html">Cover</a></li>
                                                <li><a href="register-2.html">Illustration</a></li>
                                                <li><a href="register-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Forgot Password<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="forgot-password.html">Cover</a></li>
                                                <li><a href="forgot-password-2.html">Illustration</a></li>
                                                <li><a href="forgot-password-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Reset Password<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="reset-password.html">Cover</a></li>
                                                <li><a href="reset-password-2.html">Illustration</a></li>
                                                <li><a href="reset-password-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Email Verification<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="email-verification.html">Cover</a></li>
                                                <li><a href="email-verification-2.html">Illustration</a></li>
                                                <li><a href="email-verification-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">2 Step Verification<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="two-step-verification.html">Cover</a></li>
                                                <li><a href="two-step-verification-2.html">Illustration</a></li>
                                                <li><a href="two-step-verification-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="lock-screen.html">Lock Screen</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-file-x fs-16 me-2"></i><span>Error Pages</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="error-404.html">404 Error </a></li>
                                        <li><a href="error-500.html">500 Error </a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blank-page.html"><i class="ti ti-file fs-16 me-2"></i><span>Blank Page</span> </a>
                                </li>
                                <li>
                                    <a href="pricing.html"><i class="ti ti-currency-dollar fs-16 me-2"></i><span>Pricing</span> </a>
                                </li>
                                <li>
                                    <a href="coming-soon.html"><i class="ti ti-send fs-16 me-2"></i><span>Coming Soon</span> </a>
                                </li>
                                <li>
                                    <a href="under-maintenance.html"><i class="ti ti-alert-triangle fs-16 me-2"></i><span>Under Maintenance</span> </a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Settings</h6>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-settings fs-16 me-2"></i><span>General Settings</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="general-settings.html">Profile</a></li>
                                        <li><a href="security-settings.html">Security</a></li>
                                        <li><a href="notification.html">Notifications</a></li>
                                        <li><a href="connected-apps.html">Connected Apps</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-world fs-16 me-2"></i><span>Website Settings</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="system-settings.html">System Settings</a></li>
                                        <li><a href="company-settings.html">Company Settings </a></li>
                                        <li><a href="localization-settings.html">Localization</a></li>
                                        <li><a href="prefixes.html">Prefixes</a></li>
                                        <li><a href="preference.html">Preference</a></li>
                                        <li><a href="appearance.html">Appearance</a></li>
                                        <li><a href="social-authentication.html">Social Authentication</a></li>
                                        <li><a href="language-settings.html">Language</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-device-mobile fs-16 me-2"></i>
											<span>App Settings</span><span class="menu-arrow"></span>
										</a>
                                    <ul>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Invoice<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="invoice-settings.html">Invoice Settings</a></li>
                                                <li><a href="invoice-template.html">Invoice Template</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="printer-settings.html">Printer</a></li>
                                        <li><a href="pos-settings.html">POS</a></li>
                                        <li><a href="custom-fields.html">Custom Fields</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-device-desktop fs-16 me-2"></i>
											<span>System Settings</span><span class="menu-arrow"></span>
										</a>
                                    <ul>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Email<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="email-settings.html">Email Settings</a></li>
                                                <li><a href="email-template.html">Email Template</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">SMS<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="sms-settings.html">SMS Settings</a></li>
                                                <li><a href="sms-template.html">SMS Template</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="otp-settings.html">OTP</a></li>
                                        <li><a href="gdpr-settings.html">GDPR Cookies</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-settings-dollar fs-16 me-2"></i>
											<span>Financial Settings</span><span class="menu-arrow"></span>
										</a>
                                    <ul>
                                        <li><a href="payment-gateway-settings.html">Payment Gateway</a></li>
                                        <li><a href="bank-settings-grid.html">Bank Accounts</a></li>
                                        <li><a href="tax-rates.html">Tax Rates</a></li>
                                        <li><a href="currency-settings.html">Currencies</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-settings-2 fs-16 me-2"></i>
											<span>Other Settings</span><span class="menu-arrow"></span>
										</a>
                                    <ul>
                                        <li><a href="storage-settings.html">Storage</a></li>
                                        <li><a href="ban-ip-address.html">Ban IP Address</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="signin.html"><i class="ti ti-logout fs-16 me-2"></i><span>Logout</span> </a>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">UI Interface</h6>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);">
											<i class="ti ti-vector-bezier fs-16 me-2"></i><span>Base UI</span><span class="menu-arrow"></span>
										</a>
                                    <ul>
                                        <li><a href="ui-alerts.html">Alerts</a></li>
                                        <li><a href="ui-accordion.html">Accordion</a></li>
                                        <li><a href="ui-avatar.html">Avatar</a></li>
                                        <li><a href="ui-badges.html">Badges</a></li>
                                        <li><a href="ui-borders.html">Border</a></li>
                                        <li><a href="ui-buttons.html">Buttons</a></li>
                                        <li><a href="ui-buttons-group.html">Button Group</a></li>
                                        <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
                                        <li><a href="ui-cards.html">Card</a></li>
                                        <li><a href="ui-carousel.html">Carousel</a></li>
                                        <li><a href="ui-colors.html">Colors</a></li>
                                        <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                        <li><a href="ui-grid.html">Grid</a></li>
                                        <li><a href="ui-images.html">Images</a></li>
                                        <li><a href="ui-lightbox.html">Lightbox</a></li>
                                        <li><a href="ui-media.html">Media</a></li>
                                        <li><a href="ui-modals.html">Modals</a></li>
                                        <li><a href="ui-offcanvas.html">Offcanvas</a></li>
                                        <li><a href="ui-pagination.html">Pagination</a></li>
                                        <li><a href="ui-popovers.html">Popovers</a></li>
                                        <li><a href="ui-progress.html">Progress</a></li>
                                        <li><a href="ui-placeholders.html">Placeholders</a></li>
                                        <li><a href="ui-rangeslider.html">Range Slider</a></li>
                                        <li><a href="ui-spinner.html">Spinner</a></li>
                                        <li><a href="ui-sweetalerts.html">Sweet Alerts</a></li>
                                        <li><a href="ui-nav-tabs.html">Tabs</a></li>
                                        <li><a href="ui-toasts.html">Toasts</a></li>
                                        <li><a href="ui-tooltips.html">Tooltips</a></li>
                                        <li><a href="ui-typography.html">Typography</a></li>
                                        <li><a href="ui-video.html">Video</a></li>
                                        <li><a href="ui-sortable.html">Sortable</a></li>
                                        <li><a href="ui-swiperjs.html">Swiperjs</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);">
											<i data-feather="layers"></i><span>Advanced UI</span><span class="menu-arrow"></span>
										</a>
                                    <ul>
                                        <li><a href="ui-ribbon.html">Ribbon</a></li>
                                        <li><a href="ui-clipboard.html">Clipboard</a></li>
                                        <li><a href="ui-drag-drop.html">Drag & Drop</a></li>
                                        <li><a href="ui-rangeslider.html">Range Slider</a></li>
                                        <li><a href="ui-rating.html">Rating</a></li>
                                        <li><a href="ui-text-editor.html">Text Editor</a></li>
                                        <li><a href="ui-counter.html">Counter</a></li>
                                        <li><a href="ui-scrollbar.html">Scrollbar</a></li>
                                        <li><a href="ui-stickynote.html">Sticky Note</a></li>
                                        <li><a href="ui-timeline.html">Timeline</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-chart-infographic fs-16 me-2"></i>
											<span>Charts</span><span class="menu-arrow"></span>
										</a>
                                    <ul>
                                        <li><a href="chart-apex.html">Apex Charts</a></li>
                                        <li><a href="chart-c3.html">Chart C3</a></li>
                                        <li><a href="chart-js.html">Chart Js</a></li>
                                        <li><a href="chart-morris.html">Morris Charts</a></li>
                                        <li><a href="chart-flot.html">Flot Charts</a></li>
                                        <li><a href="chart-peity.html">Peity Charts</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-icons fs-16 me-2"></i>
											<span>Icons</span><span class="menu-arrow"></span>
										</a>
                                    <ul>
                                        <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                                        <li><a href="icon-feather.html">Feather Icons</a></li>
                                        <li><a href="icon-ionic.html">Ionic Icons</a></li>
                                        <li><a href="icon-material.html">Material Icons</a></li>
                                        <li><a href="icon-pe7.html">Pe7 Icons</a></li>
                                        <li><a href="icon-simpleline.html">Simpleline Icons</a></li>
                                        <li><a href="icon-themify.html">Themify Icons</a></li>
                                        <li><a href="icon-weather.html">Weather Icons</a></li>
                                        <li><a href="icon-typicon.html">Typicon Icons</a></li>
                                        <li><a href="icon-flag.html">Flag Icons</a></li>
                                        <li><a href="icon-tabler.html">Tabler Icons</a></li>
                                        <li><a href="icon-bootstrap.html">Bootstrap Icons</a></li>
                                        <li><a href="icon-remix.html">Remix Icons</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);">
											<i class="ti ti-input-search fs-16 me-2"></i><span>Forms</span><span class="menu-arrow"></span>
										</a>
                                    <ul>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);">Form Elements<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="form-basic-inputs.html">Basic Inputs</a></li>
                                                <li><a href="form-checkbox-radios.html">Checkbox & Radios</a></li>
                                                <li><a href="form-input-groups.html">Input Groups</a></li>
                                                <li><a href="form-grid-gutters.html">Grid & Gutters</a></li>
                                                <li><a href="form-select.html">Form Select</a></li>
                                                <li><a href="form-mask.html">Input Masks</a></li>
                                                <li><a href="form-fileupload.html">File Uploads</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);">Layouts<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="form-horizontal.html">Horizontal Form</a></li>
                                                <li><a href="form-vertical.html">Vertical Form</a></li>
                                                <li><a href="form-floating-labels.html">Floating Labels</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="form-validation.html">Form Validation</a></li>
                                        <li><a href="form-select2.html">Select2</a></li>
                                        <li><a href="form-wizard.html">Form Wizard</a></li>
                                        <li><a href="form-pickers.html">Form Picker</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-table fs-16 me-2"></i><span>Tables</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="tables-basic.html">Basic Tables </a></li>
                                        <li><a href="data-tables.html">Data Table </a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-map-pin-pin fs-16 me-2"></i><span>Maps</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="maps-vector.html">Vector</a></li>
                                        <li><a href="maps-leaflet.html">Leaflet</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu-open">
                            <h6 class="submenu-hdr">Help</h6>
                            <ul>
                                <li><a href="javascript:void(0);"><i class="ti ti-file-text fs-16 me-2"></i><span>Documentation</span></a></li>
                                <li><a href="javascript:void(0);"><i class="ti ti-exchange fs-16 me-2"></i><span>Changelog </span><span class="badge bg-primary badge-xs text-white fs-10 ms-2">v2.0.9</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><i class="ti ti-menu-2 fs-16 me-2"></i><span>Multi Level</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="javascript:void(0);">Level 1.1</a></li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Level 1.2<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="javascript:void(0);">Level 2.1</a></li>
                                                <li class="submenu submenu-two submenu-three"><a href="javascript:void(0);">Level 2.2<span class="menu-arrow inside-submenu inside-submenu-two"></span></a>
                                                    <ul>
                                                        <li><a href="javascript:void(0);">Level 3.1</a></li>
                                                        <li><a href="javascript:void(0);">Level 3.2</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        <!-- Horizontal Sidebar -->
        <div class="sidebar sidebar-horizontal d-none" id="horizontal-menu">
            <div id="sidebar-menu-3" class="sidebar-menu">
                <div class="main-menu">
                    <ul class="nav-menu">
                        <li class="submenu">
                            <a href="index.html"><i class="ti ti-layout-grid fs-16 me-2"></i><span> Main Menu</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);" class="active subdrop"><span>Dashboard</span> <span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="index.html" class="active">Admin Dashboard</a></li>
                                        <li><a href="admin-dashboard.html">Admin Dashboard 2</a></li>
                                        <li><a href="sales-dashboard.html">Sales Dashboard</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Super Admin</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="dashboard.html">Dashboard</a></li>
                                        <li><a href="companies.html">Companies</a></li>
                                        <li><a href="subscription.html">Subscriptions</a></li>
                                        <li><a href="packages.html">Packages</a></li>
                                        <li><a href="domain.html">Domain</a></li>
                                        <li><a href="purchase-transaction.html">Purchase Transaction</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Application</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="chat.html">Chat</a></li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Call<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="video-call.html">Video Call</a></li>
                                                <li><a href="audio-call.html">Audio Call</a></li>
                                                <li><a href="call-history.html">Call History</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="calendar.html">Calendar</a></li>
                                        <li><a href="contacts.html">Contacts</a></li>
                                        <li><a href="email.html">Email</a></li>
                                        <li><a href="todo.html">To Do</a></li>
                                        <li><a href="notes.html">Notes</a></li>
                                        <li><a href="file-manager.html">File Manager</a></li>
                                        <li><a href="projects.html">Projects</a></li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Ecommerce<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="products.html">Products</a></li>
                                                <li><a href="orders.html">Orders</a></li>
                                                <li><a href="customers.html">Customers</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="reviews.html">Reviews</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="social-feed.html">Social Feed</a></li>
                                        <li><a href="search-list.html">Search List</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-layout-sidebar-right-collapse fs-16 me-2"></i><span>Layouts</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="layout-horizontal.html">Horizontal</a></li>
                                <li><a href="layout-detached.html">Detached</a></li>
                                <li><a href="layout-two-column.html">Two Column</a></li>
                                <li><a href="layout-hovered.html">Hovered</a></li>
                                <li><a href="layout-boxed.html">Boxed</a></li>
                                <li><a href="layout-rtl.html">RTL</a></li>
                                <li><a href="layout-dark.html">Dark</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-brand-unity fs-16 me-2"></i><span> Inventory
									</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="product-list.html"><span>Products</span></a></li>
                                <li><a href="add-product.html"><span>Create Product</span></a></li>
                                <li><a href="expired-products.html"><span>Expired Products</span></a></li>
                                <li><a href="low-stocks.html"><span>Low Stocks</span></a></li>
                                <li><a href="category-list.html"><span>Category</span></a></li>
                                <li><a href="sub-categories.html"><span>Sub Category</span></a></li>
                                <li><a href="brand-list.html"><span>Brands</span></a></li>
                                <li><a href="units.html"><span>Units</span></a></li>
                                <li><a href="varriant-attributes.html"><span>Variant Attributes</span></a></li>
                                <li><a href="warranty.html"><span>Warranties</span></a></li>
                                <li><a href="barcode.html"><span>Print Barcode</span></a></li>
                                <li><a href="qrcode.html"><span>Print QR Code</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-layout-grid fs-16 me-2"></i><span>Sales &amp; Purchase</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Stock</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="manage-stocks.html"><span>Manage Stock</span></a></li>
                                        <li><a href="stock-adjustment.html"><span>Stock Adjustment</span></a></li>
                                        <li><a href="stock-transfer.html"><span>Stock Transfer</span></a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Sales</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li class="submenu">
                                            <a href="javascript:void(0);"><span>Sales</span><span class="menu-arrow"></span></a>
                                            <ul>
                                                <li><a href="online-orders.html">Online Orders</a></li>
                                                <li><a href="pos-orders.html">POS Orders</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="invoice.html"><span>Invoices</span></a></li>
                                        <li><a href="sales-returns.html"><span>Sales Return</span></a></li>
                                        <li><a href="quotation-list.html"><span>Quotation</span></a></li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);"><span>POS</span><span class="menu-arrow"></span></a>
                                            <ul>
                                                <li><a href="pos.html">POS 1</a></li>
                                                <li><a href="pos-2.html">POS 2</a></li>
                                                <li><a href="pos-3.html">POS 3</a></li>
                                                <li><a href="pos-4.html">POS 4</a></li>
                                                <li><a href="pos-5.html">POS 5</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Promo</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="coupons.html"><span>Coupons</span></a></li>
                                        <li><a href="gift-cards.html"><span>Gift Cards</span></a></li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);"><span>Discount</span><span class="menu-arrow"></span></a>
                                            <ul>
                                                <li><a href="discount-plan.html">Discount Plan</a></li>
                                                <li><a href="discount.html">Discount</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Purchase</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="purchase-list.html"><span>Purchases</span></a></li>
                                        <li><a href="purchase-order-report.html"><span>Purchase Order</span></a></li>
                                        <li><a href="purchase-returns.html"><span>Purchase Return</span></a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Expenses</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="expense-list.html">Expenses</a></li>
                                        <li><a href="expense-category.html">Expense Category</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Income</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="income.html">Income</a></li>
                                        <li><a href="income-category.html">Income Category</a></li>
                                    </ul>
                                </li>
                                <li><a href="account-list.html"><span>Bank Accounts</span></a></li>
                                <li><a href="money-transfer.html"><span>Money Transfer</span></a></li>
                                <li><a href="balance-sheet.html"><span>Balance Sheet</span></a></li>
                                <li><a href="trial-balance.html"><span>Trial Balance</span></a></li>
                                <li><a href="cash-flow.html"><span>Cash Flow</span></a></li>
                                <li><a href="account-statement.html"><span>Account Statement</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-users-group fs-16 me-2"></i><span>UI Interface</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Base UI</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="ui-alerts.html">Alerts</a></li>
                                        <li><a href="ui-accordion.html">Accordion</a></li>
                                        <li><a href="ui-avatar.html">Avatar</a></li>
                                        <li><a href="ui-badges.html">Badges</a></li>
                                        <li><a href="ui-borders.html">Border</a></li>
                                        <li><a href="ui-buttons.html">Buttons</a></li>
                                        <li><a href="ui-buttons-group.html">Button Group</a></li>
                                        <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
                                        <li><a href="ui-cards.html">Card</a></li>
                                        <li><a href="ui-carousel.html">Carousel</a></li>
                                        <li><a href="ui-colors.html">Colors</a></li>
                                        <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                        <li><a href="ui-grid.html">Grid</a></li>
                                        <li><a href="ui-images.html">Images</a></li>
                                        <li><a href="ui-lightbox.html">Lightbox</a></li>
                                        <li><a href="ui-media.html">Media</a></li>
                                        <li><a href="ui-modals.html">Modals</a></li>
                                        <li><a href="ui-offcanvas.html">Offcanvas</a></li>
                                        <li><a href="ui-pagination.html">Pagination</a></li>
                                        <li><a href="ui-popovers.html">Popovers</a></li>
                                        <li><a href="ui-progress.html">Progress</a></li>
                                        <li><a href="ui-placeholders.html">Placeholders</a></li>
                                        <li><a href="ui-rangeslider.html">Range Slider</a></li>
                                        <li><a href="ui-spinner.html">Spinner</a></li>
                                        <li><a href="ui-sweetalerts.html">Sweet Alerts</a></li>
                                        <li><a href="ui-nav-tabs.html">Tabs</a></li>
                                        <li><a href="ui-toasts.html">Toasts</a></li>
                                        <li><a href="ui-tooltips.html">Tooltips</a></li>
                                        <li><a href="ui-typography.html">Typography</a></li>
                                        <li><a href="ui-video.html">Video</a></li>
                                        <li><a href="ui-sortable.html">Sortable</a></li>
                                        <li><a href="ui-swiperjs.html">Swiperjs</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Advanced UI</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="ui-ribbon.html">Ribbon</a></li>
                                        <li><a href="ui-clipboard.html">Clipboard</a></li>
                                        <li><a href="ui-drag-drop.html">Drag & Drop</a></li>
                                        <li><a href="ui-rangeslider.html">Range Slider</a></li>
                                        <li><a href="ui-rating.html">Rating</a></li>
                                        <li><a href="ui-text-editor.html">Text Editor</a></li>
                                        <li><a href="ui-counter.html">Counter</a></li>
                                        <li><a href="ui-scrollbar.html">Scrollbar</a></li>
                                        <li><a href="ui-stickynote.html">Sticky Note</a></li>
                                        <li><a href="ui-timeline.html">Timeline</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Charts</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="chart-apex.html">Apex Charts</a></li>
                                        <li><a href="chart-c3.html">Chart C3</a></li>
                                        <li><a href="chart-js.html">Chart Js</a></li>
                                        <li><a href="chart-morris.html">Morris Charts</a></li>
                                        <li><a href="chart-flot.html">Flot Charts</a></li>
                                        <li><a href="chart-peity.html">Peity Charts</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Icons</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                                        <li><a href="icon-feather.html">Feather Icons</a></li>
                                        <li><a href="icon-ionic.html">Ionic Icons</a></li>
                                        <li><a href="icon-material.html">Material Icons</a></li>
                                        <li><a href="icon-pe7.html">Pe7 Icons</a></li>
                                        <li><a href="icon-simpleline.html">Simpleline Icons</a></li>
                                        <li><a href="icon-themify.html">Themify Icons</a></li>
                                        <li><a href="icon-weather.html">Weather Icons</a></li>
                                        <li><a href="icon-typicon.html">Typicon Icons</a></li>
                                        <li><a href="icon-flag.html">Flag Icons</a></li>
                                        <li><a href="icon-tabler.html">Tabler Icons</a></li>
                                        <li><a href="icon-bootstrap.html">Bootstrap Icons</a></li>
                                        <li><a href="icon-remix.html">Remix Icons</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span> Forms</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);"><span>Form Elements</span><span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="form-basic-inputs.html">Basic Inputs</a></li>
                                                <li><a href="form-checkbox-radios.html">Checkbox & Radios</a></li>
                                                <li><a href="form-input-groups.html">Input Groups</a></li>
                                                <li><a href="form-grid-gutters.html">Grid & Gutters</a></li>
                                                <li><a href="form-select.html">Form Select</a></li>
                                                <li><a href="form-mask.html">Input Masks</a></li>
                                                <li><a href="form-fileupload.html">File Uploads</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two">
                                            <a href="javascript:void(0);"><span> Layouts</span><span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="form-horizontal.html">Horizontal Form</a></li>
                                                <li><a href="form-vertical.html">Vertical Form</a></li>
                                                <li><a href="form-floating-labels.html">Floating Labels</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="form-validation.html">Form Validation</a></li>
                                        <li><a href="form-select2.html">Select2</a></li>
                                        <li><a href="form-wizard.html">Form Wizard</a></li>
                                        <li><a href="form-pickers.html">Form Picker</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Tables</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="tables-basic.html">Basic Tables </a></li>
                                        <li><a href="data-tables.html">Data Table </a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Maps</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="maps-vector.html">Vector</a></li>
                                        <li><a href="maps-leaflet.html">Leaflet</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-page-break fs-16 me-2"></i><span>Pages</span> <span class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="profile.html"><span>Profile</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Authentication</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Login<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="signin.html">Cover</a></li>
                                                <li><a href="signin-2.html">Illustration</a></li>
                                                <li><a href="signin-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Register<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="register.html">Cover</a></li>
                                                <li><a href="register-2.html">Illustration</a></li>
                                                <li><a href="register-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Forgot Password<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="forgot-password.html">Cover</a></li>
                                                <li><a href="forgot-password-2.html">Illustration</a></li>
                                                <li><a href="forgot-password-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Reset Password<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="reset-password.html">Cover</a></li>
                                                <li><a href="reset-password-2.html">Illustration</a></li>
                                                <li><a href="reset-password-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Email Verification<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="email-verification.html">Cover</a></li>
                                                <li><a href="email-verification-2.html">Illustration</a></li>
                                                <li><a href="email-verification-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">2 Step Verification<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="two-step-verification.html">Cover</a></li>
                                                <li><a href="two-step-verification-2.html">Illustration</a></li>
                                                <li><a href="two-step-verification-3.html">Basic</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="lock-screen.html">Lock Screen</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Error</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="error-404.html">404 Error </a></li>
                                        <li><a href="error-500.html">500 Error </a></li>
                                    </ul>
                                </li>
                                <li><a href="blank-page.html"><span>Blank Page</span> </a></li>
                                <li><a href="pricing.html"><span>Pricing</span> </a></li>
                                <li><a href="coming-soon.html"><span>Coming Soon</span> </a></li>
                                <li><a href="under-maintenance.html"><span>Under Maintenance</span> </a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Content</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li class="submenu">
                                            <a href="javascript:void(0);"><span>Pages</span><span class="menu-arrow"></span></a>
                                            <ul>
                                                <li><a href="pages.html">Pages</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);"><span>Blog</span><span class="menu-arrow"></span></a>
                                            <ul>
                                                <li><a href="all-blog.html">All Blog</a></li>
                                                <li><a href="blog-tag.html">Blog Tags</a></li>
                                                <li><a href="blog-categories.html">Categories</a></li>
                                                <li><a href="blog-comments.html">Blog Comments</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);"><span>Location</span><span class="menu-arrow"></span></a>
                                            <ul>
                                                <li><a href="countries.html">Countries</a></li>
                                                <li><a href="states.html">States</a></li>
                                                <li><a href="cities.html">Cities</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="testimonials.html"><span>Testimonials</span></a></li>
                                        <li><a href="faq.html"><span>FAQ</span></a></li>

                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Employees</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="employees-grid.html"><span>Employees</span></a></li>
                                        <li><a href="department-grid.html"><span>Departments</span></a></li>
                                        <li><a href="designation.html"><span>Designation</span></a></li>
                                        <li><a href="shift.html"><span>Shifts</span></a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Attendence</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="attendance-employee.html">Employee Attendence</a></li>
                                        <li><a href="attendance-admin.html">Admin Attendence</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Leaves &amp; Holidays</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="leaves-admin.html">Admin Leaves</a></li>
                                        <li><a href="leaves-employee.html">Employee Leaves</a></li>
                                        <li><a href="leave-types.html">Leave Types</a></li>
                                        <li><a href="holidays.html"><span>Holidays</span></a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="employee-salary.html"><span>Payroll</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="employee-salary.html">Employee Salary</a></li>
                                        <li><a href="payslip.html">Payslip</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-chart-bar fs-16 me-2"></i><span>Reports</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Sales Report</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="sales-report.html">Sales Report</a></li>
                                        <li><a href="best-seller.html">Best Seller</a></li>
                                    </ul>
                                </li>
                                <li><a href="purchase-report.html"><span>Purchase report</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Inventory Report</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="inventory-report.html">Inventory Report</a></li>
                                        <li><a href="stock-history.html">Stock History</a></li>
                                        <li><a href="sold-stock.html">Sold Stock</a></li>
                                    </ul>
                                </li>
                                <li><a href="invoice-report.html"><span>Invoice Report</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Supplier Report</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="supplier-report.html">Supplier Report</a></li>
                                        <li><a href="supplier-due-report.html">Supplier Due Report</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Customer Report</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="customer-report.html">Customer Report</a></li>
                                        <li><a href="customer-due-report.html">Customer Due Report</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Product Report</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="product-report.html">Product Report</a></li>
                                        <li><a href="product-expiry-report.html">Product Expiry Report</a></li>
                                        <li><a href="product-quantity-alert.html">Product Quantity Alert</a></li>
                                    </ul>
                                </li>
                                <li><a href="expense-report.html"><span>Expense Report</span></a></li>
                                <li><a href="income-report.html"><span>Income Report</span></a></li>
                                <li><a href="tax-reports.html"><span>Tax Report</span></a></li>
                                <li><a href="profit-and-loss.html"><span>Profit & Loss</span></a></li>
                                <li><a href="annual-report.html"><span>Annual Report</span></a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="ti ti-settings fs-16 me-2"></i><span>Settings</span><span class="menu-arrow"></span></a>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>General Settings</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="general-settings.html">Profile</a></li>
                                        <li><a href="security-settings.html">Security</a></li>
                                        <li><a href="notification.html">Notifications</a></li>
                                        <li><a href="connected-apps.html">Connected Apps</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Website Settings</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="system-settings.html">System Settings</a></li>
                                        <li><a href="company-settings.html">Company Settings </a></li>
                                        <li><a href="localization-settings.html">Localization</a></li>
                                        <li><a href="prefixes.html">Prefixes</a></li>
                                        <li><a href="preference.html">Preference</a></li>
                                        <li><a href="appearance.html">Appearance</a></li>
                                        <li><a href="social-authentication.html">Social Authentication</a></li>
                                        <li><a href="language-settings.html">Language</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>App Settings</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Invoice<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="invoice-settings.html">Invoice Settings</a></li>
                                                <li><a href="invoice-template.html">Invoice Template</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="printer-settings.html">Printer</a></li>
                                        <li><a href="pos-settings.html">POS</a></li>
                                        <li><a href="custom-fields.html">Custom Fields</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>System Settings</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">Email<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="email-settings.html">Email Settings</a></li>
                                                <li><a href="email-template.html">Email Template</a></li>
                                            </ul>
                                        </li>
                                        <li class="submenu submenu-two"><a href="javascript:void(0);">SMS<span class="menu-arrow inside-submenu"></span></a>
                                            <ul>
                                                <li><a href="sms-settings.html">SMS Settings</a></li>
                                                <li><a href="sms-template.html">SMS Template</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="otp-settings.html">OTP</a></li>
                                        <li><a href="gdpr-settings.html">GDPR Cookies</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Financial Settings</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="payment-gateway-settings.html">Payment Gateway</a></li>
                                        <li><a href="bank-settings-grid.html">Bank Accounts</a></li>
                                        <li><a href="tax-rates.html">Tax Rates</a></li>
                                        <li><a href="currency-settings.html">Currencies</a></li>
                                    </ul>
                                </li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"><span>Other Settings</span><span class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="storage-settings.html">Storage</a></li>
                                        <li><a href="ban-ip-address.html">Ban IP Address</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="signin.html"><span>Logout</span> </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Horizontal Sidebar -->

        <!-- Two Col Sidebar -->
        <div class="two-col-sidebar d-none" id="two-col-sidebar">
            <div class="sidebar sidebar-twocol">
                <div class="twocol-mini">
                    <div class="sidebar-left slimscroll">
                        <div class="nav flex-column align-items-center nav-pills" id="sidebar-tabs" role="tablist" aria-orientation="vertical">
                            <a href="#" class="nav-link active" title="Dashboard" data-bs-toggle="tab" data-bs-target="#dashboard">
									<i class="ti ti-smart-home"></i>
								</a>
                            <a href="#" class="nav-link " title="Super Admin" data-bs-toggle="tab" data-bs-target="#super-admin">
									<i class="ti ti-user-star"></i>
								</a>
                            <a href="#" class="nav-link " title="Apps" data-bs-toggle="tab" data-bs-target="#application">
									<i class="ti ti-layout-grid-add"></i>
								</a>
                            <a href="#" class="nav-link" title="Layout" data-bs-toggle="tab" data-bs-target="#layout">
									<i class="ti ti-layout-board-split"></i>
								</a>
                            <a href="#" class="nav-link" title="Inventory" data-bs-toggle="tab" data-bs-target="#inventory">
									<i class="ti ti-table-plus"></i>
								</a>
                            <a href="#" class="nav-link" title="Stock" data-bs-toggle="tab" data-bs-target="#stock">
									<i class="ti ti-stack-3"></i>
								</a>
                            <a href="#" class="nav-link" title="Sales" data-bs-toggle="tab" data-bs-target="#sales">
									<i class="ti ti-device-laptop"></i>
								</a>
                            <a href="#" class="nav-link" title="Finance" data-bs-toggle="tab" data-bs-target="#finance">
									<i class="ti ti-shopping-cart-dollar"></i>
								</a>
                            <a href="#" class="nav-link" title="Hrm" data-bs-toggle="tab" data-bs-target="#hrm">
									<i class="ti ti-cash"></i>
								</a>
                            <a href="#" class="nav-link" title="Reports" data-bs-toggle="tab" data-bs-target="#reports">
									<i class="ti ti-license"></i>
								</a>
                            <a href="#" class="nav-link" title="Pages" data-bs-toggle="tab" data-bs-target="#pages">
									<i class="ti ti-page-break"></i>
								</a>
                            <a href="#" class="nav-link" title="Settings" data-bs-toggle="tab" data-bs-target="#settings">
									<i class="ti ti-lock-check"></i>
								</a>
                            <a href="#" class="nav-link " title="UI Elements" data-bs-toggle="tab" data-bs-target="#ui-elements">
									<i class="ti ti-ux-circle"></i>
								</a>
                            <a href="#" class="nav-link" title="Extras" data-bs-toggle="tab" data-bs-target="#extras">
									<i class="ti ti-vector-triangle"></i>
								</a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-right">
                    <!-- Logo -->
                    <div class="sidebar-logo">
                        <a href="index.html" class="logo logo-normal">
								<img src="{{ asset('public/backend/pos/') }}img/logo.svg" alt="Img">
							</a>
                        <a href="index.html" class="logo logo-white">
								<img src="{{ asset('public/backend/pos/') }}img/logo-white.svg" alt="Img">
							</a>
                        <a href="index.html" class="logo-small">
								<img src="{{ asset('public/backend/pos/') }}img/logo-small.png" alt="Img">
							</a>
                    </div>
                    <!-- /Logo -->
                    <div class="sidebar-scroll">
                        <div class="text-center rounded bg-light p-3 mb-3 border">
                            <div class="avatar avatar-lg online mb-3">
                                <img src="{{ asset('public/backend/pos/') }}img/customer/customer15.jpg" alt="Img" class="img-fluid rounded-circle">
                            </div>
                            <h6 class="fs-14 fw-bold mb-1">Adrian Herman</h6>
                            <p class="fs-12 mb-0">System Admin</p>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="dashboard">
                                <ul>
                                    <li class="menu-title"><span>MAIN</span></li>
                                    <li><a href="index.html" class="active">Admin Dashboard</a></li>
                                    <li><a href="admin-dashboard.html">Admin Dashboard 2</a></li>
                                    <li><a href="sales-dashboard.html">Sales Dashboard</a></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="super-admin">
                                <ul>
                                    <li class="menu-title"><span>SUPER ADMIN</span></li>
                                    <li><a href="dashboard.html">Dashboard</a></li>
                                    <li><a href="companies.html">Companies</a></li>
                                    <li><a href="subscription.html">Subscriptions</a></li>
                                    <li><a href="packages.html">Packages</a></li>
                                    <li><a href="domain.html">Domain</a></li>
                                    <li><a href="purchase-transaction.html">Purchase Transaction</a></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="application">
                                <ul>
                                    <li><a href="chat.html">Chat</a></li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Call<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="video-call.html">Video Call</a></li>
                                            <li><a href="audio-call.html">Audio Call</a></li>
                                            <li><a href="call-history.html">Call History</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="calendar.html">Calendar</a></li>
                                    <li><a href="contacts.html">Contacts</a></li>
                                    <li><a href="email.html">Email</a></li>
                                    <li><a href="todo.html">To Do</a></li>
                                    <li><a href="notes.html">Notes</a></li>
                                    <li><a href="file-manager.html">File Manager</a></li>
                                    <li><a href="projects.html">Projects</a></li>
                                    <li class="submenu submenu-two"><a href="javascript:void(0);">Ecommerce<span class="menu-arrow inside-submenu"></span></a>
                                        <ul>
                                            <li><a href="products.html">Products</a></li>
                                            <li><a href="orders.html">Orders</a></li>
                                            <li><a href="customers.html">Customers</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="reviews.html">Reviews</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="social-feed.html">Social Feed</a></li>
                                    <li><a href="search-list.html">Search List</a></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="layout">
                                <ul>
                                    <li class="menu-title"><span>LAYOUT</span></li>
                                    <li><a href="layout-horizontal.html">Horizontal</a></li>
                                    <li><a href="layout-detached.html">Detached</a></li>
                                    <li><a href="layout-two-column.html">Two Column</a></li>
                                    <li><a href="layout-hovered.html">Hovered</a></li>
                                    <li><a href="layout-boxed.html">Boxed</a></li>
                                    <li><a href="layout-rtl.html">RTL</a></li>
                                    <li><a href="layout-dark.html">Dark</a></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="inventory">
                                <ul>
                                    <li class="menu-title"><span>Inventory</span></li>
                                    <li><a href="product-list.html"><span>Products</span></a></li>
                                    <li><a href="add-product.html"><span>Create Product</span></a></li>
                                    <li><a href="expired-products.html"><span>Expired Products</span></a></li>
                                    <li><a href="low-stocks.html"><span>Low Stocks</span></a></li>
                                    <li><a href="category-list.html"><span>Category</span></a></li>
                                    <li><a href="sub-categories.html"><span>Sub Category</span></a></li>
                                    <li><a href="brand-list.html"><span>Brands</span></a></li>
                                    <li><a href="units.html"><span>Units</span></a></li>
                                    <li><a href="varriant-attributes.html"><span>Variant Attributes</span></a></li>
                                    <li><a href="warranty.html"><span>Warranties</span></a></li>
                                    <li><a href="barcode.html"><span>Print Barcode</span></a></li>
                                    <li><a href="qrcode.html"><span>Print QR Code</span></a></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="stock">
                                <ul>
                                    <li class="menu-title"><span>Stock</span></li>
                                    <li><a href="manage-stocks.html"><span>Manage Stock</span></a></li>
                                    <li><a href="stock-adjustment.html"><span>Stock Adjustment</span></a></li>
                                    <li><a href="stock-transfer.html"><span>Stock Transfer</span></a></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="sales">
                                <ul>
                                    <li class="menu-title"><span>Sales</span></li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Sales</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="online-orders.html">Online Orders</a></li>
                                            <li><a href="pos-orders.html">POS Orders</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="invoice.html"><span>Invoices</span></a></li>
                                    <li><a href="sales-returns.html"><span>Sales Return</span></a></li>
                                    <li><a href="quotation-list.html"><span>Quotation</span></a></li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>POS</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="pos.html">POS 1</a></li>
                                            <li><a href="pos-2.html">POS 2</a></li>
                                            <li><a href="pos-3.html">POS 3</a></li>
                                            <li><a href="pos-4.html">POS 4</a></li>
                                            <li><a href="pos-5.html">POS 5</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="finance">
                                <ul>
                                    <li class="menu-title"><span>FINANCE & ACCOUNTS</span></li>
                                    <li><a href="coupons.html"><span>Coupons</span></a></li>
                                    <li><a href="gift-cards.html"><span>Gift Cards</span></a></li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Discount</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="discount-plan.html">Discount Plan</a></li>
                                            <li><a href="discount.html">Discount</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="purchase-list.html"><span>Purchases</span></a></li>
                                    <li><a href="purchase-order-report.html"><span>Purchase Order</span></a></li>
                                    <li><a href="purchase-returns.html"><span>Purchase Return</span></a></li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Expenses</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="expense-list.html">Expenses</a></li>
                                            <li><a href="expense-category.html">Expense Category</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Income</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="income.html">Income</a></li>
                                            <li><a href="income-category.html">Income Category</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="account-list.html"><span>Bank Accounts</span></a></li>
                                    <li><a href="money-transfer.html"><span>Money Transfer</span></a></li>
                                    <li><a href="balance-sheet.html"><span>Balance Sheet</span></a></li>
                                    <li><a href="trial-balance.html"><span>Trial Balance</span></a></li>
                                    <li><a href="cash-flow.html"><span>Cash Flow</span></a></li>
                                    <li><a href="account-statement.html"><span>Account Statement</span></a></li>
                                    <li><a href="customers.html"><span>Customers</span></a></li>
                                    <li><a href="billers.html"><span>Billers</span></a></li>
                                    <li><a href="suppliers.html"><span>Suppliers</span></a></li>
                                    <li><a href="store-list.html"><span>Stores</span></a></li>
                                    <li><a href="warehouse.html"><span>Warehouses</span></a></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="hrm">
                                <ul>
                                    <li class="menu-title"><span>Hrm</span></li>
                                    <li><a href="employees-grid.html"><span>Employees</span></a></li>
                                    <li><a href="department-grid.html"><span>Departments</span></a></li>
                                    <li><a href="designation.html"><span>Designation</span></a></li>
                                    <li><a href="shift.html"><span>Shifts</span></a></li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Attendence</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="attendance-employee.html">Employee</a></li>
                                            <li><a href="attendance-admin.html">Admin</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Leaves</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="leaves-admin.html">Admin Leaves</a></li>
                                            <li><a href="leaves-employee.html">Employee Leaves</a></li>
                                            <li><a href="leave-types.html">Leave Types</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="holidays.html"><span>Holidays</span></a>
                                    </li>
                                    <li class="submenu">
                                        <a href="employee-salary.html"><span>Payroll</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="employee-salary.html">Employee Salary</a></li>
                                            <li><a href="payslip.html">Payslip</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="reports">
                                <ul>
                                    <li class="menu-title"><span>Reports</span></li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Sales Report</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="sales-report.html">Sales Report</a></li>
                                            <li><a href="best-seller.html">Best Seller</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="purchase-report.html"><span>Purchase report</span></a></li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Inventory Report</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="inventory-report.html">Inventory Report</a></li>
                                            <li><a href="stock-history.html">Stock History</a></li>
                                            <li><a href="sold-stock.html">Sold Stock</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="invoice-report.html"><span>Invoice Report</span></a></li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Supplier Report</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="supplier-report.html">Supplier Report</a></li>
                                            <li><a href="supplier-due-report.html">Supplier Due Report</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Customer Report</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="customer-report.html">Customer Report</a></li>
                                            <li><a href="customer-due-report.html">Customer Due Report</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Product Report</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="product-report.html">Product Report</a></li>
                                            <li><a href="product-expiry-report.html">Product Expiry Report</a></li>
                                            <li><a href="product-quantity-alert.html">Product Quantity Alert</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="expense-report.html"><span>Expense Report</span></a></li>
                                    <li><a href="income-report.html"><span>Income Report</span></a></li>
                                    <li><a href="tax-reports.html"><span>Tax Report</span></a></li>
                                    <li><a href="profit-and-loss.html"><span>Profit & Loss</span></a></li>
                                    <li><a href="annual-report.html"><span>Annual Report</span></a></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="pages">
                                <ul>
                                    <li class="menu-title"><span>Pages</span></li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Pages</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="pages.html">Pages</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Blog</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="all-blog.html">All Blog</a></li>
                                            <li><a href="blog-tag.html">Blog Tags</a></li>
                                            <li><a href="blog-categories.html">Categories</a></li>
                                            <li><a href="blog-comments.html">Blog Comments</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Location</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="countries.html">Countries</a></li>
                                            <li><a href="states.html">States</a></li>
                                            <li><a href="cities.html">Cities</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="testimonials.html"><span>Testimonials</span></a></li>
                                    <li><a href="faq.html"><span>FAQ</span></a></li>
                                    <li><a href="users.html"><span>Users</span></a></li>
                                    <li><a href="roles-permissions.html"><span>Roles & Permissions</span></a></li>
                                    <li><a href="delete-account.html"><span>Delete Account Request</span></a></li>
                                    <li><a href="profile.html"><span>Profile</span></a></li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Authentication</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li class="submenu submenu-two"><a href="javascript:void(0);">Login<span class="menu-arrow inside-submenu"></span></a>
                                                <ul>
                                                    <li><a href="signin.html">Cover</a></li>
                                                    <li><a href="signin-2.html">Illustration</a></li>
                                                    <li><a href="signin-3.html">Basic</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu submenu-two"><a href="javascript:void(0);">Register<span class="menu-arrow inside-submenu"></span></a>
                                                <ul>
                                                    <li><a href="register.html">Cover</a></li>
                                                    <li><a href="register-2.html">Illustration</a></li>
                                                    <li><a href="register-3.html">Basic</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu submenu-two"><a href="javascript:void(0);">Forgot Password<span class="menu-arrow inside-submenu"></span></a>
                                                <ul>
                                                    <li><a href="forgot-password.html">Cover</a></li>
                                                    <li><a href="forgot-password-2.html">Illustration</a></li>
                                                    <li><a href="forgot-password-3.html">Basic</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu submenu-two"><a href="javascript:void(0);">Reset Password<span class="menu-arrow inside-submenu"></span></a>
                                                <ul>
                                                    <li><a href="reset-password.html">Cover</a></li>
                                                    <li><a href="reset-password-2.html">Illustration</a></li>
                                                    <li><a href="reset-password-3.html">Basic</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu submenu-two"><a href="javascript:void(0);">Email Verification<span class="menu-arrow inside-submenu"></span></a>
                                                <ul>
                                                    <li><a href="email-verification.html">Cover</a></li>
                                                    <li><a href="email-verification-2.html">Illustration</a></li>
                                                    <li><a href="email-verification-3.html">Basic</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu submenu-two"><a href="javascript:void(0);">2 Step Verification<span class="menu-arrow inside-submenu"></span></a>
                                                <ul>
                                                    <li><a href="two-step-verification.html">Cover</a></li>
                                                    <li><a href="two-step-verification-2.html">Illustration</a></li>
                                                    <li><a href="two-step-verification-3.html">Basic</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="lock-screen.html">Lock Screen</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Error Pages</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="error-404.html">404 Error </a></li>
                                            <li><a href="error-500.html">500 Error </a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="blank-page.html"><span>Blank Page</span> </a>
                                    </li>
                                    <li>
                                        <a href="pricing.html"><span>Pricing</span> </a>
                                    </li>
                                    <li>
                                        <a href="coming-soon.html"><span>Coming Soon</span> </a>
                                    </li>
                                    <li>
                                        <a href="under-maintenance.html"><span>Under Maintenance</span> </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="settings">
                                <ul>
                                    <li class="menu-title"><span>Settings</span></li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>General Settings</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="general-settings.html">Profile</a></li>
                                            <li><a href="security-settings.html">Security</a></li>
                                            <li><a href="notification.html">Notifications</a></li>
                                            <li><a href="connected-apps.html">Connected Apps</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Website Settings</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="system-settings.html">System Settings</a></li>
                                            <li><a href="company-settings.html">Company Settings </a></li>
                                            <li><a href="localization-settings.html">Localization</a></li>
                                            <li><a href="prefixes.html">Prefixes</a></li>
                                            <li><a href="preference.html">Preference</a></li>
                                            <li><a href="appearance.html">Appearance</a></li>
                                            <li><a href="social-authentication.html">Social Authentication</a></li>
                                            <li><a href="language-settings.html">Language</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);">
												<span>App Settings</span><span class="menu-arrow"></span>
											</a>
                                        <ul>
                                            <li class="submenu submenu-two"><a href="javascript:void(0);">Invoice<span class="menu-arrow inside-submenu"></span></a>
                                                <ul>
                                                    <li><a href="invoice-settings.html">Invoice Settings</a></li>
                                                    <li><a href="invoice-template.html">Invoice Template</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="printer-settings.html">Printer</a></li>
                                            <li><a href="pos-settings.html">POS</a></li>
                                            <li><a href="custom-fields.html">Custom Fields</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);">
												<span>System Settings</span><span class="menu-arrow"></span>
											</a>
                                        <ul>
                                            <li class="submenu submenu-two"><a href="javascript:void(0);">Email<span class="menu-arrow inside-submenu"></span></a>
                                                <ul>
                                                    <li><a href="email-settings.html">Email Settings</a></li>
                                                    <li><a href="email-template.html">Email Template</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu submenu-two"><a href="javascript:void(0);">SMS<span class="menu-arrow inside-submenu"></span></a>
                                                <ul>
                                                    <li><a href="sms-settings.html">SMS Settings</a></li>
                                                    <li><a href="sms-template.html">SMS Template</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="otp-settings.html">OTP</a></li>
                                            <li><a href="gdpr-settings.html">GDPR Cookies</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);">
												<span>Financial Settings</span><span class="menu-arrow"></span>
											</a>
                                        <ul>
                                            <li><a href="payment-gateway-settings.html">Payment Gateway</a></li>
                                            <li><a href="bank-settings-grid.html">Bank Accounts</a></li>
                                            <li><a href="tax-rates.html">Tax Rates</a></li>
                                            <li><a href="currency-settings.html">Currencies</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);">
												<span>Other Settings</span><span class="menu-arrow"></span>
											</a>
                                        <ul>
                                            <li><a href="storage-settings.html">Storage</a></li>
                                            <li><a href="ban-ip-address.html">Ban IP Address</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="signin.html"><span>Logout</span> </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="ui-elements">
                                <ul>
                                    <li class="menu-title"><span>Ui Interface</span></li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);">
												<span>Base UI</span><span class="menu-arrow"></span>
											</a>
                                        <ul>
                                            <li><a href="ui-alerts.html">Alerts</a></li>
                                            <li><a href="ui-accordion.html">Accordion</a></li>
                                            <li><a href="ui-avatar.html">Avatar</a></li>
                                            <li><a href="ui-badges.html">Badges</a></li>
                                            <li><a href="ui-borders.html">Border</a></li>
                                            <li><a href="ui-buttons.html">Buttons</a></li>
                                            <li><a href="ui-buttons-group.html">Button Group</a></li>
                                            <li><a href="ui-breadcrumb.html">Breadcrumb</a></li>
                                            <li><a href="ui-cards.html">Card</a></li>
                                            <li><a href="ui-carousel.html">Carousel</a></li>
                                            <li><a href="ui-colors.html">Colors</a></li>
                                            <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                            <li><a href="ui-grid.html">Grid</a></li>
                                            <li><a href="ui-images.html">Images</a></li>
                                            <li><a href="ui-lightbox.html">Lightbox</a></li>
                                            <li><a href="ui-media.html">Media</a></li>
                                            <li><a href="ui-modals.html">Modals</a></li>
                                            <li><a href="ui-offcanvas.html">Offcanvas</a></li>
                                            <li><a href="ui-pagination.html">Pagination</a></li>
                                            <li><a href="ui-popovers.html">Popovers</a></li>
                                            <li><a href="ui-progress.html">Progress</a></li>
                                            <li><a href="ui-placeholders.html">Placeholders</a></li>
                                            <li><a href="ui-rangeslider.html">Range Slider</a></li>
                                            <li><a href="ui-spinner.html">Spinner</a></li>
                                            <li><a href="ui-sweetalerts.html">Sweet Alerts</a></li>
                                            <li><a href="ui-nav-tabs.html">Tabs</a></li>
                                            <li><a href="ui-toasts.html">Toasts</a></li>
                                            <li><a href="ui-tooltips.html">Tooltips</a></li>
                                            <li><a href="ui-typography.html">Typography</a></li>
                                            <li><a href="ui-video.html">Video</a></li>
                                            <li><a href="ui-sortable.html">Sortable</a></li>
                                            <li><a href="ui-swiperjs.html">Swiperjs</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);">
												<span>Advanced UI</span><span class="menu-arrow"></span>
											</a>
                                        <ul>
                                            <li><a href="ui-ribbon.html">Ribbon</a></li>
                                            <li><a href="ui-clipboard.html">Clipboard</a></li>
                                            <li><a href="ui-drag-drop.html">Drag & Drop</a></li>
                                            <li><a href="ui-rangeslider.html">Range Slider</a></li>
                                            <li><a href="ui-rating.html">Rating</a></li>
                                            <li><a href="ui-text-editor.html">Text Editor</a></li>
                                            <li><a href="ui-counter.html">Counter</a></li>
                                            <li><a href="ui-scrollbar.html">Scrollbar</a></li>
                                            <li><a href="ui-stickynote.html">Sticky Note</a></li>
                                            <li><a href="ui-timeline.html">Timeline</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);">
												<span>Charts</span><span class="menu-arrow"></span>
											</a>
                                        <ul>
                                            <li><a href="chart-apex.html">Apex Charts</a></li>
                                            <li><a href="chart-c3.html">Chart C3</a></li>
                                            <li><a href="chart-js.html">Chart Js</a></li>
                                            <li><a href="chart-morris.html">Morris Charts</a></li>
                                            <li><a href="chart-flot.html">Flot Charts</a></li>
                                            <li><a href="chart-peity.html">Peity Charts</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);">
												<span>Icons</span><span class="menu-arrow"></span>
											</a>
                                        <ul>
                                            <li><a href="icon-fontawesome.html">Fontawesome Icons</a></li>
                                            <li><a href="icon-feather.html">Feather Icons</a></li>
                                            <li><a href="icon-ionic.html">Ionic Icons</a></li>
                                            <li><a href="icon-material.html">Material Icons</a></li>
                                            <li><a href="icon-pe7.html">Pe7 Icons</a></li>
                                            <li><a href="icon-simpleline.html">Simpleline Icons</a></li>
                                            <li><a href="icon-themify.html">Themify Icons</a></li>
                                            <li><a href="icon-weather.html">Weather Icons</a></li>
                                            <li><a href="icon-typicon.html">Typicon Icons</a></li>
                                            <li><a href="icon-flag.html">Flag Icons</a></li>
                                            <li><a href="icon-tabler.html">Tabler Icons</a></li>
                                            <li><a href="icon-bootstrap.html">Bootstrap Icons</a></li>
                                            <li><a href="icon-remix.html">Remix Icons</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);">
												<span>Forms</span><span class="menu-arrow"></span>
											</a>
                                        <ul>
                                            <li class="submenu submenu-two">
                                                <a href="javascript:void(0);">Form Elements<span class="menu-arrow inside-submenu"></span></a>
                                                <ul>
                                                    <li><a href="form-basic-inputs.html">Basic Inputs</a></li>
                                                    <li><a href="form-checkbox-radios.html">Checkbox & Radios</a></li>
                                                    <li><a href="form-input-groups.html">Input Groups</a></li>
                                                    <li><a href="form-grid-gutters.html">Grid & Gutters</a></li>
                                                    <li><a href="form-select.html">Form Select</a></li>
                                                    <li><a href="form-mask.html">Input Masks</a></li>
                                                    <li><a href="form-fileupload.html">File Uploads</a></li>
                                                </ul>
                                            </li>
                                            <li class="submenu submenu-two">
                                                <a href="javascript:void(0);">Layouts<span class="menu-arrow inside-submenu"></span></a>
                                                <ul>
                                                    <li><a href="form-horizontal.html">Horizontal Form</a></li>
                                                    <li><a href="form-vertical.html">Vertical Form</a></li>
                                                    <li><a href="form-floating-labels.html">Floating Labels</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="form-validation.html">Form Validation</a></li>
                                            <li><a href="form-select2.html">Select2</a></li>
                                            <li><a href="form-wizard.html">Form Wizard</a></li>
                                            <li><a href="form-pickers.html">Form Picker</a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Tables</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="tables-basic.html">Basic Tables </a></li>
                                            <li><a href="data-tables.html">Data Table </a></li>
                                        </ul>
                                    </li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Maps</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="maps-vector.html">Vector</a></li>
                                            <li><a href="maps-leaflet.html">Leaflet</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="extras">
                                <ul>
                                    <li class="menu-title"><span>Help</span></li>
                                    <li><a href="javascript:void(0);"><span>Documentation</span></a></li>
                                    <li><a href="javascript:void(0);"><span>Changelog v2.0.9</span></a></li>
                                    <li class="submenu">
                                        <a href="javascript:void(0);"><span>Multi Level</span><span class="menu-arrow"></span></a>
                                        <ul>
                                            <li><a href="javascript:void(0);">Level 1.1</a></li>
                                            <li class="submenu submenu-two"><a href="javascript:void(0);">Level 1.2<span class="menu-arrow inside-submenu"></span></a>
                                                <ul>
                                                    <li><a href="javascript:void(0);">Level 2.1</a></li>
                                                    <li class="submenu submenu-two submenu-three"><a href="javascript:void(0);">Level 2.2<span class="menu-arrow inside-submenu inside-submenu-two"></span></a>
                                                        <ul>
                                                            <li><a href="javascript:void(0);">Level 3.1</a></li>
                                                            <li><a href="javascript:void(0);">Level 3.2</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Two Col Sidebar -->

        <div class="page-wrapper pos-pg-wrapper ms-0">
            <div class="content pos-design p-0">

                <div class="row pos-wrapper">

                    <!-- Products -->
                    <div class="col-md-12 col-lg-7 col-xl-8 d-flex">
                        <div class="pos-categories tabs_wrapper p-0 flex-fill">
                            <div class="content-wrap">
                                <div class="tab-wrap">
                                    <ul class="tabs owl-carousel pos-category5">
                                        <li id="all" class="active">
                                            <a href="javascript:void(0);">
													<img src="{{ asset('public/backend/pos/img/products/pos-product-01.png') }}" alt="Categories">
												</a>
                                            <h6><a href="javascript:void(0);">All</a></h6>
                                        </li>
                                        <li id="headphones">
                                            <a href="javascript:void(0);">
													<img src="{{ asset('public/backend/pos/img/products/pos-product-08.png') }}" alt="Categories">
												</a>
                                            <h6><a href="javascript:void(0);">Headset</a></h6>
                                        </li>
                                        <li id="shoes">
                                            <a href="javascript:void(0);">
													<img src="{{ asset('public/backend/pos/img/products/pos-product-04.png') }}" alt="Categories">
												</a>
                                            <h6><a href="javascript:void(0);">Shoes</a></h6>
                                        </li>
                                        <li id="mobiles">
                                            <a href="javascript:void(0);">
													<img src="{{ asset('public/backend/pos/img/products/pos-product-15.png') }}" alt="Categories">
												</a>
                                            <h6><a href="javascript:void(0);">Mobiles</a></h6>
                                        </li>
                                        <li id="watches">
                                            <a href="javascript:void(0);">
													<img src="{{ asset('public/backend/pos/img/products/pos-product-03.png') }}" alt="Categories">
												</a>
                                            <h6><a href="javascript:void(0);">Watches</a></h6>
                                        </li>
                                        <li id="laptops">
                                            <a href="javascript:void(0);">
													<img src="{{ asset('public/backend/pos/img/products/pos-product-12.png') }}" alt="Categories">
												</a>
                                            <h6><a href="javascript:void(0);">Laptops</a></h6>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content-wrap">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap mb-2">
                                        <div class="mb-3">
                                            <h5 class="mb-1">Welcome, Wesley Adrian</h5>
                                            <p>December 24, 2024</p>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap mb-2">
                                            <div class="input-icon-start search-pos position-relative mb-2 me-3">
                                                <span class="input-icon-addon">
														<i class="ti ti-search"></i>
													</span>
                                                <input type="text" class="form-control" placeholder="Search Product">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pos-products">
                                        <div class="tabs_container">
                                            <div class="tab_content active" data-tab="all">
                                                <div class="row g-3">
                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                                                        <div class="product-info card mb-0">
                                                            <a href="javascript:void(0);" class="pro-img">
																	<img src="{{ asset('public/backend/pos/img/products/pos-product-01.png') }}" alt="Products">
																	<span><i class="ti ti-circle-check-filled"></i></span>
																</a>
                                                            <h6 class="cat-name"><a href="javascript:void(0);">Mobiles</a></h6>
                                                            <h6 class="product-name"><a href="javascript:void(0);">IPhone 14 64GB</a></h6>
                                                            <div class="d-flex align-items-center justify-content-between price">
                                                                <p class="text-gray-9 mb-0">$15800</p>
                                                                <div class="qty-item m-0">
                                                                    <a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i class="ti ti-minus"></i></a>
                                                                    <input type="text" class="form-control text-center" name="qty" value="4">
                                                                    <a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i class="ti ti-plus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                                                        <div class="product-info card mb-0">
                                                            <a href="javascript:void(0);" class="pro-img">
																	<img src="{{ asset('public/backend/pos/img/products/pos-product-02.png') }}" alt="Products">
																	<span><i class="ti ti-circle-check-filled"></i></span>
																</a>
                                                            <h6 class="cat-name"><a href="javascript:void(0);">Computer</a></h6>
                                                            <h6 class="product-name"><a href="javascript:void(0);">MacBook Pro</a></h6>
                                                            <div class="d-flex align-items-center justify-content-between price">
                                                                <p class="text-gray-9 mb-0">$1000</p>
                                                                <div class="qty-item m-0">
                                                                    <a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i class="ti ti-minus"></i></a>
                                                                    <input type="text" class="form-control text-center" name="qty" value="4">
                                                                    <a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i class="ti ti-plus"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4 col-xxl-3">
                                                        <div class="product-info card mb-0">
                                                            <a href="javascript:void(0);" class="pro-img">
																	<img src="{{ asset('public/backend/pos/img/products/pos-product-03.png') }}" alt="Products">
																	<span><i class="ti ti-circle-check-filled"></i></span>
																</a>
                                                            <h6 class="cat-name"><a href="javascript:void(0);">Watches</a></h6>
                                                            <h6 class="product-name"><a href="javascript:void(0);">Rolex Tribute V3</a></h6>
                                                            <div class="d-flex align-items-center justify-content-between price">
                                                                <p class="text-gray-9 mb-0">$6800</p>
                                                                <div class="qty-item m-0">
                                                                    <a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i class="ti ti-minus"></i></a>
                                                                    <input type="text" class="form-control text-center" name="qty" value="4">
                                                                    <a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i class="ti ti-plus"></i></a>
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
                        </div>
                    </div>
                    <!-- /Products -->

                    <!-- Order Details -->
                    <div class="col-md-12 col-lg-5 col-xl-4 ps-0 theiaStickySidebar d-lg-flex">
                        <aside class="product-order-list bg-secondary-transparent flex-fill">
                            <div class="card">
                                <div class="card-body">
                                    <div class="order-head d-flex align-items-center justify-content-between w-100">
                                        <div>
                                            <h3>Order List</h3>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge badge-dark fs-10 fw-medium badge-xs">#ORD123</span>
                                            <a class="link-danger fs-16" href="javascript:void(0);"><i class="ti ti-trash-x-filled"></i></a>
                                        </div>
                                    </div>
                                    <div class="customer-info block-section">
                                        <h5 class="mb-2">Customer Information</h5>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="flex-grow-1">
                                                <select class="select form-control" id="customer_info">
														<option disabled value="" selected>Select Customers</option>
														<option>Walk in Customer</option>
														<option>John</option>
														<option>Smith</option>
														<option>Ana</option>
														<option>Elza</option>
													</select>
                                            </div>
                                            <a href="#" class="btn btn-teal btn-icon fs-20" data-bs-toggle="modal" data-bs-target="#create"><i class="ti ti-user-plus"></i></a>
                                        </div>
                                        <div class="customer-item border border-orange bg-orange-100 d-flex align-items-center justify-content-between flex-wrap gap-2 mt-3">
                                            <div>
                                                <h6 class="fs-16 fw-bold mb-1">James Anderson</h6>
                                                <div class="d-inline-flex align-items-center gap-2 customer-bonus">
                                                    <p class="fs-13 d-inline-flex align-items-center gap-1">Bonus :<span class="badge bg-cyan fs-13 fw-bold p-1">148</span> </p>
                                                    <p class="fs-13 d-inline-flex align-items-center gap-1">Loyality :<span class="badge bg-teal fs-13 fw-bold p-1">$20</span> </p>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-orange btn-sm">Apply</a>
                                            <a href="javascript:void(0);" class="close-icon"><i class="ti ti-x"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-added block-section">
                                        <div class="head-text d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <h5 class="me-2">Order Details</h5>
                                                <div class="badge bg-light text-gray-9 fs-12 fw-semibold py-2 border rounded">Items : <span class="text-teal">3</span></div>
                                            </div>
                                            <a href="javascript:void(0);" class="d-flex align-items-center clear-icon fs-10 fw-medium">Clear all</a>
                                        </div>
                                        <div class="product-wrap">
                                            <div class="empty-cart">
                                                <div class="fs-24 mb-1">
                                                    <i class="ti ti-shopping-cart"></i>
                                                </div>
                                                <p class="fw-bold">No Products Selected</p>
                                            </div>
                                            <div class="product-list border-0 p-0">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless">
                                                        <thead>
                                                            <tr>
                                                                <th class="fw-bold bg-light">Item</th>
                                                                <th class="fw-bold bg-light">QTY</th>
                                                                <th class="fw-bold bg-light text-end">Cost</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <a class="delete-icon" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
																				<i class="ti ti-trash-x-filled"></i>
																			</a>
                                                                        <h6 class="fs-13 fw-normal"><a href="#" class=" link-default" data-bs-toggle="modal" data-bs-target="#products">iPhone 14 64GB</a></h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="qty-item m-0">
                                                                        <a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i class="ti ti-minus"></i></a>
                                                                        <input type="text" class="form-control text-center" name="qty" value="1">
                                                                        <a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i class="ti ti-plus"></i></a>
                                                                    </div>
                                                                </td>
                                                                <td class="fs-13 fw-semibold text-gray-9 text-end">$15800</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <a class="delete-icon" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
																				<i class="ti ti-trash-x-filled"></i>
																			</a>
                                                                        <h6 class="fs-13 fw-normal "><a href="#" class="link-default" data-bs-toggle="modal" data-bs-target="#products">Red Nike Angelo</a></h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="qty-item m-0">
                                                                        <a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i class="ti ti-minus"></i></a>
                                                                        <input type="text" class="form-control text-center" name="qty" value="4">
                                                                        <a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i class="ti ti-plus"></i></a>
                                                                    </div>
                                                                </td>
                                                                <td class="fs-13 fw-semibold text-gray-9 text-end">$398</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <a class="delete-icon" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
																				<i class="ti ti-trash-x-filled"></i>
																			</a>
                                                                        <h6 class="fs-13 fw-normal "><a href="#" class="link-default" data-bs-toggle="modal" data-bs-target="#products">Tablet 1.02 inch</a></h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="qty-item m-0">
                                                                        <a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i class="ti ti-minus"></i></a>

                                                                        <input type="text" class="form-control text-center" name="qty" value="4">

                                                                        <a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i class="ti ti-plus"></i></a>
                                                                    </div>
                                                                </td>
                                                                <td class="fs-13 fw-semibold text-gray-9 text-end">$3000</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <a class="delete-icon" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete">
																				<i class="ti ti-trash-x-filled"></i>
																			</a>
                                                                        <h6 class="fs-13 fw-normal "><a href="#" class="link-default" data-bs-toggle="modal" data-bs-target="#products">IdeaPad Slim 3i</a></h6>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="qty-item m-0">
                                                                        <a href="javascript:void(0);" class="dec d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="minus"><i class="ti ti-minus"></i></a>
                                                                        <input type="text" class="form-control text-center" name="qty" value="4">
                                                                        <a href="javascript:void(0);" class="inc d-flex justify-content-center align-items-center" data-bs-toggle="tooltip" data-bs-placement="top" title="plus"><i class="ti ti-plus"></i></a>
                                                                    </div>
                                                                </td>
                                                                <td class="fs-13 fw-semibold text-gray-9 text-end">$3000</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="discount-item d-flex align-items-center justify-content-between  bg-purple-transparent mt-3 flex-wrap gap-2">
                                            <div class="d-flex align-items-center">
                                                <span class="bg-purple discount-icon br-5 flex-shrink-0 me-2">
														<img src="{{ asset('public/backend/pos/img/icons/discount-icon.svg') }}" alt="img">
													</span>
                                                <div>
                                                    <h6 class="fs-14 fw-bold text-purple mb-1">Discount 5%</h6>
                                                    <p class="mb-0">For $20 Minimum Purchase, all Items
                                                        <p>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="close-icon"><i class="ti ti-trash"></i></a>
                                        </div> --}}

                                    </div>
                                    <div class="order-total bg-total bg-white p-0">
                                        <h5 class="mb-3">Payment Summary</h5>
                                        <table class="table table-responsive table-borderless">
                                            <tr>
                                                <td>Shipping<a href="#" class="ms-3 link-default" data-bs-toggle="modal" data-bs-target="#shipping-cost"><i class="ti ti-edit"></i></a></td>
                                                <td class="text-gray-9 text-end">$40.21</td>
                                            </tr>
                                            <tr>
                                                <td>Tax<a href="#" class="ms-3 link-default" data-bs-toggle="modal" data-bs-target="#order-tax"><i class="ti ti-edit"></i></a></td>
                                                <td class="text-gray-9 text-end">$25</td>
                                            </tr>
                                            <tr>
                                                <td>Coupon<a href="#" class="ms-3 link-default" data-bs-toggle="modal" data-bs-target="#coupon-code"><i class="ti ti-edit"></i></a></td>
                                                <td class="text-gray-9 text-end">$25</td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-danger">Discount</span><a href="#" class="ms-3 link-default" data-bs-toggle="modal" data-bs-target="#discount"><i class="ti ti-edit"></i></a></td>
                                                <td class="text-danger text-end">$15.21</td>
                                            </tr>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td class="text-gray-9 text-end">$60,454</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-bold border-top border-dashed">Total Payable</td>
                                                <td class="text-gray-9 fw-bold text-end border-top border-dashed">$56590</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="btn-row d-flex align-items-center justify-content-between gap-3">
                                <a href="javascript:void(0);" class="btn btn-white d-flex align-items-center justify-content-center flex-fill m-0" data-bs-toggle="modal" data-bs-target="#hold-order"><i  class="ti ti-printer me-2"></i>Print Order</a>
                                <a href="javascript:void(0);" class="btn btn-secondary d-flex align-items-center justify-content-center flex-fill m-0"><i  class="ti ti-shopping-cart me-2"></i>Place Order</a>
                            </div>
                        </aside>
                    </div>
                    <!-- /Order Details -->

                </div>

                <div class="pos-footer bg-white p-3 border-top">
                    <div class="d-flex align-items-center justify-content-center flex-wrap gap-2">
                        <a href="javascript:void(0);" class="btn btn-indigo d-inline-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#reset"><i class="ti ti-reload me-2"></i>Reset</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Main Wrapper -->


    <!-- Print Receipt -->
    <div class="modal fade modal-default" id="print-receipt" aria-labelledby="print-receipt">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="icon-head text-center">
                        <a href="javascript:void(0);">
								<img src="{{ asset('public/backend/pos/') }}img/logo.svg" width="100" height="30" alt="Receipt Logo">
							</a>
                    </div>
                    <div class="text-center info text-center">
                        <h6>Dreamguys Technologies Pvt Ltd.,</h6>
                        <p class="mb-0">Phone Number: +1 5656665656</p>
                        <p class="mb-0">Email: <a href="/cdn-cgi/l/email-protection#385d40595548545d785f55595154165b5755"><span class="__cf_email__" data-cfemail="3f5a475e524f535a7f58525e5653115c5052">[email&#160;protected]</span></a></p>
                    </div>
                    <div class="tax-invoice">
                        <h6 class="text-center">Tax Invoice</h6>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="invoice-user-name"><span>Name: </span>John Doe</div>
                                <div class="invoice-user-name"><span>Invoice No: </span>CS132453</div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="invoice-user-name"><span>Customer Id: </span>#LL93784</div>
                                <div class="invoice-user-name"><span>Date: </span>01.07.2022</div>
                            </div>
                        </div>
                    </div>
                    <table class="table-borderless w-100 table-fit">
                        <thead>
                            <tr>
                                <th># Item</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1. Red Nike Laser</td>
                                <td>$50</td>
                                <td>3</td>
                                <td class="text-end">$150</td>
                            </tr>
                            <tr>
                                <td>2. Iphone 14</td>
                                <td>$50</td>
                                <td>2</td>
                                <td class="text-end">$100</td>
                            </tr>
                            <tr>
                                <td>3. Apple Series 8</td>
                                <td>$50</td>
                                <td>3</td>
                                <td class="text-end">$150</td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <table class="table-borderless w-100 table-fit">
                                        <tr>
                                            <td class="fw-bold">Sub Total :</td>
                                            <td class="text-end">$700.00</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Discount :</td>
                                            <td class="text-end">-$50.00</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Shipping :</td>
                                            <td class="text-end">0.00</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Tax (5%) :</td>
                                            <td class="text-end">$5.00</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Total Bill :</td>
                                            <td class="text-end">$655.00</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Due :</td>
                                            <td class="text-end">$0.00</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Total Payable :</td>
                                            <td class="text-end">$655.00</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center invoice-bar">
                        <div class="border-bottom border-dashed">
                            <p>**VAT against this challan is payable through central registration. Thank you for your business!</p>
                        </div>
                        <a href="javascript:void(0);">
								<img src="{{ asset('public/backend/pos/') }}img/barcode/barcode-03.jpg" alt="Barcode">
							</a>
                        <p class="text-dark fw-bold">Sale 31</p>
                        <p>Thank You For Shopping With Us. Please Come Again</p>
                        <a href="javascript:void(0);" class="btn btn-md btn-primary">Print Receipt</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Print Receipt -->

    <!-- Products -->
    <div class="modal fade modal-default pos-modal" id="products" aria-labelledby="products">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <h5 class="me-4">Products</h5>
                    </div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
                </div>
                <div class="modal-body">
                    <div class="card bg-light mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap mb-3">
                                <span class="badge bg-dark fs-12">Order ID : #45698</span>
                                <p class="fs-16">Number of Products : 02</p>
                            </div>
                            <div class="product-wrap h-auto">
                                <div class="product-list bg-white align-items-center justify-content-between">
                                    <div class="d-flex align-items-center product-info" data-bs-toggle="modal" data-bs-target="#products">
                                        <a href="javascript:void(0);" class="pro-img">
												<img src="{{ asset('public/backend/pos/') }}img/products/pos-product-16.png" alt="Products">
											</a>
                                        <div class="info">
                                            <h6><a href="javascript:void(0);">Red Nike Laser</a></h6>
                                            <p>Quantity : 04</p>
                                        </div>
                                    </div>
                                    <p class="text-teal fw-bold">$2000</p>
                                </div>
                                <div class="product-list bg-white align-items-center justify-content-between">
                                    <div class="d-flex align-items-center product-info" data-bs-toggle="modal" data-bs-target="#products">
                                        <a href="javascript:void(0);" class="pro-img">
												<img src="{{ asset('public/backend/pos/') }}img/products/pos-product-17.png" alt="Products">
											</a>
                                        <div class="info">
                                            <h6><a href="javascript:void(0);">Iphone 11S</a></h6>
                                            <p>Quantity : 04</p>
                                        </div>
                                    </div>
                                    <p class="text-teal fw-bold">$3000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Products -->

    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
                </div>
                <form action="pos.html">
                    <div class="modal-body pb-1">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Customer Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Phone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Country</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end gap-2 flex-wrap">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Product -->
    <div class="modal fade modal-default pos-modal" id="edit-product" aria-labelledby="edit-product">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
                </div>
                <form action="pos.html">
                    <div class="modal-body pb-1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="Red Nike Laser Show" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Product Price <span class="text-danger">*</span></label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                        <input type="text" class="form-control" value="1800">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Tax Type <span class="text-danger">*</span></label>
                                    <select class="select">
											<option>Exclusive</option>
											<option>Inclusive</option>
										</select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Tax <span class="text-danger">*</span></label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-percentage"></i>
											</span>
                                        <input type="text" class="form-control" value="15">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Discount Type <span class="text-danger">*</span></label>
                                    <select class="select">
											<option>Percentage</option>
											<option>Early payment discounts</option>
										</select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Discount <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="15">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-12">
                                <div class="mb-3">
                                    <label class="form-label">Sale Unit <span class="text-danger">*</span></label>
                                    <select class="select">
											<option>Kilogram</option>
											<option>Grams</option>
										</select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Edit Product -->

    <!-- Delete Product -->
    <div class="modal fade modal-default" id="delete" aria-labelledby="payment-completed">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="success-wrap text-center">
                        <form action="pos.html">
                            <div class="icon-success bg-danger-transparent text-danger mb-2">
                                <i class="ti ti-trash"></i>
                            </div>
                            <h3 class="mb-2">Are you Sure!</h3>
                            <p class="fs-16 mb-3">The current order will be deleted as no payment has been made so far.
                            </p>
                            <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
                                <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">No, Cancel</button>
                                <button type="submit" class="btn btn-md btn-primary">Yes, Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Product -->

    <!-- Reset -->
    <div class="modal fade modal-default" id="reset" aria-labelledby="payment-completed">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="success-wrap text-center">
                        <form action="pos.html">
                            <div class="icon-success bg-purple-transparent text-purple mb-2">
                                <i class="ti ti-transition-top"></i>
                            </div>
                            <h3 class="mb-2">Confirm Your Action</h3>
                            <p class="fs-16 mb-3">The current order will be cleared. But not deleted if it's persistent. Would you like to proceed ?</p>
                            <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
                                <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">No, Cancel</button>
                                <button type="submit" class="btn btn-md btn-primary">Yes, Proceed</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Reset -->

    <!-- Scan -->
    <div class="modal fade modal-default" id="scan-payment">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
                    <div class="success-wrap scan-wrap text-center">
                        <h5><span class="text-gray-6">Amount to Pay :</span> $150</h5>
                        <div class="scan-img">
                            <img src="{{ asset('public/backend/pos/') }}img/icons/scan-img.svg" alt="img">
                        </div>
                        <p class="mb-3">Scan your Phone or UPI App to Complete the payment</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Scan -->



    <!-- Order Tax -->
    <div class="modal fade modal-default" id="order-tax">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Tax</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						   <span aria-hidden="true">×</span>
					   </button>
                </div>
                <form action="pos.html">
                    <div class="modal-body pb-1">
                        <div class="mb-3">
                            <label class="form-label">Order Tax <span class="text-danger">*</span></label>
                            <select class="select form-control">
									<option>Select</option>
									<option>No Tax</option>
									<option>@10</option>
									<option>@15</option>
									<option>VAT</option>
									<option>SLTAX</option>
								</select>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Order Tax -->

    <!-- Shipping Cost -->
    <div class="modal fade modal-default" id="shipping-cost">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Shipping Cost</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="pos.html">
                    <div class="modal-body pb-1">
                        <div class="mb-3">
                            <label class="form-label">Shipping Cost <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Shipping Cost -->

    <!-- Coupon Code -->
    <div class="modal fade modal-default" id="coupon-code">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Coupon Code</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						   <span aria-hidden="true">×</span>
					   </button>
                </div>
                <form action="pos.html">
                    <div class="modal-body pb-1">
                        <div class="mb-3">
                            <label class="form-label">Coupon Code <span class="text-danger">*</span></label>
                            <select class="select form-control">
									<option>Select</option>
									<option>NEWYEAR30</option>
									<option>CHRISTMAS100</option>
									<option>HALLOWEEN20</option>
									<option>BLACKFRIDAY50</option>
								</select>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Coupon Code -->

    <!-- Discount -->
    <div class="modal fade modal-default" id="discount">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Discount </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						   <span aria-hidden="true">×</span>
					   </button>
                </div>
                <form action="pos.html">
                    <div class="modal-body pb-1">
                        <div class="mb-3">
                            <label class="form-label">Order Discount Type <span class="text-danger">*</span></label>
                            <select class="select form-control">
									<option>Select</option>
									<option>Flat</option>
									<option>Percentage</option>
								</select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Value <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Discount -->

    <!-- Cash Payment -->
    <div class="modal fade modal-default" id="cash-payment" aria-labelledby="payment-completed">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="success-wrap">
                        <div class="text-center">
                            <div class="icon-success bg-success text-white mb-2">
                                <i class="ti ti-check"></i>
                            </div>
                            <h3 class="mb-2">Congratulations, Sale Completed</h3>
                            <div class="p-2 d-flex align-items-center justify-content-center gap-2 flex-wrap mb-3">
                                <p class="fs-13 fw-medium pe-2 border-end mb-0">Bill Amount : <span class="text-gray-9">$150</span></p>
                                <p class="fs-13 fw-medium pe-2 border-end mb-0">Total Paid : <span class="text-gray-9">$200</span></p>
                                <p class="fs-13 fw-medium mb-0">Change : <span class="text-gray-9">$50</span></p>
                            </div>
                        </div>
                        <div class="bg-success-transparent p-2 mb-3 br-5 border-start border-success d-flex align-items-center">
                            <span class="avatar avatar-sm bg-success rounded-circle flex-shrink-0 fs-16 me-2">
									<i class="ti ti-mail-opened"></i>
								</span>
                            <p class="fs-13 fw-medium text-gray-9">A receipt of this transaction will be sent to the registered info@<a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4724323433282a223507223f262a372b226924282a">[email&#160;protected]</a></p>
                        </div>
                        <div class="resend-form mb-3">
                            <input type="text" class="form-control" value="infocustomer@example.com">
                            <button type="submit" class="btn btn-primary btn-xs">Resend Email</button>
                        </div>
                        <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
                            <button type="button" class="btn btn-md btn-light flex-fill" data-bs-toggle="modal" data-bs-target="#print-receipt"><i class="ti ti-printer me-1"></i>Print Receipt</button>
                            <button type="button" class="btn btn-md btn-teal flex-fill"><i class="ti ti-gift me-1"></i>Gift Receipt</button>
                            <a href="#" class="btn btn-md btn-dark flex-fill"><i class="ti ti-shopping-cart me-1"></i>Next Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Cash Payment -->

    <!-- Card Payment -->
    <div class="modal fade modal-default" id="card-payment">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="success-wrap">
                        <div class="text-center">
                            <div class="icon-success bg-success text-white mb-2">
                                <i class="ti ti-check"></i>
                            </div>
                            <h3 class="mb-2">Congratulations, Sale Completed</h3>
                            <div class="p-2 text-center mb-3">
                                <p class="fs-13 fw-medium">Bill Amount : <span class="text-gray-9">$150</span></p>
                            </div>
                        </div>
                        <div class="bg-success-transparent p-2 mb-3 br-5 border-start border-success d-flex align-items-center">
                            <span class="avatar avatar-sm bg-success rounded-circle flex-shrink-0 fs-16 me-2">
									<i class="ti ti-mail-opened"></i>
								</span>
                            <p class="fs-13 fw-medium text-gray-9">A receipt of this transaction will be sent to the registered info@<a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="583b2d2b2c37353d2a183d20393528343d763b3735">[email&#160;protected]</a></p>
                        </div>
                        <div class="resend-form mb-3">
                            <input type="text" class="form-control" value="infocustomer@example.com">
                            <button type="submit" class="btn btn-primary btn-xs">Resend Email</button>
                        </div>
                        <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">
                            <button type="button" class="btn btn-md btn-light flex-fill" data-bs-toggle="modal" data-bs-target="#print-receipt"><i class="ti ti-printer me-1"></i>Print Receipt</button>
                            <button type="button" class="btn btn-md btn-teal flex-fill"><i class="ti ti-gift me-1"></i>Gift Receipt</button>
                            <a href="#" class="btn btn-md btn-dark flex-fill"><i class="ti ti-shopping-cart me-1"></i>Next Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Card Payment -->

    <!-- Active Gift Card -->
    <div class="modal fade pos-modal" id="gift-payment" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pay By Gift Card</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
                </div>
                <div class="modal-body pb-1">
                    <div class="mb-3">
                        <img src="{{ asset('public/backend/pos/') }}img/icons/gift-card.svg" alt="img">
                    </div>
                    <div class="resend-form mb-3">
                        <input type="text" class="form-control" placeholder="Scan Barcode / Enter Number">
                        <button type="submit" class="btn btn-primary btn-xs" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#redeem-value">Check</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Active Gift Card -->

    <!-- Redeem Value -->
    <div class="modal fade pos-modal" id="redeem-value" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Redeem Value</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
                </div>
                <form action="pos.html">
                    <div class="modal-body">
                        <div class="bg-info-transparent p-2 br-8 mb-3">
                            <p class="text-info">Balance isn’t enough to pay, you can still make a partial payment</p>
                        </div>
                        <div class="card bg-light shadow-none text-center">
                            <div class="card-body">
                                <p class="text-gray-5 mb-1">Gift Card Number</p>
                                <h2 class="display-1">5698</h2>
                            </div>
                        </div>
                        <div class="bg-danger-transparent p-2 mb-3 br-5 border-start border-danger d-flex align-items-center">
                            <span class="avatar avatar-sm bg-danger rounded-circle fs-16 me-2">
									<i class="ti ti-gift"></i>
								</span>
                            <p class="fs-16 text-gray-9">Available gift card balance : $45.56</p>
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Enter Bill Amount">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end gap-2 flex-wrap">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Make Partial Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Redeem Value -->

    <!-- Redeem Value -->
    <div class="modal fade pos-modal" id="redeem-fullpayment" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Redeem Value</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
                </div>
                <form action="pos.html">
                    <div class="modal-body">
                        <div class="card bg-light shadow-none text-center">
                            <div class="card-body">
                                <p class="text-gray-5 mb-1">Gift Card Number</p>
                                <h2 class="display-1">5698</h2>
                            </div>
                        </div>
                        <div class="bg-success-transparent p-2 mb-3 br-5 border-start border-success">
                            <span class="avatar avatar-sm bg-success rounded-circle fs-16 me-2">
									<i class="ti ti-gift"></i>
								</span>
                            <p class="fs-16 text-gray-9">Available gift card balance : $45.56</p>
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Enter Bill Amount">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end gap-2 flex-wrap">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Make  Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Redeem Value -->

    <!-- Split Payment -->
    <div class="modal fade pos-modal" id="split-payment" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Split Payment</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
                </div>
                <form action="pos.html">
                    <div class="modal-body">
                        <div class="additem-info">
                            <div class="bg-light p-3 add-info">
                                <div class="row align-items-center g-2">
                                    <div class="col-lg-2">
                                        <h6 class="fs-14 fw-semibold">Payment 2</h6>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="select">
												<option>Cash</option>
												<option>Card</option>
											</select>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" placeholder="Enter Amount">
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn btn-dark w-100">Charge</button>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-light p-3 add-info">
                                <div class="row align-items-center g-2">
                                    <div class="col-lg-2">
                                        <h6 class="fs-14 fw-semibold">Payment 2</h6>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="select">
												<option>Cash</option>
												<option>Card</option>
											</select>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" class="form-control" placeholder="Enter Amount">
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn btn-dark w-100">Charge</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="#" class="btn btn-primary btn-md add-item">Add More</a>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end gap-2 flex-wrap">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="#" class="btn btn-md btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#cash-payment">Complete Sale</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Split Payment -->

    <!-- Payment Cash -->
    <div class="modal fade modal-default" id="payment-cash">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Finalize Sale</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						   <span aria-hidden="true">×</span>
					   </button>
                </div>
                <form action="pos-4.html">
                    <div class="modal-body pb-1">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Received Amount <span class="text-danger">*</span></label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                        <input type="text" class="form-control" value="1800">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Paying Amount <span class="text-danger">*</span></label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                        <input type="text" class="form-control" value="1800">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="change-item mb-3">
                                    <label class="form-label">Change</label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                        <input type="text" class="form-control" value="0.00">
                                    </div>
                                </div>
                                <div class="point-item mb-3">
                                    <label class="form-label">Balance Point</label>
                                    <input type="text" class="form-control" value="200">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Type <span class="text-danger">*</span></label>
                                    <select class="select select-payment">
											<option value="credit">Credit Card</option>
											<option value="cash" selected>Cash</option>
											<option value="cheque">Cheque</option>
											<option value="deposit">Deposit</option>
											<option value="points">Points</option>
										</select>
                                </div>
                                <div class="quick-cash payment-content bg-light  mb-3">
                                    <div class="d-flex align-items-center flex-wra gap-4">
                                        <h5 class="text-nowrap">Quick Cash</h5>
                                        <div class="d-flex align-items-center flex-wrap gap-3">
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash1" checked>
                                                <label class="btn btn-white" for="cash1">10</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash2">
                                                <label class="btn btn-white" for="cash2">20</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash3">
                                                <label class="btn btn-white" for="cash3">50</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash4">
                                                <label class="btn btn-white" for="cash4">100</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash5">
                                                <label class="btn btn-white" for="cash5">500</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash6">
                                                <label class="btn btn-white" for="cash6">1000</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="point-wrap payment-content mb-3">
                                    <div class=" bg-success-transparent d-flex align-items-center justify-content-between flex-wrap p-2 gap-2 br-5">
                                        <h6 class="fs-14 fw-bold text-success">You have 2000 Points to Use</h6>
                                        <a href="javascript:void(0);" class="btn btn-dark btn-md">Use for this Purchase</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Receiver</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Sale Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Staff Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Payment Cash  -->

    <!-- Payment Card  -->
    <div class="modal fade modal-default" id="payment-card">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Finalize Sale</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						   <span aria-hidden="true">×</span>
					   </button>
                </div>
                <form action="pos-4.html">
                    <div class="modal-body pb-1">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Received Amount <span class="text-danger">*</span></label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                        <input type="text" class="form-control" value="1800">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Paying Amount <span class="text-danger">*</span></label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                        <input type="text" class="form-control" value="1800">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="change-item mb-3">
                                    <label class="form-label">Change</label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                        <input type="text" class="form-control" value="0.00">
                                    </div>
                                </div>
                                <div class="point-item mb-3">
                                    <label class="form-label">Balance Point</label>
                                    <input type="text" class="form-control" value="200">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Type <span class="text-danger">*</span></label>
                                    <select class="select select-payment">
											<option value="credit" selected>Credit Card</option>
											<option value="cash">Cash</option>
											<option value="cheque">Cheque</option>
											<option value="deposit">Deposit</option>
											<option value="points">Points</option>
										</select>
                                </div>
                                <div class="quick-cash payment-content bg-light  mb-3">
                                    <div class="d-flex align-items-center flex-wra gap-4">
                                        <h5 class="text-nowrap">Quick Cash</h5>
                                        <div class="d-flex align-items-center flex-wrap gap-3">
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash11" checked>
                                                <label class="btn btn-white" for="cash11">10</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash12">
                                                <label class="btn btn-white" for="cash12">20</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash13">
                                                <label class="btn btn-white" for="cash13">50</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash14">
                                                <label class="btn btn-white" for="cash14">100</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash15">
                                                <label class="btn btn-white" for="cash15">500</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash16">
                                                <label class="btn btn-white" for="cash16">1000</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="point-wrap payment-content mb-3">
                                    <div class=" bg-success-transparent d-flex align-items-center justify-content-between flex-wrap p-2 gap-2 br-5">
                                        <h6 class="fs-14 fw-bold text-success">You have 2000 Points to Use</h6>
                                        <a href="javascript:void(0);" class="btn btn-dark btn-md">Use for this Purchase</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Receiver</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Sale Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Staff Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Payment Card  -->

    <!-- Payment Cheque -->
    <div class="modal fade modal-default" id="payment-cheque">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Finalize Sale</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						   <span aria-hidden="true">×</span>
					   </button>
                </div>
                <form action="pos-4.html">
                    <div class="modal-body pb-1">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Received Amount <span class="text-danger">*</span></label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                        <input type="text" class="form-control" value="1800">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Paying Amount <span class="text-danger">*</span></label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                        <input type="text" class="form-control" value="1800">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="change-item mb-3">
                                    <label class="form-label">Change</label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                        <input type="text" class="form-control" value="0.00">
                                    </div>
                                </div>
                                <div class="point-item mb-3">
                                    <label class="form-label">Balance Point</label>
                                    <input type="text" class="form-control" value="200">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Type <span class="text-danger">*</span></label>
                                    <select class="select select-payment">
											<option value="credit">Credit Card</option>
											<option value="cash">Cash</option>
											<option value="cheque" selected>Cheque</option>
											<option value="deposit">Deposit</option>
											<option value="points">Points</option>
										</select>
                                </div>
                                <div class="quick-cash payment-content bg-light  mb-3">
                                    <div class="d-flex align-items-center flex-wra gap-4">
                                        <h5 class="text-nowrap">Quick Cash</h5>
                                        <div class="d-flex align-items-center flex-wrap gap-3">
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash21" checked>
                                                <label class="btn btn-white" for="cash21">10</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash22">
                                                <label class="btn btn-white" for="cash22">20</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash23">
                                                <label class="btn btn-white" for="cash23">50</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash24">
                                                <label class="btn btn-white" for="cash24">100</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash25">
                                                <label class="btn btn-white" for="cash25">500</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash26">
                                                <label class="btn btn-white" for="cash26">1000</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="point-wrap payment-content mb-3">
                                    <div class=" bg-success-transparent d-flex align-items-center justify-content-between flex-wrap p-2 gap-2 br-5">
                                        <h6 class="fs-14 fw-bold text-success">You have 2000 Points to Use</h6>
                                        <a href="javascript:void(0);" class="btn btn-dark btn-md">Use for this Purchase</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Receiver</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Sale Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Staff Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Payment Cheque -->

    <!--  Payment Deposit -->
    <div class="modal fade modal-default" id="payment-deposit">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Finalize Sale</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						   <span aria-hidden="true">×</span>
					   </button>
                </div>
                <form action="pos-4.html">
                    <div class="modal-body pb-1">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Received Amount <span class="text-danger">*</span></label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                        <input type="text" class="form-control" value="1800">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Paying Amount <span class="text-danger">*</span></label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                        <input type="text" class="form-control" value="1800">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="change-item mb-3">
                                    <label class="form-label">Change</label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                        <input type="text" class="form-control" value="0.00">
                                    </div>
                                </div>
                                <div class="point-item mb-3">
                                    <label class="form-label">Balance Point</label>
                                    <input type="text" class="form-control" value="200">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Type <span class="text-danger">*</span></label>
                                    <select class="select select-payment">
											<option value="credit">Credit Card</option>
											<option value="cash">Cash</option>
											<option value="cheque">Cheque</option>
											<option value="deposit" selected>Deposit</option>
											<option value="points">Points</option>
										</select>
                                </div>
                                <div class="quick-cash payment-content bg-light  mb-3">
                                    <div class="d-flex align-items-center flex-wra gap-4">
                                        <h5 class="text-nowrap">Quick Cash</h5>
                                        <div class="d-flex align-items-center flex-wrap gap-3">
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash31" checked>
                                                <label class="btn btn-white" for="cash31">10</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash32">
                                                <label class="btn btn-white" for="cash32">20</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash33">
                                                <label class="btn btn-white" for="cash33">50</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash34">
                                                <label class="btn btn-white" for="cash34">100</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash35">
                                                <label class="btn btn-white" for="cash35">500</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash36">
                                                <label class="btn btn-white" for="cash36">1000</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="point-wrap payment-content mb-3">
                                    <div class=" bg-success-transparent d-flex align-items-center justify-content-between flex-wrap p-2 gap-2 br-5">
                                        <h6 class="fs-14 fw-bold text-success">You have 2000 Points to Use</h6>
                                        <a href="javascript:void(0);" class="btn btn-dark btn-md">Use for this Purchase</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Receiver</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Sale Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Staff Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Payment Deposit -->


    <!-- Payment Point -->
    <div class="modal fade modal-default" id="payment-points">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Finalize Sale</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						   <span aria-hidden="true">×</span>
					   </button>
                </div>
                <form action="pos-4.html">
                    <div class="modal-body pb-1">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Received Amount <span class="text-danger">*</span></label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                        <input type="text" class="form-control" value="1800">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Paying Amount <span class="text-danger">*</span></label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                        <input type="text" class="form-control" value="1800">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="change-item mb-3">
                                    <label class="form-label">Change</label>
                                    <div class="input-icon-start position-relative">
                                        <span class="input-icon-addon text-gray-9">
												<i class="ti ti-currency-dollar"></i>
											</span>
                                        <input type="text" class="form-control" value="0.00">
                                    </div>
                                </div>
                                <div class="point-item mb-3">
                                    <label class="form-label">Balance Point</label>
                                    <input type="text" class="form-control" value="200">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Type <span class="text-danger">*</span></label>
                                    <select class="select select-payment">
											<option value="credit">Credit Card</option>
											<option value="cash">Cash</option>
											<option value="cheque">Cheque</option>
											<option value="deposit">Deposit</option>
											<option value="points" selected>Points</option>
										</select>
                                </div>
                                <div class="quick-cash payment-content bg-light  mb-3">
                                    <div class="d-flex align-items-center flex-wra gap-4">
                                        <h5 class="text-nowrap">Quick Cash</h5>
                                        <div class="d-flex align-items-center flex-wrap gap-3">
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash41" checked>
                                                <label class="btn btn-white" for="cash41">10</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash42">
                                                <label class="btn btn-white" for="cash42">20</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash43">
                                                <label class="btn btn-white" for="cash43">50</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash44">
                                                <label class="btn btn-white" for="cash44">100</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash45">
                                                <label class="btn btn-white" for="cash45">500</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="btn-check" name="cash" id="cash46">
                                                <label class="btn btn-white" for="cash46">1000</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="point-wrap payment-content mb-3">
                                    <div class=" bg-success-transparent d-flex align-items-center justify-content-between flex-wrap p-2 gap-2 br-5">
                                        <h6 class="fs-14 fw-bold text-success">You have 2000 Points to Use</h6>
                                        <a href="javascript:void(0);" class="btn btn-dark btn-md">Use for this Purchase</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Receiver</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Payment Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Sale Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Staff Note</label>
                                    <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-end flex-wrap gap-2">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Payment Point -->


    <!-- /Print Order -->
    <div class="modal fade modal-default pos-modal" id="hold-order" aria-labelledby="hold-order" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hold order</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="pos.html">
                    <div class="modal-body">
                        <div class="bg-light br-10 p-4 text-center mb-3">
                            <h2 class="display-1">4500.00</h2>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Order Reference <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" value="" placeholder="">
                        </div>
                        <p>The current order will be set on hold. You can retreive this order from the pending order button. Providing a reference to it might help you to identify the order more quickly.</p>
                    </div>
                    <div class="modal-footer d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-md btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-md btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Calculator Modal -->
    <div class="modal fade pos-modal" id="calculator" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
            <div class="calculator-wrap">
                <div class="p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h3>Calculator</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div>
                    <input class="form-control fs-4 text-end" id="calc-display" type="text" placeholder="0" readonly />
                </div>
                </div>
                <div class="calculator-body d-flex justify-content-between px-3 pb-3">
                <div class="text-center">
                    <button class="btn btn-light w-100 mb-2" onclick="clr()">C</button>
                    <button class="btn btn-light w-100 mb-2" onclick="dis('7')">7</button>
                    <button class="btn btn-light w-100 mb-2" onclick="dis('4')">4</button>
                    <button class="btn btn-light w-100 mb-2" onclick="dis('1')">1</button>
                    <button class="btn btn-light w-100" onclick="dis(',')">,</button>
                </div>
                <div class="text-center">
                    <button class="btn btn-light w-100 mb-2" onclick="dis('/')">÷</button>
                    <button class="btn btn-light w-100 mb-2" onclick="dis('8')">8</button>
                    <button class="btn btn-light w-100 mb-2" onclick="dis('5')">5</button>
                    <button class="btn btn-light w-100 mb-2" onclick="dis('2')">2</button>
                    <button class="btn btn-light w-100" onclick="dis('00')">00</button>
                </div>
                <div class="text-center">
                    <button class="btn btn-light w-100 mb-2" onclick="dis('%')">%</button>
                    <button class="btn btn-light w-100 mb-2" onclick="dis('9')">9</button>
                    <button class="btn btn-light w-100 mb-2" onclick="dis('6')">6</button>
                    <button class="btn btn-light w-100 mb-2" onclick="dis('3')">3</button>
                    <button class="btn btn-light w-100" onclick="dis('.')">.</button>
                </div>
                <div class="text-center">
                    <button class="btn btn-light w-100 mb-2" onclick="back()"><i class="ti ti-backspace"></i></button>
                    <button class="btn btn-light w-100 mb-2" onclick="dis('*')">x</button>
                    <button class="btn btn-light w-100 mb-2" onclick="dis('-')">-</button>
                    <button class="btn btn-light w-100 mb-2" onclick="dis('+')">+</button>
                    <button class="btn btn-success w-100" onclick="solve()">=</button>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>

    

    <!-- jQuery -->
    <script src="http://localhost/Shadhin_bazaar/public/backend/assets/libs/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('/public/backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('public/backend/pos/js/feather.min.js') }}" type="f81afdffd142422a2a1d29da-text/javascript"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('public/backend/pos/js/jquery.slimscroll.min.js') }}" type="f81afdffd142422a2a1d29da-text/javascript"></script>

    <!-- Owl JS -->
    <script src="{{ asset('public/backend/pos/plugins/owlcarousel/owl.carousel.min.js') }}" type="f81afdffd142422a2a1d29da-text/javascript"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

     <!-- toaster Js plugins  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Sticky-sidebar -->
    <script src="{{ asset('public/backend/pos/plugins/theia-sticky-sidebar/ResizeSensor.js') }}" type="f81afdffd142422a2a1d29da-text/javascript"></script>
    <script src="{{ asset('public/backend/pos/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}" type="f81afdffd142422a2a1d29da-text/javascript"></script>

    <!-- Custom JS -->
    <script src="{{ asset('public/backend/pos/js/theme-colorpicker.js') }}" type="f81afdffd142422a2a1d29da-text/javascript"></script>

    <script src="{{ asset('public/backend/pos/js/script.js') }}" type="f81afdffd142422a2a1d29da-text/javascript"></script>


    <script>
        //____ For Create Modal ____//
        $('#customer_info').select2();

        //__ Increament & Decreament __//
        document.addEventListener('DOMContentLoaded', function () {
            // Listen for clicks on the entire document
            document.body.addEventListener('click', function (e) {
                const isMinus = e.target.closest('.ti-minus');
                const isPlus = e.target.closest('.ti-plus');

                if (isMinus || isPlus) {
                    const qtyWrapper = e.target.closest('.qty-item');
                    const input = qtyWrapper.querySelector('input[name="qty"]');
                    let currentQty = parseInt(input.value, 10) || 0;

                    if (isMinus) {
                        if (currentQty > 1) {
                            input.value = currentQty - 1;
                        }
                    }

                    if (isPlus) {
                        input.value = currentQty + 1;
                    }
                }
            });
        });
    </script>


    <script>
        const display = document.getElementById("calc-display");
    
        function dis(val) {
        if (display.value === "0" || display.value === "Error") {
            display.value = val;
        } else {
            display.value += val;
        }
        }
    
        function clr() {
        display.value = "";
        }
    
        function back() {
        display.value = display.value.slice(0, -1);
        }
    
        function solve() {
        try {
            let expression = display.value.replace(/x/g, '*').replace(/÷/g, '/');
            let result = eval(expression);
            display.value = result;
        } catch (err) {
            display.value = "Error";
        }
        }
    </script>

</body>

</html>