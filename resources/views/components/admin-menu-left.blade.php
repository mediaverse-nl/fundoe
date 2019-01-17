<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

    <li class="nav-item {{Request::is('admin/dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.dashboard')}}" >
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
        </a>
    </li>

    {{--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">--}}
        {{--<a class="nav-link nav-link-collapse {{Request::is('admin/product*') ? '' : 'collapsed'}}" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion" aria-expanded="false">--}}
            {{--<i class="fa fa-fw fa-wrench"></i>--}}
            {{--<span class="nav-link-text">Products</span>--}}
        {{--</a>--}}
        {{--<ul class="sidenav-second-level collapse {{Request::is('admin/product*') ? 'show' : ''}}" id="collapseComponents" style="">--}}
            {{--<li class="{{Request::is('admin/activity/create') ? '' : (Request::is('admin/activity*') ? 'active' : '')}}">--}}
                {{--<a href="{{route('admin.activity.index')}}">--}}
                    {{--<i class="fa fa-fw fa-list"></i>--}}
                    {{--<span class="nav-link-text">index</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="{{Request::is('admin/activity/create') ? 'active' : ''}}">--}}
                {{--<a href="{{route('admin.product.create')}}">--}}
                    {{--<i class="fa fa-fw fa-plus"></i>--}}
                    {{--<span class="nav-link-text">create</span>--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</li>--}}

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">
        <a class="nav-link nav-link-collapse {{Request::is('admin/activity*') ? '' : 'collapsed'}}" data-toggle="collapse" href="#activityComponents" data-parent="#exampleAccordion" aria-expanded="false">
            <i class="fa fa-fw fa-question"></i>
            <span class="nav-link-text">Activity</span>
        </a>
        <ul class="sidenav-second-level collapse {{Request::is('admin/activity*') ? 'show' : ''}}" id="activityComponents" style="">
            <li class="{{Request::is('admin/activity/create') ? '' : (Request::is('admin/activity*') ? 'active' : '')}}">
                <a href="{{route('admin.activity.index')}}">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">index</span>
                </a>
            </li>
            <li class="{{Request::is('admin/activity/create') ? 'active' : ''}}">
                <a href="{{route('admin.activity.create')}}">
                    <i class="fa fa-fw fa-plus"></i>
                    <span class="nav-link-text">create</span>
                </a>
            </li>
        </ul>
    </li>
    {{--<li class="nav-item {{Request::is('admin/editor*') ? 'active' : ''}}">--}}
        {{--<a class="nav-link" href="{{route('admin.editor.index')}}">--}}
            {{--<i class="fa fa-fw fa-font"></i>--}}
            {{--<span class="nav-link-text">Texts</span>--}}
        {{--</a>--}}
    {{--</li>--}}
    <li class="nav-item {{Request::is('admin/category*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.category.index')}}">
            <i class="fa fa-fw fa-bars"></i>
            <span class="nav-link-text">Category</span>
        </a>
    </li>
    <li class="nav-item {{Request::is('admin/seo-manager*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.seo-manager.index')}}">
            <i class="fa fa-fw fa-search"></i>
            <span class="nav-link-text">SEO</span>
        </a>
    </li>
    <li class="nav-item {{Request::is('admin/file-manager*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.file-manager.index')}}">
            <i class="fa fa-fw fa-image"></i>
            <span class="nav-link-text">Images</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">
        <a class="nav-link nav-link-collapse {{Request::is('admin/faq*') ? '' : 'collapsed'}}" data-toggle="collapse" href="#faqComponents" data-parent="#exampleAccordion" aria-expanded="false">
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
