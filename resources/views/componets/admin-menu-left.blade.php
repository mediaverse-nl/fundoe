<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

    <li class="nav-item {{Request::is('admin/dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.dashboard')}}" >
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
        </a>
    </li>
    <li class="nav-item {{Request::is('admin/detail*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.detail.index')}}">
            <i class="fa fa-fw fa-info"></i>
            <span class="nav-link-text">Details</span>
        </a>
    </li>
    <li class="nav-item {{Request::is('admin/brand*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.brand.index')}}">
            <i class="fa fa-fw fa-car"></i>
            <span class="nav-link-text">Brands</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">
        <a class="nav-link nav-link-collapse {{Request::is('admin/product*') ? '' : 'collapsed'}}" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion" aria-expanded="false">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Products</span>
        </a>
        <ul class="sidenav-second-level collapse {{Request::is('admin/product*') ? 'show' : ''}}" id="collapseComponents" style="">
            <li class="{{Request::is('admin/product/create') ? '' : (Request::is('admin/product*') ? 'active' : '')}}">
                <a href="{{route('admin.product.index')}}">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">index</span>
                </a>
            </li>
            <li class="{{Request::is('admin/product/create') ? 'active' : ''}}">
                <a href="{{route('admin.product.create')}}">
                    <i class="fa fa-fw fa-plus"></i>
                    <span class="nav-link-text">create</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item {{Request::is('admin/order*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.order.index')}}">
            <i class="fa fa-fw fa-inbox"></i>
            <span class="nav-link-text">Orders</span>
        </a>
    </li>
    <li class="nav-item {{Request::is('admin/text-editor*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.text-editor.index')}}">
            <i class="fa fa-fw fa-font"></i>
            <span class="nav-link-text">Texts</span>
        </a>
    </li>
    {{--<li class="nav-item {{Request::is('admin/seo-manager*') ? 'active' : ''}}" disabled>--}}
        {{--<a class="nav-link" href="{{route('admin.seo-manager.index')}}">--}}
            {{--<i class="fa fa-fw fa-search"></i>--}}
            {{--<span class="nav-link-text">SEO</span>--}}
        {{--</a>--}}
    {{--</li>--}}
    <li class="nav-item {{Request::is('admin/file-manager*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.file-manager.index')}}">
            <i class="fa fa-fw fa-image"></i>
            <span class="nav-link-text">Images</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">
        <a class="nav-link  nav-link-collapse {{Request::is('admin/faq*') ? '' : 'collapsed'}}" data-toggle="collapse" href="#faqComponents" data-parent="#exampleAccordion" aria-expanded="false">
            <i class="fa fa-fw fa-question"></i>
            <span class="nav-link-text">FAQ</span>
        </a>
        <ul class="sidenav-second-level collapse {{Request::is('admin/faq*') ? 'show' : ''}}" id="faqComponents" style="">
            <li class="{{Request::is('admin/faq/create') ? '' : (Request::is('admin/faq*') ? 'active' : '')}}">
                <a href="{{route('admin.faq.index')}}">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">index</span>
                </a>
            </li>
            <li class="{{Request::is('admin/faq/create') ? 'active' : ''}}">
                <a href="{{route('admin.faq.create')}}">
                    <i class="fa fa-fw fa-plus"></i>
                    <span class="nav-link-text">create</span>
                </a>
            </li>
        </ul>
    </li>

</ul>

<ul class="navbar-nav sidenav-toggler">
    <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
        </a>
    </li>
</ul>
