<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="{{ route('users.edit', auth()->user()->id) }}">
            <i data-feather="settings"></i>
        </a>
        <img class="img-90 rounded-circle"
            src="
                    {{ auth()->user()->getFirstMediaUrl('user') != null
                        ? auth()->user()->getFirstMediaUrl('user')
                        : asset('assets/images/dashboard/1.png') }}"
            alt="" />
        <div class="badge-bottom"><span class="badge badge-primary">{{ auth()->user()->roles_name }}</span></div>
        <a href="user-profile">
            <h6 class="mt-3 f-14 f-w-600">{{ auth()->user()->name }}</h6>
        </a>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>{{ __('master.list') }}</h6>
                        </div>
                    </li>

                    {{-- @can('role-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ prefixActive('roles') }}" href="javascript:void(0)">
                                <i data-feather="home"></i>
                                <span>{{ __('role.role') }}</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('roles') }};">
                                <li><a href="{{ route('roles.index') }}"
                                        class="{{ routeActive('roles.index') }}">{{ __('role.role_list') }}</a>
                                </li>
                                @can('role-create')
                                    <li><a href="{{ route('roles.create') }}"
                                            class="{{ routeActive('roles.create') }}">{{ __('role.add_role') }}
                                        </a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan --}}

                    @can('user-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ prefixActive('users') }}" href="javascript:void(0)">
                                <i data-feather="home"></i>
                                <span>{{ __('user.user') }}</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('users') }};">
                                <li><a href="{{ route('users.index') }}"
                                        class="{{ routeActive('users.index') }}">{{ __('user.user_list') }}</a>
                                </li>
                                @can('user-create')
                                    <li><a href="{{ route('users.create') }}"
                                            class="{{ routeActive('users.create') }}">{{ __('user.user_add') }}
                                        </a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    {{-- @can('customer-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ prefixActive('customers') }}" href="javascript:void(0)">
                                <i data-feather="home"></i>
                                <span>{{ __('customer.customer') }}</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('customers') }};">
                                <li><a href="{{ route('customers.index') }}"
                                        class="{{ routeActive('customers.index') }}">{{ __('customer.customer_list') }}</a>
                                </li>
                                @can('customer-create')
                                    <li><a href="{{ route('customers.create') }}"
                                            class="{{ routeActive('customers.create') }}">{{ __('customer.customer_add') }}
                                        </a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan --}}

                    @can('city-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ prefixActive('cities') }}" href="javascript:void(0)">
                                <i data-feather="home"></i>
                                <span>{{ __('city.cities') }}</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('cities') }};">
                                <li><a href="{{ route('cities.index') }}"
                                        class="{{ routeActive('cities.index') }}">{{ __('city.city_list') }}</a>
                                </li>

                            </ul>
                        </li>
                    @endcan
                    @can('governorate-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ prefixActive('governorates') }}" href="javascript:void(0)">
                                <i data-feather="home"></i>
                                <span>{{ __('city.governorate') }}</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('governorates') }};">
                                <li><a href="{{ route('governorates.index') }}"
                                        class="{{ routeActive('governorates.index') }}">{{ __('city.governorate_list') }}</a>
                                </li>

                            </ul>
                        </li>
                    @endcan

                    @can('product-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ prefixActive('products') }}" href="javascript:void(0)">
                                <i data-feather="home"></i>
                                <span>{{ __('product.products') }}</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('products') }};">
                                <li><a href="{{ route('products.index') }}"
                                        class="{{ routeActive('products.index') }}">{{ __('product.product_list') }}</a>
                                </li>
                                @can('product-create')
                                    <li><a href="{{ route('products.create') }}"
                                            class="{{ routeActive('products.create') }}">{{ __('product.product_add') }}
                                        </a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                    @can('invoice-list')
                        <li class="dropdown">
                            <a class="nav-link menu-title {{ prefixActive('invoices') }}" href="javascript:void(0)">
                                <i data-feather="home"></i>
                                <span>{{ __('invoice.invoices') }}</span>
                            </a>
                            <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('invoices') }};">
                                <li><a href="{{ route('invoices.index') }}"
                                        class="{{ routeActive('invoices.index') }}">{{ __('invoice.invoice_list') }}</a>
                                </li>
                                @can('invoice-invoice-pendingList')
                                    <li><a href="{{ route('invoice.pendingList') }}"
                                            class="{{ routeActive('invoice.pendingList') }}">{{ __('invoice.pendingList') }}
                                        </a></li>
                                @endcan
                                @can('invoice-invoice-approvedList')
                                    <li><a href="{{ route('invoice.approvedList') }}"
                                            class="{{ routeActive('invoice.approvedList') }}">{{ __('invoice.approvedList') }}
                                        </a></li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
