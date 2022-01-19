<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item  {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>

        {{--<li>
            <a class="app-menu__item {{ sidebar_open(['admin.users']) }}"
        href="{{ route('admin.users.index') }}"><i class="app-menu__icon fa fa-group"></i>
        <span class="app-menu__label">User Management</span>
        </a>
        </li> --}}
        <li>
            <a class="app-menu__item" href="{{ route('admin.banner.list') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Banner</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('admin.blog.list') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Blog</span>
            </a>
        </li>
        <li class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <a class="app-menu__item" href="javascript:void(0)"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Category</span>

               
            </a>
            <ul class="app-menu collapse pb-0" id="collapseOne" aria-labelledby="headingOne"
                    data-parent="#accordion">
                    <li>
                        <a class="app-menu__item" href="{{ route('admin.category.list') }}"><i
                                class="app-menu__icon fa fa-group"></i>
                            <span class="app-menu__label">Level One Category</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item" href="{{ route('admin.level-two-category.list') }}"><i
                                class="app-menu__icon fa fa-group"></i>
                            <span class="app-menu__label">Level Two Sub-Category</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item" href="{{ route('admin.level-three-category.list') }}"><i
                                class="app-menu__icon fa fa-group"></i>
                            <span class="app-menu__label">Level Three Sub-Category</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item" href="{{ route('admin.level-four-category.list') }}"><i
                                class="app-menu__icon fa fa-group"></i>
                            <span class="app-menu__label">Level Four Sub-Category</span>
                        </a>
                    </li>
                    <li>
                        <a class="app-menu__item" href="{{ route('admin.level-five-category.list') }}"><i
                                class="app-menu__icon fa fa-group"></i>
                            <span class="app-menu__label">Level Five Sub-Category</span>
                        </a>
                    </li>
                </ul>
        </li>


        <li>
            <a class="app-menu__item" href="{{ route('admin.coupon.list') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Coupon</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('admin.brand.list') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Brand</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('admin.seller-management.list') }}"><i
                    class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Seller Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('admin.product.list') }}"><i
                    class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Product</span>
            </a>
        </li>


        <li>
            <a class="app-menu__item" href="{{ route('admin.customer.list') }}"><i
                    class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Customer Management</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item" href="{{ route('admin.address.list') }}"><i
                    class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Address</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('admin.bank.list') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Bank Details</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('admin.setting.list') }}"><i
                    class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Setting</span>
            </a>
        </li>
        <!-- {{-- <li>
            <a class="app-menu__item {{ sidebar_open(['admin.event']) }}"
                href="{{ route('admin.event.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Event Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.deal']) }}"
                href="{{ route('admin.deal.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Deal Management</span>
            </a>
        </li>
        <!-- <li>
            <a class="app-menu__item {{ sidebar_open(['admin.property']) }}"
                href="{{ route('admin.property.index') }}"><i class="app-menu__icon fa fa-group"></i>
                <span class="app-menu__label">Property Management</span>
            </a>
        </li> -->
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.loop']) }}" href="{{ route('admin.loop.index') }}"><i
                    class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Local Loops</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.notification']) }}"
                href="{{ route('admin.notification.index') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Send Notifications</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.category']) }}"
                href="{{ route('admin.category.index') }}"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Category Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.banner']) }}" href="{{ route('admin.banner.index') }}"><i
                    class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Banner Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.blog']) }}" href="{{ route('admin.blog.index') }}"><i
                    class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Blog Management</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ sidebar_open(['admin.settings']) }}" href="{{ route('admin.settings') }}"><i
                    class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Site Settings</span>
            </a>
        </li> --}} -->

    </ul>
</aside>