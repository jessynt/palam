<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/avatars/user_large.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ active_class(if_route('admin.dashboard')) }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview {{ active_class(if_route_pattern(['admin.post.*'])) }}">
                <a href="#">
                    <i class="iconfont icon-article"></i>
                    <span>文章</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ active_class(if_route('admin.post.create')) }}">
                        <a href="{{ route('admin.post.create') }}"><i class="fa fa-circle-o"></i> 写文章</a>
                    </li>
                    <li class="{{ active_class(if_route('admin.post.index')) }}">
                        <a href="{{ route('admin.post.index') }}"><i class="fa fa-circle-o"></i> 文章列表</a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{ active_class(if_route_pattern(['admin.category.*'])) }}">
                <a href="#">
                    <i class="fa fa-folder"></i>
                    <span>分类</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ active_class(if_route('admin.category.create')) }}">
                        <a href="{{ route('admin.category.create') }}"><i class="fa fa-circle-o"></i> 新增分类</a>
                    </li>
                    <li class="{{ active_class(if_route('admin.category.index')) }}">
                        <a href="{{ route('admin.category.index') }}"><i class="fa fa-circle-o"></i> 所有分类</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i>
                    <span>标签</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ active_class(if_route('admin.tag.create')) }}">
                        <a href="{{ route('admin.tag.create') }}"><i class="fa fa-circle-o"></i> 新增标签</a>
                    </li>
                    <li class="{{ active_class(if_route('admin.tag.index')) }}">
                        <a href="{{ route('admin.tag.index') }}"><i class="fa fa-circle-o"></i> 所有标签</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{ route('admin.media.index') }}">
                    <i class="fa fa-file-image-o"></i>
                    <span>媒体库</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file"></i>
                    <span>页面</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ active_class(if_route('admin.page.create')) }}">
                        <a href="{{ route('admin.page.create') }}"><i class="fa fa-circle-o"></i> 新增页面</a>
                    </li>
                    <li class="{{ active_class(if_route('admin.page.index')) }}">
                        <a href="{{ route('admin.page.index') }}"><i class="fa fa-circle-o"></i> 所有页面</a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
</aside>
